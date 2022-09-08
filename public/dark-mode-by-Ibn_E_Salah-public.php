<?php

/**
 * The public-facing functionality of the plugin.
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

 */

$darkmodeoptions = get_option( 'darkmodeoption' );
require plugin_dir_path( __FILE__ ) . '../includes/darkmode-css-customizer-Ibn_E_Salah.php';	

// Create Static CSS
if ($darkmodeoptions['darkmodeupdate'] == '1'){
    require plugin_dir_path( __FILE__ ) . 'css/dark-mode-css-by-Ibn_E_Salah.php';
    createdarkmodecachefile_by_Ibn_E_Salah(Ibn_E_Salah_darkmode_customizer_css(),Ibn_E_Salah_darkmode_setting_css());
}


// Enqueue Script;
wp_enqueue_script( 'dark-mode-js-by-Ibn_E_Salah', get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/public/js/dark-mode-js-by-Ibn_E_Salah.js', array(), '1.0.0', true );
// Enqueue Style When Cookie Is Set;
function darkmode_css_by_Ibn_E_Salah() {
    wp_enqueue_style( 'dark-mode-css-by-Ibn_E_Salah', get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/public/css/cache-dark-mode-css-by-Ibn_E_Salah.css');
}

if(isset($_COOKIE['darkmode']) && $_COOKIE['darkmode'] == "true"){    
    add_action( 'wp_print_styles', 'darkmode_css_by_Ibn_E_Salah' , 99);
}

function Ibn_E_Salahdarkmodesitelogo(){
    ob_start();
    $darkmodeoptions = get_option( 'darkmodeoption' );
    if($_COOKIE['darkmode'] == "true"){
    echo "<a href='".get_site_url()."'> <img id='Ibn_E_Salahdarkmodesitelogo' class='Ibn_E_Salahdarkmodesitelogo' src = '".$darkmodeoptions['Ibn_E_Salahdarkmodesitelogo']."'/> </a>";
    }
    else{
        echo "<a href='".get_site_url()."'> <img id='Ibn_E_Salahsitelogo' class='Ibn_E_Salahdarkmodesitelogo' src = '".$darkmodeoptions['Ibn_E_Salahsitelogo']."'/> </a>"; 
    }
    return ob_get_clean();
}

function Ibn_E_Salah_enqueue_darkmodesitelogo_script() {
    $darkmodeoptions = get_option( 'darkmodeoption' );
    $script_params = array(
        'sitelogo' => $darkmodeoptions['Ibn_E_Salahsitelogo'],
        'darksitelogo' => $darkmodeoptions['Ibn_E_Salahdarkmodesitelogo']
    );        
    wp_localize_script('dark-mode-js-by-Ibn_E_Salah', 'Ibn_E_Salahdarkmodelogosrc', $script_params);
}

add_action( 'wp_enqueue_scripts', 'Ibn_E_Salah_enqueue_darkmodesitelogo_script' );    

if(isset($darkmodeoptions['Ibn_E_Salahdarkmodesitelogo']) && isset($darkmodeoptions['Ibn_E_Salahsitelogo'])){    
    add_shortcode( 'Ibn_E_Salahdarkmodesitelogo', 'Ibn_E_Salahdarkmodesitelogo');
}

function darkmode_switcher_by_Ibn_E_Salah(){
        $darkmodeoptions = get_option( 'darkmodeoption' );
        $darkmodeswitchertype = $darkmodeoptions['darkmodeswitchertype'];
        ob_start();
		echo '<style> .darkmodeswitchwrapper label{cursor:pointer !important;} .darkmodeswitchwrapper { display: flex; justify-content:'. $darkmodeoptions['darkmodeswitcheralignment'] .'; align-items: center; } </style>';
		switch($darkmodeswitchertype){
            case 1:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/1.php';
                break;
            }
            case 2:{   
				require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/2.php';
                break;
            }
            case 3:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/3.php';
                break;
            }
            case 4:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/4.php';
                break;
            }
            case 5:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/5.php';
                break;
            }
            case 6:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/6.php';
                break;
            }
            case 7:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/7.php';
                break;
            }
            case 8:{   
                require plugin_dir_path( __FILE__ ) . 'dark-mode-switcher-types/8.php';
                break;
            }
        }
        return ob_get_clean();
}

if( $darkmodeoptions['darkmodefrontshowyesandnow'] == 1){
    add_action('wp_footer', 'darkmodeswitcherfront'); 
    function darkmodeswitcherfront() { 
        $darkmodeoptions = get_option( 'darkmodeoption');
        $top = ($darkmodeoptions['darkmodefronttop'] == 0) ? '' : 'top:'.$darkmodeoptions['darkmodefronttop']."%;";
        $bottom = ($darkmodeoptions['darkmodefrontbottom'] == 0) ? '' : 'bottom:'.$darkmodeoptions['darkmodefrontbottom']."%;";
        $right = ($darkmodeoptions['darkmodefrontright'] == 0) ? '' : 'right:'.$darkmodeoptions['darkmodefrontright']."%;";
        $left = ($darkmodeoptions['darkmodefrontleft'] == 0) ? '' : 'left:'.$darkmodeoptions['darkmodefrontleft']."%;";
        echo '<div class="darkmode-switch-front">'.darkmode_switcher_by_Ibn_E_Salah().'</div>'; 
        echo "<style>.darkmodeswitchwrapper{position:fixed !important; z-index:9999 !important;} .darkmodeswitchwrapper label{position:fixed !important; $top $bottom $left $right }</style>";
    }}
else{
    add_shortcode('darkmode_switcher_by_Ibn_E_Salah', "darkmode_switcher_by_Ibn_E_Salah");
}
?>