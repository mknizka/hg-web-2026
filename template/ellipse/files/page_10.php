      <main>
        <section id="page" class="new">
          <div class="container-fluid maxcen">
            <div class="row center-md">
              <div class="col-md-10">
                <div class="row start-md">
                  <div class="col-md-9 wrapper-30-0">
                    <h1><?=$content['name'];?></h1>
                    <small class="underh"><p>Aktualizácia Ellipse <?=$content['parex_text'];?></p></small>
                    <div class="contentt" style="max-width: 1000px;width:100%">
                        <?php echo $content['text'][0]; ?>
                        <?php //echo _pre($content); ?>
                    </div>
                  </div>
                  <div class="col-md-3">
                    <div class="rightbox">
                      <h3>Posledné aktualizácie</h3>
                      <?php
                     $blogLastArticles = rs_last_articles('74', 'id', 10, 'DESC'); // rs_last_articles($id_category, $orderby = 'id', $limit = 10, $order = 'DESC')
                     foreach($blogLastArticles as $k => $v): ?>

                                 <a href="/aktualizacie/<?php echo $v['sef']; ?>/" class="actu">
                                   <div class="one-article">
                                         <div class="names">
                                           <? echo "<h4>".$v['name']. "</h4>"?>
                                           <? echo "<p>".$v['parex_text']. "</p>"?>
                                         </div>
                                       </div>
                                      </a>

                             <?php endforeach; ?>
                    </div>
                  </div>
                  <div class="col-md-12">
                    <div class="container-fluid">
                      <div class="row center-md">
                        <div class="col-md-7">
                          <div class="main-content">
                            <div class="text-left">


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

                              <div class="sharer">
                                <div class="share">
                                  <img src="/template/ellipse/img/share.svg" alt="Share with friends" class="sharet" data-safe-defer-src>
                                  <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $curpage; ?>" onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=600px,height=400px'); return false;"><img src="/template/<?php echo $theme; ?>/img/fb-logo.svg" width="60" alt="fb logo" data-safe-defer-src></a>
                                  <a href="https://twitter.com/share?url=<?php echo $curpage; ?>" onclick="window.open(this.href, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=600px,height=400px'); return false;"><img src="/template/<?php echo $theme; ?>/img/tw-logo.svg" width="60" alt="twiter logo" data-safe-defer-src></a>
                                  <a href="mailto:?body=Link%3A%20<?php echo $curpage; ?>"><img src="/template/<?php echo $theme; ?>/img/mail-logo.svg" width="60" alt="fb logo" data-safe-defer-src></a>
                                </div>
                              </div>

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
            </div>
          </div>
        </section>

      </main>
