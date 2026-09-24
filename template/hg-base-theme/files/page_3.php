
		<main>
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
		  		<div class="row center-md">

		  			<div class="col-md-10">
			  			<article>
					  		<div class="container-fluid">
					  			<div class="row top-md">
					  				<div class="col-md-12">
					  					<h1><?=$content['name'];?></h1>
		  								<div class="line"><span></span><span></span><span></span></div>
		  								<div class="row center-md">
		  									<div class="col-md-6">
		  										<?=$content['text'][0];?>
		  									</div>
		  								</div>
					  				</div>
					  			</div>
					  			<div class="row center-md">
					  				<div class="col-md-10">
					  					<div class="row">
					  						<div class="col-md-4">
					  							<div class="conitem">
					  								<div class="contactico"><img src="/template/<?php echo $theme; ?>/images/telephone.png" alt="Tel"></div>
					  								<h2><?php echo lang('Kontakt',1) ?></h2>
					  								<?php $text= text(1); echo $text['text']; ?>

					  							</div>
					  						</div>
					  						<div class="col-md-4">
					  							<div class="conitem">
					  								<div class="contactico"><img src="/template/<?php echo $theme; ?>/images/emails.png" alt="Email"></div>
					  								<h2><?php echo lang('E-mail',1) ?></h2>
					  								<?php $text= text(2); echo $text['text']; ?>

					  							</div>
					  						</div>
					  						<div class="col-md-4">
					  							<div class="conitem">
					  								<div class="contactico"><img src="/template/<?php echo $theme; ?>/images/address.png" alt="Address"></div>
					  								<h2><?php echo lang('Address',1) ?></h2>
					  								<?php $text= text(3); echo $text['text']; ?>

					  							</div>
					  						</div>

					  					</div>
					  				</div>
					  			</div>
					  			<div class="row center-md">
					  				<div class="col-md-6">
					  							<?=$content['text'][3];?>
					  				</div>
					  			</div>

					  		 </div>
						  </article>
			  		</div>
		  		</div>
		  		<div class="row center-md">
		  			  <div class="col-md-12">
		  			  	<h2><?php echo lang('Google mapa',1) ?></h2>
		  			    <div class="line"><span></span><span></span><span></span></div>
		  			  </div>
		  			  <div class="col-md-12 wrapper-30-0"></div>
					  <div class="col-md-12">

							<div id="map-holder" style="height:650px";>
                              <div class="direction">
                                <h3><?php echo lang('Vyhľadajte si k nám cestu')?></h3>
                                <div class="place"><input type="text" value="" placeholder="<?php echo lang('Your location')?>" id="start_point"></div>
                                <script>
                                  var start = document.getElementById("start_point").value;
                                </script>
                                <div id="mydestination"><?php echo lang('Vyhľadať')?></div>
                              </div>
                                        <div id="map" style="height:100%"></div>
                                        <script>

                                          $( "#mydestination" ).click(function() {
                                            var location = encodeURIComponent( $("#start_point").val() );
                                            var start = "https://www.google.com/maps/dir/";
                                            var end = "/<?php echo $CONFIG['hotel_street'] ?>+<?php echo $CONFIG['hotel_city'] ?>/@<?php echo themeSetup('lat'); ?>,<?php echo themeSetup('lng') ?>,17z";
                                            myWindow = window.open(start + location + end, '', 'resizable=no,status=no,location=no,toolbar=no,menubar=no,fullscreen=no,scrollbars=no,dependent=no,width=600px,height=400px;max-width=100%');
                                            return false;
                                          });


                                          function initMap() {

                                            // Create a new StyledMapType object, passing it an array of styles,
                                            // and the name to be displayed on the map type control.
                                            var styledMapType = new google.maps.StyledMapType(
                                              [
                                                {"featureType":"administrative","elementType":"labels.text.fill","stylers":[{"color":"#191d4a"}]},{"featureType":"administrative.country","elementType":"geometry.fill","stylers":[{"visibility":"on"}]},{"featureType":"administrative.province","elementType":"labels.icon","stylers":[{"hue":"#ff0000"},{"visibility":"on"}]},{"featureType":"landscape","elementType":"all","stylers":[{"color":"#ffffff"}]},{"featureType":"poi","elementType":"all","stylers":[{"visibility":"on"}]},{"featureType":"road","elementType":"all","stylers":[{"saturation":-100},{"lightness":45}]},{"featureType":"road.highway","elementType":"all","stylers":[{"visibility":"simplified"}]},{"featureType":"road.arterial","elementType":"labels.icon","stylers":[{"visibility":"on"}]},{"featureType":"transit","elementType":"all","stylers":[{"visibility":"off"}]},{"featureType":"water","elementType":"all","stylers":[{"color":"#191d4a"},{"visibility":"on"}]}

                                              ],
                                              {name: 'Styled Map'});

                                            // Create a map object, and include the MapTypeId to add
                                            // to the map type control.
                                            var map = new google.maps.Map(document.getElementById('map'), {
                                              center: {lat: <?php echo themeSetup('lat'); ?>, lng: <?php echo themeSetup('lng') ?>},
                                              zoom: 9,
                                              scrollwheel: false,
                                              panControl: true,
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
                                                  url: "<?=DOMENA_WEBU?>/template/<?php echo $theme; ?>/images/location.png", // url
                                                  scaledSize: new google.maps.Size(180, 180), // scaled size
                                                  origin: new google.maps.Point(1, 1), // origin
                                                  anchor: new google.maps.Point(75, 150) // anchor
                                              };

                                              var marker = new google.maps.Marker({
                                                  position: {lat: <?php echo themeSetup('lat'); ?>, lng: <?php echo themeSetup('lng') ?>},
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
                                      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCHCu4oQWExeV816TQKY9PVM5h7ieS1Hw8&callback=initMap"
                                      async defer></script>
                                 </div>
					  		</div>
					  		<div class="col-md-12 wrapper-30-0"></div>
					  </div>
		  	</div>
		  </section>
