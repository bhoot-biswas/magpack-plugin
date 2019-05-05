<?php
/**
 * Plugin Name:     Magpack
 * Plugin URI:      https://bengal-studio.com/plugins/magpack
 * Description:     An advanced open-source publishing and revenue-generating platform for news organizations.
 * Author:          Bengal Studio
 * Author URI:      https://bengal-studio.com/
 * Text Domain:     magpack
 * Domain Path:     /languages
 * Version:         0.1.0
 *
 * @package         Magpack
 */

defined( 'ABSPATH' ) || exit;

// Define MAGPACK_PLUGIN_FILE.
if ( ! defined( 'MAGPACK_PLUGIN_FILE' ) ) {
	define( 'MAGPACK_PLUGIN_FILE', __FILE__ );
}

// Include the main Magpack class.
if ( ! class_exists( 'Magpack' ) ) {
	include_once dirname( __FILE__ ) . '/includes/class-magpack.php';
}
