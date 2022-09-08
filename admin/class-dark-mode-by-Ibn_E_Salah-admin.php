<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @since      1.0.0
 *
 * @package    Dark_Mode_By_Ibn_E_Salah
 * @subpackage Dark_Mode_By_Ibn_E_Salah/admin
 */

/**
 *
 *
 * @package    Dark_Mode_By_Ibn_E_Salah
 * @subpackage Dark_Mode_By_Ibn_E_Salah/admin
 */

class Dark_Mode_By_Ibn_E_Salah_Admin_Options {
    /**
     * Holds the values to be used in the fields callbacks
     */

    private $options;

    /**
     * Start up
     */
    public function __construct(){
        add_action( 'admin_menu', array( $this, 'add_plugin_page' ) );
        add_action( 'admin_init', array( $this, 'page_init' ) );
        add_action('admin_enqueue_scripts', array( $this, 'darkmodeIbn_E_Salahadminfiles' ) );
    }

    /**
     * Add options page
     */

    public function darkmodeIbn_E_Salahadminfiles() {
    	wp_enqueue_media();
        wp_enqueue_style( 'dark-mode-css-admin-by-Ibn_E_Salah', get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/admin/css/dark-mode-by-Ibn_E_Salah-admin.css');
        wp_enqueue_style( 'coloris-css', get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/includes/coloris-main/coloris.css');
        wp_enqueue_script( 'dark-mode-js-admin-by-Ibn_E_Salah', get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/admin/js/dark-mode-by-Ibn_E_Salah-admin.js', array(), '1.0.0', true );
        wp_enqueue_script( 'coloris-js', get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/includes/coloris-main/coloris.js', array(), '1.0.0', true );

    }

    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_options_page(
            'Dark Mode By Ibn E Salah', 
            'Dark Mode By Ibn E Salah', 
            'manage_options', 
            'edit-dark-mode-options', 
            array( $this, 'create_darkmode_admin_page' )
        );
    }

    /**
     * Options page callback
     */
    public function create_darkmode_admin_page()
    {
        // Set class property
        $this->options = get_option( 'darkmodeoption' );
        ?>
        <div class="wrap">
            <h1>Dark Mode By Ibn_E_Salah</h1>
            <form class="Ibn_E_Salahadminpagesetting" method="post" action="options.php">
            <?php
                // This prints out all hidden setting fields
                settings_fields( 'darkmodeoptions-group-by-Ibn_E_Salah' );
                do_settings_sections( 'darkmodeoption' );
                submit_button();
            ?>
            </form>
        </div>
        <?php
    }

    /**
     * Register and add settings
     */
    public function page_init()
    {        
        register_setting(
            'darkmodeoptions-group-by-Ibn_E_Salah', // Option group
            'darkmodeoption', // Option name
            array( $this, 'sanitize' ) // Sanitize
        );
        add_settings_section(
            'Ibn_E_Salahsitelogosection', // ID
            'Dark Mode Site Logo', // Title
            array( $this, 'Ibn_E_Salahsitelogosection_description' ), // Callback
            'darkmodeoption' // Page
        );  
        add_settings_field(
            "Ibn_E_Salahsitelogo",
             "Site Logo",
             array( $this, 'Ibn_E_Salahsitelogo_callback' ),
              "darkmodeoption",
              "Ibn_E_Salahsitelogosection"
        );
        add_settings_field(
            "Ibn_E_Salahdarkmodesitelogo",
             "Dark Mode Site Logo",
             array( $this, 'Ibn_E_Salahdarkmodesitelogo_callback' ),
              "darkmodeoption",
              "Ibn_E_Salahsitelogosection"
        );

        add_settings_section(
            'switchersetting', // ID
            'Switcher Setting', // Title
            array( $this, 'switchersetting_description' ), // Callback
            'darkmodeoption' // Page
        );  
        
        add_settings_field(
            "darkmodeswitcheralignment",
             "Alignment",
             array( $this, 'darkmodeswitcheralignment_callback' ),
              "darkmodeoption",
              "switchersetting"
        );

        add_settings_field(
            "darkmodeswitchertype",
             "Switcher Design",
             array( $this, 'darkmodeswitchertype_callback' ),
              "darkmodeoption",
              "switchersetting"
        );  
        add_settings_section(
            'darkmodefrontshow', // ID
            'Show On Front', // Title
            array( $this, 'darkmodefrontshow_description' ), // Callback
            'darkmodeoption' // Page
        );
        add_settings_field(
            'darkmodefrontshowyesandnow', // ID
            'Show On Front', // Title 
            array( $this, 'darkmodefrontshowyesandnow_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodefrontshow' // Section           
        );
        add_settings_field(
            'darkmodefronttop', // ID
            'Top in %', // Title 
            array( $this, 'darkmodefronttop_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodefrontshow' // Section           
        );
        add_settings_field(
            'darkmodefrontleft', // ID
            'Left in %', // Title 
            array( $this, 'darkmodefrontleft_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodefrontshow' // Section           
        );
        add_settings_field(
            'darkmodefrontbottom', // ID
            'Bottom in %', // Title 
            array( $this, 'darkmodefrontbottom_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodefrontshow' // Section           
        );
        add_settings_field(
            'darkmodefrontright', // ID
            'Right in %', // Title 
            array( $this, 'darkmodefrontright_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodefrontshow' // Section           
        );

        add_settings_section(
            'darkmodecss', // ID
            'Dark Mode CSS', // Title
            array( $this, 'darkmodecss_description' ), // Callback
            'darkmodeoption' // Page
        );
        add_settings_field(
            'darkmodebodycolor', // ID
            'Body Color', // Title 
            array( $this, 'darkmodebodycolor_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        ); 
        add_settings_field(
            'darkmodeacolor', // ID
            'Anchor Tag Color', // Title 
            array( $this, 'darkmodeacolor_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        ); 
        add_settings_field(
            'darkmodeahovercolor', // ID
            'Anchor Tag Hover Color', // Title 
            array( $this, 'darkmodeahovercolor_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );
        add_settings_field(
            'darkmodeh1color', // ID
            'H1 Color', // Title 
            array( $this, 'darkmodeh1color_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );
        add_settings_field(
            'darkmodeh2color', // ID
            'H2 Color', // Title 
            array( $this, 'darkmodeh2color_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );
        add_settings_field(
            'darkmodeh3color', // ID
            'H3 Color', // Title 
            array( $this, 'darkmodeh3color_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );
        add_settings_field(
            'darkmodeh4color', // ID
            'H4 Color', // Title 
            array( $this, 'darkmodeh4color_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );
        add_settings_field(
            'darkmodeh5color', // ID
            'H5 Color', // Title 
            array( $this, 'darkmodeh5color_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );
        add_settings_field(
            'darkmodeh6color', // ID
            'H6 Color', // Title 
            array( $this, 'darkmodeh6color_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecss' // Section           
        );

        add_settings_section(
            'darkmodecustomcsssection', // ID
            'Dark Mode Custom CSS', // Title
            array( $this, 'darkmodecustomcsssection_description' ), // Callback
            'darkmodeoption' // Page
        );
        add_settings_field(
            'darkmodeupdate', // ID
            '', // Title 
            array( $this, 'darkmodeupdate_callback' ), // Callback
            'darkmodeoption', // Page
            'darkmodecustomcsssection' // Section           
        );

    }

    /**
     * Sanitize each setting field as needed
     *
     * @param array $input Contains all settings fields as array keys
     */
    public function sanitize( $input )
    {
        $new_input = array();
        if( isset( $input['Ibn_E_Salahsitelogo'] ) )
            $new_input['Ibn_E_Salahsitelogo'] = sanitize_text_field( $input['Ibn_E_Salahsitelogo'] );
        if( isset( $input['Ibn_E_Salahdarkmodesitelogo'] ) )
            $new_input['Ibn_E_Salahdarkmodesitelogo'] = sanitize_text_field( $input['Ibn_E_Salahdarkmodesitelogo'] );
        if( isset( $input['darkmodeswitchertype'] ) )
            $new_input['darkmodeswitchertype'] = sanitize_text_field( $input['darkmodeswitchertype'] );
        if( isset( $input['darkmodeswitcheralignment'] ) )
            $new_input['darkmodeswitcheralignment'] = sanitize_text_field( $input['darkmodeswitcheralignment'] );
        if( isset( $input['darkmodefrontshowyesandnow'] ) )
            $new_input['darkmodefrontshowyesandnow'] = sanitize_text_field( $input['darkmodefrontshowyesandnow'] );
        if( isset( $input['darkmodefronttop'] ) )
            $new_input['darkmodefronttop'] = sanitize_text_field( $input['darkmodefronttop'] );
        if( isset( $input['darkmodefrontleft'] ) )
            $new_input['darkmodefrontleft'] = sanitize_text_field( $input['darkmodefrontleft'] );
        if( isset( $input['darkmodefrontbottom'] ) )
            $new_input['darkmodefrontbottom'] = sanitize_text_field( $input['darkmodefrontbottom'] );
        if( isset( $input['darkmodefrontright'] ) )
            $new_input['darkmodefrontright'] = sanitize_text_field( $input['darkmodefrontright'] );
        if( isset( $input['darkmodebodycolor'] ) )
            $new_input['darkmodebodycolor'] = sanitize_text_field( $input['darkmodebodycolor'] );
        if( isset( $input['darkmodeacolor'] ) )
            $new_input['darkmodeacolor'] = sanitize_text_field( $input['darkmodeacolor'] );
        if( isset( $input['darkmodeahovercolor'] ) )
            $new_input['darkmodeahovercolor'] = sanitize_text_field( $input['darkmodeahovercolor'] );
        if( isset( $input['darkmodeh1color'] ) )
            $new_input['darkmodeh1color'] = sanitize_text_field( $input['darkmodeh1color'] );
        if( isset( $input['darkmodeh2color'] ) )
            $new_input['darkmodeh2color'] = sanitize_text_field( $input['darkmodeh2color'] );
        if( isset( $input['darkmodeh3color'] ) )
            $new_input['darkmodeh3color'] = sanitize_text_field( $input['darkmodeh3color'] );
        if( isset( $input['darkmodeh4color'] ) )
            $new_input['darkmodeh4color'] = sanitize_text_field( $input['darkmodeh4color'] );
        if( isset( $input['darkmodeh5color'] ) )
            $new_input['darkmodeh5color'] = sanitize_text_field( $input['darkmodeh5color'] );
        if( isset( $input['darkmodeh6color'] ) )
            $new_input['darkmodeh6color'] = sanitize_text_field( $input['darkmodeh6color'] );
        if( isset( $input['darkmodeupdate'] ) )
            $new_input['darkmodeupdate'] = sanitize_text_field( $input['darkmodeupdate'] );

        return $new_input;
    }

    /** 
     * Print the Section text
     */
    public function Ibn_E_Salahsitelogosection_description()
    {
        print 'Please Use This Short Code For Displaying Site Logo <span class="highlighted">[Ibn_E_Salahdarkmodesitelogo]</span> and use this class <span class="highlighted">Ibn_E_Salahdarkmodesitelogo</span> for customizing:';
    }

    function Ibn_E_Salahsitelogo_callback(){
        printf(
            '<input id="Ibn_E_Salahsitelogo" type="text" name="darkmodeoption[Ibn_E_Salahsitelogo]" value="%s" />
            <input id="upload_Ibn_E_Salah_site_logo" type="button" class="button-primary" value="Insert Image" />
            <img id="Ibn_E_Salahsitelogoimage" class="logo" src="%s"/>',
            isset( $this->options['Ibn_E_Salahsitelogo'] ) ? esc_attr( $this->options['Ibn_E_Salahsitelogo']) : '',
            isset( $this->options['Ibn_E_Salahsitelogo'] ) ? esc_attr( $this->options['Ibn_E_Salahsitelogo']) : ''
        );
    }
    function Ibn_E_Salahdarkmodesitelogo_callback(){
        printf(
            '<input id="Ibn_E_Salahdarkmodesitelogo" type="text" name="darkmodeoption[Ibn_E_Salahdarkmodesitelogo]" value="%s" />
            <input id="upload_Ibn_E_Salah_darkmode_site_logo" type="button" class="button-primary" value="Insert Image" />
            <img id="Ibn_E_Salahdarkmodesitelogoimage" class="logo" src="%s"/>',
            isset( $this->options['Ibn_E_Salahdarkmodesitelogo'] ) ? esc_attr( $this->options['Ibn_E_Salahdarkmodesitelogo']) : '',
            isset( $this->options['Ibn_E_Salahdarkmodesitelogo'] ) ? esc_attr( $this->options['Ibn_E_Salahdarkmodesitelogo']) : ''
        );
    }
    public function switchersetting_description()
    {
        print 'Edit Settings:';
    }

    function darkmodeswitchertype_callback()
    {
       ?>
            <div class="switchertype">
            
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="1" <?php checked(1, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/1.png' ?>">
            </label>
            
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="2" <?php checked(2, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/2.png' ?>">
            </label>
            
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="3" <?php checked(3, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/3.png' ?>">
            </label>

            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="4" <?php checked(4, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/4.png' ?>">
            </label>

            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="5" <?php checked(5, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/5.png' ?>">
            </label>
            
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="6" <?php checked(6, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/6.png' ?>">
            </label>

            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="7" <?php checked(7, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/7.png' ?>">
            </label>

            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitchertype]" value="8" <?php checked(8, $this->options['darkmodeswitchertype'], true); ?>>
            <img src="<?php echo get_option( 'siteurl' ).'/wp-content/plugins/dark-mode-by-Ibn_E_Salah/assests/darkmodeswitchertype/8.png' ?>">
            </label>

            </div>
       <?php
    }
    function darkmodeswitcheralignment_callback()
    {
       ?>
            <div class="switcheralignment">
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitcheralignment]" value="left" <?php checked('left', $this->options['darkmodeswitcheralignment'], true); ?>>
            <p>Left</p>
            </label>
            
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitcheralignment]" value="center" <?php checked('center', $this->options['darkmodeswitcheralignment'], true); ?>>
            <p>Center</p>
            </label>
            
            <label>
            <input type="radio" name="darkmodeoption[darkmodeswitcheralignment]" value="right" <?php checked('right', $this->options['darkmodeswitcheralignment'], true); ?>>
            <p>Right</p>
            </label>
            
            </div>
       <?php
    }

    public function darkmodefrontshow_description(){
        print 'When Show On Front Is Enable, Shortcode will not work: <span>Use This Shortcode <input style="width:200px" type=text disabled value = "[darkmode_switcher_by_Ibn_E_Salah]"/></span>';
    }

    function darkmodefrontshowyesandnow_callback(){
       ?>
         <input name="darkmodeoption[darkmodefrontshowyesandnow]" <?php checked(1, $this->options['darkmodefrontshowyesandnow'], true); ?> value='1' type="checkbox" id="darkmodefrontshowyesandnow" /><label for="darkmodefrontshowyesandnow">Toggle</label>
       <?php
    }
    
    public function darkmodefronttop_callback()
    {
        printf(
            '<input type="range" id="darkmodefronttop" min="-100" max="100" name="darkmodeoption[darkmodefronttop]" value="%s" />
            <input min="-100" max="100" type="number" value="%s" id="darkmodefronttopnumber" />',
            isset( $this->options['darkmodefronttop'] ) ? esc_attr( $this->options['darkmodefronttop']) : '0',
            isset( $this->options['darkmodefronttop'] ) ? esc_attr( $this->options['darkmodefronttop']) : '0'
        );
    }
    
    public function darkmodefrontleft_callback()
    {
        printf(
            '<input type="range" id="darkmodefrontleft" min="-100" max="100" name="darkmodeoption[darkmodefrontleft]" value="%s" />
            <input min="-100" max="100" type="number" value="%s" id="darkmodefrontleftnumber" />',
            isset( $this->options['darkmodefrontleft'] ) ? esc_attr( $this->options['darkmodefrontleft']) : '0',
            isset( $this->options['darkmodefrontleft'] ) ? esc_attr( $this->options['darkmodefrontleft']) : '0'
        );
    }
    public function darkmodefrontbottom_callback()
    {
        printf(
            '<input type="range" id="darkmodefrontbottom" min="-100" max="100" name="darkmodeoption[darkmodefrontbottom]" value="%s" />
            <input min="-100" max="100" type="number" value="%s" id="darkmodefrontbottomnumber" />',
            isset( $this->options['darkmodefrontbottom'] ) ? esc_attr( $this->options['darkmodefrontbottom']) : '0',
            isset( $this->options['darkmodefrontbottom'] ) ? esc_attr( $this->options['darkmodefrontbottom']) : '0'
        );
    }
    public function darkmodefrontright_callback()
    {
        printf(
            '<input type="range" id="darkmodefrontright" min="-100" max="100" name="darkmodeoption[darkmodefrontright]" value="%s" />
            <input min="-100" max="100" type="number" value="%s" id="darkmodefrontrightnumber" />',
            isset( $this->options['darkmodefrontright'] ) ? esc_attr( $this->options['darkmodefrontright']) : '0',
            isset( $this->options['darkmodefrontright'] ) ? esc_attr( $this->options['darkmodefrontright']) : '0'
        );
    }

    public function darkmodecss_description(){
        print 'Edit CSS:';
    }

   public function darkmodebodycolor_callback(){
        printf(
            '<input data-coloris type="text" name="darkmodeoption[darkmodebodycolor]" value="%s" id="darkmodebodycolor"></input><span class="clear" id="clearbodycolor">Clear</clear>',
            isset( $this->options['darkmodebodycolor'] ) ? esc_attr( $this->options['darkmodebodycolor']) : ''
        );
   }
   public function darkmodeacolor_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeacolor]" value="%s" id="darkmodeacolor"></input><span class="clear" id="clearacolor">Clear</clear>',
        isset( $this->options['darkmodeacolor'] ) ? esc_attr( $this->options['darkmodeacolor']) : ''            
    );
   }
   public function darkmodeahovercolor_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeahovercolor]" value="%s" id="darkmodeahovercolor"></input><span class="clear" id="clearahovercolor">Clear</clear>',
        isset( $this->options['darkmodeahovercolor'] ) ? esc_attr( $this->options['darkmodeahovercolor']) : ''            
    );
   }
   public function darkmodeh1color_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeh1color]" value="%s" id="darkmodeh1color"></input><span class="clear" id="clearh1color">Clear</clear>',
        isset( $this->options['darkmodeh1color'] ) ? esc_attr( $this->options['darkmodeh1color']) : ''            
    );
   }
   public function darkmodeh2color_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeh2color]" value="%s" id="darkmodeh2color"></input><span class="clear" id="clearh2color">Clear</clear>',
        isset( $this->options['darkmodeh2color'] ) ? esc_attr( $this->options['darkmodeh2color']) : ''            
    );
   }
   public function darkmodeh3color_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeh3color]" value="%s" id="darkmodeh3color"></input><span class="clear" id="clearh3color">Clear</clear>',
        isset( $this->options['darkmodeh3color'] ) ? esc_attr( $this->options['darkmodeh3color']) : ''            
    );
   }
   public function darkmodeh4color_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeh4color]" value="%s" id="darkmodeh4color"></input><span class="clear" id="clearh4color">Clear</clear>',
        isset( $this->options['darkmodeh4color'] ) ? esc_attr( $this->options['darkmodeh4color']) : ''            
    );
   }
   public function darkmodeh5color_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeh5color]" value="%s" id="darkmodeh5color"></input><span class="clear" id="clearh5color">Clear</clear>',
        isset( $this->options['darkmodeh5color'] ) ? esc_attr( $this->options['darkmodeh5color']) : ''            
    );
   }
   public function darkmodeh6color_callback(){
    printf(
        '<input data-coloris type="text" name="darkmodeoption[darkmodeh6color]" value="%s" id="darkmodeh6color"></input><span class="clear" id="clearh6color">Clear</clear>',
        isset( $this->options['darkmodeh6color'] ) ? esc_attr( $this->options['darkmodeh6color']) : ''            
    );
   }



   public function darkmodecustomcsssection_description(){
        print 'Add you dark mode css <a href="'.get_option( 'siteurl' ).'/wp-admin/customize.php?autofocus[section]=darkmodecssbyIbn_E_Salah">here<a/>';
   }
   public function darkmodeupdate_callback(){
    printf(
        '<input style="display:none" type="number" name="darkmodeoption[darkmodeupdate]" value="%s" id="darkmodeupdate"></input><span class="clear" id="clearh6color">Clear</clear>',
        isset( $this->options['darkmodeupdate'] ) ? '1' : '1'            
    );
   }

}

