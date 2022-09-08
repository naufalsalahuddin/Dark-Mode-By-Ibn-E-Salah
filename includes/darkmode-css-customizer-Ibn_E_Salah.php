<?php
/**
 * Customizer functionality.
 *
 * This is set to only load for WP Version 4.9+.
 *
 * @since      1.0.0
 *
 * @package    Dark_Mode_By_Ibn_E_Salah
 * @subpackage Dark_Mode_By_Ibn_E_Salah/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * @package    Dark_Mode_By_Ibn_E_Salah
 * @subpackage Dark_Mode_By_Ibn_E_Salah/public

**
 * Register Customizer functionality.
 *
 * @since  4.0.0
 *
 * @action customize_register, 11
 *
 * @param \WP_Customize_Manager $wp_customize \WP_Customize_Manager object.
 */

function darkmodecssbyIbn_E_Salah_customize_register( $wp_customize ) {
	$section_id = 'darkmodecssbyIbn_E_Salah';
	$darkmodecss = get_option('darkmodeoption');
	$wp_customize->add_section(
		$section_id,
		array(
			'title'       => __( 'Dark mode CSS', 'dark-mode-css' ),
			'capability'  => 'manage_options',
			'description' => __( 'Enter Dark mode CSS here.', 'dark-mode-css' ),
		)
	);

	$wp_customize->add_setting(
		'dark-mode-custom-css-Ibn_E_Salah',
		array(
			'type' => 'option',
		)
	);

	$control = $wp_customize->add_control(
		new WP_Customize_Code_Editor_Control(
			$wp_customize,
			'darkmodecss_editor',
			array(
				'label'       => '',
				'section'     => $section_id,
				'settings'    => array(
					'default' => 'dark-mode-custom-css-Ibn_E_Salah',
				),
				'code_type'   => 'text/css',
				'input_attrs' => array(
					'aria-describedby' => 'editor-keyboard-trap-help-1 editor-keyboard-trap-help-2 editor-keyboard-trap-help-3 editor-keyboard-trap-help-4',
				),
			)
		)
	);

	if ( $control instanceof WP_Customize_Code_Editor_Control ) {
		$options = array();
		if ( isset( $control->editor_settings['codemirror'] ) ) {
			$options = isset( $control->editor_settings['codemirror'] );
		}
		$control->editor_settings['codemirror'] = array_merge(
			$options,
			array(
				'height' => 'auto',
			)
		);
	}
}

add_action( 'customize_register', 'darkmodecssbyIbn_E_Salah_customize_register', 11 );

/**
 * Render the Custom CSS in the Customizer.
 *
 * @since  4.0.0
 *
 * @action wp_head, 99
 */
function darkmodecss_customizer_css() {
	if ( ! is_customize_preview()) {
		return;
	}
	?>   
	<?php if(isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == 'true') {?>
	<style class="darkmodecustomizercss" type="text/css">
		<?php echo Ibn_E_Salah_darkmode_setting_css().Ibn_E_Salah_darkmode_customizer_css(); ?>
	</style>
	<script> jQuery('link[rel=stylesheet][id~="dark-mode-css-by-Ibn_E_Salah-css"]').remove();</script>
	<?php
	}
}

add_action( 'wp_head', 'darkmodecss_customizer_css', 99 );


function Ibn_E_Salah_darkmode_customizer_css(){
	ob_start(); 
	$options     = get_option( 'dark-mode-custom-css-Ibn_E_Salah' );
	$raw_darkmodecss_Ibn_E_Salah = isset( $options) ? $options : '';
	$darkmodecss_Ibn_E_Salah     = wp_kses( $raw_darkmodecss_Ibn_E_Salah, array( '\'', '\"' ) );
	$darkmodecss_Ibn_E_Salah     = str_replace( '&gt;', '>', $darkmodecss_Ibn_E_Salah );
	echo strip_tags( $darkmodecss_Ibn_E_Salah ); // phpcs:ignore WordPress.Security.EscapeOutput
	return ob_get_clean();
}
function Ibn_E_Salah_darkmode_setting_css(){
	ob_start(); 
	$darkmodeoptions = get_option('darkmodeoption');
	$darkbodycolorcssIbn_E_Salah = ($darkmodeoptions['darkmodebodycolor'] == 'none') ? '' : 'body{background-color:'.$darkmodeoptions['darkmodebodycolor']." !important;}";
	$darkacolorcssIbn_E_Salah = ($darkmodeoptions['darkmodeacolor'] == 'none') ? '' : 'a{color:'.$darkmodeoptions['darkmodeacolor']." !important;}";
	$darkahovercolorcssIbn_E_Salah = ($darkmodeoptions['darkmodeahovercolor'] == 'none') ? '' : 'a:hover{color:'.$darkmodeoptions['darkmodeahovercolor']." !important;}";
	
	$darkh1colorcssIbn_E_Salah = ($darkmodeoptions['darkmodeh1color'] == 'none') ? '' : 'h1{color:'.$darkmodeoptions['darkmodeh1color']." !important;}";
	$darkh2colorcssIbn_E_Salah = ($darkmodeoptions['darkmodeh2color'] == 'none') ? '' : 'h2{color:'.$darkmodeoptions['darkmodeh2color']." !important;}";
	$darkh3colorcssIbn_E_Salah = ($darkmodeoptions['darkmodeh3color'] == 'none') ? '' : 'h3{color:'.$darkmodeoptions['darkmodeh3color']." !important;}";
	$darkh4colorcssIbn_E_Salah = ($darkmodeoptions['darkmodeh4color'] == 'none') ? '' : 'h4{color:'.$darkmodeoptions['darkmodeh4color']." !important;}";
	$darkh5colorcssIbn_E_Salah = ($darkmodeoptions['darkmodeh5color'] == 'none') ? '' : 'h5{color:'.$darkmodeoptions['darkmodeh5color']." !important;}";
	$darkh6colorcssIbn_E_Salah = ($darkmodeoptions['darkmodeh6color'] == 'none') ? '' : 'h6{color:'.$darkmodeoptions['darkmodeh6color']." !important;}";
	
	echo $darkbodycolorcssIbn_E_Salah. $darkacolorcssIbn_E_Salah. $darkahovercolorcssIbn_E_Salah. $darkh1colorcssIbn_E_Salah. $darkh2colorcssIbn_E_Salah. $darkh3colorcssIbn_E_Salah. $darkh4colorcssIbn_E_Salah. $darkh5colorcssIbn_E_Salah. $darkh6colorcssIbn_E_Salah;
	return ob_get_clean();
}
	

/**
 * Add Dark Custom CSS to the Customizer Editor Control.
 *
 * @since  4.0.0
 *
 * @action customize_controls_print_styles
 */
function darkmodecss_customizer_styles(){
	?>
	<style>
		.customize-section-description-container + #customize-control-darkmodecss_editor:last-child .CodeMirror {
			height: calc(70vh);
		}

		.customize-section-description-container + #customize-control-darkmodecss_editor:last-child {
			margin-left: -12px;
			width: 299px;
			width: calc(100% + 24px);
			margin-bottom: -12px;
		}
	</style>
	<?php
}

add_action( 'customize_controls_print_styles', 'darkmodecss_customizer_styles', 999 );