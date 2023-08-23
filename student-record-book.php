<?php
ob_start();
/**

* Plugin Name: Student Record Book

* Plugin URI: https://www.ictknowledgehub.com/557-2/

* Description: Student Record Book Web Plugins
* 
* Version: 1.0.0

* Author: Manoj Madushantha

* Author URI: https://www.facebook.com/manoj.madushantha.3/

*/

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define( 'WP_MAX_MEMORY_LIMIT', '512M' );
define( 'SRB_VERSION', '1.0.0.0' );
define( 'SRB_NAME', 'student-record-book' );



function activate_srb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/srb-activator.php';
	SRB_Activator::srb_update_db_check();
}

function deactivate_srb() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/srb-deactivator.php';
	SRB_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_srb' );
register_deactivation_hook( __FILE__, 'deactivate_srb' );

add_action( 'plugins_loaded', 'activate_srb' );


/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-srb.php';


/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_srb() {
    add_action( 'activated_plugin', 'srb_activation_redirect_method' );

	$plugin = new SRB();
	$plugin->run();

}

function srb_activation_redirect_method( $plugin ) {
    if( $plugin == plugin_basename( __FILE__ ) ) {
        exit( wp_redirect( admin_url( 'admin.php?page=' . SRB_NAME ) ) );
    }
}

run_srb();
?>