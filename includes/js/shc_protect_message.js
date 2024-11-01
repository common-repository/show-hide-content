
// Logic to display and hide copyright message

jQuery(function() {
	
    jQuery(document).on("click", ".shc_Ok", function(e){
  	
	var a = jQuery( this ); 
	a.closest(".shc_mybox").addClass("shc_new");
	var image = jQuery(".shc_new").find("p");
	jQuery(".shc_new").find("p").fadeIn(600);
	
	a.unwrap();
	a.hide();
	a.closest(".shc_mybox").removeClass("shc_new");
	
	}); //end of click event function

}); //end of document