jQuery(document).ready(function($){
	/* ------------------------>>> Прижать футер к низу <<<------------------------------------------------- */
	/*(function(){
		footer();

		$(window).resize(function() {
			footer();
		});

		function footer() {
			var docHeight = $(window).height(),
				footerHeight = $('footer').outerHeight(),
				footerBottom = $('footer').position().top + footerHeight;

			if (footerBottom < docHeight) {
				$('footer').css('margin-top', (docHeight - footerBottom) + 'px');
			}
		}
	})();*/
	/* ------------------------>>> Прижать футер к низу End <<<--------------------------------------------- */
	
	
	
	/* ------------------------>>> mainForm отступ сверху под header <<<------------------------------------------------- */
	$(window).load(function(){
		(function(){

			function setFormPaddingTop(){
				var headerHeight = $('.header').outerHeight();

				$('.mainForm').css({
					'paddingTop': headerHeight,
				});
			}

			setFormPaddingTop();

			$(window).resize(function(){
				setFormPaddingTop();
			});

		})();
	});
	/* ------------------------>>> mainForm отступ сверху под header End <<<------------------------------------------------- */

	$('.reg__popup__btn').on('click', function(){
		alert('done');
	});

	/* ------------------------>>> mainForm Высота картинки <<<------------------------------------------------- */
	$(window).load(function(){
		(function(){

			$('.mainFormItem__formWrap').addClass('animate');

			function setMainFormHeight(){
				var headerHeight = $('.header').outerHeight(),
					mainFormHeight = $('.mainForm').outerHeight(),
					mainFormContentHeight = mainFormHeight - headerHeight,
					logoWrapHeight = $('.mainForm__logoWrap').outerHeight(true),
					noteBottomHeight = $('.mainFormItem__note__bottom').outerHeight(true),
					formInnerHeight = mainFormContentHeight - logoWrapHeight - noteBottomHeight;

				$('.mainFormItem__formInner').css({
					'height': formInnerHeight,
				});

				var	formTitleHeight = $('.mainFormItem__formTitle').outerHeight(true),
				    imageNoteHeight = $('.mainFormItem__note').outerHeight(true),
					mainFormwrapInHeight = formInnerHeight - formTitleHeight,
					mainFormImgWrapHeight = formInnerHeight - imageNoteHeight;

				$('.mainForm__wrapIn').css({
					'height': mainFormwrapInHeight,
				});

				$('.mainFormItem__imageWrap').css({
					'height': mainFormImgWrapHeight,
				});

				var arrowWrapHeight = $('.mainForm__arrowWrap').outerHeight(true),
					dnldLinkHeight = $('.mainFormItem__formDnldLinkWrap').outerHeight(true),
					formWrapHeight = $('.mainFormItem__formWrap').outerHeight(true),
					heightSum = arrowWrapHeight + dnldLinkHeight;

				if ( ($('.mainForm__wrapIn').outerHeight(true) - heightSum) < formWrapHeight ) {
					$('.mainFormItem__formWrap').addClass('slideToggle');
				} else {
					$('.mainFormItem__formWrap').removeClass('slideToggle');
				}

				// $(document).on('click', '.mainFormItem__formWrap.animate .mainForm__tab, .header__authLink', function(e){
				$(document).on('click', '.mainFormItem__formWrap.animate .mainForm__tab', function(e){
					var elem = $('.mainFormItem__formWrap'),
						windowHeight = $(window).height();

					e.preventDefault();

					if( $(window).scrollTop() > 200 ) {
						$('html,body').stop().animate({ scrollTop: 0 }, 1000);

						if ( windowHeight >= $(window).scrollTop() ) {

							if( $('.mainFormItem__formWrap').hasClass('slideToggle') ) {
								setTimeout(function(){
									elem.removeClass('slideToggle');
									elem.addClass('toggled');
								}, 1000);
							}

						} else {
							setTimeout(function(){
								elem.removeClass('slideToggle');
								elem.addClass('toggled');
							}, 1000);
						}

					} else {
						elem.toggleClass('slideToggle');
						elem.toggleClass('toggled');
					}
				});

			}

			if ( window.matchMedia('only screen and (min-width : 1201px)').matches ) {

				setMainFormHeight();

			}

			$(window).resize(function(){

				if ( window.matchMedia('only screen and (min-width : 1201px)').matches ) {

					setMainFormHeight();

				}

			});

			var $popupForm = $('.mainFormItem__formWrap').find('.mainFormItem__tabSectWrap');

			if (window.matchMedia('only screen and (max-width : 1200px)').matches) {
				$popupForm.addClass('mfp-hide');
			} else {
				$popupForm.removeClass('mfp-hide');
			}

			$(window).resize(function(){

				if ( window.matchMedia('only screen and (max-width : 1200px)').matches ) {
					$popupForm.addClass('mfp-hide');
				} else {
					$popupForm.removeClass('mfp-hide');
				}
			});

			$('.mainForm__contentInner').addClass('visibile');

		})();
	});

	/* ------------------------>>> mainForm Высота картинки End <<<------------------------------------------------- */

	
	(function(){
			
			$('.header__socialsWrap a').attr('target', '_blank');
			
	})();

	/*--------------------------------- функция для вкладок -----------------------------*/

	function getTabs(tabsClass, sectionsClass, classActive){
		var $tabs = $('.' + tabsClass),
			$sections = $('.' + sectionsClass);

		$sections.not(':last').addClass('hide');

		$tabs.click(function(){
			$tabs.removeClass(classActive).eq($(this).index()).addClass(classActive);
			$sections.addClass('hide').eq($(this).index()).removeClass('hide');
		}).last().addClass(classActive);
	}

	/* вызов функции вкладок */

	if (window.matchMedia('only screen and (min-width : 1201px)').matches) {

		getTabs('mainForm__tab', 'mainFormItem__tabSection', 'active');

	} else {

		/*$(document).on('click', '.reg__popup__btn', function(){
		 alert('done');
		 });*/

	}


	/*--------------------------------- функция для вкладок End -------------------------*/




	/* ------------------------>>> Sticky header <<<------------------------------------------------- */
/*
	$(function(){
		createSticky($(".header"));
	});

	$(window).resize(function(){
		createSticky($(".header"));
	});

	function createSticky(sticky) {

		if (typeof sticky !== "undefined") {

			var	pos = sticky.offset().top + 20,
				win = $(window);

			win.on("scroll", function() {
				win.scrollTop() >= pos ? sticky.addClass("sticky") : sticky.removeClass("sticky");
			});

			win.scrollTop() >= pos ? sticky.addClass("sticky") : sticky.removeClass("sticky");
		}
	}
*/

	(function( $stickyElem, className ){

		function stickySearchBoard ( $stickyElem, className ) {
			var stickyPoint = 1,
				windowScrollTop = $(window).scrollTop();

			if ( windowScrollTop >= stickyPoint ) {
				$stickyElem.addClass( className );

				$('.mainForm').css({
					'paddingTop': $('.header.'+className).innerHeight(),
				});
			} else {
				$stickyElem.removeClass( className );

				$('.mainForm').css({
					'paddingTop': $('.header').innerHeight(),
				});
			}
		}

		$(window).scroll(function(){

			stickySearchBoard( $stickyElem, className );

		});

		stickySearchBoard( $stickyElem, className );

	})( $('.header'), 'sticky' );

	/* ------------------------>>> Sticky header End <<<------------------------------------------------- */


	/* ------------------------>>> Вкладки Преимуществ <<<------------------------------------------------- */
	(function(){

		var $tabSection = $('.advants__tabsSection'),
			$tabsHeader = $('.advants__tabsHeader'),
			$line = $('.advants__line'),
			color = $('.advants__tabsItem:first-child .advants__tabsHeader').css('borderTopColor');

		$tabSection.hide();
		$('.advants__tabsItem:first-child .advants__tabsSection').show();
		$('.advants__tabsItem:first-child .advants__tabsHeader').addClass('active').next('.advants__tabsSection').css({'borderBottom': '1px solid ' + color});
		$('.advants__tabsHeaderList .advants__tabsHeader:first-child').addClass('active');

		$(document).on('click', '.advants__tabsHeader', function(e){
			var $this = $(this),
				target = '#' + $this.attr('data-id'),
				bgColor = $this.css('borderTopColor');

			$line.css({'backgroundColor': bgColor});

			$(this).next('.advants__tabsSection').css({'borderBottom': '1px solid ' + bgColor});

			if ($(window).width() <= 991) {

				var speedAnimation = 500;

				function scrollTo ( $elemScroll ) {
					$('html,body').stop().animate({
						scrollTop: $this.offset().top - $elemScroll.innerHeight()
					}, 1000);
				}

				if ( $this.hasClass('active') ) {/* При клике на открытой вкладке */
					$(target).slideUp();
					$this.removeClass('active');
				} else if ( !$this.hasClass('active') && !$('.advants__tabsSection').is(':visible') ) {/* При клике на закрытой вкладке и Все Section закрыты */

					scrollTo ( $('header') );

					var windowScrollTop = $(window).scrollTop() + $('header').innerHeight(),
						$thisParentScrollTop = $this.offset().top,
						speed = (windowScrollTop < $thisParentScrollTop) ? (speedAnimation + 1) : 0;

					$(target).delay( speed ).slideDown( speedAnimation );
					$this.addClass('active');

				} else {/* При клике на закрытой вкладке и одной открытой */

					var $allParents= $('.advants__tabsItem'),
						$elemOpened = '',
						indOfOpened,
						indOfClicked = $allParents.index( $this.parents('.advants__tabsItem') );

					$allParents.each(function(index, elem){
						if ( $(elem).find('.advants__tabsSection').is(':visible') ) {
							$elemOpened = $(elem).find('.advants__tabsSection');

							indOfOpened = index;

							return false;
						}
					});

					if ( indOfClicked > indOfOpened ) {

						$tabSection.slideUp( speedAnimation );

						setTimeout(
							function() {

								scrollTo( $('header') );

							}, (speedAnimation + 1), $('header'));

						$(target).slideDown( speedAnimation );

						$('.advants__tabsHeader.advants__tabsHeaderHidden').removeClass('active');

						$this.addClass('active');

						return false;

					} else {

						$tabSection.slideUp( speedAnimation );

						setTimeout(
							function() {

								scrollTo( $('header') );

							}, (speedAnimation + 1), $('header')
						);

						$(target).slideDown( speedAnimation );

						$('.advants__tabsHeader.advants__tabsHeaderHidden').removeClass('active');

						$this.addClass('active');

						return false;
					}

				}

			} else {
				$tabSection.hide();
				$(target).show();

				$tabsHeader.removeClass('active').removeClass('active');
				$this.addClass('active').addClass('active');
			}

			e.preventDefault();
		});

	})();
	/* ------------------------>>> > Вкладки Преимуществ End <<<------------------------------------------------- */



	/* ------------------------>>> Вкладки Возможностей Владельца/Продавца <<<------------------------------------------------- */
	(function(){

		var $tabSection = $('.poss__section'),
			$tabsHeader = $('.poss__headerListItem');

		$(document).on('click', '.poss__headerListItem', function(e){
			e.preventDefault();
			var $this = $(this),
				target = '#' + $this.attr('data-id');

			$tabsHeader.removeClass('active');
			$this.addClass('active');
			$tabSection.removeClass('active');
			$(target).addClass('active');
		});

		$(document).on('click', '.poss__arrowToggleTab', function(e){
			e.preventDefault();

			function setSiblingActive (tabClass, tabSectionClass, activeClasses) {
				var $tabs = $('.'+tabClass),
					$activeTab = $('.'+tabClass+'.'+activeClasses);
					$tabSection = $('.'+tabSectionClass);

				$tabs.removeClass('active');
				var $current = $activeTab.siblings('.'+tabClass).addClass(activeClasses);

				var targetID = '#'+$current.attr('data-id');

				$tabSection.removeClass(activeClasses);
				$(targetID).addClass('active');
			}

			setSiblingActive('poss__headerListItem', 'poss__section', 'active');

		});

	})();
	/* ------------------------>>> > Вкладки Возможностей Владельца/Продавца End <<<------------------------------------------------- */



	/*--------------------------------- функция для выравнивания высоты колонок -------------------------*/

	function setMaxHeight(elem) {
		var $elem = $('.' + elem),
			arrAllHeight = [],
			maxHeight;

		$elem.each(function(){
			arrAllHeight.push($(this).height());
		});

		maxHeight = Math.max.apply(null, arrAllHeight);

		$elem.height(maxHeight);
	}


	$(window).resize(function(){

			if ( window.matchMedia('only screen and (max-width : 992px)').matches ) {

				setMaxHeight('capabs__itemFooter');

			}

	});

	setMaxHeight('capabs__itemFooter');

	/*--------------------------------- функция для выравнивания высоты колонок End -------------------------*/
	
	
	
	/* ------------------------>>> Добавление класса mfp-hide для Меню в шапке <<<------------------------------------------------- */
	if (window.matchMedia('only screen and (max-width : 1199px)').matches) {
	
		$('.header__contWrap').addClass('mfp-hide');
	
	} else {

		$('.header__contWrap').removeClass('mfp-hide');


	}

	$(window).resize(function(){

			if ( window.matchMedia('only screen and (max-width : 1199px)').matches ) {

				$('.header__contWrap').addClass('mfp-hide');

			} else {

				$('.header__contWrap').removeClass('mfp-hide');

			}

	});
	/* ------------------------>>> Добавление класса mfp-hide для Меню в шапке End <<<------------------------------------------------- */



	/*--------------------------------- функция для якоря -------------------------*/

	function ancor (ancor) {

		$(ancor).on('click', function(e){
			var targetID = $(this).attr('href'),
				$header = $('.header'),
				animationTime = 1000;

			if ( $header.hasClass('sticky') ) {
				headerStickyHeight = $header.innerHeight();
			} else {
				headerStickyHeight = $header.innerHeight() - 20;
			}

			$('html,body').stop().animate({
				scrollTop: $(targetID).offset().top - headerStickyHeight }, animationTime
			);

			$.magnificPopup.close();

			/*if ( $(ancor).parents('mfp-content') ) {
				setTimeout(function(){

					$.magnificPopup.close();

				}, (animationTime + 1) );
			}*/

			e.preventDefault();
		});

	}

	ancor('.header__menuWrap ul li a');
	ancor('.footer__menuWrap ul li a');
	/*--------------------------------- функция для якоря Конец -------------------------*/


	/*--------------------------------- функция для выравнивания высоты колонок в Слайдере -------------------------*/

	function setMaxHeightNew(elem) {
		var $elem = $('.' + elem),
			arrAllHeight = [],
			maxHeight;

		$elem.each(function(){
			arrAllHeight.push($(this).height());
		});

		maxHeight = Math.max.apply(null, arrAllHeight);

		$('.feedback__inner').height(maxHeight);
	}

	$(window).load(function(){
		setMaxHeightNew('feedback__slideInner');

		$(window).resize(function(){

			if ( window.matchMedia('only screen and (max-width : 992px)').matches ) {

				setMaxHeightNew('feedback__slideInner');

			}

		});
	});
	/*--------------------------------- функция для выравнивания высоты колонок в Слайдере End -------------------------*/

	if ( window.matchMedia('only screen and (max-width : 750px) and (orientation: portrait)').matches ) {

		var viewportHeight = window.innerHeight + 'px';
		$('.mainForm').css({ height: viewportHeight });
	}

	$(window).resize(function(){
		if ( window.matchMedia('only screen and (max-width : 750px) and (orientation: portrait)').matches ) {

			var viewportHeight = window.innerHeight + 'px';
			$('.mainForm').css({ height: viewportHeight });
		}

	});



	// document.body.style.height = window.innerHeight + 'px';


});