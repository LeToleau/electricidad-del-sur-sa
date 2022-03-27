<?php 
/** Customize various admin views based on role and permissions */



//Remove WP Upgrade notices for non-admins
    add_action('admin_head', function() {
        if(!current_user_can('manage_options')){
            remove_action( 'admin_notices', 'update_nag',      3  );
            remove_action( 'admin_notices', 'maintenance_nag', 10 );
        }
    });

// Remove Dashboard's widgets
    add_action('wp_dashboard_setup', 'll_remove_dashboard_widgets' );
    function ll_remove_dashboard_widgets() {

        global $wp_meta_boxes;
        unset($wp_meta_boxes['dashboard']);

    }