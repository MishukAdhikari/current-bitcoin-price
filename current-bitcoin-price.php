<?php

/**
 * Current Price Bitcoin is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 2 of the License, or
 * any later version.
 *
 * @link              http://about.me/MishukAdhikari
 * @since             1.0.0
 * @package           Current_Bitcoin_Price
 *
 * Plugin Name:       Current Bitcoin Price
 * Plugin URI:        http://wordpress.org/plugins/current-bitcoin-price
 * Description:       A simple plugin which helps you to see Current Price of Bitcoin using coindesk API
 * Version:           1.0.3
 * Author:            Mishuk Adhikari
 * Author URI:        http://about.me/MishukAdhikari
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       current-bitcoin-price
 * Domain Path:       /languages
 */

//Exit if accessed directly
if (!defined( 'ABSPATH' )) {
	exit;
}


/**
 * The code that runs during plugin activation.
 * This action is documented in includes/cbp_admin_area.php
 */
register_activation_hook( __FILE__, 'activate_current_bitcoin_price' );

function activate_current_bitcoin_price() {
	CBP_admin_area::cbp_default_value();
}

# Require files

// Functions
require_once ( plugin_dir_path( __FILE__ ). 'functions.php' );

// Shortcodes
require_once ( plugin_dir_path( __FILE__ ). 'includes/cbp_shortcodes.php' );

// Admin Page Options
require_once ( plugin_dir_path( __FILE__ ). 'includes/cbp_admin_area.php');