<link type="text/css" rel="stylesheet" href="modules/timi/timi.css" media="screen">

<main>

  <section id="slide">
    <div class="cover" style="background:url(<?php echo ($content['ogimg'] ? $content['ogimg'] : '/img/system/ogimg.jpg' ); ?>) 50% 50% no-repeat;cursor:pointer;background-size:cover;    height: 250px;">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-2"></div>
          <div class="col-md-8">
            <div class="heading">

            </div>
          </div>
        </div>
      </div>
    </div>
  </section>


  <section id="conte">
    <div class="container-fluid">
      <div class="row center-md">

        <div class="col-md-10">
          <article>
            <div class="container-fluid">
              <div class="row top-md">
                <div class="col-md-12">
                  <h1><?php echo $content['timi']['title']; ?></h1>
                  <div class="line"><span></span><span></span><span></span></div>
                  <?php if($content['timi']['subtitle'] != ''): ?>
                    <div class="subtitle">
                      <?php echo $content['timi']['subtitle']; ?>
                    </div>
                  <?php endif; ?>
                   <div class="container">
                     <div class="row">
                       <div class="col-md-12">
                         <breadscrumb>
                          <?php echo $content['breadscrumb']; ?>
                         </breadscrumb>
                       </div>
                     </div>
                   </div>
                   <div class="container">
                     <div class="row">
                       <div class="col-md-12">
                         <?php echo $content['timi']['content']; ?>
                       </div>
                     </div>
                   </div>

                </div>
              </div>
             </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <div id="popup">
    <div class="container">
      <div class="row center-md">
        <div class="col-md-8 popup-wrapper">
          <div id="popup-content">
            <div id="popup-close"></div>
            <div id="js-popup-content">
               <div class="br-preloader"></div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<?php //chatWeb(); ?>

  <script type="text/javascript" src="/template/js/timi.js"></script>

  <script>

    $( document ).on( "click", ".tb-delete", function() {
      $.post( "/utility/timi/deletereservation/", {
        id: $(this).data('delete'),
        type: '<?php echo $_GET['pb']; ?>'})
      .done(function( data ) {
        $('.js-times').fadeOut().html('');
        $('.js-times-h2').fadeOut();
        $('.js-basket').html( data ).fadeIn();
        refreshBasket();
      });
    });

    function restimes() {
      var date = $('.js-timi-date').val();
      $.post( "/utility/timi/restimes/", {
        date: date,
        service: <?php echo abs($content['timi']['service']); ?>
      })
      .done(function( data ) {
        $('.js-times').html( data ).fadeIn();
        $('.js-h2-date').html(date);
        $('.js-times-h2').fadeIn();
        $([document.documentElement, document.body]).animate({
          scrollTop: ($(".js-times-h2").offset().top - 80)
        }, 600);
      });
    }

    $( document ).on( "click", ".res-time", function() {
      $.post( "/utility/timi/doreservation/", {
        date: $('.js-timi-date').val(),
        area: $(this).data('area'),
        time: $(this).data('time'),
        service: <?php echo abs($content['timi']['service']); ?>,
        servicename: '<?php echo $content['timi']['title']; ?>',
        price: '<?php echo $content['timi']['price']; ?>',
        minutes: '<?php echo $content['timi']['minutes']; ?>' })
      .done(function( data ) {
        $('.js-times').fadeOut().html('');
        $('.js-times-h2').fadeOut();
        $('.js-basket').html( data ).fadeIn();
        $([document.documentElement, document.body]).animate({
          scrollTop: ($(".js-times-h2").offset().top - 80)
        }, 600);
      });
    });

  </script>
