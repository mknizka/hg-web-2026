<?php //_pre($t_rsmenu[1]); die; ?><!doctype html>
<html lang="<? echo sess("lang"); ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $content['title']; ?></title>
    <meta name="keywords" content="<?php echo $content['keywords']; ?>">
    <link href="/favicon.ico" rel="shortcut icon">
    <meta name="description" content="<?php echo $content['description']; ?>">
    <meta name="robots" content="index,follow">
    <meta name="googlebot" content="snippet,archive" >
    <meta name="Generator" content="HORECA GROUP CMS > www.horecagroup.sk">
    <meta name="author" content="HORECA GROUP">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link type="text/css" rel="stylesheet" href="/template/<?php echo $theme; ?>/css/_theme.css" media="screen">
    <?php if($content['extra_css']): ?>
      <link type="text/css" rel="stylesheet" href="<?php echo  $content['extra_css'];?>" media="screen">
    <?php endif; ?>
    <meta property="og:locale" content="<?php echo sess("lang"); ?>_<?php echo strtoupper(sess("lang")); ?>" />
    <meta property="og:title" content="<?php echo  $content['title'];?>" />
    <meta property="og:site_name" content="<?php echo DOMENA_WEBU; ?>" />
    <?php if($content['description'] != ''): ?><meta property="og:description" content="<?php echo  $content['description'];?>" /><?php endif; ?>
    <meta property="og:image" content="<?=DOMENA_WEBU?>img/system/ogimg.jpg" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1100" />
    <meta property="og:url" content="<?=DOMENA_WEBU?>">
    <script src="/template/js/jquery-1.10.2.js"></script>
    <script src="/template/js/jquery-ui-1.10.4.custom.min.js"></script>
    <script src="/template/js/wow.min.js"></script>
	<script>
	  wow = new WOW(
	          {
	          boxClass:     'wow',
	          animateClass: 'animated',
	          offset:       0,
	          mobile:       false,
	          live:         true
	        }
	        )
	        wow.init();
	</script>
    <base href="<?=DOMENA_WEBU?>"/>
    <?php echo themeSetup('extra_header'); ?>
  </head>
  <body class="<?php echo $content['content_type']; ?>">
  	<?php echo themeSetup('extra_body'); ?>
  	<header>
		<div class="container-fluid">
			<div class="row center-md">
				<div class="col-md-10">
					<section id="mainhead">
						  <div class="container-fluid">
						  	<div class="row center-md middle-md">
						  		<div class="col-md-3">
						  			<div id="leftlogo">
						  				<a href="/"><img src="/img/system/logo_light.png" alt="Logo"></a>
						  			</div>
						  		</div>
						  		<div class="col-md-9">
						  			<div id="headcont">
										<div class="row end-md">
											<div class="col-md-12">
												<span><a href="mailto:<?php echo lang('hlavny@mail', 1); ?>"><img src="/template/<?php echo $theme; ?>/images/mailw.png" alt="Mail"><?php echo lang('hlavny@mail', 1);?></a></span>
												<span><a href="tel:<?php echo lang('link_telefon', 1); ?>"><img src="/template/<?php echo $theme; ?>/images/telw.png" alt="Tel"><?php echo lang('+421 v headeri', 1);?></a></span>
												<span><a href="<?php echo lang('Navigovať_link_s_https', 1); ?>"><img src="/template/<?php echo $theme; ?>/images/navw.png" alt="Nav"><?php echo lang('Navigovať s Google', 1);?></a></span>
											</div>
										</div>
									</div>
						  			<div id="right-menu">
									  	<ul id="main-menu" class=" clearfix">
							                    <?php
							                      foreach($t_rsmenu[1] as $k => $v) {
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
							                <div id="mobile-icons" class="desktop-hidden">
								                    <div class="menu-opener">
								                      <div id="nav-icon">
								                        <span></span>
								                        <span></span>
								                        <span></span>
								                      </div>
								                    </div>
								              </div>
							                <div id="sidie">
							                	<a class="js-open-modal tonoscroll" data-modal-id="searchmodal"><div class="sear"></div></a>
				                                <?php langMenu(1) ?>
							                </div>
									  </div>
						  		</div>
						  	</div>
						  </div>
						</section>
				</div>
			</div>
		</div>
    </header>
	<main>
	  <section id="slider">
	  	  <!-- Hlavný slider -->
	  	<div class="slider-main">
	  		<div class="swiper-container swiper-container-homepage">
		        <div class="swiper-wrapper">

                <?php
                      $banner = banner(1);
                      $total = count($banner);
                      $poc = 0;
                    ?>

                  <?php foreach($banner as $k => $v): ?>
                      <?php $poc++; ?>
                      <div class="swiper-slide">
                        <a href="<?php echo $v['link']; ?>" class="animated-image" style="background:url(/img/ilustrations/1_<?php echo $v['id']; ?>.<?php echo $v['file_type']; ?>) 50% 50% no-repeat;width: 100%;height:100%;display: block;cursor: pointer;background-size: cover;">
                        </a>
                        <div class="desc-g hero-heading">
                              <span><?php echo $v['name']; ?></span>
                            </div>
                      </div>
                    <?php endforeach; ?>
                    <div class="swiper-pagination"></div>
		        </div>

    		</div>
    		<div id="bookpanel" class="wow animated fadeIn" data-wow-duration="4s">
              <div class="container">
                <div class="col-md-12">
                  <a id="bookban" class="booktoday" href="/booking/today/">
                    <div class="row center-md middle-md">
                      <div class="col-md-4 date">
                        <?php
                          $tdExp = explode('.', $today);
                          $ndExp = explode('.', $nextdays);
                          $cm = lang(date('F', strtotime($today)));
                          $nm = lang(date('F', strtotime($nextdays)));
                        ?>
                        <span class="popis"><?php echo lang('Check-in', 1) ?></span>
                        <div class="day"><?php echo $tdExp[0]; ?>.</div>
                        <div class="month"><?php echo $cm; ?></div>
                      </div>
                      <div class="col-md-4 date">
                        <span class="popis"><?php echo lang('Check-out', 1) ?></span>
                        <div class="day"><?php echo $ndExp[0]; ?>.</div>
                        <div class="month"><?php echo $nm; ?></div>
                      </div>
                      <div class="col-md-4">
                        <div class="priceday"><div id="todaybook"><?php echo lang('Najvýhodnejšia cena dňa ', 1) ?><span><?php $rate = todayBestRate();  echo "$rate"; ?> €</span><?php echo lang('apartmán / noc', 1) ?></div></div>

                      </div>
                    </div>
                  </a>
                </div>
              </div>
            </div>
	  	</div>
		<div class="break"></div>
		<!-- END Hlavný slider -->
	  </section>
	  <article>
	  	<section id="onas">
	  		<div class="container wrapper-60-0">
	  			<div class="row center-md top-md">
	  				<div class="col-md-12">
	  					<h1><?php echo $content['name'] ?></h1>
		  				<div class="line"><span></span><span></span><span></span></div>
		  				<p><?php echo $content['text'] ?></p>
	  				</div>
	  			</div>
	  		</div>
	  	</section>
	  </article>
	  <section id="bluebg" class="wrapper-30-0">
	  	<div class="container">
	  		<div class="row center-md">
	  			<div class="col-md-12">
	  				<div class="moved-down">
	  					<h2><?php echo lang('Zvýhodnené pobytové balíky',1) ?></h2>

		  				<div id="owl-offers" class="owl-carousel-offers owl-carousel">
			  					<?php foreach($content['offers'] as $k => $v):
                    if($k != 'sefprefix'): ?>
									<div class="item">
										<a href="/<?php echo $content['offers']['sefprefix']; ?>/<?php echo $v['id']; ?>/<?php echo $v['sef']; ?>/" class="btn btn-border left-on-white">
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

                <?php endif; endforeach; ?>
			  				</div>
			  				<div class="wrapper-30-0"></div>
	  				</div>
	  			</div>
	  		</div>
	  	</div>
	  </section>
	  <section id="news" class="wrapper-90-0">
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
	<?php
      $banner = banner(4);
      $total = count($banner);
      $poc = 0;

   	  if ($total > 0):
   	  		array_pop(array_reverse($banner));
   	  		foreach($banner as $k => $v): ?>
                      <?php $poc++; ?>
                      <div id="popupbanner">
                        <a href="<?php echo $v['link']; ?>">
                        	<div class="popupcontent">
                        		<div class="popupimg" style="background:url(/img/ilustrations/4_<?php echo $v['id']; ?>.<?php echo $v['file_type']; ?>) 50% 50% no-repeat;width: 100%;height:100%;display: block;cursor: pointer;background-size: cover;"></div>
                        		<div class="popuptext">
                        			<h2><?php echo $v['name']; ?></h2>
                        			<p><?php echo $v['text']; ?></p>
                        			<span class="but"><?php echo lang('Viac info',1); ?></span>
                        		</div>

                        	</div>
                        </a>
                        <div id="bannerclose"></div>
                      </div>
      		<?php endforeach; ?>
   	  <?php endif; ?>

  <script src="template/js/swiper.min.js"></script>
  <script src="/template/js/jquery.magnific-popup.js"></script>
  <script src="/template/js/script.js"></script>
  <script src="/template/js/owl.carousel.min.js"></script>
  <script>

  	$(document).ready(function() {

      if(sessionStorage.getItem("popupbanner") != 'closed') {
        $('#popupbanner').fadeIn('slow');
      }

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
        responsive:{ 0:{ items:1, }, 600:{ items:1, }, 1000:{ items:3, }}
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
  	    responsive:{ 0:{ items:1, }, 600:{ items:3, }, 1000:{ items:8, }, }
  	  });

      $('#toggle').click(function() {
  	     $('.toggle').slideToggle('slow');
  	     $(this).toggleClass('opened closed');
         return false;
  	  });

  	});

    var timeout     = 100;
    var closetimer  = 0;
    var ddmenuitem  = 0;

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

	   $('#closebookingcom').click(function() {
    $('#bookingcom').animate({marginRight: -220 + 'px'}, 2000);
});
	  
  </script>

  <?php echo $content['extra_js_footer']; ?>
  <?php cookies(); ?>
  <?php //adbanner(); ?>
  <?php langEditor(); ?>
  <?php echo themeSetup('extra_body_end'); ?>
  </body>
</html>
