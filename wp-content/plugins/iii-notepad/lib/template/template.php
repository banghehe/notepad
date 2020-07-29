<?php
/**
 * Created by vagrant.
 * User: vagrant
 */


if (!defined('ABSPATH')) {
	return;
}

// define template
class III_Notepad_Template extends Gamajo_Template_Loader {
	/**
	 * Prefix for filter names.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $filter_prefix = 'iii';

	/**
	 * Directory name where custom templates for this plugin should be found in the theme.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $theme_template_directory = 'iii';

	/**
	 * Reference to the root directory path of this plugin.
	 *
	 * @since 1.0.0
	 * @type string
	 */
	protected $plugin_directory = III_NOTEPAD_PLUGIN_DIR_PATH;
}