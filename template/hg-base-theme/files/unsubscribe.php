    <main>
	  <div id="left-aside">

	  </div>
	  <div id="mn">
	  	<section id="service" class="">
		  	<div class="container-fluid">
		  		<div class="row">
		  			<div class="col-md-12">
		  				<div id="service-banner">
					  		<div id="service-banner-sli" class="smaller" style="background:url(<?php echo ($content['ogimg'] ? $content['ogimg'] : '/template/images/borovica-small-57.jpg' ); ?>) 50% 50% no-repeat;background-size:cover">

				            </div>
					  	</div>
		  			</div>
		  		</div>
		  		<div class="row start-md middle-md subpage blogpage" id="heading">
		  			<div class="col-md-2"></div>
		  			<div class="col-md-8">
		  				<h1>Odhlásenie<? echo "<small>Novinky vo Wellness hoteli Borovica****</small>" ?></h1>
		  			</div>
		  		</div>
		  	</div>
		  </section>
		  <section id="singlepage">
		  	<div class="container-fluid">
		  		<div class="row">
		  			<div class="col-md-2 sharing">
		  				<div class="shareaholic-canvas" data-app="share_buttons" data-app-id="28116920"></div>
		  			</div>
		  			<div class="col-md-6">
		  				<div id="page-content">
		  					<p>Boli ste úspešne odhlásený zo zasielania noviniek. Naše e-maily Vám už chodiť nebudú.</p>
		  					<div class="wrapper-60-0"></div>
		  				</div>
		  			</div>
		  			<div class="col-md-1"><p></p></div>
		  			<div class="col-md-3">
		  				<div class="sideroffer">
		  					<div class="imageoffer" style="background:url('/img/gallery/1-6-01.jpg') 50% 50% no-repeat;;background-size:cover;min-height: 200px">
		  					</div>
		  					<div class="content">
		  						<div class="more sideser">
		  							<h3>Kontaktný formulár</h3>
		  							<p>Potrebujete poradiť alebo sa o niečom informovať? Neváhajte nás kontaktovať, sme pre vás na recepcii 24 hodín denne.</p>
		  							<div id="smallorder">
		  								 <?php
					                        $fields = array(
					                          'name'    => 'Meno a priezvisko',
					                          'email'   => 'E-mail',
					                          'tel'    => 'Tel. kontakt',
					                          'text'    => 'Vaša správa',
					                          'submit'  => 'Odoslať'
					                        );
					                        contacForm($fields);
					                      ?>
		  							</div>
		  						</div>

		  					</div>
		  					<div class="side-box">
		  					<h3>Balíčky procedúr</h3>
		  					<p>Vedeli ste, že zo širokej ponuky našich procedúr si môžete vybrať zvýhodnené akciové balíčky? Nechajte sa inšpirovať.</p>
		  					<div id="owl-offers-side" class="owl-carousel-offers owl-carousel">
		  					<?php
									 	$blogLastArticles = rs_last_articles('72', 'id', 6, 'DESC'); // rs_last_articles($id_category, $orderby = 'id', $limit = 10, $order = 'DESC')
										foreach($blogLastArticles as $k => $v): ?>
								<div class="item">
									<div class="image-inner" style="background: url('../img/rs/<?php echo $v['id']; ?>.jpg') 50% 50% no-repeat ;background-size: cover;"></div>
									  <div class="offer-info">
												<h3><?php echo $v['name']; ?></h3>
												<a href="/baliky-wellness-procedur/<?php echo $v['sef']; ?>/" class="btn btn-border left-on-white side"><span>viac info</span></a>
												<div class="price proc"><span>Akciový<br>balík</span></div>
									   </div>

								</div> <!-- END Offer Item -->

								<?php endforeach; ?>
		  				</div>
		  				</div>
		  				</div>

		  			</div>
		  		</div>
		  	</div>
		  	<div class="container-fluid instaplace">
  				<div class="row center-md middle-md">
  					<div class="col-md-12">
  						<div class="container-fluid">
  							<div class="row center-md">
  								<div class="col-md-12">
  									<div class="row">
	  									<div class="col-md-10">
	  										<h5>Sledujte nás na Instagrame: @hotelborovica #strbskepleso #wellness</h5>
	  									</div>
  									</div>
  								</div>
  							</div>
  							<div id="instafeedplace">
  								<div id="instafeed" class="row">
  								</div>
							</div>
  						</div>
  					</div>
  				</div>
  			</div>
		  </section>
		  <section id="offers">
		  	<div class="container-fluid wrapper-60-0">
		  		<div class="row center-md middle-md">
		  			<div class="col-md-10">
		  				<h2>Aktuálne wellness pobyty</h2>
		  				<div id="owl-offers" class="owl-carousel-offers owl-carousel">
		  					<?php
                                    $offers = offerBlocks(11, 0);

                                    foreach($offers as $k => $v): ?>
								<div class="item">
									<div class="image-inner" style="background: url('../img/offers/<?php echo $v['id']; ?>.jpg') 50% 50% no-repeat ;background-size: cover;">
									  <div class="offer-info">
												<h3><?php echo $v['name']; ?></h3>
												<? echo "<h4>".date("d.m.Y", strtotime($v['startdate']))." - ".date("d.m.Y", strtotime($v['end']))."</h4>" ?>
												<? echo "<p>".short(strip_tags($v['parex_text']), 200). "</p>"?>
												<a href="/wellness-pobyt/<?php echo $v['id']; ?>-<?php echo $v['sef']; ?>/" class="btn btn-border left-on-white"><span>viac info</span></a><a href="/wellness-pobyty/" class="btn btn-border left-on-white"><? if(sess('lang') == 'sk'): ?><span>Všetky pobyty</span><? else: ?><span>All offers</span><? endif; ?></a>
												<div class="price"><span><?php echo $v['price_from']; ?>€<br>pobyt</span></div>
									   </div>
									</div>
								</div> <!-- END Offer Item -->

								<?php endforeach; ?>
		  				</div>
		  			</div>
		  		</div>
		  	</div>
		  </section>
	  </div>