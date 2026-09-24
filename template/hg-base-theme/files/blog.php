		<main>
		  <section id="slide">
		  	<div class="cover" style="background:url(<?php echo ($content['ogimg'] ? $content['ogimg'] : '/img/system/ogimg.jpg' ); ?>) 50% 50% no-repeat;cursor:pointer;background-size:cover"></div>
		  </section>
		  <section id="news">
		  	<div class="container-fluid">
		  		<div class="row center-md">
		  			<div class="col-md-8 wrapper-30-0">
		  				<h1><?php echo lang('Novinky a blog' , 1) ?></h1>
		  				<div class="line"><span></span><span></span><span></span></div>
		  				<div class="row">
			  				 <?php foreach($content['blog'] as $k => $v): ?>
								<div class="col-md-4">
						                  	<a href="/<?php echo $v['sef']; ?>/">
							                    <div class="one-article">
							                    	<div class="container-fluid">
								                    	<div class="row">
								                    		<div class="col-md-12">
										                        <div class="blog-content">
										                        	<div class="blog-im" style="max-width:100%; height: 200px; background: url(img/rs/<?php echo $v['id']; ?>-01.<?php echo $v['file_type']; ?>) center center no-repeat;background-size: cover;"></div>
										                        	<div class="names">
										                        		<? echo "<h4>".short(strip_tags($v['name']), 100). "</h4>"?>
																		<p><?php  echo short(strip_tags($v['parex_text']), 180); ?></p>
										                        		<span class="but"><?php echo lang('Viac info', 1) ?></span>
										                        	</div>
										                        </div>
								                    		</div>
								                    	</div>
								                    </div>
							                    </div>
						                     </a>
						                  </div>


						     <?php endforeach; ?>

						     <script>
						     	 $(document).ready(function() {
						     	    $('#news.foot').hide();
						     	    $('#services').hide();
						     	 });

						     </script>
						     <div class="row wrapper-30-0">
				  				<div class="col-md-8">
				  					<?php echo $content['pagination']; ?>
				  				</div>
				  			</div>
			  			</div>
		  			</div>
		  		</div>
		  	</div>
		  </section>
