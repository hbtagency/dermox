(function($) {
	"use strict";

	 //Adtocart number increase
    $('.add_to_cart_button').click(function(event) {
       var currentNumber = $('.woocomerce-cart a').html();
       $('.woocomerce-cart a').html(parseInt(currentNumber)+1);
    });
    //Addto cart number descre
    $('.festi-cart-remove-product').click(function(event) {
       var currentNumber = $('.woocomerce-cart a').html();
       $('.woocomerce-cart a').html(parseInt(currentNumber)-1);
    });


    //Wow.js
    new WOW().init();


     //Adtocart number increase
    $('.add_to_cart_button').click(function(event) {
       var currentNumber = $('.woocomerce-cart a').html();
       $('.woocomerce-cart a').html(parseInt(currentNumber)+1);
    });
    //Addto cart number descre
    $('.festi-cart-remove-product').click(function(event) {
       var currentNumber = $('.woocomerce-cart a').html();
       $('.woocomerce-cart a').html(parseInt(currentNumber)-1);
    });

    //Menu mobile
    $("#bleute-mobile-menu button").click(function(){  
        $(".mobile-menu .menu, #bleute-mobile-menu button").toggleClass("show-menu-mobile");
        $("footer,header,body").toggleClass("show-menu-mobile");
    });

    $("#bleute-mobile-menu .menu-item-has-children").click(function(){  
        if ($('#bleute-mobile-menu .mobile-menu ul li').hasClass('menu-item-has-children')) {
          $(this).find('.sub-menu').toggleClass('active');
        };
    });

    var size_screen = screen.width;
    if (size_screen<400) {
      $(".menu-item-has-children").prepend("<div class='arrow-menu'><i class='fa fa-angle-down'></i></div>");
    };

    var home07 = $(".gallery-page");
    var checkpos07 = home07.position();

    var tabs = $('.woocommerce-tabs');
    var tabs_pos = tabs.position();
    
    var checkbottom = $('.two-widget').position();
    if(checkpos07!=undefined){
      var pos07 = checkpos07.top;
      if(checkbottom!=undefined){
      var bottom = (checkbottom.top)-1000;
      }
        $(window).scroll(function() {
            var windowpos = $(window).scrollTop();
            if (windowpos >= (pos07-20)) {
                $(".side-bar-gallery").addClass("stick-scroll");
            }
            else {
                $(".side-bar-gallery").removeClass("stick-scroll");
            }
            if (windowpos >= (bottom)) {
                $(".side-bar-gallery").removeClass("stick-scroll");
            }
        });
    }
    $(document).ready(function(){
      if(tabs_pos!=undefined){
        var pos_tabs = tabs_pos.top;
          $(window).scroll(function() {
              var windowpos = $(window).scrollTop();
              if (windowpos >= (pos_tabs-200)) {
                  $(".woocommerce-tabs .bg-tab").addClass("stick-scroll");
              }
              else {
                  $(".woocommerce-tabs .bg-tab").removeClass("stick-scroll");
              }
          });
      }
      
      $('.menu-left #main-nav #main-navigation').hover(function(event) {
      	$('#main-nav').toggleClass('active');
        $('.bottom-header-left').toggleClass('active');
      });

      $('.menu-left #main-nav #main-navigation .sub-menu').hover(function(event) {
        $('.bottom-header-left').toggleClass('active');
      });

      $('.menu-left #main-nav #main-navigation .sub-menu .sub-menu').hover(function(event) {
        $('.bottom-header-left').toggleClass('active');
      });
    });
})(jQuery);