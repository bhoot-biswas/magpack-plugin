<?php
/**
 * Magpack setup
 *
 * @package Magpack
 */

namespace Magpack;

defined( 'ABSPATH' ) || exit;

/**
 * Main Magpack Class.
 */
final class Magpack {

	/**
	 * The single instance of the class.
	 *
	 * @var Magpack
	 */
	protected static $_instance = null;

	/**
	 * Main Magpack Instance.
	 * Ensures only one instance of Magpack is loaded or can be loaded.
	 *
	 * @return Magpack - Main instance.
	 */
	public static function instance() {
		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;
	}

	/**
	 * Magpack Constructor.
	 */
	public function __construct() {
		$this->define_constants();
		$this->includes();
		$this->init_hooks();
	}

	/**
	 * Define WC Constants.
	 */
	private function define_constants() {
		define( 'MAGPACK_VERSION', '0.1.0' );
		define( 'MAGPACK_ABSPATH', dirname( MAGPACK_PLUGIN_FILE ) . '/' );
	}

	/**
	 * Include required core files used in admin and on the frontend.
	 * e.g. include_once MAGPACK_ABSPATH . 'includes/foo.php';
	 */
	private function includes() {
	}

	/**
	 * Hook into actions and filters.
	 * e.g. add_action( 'foo', 'bar' );
	 */
	private function init_hooks() {
	}

	/**
	 * Get the URL for the Magpack plugin directory.
	 *
	 * @return string URL
	 */
	public static function plugin_url() {
		return untrailingslashit( plugins_url( '/', MAGPACK_PLUGIN_FILE ) );
	}
}
Magpack::instance();
