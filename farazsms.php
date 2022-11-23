<?php

/**
 * @wordpress-plugin
 * Plugin Name:       FarazSMS
 * Plugin URI:        https://farazsms.com/
 * Description:       با استفاده از افزونه پیامک فراز اس ام اس شما می توانید سایت خود را به صورت حرفه ای به ابزار قدرتمند پیامک برای اطلاع رسانی و بازاریابی مجهز کنید، ذخیره شماره مشتریان در دفترچه تلفن، ارسال پیامک خوش امدگویی، ارسال پیامک پاسخ دیدگاه و... بخشی از امکانات این افزونه قدرتمند پیامکی است.
 * Version:           1.0.7
 * Author:            FarazSMS
 * Author URI:        https://farazsms.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       farazsms
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

const FARAZSMS_VERSION = '1.0.6';

function activate_farazsms() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-farazsms-activator.php';
	Farazsms_Activator::activate();
}
register_activation_hook( __FILE__, 'activate_farazsms' );
/*
 * @todo: check for best user experience
 * */
function farazsms_activation_redirect( $plugin ) {
	if( $plugin == plugin_basename( __FILE__ ) ) {
		exit( wp_redirect( admin_url( 'admin.php?page=farazsms' ) ) );
	}
}
add_action( 'activated_plugin', 'farazsms_activation_redirect' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-farazsms.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_farazsms() {

	$plugin = new Farazsms();
	$plugin->run();

}
run_farazsms();

