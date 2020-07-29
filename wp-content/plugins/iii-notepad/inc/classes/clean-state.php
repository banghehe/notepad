<?php
/**
 * Created by vagrant.
 * User: vagrant
 * Date: 2/14/2020
 * Time: 8:42 AM
 */

class III_Clean_State {
	private static $instance;

	public function __construct() {
		add_action('template_redirect', array($this, 'hooks'), 99999);
	}

	public function hooks() {
		remove_all_actions('wp_head');
        remove_all_actions('wp_print_styles');
        remove_all_actions('wp_print_head_scripts');

        // Add back WP native actions that we need.
        add_action('wp_head', 'wp_enqueue_scripts', 1);
        add_action('wp_head', 'wp_print_styles', 8);
        add_action('wp_head', 'wp_print_head_scripts', 9);
        add_action('wp_head', array($this, 'strip_enqueues'), -1);

        add_filter('template_include', array($this, 'inject_template'), 99999);
	}

	public function strip_enqueues() {
        remove_all_actions('wp_enqueue_scripts');
        add_action('wp_enqueue_scripts', array($this, 'reset_enqueues'), 999999);
    }

    public function reset_enqueues() {
    	global $wp_styles;
        global $wp_scripts;

        // @codingStandardsIgnoreStart
        $wp_styles	= new WP_Styles();
        $wp_scripts	= new WP_Scripts();
        // @codingStandardsIgnoreEnd

        do_action('wp_enqueue_scripts_clean');
    }

	public function inject_template($page_template) {
		$page_template = iii_template_redirect($page_template);

		return $page_template;
	}

    public static function instance() {
        if (!isset(self::$instance)) {
            self::$instance = new III_Clean_State;
        }

        return self::$instance;
    }

    public static function init() {
    	return self::instance();
    }
}