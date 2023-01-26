<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://www.linkedin.com/in/naeem-akhtar-cs/
 * @since             1.0.0
 * @package           Fescobill
 *
 * @wordpress-plugin
 * Plugin Name:       FescoBill
 * Plugin URI:        https://www.linkedin.com/in/naeem-akhtar-cs/
 * Description:       Fetches billing details of FESCO. ShortCode [FescoBill]
 * Version:           1.0.0
 * Author:            Naeem Akhtar
 * Author URI:        https://www.linkedin.com/in/naeem-akhtar-cs/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       fescobill
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'FESCOBILL_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-fescobill-activator.php
 */
function activate_fescobill() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fescobill-activator.php';
	Fescobill_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-fescobill-deactivator.php
 */
function deactivate_fescobill() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-fescobill-deactivator.php';
	Fescobill_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_fescobill' );
register_deactivation_hook( __FILE__, 'deactivate_fescobill' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-fescobill.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_fescobill() {

	$plugin = new Fescobill();
	$plugin->run();

}
run_fescobill();
