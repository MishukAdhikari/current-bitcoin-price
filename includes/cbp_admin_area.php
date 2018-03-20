<?php

/**
* Current Bitcoin Price admin area
*/
class CBP_admin_area {
	
	public function __construct() {

		add_action('admin_init', array( $this, 'cbp_options_main' ) );
		add_action('admin_menu', array( $this, 'cbp_option_page_setting' ));
	
	}

	/**
	 * Static function
	 * for running
	 * register activation hook
	 * 
	 * @return void
	 */
	public static function cbp_default_value() {
		update_option('cbp_options', array("cbp_dec_dropdown" => 2, "cbp_tinny_checkbox" => "on" ));
	}

	/**
	 * Option Page
	 *
	 * @return void
	 */
	public function cbp_options_main(){
		register_setting('cbp_setting_options', 'cbp_options' );
		add_settings_section('main_section', 'Current Bitcoin Price', array( $this, 'cbp_setting_desc' ), 'cbp_setting_sec');
		add_settings_field('cbp_decimal_cheque', __( 'Select how many digit you want to see after decimal','current-bitcoin-price').'<br><span style="font-weight:normal">'.__( 'Example:','current-bitcoin-price').' <span id="digit_cheque"></span></span>', array( $this, 'desimal_value_cheque' ), 'cbp_setting_sec', 'main_section');
		add_settings_field('cbp_tinny_mce_cheque', __( 'Enable Button on TinnyMCE', 'current-bitcoin-price' ), array( $this, 'tinnymce_check' ), 'cbp_setting_sec', 'main_section');
	}

	/**
	 * Adding option page
	 * to the backend
	 * 
	 * @return void
	 */
	public function cbp_option_page_setting() {
		add_options_page('Current Bitcoin Price', 'Current Bitcoin Price', 'manage_options', 'cbp-admin-dashboard', array( $this, 'cbp_dashboard' ));
	}

	/**
	 * Description on setting
	 * 
	 * @return void
	 */
	public function  cbp_setting_desc() {
		echo '<span>'.__( 'Need more help? How to use the plugin?', 'current-bitcoin-price' ).' <a href="https://about.me/mishukadhikari" target="_blank" class="cbp_admin_modal">'.__( 'click here','current-bitcoin-price' ).'</a></span>';
	}

	/**
	 * Decimal Value Checking to 
	 * backend
	 * 
	 * @return void
	 */
	public function  desimal_value_cheque() {
		$options = get_option('cbp_options');
		$items = array( 'none', 1, 2, 3, 4);
		echo "<select id='cbp_decimal_cheque' name='cbp_options[cbp_dec_dropdown]'>";
		foreach($items as $item) {
			$selected = ($options['cbp_dec_dropdown']==$item) ? 'selected="selected"' : '';
			echo "<option value='$item' $selected>$item</option>";
		}
		echo "</select>";
	}

	/**
	 * Checking tinnymce option
	 * bolean
	 * 
	 * @return void
	 */
	public function tinnymce_check() {
		$options = get_option('cbp_options');
		if($options['cbp_tinny_checkbox']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='cbp_tinny_mce_cheque' name='cbp_options[cbp_tinny_checkbox]' type='checkbox' />";
	}

	/**
	 * Backend dashboard
	 * Current Bitcoin Price
	 *
	 * @return void
	 */
	public function cbp_dashboard() {
	?>
	<div class="main_content">
		<div class="content_left">
			<form action="options.php" method="post">
			<?php do_settings_sections('cbp_setting_sec'); ?>
			<?php settings_fields('cbp_setting_options'); ?>
			<?php submit_button(); ?>
			</form>
		</div>
		<div class="content_right">	

			<h2 style="text-decoration: underline; font-size: 26px;">How to use the plugin</h2>

			<p><?php _e( 'Use these shortcode if you want to see the current price of Bitcoin','current-bitcoin-price' )?></p>
			
			<p><?php _e( 'For USD price Just Use ','current-bitcoin-price' )?><code>[current_btc_usd_price]</code></p>
			<p><?php _e( 'For EUR price Just Use ','current-bitcoin-price' )?><code>[current_btc_eur_price]</code></p>
			<p><?php _e( 'For GBP pound Just Use ','current-bitcoin-price' )?><code>[current_btc_gbp_pound]</code></p>

			<p style="font-size: 18px; font-weight: bold;"><?php _e( 'If you want to add directly with your code use the following id with an element','current-bitcoin-price' )?></p>

			<?php _e( 'Example: ', 'current-bitcoin-price' )?><code> <?=htmlspecialchars('<div id="bcp_usd_btc"></div>')?> </code>

			<p><?php _e( 'For usd use this id ','current-bitcoin-price' )?><code>bcp_usd_btc</code></p>
			<p><?php _e( 'For gbp use this id ','current-bitcoin-price' )?><code>bcp_gbp_btc</code></p>
			<p><?php _e( 'For eur use this id ','current-bitcoin-price' )?><code>bcp_eur_btc</code></p>
			<p></p>
			<p><?php _e( 'If you need more features like you want to add the price ticker on your WordPress menu contact me:','current-bitcoin-price' )?> <a href="mailto:mishuk.ad.bd@gmail.com">mishuk.ad.bd@gmail.com</a></p>
			<p></p>
		</div>
	</div>
	<?php
	}

	/**
	 * Checking option
	 * 
	 * @return $value
	 */
	public function cbp_dec_option_value() {
		
		$option = get_option('cbp_options')['cbp_dec_dropdown'];
		
		$value = trim($option);
		
		return $value;

	}
}

new CBP_admin_area();