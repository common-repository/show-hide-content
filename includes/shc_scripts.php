<?php
/****************************
* Scripts Control
****************************/

function shc_scripts()
{
	//register script in footer and also register stylesheet
	wp_register_script('shc_script',plugin_dir_url(__FILE__). 'js/shc_protect_message.js',array('jquery'),'',true);
	wp_register_style('shc_style',plugin_dir_url(__FILE__).'css/shc_plugin_style.css');
	
	//enqueue script and stylesheet files
    wp_enqueue_script( 'shc_script' );
    wp_enqueue_style( 'shc_style' );

} //end of function

add_action('wp_enqueue_scripts','shc_scripts');

?>