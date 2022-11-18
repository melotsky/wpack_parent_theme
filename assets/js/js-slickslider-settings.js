/**************************/

//CAROUSEL SETTINGS 

/**************************/



var $theFlexS = jQuery.noConflict();



jQuery(document).ready(function($){

  jQuery('#thecarousel').slick({
	  dots: true,
	  infinite: true,
	  speed: 500,
	  autoplay: true,
	  slidesToShow: 3,
	  slidesToScroll: 3,
	  prevArrow: '<span class="left-arrow"></span>',
	  nextArrow: '<span class="right-arrow"></span>',

	  responsive: [
		{
		  breakpoint: 780,
		  settings: {
			slidesToShow: 2,
			slidesToScroll: 2
		  }
		},
		{
		  breakpoint: 600,
		  settings: {
			slidesToShow: 1,
			slidesToScroll: 1
		  }
		}
	
	  ]
  });





});