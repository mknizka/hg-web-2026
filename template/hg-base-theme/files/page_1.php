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
						  				<?=$content['text'][0];?>
					  				</div>
					  			</div>
					  		 </div>
						  </article>
			  		</div>
		  		</div>
		  	</div>
		  </section>
