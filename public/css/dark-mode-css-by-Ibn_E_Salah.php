<?php
function createdarkmodecachefile_by_Ibn_E_Salah($customizerdarkmodecss,$optionpagecss) {
    $path = dirname(__FILE__) . '/cache-dark-mode-css-by-Ibn_E_Salah.css';
    $darkmodeoptions = get_option('darkmodeoption');
    $darkmodecachecssfile_by_Ibn_E_Salah = fopen($path, "w");
    $cacheddarkmodecss = $customizerdarkmodecss.$optionpagecss;
    fwrite( $darkmodecachecssfile_by_Ibn_E_Salah, $cacheddarkmodecss );
    fclose($darkmodecachecssfile_by_Ibn_E_Salah);
    // Update The Dark Mode option so this function only runs when you update the css file
    $darkmodeupdated = get_option('darkmodeoption');
    $darkmodeupdated['darkmodeupdate'] = '0';
    update_option('darkmodeoption', $darkmodeupdated);  
}