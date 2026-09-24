 $(document).ready(function() {

    setTimeout(function(){
        $('#masker').delay(400).animate({ 'opacity': 0 }, 1000, 'linear', function(){ $(this).css({'display':'none'}); });
         $('#masker img').animate({ 'opacity': 0 }, 400, 'linear');
    }, 500);

  });

$( document ).on( "click", "#bannerclose", function() {
  $("body").removeAttr("style");
  $( "#popupbanner" ).fadeOut("fast");
});


(function($) {

    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top-0, scrollLeft:target.offset().left-0
            }, 1500);
            return false;
          }
        }
      });
    });

})(jQuery);




  $('#nav-icon').on('click', function() {
    $(this).toggleClass('open');


    if ( $('#nav-icon').hasClass("open") ) {

      $('#main-menu').animate({ marginRight: 0 }, 500);
        $('#mn').animate({marginLeft: 100 + '%'}, 500);
        $('.logo-menu a img').animate({opacity: 0}, 500)


    } else {
        $('#main-menu').animate({ marginRight: -300 + '%' }, 500);
        $('html,body').animate({ scrollTop: 0 }, 300);
        $('#mn').animate({marginLeft: 0 }, 500);
        $('.logo-menu a img').animate({opacity: 1}, 500)
    }

  });

  $('.item').on('click', function() {
      if ( $('#nav-icon').hasClass("open") ) {
        $('#nav-icon').toggleClass('open');
        $('#main-menu').animate({ right: -300 + 'px' }, 500);
      }
    });

   $('.close-left').on('click', function() {
        $('#location').animate({ marginLeft: -100 + 'px', opacity: 0 }, 600);
   });

  // Hide Header on on scroll down
var didScroll;
var lastScrollTop = 0;
var delta = 2;
var navbarHeight = $('#header').outerHeight();

$(window).scroll(function(event){
    didScroll = true;
});

setInterval(function() {
    if (didScroll) {
        hasScrolled();
        didScroll = false;
    }
}, 50);

function hasScrolled() {
    var st = $(this).scrollTop();

    // Make sure they scroll more than delta
    if(Math.abs(lastScrollTop - st) <= delta)
        return;

    // If they scrolled down and are past the navbar, add class .nav-up.
    // This is necessary so you never see what is "behind" the navbar.
    //

    if (st > lastScrollTop && st > navbarHeight) {
        // Scroll Down
        $('#header').removeClass('downnn');
    } else {
        // Scroll Up
        if(st + $(window).height() < $(document).height()) {
            $('#header').addClass('uppp').addClass('downnn');
        }
    }

    if (st > (500)) {
       $('#header').addClass('fixeddd');
    }
    if (st < (100)) {
       $('#header').removeClass('fixeddd').removeClass('downnn').removeClass('uppp');
    }

    lastScrollTop = st;
}



 $(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 600) {

        }
        else
        {
            $("#videoplayer").ready(function() {

            setTimeout(function(){
                $(".loader").fadeOut("slow");
            }, 6000);

           });
        }
    }
});

 $('.btt').on('click', function() {
      $('html,body').animate({ scrollTop: 0 }, 1000);
    });




$(function(){

var appendthis =  ("<div class='modal-overlay js-modal-close'></div>");

  $('a[data-modal-id]').click(function(e) {
    e.preventDefault();
    $("body").append(appendthis);
    $(".modal-overlay").fadeTo(500, 0.85);
    $(".js-modalbox").fadeIn(500);
    var modalBox = $(this).attr('data-modal-id');
    $('#'+modalBox).fadeIn($(this).data());
  });


$(".js-modal-close, .modal-overlay").click(function() {
    $(".modal-box, .modal-overlay").fadeOut(500, function() {
        $(".modal-overlay").remove();
    });

});

$(window).resize(function() {
    $(".modal-box").css({
        top: ($(window).height() - $(".modal-box").outerHeight()) / 3,
        left: ($(window).width() - $(".modal-box").outerWidth()) / 2
    });
});

$(window).resize();

});

 $(document).ready(function() {


});

 $(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 600) {

        }
        else
        {
            $("#videoplayer").ready(function() {

            setTimeout(function(){
                $(".loader").fadeOut("slow");
            }, 6000);

           });
        }
    }
});

   $('.fhead').on('click', function() {
    $('#feedback').toggleClass('open');

    if ( $('#feedback').hasClass("open") ) {

       $('#feedback').animate({ bottom: -334 + 'px'}, 1000);


    } else {

      $('#feedback').animate({ bottom: 0 + 'px' }, 1000);
    }

  });


   $(document).ready(function () {
    $(window).on("resize", function (e) {
        checkScreenSize();
    });

    checkScreenSize();

    function checkScreenSize(){
        var newWindowWidth = $(window).width();
        if (newWindowWidth < 600) {

        }
        else
        {
            $("#bgvideo").ready(function() {

            setTimeout(function(){
                $(".loader").fadeOut("slow");
            }, 6000);

           });
               $('.booktoday,.popup, #sidebook').magnificPopup({
                    type: 'iframe'
                });
        }
    }
});


