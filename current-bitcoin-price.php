<?php
/*
Plugin Name: Current Bitcoin Price
Plugin URI:  https://developer.wordpress.org/plugins/current-bitcoin-price/
Description: A simple plugin which helps you to see Current Price of Bitcoin using coindesk API
Version:     1.0.1
Author:      Mishuk Adhikari
Author URI:  https://about.me/mishuk_adhikari
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: BTC Current Price


Current Price Bitcoin is free software: you can redistribute it and/or modify
it under the terms of the GNU General Public License as published by
the Free Software Foundation, either version 2 of the License, or
any later version.
 
You should have received a copy of the GNU General Public License
along with Current Bitcoin  Price. If not, see https://www.gnu.org/licenses/gpl-2.0.html.
*/

//Exit if accessed directly
if (!defined( 'ABSPATH' )) {
	exit;
}

# Require files

// Functions
require_once 'functions.php';

// Shortcodes
require_once 'inc/cbp_shortcodes.php';

// Admin Page Options
require_once 'inc/cbp_admin_area.php';