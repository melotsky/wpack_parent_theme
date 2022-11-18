/**************************/
//SLIDE BARS SETTINGS 
/**************************/


jQuery(document).ready(function(){
	jQuery.slidebars({
			siteClose: true,
			scrollLock: true
	});
	jQuery("#close_slidebar").click(function(){
		jQuery.slidebars.close();
	});	
});