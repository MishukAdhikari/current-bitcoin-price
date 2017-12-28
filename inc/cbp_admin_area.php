<?php

/**
* Current Bitcoin Price admin area
*/
class CBP_admin_area {

	public $passed_value = 2;

	
	public function __construct() {

		add_action( 'admin_menu', array( $this, 'cbp_menu_setting' ) );
	}

	public function tan()
	{
		return $this->passed_value;	
	}
	
	// Adding sub option on setting
	public function cbp_menu_setting() {
		
		add_options_page( 'Current Bitcoin Price', 'Current Bitcoin Price', 'manage_options', 'cbp-admin-dashboard', array( $this, 'cbp_menu_options') );
		add_action( 'init', array( $this , 'register_cbp_option_page' ) );
	}

	public function register_cbp_option_page() {
	//register our settings
		register_setting( array( $this , 'cbp_settings' ), 'tiker_decimal_limit' );
	}

	public function cbp_menu_options() {
		
		if ( !current_user_can( 'manage_options' ) )  {
			wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
		}



	?>



	<div class="wrap">
	
		<h1>Bitcoin Current Price</h1>

		<form method="post" action="options.php">
	
		    <?php settings_fields( 'cbp_settings' ); ?>
		    <?php do_settings_sections( 'cbp_settings' ); ?>
	
		    <table class="form-table">
		        <tr valign="top">
		        <th scope="row">How many you want to see after decimal</th>
		        <td><input type="number" name="tiker_decimal_limit" max="4" value="<?php echo esc_attr( get_option('tiker_decimal_limit') ); ?>" /></td>
		        </tr>
		         
		    </table>
		    
		    <?php submit_button(); ?>

		</form>
	</div>





		<!--Admin area html markup start-->
		<div class="bcp_admin_area" style="text-align: center;">
			<h2 style="text-decoration: underline; font-size: 26px;">Current Bitcoin Price Help</h2>

			<p>Use these shortcode if you want to see the real time price of Bitcoin</p>
			
			<p>For USD price Just Use <code>[current_btc_usd_price]</code></p>
			<p>For EUR price Just Use <code>[current_btc_eur_price]</code></p>
			<p>For GBP pound Just Use <code>[current_btc_gbp_pound]</code></p>

			<p style="font-size: 18px; font-weight: bold;">If you want to add directly with your code use the following id with an element</p>

			Example: <code> <?=htmlspecialchars('<div id="bcp_usd_btc"></div>')?> </code>

			<p>For usd use this id <code>bcp_usd_btc</code></p>
			<p>For gbp use this id <code>bcp_gbp_btc</code></p>
			<p>For eur use this id <code>bcp_eur_btc</code></p>
		</div> <!--end html markup-->

		<?php
	}
}

new CBP_admin_area();