

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

		  			</div>
		  			<div class="col-md-6">
			  			<article>
					  		<div class="container-fluid" id="article-cont">
					  			<div class="row top-md">
					  				<div class="col-md-12">
					  					<h1><?php echo lang('Platobná brána'); ?></h1>
		  								<div class="line"><span></span><span></span><span></span></div>
		  								<p><?php pgResponse($_REQUEST); ?></p>
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
						<div class="sidie">
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
						                        contacForm($fields, '', 1);
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
						                        contacForm($fields, '', 1);
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
