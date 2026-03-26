<?php
/**
 * Plugin Name: Disable AI Toolkit
 * Description: Disables AI features in WordPress by returning false on the wp_supports_ai filter.
 * Version:     0.0.1
 * Author:      WordPress
 * License:     GPL-2.0-or-later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 *
 * @package DisableAI
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_filter( 'wp_supports_ai', '__return_false', 1000 );
