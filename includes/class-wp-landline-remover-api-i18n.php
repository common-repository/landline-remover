<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       https://landlineremover.com/
 * @since      1.0.0
 *
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/includes
 * @author     Portman Holdings LLC <email@example.com>
 */
class wp_landline_remover_api_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'plugin-name',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
