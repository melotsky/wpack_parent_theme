// Custom Scripts

jQuery(document).ready(function($) {
    // ALL PDF FILE OPEN INTO NEW TAB
    jQuery('a[href$=".pdf"]').prop('target', '_blank');
//    jQuery('a[href*="pdf"]').attr('target', '_blank');

    // ONLY ENABLE THIS IF YOU WANT TO ENABLE MAGNIFIC POPUP BUT ENABLE THE JS PLUGIN FILE
	// jQuery('.popup-form-toggle').magnificPopup({
	// 	type: 'inline',
	// 	preloader: false,
	// 	focus: ''
    // });
    
    // FOR EVERLIGHT PLUGIN ONLY USE WHEN THERE IS ONLY I SINGLE IMAGE ON SLIDER OF EVERLIGHT BOX
    jQuery("#WRAPPER .everlightbox-trigger").mouseup(function(){
        /* alert("The paragraph was clicked."); */
        setTimeout( function(){
        var targetParentId = document.getElementById("everlightbox-slider");
        var targetChildElement = targetParentId.getElementsByClassName('slide');
        var theLength = targetChildElement.length;

        if ( theLength == 1){
            jQuery("#everlightbox-prev").remove();
            jQuery("#everlightbox-next").remove();
        }
        }, 10); //3 seconds
    }); 

    var faqs = jQuery('.wp-block-yoast-faq-block > .schema-faq-section > .schema-faq-answer').hide();
    
    jQuery('.wp-block-yoast-faq-block > .schema-faq-section > .schema-faq-question').click(function() {
        $this = jQuery(this);
        $target =  $this.next();
        $btn =  $this;
  
        if(!$target.hasClass('active')){
            faqs.removeClass('active').slideUp();
            jQuery('.wp-block-yoast-faq-block .aktibo').removeClass('aktibo');
            $btn.addClass('aktibo');
            $target.addClass('active').slideDown();
        }
        
      return false;
    });    

});

jQuery("#backtotop").click(function () {
    jQuery("html, body").animate({scrollTop: 0}, 1000);
 });
 
jQuery(window).scroll(function() {

    //FADE EFFECT FOR THE BUTTON BACKTOTOP FADE IN FADE OUT
    var scroll = jQuery(window).scrollTop();
    if (scroll >= 200) {
        jQuery("#backtotop").fadeIn('fast');
    }else {
		jQuery("#backtotop").fadeOut('fast');
    }
    
    //THIS IS FOR STICKY HEADER ADD STICKY CLASS ON BODY TAG ON SCROLL DEPENDS ON THE SIZE
    // change the 50 into value you like eg: 300
    if (jQuery(this).scrollTop() > 50){  
        jQuery('body').addClass("sticky");
    }else{
        jQuery('body').removeClass("sticky");
    }

});



// A FUNCTION THAT WILL COPY THE TEXT INSIDE OF THE TARGET TAG

function copyToClipboard(element) {
    var $temp = jQuery("<input>");
    jQuery("body").append($temp);
    $temp.val(jQuery(element).html()).select();
    document.execCommand("copy");
    $temp.remove();
}


// FOR TABS 
// FROM URL https://www.jacklmoore.com/notes/jquery-tabs/
//
jQuery("ul.tabs").each(function(){
    var $active, $content, $links = jQuery(this).find('a');
  
    $active = jQuery($links.filter('[href="'+location.hash+'"]')[0] || $links[0]);
    $active.addClass('active');
  
    $content = jQuery($active[0].hash);
  
    $links.not($active).each(function () {
      jQuery(this.hash).hide();
    });
  
    jQuery(this).on('click', 'a', function(e){

        $active.removeClass('active');
      $content.hide();
  
      $active = jQuery(this);
      $content = jQuery(this.hash);
  
      $active.addClass('active');
      $content.show();
      jQuery("#flipper").toggleClass("stat");
      jQuery("#panel").slideToggle();
  
      // Prevent the anchor's default click action
      e.preventDefault();
    });
});


/*
*
* Check Image Tag if loaded or not
* TO USE:
jQuery(document).ready(function(jQuery) {
    // Set Timer to make sure that image was loaded before performing the commands..
    setTimeout( function(){
    jQuery(".di__img").find('img').each(function(){
      if (this.isLoaded()) {
          console.log("loaded");
      }
    else {
        console.log("nope");
        var newimage = '<?php echo get_stylesheet_directory_uri() . "/assets/css/images/nogame_img.png"; ?>';
        jQuery("#single_screenshot_game").removeAttr("src");
        jQuery("#single_screenshot_game").attr('src', newimage);
    }
    });
}, 2000); //2 seconds

*/
HTMLImageElement.prototype.isLoaded = function() {

    // See if "naturalWidth" and "naturalHeight" properties are available.
    if (typeof this.naturalWidth == 'number' && typeof this.naturalHeight == 'number')
        return !(this.naturalWidth == 0 && this.naturalHeight == 0);
    
    // See if "complete" property is available.
    else if (typeof this.complete == 'boolean')
        return this.complete;
    // Fallback behavior: return TRUE.
    else
        return true;
};

//EG: <span id="banner_id_2" onclick="copyToClipboard('#banner_id_2')">yYyYyY</span>

//FOR WOW ANIMATION.. ANIMATING ELEMENTS
//ENABLE THE WOW JS IN JS LOADER.PHP FIRST
//new WOW().init();
//wow = new WOW({mobile: false })
//wow.init();


//FOR ISOTOPE, BLOG SUMARY PAGE JUST LIKE THE TOPCASINOSOLUTIONS.COM SAMPLE ONLY

// var $container = jQuery('.sec_bsp__inner');

// jQuery(window).on('load', function () {
//     // Fire Isotope only when images are loaded
//     $container.imagesLoaded(function () {
//         $container.isotope({
//             itemSelector: '.blog-item',
//         });

//         jQuery(".pagination").hide();
//     });

//     // Filter
//     jQuery('.portfolio-menu').on('click', 'button', function () {
//         var filterValue = jQuery(this).attr('data-filter');
//         $container.isotope({filter: filterValue});
//         jQuery('.portfolio-menu .selected').removeClass('selected');
//         jQuery(this).addClass('selected');
//     });

//     // Infinite Scroll
//     jQuery('.sec_bsp__inner').infiniteScroll({
//             navSelector: 'div.pagination',
//             nextSelector: 'div.pagination a:last-child',
//             path: 'div.pagination a:last-child',
//             append: '.blog-item',
//             //itemSelector: '.blog-item',
//             bufferPx: 200,
//             loading: {
//                 finishedMsg: 'We\'re done here.',
//                 //img: +templateUrl+'ajax-loader.gif'
//             },
//         },
        
//         // Infinite Scroll Callback
//         function (newElements) {
//             var $newElems = jQuery(newElements).hide();
            
//             $newElems.imagesLoaded(function () {
//                 //$container.isotope('destroy');
//                 $newElems.fadeIn();
//                 //$container.isotope('appended', $newElems);
//                 $container.isotope('appended', $newElems);
//                 //$container.isotope('reloadItems', $newElems);
                
//             });
//         },

//         //$container.isotope('destroy');
        
//     );

//     $container.on( 'load.infiniteScroll', function( event, response, path ) {
//         var $items = jQuery( response ).find('.blog-item');
//         // append items after images loaded
//         $items.imagesLoaded( function() {
//           $container.append( $items );
//           $container.isotope( 'insert', $items );
//         });
//       });

// });