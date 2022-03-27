<?php
/**
  Add custom ACF Field Types
    ref boilerplate: https://github.com/AdvancedCustomFields/acf-field-type-template
*/

// exit if accessed directly
if( ! defined( 'ABSPATH' ) ) exit;


new LL_ACF_acf_plugin_customFields();

class LL_ACF_acf_plugin_customFields {
  var $settings;
	
	function __construct() {
        
        // settings
        // - these will be passed into the field class.
        $this->settings = array(
        'version'	=> '1.0.0',
        'url'		=> plugin_dir_url( __FILE__ ),
        'path'		=> plugin_dir_path( __FILE__ )
        );
        
        
        // include field
        add_action('acf/include_field_types', [$this, 'include_field']); // v5
    }

    public function include_field( $version = false ) {
    
        // support empty $version
        if( !$version ) $version = 5;
        
        // include
            include_once('fields/class-LL_ACF-acf-field-StudentInfoField-v' . $version . '.php');
            include_once('fields/class-LL_ACF-acf-field-CompletedResourcesField-v' . $version . '.php');
            include_once('fields/class-LL_ACF-acf-field-MentorshipMessagesField-v' . $version . '.php');
            include_once('fields/class-LL_ACF-acf-field-DownloadCSVField-v' . $version . '.php');
            include_once('fields/class-LL_ACF-acf-field-MentorshipLinkField-v' . $version . '.php');
            include_once('fields/class-LL_ACF-acf-field-AccessibleSelectField-v' . $version . '.php');
    }
}