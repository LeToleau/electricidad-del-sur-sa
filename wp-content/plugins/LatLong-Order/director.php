<?php
/**
* Plugin Name: Lat Long -- The Order Core Functionality
* Plugin URI: 
* Description: Functional and data model dependencies for The Order's main marekting site
* Version: 1.0
* Author: 
* Author URI: 
**/

define( 'ORDER_CORE_PATH', plugin_dir_path( __FILE__ ) );

include( ORDER_CORE_PATH . 'inc/login.php');

include( ORDER_CORE_PATH . 'inc/create-custom-post-types.php');
include( ORDER_CORE_PATH . 'inc/create-custom-taxonomies.php');


include( ORDER_CORE_PATH . 'acf/acf-options.php');

include( ORDER_CORE_PATH . 'inc/admin-views.php');




///Test widget for debug purposes

add_action('wp_dashboard_setup', function(){
    global $wp_meta_boxes;
 
    wp_add_dashboard_widget('custom_help_widget', 'Order Deploy Test', 'order_custom_dashboard_debug');
});
 
function order_custom_dashboard_debug() {
    echo '<p>Testing deploy status: 10</p>';
}


/**
 * Enqueue Admin assets
*/
    add_action( 'admin_enqueue_scripts', 'll_add_admin_styles',20);
    function ll_add_admin_styles(){
        $dir =  plugin_dir_path(__FILE__);
        
        
        //Styles
            $file = '/styles/order-admin.css';
            if(file_exists($dir.$file)){
                wp_register_style( 'order-admin',  plugins_url($file , __FILE__),false, filemtime($dir.$file),'all' );
                wp_enqueue_style( 'order-admin' );
            }
            
        //Scripts
            $file = '/js/order-admin.js';
            if(file_exists($dir.$file)){
                wp_register_script( 'order-admin-js',  plugins_url($file , __FILE__),['jquery'], filemtime($dir.$file),true );
                wp_enqueue_script( 'order-admin-js' );
            }
            
    }