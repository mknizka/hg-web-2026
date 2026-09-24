    <main class="solution-detail">
      <section id="automation">
        <div class="container-fluid">
          <div class="row center-md middle-md vh80 righthead">
            <div class="col-md-10">
              <div class="pms">
                <div class="container-fluid">
                  <div class="row middle-md start-md">

                    <div class="col-md-5 wow animated fadeIn" >
                      <h1><?php echo $content['title']; ?></h1>
                      <div class="adv">
                        <div class="container-fluid">
                          <div class="row top-md">
                            <div class="col-md-10">
                              <h2><?php echo $content['parex_text']; ?></h2>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>

                    <?php if ($content['id'] == 48):  // Pri mailingu kus vačšejšie pri ostatnych kus menše ?>

                      <div class="col-md-7 wow animated fadeIn" data-wow-delay="1s" data-wow-duration="2s">

                    <?php else: ?>

                    <div class="col-md-1"></div>
                    <div class="col-md-6 wow animated fadeIn" data-wow-delay="1s" data-wow-duration="2s">

                    <?php endif; ?>

                      <img src="/img/rs/<?php echo $content['id']; ?>.<?php echo $content['file_type']; ?>" alt="<?php echo $content['name']; ?> - Ellipse Hospitality Cloud solutions" width="100%" data-safe-defer-src>
                    </div>
                    <div class="col-md-12">
                      <div class="wrapper-30-0">

                      </div>
                    </div>
                    <div class="col-md-12">
                    <div class="adv">
                      <div class="container-fluid">
                        <div class="row">
                          <div class="col-md-12">
                              <?php echo $content['text'][0]; ?>
                          </div>
                        </div>
                      </div>
                      <a href="/kontakt/" class="bigbut center">Vyskúšať demo</a>
                    </div>

                  </div>
                </div>
              </div>
            </div>

            <?php if ($content['id'] == 164): ?>

              <div class="container-fluid">
                <div class="row center-md">
                  <div class="col-md-12">
                  <div class="wrapper-40-0"></div>
                  </div>
                  <div class="col-md-12">
                  <div class="wrapper-40-0"></div>
                  </div>
                  <div class="col-md-12">
                    <div class="container-fluid">
                      <div class="row center-md">
                        <div class="col-md-12">
                          <div class="swiper-container my-faq-slider">
                            <div class="swiper-wrapper">
                            <?php
                              $banner = banner(10);
                            $total = count($banner);
                            $poc = 0;
                          ?>

                        <?php foreach($banner as $k => $v): ?>


                                  <div class="swiper-slide">
                                    <div class="container-fluid">
                                      <div class="row center-md">
                                        <div class="col-md-12">
                                          <img src="/img/ilustrations/10_<?php echo $v['id']; ?>.<?php echo $v['file_type']; ?>" alt="<?php echo $v['name']; ?> - Ellipse Hospitality Cloud solutions" width="100%" data-safe-defer-src>
                                        </div>
                                      </div>
                                    </div>
                                  </div>  

                        <?php endforeach; ?>

                        </div>
                      </div>
                        </div>
                    </div>
                  </div>
                  </div>


                  <div class="col-md-12">
                  <div class="wrapper-40-0"></div>
                  </div>
                  <div class="col-md-12">
                  <div class="wrapper-40-0"></div>
                  </div>
                  <div class="col-md-12">
                    <h2 class="nomaliseh2"><?php echo lang('Časté otázky k Ellipse revPRO') ?></h2>
                  </div>
                  <div class="col-md-8">

                    <div class="row start-md top-md text-left">
              

                          <?php
                          $banner = banner(9);
                          $total = count($banner);
                          $poc = 0;
                        ?>

                      <?php foreach($banner as $k => $v): ?>


                            <div class="col-md-6">

                                <div class="question">
                                    <span class="toggle-btn"><?php echo $v['name']; ?></span>
                                    <div class="toggle profil" style="display: none;">
                                    <?php echo $v['text']; ?>
                                    </div>

                                  </div>  

                            </div>

                        <?php endforeach; ?>

                        </div>

                   </div>
					
                 </div>
                </div>

                <script type="application/ld+json">
                {
                  "@context": "https://schema.org",
                  "@type": "FAQPage",
                  "mainEntity": [
                    <?php
                    $faq_items = [];
                    foreach($banner as $k => $v) {
                        $question = htmlspecialchars(strip_tags($v['name']), ENT_QUOTES, 'UTF-8');
                        // Basic stripping, might need refinement based on actual content
                        $answer = htmlspecialchars(strip_tags($v['text']), ENT_QUOTES, 'UTF-8'); 
                        $faq_items[] = '{
                            "@type": "Question",
                            "name": "' . $question . '",
                            "acceptedAnswer": {
                                "@type": "Answer",
                                "text": "' . $answer . '"
                            }
                        }';
                    }
                    echo implode(",", $faq_items);
                    ?>
                  ]
                }
                </script>

                  <script type="text/javascript">
                  $('.toggle-btn').click(function() {
                    $(this).next('.toggle').slideToggle('slow');
                    $(this).toggleClass('opened');
                  return false;
                  });
                  </script>
            
                  
                  <div class="col-md-12">
                  <div class="wrapper-30-0"></div>
                  </div>
                  <div class="newquestion">
                  <h2><?php echo lang('Máte návrh na novú otázku?') ?></h2>
                  <?php

                  if(sess('lang') == 'sk'): {
                  $fields = array(
                          'meno'   => 'Vaše meno',
                          'email'   => 'E-mail',

                          'text'    => 'Námet na otázku',
                          'submit'  => 'Odoslať'
                        );
                        contacForm($fields);
                    };
                    else: {
                      $fields = array(
                        'meno'   => 'Vaše meno',
                        'email'   => 'E-mail',

                        'text'    => 'Námet na otázku',
                        'submit'  => 'Odoslať'
                        );
                        contacForm($fields);
                    };
                  endif;

                  ?>
                  </div>
				  </div>
				  <div class="col-md-12">
					  
					  <div class="container-fluid">
				  <div class="row center-md middle-md">

					<div class="col-md-12">
						<div class="wrapper-30-0"></div>
						<div class="wrapper-30-0"></div>
						<div class="wrapper-30-0"></div>
					  </div>
				  
				  <div class="col-md-7">
						<h2>Webinár k predstaveniu modulu</h2>
						<div class="video-wrapper">
						<iframe 
							src="https://www.youtube.com/embed/yNEngK9O15g?si=uQC503XbTYPFYwzj&start=140" 
							title="YouTube video player" 
							allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" 
							referrerpolicy="strict-origin-when-cross-origin" 
							allowfullscreen>
						</iframe>
					</div>
					</div>

				  </div>
				  </div>
					  
			      </div>
				  

            <?php endif; ?>

          </div>
        </div>
      </section>
      <style>
    #automation  .question ul {
    list-style: circle;
    padding: 0 20px;
    margin: 20px;
}

#automation  .question p {
    color: #6d7788;
    font-weight: 500;
    font-size: 14px;
    line-height: 20px;
    max-width: 95%;
}

#automation .question ul li {
    display: block;
    width: auto;
    list-style: disc !important;
    padding: 0;
    margin: 0;
    margin-bottom: 6px;
    display: list-item;
}

#automation .righthead .col-md-6:nth-child(2) {
    padding-left: 0;
}

.my-faq-slider {
    width: 80%;
    overflow: hidden; 
    margin: 0 auto;
}

.my-faq-slider .swiper-slide {
  width: 70%; /* Šírka neaktívnych slidov, upravte podľa potreby */
  transition: transform 0.3s ease;
  transform: scale(0.9); /* Zmenšenie neaktívnych slidov */
  opacity: 0.7;
  overflow: hidden;
  border-radius: 15px;
}

.my-faq-slider .swiper-slide-active {
  transform: scale(1.2); /* Centrálny slide v plnej veľkosti */
  opacity: 1;
  z-index: 1;
}
		  
		   /* Responzívny video wrapper */
        .video-wrapper {
            position: relative;
            width: 100%;
            height: 0;
            /* Pomer strán 16:9 = 9/16 * 100% = 56.25% */
            padding-bottom: 56.25%;
            overflow: hidden;
            border-radius: 8px;
            box-shadow: 0 4px 15px rgba(0,0,0,0.2);
        }
        
        .video-wrapper iframe {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            border: none;
        }
        
        
        
        /* Pre rôzne pomery strán */
        .video-wrapper.ratio-4-3 {
            padding-bottom: 75%; /* 3/4 * 100% = 75% */
        }
        
        .video-wrapper.ratio-21-9 {
            padding-bottom: 42.86%; /* 9/21 * 100% = 42.86% */
        }

@media (max-width: 768px) {
  #automation .righthead .col-md-6:nth-child(2) {
    padding-left: 0;
  }

#automation .question ul {
    list-style: circle;
    padding: 0 10px;
    margin: 15px;
}
	
	#automation ul li {
        display: inline-block;
        width: 100%;
        margin-left: 0;
        font-size: 13.5px;
        line-height: 20px;
        padding: 10px;
        padding-left: 0;
    }

#automation .question .profil {
    width: calc(100% - 10px);
}

main.solution-detail .vh80 h2.nomaliseh2 {
    font-size: 30px;
    line-height: 40px;
    margin: 20px;
    margin-top: 0;
}

.my-faq-slider {
    width: 100%;
    overflow: hidden; 
    margin: 0 auto;
}


}

      </style>
      <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
      <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
      <script>
        var swiper = new Swiper('.my-faq-slider', {
          slidesPerView: 'auto', // Alebo skúste číslo, napr. 1.5 alebo 2 pre zobrazenie okrajových
          centeredSlides: true,
          spaceBetween: 30, // Medzera medzi slidmi
          loop: true,
          autoplay: {
            delay: 5000, // Čas v ms
            disableOnInteraction: false,
          },
          // Prípadne pridajte navigáciu/pagináciu ak treba
          // pagination: {
          //   el: '.swiper-pagination',
          //   clickable: true,
          // },
          // navigation: {
          //   nextEl: '.swiper-button-next',
          //   prevEl: '.swiper-button-prev',
          // },
        });
      </script>
