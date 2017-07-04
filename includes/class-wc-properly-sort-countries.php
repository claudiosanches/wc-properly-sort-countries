<?php
/**
 * Sort countries.
 *
 * @package WC_Properly_Sort_Countries
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * WC_Properly_Sort_Countries class.
 */
class WC_Properly_Sort_Countries {

	/**
	 * Instance of this class.
	 *
	 * @var WC_Properly_Sort_Countries
	 */
	protected static $instance = null;

	/**
	 * Initialize the plugin actions.
	 */
	private function __construct() {
		// Load plugin text domain.
		add_action( 'init', array( $this, 'load_plugin_textdomain' ) );

		// Checks with WooCommerce is installed.
		if ( class_exists( 'Collator' ) ) {
			// Enable custom orderning.
			add_filter( 'woocommerce_countries', array( $this, 'sort_countries' ) );

			// Stop WooCommerce sorting.
			add_filter( 'woocommerce_sort_countries', '__return_false' );
		} else {
			add_action( 'admin_notices', array( $this, 'dependencies_notice' ) );
		}
	}

	/**
	 * Return an instance of this class.
	 *
	 * @return WC_Properly_Sort_Countries
	 */
	public static function get_instance() {
		if ( null === self::$instance ) {
			self::$instance = new self;
		}

		return self::$instance;
	}

	/**
	 * Load the plugin text domain for translation.
	 */
	public function load_plugin_textdomain() {
		load_plugin_textdomain( 'wc-properly-sort-countries', false, dirname( plugin_basename( WC_SORT_COUNTRIES_NAME_PATH ) ) . '/languages/' );
	}

	/**
	 * Properly sort countries by name using Collator class.
	 *
	 * @param  array $countries Countries list.
	 * @return array
	 */
	public function sort_countries( $countries ) {
		$collator = new Collator( get_user_locale() );
		$collator->asort( $countries );

		return $countries;
	}

	/**
	 * Display notice in admin about missing dependencies.
	 */
	public function dependencies_notice() {
		/* translators: PHP.net doc URL */
		echo '<div class="error"><p>' . sprintf( wp_kses_post( __( 'In order to properly sort countries name on WooCommerce is necessary PHP 5.3+ and activated support to <a href="%s" target="_blank">Internationalization Functions</a>', 'wc-properly-sort-countries' ), 'https://secure.php.net/manual/en/intl.installation.php' ) ) . '</p></div>';
	}
}
