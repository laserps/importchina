/**
 * main.js
 *
 * For all custom js codes.
 */

jQuery(document).ready(function($) {  

	$.slidebars();

	// Create space for .site-header and loop for 4 seconds after
	function resizeHeaderSpace() {
		$('.site-header-space').outerHeight($('.site-header').outerHeight()).css('min-height', $('.site-header').outerHeight() + 'px');
		$('.site-mobile-navigation.-dropdown').css('padding-top', $('.site-header').outerHeight() + 'px');
	}
	resizeHeaderSpace();
	var intervalID =  setInterval(resizeHeaderSpace,400);
	setTimeout(function() {clearInterval(intervalID);}, 4000);
	$(window).resize(function() {resizeHeaderSpace()} );



	// Add dropdown sub-menu for mobile
	$('.site-mobile-navigation .menu-item-has-children').append('<i class="si-caret-down"></i>');
	$('.site-mobile-navigation .menu-item-has-children > i').click(function () {                
		$(this).parent().toggleClass('active');        
	});

	// Add active for mobile toggle icon
	$('.site-toggle').click(function () {                
		$(this).toggleClass('active');
		$('.site-mobile-navigation.-dropdown').toggleClass('active');
	});
	
	// Close menu (for One Page website)
	$('.site-mobile-navigation a').click(function () {                
		$('.site-toggle, .site-mobile-navigation.-dropdown').removeClass('active');
	});

	/* Will use this for .site-header auto show when scroll

	// Hide Header on on scroll down
	var didScroll;
	var lastScrollTop = 0;
	var delta = 5;
	var navbarHeight = $('.site-header').outerHeight();
	$(window).scroll(function(event){
		didScroll = true;
	});
	setInterval(function() {
		if (didScroll) {
			hasScrolled();
			didScroll = false;
		}
	}, 250);
	function hasScrolled() {
		var st = $(this).scrollTop();
    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
    	return;
    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    if (st > lastScrollTop && st > navbarHeight){
      // Scroll Down
      $('.site-header').removeClass('-down').addClass('-up');
    } else {
      // Scroll Up
      if(st + $(window).height() < $(document).height()) {
      	$('.site-header').removeClass('-up').addClass('-down');
      }
    }
    lastScrollTop = st;
  }
  */
	

});
