(function ($) {
  "use strict";

  // preloader
  $(window).load(function () {
    $('.preloader').fadeOut('slow');
  });

  // WOW Js Active
  new WOW().init();

  // Mobile Menu Active
  jQuery('.mobile-menu-active').meanmenu({
    meanMenuContainer: '.mobile-menu-container',
    meanScreenWidth: "993"
  });


  // Hero Nice Select Box
  $('select').niceSelect();


  // Data images For Background image
  if ($('.background-image').length > 0) {
    $('.background-image').each(function () {
      var src = $(this).attr('data-src');
      $(this).css({
        'background-image': 'url(' + src + ')'
      });
    });
  }


  // Hero Slider Active
  $('.hero-slider-images.v1').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 8000,
    fade: true,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
    responsive: [{
        breakpoint: 1350,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 1200,
        settings: {
          arrows: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });



  // Home 2 Hero Slider Active
  function mainSlider() {
    var BasicSlider = $('.slider2-active');
    BasicSlider.on('init', function (e, slick) {
      var $firstAnimatingElements = $('.slider2-active img:first-child').find('[data-animation]');
      doAnimations($firstAnimatingElements);
    });
    BasicSlider.on('beforeChange', function (e, slick, currentSlide, nextSlide) {
      var $animatingElements = $('.slider2-active img[data-slick-index="' + nextSlide + '"]').find(
        '[data-animation]');
      doAnimations($animatingElements);
    });
    BasicSlider.slick({
      slidesToShow: 1, 
      dots: true,
      infinite: true,
      autoplay: true,
      autoplaySpeed: 8000,
      fade: true,
      arrows: false,
      responsive: [{
        breakpoint: 1200,
        settings: {
          arrows: false,
          dots: false,
          infinite: true,
          fade: true,
        }
      },
      {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          infinite: true,
          fade: true,
        }
      }
        // You can unslick at a given breakpoint now by adding:
        // settings: "unslick"
        // instead of a settings object
      ]
    });

    function doAnimations(elements) {
      var animationEndEvents = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';
      elements.each(function () {
        var $this = $(this);
        var $animationDelay = $this.data('delay');
        var $animationType = 'animated ' + $this.data('animation');
        $this.css({
          'animation-delay': $animationDelay,
          '-webkit-animation-delay': $animationDelay
        });
        $this.addClass($animationType).one(animationEndEvents, function () {
          $this.removeClass($animationType);
        });
      });
    }
  }
  mainSlider();







  // Top Properties Slider
  $('.top-properties-slider').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 7000,
    fade: false,
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
    responsive: [{
        breakpoint: 1500,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 1200,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 992,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  // Home 2 Properties Slider
  $('.our-properties-slider').slick({
    dots: true,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 7000,
    fade: false,
    speed: 300,
    slidesToShow: 1,
    slidesToScroll: 1,
    arrows: false
  });


  // Testomonial Slider
  $('.testomonial-slider-area').slick({
    dots: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 7000,
    fade: false,
    speed: 300,
    slidesToShow: 2,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
    responsive: [{
        breakpoint: 1350,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 992,
        settings: {
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  // Home 2 Testomonial Slider
  $('.testomonial-circle-slide-area').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 7000,
    infinite: true,
    arrows: false,
    asNavFor: '.nav-slide-active'
  });
  $('.nav-slide-active').slick({
    slidesToShow: 4,
    autoplay: true,
    autoplaySpeed: 7000,
    slidesToScroll: 1,
    variableWidth: true,
    asNavFor: '.testomonial-circle-slide-area',
    dots: false,
    focusOnSelect: true
  });


  // Team Slider
  $('.team-slider-active').slick({
    dots: false,
    autoplay: true,
    infinite: true,
    fade: false,
    speed: 300,
    autoplaySpeed: 7000,
    slidesToShow: 4,
    slidesToScroll: 1,
    arrows: false,
    responsive: [{
        breakpoint: 1350,
        settings: {
          slidesToShow: 4,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 992,
        settings: {
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  // Latest Blog Slider
  $('.latest-blog-slider').slick({
    autoplay: true,
    dots: false,
    infinite: true,
    fade: false,
    speed: 300,
    autoplaySpeed: 7000,
    slidesToShow: 3,
    slidesToScroll: 1,
    arrows: true,
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-arrow-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-arrow-right"></i></button>',
    responsive: [{
        breakpoint: 1400,
        settings: {
          arrows:false
        }
      }, {
        breakpoint: 1350,
        settings: {
          slidesToShow: 3,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 1200,
        settings: {
          arrows: false,
          slidesToShow: 2,
          slidesToScroll: 1
        }
      }, {
        breakpoint: 768,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 1,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]
  });


  // Property Details Slider
  $('.property-details-slider').slick({
    dots: false,
    arrows: false,
    infinite: true,
    autoplay: true,
    autoplaySpeed: 7000,
    speed: 500,
    fade: true,
    cssEase: 'linear',
    asNavFor: '.property-details-slider-nav',
  });

  $('.property-details-slider-nav').slick({
    slidesToShow: 5,
    slidesToScroll: 1,
    asNavFor: '.property-details-slider',
    dots: false,
    focusOnSelect: true,
    arrows: false,
    autoplay: true,
    autoplaySpeed: 7000,
    infinite: true,
    responsive: [{
      breakpoint: 1200,
      settings: {
        slidesToShow: 5,
        slidesToScroll: 1
      }
    }, {
      breakpoint: 768,
      settings: {
        arrows: false,
        dots: false,
        slidesToShow: 4,
        slidesToScroll: 1
      }
      }, {
        breakpoint: 576,
        settings: {
          arrows: false,
          dots: false,
          slidesToShow: 3,
          slidesToScroll: 1
        }
      }
      // You can unslick at a given breakpoint now by adding:
      // settings: "unslick"
      // instead of a settings object
    ]

  });



  // Home 2 Blog Slider
  $('.v2-blogNews-slider-area').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 7000,
    dots: false,
    arrows: false,
    infinite: true
  });

  // Blog List Image Slider
  $('.blog-list-img-slider').slick({
    slidesToShow: 1,
    slidesToScroll: 1,
    autoplay: true,
    autoplaySpeed: 7000,
    dots: false,
    infinite: true,
    arrows: true, 
    prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
    nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
  });



  // Counter Up 
  $('.counter').counterUp({
    delay: 10,
    time: 1000
  });



  // sticky fix
  $(window).on("scroll", function () {

    if ($(this).scrollTop() > 50) {
      $('header').addClass("sticky");
    } else {
      $('header').removeClass("sticky");
    }

    //Check to see if the window is top if not then display button
    if ($(this).scrollTop() > 400) {
      $('.scrollToTop').addClass('show');
    } else {
      $('.scrollToTop').removeClass('show');
    }
    

  });


  $('.scrollToTop').on('click',function(){
    $('html, body').animate({
      scrollTop: 0
    }, 100);
    return false;
  })





  // Gooogle Map
  function basicmap() {
    // Basic options for a simple Google Map
    // For more options see: https://developers.google.com/maps/documentation/javascript/reference#MapOptions
    var mapOptions = {
      // How zoomed in you want the map to start at (always required)
      zoom: 11,
      scrollwheel: false,
      // The latitude and longitude to center the map (always required)
      center: new google.maps.LatLng(40.6700, -73.9400), // New York
      // This is where you would paste any style found on Snazzy Maps.
      styles: [{ "featureType": "water", "elementType": "geometry", "stylers": [{ "color": "#e9e9e9" }, { "lightness": 17 }] }, { "featureType": "landscape", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 20 }] }, { "featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{ "color": "#ffffff" }, { "lightness": 17 }] }, { "featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{ "color": "#ffffff" }, { "lightness": 29 }, { "weight": .2 }] }, { "featureType": "road.arterial", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 18 }] }, { "featureType": "road.local", "elementType": "geometry", "stylers": [{ "color": "#ffffff" }, { "lightness": 16 }] }, { "featureType": "poi", "elementType": "geometry", "stylers": [{ "color": "#f5f5f5" }, { "lightness": 21 }] }, { "featureType": "poi.park", "elementType": "geometry", "stylers": [{ "color": "#dedede" }, { "lightness": 21 }] }, { "elementType": "labels.text.stroke", "stylers": [{ "visibility": "on" }, { "color": "#ffffff" }, { "lightness": 16 }] }, { "elementType": "labels.text.fill", "stylers": [{ "saturation": 36 }, { "color": "#333333" }, { "lightness": 40 }] }, { "elementType": "labels.icon", "stylers": [{ "visibility": "off" }] }, { "featureType": "transit", "elementType": "geometry", "stylers": [{ "color": "#f2f2f2" }, { "lightness": 19 }] }, { "featureType": "administrative", "elementType": "geometry.fill", "stylers": [{ "color": "#fefefe" }, { "lightness": 20 }] }, { "featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{ "color": "#fefefe" }, { "lightness": 17 }, { "weight": 1.2 }] }]
    };
    // Get the HTML DOM element that will contain your map 
    // We are using a div with id="map" seen below in the <body>
    var mapElement = document.getElementById('contact-map');

    // Create the Google Map using our element and options defined above
    var map = new google.maps.Map(mapElement, mapOptions);

    // Let's also add a marker while we're at it
    var marker = new google.maps.Marker({
      position: new google.maps.LatLng(40.6700, -73.9400),
      map: map,
      title: 'Cryptox'
    });
  }
  if ($('#contact-map').length != 0) {
    google.maps.event.addDomListener(window, 'load', basicmap);
  }



  // Range Slider Active
  $("#slider-range").slider({
    range: true,
    min: 40,
    max: 600,
    values: [60, 570],
    slide: function (event, ui) {
      $("#amount").val("$" + ui.values[0] + " - $" + ui.values[1]);
    }
  });
  $("#amount").val("$" + $("#slider-range").slider("values", 0) + " - $" + $("#slider-range").slider("values", 1)); 






})(jQuery);