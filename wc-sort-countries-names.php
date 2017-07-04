<?php
/**
 * Plugin Name: Properly Sort Countries on WooCommerce
 * Plugin URI:  https://github.com/claudiosanches/wc-properly-sort-countries
 * Description: Improves WooCommerce capability of sort countries by names.
 * Author:      Claudio Sanches
 * Author URI:  https://claudiosanches.com
 * Version:     0.0.1
 * License:     GPLv3
 * Text Domain: wc-properly-sort-countries
 * Domain Path: /languages
 *
 * Copyright (C) 2017 Claudio Sanches
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program. If not, see <http://www.gnu.org/licenses/>.
 *
 * @package WC_Properly_Sort_Countries
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

define( 'WC_SORT_COUNTRIES_NAME_VERSION', '0.0.1' );
define( 'WC_SORT_COUNTRIES_NAME_PATH', __FILE__ );

include_once dirname( __FILE__ ) . '/includes/class-wc-properly-sort-countries.php';

add_action( 'plugins_loaded', array( 'WC_Properly_Sort_Countries', 'get_instance' ) );
