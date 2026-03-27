<?php
/**
 * Plugin Name: MSC External Links
 * Plugin URI: https://anomalous.co.za
 * Description: Highlight and manage external links with lightweight controls.
 * Version: 1.0.0
 * Author: Anomalous Developers
 * Author URI: https://anomalous.co.za
 * Text Domain: msc-external-links
 * Domain Path: /languages
 * Requires at least: 5.9
 * Tested up to: 6.8
 * Requires PHP: 7.4
 * License: GPL-2.0+
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Current plugin version.
 */
define( 'MSCEL_PLUGIN_VERSION', '1.0.0' );

/**
 * Absolute path to the main plugin file.
 */
define( 'MSCEL_PLUGIN_FILE', __FILE__ );

/**
 * Absolute path to the plugin directory.
 */
define( 'MSCEL_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

/**
 * URL to the plugin directory.
 */
define( 'MSCEL_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once MSCEL_PLUGIN_DIR . 'includes/class-msc-external-links-module.php';
require_once MSCEL_PLUGIN_DIR . 'includes/class-msc-external-links-settings.php';
require_once MSCEL_PLUGIN_DIR . 'includes/class-msc-external-links.php';

if ( false ) {
	require_once MSCEL_PLUGIN_DIR . 'includes/class-msc-external-links-analytics.php';
}

if ( false ) {
	require_once MSCEL_PLUGIN_DIR . 'includes/class-msc-external-links-admin-analytics.php';
}

register_activation_hook(
	__FILE__,
	array( 'MSC_External_Links\\Plugin', 'activate' )
);

register_deactivation_hook(
	__FILE__,
	array( 'MSC_External_Links\\Plugin', 'deactivate' )
);

add_action(
	'plugins_loaded',
	static function () {
		// Load translation files from the plugin languages directory.
		load_plugin_textdomain(
			'msc-external-links',
			false,
			dirname( plugin_basename( __FILE__ ) ) . '/languages'
		);

		MSC_External_Links\Plugin::instance();
	}
);
