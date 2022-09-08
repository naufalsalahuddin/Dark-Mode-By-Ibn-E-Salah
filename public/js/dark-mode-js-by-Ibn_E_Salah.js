jQuery(document).ready(function($){
    $("#darkmodeswitchIbn_E_Salah" ).click(function() {
        var WpJsonUrl = document.querySelector('link[rel="https://api.w.org/"]').href;
        var homeurl = WpJsonUrl.replace('/wp-json/','');
        homeurl = homeurl + "/wp-content/plugins/dark-mode-by-Ibn_E_Salah/public/css/cache-dark-mode-css-by-Ibn_E_Salah.css";
        if($('#darkmodeswitchIbn_E_Salah').is(':checked')){
            document.cookie = "darkmode=true; SameSite=Strict; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
            $('head').append("<link media='all' id='dark-mode-css-by-Ibn_E_Salah-css' rel='stylesheet' type='text/css' href="+homeurl+">");
            $("img.Ibn_E_Salahdarkmodesitelogo").attr("src",Ibn_E_Salahdarkmodelogosrc.darksitelogo);

        }
        else{
            document.cookie = "darkmode=false; SameSite=Strict; expires=Fri, 31 Dec 9999 23:59:59 GMT; path=/";
            $('link[rel=stylesheet][id~="dark-mode-css-by-Ibn_E_Salah-css"]').remove();  
            $("img.Ibn_E_Salahdarkmodesitelogo").attr("src",Ibn_E_Salahdarkmodelogosrc.sitelogo);
        }
    })
});