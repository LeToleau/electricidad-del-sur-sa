<?php
/**
  Configuration changes for default ACF behavior + internal/external integrations  
*/

new LL_ACF_Customizations();



class LL_ACF_Customizations {
	
	public function __construct() {

        /*
            Only allow fields to be edited on local or dev - but know that any changes to dev are for testing only, they will be overwritten on the next build
        */
        if(!in_array(wp_get_environment_type(), ['local','development']))
			add_filter( 'acf/settings/show_admin', '__return_false' );

		// Save fields in functionality plugin
			// add_filter( 'acf/settings/save_json', [$this, 'get_local_json_path'] );
			// add_filter( 'acf/settings/load_json', [$this, 'add_local_json_path'] );

		// Register options page
        	add_action( 'init', [$this, 'register_options_page'] );
        
        //customize colors
        	add_action( 'acf/input/admin_footer', [$this,'ll_acf_color_palette'] );

        //filter allowed fields for the ACF User Role Field Setting Plugin
        	add_filter('acf/user_role_setting/exclude_field_types', [$this,'user_role_setting_excluded_field_types']);
	}

	/**
	 * Define where the local JSON is saved
	 *
	 * @return string
	 */
        public function get_local_json_path() {
            return dirname( __FILE__ ) . '/acf-json';
        }

	/**
	 * Add our path for the local JSON
	 *
	 * @param array $paths
	 *
	 * @return array
	 */
        public function add_local_json_path( $paths ) {
            $paths[] =  dirname( __FILE__ ) . '/acf-json';

            return $paths;
        }

	/**
	 * Register Options Page
	 *
	 */
        function register_options_page() {
            if ( function_exists( 'acf_add_options_page' ) ) {
                acf_add_options_page(array(
                    'page_title' 	=> 'Order Site Options',
                    'menu_title'	=> 'Order Site Options',
                    'menu_slug' 	=> 'order-site-options',
                    'capability'	=> 'edit_posts',
                    'redirect'		=> false
                ));	
            }
        }

    /**
     * ACF Color Palette
     *
     * Add default color palatte to ACF color picker for branding
     * Match these colors to colors in /functions.php 
     * src: https://whiteleydesigns.com/synchronizing-your-acf-color-picker-with-gutenberg-color-classes/
     *
    */
        function ll_acf_color_palette() { 
            if(!function_exists('order_theme_colors'))
                return;
            
            $palette = order_theme_colors();
            $colors = array_column($palette,'color');
        ?>
            <script type="text/javascript">
            (function($) {
                acf.add_filter('color_picker_args', function( args, $field ){
                    // add the hexadecimal codes here for the colors you want to appear as swatches
                    args.palettes = <?php echo json_encode($colors); ?>
                    // return colors
                    return args;
                });
            })(jQuery);
            </script>
        <?php } 
}

/*
    Map hex back to label - helper func to connect admin-side color picker to FE class 
    names
    Ex: if meta data field contains "#ffffff", this function will return "white" for use as something like `class="has-background-white"`
*/
    function ll_map_hex_to_color($meta){
        
        $palette = order_theme_colors();

        // Loop over colors array and set proper class if background color selection matches value
        foreach( $palette as $color ) {
            if( strtolower($color['color']) == $meta ) {
                return $color['slug'];
            }
        }
        return false;
    }