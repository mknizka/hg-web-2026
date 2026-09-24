<!doctype html>
<html lang="<? echo sess("lang"); ?>">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php if($content['title']) { echo $content['title']." - ".$CONFIG['hotel_name']; } else { echo $content['name']." - ".$CONFIG['hotel_name']; } ?></title>
    <meta name="keywords" content="<?php echo  $content['keywords'];?>">
    <link href="/favicon.ico" rel="shortcut icon">
    <meta name="description" content="<?php echo  $content['description'];?>">
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
    <meta property="og:image" content="<?php echo ($content['ogimg'] ? $content['ogimg'] : 'img/system/ogimg.jpg' ); ?>" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="1920" />
    <meta property="og:image:height" content="1100" />
    <meta property="og:url" content="<?php echo $curpage; ?>">
    <script type="text/javascript" src="/template/js/jquery-1.10.2.js" charset="utf-8"></script>
    <script type="text/javascript" src="/template/js/jquery-ui-1.10.4.custom.min.js"></script>
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
