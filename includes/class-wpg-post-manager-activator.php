<?php

/**
 * Fired during plugin activation
 *
 * @since      1.0.0
 *
 * @package    Wpg_Post_Manager
 * @subpackage Wpg_Post_Manager/includes
 * @author     Anoru <anorupl@gmail.com>
 * 
 */

/**
 * Fired during plugin activation.
 *
 * This class defines all code necessary to run during the plugin's activation.
 *
 * @since      1.0.0
 */
class Wpg_Post_Manager_Activator {



	/**
	 * Short Description. (use period)
	 *
	 * Long Description.
	 *
	 * @since    1.0.0
	 */
	public static function activate() {

		require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-wpg-custom-post-type.php';
		
		// Custom post type client_reviews
		$custom_post_type_active = new Wpg_Custom_Post_Type('wpg-post-manager','1.0.0');

		$custom_post_type_active->register_post_types();
		$custom_post_type_active->setup_taxonomy();
		
		flush_rewrite_rules();

	}

}
