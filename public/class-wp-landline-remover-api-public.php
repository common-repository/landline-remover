<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://landlineremover.com/
 * @since      1.0.0
 *
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/public
 * @author     Portman Holdings LLC <email@example.com>
 */
class wp_landline_remover_api_Public {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $wp_landline_remover_api    The ID of this plugin.
	 */
	private $wp_landline_remover_api;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $wp_landline_remover_api       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_landline_remover_api, $version ) {

		$this->wp_landline_remover_api = $wp_landline_remover_api;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wp_landline_remover_api_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wp_landline_remover_api_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

// 		wp_enqueue_style( $this->wp_landline_remover_api, plugin_dir_url( __FILE__ ) . 'css/wp-landline-remover-api-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in wp_landline_remover_api_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The wp_landline_remover_api_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

// 		wp_enqueue_script( $this->wp_landline_remover_api, plugin_dir_url( __FILE__ ) . 'js/wp-landline-remover-api-public.js', array( 'jquery' ), $this->version, false );

	}

}
