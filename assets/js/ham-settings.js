/**************************/
//HAM BUTTON SETTINGS 
/**************************/



jQuery(document).ready(function(){

    var $hamburger = jQuery(".hamburger");
    var $showRespMenu =jQuery(".showRespMenu");
    var $showRespMenuWithBtn =jQuery(".showRespMenu .hamburger");
	$showRespMenu.on("touchend click", function(e) {
	    $showRespMenuWithBtn.toggleClass("is-active");
	});
 
    jQuery("#sb-site").on('touchend click', function(event) {
        jQuery("#hamMenuHolder #slickerbtn.is-active").removeClass('is-active');
    });

});