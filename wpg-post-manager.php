<?php
/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @since             1.0.0
 * @package           Wpg_Post_Manager
 *
 * @wordpress-plugin
 * Plugin Name:       Wpg Post Manager
 * Description:       Plugin adds three custom posts types (Gallery, Offer, Client Reviews) and one custom taxonomy (Gallery Categories) to allow the creation of website with portfolio.
 * Version:           1.0.0
 * Author:            Anoru
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpg-post-manager
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpg-post-manager.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpg-post-manager-activator.php
 */
function activate_wpg_post_manager() {
		
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpg-post-manager-activator.php';
	Wpg_Post_Manager_Activator::activate();

	// First run before	flush_rewrite_rules
	run_wpg_post_manager();
	
	flush_rewrite_rules();

	
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpg-post-manager-deactivator.php
 */
function deactivate_wpg_post_manager() {

	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpg-post-manager-deactivator.php';
	Wpg_Post_Manager_Deactivator::deactivate();
	
	flush_rewrite_rules();
}

register_activation_hook( __FILE__, 'activate_wpg_post_manager' );
register_deactivation_hook( __FILE__, 'deactivate_wpg_post_manager' );


/**
 * The template tags.
 */
require plugin_dir_path( __FILE__ ) . 'public/template-tag.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpg_post_manager() {

	$plugin = new Wpg_Post_Manager();
	$plugin->run();
	

}
run_wpg_post_manager();