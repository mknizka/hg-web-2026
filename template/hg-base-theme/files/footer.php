<section id="news" class="wrapper-90-0 foot">
	  	<div class="container">
	  		<div class="row center-md">
	  			<div class="col-md-12">
	  				<h2><?php echo lang('Novinky a oznamy', 1) ?></h2>
	  				<div class="line"><span></span><span></span><span></span></div>
					<div class="container-fluid" id="articles">
								<div class="row start-md">
									<?php
									 	$blogLastArticles = rs_last_articles('17', 'id', 3, 'DESC'); // rs_last_articles($id_category, $orderby = 'id', $limit = 10, $order = 'DESC')
										foreach($blogLastArticles as $k => $v): ?>
						                  <div class="col-md-4">
						                  	<a href="/novinky/<?php echo $v['sef']; ?>/">
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


				                <div class="break"></div>

								</div>
								<div class="row center-md">
				                	<div class="col-md-12">
				                		<a href="/novinky/" class="but bigger"><?php echo lang('Všetky novinky a články', 1); ?></a>
				                	</div>
				                </div>
							</div>
	  			</div>
	  		</div>
	  	</div>
	  </section>
	  <section id="newsletter" class="wrapper-30-0">
	  	<div class="container">
	  		<div class="row center-md">
	  			<div class="col-md-6">
	  				<h2><?php echo lang('Newsletter subscription', 1) ?></h2>
	  				<p><?php echo lang('Find all our special offers and news', 1) ?></p>
					<?php crmRegisterSmall(1) ?>
	  			</div>
	  		</div>
	  		<div class="row">
	  			<div class="col-md-12 wrapper-30-0"></div>
	  		</div>
	  	</div>
	  </section>
	</main>
	<footer>
		<div class="wrapper-60-0"></div>
		<div class="container">
			<div class="row center-md">
				<div class="col-md-12 logofooter">
					<a href="/"><img src="/img/system/logo_dark.png" alt="Logo"></a>
				</div>
			</div>
		</div>
		<div class="container-fluid">
			<div class="row center-md">
				<div class="col-md-8 wrapper-30-0">
					<div class="container-fluid">
						<div class="row">
							<div class="col-md-3">
								<h3><?php echo lang('Contact', 1) ?></h3>
								<ul>
									<?php
							                      foreach($t_rsmenu[19] as $k => $v) {
							                        echo "<li>";
							                          if($v['external'] != '') {
							                            echo "<a href='".$v['external']."' class='item'>".$v['name']."</a>";
							                          } else
							                          if(abs($v['id_article']) > 0) {
							                            echo "<a href='/".$v['sef']."/' class='item'>".$v['name']."</a>";
							                          } else {
							                            //echo "<a href='".($v['external'] == '' ? '/rs/'.$v['id'].'/'.$v['sef'].'/' : $v['external'])."'>".$v['name']."</a>";
							                            echo "<a href='/' class='item'>".$v['name']."</a>";
							                          }
							                          // sublevel
							                          if(is_array($v['level_0']) == true) {
							                            echo "<ul class='sub-menu'>";
							                              foreach($v['level_0'] as $k_0 => $v_0) {
							                                if($v_0['external'] != '') {
							                                  echo "<li><a href='".$v_0['external']."'>".$v_0['name']."</a></li>";
							                                } else
							                                if(abs($v_0['id_article']) > 0) {
							                                  echo "<li><a href='/rs/".$v_0['id_article']."/".$v_0['sef']."/'>".$v_0['name']."</a></li>";
							                                } else {
							                                  echo "<li><a href='/'>".$v_0['name']."</a></li>";
							                                }
							                              }
							                            echo "</ul>";
							                          }
							                        echo "</li>";
							                      }
							                    ?>
								</ul>
							</div>
							<div class="col-md-3">
								<h3><?php echo lang('Address', 1) ?></h3>
								<ul>
									<?php
							                      foreach($t_rsmenu[20] as $k => $v) {
							                        echo "<li>";
							                          if($v['external'] != '') {
							                            echo "<a href='".$v['external']."' class='item'>".$v['name']."</a>";
							                          } else
							                          if(abs($v['id_article']) > 0) {
							                            echo "<a href='/".$v['sef']."/' class='item'>".$v['name']."</a>";
							                          } else {
							                            //echo "<a href='".($v['external'] == '' ? '/rs/'.$v['id'].'/'.$v['sef'].'/' : $v['external'])."'>".$v['name']."</a>";
							                            echo "<a href='/' class='item'>".$v['name']."</a>";
							                          }
							                          // sublevel
							                          if(is_array($v['level_0']) == true) {
							                            echo "<ul class='sub-menu'>";
							                              foreach($v['level_0'] as $k_0 => $v_0) {
							                                if($v_0['external'] != '') {
							                                  echo "<li><a href='".$v_0['external']."'>".$v_0['name']."</a></li>";
							                                } else
							                                if(abs($v_0['id_article']) > 0) {
							                                  echo "<li><a href='/rs/".$v_0['id_article']."/".$v_0['sef']."/'>".$v_0['name']."</a></li>";
							                                } else {
							                                  echo "<li><a href='/'>".$v_0['name']."</a></li>";
							                                }
							                              }
							                            echo "</ul>";
							                          }
							                        echo "</li>";
							                      }
							                    ?>
								</ul>
							</div>
							<div class="col-md-3">
								<h3><?php echo lang('Quick links', 1) ?></h3>
								<ul>
									<?php
							                      foreach($t_rsmenu[2] as $k => $v) {
							                        echo "<li>";
							                          if($v['external'] != '') {
							                            echo "<a href='".$v['external']."' class='item'>".$v['name']."</a>";
							                          } else
							                          if(abs($v['id_article']) > 0) {
							                            echo "<a href='/".$v['sef']."/' class='item'>".$v['name']."</a>";
							                          } else {
							                            //echo "<a href='".($v['external'] == '' ? '/rs/'.$v['id'].'/'.$v['sef'].'/' : $v['external'])."'>".$v['name']."</a>";
							                            echo "<a href='/' class='item'>".$v['name']."</a>";
							                          }
							                          // sublevel
							                          if(is_array($v['level_0']) == true) {
							                            echo "<ul class='sub-menu'>";
							                              foreach($v['level_0'] as $k_0 => $v_0) {
							                                if($v_0['external'] != '') {
							                                  echo "<li><a href='".$v_0['external']."'>".$v_0['name']."</a></li>";
							                                } else
							                                if(abs($v_0['id_article']) > 0) {
							                                  echo "<li><a href='/rs/".$v_0['id_article']."/".$v_0['sef']."/'>".$v_0['name']."</a></li>";
							                                } else {
							                                  echo "<li><a href='/'>".$v_0['name']."</a></li>";
							                                }
							                              }
							                            echo "</ul>";
							                          }
							                        echo "</li>";
							                      }
							                    ?></ul>
							</div>
							<div class="col-md-3">
								<h3><?php echo lang('Informations', 1) ?></h3>
								<ul>
									<?php
							                      foreach($t_rsmenu[3] as $k => $v) {
							                        echo "<li>";
							                          if($v['external'] != '') {
							                            echo "<a href='".$v['external']."' class='item'>".$v['name']."</a>";
							                          } else
							                          if(abs($v['id_article']) > 0) {
							                            echo "<a href='/".$v['sef']."/' class='item'>".$v['name']."</a>";
							                          } else {
							                            //echo "<a href='".($v['external'] == '' ? '/rs/'.$v['id'].'/'.$v['sef'].'/' : $v['external'])."'>".$v['name']."</a>";
							                            echo "<a href='/' class='item'>".$v['name']."</a>";
							                          }
							                          // sublevel
							                          if(is_array($v['level_0']) == true) {
							                            echo "<ul class='sub-menu'>";
							                              foreach($v['level_0'] as $k_0 => $v_0) {
							                                if($v_0['external'] != '') {
							                                  echo "<li><a href='".$v_0['external']."'>".$v_0['name']."</a></li>";
							                                } else
							                                if(abs($v_0['id_article']) > 0) {
							                                  echo "<li><a href='/rs/".$v_0['id_article']."/".$v_0['sef']."/'>".$v_0['name']."</a></li>";
							                                } else {
							                                  echo "<li><a href='/'>".$v_0['name']."</a></li>";
							                                }
							                              }
							                            echo "</ul>";
							                          }
							                        echo "</li>";
							                      }
							                    ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="row center-md">
				<div class="col-md-8 wrapper-30-0"></div>
			</div>
			<div class="row center-md">
				<div class="col-md-8 sociallinks">
					<ul>
						<li>
							<a href=""><div class="facebook-ico"></div></a>
						</li>
						<li>
							<a href=""><div class="instagram-ico"></div></a>
						</li>
						<li>
							<a href=""><div class="youtube-ico"></div></a>
						</li>
						<li>
							<a href=""><div class="tripadvisor-ico"></div></a>
						</li>
					</ul>
				</div>
			</div>
			<div class="row center-md">
				<div class="col-md-8">
					<div id="copy">
						<div class="wrapper-30-0"></div>
						<a href="https://www.horecagroup.sk/">
							<img src="/template/<?php echo $theme; ?>/images/horecagroup.svg" alt="Horeca Group SK - Direct bookings, Booking engine, Websites, Hotel PMS">
							<p>Hotel websites • Hotel applications • Book direct • Channel manager • Upselling</p>
						</a>
					</div>
				</div>
			</div>
		</div>

	</footer>
    <script src="template/js/swiper.min.js"></script>
    <script>
    var swiper = new Swiper('.swiper-container-homepage', {
        speed: 1500,
        pagination: '.swiper-pagination',
        paginationClickable: true,
        spaceBetween: 0,
        centeredSlides: true,
        autoplay: 5500,
        autoplayDisableOnInteraction: false,
        effect: 'fade',
    });
    </script>
	<script type="text/javascript" src="/template/js/owl.carousel.min.js"></script>
    <script>
    	$(document).ready(function() {

		 $("#ser").owlCarousel({
	       autoplay: true,
           autoplaySpeed: 2000,
	       items : 8,
	       autoHeight: false,
	       pagination: false,
	       loop:true,
	       autoplayHoverPause:false,

	  });

		 $("#owl-offers").owlCarousel({

	      autoPlay: 6500,
	      items : 3,
	      itemsDesktop : [1199,3],
	      itemsDesktopSmall : [979,3],
	      itemsTablet:	[768,2],
	      itemsMobile:	[479,1],
	      mouseDrag: true,
	      touchDrag: true,
	      autoHeight: false,
	      pagination: false,
	      loop:true,
	      autoplay:true,
	      animateIn: 'fadeIn',
          animateOut: 'fadeOut',
          items:3,
	      autoplayHoverPause:true,
          responsive:{
		        0:{
		            items:1,

		        },
		        600:{
		            items:1,

		        },
		        1000:{
		            items:3,
		        }
		          }

	  });

		 $("#owl-offers-side").owlCarousel({
	      autoPlay: 6500,
	      mouseDrag: true,
	      touchDrag: true,
	      autoHeight: false,
	      autoplay:true,
	      pagination: true,
          items:1,

	  });

		 $("#plogos").owlCarousel({
	      autoPlay: 3500,
	      autoplaySpeed: 2000,
	      items : 8,
	      mouseDrag: true,
	      touchDrag: true,
	      autoHeight: false,
	      pagination: false,
	      loop:true,
	      autoplay:true,
          nav:false,
	      responsive:{
		        0:{
		            items:1,

		        },
		        600:{
		            items:3,

		        },
		        1000:{
		            items:8,

		        },

		          }

	  });


	});
    </script>
    <script>
    $('#toggle').click(function() {
	$('.toggle').slideToggle('slow');
	$(this).toggleClass('opened closed');
	return false;
	});
	</script>
	<script type="text/javascript">

    var timeout         = 100;
    var closetimer    = 0;
    var ddmenuitem      = 0;

    function jsddm_open() {
     jsddm_canceltimer();
     jsddm_close();
     parentmenu = $(this);
     ddmenuitem = $(this).find('ul').eq(0).css('visibility', 'visible');
     parentmenu.addClass('active');
    }

    function jsddm_close() {
      if(ddmenuitem) ddmenuitem.css('visibility', 'hidden');
      $('#main-menu li').removeClass('active');
    }

    function jsddm_timer() {
      closetimer = window.setTimeout(jsddm_close, timeout);
    }

    function jsddm_canceltimer() {
      if(closetimer) {
        window.clearTimeout(closetimer);
        closetimer = null;
      }
    }

    $(document).ready(function() {
      $('#main-menu > li').bind('mouseover', jsddm_open);
      $('#main-menu > li').bind('mouseout',  jsddm_timer);
    });

    document.onclick = jsddm_close;

  </script>
  <script type="text/javascript" src="/template/js/jquery.magnific-popup.js"></script>
  <script type="text/javascript" src="/template/js/script.js"></script>
  <?php echo $content['extra_js_footer']; ?>
  <?php cookies(); ?>
  <?php //adbanner(); ?>
  <?php langEditor(); ?>
  <?php echo themeSetup('extra_body_end'); ?>
  </body>
</html>