<?php

/****************************
* Copy protect your code
****************************/

function shc_shortcode($atts, $content = null) {
	ob_start();
	$output = ob_get_clean();
    extract(shortcode_atts(array("box" => 'shc_mybox'), $atts));
    return '<div class="'.$box.'"><p>'.$content.'</p><input class="shc_Ok" name="shc_Ok" type="button" value="Readmore..."/></div>'.$output;
	ob_end_clean(); 

}

add_shortcode('shc_shortcode','shc_shortcode');

/////////////////////////////////////////////////////
// initialize register button
 add_action('init', 'shc_shortcode_button_init');
 function shc_shortcode_button_init() {

      //Abort early if the user will never see TinyMCE
      if ( ! current_user_can('edit_posts') && ! current_user_can('edit_pages') && get_user_option('rich_editing') == 'true')
           return;

      //Add a callback to regiser our tinymce plugin   
      add_filter("mce_external_plugins", "shc_register_tinymce_plugin"); 

      // Add a callback to add our button to the TinyMCE toolbar
      add_filter('mce_buttons', 'shc_add_tinymce_button');
}


//This callback registers our plug-in
function shc_register_tinymce_plugin($plugin_array) {
    $plugin_array['shc_button'] = (plugin_dir_url( __FILE__ ).'js/shc_shortcode.js');
    return $plugin_array;
}

//This callback adds our button to the toolbar
function shc_add_tinymce_button($buttons) {
            //Add the button ID to the $button array
    $buttons[] = "shc_button";
    return $buttons;
}



?>