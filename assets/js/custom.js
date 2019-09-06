jQuery(document).ready(function( $ ) {

	$(window).on('load', function() {
		$('#preloader').delay(100).fadeOut('slow',function(){$(this).remove();});
	});

	$('.navbar-toggler').on('click', function () {
		$('.hamburger').toggleClass('open');
		$('#header').toggleClass('open');
		$('#nav-menu-container').toggleClass('open');
  	});

  	// portfolio filters
  	var portfolioIsotope = $('.portfolio-container').isotope({
		itemSelector: '.portfolio-item',
		layoutMode: 'fitRows'
  	});

	$('#portfolio-flters li').on( 'click', function() {
		$("#portfolio-flters li").removeClass('filter-active');
		$(this).addClass('filter-active');

		portfolioIsotope.isotope({ filter: $(this).data('filter') });
  	});

  	$('#about .about-container .read-more').on('click', function() {
		var moreContent = $(this).prev('.more-content');

		if($(moreContent).css('display') === 'none') {
			$(moreContent).animate({height: 'toggle'}, 200);
			$(this).html($(this).data('collapse'));
		} else {
			$(moreContent).animate({height: 'toggle'}, 200);
			$(this).html($(this).data('expand'));
		}
	});

	// Smoth scroll on page hash links
  	$('a[href*="#"]:not([href="#"])').on('click', function() {
		if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
			var target = $(this.hash);
		  	if (target.length) {
  
				var top_space = 0;
			  
				if( $('#header').length ) {
					top_space = $('#header').outerHeight();
				}
			  
				$('html, body').animate({
					scrollTop: target.offset().top - top_space
			  	}, 1500, 'easeInOutExpo');

				if ( $(this).parents('.nav-menu').length ) {
					$('.nav-menu .menu-active').removeClass('menu-active');
					$(this).closest('li').addClass('menu-active');
				}

				if ( $('body').hasClass('mobile-nav-active') ) {
					$('body').removeClass('mobile-nav-active');
					$('#mobile-nav-toggle i').toggleClass('fa-times fa-bars');
					$('#mobile-body-overly').fadeOut();
				}
			  
				return false;
			}
		}
	});
  
	// Back to top button
	$(window).scroll(function() {
		if ($(this).scrollTop() > 100) {
			$('.back-to-top').fadeIn('slow');
		} else {
			$('.back-to-top').fadeOut('slow');
		}
	});
  
	$('.back-to-top').click(function(){
		$('html, body').animate({scrollTop : 0},1500, 'easeInOutExpo');
		return false;
	});

});
