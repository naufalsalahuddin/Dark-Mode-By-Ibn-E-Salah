<?php

/**
 * Fired during plugin deactivation
 *
 * @since      1.0.0
 *
 * @package    Dark_Mode_By_Ibn_E_Salah
 * @subpackage Dark_Mode_By_Ibn_E_Salah/includes
 */

/**
 * @since      1.0.0
 * @package    Dark_Mode_By_Ibn_E_Salah
 * @subpackage Dark_Mode_By_Ibn_E_Salah/includes

 */
class Dark_Mode_By_Ibn_E_Salah_Deactivator {

	/**
	 * @since    1.0.0
	 */
	
	public static function deactivate() {
		delete_option( 'darkmodeoption' ); 
		// delete_option( 'dark-mode-custom-css-Ibn_E_Salah' );
	}
}