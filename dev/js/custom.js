jQuery( document ).ready( function( $ ) {

	var ProjectsSlider = {
		init: function(){
			$('.projects-slider__wrap').slick({
				slidesToShow: 1.5, 
				infinite: false, 
				prevArrow: '<button type="button" class="slick-prev">Prev</button>', 
				nextArrow: '<button type="button" class="slick-next">Next</button>',
				responsive: [
					{
					  breakpoint: 768,
					  settings: {
						slidesToShow: 1.025, 
					  }
					},
				]
			});
		}
	}

	var ImagesSlider = {
		init: function(){
			$('.pb-image-slider__items').slick({
				slidesToShow: 1.4, 
				infinite: false, 
				dots: false, 
				prevArrow: $('.pb-image-slider__prev'), 
				nextArrow: $('.pb-image-slider__next'), 
				responsive: [
					{
					  breakpoint: 768,
					  settings: {
						slidesToShow: 1.1, 
					  }
					},
				]
			});
		}
	}

	var ForceFullwidth = {
		init: function(){
			if( $('.force-fullwidth').length ){
				var left = $('.force-fullwidth').offset().left;
				var width = $(window).width();
				$('.force-fullwidth').css( 'width', (width - left) );
			}
		}
	}

	var StickyHeader = {
		prev: 0,
		top: 0,
		headerHeight: $('.site-header').height(),
		init: function(){
			StickyHeader.top = $(window).scrollTop();
			if( StickyHeader.top > StickyHeader.prev ){
				$('body').addClass('has-sticky-header');
				
				if( StickyHeader.top >= StickyHeader.headerHeight * 2 ){
					$('.site-header').addClass('stick');
					$('.site-header').addClass('stuck');
				}
			}else{
				if( StickyHeader.top > 0 ){
					//$('body').addClass('has-sticky-header');
					$('.site-header').addClass('top-trans');
					$('.site-header').removeClass('stick');
				}else{
					//$('.site-header').addClass('stick');
					$('.site-header').removeClass('top-trans');
					$('.site-header').removeClass('stuck');
				}
			}
			StickyHeader.prev = StickyHeader.top;
		}
	}

	var AjaxLoadMore = {
		init: function(){
			$('.nav-previous a').on('click', function(ev){
				ev.preventDefault();

				var _this = $(this);
				var text = _this.text();
				var href = _this.attr('href');

				_this.text('Loading...');
				$.ajax({
					url: href,
				}).done(function(data) {
					var items = $(data).find('.pb-articles__items').html();

					var end = false;
					var next = '#';
					if( $(data).find('.nav-previous').length <= 0 ){
						end = true;
					}else{
						next = $(data).find('.nav-previous a').attr('href');
					}

					$('.pb-articles__items').append( items );

					if( end ){
						_this.remove();
					}else{
						_this.text(text);
						_this.attr('href', next);
					}
				});
			});
		}
	}

	var AjaxProjects = {
		init: function(){
			$(document).on('click', '.project-btn', function(e){
				e.preventDefault();
				var _this = $(this);
				var text = _this.text();

				_this.text('Loading...');
				$.ajax({
					url: _this.data('url'),
					type: 'POST',
					data: {
						page	: _this.data('page'),
						exclude	: _this.data('exclude'), 
					},
					success: function( result ) {
						var data = $(result);
						var items = data.find('.items');
						var nav = data.find('.nav');

						if( items.length > 0 ){
							_this.closest('.pb-projects-grid').find('.projects-grid__wrap').append(items.html());
						}

						if( nav.length > 0 ){
							_this.replaceWith(nav.find('a'));
						}else{
							_this.remove();
						}
					}
				});
			});
		}
	}

	var MainMenu = {
		init: function(){
			$('.menu-toggle').on('click', function(){
				if( $(this).hasClass( 'is-active' ) ){
					if( $('.site-header').hasClass('dbrain-header-light') === false ){
						$('.site-header').removeClass('header-default').addClass('header-light');
					}
				}else{
					if( $('.site-header').hasClass('dbrain-header-light') === false ){
						$('.site-header').removeClass('header-light').addClass('header-default');
					}
				}
			});
		}
	}

	var CustomLink = {
		init: function(){
			$('body').on('click', '[data-href]', function(){
				window.location.href = $(this).attr('data-href');
			});
		}
	}

	ProjectsSlider.init();
	StickyHeader.init();
	ImagesSlider.init();
	ForceFullwidth.init();
	AjaxLoadMore.init();
	AjaxProjects.init();
	MainMenu.init();
	CustomLink.init();

	$(window).on('scroll', function(){
		StickyHeader.init();
	});
});