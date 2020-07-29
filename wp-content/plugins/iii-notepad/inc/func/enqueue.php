<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 1/8/2020
 * Time: 10:12 AM
 */

if (!function_exists('iii_notepad_enqueue_script_and_style')) {
	function iii_notepad_enqueue_script_and_style() {
		//style
		wp_enqueue_style( 'wp-mediaelement' );
		wp_enqueue_style('customscrollbar', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/css/vendor/customscrollbar.min.css', array());
		wp_enqueue_style('fontawesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css', array());
		wp_enqueue_style('iii-editor', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/css/vendor/editor.css', array());
		wp_enqueue_style('iii-selectBoxIt', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/css/vendor/jquery.selectBoxIt.css', array());
		wp_enqueue_style('bootstrap', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/css/vendor/bootstrap.min.css', array());

		wp_enqueue_style('zoom-style', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/css/zoom.css', array());
		wp_enqueue_style('iii-notepad-style', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/css/style.css', array());
		wp_add_inline_style('iii-notepad-style', 		'@font-face { font-family: "Myriad_regular"; src: url("' . III_NOTEPAD_PLUGIN_DIR_URL . '/assets/fonts/MYRIADPROREGULAR.ttf"); }');

		// //Websync
		// wp_enqueue_script('websync-fm', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.js', array());
		// wp_enqueue_script('websync-fm-websync', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.websync.js', array());
		// wp_enqueue_script('websync-fm-subscribers', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.websync.subscribers.js', array());
		// wp_enqueue_script('websync-fm-chat', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.websync.chat.js', array());


		//Websync
		wp_enqueue_script('websync-fm', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.js', array());
		wp_enqueue_script('websync-fm-websync', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.websync.js', array());
		wp_enqueue_script('websync-fm-subscribers', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.websync.subscribers.js', array());
		wp_enqueue_script('websync-fm-chat', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.websync.chat.js', array());

		// //Icelink
		// wp_enqueue_script('icelink-fm', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.icelink.js', array());
		// wp_enqueue_script('icelink-fm-webrtc', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.icelink.webrtc.js', array());
		// wp_enqueue_script('icelink-fm-websync', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/Scripts/fm.icelink.websync.js', array());
		// wp_enqueue_script('icelink-app', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/app.js', array());
		// wp_enqueue_script('icelink-localMedia', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/localMedia.js', array());
		// wp_enqueue_script('icelink-signalling', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/signalling.js', array());



		//Icelink
		wp_enqueue_script('icelink-fm', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.icelink.js', array());
		wp_enqueue_script('icelink-fm-webrtc', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.icelink.webrtc.js', array());
		wp_enqueue_script('icelink-fm-websync', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/videoCall/lib/fm.icelink.websync.js', array());
		wp_enqueue_script('icelink-app', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/app.js', array());
		wp_enqueue_script('icelink-localMedia', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/localMedia.js', array());
		wp_enqueue_script('icelink-signalling', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/vendor/icelink/signalling.js', array());

		wp_enqueue_script('iii-socket', 'https://cdnjs.cloudflare.com/ajax/libs/socket.io/0.9.11/socket.io.js', array());

		//
//		wp_enqueue_style('react-select', 'https://source.zoom.us/1.7.0/css/react-select.css', array());
//
//		wp_enqueue_script('zoom-lib-1', 'https://source.zoom.us/1.7.0/lib/vendor/react.min.js', array('jquery'), false, true);
//		wp_enqueue_script('zoom-lib-2', 'https://source.zoom.us/1.7.0/lib/vendor/react-dom.min.js', array('jquery'), false, true);
//		wp_enqueue_script('zoom-lib-3', 'https://source.zoom.us/1.7.0/lib/vendor/redux.min.js', array('jquery'), false, true);
//		wp_enqueue_script('zoom-lib-4', 'https://source.zoom.us/1.7.0/lib/vendor/redux-thunk.min.js', array('jquery'), false, true);
//		wp_enqueue_script('zoom-lib-5', 'https://source.zoom.us/1.7.0/lib/vendor/jquery.min.js', array(), false, true);
//		wp_enqueue_script('zoom-lib-6', 'https://source.zoom.us/1.7.0/lib/vendor/lodash.min.js', array('jquery'), false, true);
//		wp_enqueue_script('zoom-lib-7', 'https://source.zoom.us/zoom-meeting-1.7.0.min.js', array('jquery'), false, true);
//

		//script
		wp_enqueue_script('jquery-ui-draggable');
		wp_enqueue_script('jquery-ui-resizable');
		wp_enqueue_script('jquery-ui-widget');
		wp_enqueue_script('wp-mediaelement');
		wp_enqueue_script('touch-punch', III_NOTEPAD_PLUGIN_DIR_URL . '/assets/js/vendor/touch-punch.min.js', array('jquery'), false, true);
		wp_enqueue_script('customscrollbar', III_NOTEPAD_PLUGIN_DIR_URL . '/assets/js/vendor/customscrollbar.min.js', array('jquery'), false, true);
		wp_enqueue_script('countdown', III_NOTEPAD_PLUGIN_DIR_URL . '/assets/js/vendor/jquery.countdown.js', array('jquery'), false, true);
		wp_enqueue_script('iii-editor', III_NOTEPAD_PLUGIN_DIR_URL . '/assets/js/vendor/editor.js', array('jquery'), false, true);
		wp_enqueue_script('iii-selectBoxIt', III_NOTEPAD_PLUGIN_DIR_URL . '/assets/js/vendor/jquery.selectBoxIt.min.js', array('jquery'), false, true);
		wp_enqueue_script('iii-user', III_NOTEPAD_PLUGIN_DIR_URL . '/assets/js/user.js', array('jquery'), false, true);

		if (is_home()) {
			if (isset($_GET['mode']) && $_GET['mode'] == 'ws') {
				wp_enqueue_script('iii-worksheet-script', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/js/worksheet.js', array('jquery'), false, true);

				wp_localize_script('iii-worksheet-script', 'iii_script', array(
					'site_url'				=> site_url('/'),
					'plugin_url'			=> III_NOTEPAD_PLUGIN_DIR_URL,
					'ajax_url'				=> admin_url('admin-ajax.php'),
					'login_url'				=> site_url('wp-login.php','login_post'),
					'buy_time_fail'			=> esc_html__('You dont have enough point to buy time', 'iii-notepad'),
					'buy_time_done'			=> esc_html__('You buy time done', 'iii-notepad'),
					'empty_video_url'		=> esc_html__('Please enter video url', 'iii-notepad'),
					'empty_layer'			=> esc_html__('Please chosen layer', 'iii-notepad'),
					'question_title'		=> esc_html__('Question', 'iii-notepad'),
					'answer_title'			=> esc_html__('Answer', 'iii-notepad'),
					'multi_answer_title'	=> esc_html__('Multiple Choice  Answer', 'iii-notepad'),
					'choice_text'			=> esc_html__('Choice', 'iii-notepad'),
					'ws_title'				=> esc_html__('Worksheet Title:', 'iii-notepad'),
					'ic_btn_video'			=> esc_html__('Insert', 'iii-notepad'),
					'ic_btn_video_button'	=> esc_html__('Check', 'iii-notepad'),
					'ic_btn_text'			=> esc_html__('Insert', 'iii-notepad'),
					'save_question'			=> esc_html__('Save', 'iii-notepad'),
					'add_other_question'	=> esc_html__('Add Another Question', 'iii-notepad'),
					'ic_btn_image'			=> esc_html__('Insert', 'iii-notepad'),
					'ws_notice_clear'		=> esc_html__('Do you want to clear texts and selections from the screen?', 'iii-notepad'),
					'ws_notice_delete'		=> esc_html__('Do you want to save the worksheet before close?', 'iii-notepad'),
					'ws_notice_question'	=> esc_html__('Do you want to delete a question page?', 'iii-notepad'),
					'ws_notice_insert_video'	=> esc_html__('Youtube link is invalid', 'iii-notepad'),
					'ws_notice_delete_ws_in_list_search'	=> esc_html__('Do you want be permanently remove current worksheet? ', 'iii-notepad'),
					'ws_notice_save_current_sheet_open_list_sheet'	=> esc_html__('Would you like to save worksheet before leave?', 'iii-notepad'),
					'ws_notice_need_login'	=> esc_html__('Please login before saving a worksheet', 'iii-notepad'),
					'ws_notice_save_ws_done'	=> esc_html__('Worksheet Saved.', 'iii-notepad'),
					'ws_notice_title_empty'		=> esc_html__('Title/Subject cannot empty', 'iii-notepad'),
					'ws_simple_worksheet'		=> esc_html__('This is sample worksheet', 'iii-notepad'),
				));
			} else if (isset($_GET['mode']) && $_GET['mode'] == 'regular') {
				wp_enqueue_script('regular-script', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/js/regular.js', array('jquery'), false, true);

				wp_localize_script('regular-script', 'iii_script', array(
					'site_url'				=> site_url('/'),
					'plugin_url'			=> III_NOTEPAD_PLUGIN_DIR_URL,
					'ajax_url'				=> admin_url('admin-ajax.php'),
					'buy_time_fail'			=> esc_html__('You dont have enough point to buy time', 'iii-notepad'),
					'buy_time_done'			=> esc_html__('You buy time done', 'iii-notepad'),
					'empty_video_url'		=> esc_html__('Please enter video url', 'iii-notepad'),
					'empty_layer'			=> esc_html__('Please chosen layer', 'iii-notepad'),
				));
			} else {

				//wp_enqueue_script('zoom', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/js/zoom.js', array('jquery'), false, true);
//				wp_localize_script('zoom', 'iii_script', array(
//					'site_url'				=> site_url('/'),
//					'plugin_url'			=> III_NOTEPAD_PLUGIN_DIR_URL,
//					'ajax_url'				=> admin_url('admin-ajax.php'),
//				));


				wp_enqueue_script('html2canvas', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/js/vendor/html2canvas.min.js', array('jquery'), false, true);
				wp_enqueue_script('iii-notepad-script', III_NOTEPAD_PLUGIN_DIR_URL . 'assets/js/notepad.js', array('jquery'), false, true);

				wp_localize_script('iii-notepad-script', 'iii_script', array(
					'site_url'				=> site_url('/'),
					'plugin_url'			=> III_NOTEPAD_PLUGIN_DIR_URL,
					'ajax_url'				=> admin_url('admin-ajax.php'),
					'buy_time_fail'			=> esc_html__('You dont have enough point to buy time', 'iii-notepad'),
					'buy_time_done'			=> esc_html__('You buy time done', 'iii-notepad'),
					'empty_video_url'		=> esc_html__('Please enter video url', 'iii-notepad'),
					'empty_layer'			=> esc_html__('Please chosen layer', 'iii-notepad'),
					'points'				=> esc_html__(' points', 'iii-notepad')
				));

			}
		}
	}

	add_action('wp_enqueue_scripts_clean', 'iii_notepad_enqueue_script_and_style');
}


