/*
$(window).load(function() {
    $('.partnerReviews__flexslider').flexslider({
		animation: "slide",
		controlNav: true,
		directionNav: true,
		prevText: "",
		nextText: "",
		smoothHeight: true,
		startAt: 0,
		slideshow: false,
		slideshowSpeed: 2000,
		pauseOnAction: true,
    });
});


//flexslider initialization
(function() {

	// store the slider in a local variable
	var $window = $(window),
	flexslider = { vars:{} };

	// tiny helper function to add breakpoints
	function getGridSize() {
		return (window.innerWidth < 479) ? 1 :
			(window.innerWidth < 768) ? 2 :
			(window.innerWidth < 992) ? 3 :
			(window.innerWidth < 1200) ? 4 : 5;
	}

	$window.load(function() {
		$('.flexslider').flexslider({
			animation: "slide",
			controlNav: false,
			directionNav: true,
			slideshow: false,
			slideshowSpeed: 5000,
			pauseOnAction: true,
			startAt: 0,
			prevText: "",
			nextText: "",
			// minItems: 1,
			maxItems: 5,
			itemWidth: 150,
			animationLoop: true,
			move: 1,
			minItems: getGridSize(), // use function to pull in initial value
			maxItems: getGridSize(), // use function to pull in initial value
			start: function (slider) {
				flexslider = slider; //Initializing flexslider here.
			}
		});
	});

	// check grid size on resize event
	$window.resize(function() {
		var gridSize = getGridSize();

		flexslider.vars.minItems = gridSize;
		flexslider.vars.maxItems = gridSize;
	});
}());
*/

jQuery(document).ready(function($) {

	$('.feedback__slider').slick({
		adaptiveHeight: true,
		arrows: false,
		slidesToShow: 3,
		slidesToScroll: 3,
		centerMode: true,
		centerPadding: 0,
		cssEase: 'ease-out',
		responsive: [
			{
				breakpoint: 1199,
				settings: {
					centerPadding: '20%',
					slidesToShow: 1,
					slidesToScroll: 1,
					adaptiveHeight: false,
				}
			},{
				breakpoint: 991,
				settings: {
					centerPadding: 0,
					slidesToShow: 1,
					slidesToScroll: 1,
					arrows: true,
					prevArrow: '<a href="#" class="slider__arrow prev__slide"></a>',
					nextArrow: '<a href="#" class="slider__arrow next__slide"></a>',
				}
			},
			// You can unslick at a given breakpoint now by adding:
			// settings: "unslick"
			// instead of a settings object
		]
	});


	$('.header__hamburger').magnificPopup({
		type:'inline',
		removalDelay: 500,
		mainClass: 'mfp-fade popup_inline',
		showCloseBtn: true,
		closeMarkup: '<div class="mfp-close">&times;</div>',
		closeBtnInside: true,
		closeOnContentClick: false,
		closeOnBgClick: true,
		alignTop: false,
		fixedContentPos: true,
		callbacks: {
			open: function() {
				var headerHeight = $('header.header').height();
				$('.mfp-content').css({
					'marginTop': headerHeight,
				});

				/*$('.mfp-content .header__authLink').on('click', function(){


					var newClass = 'reg__popup',
						oldClass = 'menu__popup';

					$('.popup_inline').addClass(newClass);
					$('.popup_inline').removeClass(oldClass);

					var headerHeight = $('header.header').height(),
						windowHeight = $(window).height(),
						windowWidth = $(window).width();

					if ( windowWidth <= 450 ) {
						var popupHeight = windowHeight - headerHeight;
						$('.reg__popup .mfp-content').outerHeight(popupHeight);
					}

				});*/
			},
			close: function() {

			},
			beforeOpen: function() {
				var $triggerEl = $(this.st.el),
					newClass = 'menu__popup';
				this.st.mainClass = this.st.mainClass + ' ' + newClass;
			}
		}
	});


		if (window.matchMedia('only screen and (max-width : 1200px)').matches) {

			/*$('.header__authLink').magnificPopup({
				type:'inline',
				removalDelay: 500,
				mainClass: 'mfp-fade popup_inline',
				showCloseBtn: true,
				closeMarkup: '<div class="mfp-close">&times;</div>',
				closeBtnInside: true,
				closeOnContentClick: false,
				closeOnBgClick: true,
				alignTop: false,
				fixedContentPos: true,
				callbacks: {
					open: function() {
						var headerHeight = $('header.header').height(),
							windowHeight = $(window).height(),
							windowWidth = $(window).width();

						if ( windowWidth <= 450 ) {
							var popupHeight = windowHeight - headerHeight;
							$('.reg__popup .mfp-content').outerHeight(popupHeight);
						}

						$('.mfp-content').css({
							'marginTop': headerHeight,
						});

					},
					close: function() {

					},
					beforeOpen: function() {
						var $triggerEl = $(this.st.el),
							newClass = 'reg__popup';
						this.st.mainClass = this.st.mainClass + ' ' + newClass;
					}
				}
			});*/

			$('.mainForm__tab>a').magnificPopup({
				type:'inline',
				removalDelay: 500,
				mainClass: 'mfp-fade popup_inline',
				showCloseBtn: true,
				closeMarkup: '<div class="mfp-close">&times;</div>',
				closeBtnInside: true,
				closeOnContentClick: false,
				closeOnBgClick: true,
				alignTop: false,
				fixedContentPos: true,
				callbacks: {
					open: function() {
						var headerHeight = $('header.header').height(),
							windowHeight = $(window).height(),
							windowWidth = $(window).width();

						if ( windowWidth <= 450 ) {
							var popupHeight = windowHeight - headerHeight;
							$('.reg__popup .mfp-content').outerHeight(popupHeight);
						}

						$('.mfp-content').css({
							'marginTop': headerHeight,
						});



					},
					close: function() {

					},
					beforeOpen: function() {
						var $triggerEl = $(this.st.el),
							newClass = 'reg__popup';
						this.st.mainClass = this.st.mainClass + ' ' + newClass;
					}
				}
			});


		}




	 /*
	$('.gallery__link').magnificPopup({
		type: 'image',
		removalDelay: 500,
		mainClass: 'mfp-fade popup_image',
		showCloseBtn: true,
		closeMarkup: '<div class="mfp-close">x</div>',
		closeBtnInside: true,
		closeOnContentClick: false,
		closeOnBgClick: true,
		alignTop: false,
		fixedContentPos: true,
		gallery: {
			enabled: true
		}
	});*/

	// $('.wrapper').each(function() {
	// 	$(this).magnificPopup({
	// 		delegate: '.link',
	// 		type: 'image',
	// 		removalDelay: 500,
	// 		mainClass: 'mfp-fade popup_image',
	// 		showCloseBtn: true,
	// 		closeMarkup: '<div class="mfp-close">x</div>',
	// 		closeBtnInside: true,
	// 		closeOnContentClick: false,
	// 		closeOnBgClick: true,
	// 		alignTop: false,
	// 		fixedContentPos: true,
	// 		gallery: {
	// 			enabled:true
	// 		}  
	// 	});
	// });

});

