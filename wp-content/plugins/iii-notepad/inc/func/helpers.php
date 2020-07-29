<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 1/8/2020
 * Time: 10:13 AM
 */

if (!function_exists('iii_template_redirect')) {
	function iii_template_redirect($page_template) {
		if (is_home()) {
			if (isset($_GET['mode']) && $_GET['mode'] == 'ws') {
				$page_template = III_NOTEPAD_PLUGIN_DIR_PATH . '/templates/worksheet.php';
			} else if (isset($_GET['mode']) && $_GET['mode'] == 'regular') {
				$page_template = III_NOTEPAD_PLUGIN_DIR_PATH . '/templates/regular.php';
			} else {
				$page_template = III_NOTEPAD_PLUGIN_DIR_PATH . '/templates/notepad.php';
			}

		}

		return $page_template;
	}
}

if (!function_exists('iii_notepad_get_list_worksheet_by_teacher')) {
	function iii_notepad_get_list_worksheet_by_teacher($teacher_id, $args = false) {
		global $wpdb;

		$query = 'SELECT sheet.*,dicts.sheet_name,dicts.description,dicts.mode_type, ass.default_name AS assignment, cate.id AS cate FROM ' . $wpdb->prefix . 'dict_my_library AS lib JOIN ' . $wpdb->prefix . 'dict_homework_assignments AS ass '
		. 'JOIN ' . $wpdb->prefix . 'dict_my_library_sheet as sheet ON lib.id=sheet.library_id JOIN ' . $wpdb->prefix . 'dict_sheets AS dicts ON ass.id = dicts.assignment_id AND dicts.id=sheet.sheet_id JOIN ' . $wpdb->prefix . 'dict_sheet_categories AS cate ON cate.id=sheet.category_id ';

		$where = 'WHERE  lib.created_by=' . $teacher_id . ' AND dicts.new_ws = 1';

		if (isset($args['s']) && $args['s'] != '') {
			$where .= ' AND dicts.sheet_name LIKE "%' . $args['s'] . '%"';
		}

		if (isset($args['type']) && $args['type'] != '') {

		}

		if (isset($args['mode']) && $args['mode'] != ''  && $args['mode'] != 'all') {
			$where .= ' AND dicts.mode_type = ' . $args['mode'] . '';
		}

		$query .= $where . ' ORDER BY sheet.created_on DESC';

		$sheet_list = $wpdb->get_results($query);

		return $sheet_list;
	}
}

if (!function_exists('iii_notepad_worksheet_list_sheet_html')) {
	function iii_notepad_worksheet_list_sheet_html($list) {
		?>
		<div class="wlr-content-list">
			<?php foreach ($list as $sheet) : ?>
				<div class="wlr-content-item" data-w="<?php echo esc_attr($sheet->sheet_id); ?>">
					<div class="wlr-item-type">
						<span>
							<?php if ($sheet->mode_type == '2') : ?>
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Search_Icon_TEST.png" />
							<?php else : ?>
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Search_Icon_PRACTICE.png" />
							<?php endif; ?>
						</span>
					</div>
					<div class="wlr-item-name">
						<?php echo esc_attr($sheet->sheet_name); ?>
					</div>
					<div class="wlr-item-cat">
						<?php echo esc_attr($sheet->assignment); ?>
					</div>
					<div class="wlr-item-actions">
						<a class="wlr-item-open-action">
							<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Search_Option.png" />
						</a>
						<div class="wlr-item-action-list hidden">
							<div class="wlr-item-action-edit">
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Option_Edit-Open.png" />
								<span>
									<?php echo esc_html__('Open / Edit', 'iii-notepad'); ?>
								</span>
							</div>
							<div class="wlr-item-action-detail">
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Option_Detail.png" />
								<span>
									<?php echo esc_html__('Detail', 'iii-notepad'); ?>
								</span>
							</div>
							<div class="wlr-item-action-remove">
								<img src="<?php echo III_NOTEPAD_PLUGIN_DIR_URL; ?>assets/images/worksheet/Option_Remove.png" />
								<span>
									<?php echo esc_html__('Remove', 'iii-notepad'); ?>
								</span>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
		<?php
	}
}

if (!function_exists('iii_notepad_get_worksheet_from_db_by_id')) {
	function iii_notepad_get_worksheet_from_db_by_id($sid) {
		global $wpdb;

		$sheet = $wpdb->get_row("SELECT s.*, cats.name as category_name FROM {$wpdb->prefix}dict_sheets as s LEFT JOIN {$wpdb->prefix}dict_sheet_categories as cats ON cats.id = s.category_id WHERE s.id = '" . $sid . "'");
		return $sheet;
	}
}

if (!function_exists('iii_notepad_worksheet_component_action_html')) {
	function iii_notepad_worksheet_component_action_html() {
		$html = array();

		$html[] = '<div class="ic-right ic-move">';

		$html[] = '<div class="ic-move-up ic-move-btn">';
		$html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_01_MoveUP.png">';
		$html[] = '</div>';

		$html[] = '<div class="ic-move-down ic-move-btn">';
		$html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_02_MoveDOWN.png">';
		$html[] = '</div>';

		$html[] = '<div class="ic-move-delete ic-move-btn">';
		$html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_03_Delete.png">';
		$html[] = '</div>';

		$html[] = '</div>';

		return implode("\n", $html);
	}
}

if (!function_exists('iii_notepad_worksheet_generate_ws_html')) {
	function iii_notepad_worksheet_generate_ws_html($sid) {
		$x = iii_notepad_get_worksheet_from_db_by_id($sid);
		$q = $x->questions;

		$questions = (array) json_decode($q);

		$html 		= array();

		foreach ($questions as $key => $question) {
			$question 	= (array) $question;
			$index		= str_replace('qid', '', $key);
			$class		= ($index == '1') ? '' : 'hidden';

			$html[] = '<div id="ws' . $index . '" class="item-ws ' . $class . '">';

			if (!empty($question)) {
				$answer_html = array();

				foreach ($question as $module => $module_value) {
					//Single Answer Component
					if (strpos($module, 'single_answer_') !== false && $module_value != '') {
						$answer_html[] = '<div class="item-answer">';
						$answer_html[] = '<p class="item-title a-title">' . esc_html__('Answer', 'iii-notepad') . '</p>';
						$answer_html[] = '<input class="txtEditor" name="a-txt" value="' . $module_value . '" />';
						$answer_html[] = '</div>';
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

						$answer_html[] = '<div class="item-answer multi-choice">';
						$answer_html[] = '<p class="item-title a-title">' . esc_html__('Multiple Choice  Answer', 'iii-notepad') . '</p>';

						for ($i = 1; $i < 7; $i++) {
							$value = $new_arr[$i];

							$choice = str_replace('choice_' . $i . ':', '', $value[0]);
							$text = str_replace('text_' . $i . ':', '', $value[1]);
							$checked = ($choice == '1') ? '' : 'checked';

							$answer_html[] = '<div id="ac-' . $i . '" class="item-child">';
							$answer_html[] = '<div class="choice-switch">';
							$answer_html[] = '<label class="on-off-switch"><input type="checkbox" ' . $checked . '/>';
							$answer_html[] = '<span class="on-off-slider">';
							$answer_html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_19_Incorrect_Answer_Switch.png" class="off">';
							$answer_html[] = '<img class="on" src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_18_Correct_Answer_Switch.png">';
							$answer_html[] = '</span></label></div>';
							$answer_html[] = '<div class="choice-text"><label>Choice ' . $i . ':</label><textarea>' . $text . '</textarea></div>';
							$answer_html[] = '</div>';
						}

						$answer_html[] = '</div>';
					}
				}

				foreach ($question as $module => $module_value) {
					//Image Component
					if (strpos($module, 'image_') !== false) {
						$value 		= json_decode($module_value);
						$img_title	= array();

						if (!empty($value)) {
							foreach ($value as $v) {
								$img_title[] = get_the_title($v);
							}
						}

						$html[] = '<div class="item-component ic-image"><div class="ic-inner">';

						$html[] = '<div class="ic-left">';
						$html[] = '<div class="ic-btn-image ic-btn"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_15_Insert_Image.png" />' . esc_html__('Insert', 'iii-notepad') . '</div>';
						$html[] = '<div class="ic-image-value">' . implode(', ', $img_title) . '</div>';
						$html[] = '<input class="ic-image-input" type="file" value="" style="display: none;"/>';
						$html[] = '<input type="hidden" class="ic-image-has-img" value="1"/>';
						$html[] = '<input type="hidden" class="ic-image-current-val" value="' . $module_value . '"/>';
						$html[] = '</div>';

						$html[] = iii_notepad_worksheet_component_action_html();
						$html[] = '</div></div>';
					}

					//Video Component
					if (strpos($module, 'video_') !== false) {
						$html[] = '<div class="item-component ic-video"><div class="ic-inner">';

						$html[] = '<div class="ic-left">';
						$html[] = '<div class="ic-btn-video ic-btn"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_16_Insert_Video.png" />' . esc_html__('Insert', 'iii-notepad') . '</div>';
						$html[] = '<div class="ic-popup-video hidden">';
						$html[] = '<button>' . esc_html__('Check', 'iii-notepad') . '</button>';
						$html[] = '<input type="text" />';
						$html[] = '</div>';
						$html[] = '<div class="ic-video-value">' . $module_value . '</div>';
						$html[] = '<input class="ic-video-input" type="hidden" value="' . $module_value . '" />';
						$html[] = '</div>';

						$html[] = iii_notepad_worksheet_component_action_html();
						$html[] = '</div></div>';
					}

					//Text Component
					if (strpos($module, 'text_') !== false) {
						$html[] = '<div class="item-component ic-text"><div class="ic-inner">';

						$html[] = '<div class="ic-left">';
						$html[] = '<div class="ic-btn-text ic-btn"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_17_Insert_Text.png" />' . esc_html__('Insert', 'iii-notepad') . '</div>';
						$html[] = '<div class="ic-popup-text hidden">';
						$html[] = '<textarea class="autoExpand"></textarea>';
						$html[] = '</div>';
						$html[] = '<div class="ic-text-value">' . $module_value . '</div>';
						$html[] = '<input class="ic-text-input" type="hidden" value="' . $module_value . '" />';
						$html[] = '</div>';

						$html[] = iii_notepad_worksheet_component_action_html();
						$html[] = '</div></div>';
					}

					//Question Component
					if (strpos($module, 'question_') !== false && $module_value != '') {
						$html[] = '<div class="item-component item-qa">';

						$html[] = '<div class="item-question">';
						$html[] = '<div class="item-title q-title">' . esc_html__('Question', 'iii-notepad');
						$html[] = iii_notepad_worksheet_component_action_html();
						$html[] = '</div>';
						$html[] = '<input class="txtEditor" name="q-txt" value="' . $module_value . '" />';
						$html[] = '</div>';

						$html[] = implode('', $answer_html);

						$html[] = '</div>';
 					}


				}
			}

			$html[] = '<div class="item-btn-bottom"><div class="item-btn-save-question"><span>' . esc_html__('Save', 'iii-notepad') . '</span></div></div>';

			$html[] = '</div>';
		}

		return implode("\n", $html);
	}
}

if (!function_exists('iii_notepad_worksheet_generate_ws_question_number_section_html')) {
	function iii_notepad_worksheet_generate_ws_question_number_section_html($sid) {
		$x = iii_notepad_get_worksheet_from_db_by_id($sid);
		$q = $x->questions;

		$questions = (array) json_decode($q);

		$html 		= array();

		if (!empty($questions)) {
			foreach ($questions as $key => $question) {
				$index = str_replace('qid', '', $key);
				$class = ($index == '1') ? 'active' : '';

				$html[] = '<li class="' . $class . '" data-index="' . $index . '">' . $index . '</li>';
			}
		}

		return implode("\n", $html);
	}
}

if (!function_exists('iii_notepad_worksheet_preview_ws_html')) {
	function iii_notepad_worksheet_preview_ws_html($wid) {
		$x 			= iii_notepad_get_worksheet_from_db_by_id($wid);
		$questions	= $x->questions;
		$questions	= (array) json_decode($questions);

		$html = array();

		$html[] = '<div class="ws-preview-hidden">';
		$html[] = '<input type="hidden" class="wsp-current-q" value="1"/>';
		$html[] = '<input type="hidden" class="wsp-current-ws" value="' . $wid . '"/>';
		$html[] = '</div>';

		$html[] = '<div class="ws-preview-top">';

		// Preview Type & Subject
		$html[] = '<div class="ws-preview-type mode-' . $x->mode_type . '">';

		if ($x->mode_type == '1') {
			$html[] = '<span class="wsp-type"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/Search_Icon_PRACTICE.png" /></span>';
		} else if ($x->mode_type == '2') {
			$html[] = '<span class="wsp-type"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/Search_Icon_TEST.png" /></span>';
		}

		$html[] = '<span class="wsp-subject">' . $x->category_name . '</span>';

		$html[] = '</div>';

		// Preview Title
		$html[] = '<div class="wsp-title">' . esc_attr($x->sheet_name) . '</div>';
		$html[] = '<div class="wsp-close">';
		$html[] = '<span>' . esc_html__('Close', 'iii-notepad') . '</span>';
		$html[] = '<img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/icon_11_Delete_Worksheet.png" />';
		$html[] = '</div>';


		// Preview input answer
		$html[] = '<div class="ws-preview-answer">';

		$html[] = '<input type="text" class="wsp-answer-input" placeholder="' . esc_html__('Type answer here', 'iii-notepad') . '"/>';

		if ($x->mode_type == '1') {
			$html[] = '<div class="wsp-answer-btn-check">';
			$html[] = '<span>' . esc_html__('Check', 'iii-notepad') . '</span>';
			$html[] = '<span class="img-correct"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/Check_Correct.png" /></span>';
			$html[] = '<span class="img-wrong"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/Check_Wrong.png" /></span>';
			$html[] = '</div>';
		}

		if ($x->mode_type == '2') {
			$html[] = '<div class="wsp-answer-btn-submit"><span>' . esc_html__('Submit & Next', 'iii-notepad') . '</span></div>';
		} else if ($x->mode_type == '1') {
			$html[] = '<div class="wsp-answer-btn-show"><span>' . esc_html__('Show Answer', 'iii-notepad') . '</span></div>';
		}

		$html[] = '<div class="wsp-answer-content hidden"><div class="wspa-title">' . esc_html__('The Answer:', 'iii-notepad') . '</div><div class="wspa-content"></div></div>';

		$html[] = '</div>';

		// Preview questions action
		$html[] = '<div class="ws-preview-question-action">';

		$html[] = '<div class="wsp-arrow wsp-arrow-left"><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/Question_03_Left_Arrow.png" /><span>' . esc_html__('Previous', 'iii-notepad') . '</span></div>';
		$html[] = '<div class="wsp-count-question">';
		$html[] = '<span>' . esc_html__('Question', 'iii-notepad') . '</span><span class="qn">1</span><span>' . esc_html__('of', 'iii-notepad') . '</span><span class="qc">' . count($questions) . '</span>';
		$html[] = '</div>';
		$html[] = '<div class="wsp-arrow wsp-arrow-right"><span>' . esc_html__('Next', 'iii-notepad') . '</span><img src="' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/images/worksheet/Question_04_Right_Arrow.png" /></div>';

		$html[] = '</div>';

		// Preview questions content
		if (!empty($questions)) {
			$html[] = '<div class="ws-preview-questions-content">';
			$html[] = '<div class="wsp-question-title">' . esc_html__('Question', 'iii-notepad') . '</div>';

			$i = 1;

			foreach ($questions as $key => $question) {
				$question 	= (array) $question;

				$class = ($i == 1) ? 'active' : 'hidden';

				$html[] = '<div class="wsp-question-item ' . $key . ' ' . $class . '">';

				if (!empty($question)) {
					foreach ($question  as $module => $module_value) {
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
								'1'		=> array($list_choice[0], $list_choice[1]),
								'2'		=> array($list_choice[2], $list_choice[3]),
								'3'		=> array($list_choice[4], $list_choice[5]),
								'4'		=> array($list_choice[6], $list_choice[7]),
								'5'		=> array($list_choice[8], $list_choice[9]),
								'6'		=> array($list_choice[10], $list_choice[11]),
							);

							$html[] = '<div class="wsp-component wsp-list-choice">';

							for ($j = 1; $j < 7; $j++) {
								$value 		= $new_arr[$j];
								$text		= str_replace('text_' . $j . ':', '', $value[1]);

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
				}

				$html[] = '</div>';

				$i++;
			}

			$html[] = '</div>';
		}

		return implode('', $html);
	}
}

if (!function_exists('iii_notepad_worksheet_select_sheet_subject_from_db')) {
	function iii_notepad_worksheet_select_sheet_subject_from_db() {
		global $wpdb;

		$cats 		= $wpdb->get_results("SELECT * FROM {$wpdb->prefix}dict_sheet_categories WHERE new_cat = '1'");
		$options	= array();

		if (!empty($cats)) {
			foreach ($cats as $cat) {
				$options[$cat->id] = $cat->name;
			}
		}

		return $options;
	}
}

if (!function_exists('iii_notepad_worksheet_create_subject_options')) {
	function iii_notepad_worksheet_create_subject_options() {
		$options = iii_notepad_worksheet_select_sheet_subject_from_db();
		$html = array();

		$html[] = '<option value="">' . esc_html__('Select Subject', 'iii-notepad') . '</option>';

		if (!empty($options)) {
			foreach ($options as $key => $value) {
				$html[] = '<option value="' . $key . '">' . $value . '</option>';
			}
		}

		return implode('', $html);
	}
}

if (!function_exists('iii_notepad_notepad_css_for_generate_image_from_sheet')) {
	function iii_notepad_notepad_css_for_generate_image_from_sheet() {
		?>
		<style tyle="text/css">
			/* worksheet preview */
			.ws-preview-top {
				background: #f4f7f7;
				padding-top: 27px;
				padding-left: 0;
				padding-right: 0;
				padding-bottom: 0;
			}

			.ws-preview-type img {
				width: 16px;
				height: 16px;
			}

			.ws-preview-type .wsp-subject {
				font-size: 13px;
				color: #4ba649;
				margin-left: 5px;
			}

			.ws-preview-type.mode-2 .wsp-subject {
				color: #08c;
			}

			.ws-preview-type {
				display: flex;
				align-items: center;
				padding: 0 16px;
			}

			.wsp-title {
				color: #323130;
				font-size: 19px;
				margin-top: 13px;
				padding: 0 16px;
			}

			.wsp-close {
				display: flex;
				align-items: center;
				position: absolute;
				right: 35px;
				bottom: 5px;
				cursor: pointer;
			}

			.wsp-close span {
				color: #9d9d9d;
				font-size: 11px;
				text-transform: uppercase;
				font-weight: 600;
			}

			.wsp-close img {
				width: 16px;
				height: 16px;
				margin-left: 5px;
			}

			.ws-preview-answer {
				position: relative;
				height: 45px;
				border-top: 1px solid #e3e1e2;
				border-bottom: 1px solid #e3e1e2;
				display: flex;
				align-items: center;
				background: #fff;
			}

			.ws-preview-answer .wsp-answer-input {
				width: calc(100% - 116px);
				border: none;
				height: 43px;
				margin: 0;
				padding-left: 13px;
				color: #4b4b4b;
				font-size: 13px;
			}

			.ws-preview-answer .wsp-answer-input::placeholder,
			.ws-preview-answer .wsp-answer-input:-ms-input-placeholder,
			.ws-preview-answer .wsp-answer-input::-webkit-input-placeholder {
				color: #cacaca;
			}

			.ws-preview-answer .wsp-answer-btn-check {
				position: absolute;
				color: #64c762;
				right: 134px;
				font-size: 13px;
				text-decoration: underline;
				cursor: pointer;
			}

			.wsp-answer-btn-check .img-correct,
			.wsp-answer-btn-check .img-wrong {
				display: none;
			}

			.wsp-answer-btn-check.correct > span,
			.wsp-answer-btn-check.wrong > span {
				display: none;
			}

			.wsp-answer-btn-check.correct > .img-correct {
				display: block;
			}

			.img-correct img {
				width: 27px;
				height: 27px;
			}

			.wsp-answer-btn-check.wrong > .img-wrong {
				display: block;
			}

			.img-wrong img {
				width: 22px;
				height: 22px;
			}

			.ws-preview-answer .wsp-answer-btn-show {
				width: 103px;
				background: #64c762;
				text-align: center;
				height: 45px;
				line-height: 45px;
				cursor: pointer;
				color: #fff;
			}

			.ws-preview-answer .wsp-answer-btn-submit {
				width: 103px;
				background: #08c;
				text-align: center;
				height: 45px;
				line-height: 45px;
				cursor: pointer;
				color: #fff;
			}

			.ws-preview-question-action {
				background: #f4f7f7;
				display: flex;
				align-items: center;
				height: 36px;
				padding: 0 13px;
				justify-content: space-between;
			}

			.ws-preview-question-action img {
				width: 16px;
				height: 16px;
			}

			.wsp-arrow {
				display: flex;
				align-items: center;
				font-size: 13px;
				color: #6c6c6c;
				cursor: pointer;
			}

			.wsp-arrow-left span {
				margin-left: 11px;
			}

			.wsp-arrow-right span {
				margin-right: 11px;
			}

			.wsp-count-question {
				font-size: 15px;
				color: #5d5d5d;
			}

			.wsp-count-question .qc,
			.wsp-count-question .qn {
				font-weight: bold;
				margin: 0 2px;
			}

			.ws-preview-questions-content {
				padding: 27px 0;
				font-size: 14px;
				color: #4b4b4b;
				background: #fff;
				width: 600px;
			}

			.wsp-question-title {
				font-size: 17px;
				color: black;
				margin-bottom: 10px;
				padding: 0 13px;
				text-transform: uppercase;
			}

			.wsp-text {
				border: 1px solid #e0e0e0;
				padding: 15px 12px;
				font-size: 14px;
				font-style: italic;
				color: #7b7b7b;
			}

			.wsp-component:not(.wsp-video) {
				margin: 23px 13px;
			}

			.wsp-video {
				background: #000;
				padding: 27px 13px;
			}

			.wsp-list-choice img {
				width: 23px;
				height: 23px;
			}

			.wsp-list-choice .wsp-choice-item {
				display: flex;
				align-items: center;
				margin-bottom: 17px;
				font-size: 13px;
				color: #4b4b4b;
			}

			.wsp-list-choice .wsp-choice-item span {
				margin-right: 7px;
				cursor: pointer;
			}

			.wsp-list-choice .wsp-choice-item .select {
				display: none;
			}

			.wsp-list-choice .wsp-choice-item.active .select {
				display: inline-block;
			}

			.wsp-list-choice .wsp-choice-item.active .unselect {
				display: none;
			}

			.wsp-answer-content {
				position: absolute;
				background: #65c762;
				width: 100%;
				top: 44px;
				padding: 23px 13px;
				font-size: 14px;
				color: #fff;
			}

			.wsp-answer-content .wspa-title {
				font-weight: bold;
				margin-bottom: 10px;
			}

			.wsp-videoWrapper {
				position: relative;
				padding-bottom: 56.25%; /* 16:9 */
				padding-top: 25px;
				height: 0;
			}
			.wsp-videoWrapper iframe {
				position: absolute;
				top: 0;
				left: 0;
				width: 100%;
				height: 100%;
				border: none;
			}

			.ws-preview-questions-content .wsp-question-item .wsp-component:first-child {
				margin-top: 0;
			}
			</style>
		<?php
	}
}