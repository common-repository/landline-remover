<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       https://landlineremover.com/
 * @since      1.0.0
 *
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    wp_landline_remover_api
 * @subpackage wp_landline_remover_api/admin
 * @author     Portman Holdings LLC <email@example.com>
 */
class wp_landline_remover_api_Admin {

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
	 * @param      string    $wp_landline_remover_api       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $wp_landline_remover_api, $version ) {

		$this->wp_landline_remover_api = $wp_landline_remover_api;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
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

		wp_enqueue_style( $this->wp_landline_remover_api, plugin_dir_url( __FILE__ ) . 'css/wp-landline-remover-api-admin.css', array(), $this->version, 'all' );
	    wp_enqueue_style( 'maf_style', plugin_dir_url( __FILE__ ) . 'css/bootstrap.css' );
	    
	}

	/**
	 * Register the JavaScript for the admin area.
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

		wp_enqueue_script( $this->wp_landline_remover_api, plugin_dir_url( __FILE__ ) . 'js/wp-landline-remover-api-admin.js', array( 'jquery' ), $this->version, false );
		wp_enqueue_script( 'maf_script', plugin_dir_url( __FILE__ ) . 'js/bootstrap.js', array(), '1.0.0', false );

	}

    public function wp_landline_remover_api_menu() {
		add_menu_page(
			'Number Checker',
			'Number Checker',
			'manage_options',
			'wp-landline-remover-api-number-checker',
			[ $this, 'wp_landline_remover_api_number_checker_display' ],
			'dashicons-phone'
		);

		add_submenu_page(
			'wp-landline-remover-api-number-checker',
			'Number Checker',
			'Number Checker',
			'manage_options',
			'wp-landline-remover-api-number-checker',
			[ $this, 'wp_landline_remover_api_number_checker_display' ]
		);

		add_submenu_page(
			'wp-landline-remover-api-number-checker',
			'Settings',
			'Settings',
			'manage_options',
			'wp-landline-remover-api-settings',
			[ $this, 'wp_landline_remover_api_settings_display' ]
		);

	}

	public function wp_landline_remover_api_notify($to_show){
	       if(!isset($to_show['type']) || trim($to_show['type']) === ''){
            $to_show['type'] = 'success';
        }
    ?>
        <div class="notice notice-<?php esc_attr_e( $to_show['type'] )?> is-dismissible mt-4">
            <p><?php esc_html_e($to_show['mcg']);?></p>
            <button type="button" class="notice-dismiss"><span class="screen-reader-text">Dismiss this notice.</span></button>
        </div>
    <?php
    
	}
	
	public function wp_landline_remover_api_number_checker_display() {
		global $wpdb;
		$args = array(
            'post_type'      => 'wp_lrapi_settings',
            'posts_per_page' => -1,
            'post_status' => 'draft',
        );
        
    	$plugin_setings = get_option('wp_lrapi_settings');
    	if($plugin_setings !== false){
    	    $maf_lrapi_api_key = $plugin_setings;
    	}else{
    	    $this->wp_landline_remover_api_notify(['type'=>'error','mcg'=>'No API key found. Insert your API key in plugin settings page.']);
    	}
    	
    	if(isset($_POST['maf_lrapi_check_number'])){
    	    if(isset($_POST['maf_lrapi_number']) && trim($_POST['maf_lrapi_number']) !== ''){
    	        if(isset($maf_lrapi_api_key) && trim($maf_lrapi_api_key) !== ''){
                    $jsonData = json_decode(wp_remote_retrieve_body(wp_remote_get('https://landlineremover.com/api/check-number?apikey='.$maf_lrapi_api_key.'&number='.sanitize_text_field($_POST['maf_lrapi_number']))),TRUE);
                    $responce_array = ['type'=> 'error', 'mcg' => ''];
                    if($jsonData && !empty($jsonData)){
                        if($jsonData['status'] === 'failed'){
                            $responce_array = ['type'=> 'error', 'mcg' => $jsonData['errorMsg']];
                        }else{
                            $responce_array = ['type'=> 'success', 'mcg' => $jsonData];
                        }
                    }else{
                        $responce_array = ['type'=> 'error', 'mcg' => 'Can not connect to API at the moment. Please try again.'];
                    }    
        	    }else{
        	        $this->wp_landline_remover_api_notify(['type'=>'error','mcg'=>'API key is required.']);
        	    }
    	    }else{
    	        $this->wp_landline_remover_api_notify(['type'=>'error','mcg'=>'Phone number is required.']);
    	    }
    	}
    	
    	
		include_once 'partials/wp-landline-remover-api-number-checker-display.php';
	}

	public function wp_landline_remover_api_settings_display() {
		global $wpdb;
		$args = array(
            'post_type'      => 'wp_lrapi_settings',
            'posts_per_page' => -1,
            'post_status' => 'draft',
        );                
        if(isset($_POST['maf_lrapi_settings_form_update'])){
    	    update_option('wp_lrapi_settings',sanitize_text_field($_POST['maf_lrapi_api_key']));
            $this->wp_landline_remover_api_notify(['type'=> 'success', 'mcg'=>'Settings updated successfully.']);
    	}
    	
    	$plugin_setings = get_option('wp_lrapi_settings');
    	if($plugin_setings !== false){
    	    $maf_lrapi_api_key = $plugin_setings;
        }
        
    	if(isset($maf_lrapi_api_key) && trim($maf_lrapi_api_key) !== ''){
    	        
            $jsonData = json_decode(wp_remote_retrieve_body(wp_remote_get('https://landlineremover.com/api/check-credits?apikey='.$maf_lrapi_api_key)),TRUE);
            $responce_array = ['type'=> 'error', 'mcg' => ''];
            if($jsonData && !empty($jsonData)){
                if($jsonData['status'] === 'failed'){
                    $responce_array = ['type'=> 'error', 'mcg' => $jsonData['errorMsg']];
                }else{
                    $responce_array = ['type'=> 'success', 'mcg' => $jsonData];
                }
            }else{
                $responce_array = ['type'=> 'error', 'mcg' => 'Can not connect to API at the moment. Please try again.'];
            }
	    }
		include_once 'partials/wp-landline-remover-api-settings-display.php';
	}
}
