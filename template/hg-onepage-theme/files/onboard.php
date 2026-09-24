<!doctype html>
<html lang="<? echo sess("lang"); ?>">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>On-board service -  <?php echo $CONFIG['hotel_name'];  ?></title>
  <meta name="keywords" content="<?=$content['keywords']; ?>">
  <meta name="description" content="<?=$content['description']; ?>">
  <meta name="robots" content="index,follow">
  <meta name="googlebot" content="snippet,archive" >
  <meta name="Generator" content="BM - horecagroup">
  <meta name="viewport" content="user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1, width=device-width, height=device-height, minimal-ui" />
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-status-bar-style" content="black">
  <meta name = "viewport" content = "initial-scale = 1.0, user-scalable = no">
  <link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,400italic,600' rel='stylesheet' type='text/css'>
  <link type="text/css" rel="stylesheet" href="/manager/css/admin.css" media="screen">
  <link type="text/css" rel="stylesheet" href="/manager/css/onboard.css" media="screen">
  <link type="text/css" rel="stylesheet" href="/template/css/jquery-ui-1.10.4.custom.min.css" media="screen">
  <? if($content['extra_css']):?>
    <link type="text/css" rel="stylesheet" href="<?=$content['extra_css'];?>" media="screen">
  <? endif;?>
  <script type="text/javascript" src="/template/js/jquery-1.10.2.js" charset="utf-8"></script>
  <script type="text/javascript" src="/template/js/jquery-ui-1.10.4.custom.min.js"></script>
  <script type="text/javascript" src="/template/js/bootstrap.js"></script>
  <? if($content['extra_js']):?>
    <script type="text/javascript" src="<?=$content['extra_css'];?>"></script>
  <? endif;?>
  <base href="<?php echo DOMENA_WEBU; ?>"/>
  </head>
  <body<?php if(abs(sess('onboard')) == 0) {echo " id='loggin'";} else {echo " id='logged'";} ?>>
    <div id="boarding"></div>
    <div id="popup">
      <div class="container">
        <div class="row center-md">
          <div class="col-md-8 popup-wrapper">
            <div id="popup-content">
              <div id="popup-close"></div>
              <div id="js-popup-content">
                 <div id="form">
                   <textarea name="hodnotenie" id="hodnotenie" cols="30" rows="10"></textarea>
                   <input type="hidden" name="sendid" id="sendid">
                   <div class="submit"><?php echo lang('Odoslať') ?></div>
                   <input type="hidden" name="sendstatus" id="sendstatus">
                 </div>
                 <div id="hod_message" style="display: none">
                    <img src="/manager/img/preload2.svg" alt="Loader" width="150">
                 </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div id='login_top_logo'>
               <div class="logowrapp">
                 <?
                      if(file_exists('./img/system/logo.png') == true) {echo "<div id='boardlogo' style='background:url(/img/system/logo.png) white 50% 50% no-repeat;background-size:contain'></div>";}
                      if(file_exists('./img/system/logo.jpg') == true) {echo "<div id='boardlogo' style='background:url(/img/system/logo.jpg) white 50% 50% no-repeat;background-size:contain'></div>";}
                   ?>
               </div>
            </div>

            <div id="onboard_main">
              <div class="menu_wrapper">
                  <div id="nav-icon1">
                    <span></span>
                    <span></span>
                    <span></span>
                    <label>MENU</label>
                  </div>
              </div>

            <div class="row top-xs center-xs">
              <?php include_once './modules/onboard.php'; ?>
            </div>


              <div class="break"></div>
            </div>

      <?php if(abs(sess('onboard')) == 0) {

          echo "

              <div id='footer'>
                 <a href='http://www.horecagroup.sk'><img src='manager/img/ell-logo-w.svg' width='180' alt='HORECA GROUP' style='margin-top: 40px'>Cloud application for hotels. Made in Slovakia.</a>
              </div>


           ";} else {echo "

            <div id='footer'>
                 <a href='http://www.horecagroup.sk'><img src='manager/img/ell-logo-w.svg' width='180' alt='HORECA GROUP' style='margin-top: 40px'>Cloud application for hotels. Made in Slovakia.</a>
            </div>


           ";} ?>

          </div>
        </div>
      </div>
    </div>
    <script src="/template/js/onboard.js"></script>
  </body>
</html>
