<?php

/**
 * Fired during plugin activation
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
class Dark_Mode_By_Ibn_E_Salah_Activator {

	/**
	 * @since    1.0.0
	 */
	public static function activate() {
			$options = array(
				'darkmodeswitcheralignment'=> 'left',
				'darkmodeswitchertype'=> '1',
				'darkmodefrontshowyesandnow'=> '0',
				'darkmodebodycolor'=> 'none',
				'darkmodeacolor'=> 'none',
				'darkmodeahovercolor'=> 'none',
				'darkmodeh1color'=> 'none',
				'darkmodeh2color'=> 'none',
				'darkmodeh3color'=> 'none',
				'darkmodeh4color'=> 'none',
				'darkmodeh5color'=> 'none',
				'darkmodeh6color'=> 'none',
				'darkmodeupdate'=> '0',
				
			);		
			add_option('darkmodeoption', $options);
	}

}