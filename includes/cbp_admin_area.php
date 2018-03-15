<?php

/**
* Current Bitcoin Price admin area
*/
class CBP_admin_area {
	
	public function __construct() {

		register_activation_hook('cbp_setting_sec', array( $this, 'cbp_default_value' ));
		add_action('admin_init', array( $this, 'cbp_options_main' ) );
		add_action('admin_menu', array( $this, 'cbp_option_page_setting' ));
	
	}

	public static function cbp_default_value() {
		update_option('cbp_options', array("cbp_dec_dropdown" => 2, "cbp_tinny_checkbox" => "on" ));
	}

	public function cbp_options_main(){
		register_setting('cbp_setting_options', 'cbp_options' );
		add_settings_section('main_section', 'Current Bitcoin Price', array( $this, 'cbp_setting_desc' ), 'cbp_setting_sec');
		add_settings_field('cbp_decimal_cheque', 'Select how many digit you want to see after decimal<br><span style="font-weight:normal">Example: <span id="digit_cheque"></span></span>', array( $this, 'desimal_value_cheque' ), 'cbp_setting_sec', 'main_section');
		add_settings_field('cbp_tinny_mce_cheque', 'Enable Button on TinnyMCE', array( $this, 'tinnymce_check' ), 'cbp_setting_sec', 'main_section');
	}

	public function cbp_option_page_setting() {
	 add_options_page('Current Bitcoin Price', 'Current Bitcoin Price', 'manage_options', 'cbp-admin-dashboard', array( $this, 'cbp_dashboard' ));
	}

	public function  cbp_setting_desc() {
		echo '<span>Need more help? How to use the plugin? <a href="https://about.me/mishukadhikari" target="_blank" class="cbp_admin_modal">click here</a></span>';
	}

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

	public function tinnymce_check() {
		$options = get_option('cbp_options');
		if($options['cbp_tinny_checkbox']) { $checked = ' checked="checked" '; }
		echo "<input ".$checked." id='cbp_tinny_mce_cheque' name='cbp_options[cbp_tinny_checkbox]' type='checkbox' />";
	}

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

			<p>Use these shortcode if you want to see the current price of Bitcoin</p>
			
			<p>For USD price Just Use <code>[current_btc_usd_price]</code></p>
			<p>For EUR price Just Use <code>[current_btc_eur_price]</code></p>
			<p>For GBP pound Just Use <code>[current_btc_gbp_pound]</code></p>

			<p style="font-size: 18px; font-weight: bold;">If you want to add directly with your code use the following id with an element</p>

			Example: <code> <?=htmlspecialchars('<div id="bcp_usd_btc"></div>')?> </code>

			<p>For usd use this id <code>bcp_usd_btc</code></p>
			<p>For gbp use this id <code>bcp_gbp_btc</code></p>
			<p>For eur use this id <code>bcp_eur_btc</code></p>
			<p></p>
			<p>If you need more features like you want to add the price ticker on your WordPress menu contact me: <a href="mailto:mishuk.ad.bd@gmail.com">mishuk.ad.bd@gmail.com</a></p>
			<p></p>
		</div>
	</div>
	<?php
	}

	public function cbp_dec_option_value() {
		
		$option = get_option('cbp_options')['cbp_dec_dropdown'];
		
		$value = trim($option);
		
		return $value;

	}
}

new CBP_admin_area();