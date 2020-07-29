<?php
/**
* Plugin Name: III Notepad
* Plugin URI: http://3i.com.vn
* Description: Notepad plugin.
* Version: 1.0.0
* Author: Nguyen Hieu Trung
* Author URI: http://3i.com.vn
* Text Domain: iii-notepad
*/
if (!class_exists('III_Notepad')) {
	class III_Notepad {
		public function __construct() {
			$this->define_constant();
			$this->load_library();
			$this->load_helper();

			show_admin_bar(false);
		}

		// define constant.
		public function define_constant() {
			define('III_NOTEPAD_PLUGIN_DIR_PATH', plugin_dir_path(__FILE__));
			define('III_NOTEPAD_PLUGIN_DIR_URL', plugin_dir_url(__FILE__));
		}

		// load library.
		public function load_library() {
			if (!class_exists('Gamajo_Template_Loader')) {
				require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/lib/template/class-gamajo-template-loader.php';
				require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/lib/template/template.php';
			}
		}

		// load helper.
		public function load_helper() {
			require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/inc/func/enqueue.php';
			require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/inc/func/helpers.php';
			require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/inc/func/hooks.php';

			require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/inc/func/zoom.php';

			// load classes
			require_once III_NOTEPAD_PLUGIN_DIR_PATH . '/inc/classes/clean-state.php';
		}
	}

	new III_Notepad();
}