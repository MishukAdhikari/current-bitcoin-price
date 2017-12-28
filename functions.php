<?php

/**
* CBP Main Functions
*/
require 'inc/cbp_admin_area.php';

class CBP_main_functions {
	
	public function __construct() {
		add_action( 'wp_enqueue_scripts', array( $this, 'cbp_enqueuing_javascript_file' ) );
	}

	
	// Calling JavaScript and CSS file to the plugin
	public function cbp_enqueuing_javascript_file() {

		$CBP_admin = new CBP_admin_area();

		wp_enqueue_script( 'cbp-price-main-js',  plugins_url( '/assets/js/cbp_main_script.js', __FILE__ ), array( 'jquery' ), false, false );
		wp_localize_script( 'cbp-price-main-js', 'cbp', array( 'value' => $CBP_admin->tan() ) );
	}
}

new CBP_main_functions();