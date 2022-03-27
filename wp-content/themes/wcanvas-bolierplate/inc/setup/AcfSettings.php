<?php

/**
 * Class to keep track of hooks and filters tied into ACF plugin
 */

class AcfSettings
{

	function __construct()
	{
		add_filter('acf/settings/load_json', array($this, 'localJSON'));
		add_action('acf/init', array($this, 'googleMapsApiKey'));
		add_action('acf/init', array($this, 'options_page'));
		$this->addOptionsSubPages();
		add_filter('acf/fields/wysiwyg/toolbars', array($this, 'wysiwygToolBars'));
	}

	/**
	 * ACF Fix local json
	 */
	function localJSON($paths)
	{
		// remove original path (optional)
		unset($paths[0]);


		// append path
		$paths[] = get_stylesheet_directory() . '/acf-json';


		// return
		return $paths;
	}

	/**
	 * ACF Map Backend APIKEY
	 */
	function googleMapsApiKey()
	{
		acf_update_setting('google_api_key', get_field('api_key', 'option'));
	}

	/**
	 * Enable ACF Theme Options
	 */
	function options_page()
	{

		acf_add_options_page(array(
			'page_title' 	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false,
			'show_in_graphql' => true,
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Header',
			'menu_title'	=> 'Header',
			'parent_slug' 	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title' 	=> 'Footer',
			'menu_title'	=> 'Footer',
			'parent_slug' 	=> 'theme-general-settings',
		));
	}

	 /**
     * Add Sub Page to a custom post types (EG.: Archive Page)
     */
    function addOptionsSubPages()
    {
        if (function_exists('acf_add_options_page')) {
            acf_add_options_sub_page(array(
                'page_title'     => 'Resources Archive',
                'menu_title'    => 'Resources Archive',
                'parent_slug'    => 'edit.php?post_type=resources',
            ));
        }
    }

	/**
	 * Custom Wysiwyg ToolBars
	 */
	function wysiwygToolBars($toolbars)
	{
		//Example only bold toolbar
		$toolbars['Only Bold'] = array();
		$toolbars['Only Bold'][1] = array('bold');

		return $toolbars;

		// For your referencing pleasure:
		// $toolbars['Full'][1] = array('bold', 'italic', 'underline', 'bullist', 'numlist', 'alignleft', 'aligncenter', 'alignright', 'alignjustify', 'link', 'unlink', 'hr', 'spellchecker', 'wp_more', 'wp_adv' );
		// $toolbars['Full'][2] = array('styleselect', 'formatselect', 'fontselect', 'fontsizeselect', 'forecolor', 'pastetext', 'removeformat', 'charmap', 'outdent', 'indent', 'undo', 'redo', 'wp_help' );
	}

}