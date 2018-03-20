<?php

/**
 * Class for adding shortcode
 */
class CBP_shortcodes {
	
	public function __construct() {

		add_shortcode( 'current_btc_usd_price', array( $this, 'usd_shortcode') );
		add_shortcode( 'current_btc_gbp_pound', array( $this, 'gbp_shortcode') );
		add_shortcode( 'current_btc_eur_price', array( $this, 'eur_shortcode') );
	
	}

	/**
	 * Shortcode for showing
	 * USD price
	 * 
	 * @return void
	 */
	public function usd_shortcode() {
		
		$CBP_admin = new CBP_admin_area();
		$value = $CBP_admin->cbp_dec_option_value();

		switch ($value) {
			case 'none':
				return '<span id="cbp_usd_btc" style="display: inline;">$ 0000</span>';
				break;
			case '1':
				return '<span id="cbp_usd_btc" style="display: inline;">$ 0000.0</span>';
				break;
			case '2':
				return '<span id="cbp_usd_btc" style="display: inline;">$ 0000.00</span>';
				break;
			case '3':
				return '<span id="cbp_usd_btc" style="display: inline;">$ 0000.000</span>';
				break;
			case '4':
				return '<span id="cbp_usd_btc" style="display: inline;">$ 0000.0000</span>';
				break;
			
			default:
				return '<span id="cbp_usd_btc" style="display: inline;">$ 0000.00</span>';
				break;
		}
		
	}

	/**
	 * Shortcode for showing
	 * GBP Price
	 * 
	 * @return void
	 */
	public function gbp_shortcode() {
		
		$CBP_admin = new CBP_admin_area();
		$value = $CBP_admin->cbp_dec_option_value();

		switch ($value) {
			case 'none':
				return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000</span>';
				break;
			case '1':
				return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000.0</span>';
				break;
			case '2':
				return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000.00</span>';
				break;
			case '3':
				return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000.000</span>';
				break;
			case '4':
				return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000.0000</span>';
				break;
			
			default:
				return '<span id="cbp_gbp_btc" style="display: inline;">£ 0000.00</span>';
				break;
		}
		
	}

	/**
	 * Shortcode for showing
	 * EUR price
	 * 
	 * @return void
	 */
	public function eur_shortcode() {
		
		$CBP_admin = new CBP_admin_area();
		$value = $CBP_admin->cbp_dec_option_value();

		switch ($value) {
			case 'none':
				return '<span id="cbp_eur_btc" style="display: inline;">€ 0000</span>';
				break;
			case '1':
				return '<span id="cbp_eur_btc" style="display: inline;">€ 0000.0</span>';
				break;
			case '2':
				return '<span id="cbp_eur_btc" style="display: inline;">€ 0000.00</span>';
				break;
			case '3':
				return '<span id="cbp_eur_btc" style="display: inline;">€ 0000.000</span>';
				break;
			case '4':
				return '<span id="cbp_eur_btc" style="display: inline;">€ 0000.0000</span>';
				break;
			
			default:
				return '<span id="cbp_eur_btc" style="display: inline;">$ 0000.00</span>';
				break;
		}
		
	}

}

$CBP_Shortcode = new CBP_shortcodes();