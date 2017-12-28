<?php

/**
* Bcp Shortcodes
*/
class CBP_shortcodes {
	
	public function __construct() {

		add_shortcode( 'current_btc_usd_price', array( $this, 'cbp_current_usd_shortcode') );
		add_shortcode( 'current_btc_gbp_pound', array( $this, 'cbp_current_gbp_shortcode') );
		add_shortcode( 'current_btc_eur_price', array( $this, 'cbp_current_eur_shortcode') );
	
	}

	// Shortcode for showing usd price
	public function cbp_current_usd_shortcode() {
		
		return '<span id="cbp_usd_btc" style="display: inline;">$ 0000.00</span>';
		
	}

	// Shortcode for showing gbp price
	public function cbp_current_gbp_shortcode() {

		return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000.00</span>';
		
	}

	// Shortcode for showing eur price
	public function cbp_current_eur_shortcode() {

		return '<span id="cbp_eur_btc" style="display: inline;">€ 0000.00</span>';
		
	}

}

$CBP_Shortcode = new CBP_shortcodes();