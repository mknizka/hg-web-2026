<?php require_once __DIR__.'/hg-editorial.php'; if (hg_is_product_content($content)) { require __DIR__.'/hg-product-page.php'; return; } ?>
     <?php if ($content['id'] == 180): ?>
      
      <?php include 'template/ellipse/files/ella.php'; ?>
     
     <?php else: ?>

      <?php
      
      // BLOG FUNKCIONALITY: Inkrementácia zobrazení článku
      if(isset($content['id']) && $content['id'] > 0) {
        if (function_exists('incrementArticleViews')) incrementArticleViews($content['id']);
      }
    ?>

      <main class="hg-article ed-article">
        <section id="page">
          <div class="container-fluid">
            <div class="row center-md">

              <div class="col-md-10 wrapper-30-0">
                <p class="hg-kicker"><a class="smallback" href="/blog/"><?php echo hg_lang('Blog', 'Blog'); ?></a></p>
                <h1><?php echo hg_esc($content['name']); ?></h1>
                <?php $articleLead = hg_plain($content['parex_text'] ?? ''); $articleWords = preg_split('/\s+/u', hg_plain($content['text'][0] ?? ''), -1, PREG_SPLIT_NO_EMPTY); $readMinutes = max(1, (int)ceil(count($articleWords) / 200)); ?>
                <?php if ($articleLead): ?><p class="ed-lead"><?php echo hg_esc($articleLead); ?></p><?php endif; ?>
                <p class="ed-meta">HORECA GROUP <span aria-hidden="true">·</span> <?php echo $readMinutes.' '.hg_lang('min čítania', 'min read'); ?></p>
                <?php if (!empty($content['file_type']) && preg_match('/^(jpe?g|png|webp|avif|gif)$/i', $content['file_type'])): ?><figure class="ed-article-cover"><img src="/img/rs/<?php echo (int)$content['id']; ?>.<?php echo hg_esc($content['file_type']); ?>" data-rs-fallback="/img/rs/<?php echo (int)$content['id']; ?>-01.<?php echo hg_esc($content['file_type']); ?>" alt="<?php echo hg_esc($content['name']); ?>" decoding="async" fetchpriority="high"></figure><?php endif; ?>
            
            
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
                          <div class="ed-article-content"><?php echo $content['text'][0]; ?></div>
                          <?php $articleCtas = hg_editorial_ctas(); $ctaKeys = array_rand($articleCtas, 2); hg_editorial_cta($articleCtas[$ctaKeys[0]], true); ?>

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
                                <?php if (function_exists('socialShareButtons')) socialShareButtons($content['name']); ?>
                              </div>

                              <?php if(isset($content['id']) && $content['id'] > 0): ?>
                                <div class="mt-40">
                                  <?php if (function_exists('displayArticleEmotions')) { ob_start(); displayArticleEmotions($content['id']); echo hg_text_reactions(ob_get_clean()); } ?>
                                </div>
                              <?php endif; ?>

                        </div>
                      </article>
                    </div>
                    <div class="col-md-3 sticky-sidebar-col">
                    <div class="sticky-sidebar">
                      <div id="article-progress-placeholder" style="margin-bottom: 30px;"></div>
                      <div id="article-toc-placeholder"></div>
                      <?php if (!empty($content['id']) && function_exists('displayArticleSpeech')): ?><div class="ed-audio"><?php displayArticleSpeech($content['id']); ?></div><?php endif; ?>
                      <div class="mt-40">
                        <?php if (function_exists('displayTopArticlesByEmotions')) { ob_start(); displayTopArticlesByEmotions(5, true); echo hg_text_reactions(ob_get_clean()); } ?>
                      </div>
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

      <div class="ed-article-more"><?php hg_editorial_cta($articleCtas[$ctaKeys[1]]); ?></div>
      </main>
      <?php endif; ?>
