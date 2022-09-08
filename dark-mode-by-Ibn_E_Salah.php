<?php
/**
 * Dark Mode By Ibn_E_Salah 
 *
 *
 * @since             1.0.0
 * @package           Dark_Mode_By_Ibn_E_Salah
 *
 * @wordpress-plugin
 * Plugin Name:       Dark Mode By Ibn_E_Salah
 * Description:       Dark Mode By Ibn_E_Salah, Use this shortcode [darkmode_switcher_by_Ibn_E_Salah] or show on front from setting section. It's a really simple plugin and doesn't add any CSS on its own. You can write your own custom css in Customizer or use plugin settings to add.
 * Version:           1.0.0
 * Author:            Naufal Salahuddin
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       dark-mode-by-Ibn_E_Salah
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

define( 'DARK_MODE_BY_Ibn_E_Salah_VERSION', '1.0.0' );

/**
 * plugin activation.
 */
function activate_dark_mode_by_Ibn_E_Salah() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dark-mode-by-Ibn_E_Salah-activator.php';
	Dark_Mode_By_Ibn_E_Salah_Activator::activate();
}

/**
 * plugin deactivation.
 */
function deactivate_dark_mode_by_Ibn_E_Salah() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-dark-mode-by-Ibn_E_Salah-deactivator.php';
	Dark_Mode_By_Ibn_E_Salah_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_dark_mode_by_Ibn_E_Salah' );
register_deactivation_hook( __FILE__, 'deactivate_dark_mode_by_Ibn_E_Salah' );

/**
 * Begins execution of the plugin.
 *
 * @since    1.0.0
 */


function run_dark_mode_by_Ibn_E_Salah() {
	add_filter('plugin_action_links_'.plugin_basename(__FILE__), 'addsettinglinkbydarkmodeIbn_E_Salah');
	function addsettinglinkbydarkmodeIbn_E_Salah( $links ) {
		$links[] = '<a href="' .
			admin_url( 'options-general.php?page=edit-dark-mode-options' ) .
			'">' . __('Settings') . '</a>';
		return $links;
	}
	require plugin_dir_path( __FILE__ ) . '/admin/class-dark-mode-by-Ibn_E_Salah-admin.php';
	require plugin_dir_path( __FILE__ ) . '/public/dark-mode-by-Ibn_E_Salah-public.php';
	$darkmodeadmin = new Dark_Mode_By_Ibn_E_Salah_Admin_Options();	
	}
run_dark_mode_by_Ibn_E_Salah();