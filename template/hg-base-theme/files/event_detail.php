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

					  					<div id="event-meta">
					  						<div class="row">
					  						<div class="col-md">
					  							<div id="term">
													<span class="day"><?php echo date('d', strtotime($content['startdate'])); ?>.</span>&nbsp
													<span class="month"><?php echo lang(date('F', strtotime($content['startdate']))) ?></span>
												</div>
					  						</div>

						  					</div>
					  					</div>
										<h1><?php echo $content['name']; ?></h1>
		  								<div class="line"><span></span><span></span><span></span></div>
					  						<?php
					  							if(is_array($content['text']) == false) {
					  								echo $content['text'];
					  							} else {
					  								echo $content['text'][0];
					  							}
					  						 ?>

					  					<div class="wrapper-20-0"></div>
											<h3><?php echo lang('Nezáväzný dopyt',1) ?></h3>
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
										                        contacForm($fields);
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
										                        contacForm($fields);
										                    };
										                endif;

										                      ?>
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
							<h3><?php echo lang('Rezevovať online',1) ?></h3>
								<a href="/booking/today/" id="sidebook">
									<div>
									<div class="container">
										<div class="row">
											<div class="col-md-6">
											<div class="day">
												<span>Check-in</span>
												<p><?php echo $todayday ?>.</p>
											</div>
											</div>
											<div class="col-md-6">
												<div class="day">
													<span>Check-out</span>
													<p><?php echo $nextdaysday ?>.</p>
												</div>
											</div>

										<div class="col-md-12">
											<div class="priceday"><div id="todaybook"><?php echo lang('Najvýhodnejšia cena dňa ', 1) ?><span><?php $rate = todayBestRate();  echo "$rate"; ?> €</span><?php echo lang('apartmán / noc', 1) ?></span></div></div>
										</div>
										</div>
									</div>
								</div>
								</a>
						</div>
						<div class="wrapper-20-0"></div>
						<div class="sidie">
							<h3><?php

							$offers = offerBlocks(11, 0); //_pre($offers);
							if(is_array($offers) == true) {
								echo lang('Akciové pobyty', 1);
							};




							?></h3>
							<div id="owl-offers-side" class="owl-carousel-offers owl-carousel">
							<?php
								$offers = offerBlocks(11, 0); //_pre($offers);
								if(is_array($offers) == true):
									foreach($offers as $k => $v):
					        ?>




									<div class="item">
										<a href="/<?php echo $offers['sefprefix']; ?>/<?php echo $v['id']; ?>/<?php echo $v['sef']; ?>/" class="btn btn-border left-on-white">
											<div class="onepack">
												<div class="image-inner" style="background: url('../img/offers/<?php echo $v['id']; ?>.jpg') 50% 50% no-repeat ;background-size: cover;">
													<div class="price"><span>od <?php echo $v['price_from']; ?> <?php echo lang('€ / pobyt',1) ?></span></div>
												</div>
												<div class="offer-info">
															<h3><?php echo $v['name']; ?></h3>
															<p><?php echo $v['parex_text']; ?></p>
															<span class="but"><?php echo lang('Viac info', 1) ?></span>

												 </div>
											</div>
										</a>
									</div> <!-- END Offer Item -->




						     <?php endforeach;
								endif; ?>
							</div>
						</div>
						</div>
			  		</div>
		  		</div>
		  	</div>
		  </section>
