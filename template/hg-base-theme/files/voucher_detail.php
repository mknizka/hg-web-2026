    <main>
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
    <div class="pop-bg"></div>
      <section id="slide">
        <div class="cover" style="background:url(<?php echo ($content['ogimg'] ? $content['ogimg'] : '/img/system/ogimg.jpg' ); ?>) 50% 50% no-repeat;cursor:pointer;background-size:cover">
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
          <div class="row">
            <div class="col-md-2" id="simpleshare">
              <div class="sharebtn">
                      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $curpage; ?>" onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=600px,height=400px'); return false;"><img src="/template/<?php echo $theme; ?>/images/fb-logo.svg" width="60" alt="fb logo"><span><?php echo lang('Zdieľajte na Facebooku',1)?></span></a>
                      <a href="https://twitter.com/share?url=<?php echo $curpage; ?>" onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=600px,height=400px'); return false;"><img src="/template/<?php echo $theme; ?>/images/tw-logo.svg" width="60" alt="twiter logo"><span><?php echo lang('Zdieľajte na Twitteri',1)?></span></a>
                      <a href="mailto:?subject=Odpor%C3%BA%C4%8Dam%20pozrie%C5%A5%20:)&amp;body=Link%3A%20<?php echo $curpage; ?>"><img src="/template/<?php echo $theme; ?>/images/mail-logo.svg" width="60" alt="fb logo"><span><?php echo lang('Pošlite link známemu',1)?></span></a>
                    </div>
            </div>

            <div class="col-md-6">
              <article>
                <div class="container-fluid" id="article-cont">
                  <div class="row top-md">
                    <div class="col-md-12">
                      <h1><?php echo $content['name']; ?></h1>
                      <div class="line"><span></span><span></span><span></span></div>
                      <div class="content">
                        <?php
                          if(is_array($content['text']) == false) {
                            echo $content['text'];
                          } else {
                            echo $content['text'][0];
                          }
                         ?>
                      </div>
                            <div id="voucherorder">
                                  <div id="voucherdetailform">
                                    <?php include './modules/voucher/voucher_order_form.php' ?>
                                  </div>
                              </div>


                    </div>
                  </div>
                 </div>
              </article>
            </div>
            <div class="col-md-1"></div>
            <div class="col-md-3">
            <div class="sticky">
                  <div class="sidie">
                    <h3><?php echo lang('Rýchla otázka',1) ?></h3>
                    <div id="smallorder">
                               <?php
                                if(sess('lang') == 'sk'): {
                                  $fields = array(
                                            'name'    => 'Meno',
                                            'surname'    => 'Priezvisko',
                                            'email'   => 'E-mail',
                                            'tel'     => 'Tel. kontakt',
                                            'text'    => 'Vaša správa',
                                            'submit'  => 'Odoslať'
                                          );
                                          contacForm($fields, '', 0);
                                      };
                                      else: {
                                        $fields = array(
                                            'name'    => 'Name',
                                            'surname'    => 'Surname',
                                            'email'   => 'E-mail',
                                            'tel'     => 'Tel. number',
                                            'text'    => 'Your message',
                                            'submit'  => 'Send'
                                          );
                                          contacForm($fields, '', 0);
                                      };
                                  endif;

                                        ?>
                            </div>
                      </div>
               </div>
            </div>
          </div>
        </div>
      </section>




<script>

  $('.input-number-increment').click(function() {
    var $input = $(this).parents('.input-number-group').find('.input-number');
    var val = parseInt($input.val(), 9);
    $input.val(val + 1);
  });

  $('.input-number-decrement').click(function() {
    var $input = $(this).parents('.input-number-group').find('.input-number');
    var val = parseInt($input.val(), 9);
    if (val > 0) {
      $input.val(val - 1);
    }
    else {
      $input.val()
    }
  });

</script>
