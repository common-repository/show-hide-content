jQuery(document).ready(function($) {

    tinymce.create('tinymce.plugins.shc_plugin', {
        init : function(ed, url) {
                // Register command for when button is clicked
                ed.addCommand('shc_insert_shortcode', function() {
                    selected = tinyMCE.activeEditor.selection.getContent();
                   
                    if( selected ){
                        //If text is selected when button is clicked
                        //Wrap shortcode around it.
						
                        content =  '[shc_shortcode class="shc_mybox"]'+selected+'[/shc_shortcode]';
                    }else{
                        alert ("you have to select the content first and then click on this button to wrap code around your content");
                    }

                    tinymce.execCommand('mceInsertContent', false, content);
                });

            // Register buttons - trigger above command when clicked
            ed.addButton('shc_button', {title : 'Insert shortcode', cmd : 'shc_insert_shortcode', image: url + '/favicons/Readmore.png' });
        },   
    });

    // Register our TinyMCE plugin
    // first parameter is the button ID1
    // second parameter must match the first parameter of the tinymce.create() function above
    tinymce.PluginManager.add('shc_button', tinymce.plugins.shc_plugin);
});