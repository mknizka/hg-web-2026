var safeDefer={srcDeferAttribute:"data-safe-defer-src",styleDeferAttribute:"data-safe-defer-style",classDeferAttribute:"data-safe-defer-class",srcBackingAttribute:"data-safe-deferred-src",imagePlaceholder:"data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",debugMode:!1,deferAll:function(){this.deferSources(),this.deferClasses(),this.deferStyles()},deferSources:function(){for(var e="*["+this.srcDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],i=s.getAttribute("src");this.debugMode&&console.log("Deferring Source: "+i),!s.complete&&(s.setAttribute(this.srcBackingAttribute,i),s.setAttribute("src",this.imagePlaceholder)),s.removeAttribute(this.srcDeferAttribute)}},deferClasses:function(){for(var e="*["+this.classDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r];s.getAttribute(this.classDeferAttribute).split(" ").forEach(function(e){this.debugMode&&console.log("Deferring Class: "+e),s.classList.remove(e)})}},deferStyles:function(){for(var e="*["+this.styleDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],i=s.getAttribute("style");this.debugMode&&console.log("Deferring Style: "+i),s.setAttribute(this.styleDeferAttribute,i),s.setAttribute("style","")}},loadAllDeferred:function(){this.loadDeferredClasses(),this.loadDeferredSources(),this.loadDeferredStyles()},loadDeferredSources:function(){for(var e="*["+this.srcBackingAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],i=s.getAttribute(this.srcBackingAttribute);this.debugMode&&console.log("Loading Source: "+i),s.setAttribute("src",i),s.removeAttribute(this.srcBackingAttribute)}},loadDeferredClasses:function(){for(var e="*["+this.classDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r];s.getAttribute(this.classDeferAttribute).split(" ").forEach(function(e){this.debugMode&&console.log("Appending Class: "+e),s.classList.add(e)}),s.removeAttribute(this.classDeferAttribute)}},loadDeferredStyles:function(){for(var e="*["+this.styleDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],i=s.getAttribute(this.styleDeferAttribute);this.debugMode&&console.log("Setting Style: "+i),s.setAttribute("style",i),s.removeAttribute(this.styleDeferAttribute)}}};window.addEventListener("load",function(){safeDefer.debugMode&&console.log("Page load complete!"),safeDefer.loadAllDeferred()},!1);

 $(document).ready(function() {


    $(window).scroll(function(){
    var wintop = $(window).scrollTop(), docheight =

        $(document).height(), winheight = $(window).height();
                var scrolled = (wintop/(docheight-winheight))*100;

            $('.scroll-line').css('width', (scrolled + '%'));
    });

  });


$( document ).on( "click touchstart", "#bannerclose", function() {
  $("body").removeAttr("style");
  $( "#popupbaner" ).animate({left: "-1000px"}, 500);
  sessionStorage.setItem("popupbanner", "closed");
});

if (sessionStorage.getItem('popupbanner') === ('closed')) {
  $( "#popupbaner" ).hide()
}

(function($) {

    $(function() {
      $('a[href*=#]:not([href=#])').click(function() {
        if (location.pathname.replace(/^\//,'') == this.pathname.replace(/^\//,'') && location.hostname == this.hostname) {
          var target = $(this.hash);
          target = target.length ? target : $('[name=' + this.hash.slice(1) +']');
          if (target.length) {
            $('html,body').animate({
              scrollTop: target.offset().top-70+'px', scrollLeft:target.offset().left-0
            }, 1500);
            return false;
          }
        }
      });
    });

    $(window).bind("scroll", function() {
   if ($(this).scrollTop() > 1) { //Fade in at a level of height
     $("header").addClass("ww");
   } else {
     $("header").removeClass("ww");
   }
 });


})(jQuery);

  $('#nav-icon').on('click', function() {
    $(this).toggleClass('open');


    if ( $('#nav-icon').hasClass("open") ) {

      $('#main-menu').animate({ right: 0 }, 0);
      $('#bcg1').animate({ right: 300 + 'px' }, 200);
        $('.logo-menu a img').animate({opacity: 0}, 200)


    } else {
        $('#main-menu').animate({ right: -100 + '%' }, 0);
        $('body').animate({ scrollTop: 0 }, 200);
        $('#bcg1').animate({ right: 0 + 'px' }, 200);
        $('.logo-menu a img').animate({opacity: 1}, 200)
    }

  });

   $('.close-left').on('click', function() {
        $('#location').animate({ marginLeft: -100 + 'px', opacity: 0 }, 200);
   });
