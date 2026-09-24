     <?php if ($content['id'] == 180): ?>
      
      <?php include 'template/ellipse/files/ella.php'; ?>
     
     <?php else: ?>

      <?php
      
      // BLOG FUNKCIONALITY: Inkrementácia zobrazení článku
      if(isset($content['id']) && $content['id'] > 0) {
        incrementArticleViews($content['id']);
      }
    ?>

      <main class="hg-article">
        <section id="page">
          <div class="container-fluid">
            <div class="row center-md">

              <div class="col-md-10 wrapper-30-0">
                <p class="hg-kicker"><a class="smallback" href="/blog/"><?php echo hg_lang('Blog', 'Blog'); ?></a></p>
                <h1><?php echo hg_esc($content['name']); ?></h1>
            
            
                <?php if ($content['id'] == 68): ?>

                  <section id="www">
                     <div class="container-fluid">
                         <div class="row center-md">
                           <div class="col-md-6">


                             <div class="wrapper-10-0"></div>
                           </div>
                         </div>
                                 <div class="row center-md middle-md">
                                   <div class="col-md-10">


                                             <div id="owl-www" class="owl-carousel owl-theme">
                                               <?php
                                                         $banner = banner(8);
                                                         $total = count($banner);
                                                         $poc = 0;
                                                       ?>

                                                     <?php foreach($banner as $k => $v): ?>
                                                         <?php $poc++; ?>

                                                           <div class="item" style="background:url(/img/ilustrations/8_<?php echo $v['id']; ?>.<?php echo $v['file_type']; ?>);background-size: cover;height:0;padding-bottom:50%;padding-bottom: 50%;
        border-radius: 10px;
        overflow: hidden;
        margin: 50px;
        box-shadow: 0 0 30px rgb(0 0 0 / 21%);" data-safe-defer-style>

                                                           </div>

                                                       <?php endforeach; ?>
                                             </div>

                                     </div>
                               </div>
                           </div>
                  </section>

                <?php else: ?>


                <?php endif; ?>
              </div>
              <div class="col-md-10">
                <div class="container-fluid">
                  <div class="row center-md hg-article-layout">
                    <div class="col-md-6 hg-article-main">
                      <article class="main-content">
                        <div class="text-left">
                          <?php echo $content['text'][0];?>

                                        <?php if ($content['id'] == 84): ?>

                                          <h2>Registrácia na školenie</h2>
                                          <div class="wrapp-1">
                                          <?php
                                            if(sess('lang') == 'sk'): {
                                                $fields = array(
                                                          'name'    => 'Meno',
                                                          'surname' => 'Priezvisko',
                                                          'email'   => 'E-mail',
                                                          'tel'     => 'Mobil',
                                                          'namep'    => 'Názov prevádzky',
                                                          'lot'    => 'Počet účastníkov',
                                                          'text'    => 'Poznámka',
                                                          'submit'  => 'Odoslať'
                                                        );
                                                        contacForm($fields);
                                                    };
                                                    else: {
                                                      $fields = array(
                                                        'name'    => 'Meno',
                                                        'surname' => 'Priezvisko',
                                                        'email'   => 'E-mail',
                                                        'tel'     => 'Mobil',
                                                        'text'    => 'Povedzte nám prosím niečo o sebe.',
                                                        'submit'  => 'Odoslať'
                                                        );
                                                        contacForm($fields);
                                                    };
                                                endif;

                                          ?>



                                          </div>
                                          <div class="break" style="width: 0px; height: 0px; line-height: 0px; font-size: 0px; border: 0px none; margin: 0px; padding: 0px; float: none; clear: both; visibility: hidden;">

                                          </div>
                                          <div class="row">
                                            <div class="col-md-12">
                                              <div class="wrapper-60-0"></div>
                                            </div>
                                          </div>
                                        <?php endif; ?>


                                            <?php if ($content['id'] == 88): ?>

                                              <h2>Objednávka inštalácie</h2>
                                              <div class="wrapp-1">
                                              <?php
                                                if(sess('lang') == 'sk'): {
                                                    $fields = array(
                                                              'name'    => 'Meno',
                                                              'surname' => 'Priezvisko',
                                                              'email'   => 'E-mail',
                                                              'tel'     => 'Mobil',
                                                              'namep'    => 'Názov prevádzky',
                                                              'lot'    => 'Počet pokladní',
                                                              'text'    => 'Poznámka - typ aktualizácie (Aj Portos aj Ellipse / Iba Ellipse)',
                                                              'submit'  => 'Odoslať'
                                                            );
                                                            contacForm($fields);
                                                        };
                                                        else: {
                                                          $fields = array(
                                                            'name'    => 'Meno',
                                                            'surname' => 'Priezvisko',
                                                            'email'   => 'E-mail',
                                                            'tel'     => 'Mobil',
                                                            'text'    => 'Povedzte nám prosím niečo o sebe.',
                                                            'submit'  => 'Odoslať'
                                                            );
                                                            contacForm($fields);
                                                        };
                                                    endif;

                                              ?>

                                            </div>
                                            <div class="break" style="width: 0px; height: 0px; line-height: 0px; font-size: 0px; border: 0px none; margin: 0px; padding: 0px; float: none; clear: both; visibility: hidden;">

                                            </div>
                                            <div class="row">
                                              <div class="col-md-12">
                                                <div class="wrapper-60-0"></div>
                                              </div>
                                            </div>
                                          <?php endif; ?>

                                          <div class="mt-60">
                                <?php socialShareButtons($content['name']); ?>
                              </div>

                              <div class="hg-article-cta cta">
                                <span class="kicker light"><?php echo hg_lang('Pozrite sa, ako funguje Ellipse', 'See how Ellipse works'); ?></span>
                                <p class="cta-title"><?php echo hg_lang('Každý deň so starým systémom brzdíte biznis. <em>Začnite ešte dnes.</em>', 'Every day on the old system slows the business. <em>Start today.</em>'); ?></p>
                                <a class="button white" href="<?php echo hg_esc(hg_nap()['demo']); ?>"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?></a>
                              </div>
                              <?php if(isset($content['id']) && $content['id'] > 0): ?>
                                <div class="mt-40">
                                  <?php ob_start(); displayArticleEmotions($content['id']); echo hg_text_reactions(ob_get_clean()); ?>
                                </div>
                              <?php endif; ?>

                        </div>
                      </article>
                    </div>
                    <div class="col-md-3 sticky-sidebar-col">
                    <div class="sticky-sidebar">
                      <div id="article-progress-placeholder" style="margin-bottom: 30px;"></div>
                      <div id="article-toc-placeholder"></div>
                      <div class="mt-40">
                        <?php ob_start(); displayTopArticlesByEmotions(5, true); echo hg_text_reactions(ob_get_clean()); ?>
                      </div>
                    </div>
                  </div>
                    <div class="col-md-2 hg-article-aside">
                     <div class="sticky-sidebar">
                    <?php if(isset($content['id']) && $content['id'] > 0): ?>
                      <div class="mt-40">
                        <?php displayArticleSpeech($content['id']); ?>
                      </div>
                    <?php endif; ?>
                     </div>
                    </div>
                    <div class="col-md-12">
                      <div class="wrapper-60-0"></div>
                    </div>
                  </div>

                </div>
              </div>
            </div>

          </div>
        </section>

      </main>
      <?php endif; ?>
