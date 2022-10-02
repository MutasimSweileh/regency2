(function($) {
	
	"use strict";
	
	
	//Hide Loading Box (Preloader)
	function handlePreloader() {
		if($('.preloader').length){
			$('.preloader').delay(200).fadeOut(500);
		}
	}
	
	
	//Update Header Style and Scroll to Top
	function headerStyle() {
		if($('.main-header').length){
			var windowpos = $(window).scrollTop();
			var siteHeader = $('.main-header');
			var scrollLink = $('.scroll-to-top');
			
			var HeaderHight = $('.main-header').height();
			if (windowpos >= HeaderHight) {
				siteHeader.addClass('fixed-header');
				scrollLink.fadeIn(300);
			} else {
				siteHeader.removeClass('fixed-header');
				scrollLink.fadeOut(300);
			}
			
		}
	}
	
	headerStyle();
	
	
	//Submenu Dropdown Toggle
	if($('.main-header li.dropdown ul').length){
		$('.main-header li.dropdown').append('<div class="dropdown-btn"><span class="fa fa-angle-down"></span></div>');
		
		//Dropdown Button
		$('.main-header li.dropdown .dropdown-btn').on('click', function() {
			$(this).prev('ul').slideToggle(500);
		});
		
		//Dropdown Menu / Fullscreen Nav
		$('.fullscreen-menu .navigation li.dropdown > a').on('click', function() {
			$(this).next('ul').slideToggle(500);
		});
		
		//Disable dropdown parent link
		$('.navigation li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
		
		//Disable dropdown parent link
		$('.main-header .navigation li.dropdown > a,.hidden-bar .side-menu li.dropdown > a').on('click', function(e) {
			e.preventDefault();
		});
		
		$('.cart-box .dropdown-menu').click(function(e) {
			e.stopPropagation();
		});
		
	}

	
	
	
	//Mobile Nav Hide Show
	if($('.mobile-menu').length){
		
		$('.mobile-menu .menu-box').mCustomScrollbar();
		
		var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
		$('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
		$('.sticky-header .main-menu').append(mobileMenuContent);
		
		//Dropdown Button
		$('.mobile-menu li.dropdown .dropdown-btn').on('click', function() {
			$(this).toggleClass('open');
			$(this).prev('ul').slideToggle(500);
		});
		//Menu Toggle Btn
		$('.mobile-nav-toggler').on('click', function() {
			$('body').addClass('mobile-menu-visible');
		});

		//Menu Toggle Btn
		$('.mobile-menu .menu-backdrop,.mobile-menu .close-btn').on('click', function() {
			$('body').removeClass('mobile-menu-visible');
		});
		
	}
	
	
	//Header Search
	if($('.search-box-outer').length) {
		$('.search-box-outer').on('click', function() {
			$('body').addClass('search-active');
		});
		$('.close-search').on('click', function() {
			$('body').removeClass('search-active');
		});
		
		$('.search-popup .color-layer').on('click', function() {
			$('body').removeClass('search-active');
		});
	}
	
	
	
	//Hidden Sidebar
	if ($('.hidden-bar,.fullscreen-menu').length) {
		var hiddenBar = $('.hidden-bar');
		var hiddenBarOpener = $('.nav-toggler');
		var hiddenBarCloser = $('.hidden-bar-closer,.close-menu');
		$('.hidden-bar-wrapper').mCustomScrollbar();
		
		//Show Sidebar
		hiddenBarOpener.on('click', function () {
			$('body').addClass('visible-menu-bar');
			hiddenBar.addClass('visible-sidebar');
		});
		
		//Hide Sidebar
		hiddenBarCloser.on('click', function () {
			$('body').removeClass('visible-menu-bar');
			hiddenBar.removeClass('visible-sidebar');
		});
	}
	
	
	//Parallax Scene for Icons
	if($('.parallax-scene-1').length){
		var scene = $('.parallax-scene-1').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-2').length){
		var scene = $('.parallax-scene-2').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-3').length){
		var scene = $('.parallax-scene-3').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	if($('.parallax-scene-4').length){
		var scene = $('.parallax-scene-4').get(0);
		var parallaxInstance = new Parallax(scene);
	}
	
	
	
		
	
	//Main Slider Carousel
	if ($('.main-slider-carousel').length) {
		$('.main-slider-carousel').owlCarousel({
			animateOut: 'fadeOut',
    		animateIn: 'fadeIn',
			loop:true,
			margin:0,
			nav:true,
			dots:true,			
			//autoHeight: true,
       			autoplayTimeout: 6000,
			smartSpeed: 500,
			autoplay: true,
			navText: [ '<span class="flaticon-left"></span>', '<span class="flaticon-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:1
				},
				1024:{
					items:1
				},
				1200:{
					items:1
				}
			}
		});    		
	}
	
	
	
	
	// Testimonial Carousel
	if ($('.testimonial-carousel').length) {
		$('.testimonial-carousel').owlCarousel({
			//animateOut: 'slideInDown',
    		//animateIn: 'fadeInUp',
			loop:true,
			margin:0,
			nav:true,
			center:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-up"></span>', '<span class="fa fa-angle-down"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:2
				},
				1024:{
					items:3
				},
				1340:{
					items:3
				},
				1640:{
					items:3
				}
			}
		});    		
	}
	
	


	
	
	
	// Three Item Carousel
	if ($('.three-item-carousel').length) {
		$('.three-item-carousel').owlCarousel({
			loop:true,
			margin:30,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				600:{
					items:2
				},
				800:{
					items:3
				},
				1024:{
					items:3
				}
			}
		});    		
	}
	
	
	
	
	// Sponsors Item Carousel
	if ($('.sponsors-carousel').length) {
		$('.sponsors-carousel').owlCarousel({
			loop:true,
			margin:0,
			nav:true,
			smartSpeed: 500,
			autoplay: 4000,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:2
				},
				600:{
					items:3
				},
				800:{
					items:4
				},
				1024:{
					items:6
				}
			}
		});    		
	}
	


	
	// Sponsors Item Carousel
	if ($('.category').length) {

		$('.category').owlCarousel({
			loop:true,
			margin:15,
			nav:true,
			smartSpeed: 500,
			autoplay: false,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:2
				},
				1024:{
					items:4
				}
			}
		});    		
	}
	

		
	// Sponsors Item Carousel
	if ($('.galvid').length) {

		$('.galvid').owlCarousel({
			loop:true,
			margin:15,
			nav:true,
			smartSpeed: 500,
			autoplay: false,
			navText: [ '<span class="fa fa-angle-left"></span>', '<span class="fa fa-angle-right"></span>' ],
			responsive:{
				0:{
					items:1
				},
				480:{
					items:1
				},
				600:{
					items:1
				},
				800:{
					items:2
				},
				1024:{
					items:2
				}
			}
		});    		
	}



	
	//LightBox / Fancybox
	if($('.lightbox-image').length) {
		$('.lightbox-image').fancybox({
			openEffect  : 'fade',
			closeEffect : 'fade',
			helpers : {
				media : {}
			}
		});
	}
	
	
	
	// Scroll to a Specific Div
	if($('.scroll-to-target').length){
		$(".scroll-to-target").on('click', function() {
			var target = $(this).attr('data-target');
		   // animate
		   $('html, body').animate({
			   scrollTop: $(target).offset().top
			 }, 1500);
	
		});
	}
	
	
	

/* ==========================================================================
   When document is Scrollig, do
   ========================================================================== */
	
	$(window).on('scroll', function() {
		headerStyle();
	});
	
/* ==========================================================================
   When document is loading, do
   ========================================================================== */
	
	$(window).on('load', function() {
		handlePreloader();
	});	

})(window.jQuery);







$(document).ready(function(){
  $(".show-icons").click(function(){
    $(".all-ioc").toggleClass("active");
  });
});



jQuery('.counter').counterUp({
	delay: 10,
	time: 3000
});
