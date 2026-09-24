<!doctype html>
<html lang="<? echo sess("lang"); ?>">
 <head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <title><?php echo $content['title'];?></title>
   <meta name="keywords" content="<?php echo  $content['keywords'];?>">
   <meta name="description" content="<?php echo  $content['description'];?>">
   <meta name="robots" content="noindex,nofollow">
   <meta name="googlebot" content="snippet,archive" >
   <link href="/favicon.ico" rel="shortcut icon">
   <meta name="Generator" content="Booking Manager CMS > www.horecagroup.sk">
   <meta name="author" content="HORECA GROUP">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link type="text/css" rel="stylesheet" href="/template/<?php echo $theme; ?>/css/web_booking_theme.css" media="screen">
   <link type="text/css" rel="stylesheet" href="/template/css/lightgallery.css" media="screen">
   <meta property="og:locale" content="<?php echo sess("lang"); ?>_<?php echo strtoupper(sess("lang")); ?>">
   <meta property="og:title" content="<?php echo  $content['title'];?>">
   <meta property="og:site_name" content="<?php echo DOMENA_WEBU; ?>">
   <?php if($content['description'] != ''): ?><meta property="og:description" content="<?php echo  $content['description'];?>"><?php endif; ?>
   <?php if($content['ogimg'] != ''): ?><meta property="og:image" content="<?php echo $content['ogimg']; ?>"><?php endif; ?>
   <meta property="og:image:type" content="image/jpeg" />
   <meta property="og:image:width" content="1920" />
   <meta property="og:image:height" content="1100" />
   <meta property="og:url" content="<?php echo $curpage; ?>">
   <script type="text/javascript" src="/template/js/jquery-1.10.2.js" charset="utf-8"></script>
   <script type="text/javascript" src="/template/js/jquery-ui-1.10.4.custom.min.js"></script>
   <script type="text/javascript" src="/modules/web_booking/js/web_booking.js"></script>
   <base href="<?php echo DOMENA_WEBU; ?>"/>
   <?php echo themeSetup('extra_header'); ?>
   </head>
   <body>
   <?php echo themeSetup('extra_body'); ?>
    <div id="wait">
      <div class="line"></div>
    </div>
    <div id="popup">
      <div class="container">
        <div class="row center-md">
          <div class="col-md-8 popup-wrapper">
            <div id="popup-content">
              <div id="popup-close"></div>
              <div id="js-popup-content">
                 <div class="br-preloader"></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="pop-bg"></div>
    <header>
      <div class="container-fluid">
        <div class="row center-md">
          <div class="col-md-12">
              <div class="container">
                <div class="row">
                  <div class="col-md-4">
                    <a href="/"><h1><? echo $CONFIG['meil_from']; ?><small><?php echo lang('online rezervačný systém'); ?></small></h1></a>
                  </div>
                  <div class="col-md-8">
                    <ul>
                      <?php if($CONFIG['homepage'] != ''): ?>
					              <li>
                          <a href="<? echo $CONFIG['homepage']; ?>" target="_blanck">
                            <img src="/vs/icons/homepage.svg" width="20">
                          </a>
                        </li>
                      <?php endif; ?>
						<li>
                          <a href="/booking/today/">
                            <img src="/vs/icons/calendar.svg" width="20">
                          </a>
                        </li>
                      <?php offerButton($tag = 'li', $check = 1); ?>
                      <li><a  class="popup" data-popup="wb-text" data-id="4"><?php echo lang('Výhody rezervácie'); ?></a></li>
                      <li><a  class="popup" data-popup="coupon"><?php echo lang('Zľavový kód'); ?></a></li>
                      <li><?php langMenu(1) ?></li>
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
					
                  </div>
                </div>
              </div>
          </div>
        </div>
      </div>
    </header>
    <main>
		<div class="container-fluid">
			<div class="row center-md">
				<div class="col-md-12">
					<?php include_once './modules/web_booking.php'; ?>
				</div>
			</div>
		</div>
    </main>
