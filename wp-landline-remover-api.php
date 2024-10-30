<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://landlineremover.com/
 * @since             1.0.2
 * @package           wp_landline_remover_api
 *
 * @wordpress-plugin
 * Plugin Name:       Landline Remover
 * Plugin URI:        https://landlineremover.com/wp_landline_remover_api/
 * Description:       This plugin integrates a Landline Remover API into wordpress envoirnment so users can easily access the Landline Remover API functions.for example the user can search his/her phone number and check its type and remaining credits.Important Note: This is a 3rd party API we do not own these services. You can read more about this API pn thier official website https://landlineremover.com/. For terms of services visit https://landlineremover.com/terms-of-services/. For privacy policy visit https://landlineremover.com/privary-policy/
 * Version:           1.0.2
 * Author:            Portman Holdings LLC
 * Author URI:        https://landlineremover.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wp_landline_remover_api
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'wp_landline_remover_api_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wp-landline-remover-api-activator.php
 */
function activate_wp_landline_remover_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-landline-remover-api-activator.php';
	wp_landline_remover_api_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wp-landline-remover-api-deactivator.php
 */
function deactivate_wp_landline_remover_api() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wp-landline-remover-api-deactivator.php';
	wp_landline_remover_api_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wp_landline_remover_api' );
register_deactivation_hook( __FILE__, 'deactivate_wp_landline_remover_api' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-landline-remover-api.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wp_landline_remover_api() {

	$plugin = new wp_landline_remover_api();
	$plugin->run();

}
run_wp_landline_remover_api();
