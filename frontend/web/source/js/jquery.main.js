$(document).ready(function(){
	initMarginIndex();
	initMarginAboutCompany();
	initMarginImg();
	initMarginTab();
	initMarginMap();
	initMapBig();
	initTabs();
	initMap();
	$('.form-list > li').matchHeight();
	$('.service-slider').slick({
		slidesToShow: 3,
		slidesToScroll: 1,
		autoplay: true,
		autoplaySpeed: 2000,
		responsive:[
			{
				breakpoint: 900,
				settings:{
				slidesToShow: 2
				}
			},
			{
				breakpoint: 550,
				settings:{
					slidesToShow: 1,
					arrows: false,
					dots: true,
				}
			},
		]
	});
	$('.news-list').slick({
		slidesToShow: 3,
		arrows: false,
		dots: false,
		responsive:[
		{
			breakpoint: 780,
			settings:{
				autoplay: true,
				slidesToShow: 3,
				autoplaySpeed: 2000,
			}
		},
		{
			breakpoint: 550,
			settings:{
				autoplay: true,
				slidesToShow: 1,
				autoplaySpeed: 2000,
			}
		}
		]
	});
	$('.cargo-section .cargo-list').slick({
		slidesToShow: 6,
		arrows:true,
		dots: false,
		infinite: false,
		responsive:[
		{
			breakpoint: 1175,
			settings:{
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 530,
			settings:{
				slidesToShow: 3,
			}
		}
		]
	});
	$('.clients-section .cargo-list').slick({
		slidesToShow: 4,
		arrows: true,
		dots: false,
		infinite: false,
		responsive:[
		{
			breakpoint: 1140,
			settings:{
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 530,
			settings:{
				slidesToShow: 2,
			}
		}
		]
	});
	$('.partners-section .partners-list').slick({
		slidesToShow: 5,
		arrows: false,
		dots: false,
		responsive:[
		{
			breakpoint: 900,
			settings:{
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 700,
			settings:{
				slidesToShow: 3,
			}
		},
		{
			breakpoint: 550,
			settings:{
				slidesToShow: 2,
			}
		},
		]
	});
	/* инициализация placeholder */
	$('input, textarea').placeholder();

	/* определение мобильных устройств */
	if (device.mobile() || device.tablet()) {
		$('body').addClass('mobile');
	}
	/* проверка input на ввод и добаление класса */
	$('input').focus(function(){
		$(this).addClass('active');
	});
	$('input').blur(function(){
		if(!$(this).val())
		$(this).removeClass('active');
	});
	/*меню*/
	$('.burger').click(function(){
		$('#nav').toggleClass('active');
		$(this).toggleClass('active');
	})
	$(document).click(function(event) {
		if ($(event.target).closest('#nav, .burger').length) return;
		$('#nav').removeClass('active')
		$('.burger').removeClass('active');
		event.stopPropagation();
		// return false;
	});
	$('#nav li.search a').click(function(){
		if($('#header').toggleClass('search')){
		}else{
			$('#header').toggleClass('search');
			$('#nav .desctop li.search a').addClass('btn-close');
		}
		return false;
	});


	$('#nav.mobile li.has-drop>a').on('click', function() {
		$('#header #nav.mobile .back').addClass("active");
		$('#header #nav.mobile').addClass("drop-opened");
		$(this).parent().addClass("opened");
		return false;
	});
	$('#header #nav.mobile .back a').on('click', function() {
		$('#header #nav.mobile').removeClass("drop-opened");
		$('#header #nav.mobile .back').removeClass("active");
		$('#nav.mobile li.has-drop').removeClass('opened');
		return false;
	});

	$('.mob-btn').on('click', function() {
		$('#header').toggleClass("active");
		$('.mobile-nav-container').toggleClass("active");
		return false;
	});


	$('#nav .title a').click(function(){
		if(screen.width < 641){
			if( $(this).parent().parent().hasClass('active2') ){
				$(this).parent().parent().removeClass("active2");
			} else {
				$('#nav > ul > li').removeClass('active2');
				$(this).parent().parent().addClass("active2");
			}
			return false;
		}
	})
	if(screen.width < 641){
		$('#nav > ul > li.active').addClass('active-temp')
		$('#nav > ul > li.active').removeClass('active')
		$('#nav').removeClass('desctop')
	} else {
		$('#nav > ul > li').removeClass('active2');
		$('#nav > ul > li.active-temp').addClass('active')
		$('#nav > ul > li.active-temp').removeClass('active-temp')
		$('#nav').addClass('desctop')
	}
	$(window).resize(function(){
		if(screen.width < 641){
			$('#nav > ul > li.active').addClass('active-temp')
			$('#nav > ul > li.active').removeClass('active')
			$('#nav').removeClass('desctop')
		} else {
			$('#nav > ul > li').removeClass('active2');
			$('#nav > ul > li.active-temp').addClass('active')
			$('#nav > ul > li.active-temp').removeClass('active-temp')
			$('#nav').addClass('desctop')
		}
	})

	$('.top-holder').each(function(){
			$(this).find('.visual').css('background-image', function(){
				return 'url(' + $(this).find('img').attr('src') + ')';
			})
		});

	$('.visual-holder').each(function(){
			$(this).find('.visual').css('background-image', function(){
				return 'url(' + $(this).find('img').attr('src') + ')';
			})
		});


	$('.accardion .drop-holder').hide();
	$('.accardion .content').click(function(){
		if($(this).closest('.accardion').hasClass('open')) {
			$(this).closest('.map-holder .contacts').find('.accardion').removeClass('open');
			$(this).closest('.map-holder .contacts').find('.drop-holder').slideUp(500);
		} else {
			$(this).closest('.map-holder .contacts').find('.accardion').removeClass('open');
			$(this).closest('.map-holder .contacts').find('.drop-holder').slideUp(500);
			$(this).closest('.accardion').find('.drop-holder').slideDown(500);
			$(this).closest('.accardion').addClass('open');
		}
	});
	$('.accardion .drop-holder').hide();
	$('.accardion .title').click(function(){
		if($(this).closest('.accardion').hasClass('open')) {
			$(this).closest('.goods-section .content').find('.accardion').removeClass('open');
			$(this).closest('.goods-section .content').find('.drop-holder').slideUp(500);
		} else {
			$(this).closest('.goods-section .content').find('.accardion').removeClass('open');
			$(this).closest('.goods-section .content').find('.drop-holder').slideUp(500);
			$(this).closest('.accardion').find('.drop-holder').slideDown(500);
			$(this).closest('.accardion').addClass('open');
		}
	});

	$("#header .btn").click(function(){
		$("#header").addClass('open');
	});
	$(".btn-popup .close-popup").click(function(){
		$("#header").removeClass('open');
	});

});//Ready END

$(window).load(function(){
		$('.partners-section .partners-list li').matchHeight();
	$('.clients-section .cargo-list .li').matchHeight();
	$('.clients-section .cargo-list .li a strong').matchHeight();
	setTimeout(function() {
		$('.clients-section .cargo-list .li a strong').css('line-height', function(){
			return $(this).height() + 'px';
		})
	}, 100);
});

	function initMarginIndex(){
		$(window).on('load resize', function(){
			$('.top-section .visual-holder .visual').css('margin-left', function(){
				var _left = $(window).width() - $('.container').innerWidth();
				_left=_left/-2;
				return _left;
			});
			$('.top-section .content-holder').css('margin-left', function(){
				var _left = $(window).width() - $('.container').innerWidth();
				_left=_left/-2;
				return _left;
			});
		});
	};
	function initMarginAboutCompany(){
			$(window).on('load resize', function(){
				$('.top-holder .visual').css('margin-left', function(){
					var _left = $(window).width() - $('.container').innerWidth();
					_left=_left/-2;
					return _left;
				});
				$('.top-holder .content').css('margin-left', function(){
					var _left = $(window).width() - $('.container').innerWidth();
					_left=_left/-2;
					return _left;
				});
			});
	};
	function initMarginImg(){
			$(window).on('load resize', function(){
				$('.about-section .main-holder .img-holder').css('margin-left', function(){
					var _left = $(window).width() - $('.container').innerWidth()+40;
					_left=_left/-2;
					return _left;
				});
			});
	};
	function initMarginTab(){
		$(window).on('load resize', function(){
			$('.tab-body').css('margin-right', function(){
				var _left = $(window).width() - $('.container').innerWidth()+40;
				_left=_left/-2;
				return _left;
			});
		});
	};
	function initMarginMap(){
		$(window).on('load resize', function(){
			$('.map-holder .map').css('margin-right', function(){
				var _left = $(window).width() - $('.container').innerWidth() - 40;
				_left=_left/-2;
				return _left;
			});
		});
	};


function initMap(){
					if(!$('#map_yandex').size())return;
						ymaps.ready(init);
						function init() {
							myMap = new ymaps.Map("map_yandex", {
							center: [29.88053, 121.542764],
							zoom: 14
						});
						myPlacemark = new ymaps.Placemark([29.88053, 121.542764], {}, {
							iconImageHref: 'images/map-logo.png',
							iconImageSize: [177, 107],
							iconImageOffset: [-8, -94]
						});
						myMap.geoObjects.add(myPlacemark);
					}
				}

function initMapBig(){
					if(!$('#map_yandex_big').size())return;
						ymaps.ready(init);
						function init() {
							myMap = new ymaps.Map("map_yandex_big", {
							center: [28.247187, 120.933623],
							zoom:6
						});
						myMap.controls.add('zoomControl', {left: '10px', top: '15px'});
						myPlacemark = new ymaps.Placemark([23.4730053, 116.621490], {}, {});
						myMap.geoObjects.add(myPlacemark);
						myPlacemark = new ymaps.Placemark([29.907082, 121.521392], {}, {});
						myMap.geoObjects.add(myPlacemark);
					}
				}

function initTabs(){
	$('.tabset .tab-control a').on('click', function(){
		var thisHold = $(this).closest(".tabset");
		var _ind = $(this).closest('li').index();
		if($('.cargo-list').size()){
			_ind = $(this).closest('.slick-slide').index();
			$(this).closest(".cargo-list").find(".active").removeClass("active");
		}
		thisHold.children('.tab-body').children(".tab").removeClass('active');
		thisHold.children('.tab-body').children("div.tab:eq("+_ind+")").addClass('active');
		$(this).closest("ul").find(".active").removeClass("active");
		$(this).parent().addClass("active");
		return false;
	});
};




/*! device.js 0.1.58 */
(function() {
	var a, b, c, d, e, f, g, h, i, j;
	a = window.device, window.device = {}, c = window.document.documentElement, j = window.navigator.userAgent.toLowerCase(), device.ios = function() {
		return device.iphone() || device.ipod() || device.ipad()
	}, device.iphone = function() {
		return d("iphone")
	}, device.ipod = function() {
		return d("ipod")
	}, device.ipad = function() {
		return d("ipad")
	}, device.android = function() {
		return d("android")
	}, device.androidPhone = function() {
		return device.android() && d("mobile")
	}, device.androidTablet = function() {
		return device.android() && !d("mobile")
	}, device.blackberry = function() {
		return d("blackberry") || d("bb10") || d("rim")
	}, device.blackberryPhone = function() {
		return device.blackberry() && !d("tablet")
	}, device.blackberryTablet = function() {
		return device.blackberry() && d("tablet")
	}, device.windows = function() {
		return d("windows")
	}, device.windowsPhone = function() {
		return device.windows() && d("phone")
	}, device.windowsTablet = function() {
		return device.windows() && d("touch")
	}, device.fxos = function() {
		return d("(mobile; rv:") || d("(tablet; rv:")
	}, device.fxosPhone = function() {
		return device.fxos() && d("mobile")
	}, device.fxosTablet = function() {
		return device.fxos() && d("tablet")
	}, device.mobile = function() {
		return device.androidPhone() || device.iphone() || device.ipod() || device.windowsPhone() || device.blackberryPhone() || device.fxosPhone()
	}, device.tablet = function() {
		return device.ipad() || device.androidTablet() || device.blackberryTablet() || device.windowsTablet() || device.fxosTablet()
	}, device.portrait = function() {
		return 90 !== Math.abs(window.orientation)
	}, device.landscape = function() {
		return 90 === Math.abs(window.orientation)
	}, device.noConflict = function() {
		return window.device = a, this
	}, d = function(a) {
		return -1 !== j.indexOf(a)
	}, f = function(a) {
		var b;
		return b = new RegExp(a, "i"), c.className.match(b)
	}, b = function(a) {
		return f(a) ? void 0 : c.className += " " + a
	}, h = function(a) {
		return f(a) ? c.className = c.className.replace(a, "") : void 0
	}, device.ios() ? device.ipad() ? b("ios ipad tablet") : device.iphone() ? b("ios iphone mobile") : device.ipod() && b("ios ipod mobile") : device.android() ? device.androidTablet() ? b("android tablet") : b("android mobile") : device.blackberry() ? device.blackberryTablet() ? b("blackberry tablet") : b("blackberry mobile") : device.windows() ? device.windowsTablet() ? b("windows tablet") : device.windowsPhone() ? b("windows mobile") : b("desktop") : device.fxos() ? device.fxosTablet() ? b("fxos tablet") : b("fxos mobile") : b("desktop"), e = function() {
		return device.landscape() ? (h("portrait"), b("landscape")) : (h("landscape"), b("portrait"))
	}, i = "onorientationchange" in window, g = i ? "orientationchange" : "resize", window.addEventListener ? window.addEventListener(g, e, !1) : window.attachEvent ? window.attachEvent(g, e) : window[g] = e, e()
}).call(this);