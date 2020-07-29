<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 1/8/2020
 * Time: 10:11 AM
 */

if (!function_exists('iii_notepad_custom_page_redirect')) {
	function iii_notepad_custom_page_redirect() {
		if (is_home()) {
			III_Clean_State::init();
		}
	}

	add_action('template_redirect', 'iii_notepad_custom_page_redirect');
}

if (!function_exists('iii_notepad_worksheet_search_worksheet')) {
	function iii_notepad_worksheet_search_worksheet() {
		$s 		= $_POST['s'];
		$type 	= $_POST['type'];
		$mode	= $_POST['mode'];

		if (!is_user_logged_in()) {
			echo json_encode('-99');
			exit;
		}

		$params = array(
			's'		=> $s,
			'type'	=> $type,
			'mode'	=> $mode
		);

		$list_sheet = iii_notepad_get_list_worksheet_by_teacher(get_current_user_id(), $params);

		if (empty($list_sheet)) {
			$html = esc_html__('No Sheet Found', 'iii-notepad');
		} else {
			ob_start();

			$html = iii_notepad_worksheet_list_sheet_html($list_sheet);

			$html .= ob_get_clean();
		}

		echo json_encode($html);
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_search_worksheet', 'iii_notepad_worksheet_search_worksheet');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_search_worksheet', 'iii_notepad_worksheet_search_worksheet');
}

if (!function_exists('iii_notepad_purchase_time_by_point')) {
	function iii_notepad_purchase_time_by_point() {
		$student_id 	= $_POST['student_id'];
		$teacher_id		= $_POST['teacher_id'];
		$sid			= $_POST['sid'];
		$time_increase	= $_POST['time'];

		if (is_user_logged_in()) {
			$current_user 	= wp_get_current_user();
			$student_id		= $current_user->ID;
		}

		$user_point		= get_user_meta($student_id, 'user_points', true);
		$note			= esc_html__('Purchase Notepad', 'iii-notepad');
		$price_tutoring = get_user_meta($student_id, 'price_tutoring', true);
		$point_required = empty($price_tutoring) ? 15 : $price_tutoring;
		$required_point = $point_required*2;

		if ($user_point < $required_point) {
			echo json_encode('0');
			exit;
		} else {
			update_user_meta($student_id, 'user_points', $user_point - $required_point);

			global $wpdb;
			$wpdb->insert("{$wpdb->prefix}dict_user_point_transactions", array(
				'user_id'						=> $student_id,
				'point_transaction_type_id'		=> '3',
				'grading_worksheet_txn_id'		=> '0',
				'purchasing_worksheet_txn_id'	=> '0',
				'amount'						=> '15',
				'transaction_date'				=> current_time('mysql'),
				'note'							=> $note
			));

			$wpdb->query("UPDATE {$wpdb->prefix}dict_tutoring_plan SET total_time = (total_time +  " . $time_increase . "), confirmed = '1' WHERE id_user = '" . $student_id . "' AND tutor_id = '" . $teacher_id . "' AND id = '" . $sid . "'");

			echo json_encode('1');
			exit;
		}
	}

	add_action('wp_ajax_iii_notepad_purchase_time_by_point', 'iii_notepad_purchase_time_by_point');
	add_action('wp_ajax_nopriv_iii_notepad_purchase_time_by_point', 'iii_notepad_purchase_time_by_point');
}

if (!function_exists('iii_notepad_user_login')) {
	function iii_notepad_user_login() {
		$user1_emal		= $_POST['user1'];
		$user2_email	= $_POST['user2'];

		if ($user1_emal == '' || $user2_email == '') {
			$msg = esc_html__('Please enter email', 'iii-notepad');
			echo json_encode($msg);
			exit;
		}

		$user1 = get_user_by('email', $user1_emal);
		$user2 = get_user_by('email', $user2_email);

		if (!$user1) {
			$msg = esc_html__('Email 1 is wrong', 'iii-notepad');
			echo json_encode($msg);
			exit;
		}

		if (!$user2) {
			$msg = esc_html__('Email 2 is wrong', 'iii-notepad');
			echo json_encode($msg);
			exit;
		}

		$user1_id 	= $user1->ID;
		$user2_id	= $user2->ID;

		$result = array(
			'user1_id'	=> $user1_id,
			'user2_id'	=> $user2_id
		);

		echo json_encode($result);
		exit;
	}

	add_action('wp_ajax_iii_notepad_user_login', 'iii_notepad_user_login');
	add_action('wp_ajax_nopriv_iii_notepad_user_login', 'iii_notepad_user_login');
}

if (!function_exists('iii_notepad_worksheet_save_worksheet')) {
	function iii_notepad_worksheet_save_worksheet() {
		$wsid 		= $_POST['wsid'];
		$ws_title 	= $_POST['ws_title'];
		$question	= $_POST['question'];
		$mode		= $_POST['mode'];
		$subject	= $_POST['subject'];

		global $wpdb;

		if (!is_user_logged_in()) {
			$result = array(
				'sheet_id'	=> -99,
				'code'		=> 3
			);

			echo json_encode($result);
			exit;
		}

		if ($wsid != '') {
			$wpdb->update("{$wpdb->prefix}dict_sheets", array('questions' => json_encode($question), 'sheet_name' => $ws_title, 'mode_type' => $mode), array('id' => $wsid));

			$result = array(
				'sheet_id'	=> $wsid,
				'code'		=> 2
			);

			echo json_encode($result);
			exit;
		} else {
			$wpdb->insert("{$wpdb->prefix}dict_sheets", array(
				'assignment_id'		=> '4',
				'homework_type_id'	=> '3',
				'category_id'		=> $subject,
				'trivia_exclusive'	=> '0',
				'ws_default'		=> '0',
				'grade_id'			=> '1',
				'sheet_name'		=> $ws_title,
				'grading_price'		=> '0',
				'dictionary_id'		=> '1',
				'questions'			=> json_encode($question),
				'passages'			=> '',
				'description'		=> '',
				'created_by'		=> get_current_user_id(),
				'private'			=> '0',
				'created_on'		=> date('Y-m-d', time()),
				'answer_time_limit'	=> '0',
				'show_answer_after'	=> '0',
				'lang'				=> 'en',
				'old_description'	=> '',
				'new_ws'			=> '1',
				'mode_type'			=> $mode
			));

			$sheet_id = $wpdb->insert_id;

			$library = $wpdb->get_row("SELECT * FROM {$wpdb->prefix}dict_my_library WHERE created_by = '" . get_current_user_id() . "'");

			$wpdb->insert("{$wpdb->prefix}dict_my_library_sheet", array(
				'library_id'	=> $library->id,
				'sheet_id'		=> $sheet_id,
				'category_id'	=> '1',
				'created_on'	=> current_time('mysql'),
			));

			$result = array(
				'sheet_id'	=> $sheet_id,
				'code'		=> 1
			);

			echo json_encode($result);
			exit;
		}
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_save_worksheet', 'iii_notepad_worksheet_save_worksheet');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_save_worksheet', 'iii_notepad_worksheet_save_worksheet');
}

if (!function_exists('iii_notepad_worksheet_delete_worksheet_from_list_search')) {
	function iii_notepad_worksheet_delete_worksheet_from_list_search() {
		$sid = $_POST['sid'];

		global $wpdb;

		if (!is_user_logged_in()) {
			echo json_encode(-99);
			exit;
		}

		$x = $wpdb->delete("{$wpdb->prefix}dict_sheets", array('id' => $sid));
		$y = $wpdb->delete("{$wpdb->prefix}dict_my_library_sheet", array('sheet_id' => $sid));

		if ($x && $y) {
			echo json_encode(1);
			exit;
		} else {
			echo json_encode(0);
			exit;
		}
	}

	add_action('wp_ajax_iii_notepad_worksheet_delete_worksheet_from_list_search', 'iii_notepad_worksheet_delete_worksheet_from_list_search');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_delete_worksheet_from_list_search', 'iii_notepad_worksheet_delete_worksheet_from_list_search');
}

if (!function_exists('iii_notepad_worksheet_open_sheet_by_id')) {
	function iii_notepad_worksheet_open_sheet_by_id() {
		$sid		= $_POST['sid'];
		$x 			= iii_notepad_get_worksheet_from_db_by_id($sid);

		if (!is_user_logged_in()) {
			echo json_encode(-99);
			exit;
		}

		$result = array(
			'content_html' 	=> iii_notepad_worksheet_generate_ws_html($sid),
			'q_html'		=> iii_notepad_worksheet_generate_ws_question_number_section_html($sid),
			'title'			=> $x->sheet_name,
			'mode_type'		=> $x->mode_type,
			'cat_id'		=> $x->category_id
		);

		echo json_encode($result);
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_open_sheet_by_id', 'iii_notepad_worksheet_open_sheet_by_id');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_open_sheet_by_id', 'iii_notepad_worksheet_open_sheet_by_id');
}

if (!function_exists('iii_notepad_worksheet_show_answer_follow_ws_and_q')) {
	function iii_notepad_worksheet_show_answer_follow_ws_and_q() {
		$wid	= $_POST['wid'];
		$qid	= $_POST['qid'];

		$html		= array();

		$x 			= iii_notepad_get_worksheet_from_db_by_id($wid);
		$questions	= $x->questions;
		$questions	= (array) json_decode($questions);

		if ($x->mode_type == '2') {
			echo json_encode(-99);
			exit;
		}

		$true_q		= (array) $questions['qid'. $qid];

		if (!empty($true_q)) {
			foreach ($true_q as $key => $value) {
				if (strpos($key, 'single_answer_') !== false && $value != '') {
					$html[] = $value;
				} else if (strpos($key, 'multi_choice_') !== false && $value != '') {
					$list_choice = explode(',', $value);
					$new_arr = array(
						'1'		=> array($list_choice[0], $list_choice[1]),
						'2'		=> array($list_choice[2], $list_choice[3]),
						'3'		=> array($list_choice[4], $list_choice[5]),
						'4'		=> array($list_choice[6], $list_choice[7]),
						'5'		=> array($list_choice[8], $list_choice[9]),
						'6'		=> array($list_choice[10], $list_choice[11]),
					);

					$multi_answer = array();

					for ($j = 1; $j < 7; $j++) {
						$value	= $new_arr[$j];
						$answer = str_replace('choice_' . $j . ':', '', $value[0]);
						$text	= str_replace('text_' . $j . ':', '', $value[1]);

						if ($answer == '0') {
							$multi_answer[] = '(' . $j . ') ' . $text;
						}
					}

					$html[] = implode(',', $multi_answer);
				}
			}
		}

		echo json_encode(implode('', $html));
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_show_answer_follow_ws_and_q', 'iii_notepad_worksheet_show_answer_follow_ws_and_q');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_show_answer_follow_ws_and_q', 'iii_notepad_worksheet_show_answer_follow_ws_and_q');
}

if (!function_exists('iii_notepad_worksheet_check_answer_follow_ws_and_q')) {
	function iii_notepad_worksheet_check_answer_follow_ws_and_q() {
		$wid	= $_POST['wid'];
		$qid	= $_POST['qid'];
		$answer	= $_POST['answer'];

		$result = 0;

		$x 			= iii_notepad_get_worksheet_from_db_by_id($wid);
		$questions	= $x->questions;
		$questions	= (array) json_decode($questions);

		if ($x->mode_type == '2') {
			echo json_encode(-99);
			exit;
		}

		$true_q		= (array) $questions['qid'. $qid];

		if (!empty($true_q)) {
			foreach ($true_q as $key => $value) {
				if (strpos($key, 'single_answer_') !== false && $value != '') {
					if ($answer == $value) {
						$result = 1;
					}
				} else if (strpos($key, 'multi_choice_') !== false && $value != '') {
					$list_choice = explode(',', $value);
					$new_arr = array(
						'1'		=> array($list_choice[0], $list_choice[1]),
						'2'		=> array($list_choice[2], $list_choice[3]),
						'3'		=> array($list_choice[4], $list_choice[5]),
						'4'		=> array($list_choice[6], $list_choice[7]),
						'5'		=> array($list_choice[8], $list_choice[9]),
						'6'		=> array($list_choice[10], $list_choice[11]),
					);

					$multi_answer = array();

					for ($j = 1; $j < 7; $j++) {
						$value 	= $new_arr[$j];
						$true_a = str_replace('choice_' . $j . ':', '', $value[0]);
						$text	= str_replace('text_' . $j . ':', '', $value[1]);

						if ($true_a == '0') {
							$multi_answer[] = '(' . $j . ') ' . $text;
						}
					}

					$answer_arr = explode(',', $answer);
					$compare 	= array_diff($answer_arr, $multi_answer);

					if (empty($compare) && count($answer_arr) == count($multi_answer)) {
						$result = 1;
					}
				}
			}
		}

		echo json_encode($result);
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_check_answer_follow_ws_and_q', 'iii_notepad_worksheet_check_answer_follow_ws_and_q');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_check_answer_follow_ws_and_q', 'iii_notepad_worksheet_check_answer_follow_ws_and_q');
}

if (!function_exists('iii_notepad_worksheet_open_preview_mode_sheet')) {
	function iii_notepad_worksheet_open_preview_mode_sheet() {
		$sid	= $_POST['sid'];

		ob_start();
		$html = iii_notepad_worksheet_preview_ws_html($sid);

		$html .= ob_get_clean();

		echo json_encode($html);
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_open_preview_mode_sheet', 'iii_notepad_worksheet_open_preview_mode_sheet');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_open_preview_mode_sheet', 'iii_notepad_worksheet_open_preview_mode_sheet');
}

if (!function_exists('iii_notepad_worksheet_save_single_image')) {
	function iii_notepad_worksheet_save_single_image() {
		$list 	= $_FILES['main_image'];
		$arr	= array();

		$new_list = array();

		if (!empty($list)) {
			for ($i = 0; $i < count($list['name']); $i++) {
				$new_list[$i] = array(
					'name'		=> $list['name'][$i],
					'type'		=> $list['type'][$i],
					'tmp_name'	=> $list['tmp_name'][$i],
					'error'		=> $list['error'][$i],
					'size'		=> $list['size'][$i]
				);
			}
		}

		require_once(ABSPATH . 'wp-admin/includes/admin.php');
		require_once(ABSPATH . 'wp-admin/includes/image.php');

		for($i = 0; $i < count($new_list); $i++) {
			$file = $new_list[$i];
			$file_return = wp_handle_upload($file, array('test_form' => false));

			if(isset($file_return['error']) || isset($file_return['upload_error_handler'])) {
				return false;
			} else {
				$filename = $file_return['file'];
				$attachment = array(
					'post_mime_type'	=> $file_return['type'],
					'post_title'		=> preg_replace('/\.[^.]+$/', '', basename($filename)),
					'post_content'		=> '',
					'post_status'		=> 'inherit',
					'guid'				=> $file_return['url']
				);

				$attachment_id		= wp_insert_attachment($attachment, $file_return['url']);
				$attachment_data	= wp_generate_attachment_metadata($attachment_id, $filename);
				wp_update_attachment_metadata($attachment_id, $attachment_data);

				if(0 < intval($attachment_id)) {
					$arr[] = $attachment_id;
				}
			}
		}

		echo json_encode($arr);
		exit;

		return false;
	}

	add_action('wp_ajax_iii_notepad_worksheet_save_single_image', 'iii_notepad_worksheet_save_single_image');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_save_single_image', 'iii_notepad_worksheet_save_single_image');
}

if (!function_exists('iii_notepad_worksheet_check_user_login')) {
	function iii_notepad_worksheet_check_user_login() {
		$user 	= $_POST['log'];
		$pwd	= $_POST['pwd'];

		$creds = array(
			'user_login'    => $user,
			'user_password' => $pwd,
			'remember'      => false
		);
		$html = array();

		$user = wp_signon($creds, false);

		if (is_wp_error( $user)) {
			$html['content'] 	= $user->get_error_message();
			$html['code']		= '1';
		} else {
			$html['user_id']	= $user->ID;
			$html['user_name']	= $user->display_name;
			$html['code']		= '2';

			$content = array();

			$content[] = '<div class="ws-user-info">';
			$content[] = '<span>' . $user->display_name . '</span>';
			$content[] = '<a href="#"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . 'assets/images/worksheet/icon_Login_ON.png" /></a>';
			$content[] = '</div>';

			$html['content'] = implode('', $content);
		}

		echo json_encode($html);
		exit;
	}

	add_action('wp_ajax_iii_notepad_worksheet_check_user_login', 'iii_notepad_worksheet_check_user_login');
	add_action('wp_ajax_nopriv_iii_notepad_worksheet_check_user_login', 'iii_notepad_worksheet_check_user_login');
}

if (!function_exists('iii_notepad_notepad_call_page_number_per_sheet')) {
	function iii_notepad_notepad_call_page_number_per_sheet() {
		$sid = $_POST['sid'];

		$x = iii_notepad_get_worksheet_from_db_by_id($sid);
		$q = $x->questions;

		$questions = (array) json_decode($q);

		$html = array();

		$html[] = '<div class="notepad-sheet-popup">';
		$html[] = '<div class="subject">';
		$html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/notepad/sheet/icon_Worksheet_Name.png" />';
		$html[] = '<span>' . $x->category_name . '</span>';
		$html[] = '</div>';

		$html[] = '<div class="page-number">';
		$html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/notepad/sheet/icon_Page_Number.png" />';
		$html[] = '<span class="label-p">' . esc_html__('Page Number', 'iii-notepad') . '</span>';
		$html[] = '<input type="text" value="1" class="page-number-input" name="page-number-input"/>';
		$html[] = '<input type="hidden" class="sheetid" value="' . $sid . '"/>';
		$html[] = '<span class="count-page">1 ~ ' . count($questions) . esc_html__(' pages', 'iii-notepad') . '</span>';
		$html[] = '</div>';

		$html[] = '<div class="sheet-btn">';
		$html[] = '<button type="button" class="sopen">' . esc_html__('Open', 'iii-notepad') . '</button>';
		$html[] = '<button type="button" class="sclose">' . esc_html__('Close', 'iii-notepad') . '</button>';
		$html[] = '</div>';

		$html[] = '</div>';

		echo json_encode(implode('', $html));
		exit;
	}

	add_action('wp_ajax_iii_notepad_notepad_call_page_number_per_sheet', 'iii_notepad_notepad_call_page_number_per_sheet');
	add_action('wp_ajax_nopriv_iii_notepad_notepad_call_page_number_per_sheet', 'iii_notepad_notepad_call_page_number_per_sheet');
}

if (!function_exists('iii_notepad_notepad_create_image_from_sheet_questions')) {
	function iii_notepad_notepad_create_image_from_sheet_questions() {
		$sid = $_POST['sid'];
		$qid = $_POST['qid'];

		$x = iii_notepad_get_worksheet_from_db_by_id($sid);
		$q = $x->questions;

		$questions	= (array) json_decode($q);
		$q_content	= $questions['qid' . $qid];
		$q_content	= (array) $q_content;

		$html = array();

//		ob_start();
//		$html[] = iii_notepad_notepad_css_for_generate_image_from_sheet();
//		$html[] = ob_get_clean();

		if (!empty($q_content)) {
			$html[] = '<div class="ws-preview-questions-content" style="width: 600px">';
			$html[] = '<div class="wsp-question-item qid' . $qid . '">';

			foreach ($q_content as $module => $module_value) {
				// Video Component
				if (strpos($module, 'video_') !== false && $module_value != '') {
					parse_str(parse_url($module_value, PHP_URL_QUERY), $youtube);
					$newlink = 'https://www.youtube.com/embed/' . $youtube['v'] . '';

					$html[] = '<div class="wsp-component wsp-video">';
					$html[] = '<div class="wsp-videoWrapper">';
					$html[] = '<iframe src="' . $newlink . '"></iframe>';
					$html[] = '</div>';
					$html[] = '</div>';
				}

				//Image Component
				if (strpos($module, 'image_') !== false && $module_value != '') {
					$module_value = json_decode($module_value);

					if (!empty($module_value)) {
						$html[] = '<div class="wsp-component wsp-image">';
						foreach ($module_value as $image_id) {
							$html[] = '<p><img src="' . wp_get_attachment_url($image_id) . '" /></p>';
						}

						$html[] = '</div>';
					}
				}

				//Text Component
				if (strpos($module, 'text_') !== false && $module_value != '') {
					$html[] = '<div class="wsp-component wsp-text">';

					$html[] = '<p>' . $module_value . '</p>';

					$html[] = '</div>';
				}

				//Question Component
				if (strpos($module, 'question_') !== false && $module_value != '') {
					$html[] = '<div class="wsp-component wsp-question">';

					$html[] = '<p>' . $module_value . '</p>';

					$html[] = '</div>';
				}

				//Multi Answer Component
				if (strpos($module, 'multi_choice_') !== false && $module_value != '') {
					$list_choice = explode(',', $module_value);
					$new_arr = array(
						'1' => array($list_choice[0], $list_choice[1]),
						'2' => array($list_choice[2], $list_choice[3]),
						'3' => array($list_choice[4], $list_choice[5]),
						'4' => array($list_choice[6], $list_choice[7]),
						'5' => array($list_choice[8], $list_choice[9]),
						'6' => array($list_choice[10], $list_choice[11]),
					);

					$html[] = '<div class="wsp-component wsp-list-choice">';

					for ($j = 1; $j < 7; $j++) {
						$value = $new_arr[$j];
						$text = str_replace('text_' . $j . ':', '', $value[1]);

						if ($text) {
							$html[] = '<div class="wsp-choice-item" data-index="' . $j . '">';
							$html[] = '<span class="unselect"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/number/' . $j . '.png" /></span>';
							$html[] = '<span class="select"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/number/' . $j . '_select.png" /></span>';
							$html[] = '<div>' . $text . '</div>';
							$html[] = '</div>';
						}
					}

					$html[] = '</div>';
				}
			}

			$html[] = '</div>';
			$html[] = '</div>';
		}

		echo json_encode(implode('', $html));
		exit;
	}

	add_action('wp_ajax_iii_notepad_notepad_create_image_from_sheet_questions', 'iii_notepad_notepad_create_image_from_sheet_questions');
	add_action('wp_ajax_nopriv_iii_notepad_notepad_create_image_from_sheet_questions', 'iii_notepad_notepad_create_image_from_sheet_questions');
}