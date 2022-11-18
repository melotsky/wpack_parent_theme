jQuery(document).ready(function($) {
	jQuery(".eteam-language-switcher").click(function(){
		console.log( jQuery(this).find('.eteam-language-list').slideToggle() );
	});
});

	
jQuery(document).mouseup(function(e) 
{
    var container = jQuery(".eteam-language-switcher");

    if (!container.is(e.target) && container.has(e.target).length === 0) 
    {
        jQuery('.eteam-language-list').slideUp();
    }
});