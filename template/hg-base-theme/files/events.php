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
		  <section id="all-offers">
		  	<div class="container-fluid">
		  		<div class="row center-md">

		  			<div class="col-md-10">
			  			<article>
					  		<div class="container-fluid">
					  			<div class="row top-md">
					  				<div class="col-md-12">
					  					<h1><?php echo lang('Plánované eventy v hoteli',1) ?></h1>
		  								<div class="line"><span></span><span></span><span></span></div>

					  				</div>
					  			</div>
					  			<div class="container-fluid">
					  				<div class="row center-md">
					  					<div class="col-md-6"><?php echo $content['text']; ?></div>
					  					<div class="col-md-12">
					  						<div id="all-offers-list" class="row center-md">
								  					<?php foreach($content['events'] as $k => $v): ?>
														<div class="col-md-4">
															<div class="item">
																<a href="/<?php echo $content['sefprefix']; ?>/<?php echo $v['id']; ?>/<?php echo $v['sef']; ?>/" class="btn btn-border left-on-white">
																	<div class="onepack">
																		<div class="image-inner" style="background: url('../img/events/<?php echo $v['id']; ?>.jpg') 50% 50% no-repeat ;background-size: cover;">
																			<div id="term">
																				<span class="day"><?php echo date('d', strtotime($v['startdate'])); ?>.</span>
																				<span class="month"><?php echo lang(date('F', strtotime($v['startdate']))) ?></span>
																			</div>
																			<div id="cat">
																				<span><?php echo $v['category']; ?></span>
																			</div>

																		</div>
																		<div class="offer-info">
																					<h3><?php echo $v['name']; ?></h3>
																					<p><?php echo $v['parex_text']; ?></p>
																					<span class="but"><?php echo lang('Viac info', 1) ?></span>

																		 </div>
																	</div>
																</a>
															</div> <!-- END Offer Item -->
														</div>

														<?php endforeach; ?>
								  				</div>
								  				<div class="wrapper-30-0"></div>
					  					</div>
					  				</div>
					  			</div>
					  		 </div>
						  </article>
			  		</div>
		  		</div>
		  	</div>
		  </section>
