<?php

/**
 * Current Bitcoin Price
 *
 * main funciton of the plugin
 */
class CBP_main_functions {
	
	public function __construct() {
		
		add_action( 'wp_enqueue_scripts', array( $this, 'cbp_enqueuing_javascript_file' ) );
		add_action( 'admin_head', array( $this, 'cbp_tinnymce_button' ) );
		
		global $pagenow;
		
		if (( $pagenow == 'options-general.php' ) && ($_GET['page'] == 'cbp-admin-dashboard')) {
			add_action( 'admin_enqueue_scripts', array( $this, 'cbp_admin_assets' ) );
		}
		
	}
	
	/**
	 * Adding js and css file
	 * 
	 * @return void
	 */
	public function cbp_enqueuing_javascript_file() {

		$CBP_admin = new CBP_admin_area();

		wp_enqueue_script( 'cbp-price-main-js',  plugins_url( '/assets/js/cbp_main_script.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_localize_script( 'cbp-price-main-js', 'cbp', array( 'value' => $CBP_admin->cbp_dec_option_value() ) );
	}

	/**
	 * Js and Css for backend
	 * 
	 * @return void
	 */
	public function cbp_admin_assets() {
		wp_enqueue_script( 'cbp-admin-js', plugins_url( '/assets/js/cbp_admin.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_enqueue_style( 'cbp-admin-style', plugins_url( '/assets/css/cbp-admin.css', __FILE__ ) );
	}

	/**
	 * TinnyMCE button
	 * 
	 * @return void
	 */
	public function cbp_tinnymce_button() {

		$tinny_checkbox = get_option('cbp_options')['cbp_tinny_checkbox'];
		
		if ( $tinny_checkbox == 'on' ) {
			add_filter( 'mce_external_plugins', array( $this, 'button_for_tinymce_plugin' ) );
			add_filter( 'mce_buttons', array( $this, 'register_mce_button' ) );
		}
	}

	/**
	 * Declaring button
	 * 
	 * @param button array
	 * @return array
	 */
	public function button_for_tinymce_plugin( $plugin_array ) {

		$plugin_array['cbp_mce_button'] = plugins_url( '/assets/js/cbp-tinnymce-custom-button.js', __FILE__ );
		
		return $plugin_array;
	}

	/**
	 * Adding tinny button
	 * if is page
	 * 
	 * @param string
	 * @return array
	 */
	public function register_mce_button( $buttons ) {
		
		if ((isset($_GET['post_type']) && $_GET['post_type'] == 'page')) :

			array_push( $buttons, 'cbp_mce_button' );
			
		return $buttons;

		endif;
	}
}

new CBP_main_functions();