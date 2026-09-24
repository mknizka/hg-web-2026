<main>
  <section id="page" class="demo">
    <div class="container-fluid wrapper-30-0" id="contact">
      <div class="row center-md">
        <div class="col-md-10">
          <div class="container-fluid">
            <div class="row center-md">
              <div class="col-md-8">
                <div class="main-content">
                  <h1>Požiadavka na podporu a hotline</h1>
                  <div class="">
                    <?=$content['text'][0];?>
                  </div>
                </div>
              </div>
              <div class="col-md-10">
                <div class="container-fluid">
                  <div class="row <?php if ($content['id'] == 56): ?> center-md <?php endif; ?>">
                    <div class="col-md-12">
                      <div class="wrapper-20-0"></div>
                    </div>
                    <?php if ($content['id'] == 56): ?>

                      <div class="col-md-6">
                        <div class="wrapp-1">
                          <img src="/img/rs/55.png" width="80%" alt="Partner program Ellipse Hospitality Cloud" style="margin: 20px auto;box-shadow:none">
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="wrapp-1">
                          <p style="margin:0"><br></p>
                        <?php
                           if(sess('lang') == 'sk'): {
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
                    </div>
                    <?php else: ?>
                      <div class="col-md-6">
                        <div class="wrapp-1">
                          <h2>Máte výpadok alebo poruchu?</h2>
                          <p>Ak došlo k nedostupnosti systému alebo výpadku, neváhajte nás kontaktovať a obratom váš problém vyriešime k spokojnosti.</p>
                          <h2>Potrebujete pomoc?</h2>
                          <p>Ak potrebujete pomoc alebo radu pri práci so systémom, odporúčame vám pozrieť si naše video návody, ktoré sa nachádzajú v päte každého systému. Ak požadujete doškolenie alebo samostatné online školenie, rovnako nám prosím pošlite požiadavku cez kontaktný formulár na tomto webe. Naplánujeme pre vás najbližší voľný termín. </p>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="wrapp-1">
                          <p style="margin:0"><br></p>
                          <?php

                             if(sess('lang') == 'sk'): {
                                $fields = array(
                                          'name'	=> 'Vaše meno',
                                          'company'	=> 'Názov prevádzky',

                                          'email'   => 'E-mail',
                                          'tel'     => 'Mobil',
                                          'text'    => 'V stručnosti popíšte váš problém alebo požiadavku.',
                                          'submit'  => 'Odoslať'
                                        );
                                        contacForm($fields, '', 0, array('name', 'company', 'tel', 'email', 'text'), 0, 'podpora@horecagroup.sk');
                                    };
                                    else: {
                                      $fields = array(
                                                'name'	=> 'Vaše meno',
                                                'company'	=> 'Názov prevádzky',

                                                'email'   => 'E-mail',
                                                'tel'     => 'Mobil',
                                                'text'    => 'V stručnosti popíšte váš problém alebo požiadavku.',
                                                'submit'  => 'Odoslať'
                                              );
                                              contacForm($fields);
                                    };
                                endif;

                           ?>
                        </div>
                      </div>
                    <?php endif; ?>
                    <div class="col-md-12">

                    <div class="break"></div>


                      <div class="wrapper-60-0"></div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="wrapper-60-0"></div>
    </div>
  </section>
