<?php if (isset($content['sef']) && trim($content['sef'], '/') === 'kontakt') { include __DIR__.'/hg-contact.php'; return; } ?>
<main>
  <section id="page" class="demo">
    <div class="container-fluid wrapper-30-0" id="contact">
      <div class="row center-md">
        <div class="col-md-10">
          <div class="container-fluid">
            <div class="row center-md">
              <div class="col-md-8">
                <div class="main-content">
                  <?php if ($content['id'] == 56): ?>
                  <h1>Affiliate program</h1>
                  <?php else: ?>
                  <h1>Vyskúšaj si Ellipse Cloud naživo.</h1>
                  <?php endif; ?>
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
                          <h2>Ako to funguje?</h2>
                          <p>V krátkosti sa nám prosím predstavte. Každý typ ubytovateľa potrebuje o niečo odlišný typ prezentácie. Naplánujeme si online meeting a odprezentujeme Vám s čím všetkým vám dokážeme pomôcť. Po prezentácii vám necháme prístupy do demo verzie.</p>
                          <h2>Ste profík v Horeca segmente?</h2>
                          <p>Ak máte bohaté skúsenosti s PMS systémami, práca s naším riešením bude pre vás hračkou. Pošlite nám prosím v stručnosti info o vás a pošleme vám prístupy do demo verzie.</p>
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
                                          'company'	=> 'Názov prevádzky',
                                          'numbers'	=> 'Počet jednotiek',
                                          'email'   => 'E-mail',
                                          'tel'     => 'Mobil',
                                          'text'    => 'O čo všetko by ste mali záujem?',
                                          'submit'  => 'Odoslať'
                                        );
                                        contacForm($fields);
                                    };
                                    else: {
                                      $fields = array(
                                        'name'    => 'Meno',
                                        'surname' => 'Priezvisko',
                                        'company'	=> 'Názov prevádzky',
                                        'numbers'	=> 'Počet jednotiek',
                                        'email'   => 'E-mail',
                                        'tel'     => 'Mobil',
                                        'text'    => 'O čo všetko by ste mali záujem?',
                                        'submit'  => 'Odoslať'
                                        );
                                        contacForm($fields);
                                    };
                                endif;

                           ?>
                        </div>
                      </div>
                      
                      <div class="container-fluid">
                        <div class="row center-md">
                          <div class="col-md-10">
                          <div class="container-fluid">
                            <div class="row center-md">
                              <div class="col-md-10 wrapper-40-0">
                                <h2 style="text-align: center !important; font-size: 34px; margin-bottom: 40px !important;">Vypracovanie cenovej ponuky</h2>
                                <p style="text-align: center !important;  margin-bottom: 0 !important;">V prípade záujmu o systém nám prosím zašlite informácie o vašej prevádzke a my vám vypracujeme cenovú ponuku.</p>     
                                <a class="bigbut center" style="margin-top:0" href="https://docs.google.com/forms/d/e/1FAIpQLSc9PjBaaLNX4nmlO8paIgT4ZRHdd5BrNB7WAvxOndFp8LwTUw/viewform?vc=0&c=0&w=1&flr=0&usp=mail_form_link" target="_blank">Vyplniť formulár</a> 
                              </div> 
                            </div>
                          </div>
                        </div>
                        </div>
                      </div>

                      <div class="col-md-12">
                        <div class="container">
                          <div class="row center-md">
                            <div class="col-md-12">
                              <div class="wrapper-40-0">

                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="col-md-12">
                        <div class="container-fluid">
                          <div class="row center-md">
                            <div class="col-md-12">
                              <div class="wrapper-40-0">
                                <div id="map-holder" style="height:70vh";>

                                                <div id="map" style="height:100%"></div>
                                                <script>
                                                  function initMap() {

                                                    // Create a new StyledMapType object, passing it an array of styles,
                                  // and the name to be displayed on the map type control.
                                  var styledMapType = new google.maps.StyledMapType(
                                    [
            {
                "featureType": "administrative",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.text",
                "stylers": [
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "administrative",
                "elementType": "labels.icon",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "administrative.province",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "landscape",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": 65
                    },
                    {
                        "visibility": "on"
                    }
                ]
            },
            {
                "featureType": "poi",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "lightness": "50"
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "poi.business",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "off"
                    }
                ]
            },
            {
                "featureType": "road",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": "-100"
                    }
                ]
            },
            {
                "featureType": "road.highway",
                "elementType": "all",
                "stylers": [
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "road.arterial",
                "elementType": "all",
                "stylers": [
                    {
                        "lightness": "30"
                    }
                ]
            },
            {
                "featureType": "road.local",
                "elementType": "all",
                "stylers": [
                    {
                        "lightness": "40"
                    }
                ]
            },
            {
                "featureType": "transit",
                "elementType": "all",
                "stylers": [
                    {
                        "saturation": -100
                    },
                    {
                        "visibility": "simplified"
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "geometry",
                "stylers": [
                    {
                        "hue": "#ffff00"
                    },
                    {
                        "lightness": -25
                    },
                    {
                        "saturation": -97
                    }
                ]
            },
            {
                "featureType": "water",
                "elementType": "labels",
                "stylers": [
                    {
                        "lightness": -25
                    },
                    {
                        "saturation": -100
                    }
                ]
            }
        ],
                                    {name: 'Styled Map'});

                                                    // Create a map object, and include the MapTypeId to add
                                                    // to the map type control.
                                                    var map = new google.maps.Map(document.getElementById('map'), {
                                                      center: {lat: 49.0533676, lng: 20.3013172},
                                                      zoom: 16,
                                                      scrollwheel: false,
                                                      panControl: false,
                                                      zoomControl: true,
                                                                  scaleControl: false,
                                                                  mapTypeControl: false,
                                                                  streetViewControl: false,
                                                                  overviewMapControl: false,
                                                      mapTypeControlOptions: {
                                                         mapTypeControl: false
                                                      }
                                                    });

                                                    var icon = {
                                                          url: "<?=DOMENA_WEBU?>/template/<?php echo $theme; ?>/img/location.png", // url
                                                          scaledSize: new google.maps.Size(180, 180), // scaled size
                                                          origin: new google.maps.Point(1, 1), // origin
                                                          anchor: new google.maps.Point(90, 180) // anchor
                                                      };

                                                      var marker = new google.maps.Marker({
                                                          position: {lat: 49.0533676, lng: 20.3013172},
                                                          map: map,
                                                          icon: icon,
                                                          animation: google.maps.Animation.DROP,
                                                          zIndex: 100,
                                                      });
                                                      marker.addListener('click', function() {
                                                map.setZoom(16);
                                                map.setCenter(marker.getPosition());
                                              });






                                                    //Associate the styled map with the MapTypeId and set it to display.
                                                    map.mapTypes.set('styled_map', styledMapType);
                                                    map.setMapTypeId('styled_map');
                                                  }
                                                </script>
                                              <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCZuYGgfBzUerU2ByVk66FyqbMPjdGhd6Q&callback=initMap"
                                              async defer></script>
                                         </div>
                        </div>

                </div>
                <div id="navbtns">
                  <a class="googlenav bigbut center" href="https://www.google.com/maps/dir/?api=1&destination=Francisciho+20,+058+01+Poprad"><?php echo lang('Vyhľadať trasu', 1) ?></a>
                  <script>
                  function OpenPopupCenter(pageURL, title, w, h) {
                            var left = (screen.width - w) / 2;
                            var top = (screen.height - h) / 4;  // for 25% - devide by 4  |  for 33% - devide by 3
                            var targetWin = window.open(pageURL, title, 'toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, copyhistory=no, width=' + w + ', height=' + h + ', top=' + top + ', left=' + left);
                        }
                  </script>
                </div>
                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>

                    <?php endif; ?>
                    <div class="col-md-12">

                    <div class="break"></div>



                  </div>
                  <div class="col-md-12" id="persons">
                    <div class="wrapper-60-0"></div>
                    <h2><?php echo lang('Kontaktné osoby',1); ?></h2>
                    <div class="container centered" style="margin:10px auto">
                      <div class="row center-md">
                        <div class="col-md-4">
                          <h3>Petra Štefany <small>Office manager and support</small> </h3>
                          <p><a href="tel:+421527871911">+421 52 787 1911</a> </p>
                          <p><a href="mailto:petra.stefany@horecagroup.sk">petra.stefany@horecagroup.sk</a> </p>
                        </div>
                        <div class="col-md-4">
                          <h3>Lenka Bolcárová <small>Office manager and relations</small>   </h3>
                          <p><a href="tel:+421527871911">+421 52 787 1911</a> </p>
                          <p><a href="mailto:lenka.bolcarova@horecagroup.sk">lenka.bolcarova@horecagroup.sk</a> </p>
                        </div>
						   <div class="col-md-4">
                          <h3>Patrícia Chovancová <small>Office manager and websites</small>   </h3>
                          <p><a href="tel:+421527871911">+421 52 787 1911</a> </p>
                          <p><a href="mailto:patricia.chovancova@horecagroup.sk">patricia.chovancova@horecagroup.sk</a> </p>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="row center-md" style="text-align:center !important">
                  <div class="col-md-12">
                    <div class="wrapper-60-0"></div>
                  </div>
                  <div class="col-md-8">
                    <div class="container-fluid">
                      <div class="row center-md">
                        <div class="col-md-6">
                          <div class="wrapp-1" style="text-align:center">
                            <h2 style="text-align: center !important; margin: 0 auto 30px !important;"><?php echo lang('Prevádzkovateľ',1); ?></h2>
                            <p style="text-align: center !important; margin: 0 auto !important;">HORECA GROUP s.r.o.<br>Francisciho 20/B<br>058 01 Poprad<br> <br>IČO: 47912618<br>DIČ: 2024148357<br>IČ DPH: SK2024148357<br> <br>IBAN: SK45 8330 0000 0025 0068 1593</p>
                          </div>
                        </div>

                      </div>
                    </div>
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
