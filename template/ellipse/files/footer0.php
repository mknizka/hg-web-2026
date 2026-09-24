          <section id="reff" class="smoke">
             <div class="container-fluid">
                 <div class="row center-md">
                   <div class="col-md-6">
                     <div class="wrapper-20-0"></div>
                     <h2 class="centered" style="margin-bottom: 10px">Naši zákazníci</h2>
                     <div class="popis">
                       <h3>Našimi zákazníkmi sú veľké hotelové rezorty s viac ako 500 ubytovacími jednotkami, hotely, reštaurácie aj malí ubytovatelia a jednotliví vlastníci apartmánov. Ellipse Cloud sa prispôsobí vašim potrebám funkcionalitami aj cenou.</h3>
                     </div>
                     <div class="wrapper-10-0"></div>
                     <div class="whbox">
                       <div class="one">
                         <p>99.99% <small>dostupnosť</small></p>
                       </div>
                       <div class="one">
                         <p>500+ <small>zákazníkov</small></p>
                       </div>
                       <div class="one">
                         <p>45% <small>priemerné zvýšenie predaja</small></p>
                       </div>
                     </div>
                   </div>
                 </div>
                         <div class="row center-md middle-md">
                           <div class="col-md-10">
                                     <div id="owl-ref" class="owl-carousel owl-theme">
                                       <?php
                                                 $banner = banner(2);
                                                 $total = count($banner);
                                                 $poc = 0;
                                               ?>

                                             <?php foreach($banner as $k => $v): ?>
                                                 <?php $poc++; ?>

                                                   <div class="item" style="background:url(/img/ilustrations/2_<?php echo $v['id']; ?>.<?php echo $v['file_type']; ?>);background-size: cover;background-position: center center" data-safe-defer-style>
                                                       <div class="name"><?php echo $v['name']; ?></div>
                                                   </div>

                                               <?php endforeach; ?>
                                     </div>

                             </div>
                       </div>
                       <div class="row center-md">
                         <div class="col-md-6 wrapper-10-0">
                           <h2>Čo zmena systému zákazníkom priniesla?</h2>
                            <div class="popis">
                              <h3>Zvýšenie priameho predaja. Automatizáciu komunikácie s hosťom. Automatizáciu dennodenných povinností. Komplexnosť modulov. Reštaurácia, ubytovanie, služby, podujatia, eventy, vernostný systém pod jednou strechou. Úsporu času a nový pohľad na procesy. Moderný a prehľadný online prístup. Neobmedzenosť a otvorenosť systému. Neustále novinky a vylepšovanie funkcionalít. <br><br></h3>
                            </div>
                           <a class="main-btn" href="/kontakt/">Vyskúšajte Ellipse aj vy</a>
                           <div class="wrapper-20-0"></div>
                         </div>
                       </div>
                   </div>
                   <div class="wrapper-20-0"></div>

          </section>
          <section id="rent">
           <div class="container-fluid">
             <div class="row center-md middle-md vh80">
               <div class="col-md-10">
                 <div class="pms">
                   <div class="container-fluid">
                     <div class="row middle-md start-md">
                       <div class="col-md-12 wow animated fadeIn" data-wow-duration="2s">
                         <h2 class="bigh2">Ellipse automatizácia</h2>
                         <p class="afterheading">Jedným zo základných cieľov našej pridanej hodnoty je automatizácia a odbúranie vašej manuálnej ručnej práce.</p>
                         <div class="automate">
                            <a href="/online-check-in/">
                              <img src="/template/ellipse/img/sign.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Online checkin</h3>
                              <p>Nechajte hostí, aby sa ubytovali sami. Vyplnia si check-in online vrátane elektronických podpisov.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/on-board/">
                              <img src="/template/ellipse/img/onboard.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Onboard</h3>
                              <p>Doobjednávky služieb a upselling, hodnotenia pobytu, chat, online hotelový účet, faktúry na stiahnutie.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/roomie/">
                              <img src="/template/ellipse/img/acc.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Roomie</h3>
                              <p>Online aplikácia na správu upratovania izieb. Nahlasovanie porúch, prehľady príchodov, odchodov. Online a naživo.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/timi-booking-engine-pre-rezervacie-sluzieb/">
                              <img src="/template/ellipse/img/services.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Timi</h3>
                              <p>Časové rezervácie služieb zahrnutých v pobyte. Booking engine na doplnkový predaj služieb.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/hodnotenia-hosti/">
                              <img src="/template/ellipse/img/rate.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Hodnotenia</h3>
                              <p>Automatizovaný mailing so spätnou väzbou a hodnotením pobytu. Správa hodnotení a manažment.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/automaticky-mailing/">
                              <img src="/template/ellipse/img/crm.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Mailing</h3>
                              <p>Plne automatizovaný mailing hosťom. Zmena stavu pobytu, úhrada, pripomenutie úhrady. Neobmedzené možnosti.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/online-platby/">
                              <img src="/template/ellipse/img/pay.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Online platby</h3>
                              <p>Zabezpečené platby online. Platby počas online rezervácie, platby v Onboarde, platby faktúr online.</p>
                              <span>Viac</span>
                            </a>
                            <a href="/otvorene-api/">
                              <img src="/template/ellipse/img/api.svg" alt="Payment Ellipse PMS" data-safe-defer-src>
                              <h3>Otvorené API</h3>
                              <p>Napojte si služby tretích strán podľa potreby. Zámkové systémy, TV systémy, účtovníctvo, rezervácie.</p>
                              <span>Viac</span>
                            </a>
                         </div>

                       </div>

                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
          </section>
          <section id="rev" class="neews">
           <div class="container-fluid">
             <div class="row center-md middle-md righthead">
               <div class="col-md-10">
                 <div class="neews">
                   <div class="container-fluid">
                     <div class="row middle-md center-md">
                       <div class="col-md-12 wow animated fadeIn"  data-wow-duration="1s">
                         <h2>Novinky a Blog</h2>
                         <div class="row art start-md">
                           <?php
                          $blogLastArticles = rs_last_articles('55,56', 'id', 3, 'DESC'); // rs_last_articles($id_category, $orderby = 'id', $limit = 10, $order = 'DESC')
                          foreach($blogLastArticles as $k => $v): ?>
                                    <div class="col-md-4">
                                      <a href="/<?php echo $v['sef']; ?>/" class="oneart">
                                        <div class="one-article">
                                          <div class="container-fluid">
                                            <div class="row">
                                                  <div class="col-md-12">
                                                    <div class="blog-im" style="max-width:100%; height: 270px; background: url(img/rs/<?php echo $v['id']; ?>.<?php echo $v['file_type']; ?>) center center no-repeat;background-size: cover;" data-safe-defer-style></div>
                                                    <div class="names">

                                                      <? echo "<h3>".short(strip_tags($v['name']), 80). "</h3>"?>
                                                      <? echo "<p>".short(strip_tags($v['parex_text']), 160). "</p>"?>
                                                      <span>Viac info</span>
                                                    </div>
                                                  </div>

                                                  </div>
                                              </div>
                                            </div>
                                           </a>
                                        </div>
                                  <?php endforeach; ?>

                                <?php //print_r($v) ?>
                         </div>

                         <div class="container-fluid">
                           <div class="row center-md">
                             <div class="col-md-12">
                               <div class="wrapper-40-0"></div>
                             </div>
                             <div class="col-md-12">
                               <a href="/blog/" class="main-btn">Všetky články</a>
                             </div>
                             <div class="col-md-12">
                               <div class="wrapper-60-0"></div>
                             </div>
                           </div>
                         </div>

                       </div>
                     </div>
                   </div>
                 </div>
               </div>
             </div>
           </div>
          </section>

          </main>
          <footer>
              <div class="container-fluid">
                <div class="row center-md">
                  <div class="col-md-10">
                    <div class="container-fluid">
                      <div class="row start-md">
                        <div class="col-md-3">
                          <h3><?php echo lang('Produkty',1) ?></h3>
                          <ul>
                            <li><a href="/pms-hotelovy-rezervacny-system/">PMS</a></li>
                            <li><a href="/booking-engine/">Booking engine</a></li>
                            <li><a href="/channel-manager/">Channel manager</a></li>
                            <li><a href="/casove-rezervacie-sluzieb/">Rezervácie služieb</a></li>
                            <li><a href="/rezervacie-kurzov-jogy-podujati-a-skupinovych-cviceni/">Rezervácie vstupov a kurzov</a></li>
                            <li><a href="/restauracia-gastronomia-skladove-hospodarstvo/">Reštaurácia a sklady</a></li>
                            <li><a href="/eventovy-modul-planovanie-skoleni-a-cenove-ponuky/">Eventový modul</a></li>
                            <li><a href="/vernostny-system-a-kreditne-cerpanie-sluzieb/">Vernostný systém</a></li>
                            <li><a href="/#crm">CRM naprieč modulmi</a></li>
                            <li><a href="/#aquapark">Aquapark mode</a></li>
                            <li><a href="/#aplikacie">Ellipse Team a POS</a></li>
                            <li><a href="/moderne-webove-stranky/">Moderné stránky</a></li>
                            <li><a href="/pickup-dashboard-a-vynosovy-manazment/">Výnosový manažment</a></li>
                            <li><a href="/majitelsky-modul-a-aplikacie-na-mieru/">Kúp a prenajímaj</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3">
                          <h3><?php echo lang('Automatizácia',1) ?></h3>
                          <ul>
                            <li><a href="/online-check-in/">Online checkin</a></li>
                            <li><a href="https://apps.apple.com/sk/app/ellipse-team/id6806602365?l=sk" target="_blank" rel="noopener">Ellipse Team · App Store</a></li>
                            <li><a href="https://play.google.com/store/apps/details?id=com.ellipsecloud.team&hl=sk" target="_blank" rel="noopener">Ellipse Team · Google Play</a></li>
                            <li><a href="https://apps.apple.com/sk/app/ellipse-pos/id6804199276?l=sk" target="_blank" rel="noopener">Ellipse POS · App Store</a></li>
                            <li><a href="https://play.google.com/store/apps/details?id=com.ellipsecloud.ellipsePos&hl=sk" target="_blank" rel="noopener">Ellipse POS · Google Play</a></li>
                            <li><a href="/on-board/">Onboard app</a></li>
                            <li><a href="/roomie/">Roomie app</a></li>
                            <li><a href="/timi-booking-engine-pre-rezervacie-sluzieb/">Timi</a></li>
                            <li><a href="/hodnotenia-hosti/">Reviews</a></li>
                            <li><a href="/automatizovany-mailing/">Mailing and CRM</a></li>
                            <li><a href="/online-platby/">Online payments</a></li>
                            <li><a href="/otvorene-api/">Open API</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3">
                          <h3><?php echo lang('Info',1) ?></h3>
                          <ul>
                            <li><a href="/kontakt/">Kontakt</a></li>
                            <li><a href="/cennik/">Cenník</a></li>
                            <li><a href="/faq/">Časté otázky</a></li>

                            <li><a href="/podpora/">Podpora</a></li>
                            <li><a href="https://www.horecagroup.sk/kontakt/#persons">Kontaktné osoby</a></li>

                          </ul>
                          <div class="wrapper-20-0"></div>
                          <h3>Zákazníci a partneri</h3>
                          <ul>
                            <li><a href="/aktualizacie-a-novinky-v-systeme/">Aktualizácie systému</a></li>
                            <li><a target="_blank" href="https://docs.ellipsecloud.com/">Dokumentácia a návody</a></li>
                            <li><a target="_blank" href="https://docs.ellipsecloud.com/dostupne-api-volania-pre-ellipse-cloud/">API dokumentácia</a></li>
                            <li><a href="/affiliate-program/">Hľadáme servisných partnerov</a></li>
                            <li><a href="/affiliate-program/">Affiliate program</a></li>
                          </ul>
                        </div>
                        <div class="col-md-3">
                          <h3>Novinky na Váš e-mail</h3>
                          <p>Všetky novinky a update na Váš e-mail. Nie viac ako 3 maily mesačne.</p>
                          <?php crmRegisterSmall(6); ?>
                        </div>
                      </div>
                    </div>
                  </div>

                </div>
                <div class="row center-md line">
                  <div class="col-md-10">
                    <div class="container-fluid">
                      <div class="row middle-md start-md">
                        <div class="col-md-6">
                          <p>©2015-2022 Ellipse cloud. All rights reserved.</p>
                          <img src="/template/ellipse/img/more-direct.svg" alt="Ellipse Cloud More Direct Booking" data-safe-defer-src>
                        </div>
                      </div>
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
          <script>
            var safeDefer={srcDeferAttribute:"data-safe-defer-src",styleDeferAttribute:"data-safe-defer-style",classDeferAttribute:"data-safe-defer-class",srcBackingAttribute:"data-safe-deferred-src",imagePlaceholder:"data:image/png;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=",debugMode:!1,deferAll:function(){this.deferSources(),this.deferClasses(),this.deferStyles()},deferSources:function(){for(var e="*["+this.srcDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],o=s.getAttribute("src");this.debugMode&&console.log("Deferring Source: "+o),!s.complete&&(s.setAttribute(this.srcBackingAttribute,o),s.setAttribute("src",this.imagePlaceholder)),s.removeAttribute(this.srcDeferAttribute)}},deferClasses:function(){for(var e="*["+this.classDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r];s.getAttribute(this.classDeferAttribute).split(" ").forEach(function(e){this.debugMode&&console.log("Deferring Class: "+e),s.classList.remove(e)})}},deferStyles:function(){for(var e="*["+this.styleDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],o=s.getAttribute("style");this.debugMode&&console.log("Deferring Style: "+o),s.setAttribute(this.styleDeferAttribute,o),s.setAttribute("style","")}},loadAllDeferred:function(){this.loadDeferredClasses(),this.loadDeferredSources(),this.loadDeferredStyles()},loadDeferredSources:function(){for(var e="*["+this.srcBackingAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],o=s.getAttribute(this.srcBackingAttribute);this.debugMode&&console.log("Loading Source: "+o),s.setAttribute("src",o),s.removeAttribute(this.srcBackingAttribute)}},loadDeferredClasses:function(){for(var e="*["+this.classDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r];s.getAttribute(this.classDeferAttribute).split(" ").forEach(function(e){this.debugMode&&console.log("Appending Class: "+e),s.classList.add(e)}),s.removeAttribute(this.classDeferAttribute)}},loadDeferredStyles:function(){for(var e="*["+this.styleDeferAttribute+"]",t=document.querySelectorAll(e),r=0;r<t.length;r++){var s=t[r],o=s.getAttribute(this.styleDeferAttribute);this.debugMode&&console.log("Setting Style: "+o),s.setAttribute("style",o),s.removeAttribute(this.styleDeferAttribute)}}};window.addEventListener("load",function(){safeDefer.debugMode&&console.log("Page load complete!"),safeDefer.loadAllDeferred()},!1),$(document).ready(function(){$(window).scroll(function(){var e=$(window).scrollTop()/($(document).height()-$(window).height())*100;$(".scroll-line").css("width",e+"%")})}),$(document).on("click touchstart","#bannerclose",function(){$("body").removeAttr("style"),$("#popupbaner").animate({left:"-1000px"},500),sessionStorage.setItem("popupbanner","closed")}),"closed"===sessionStorage.getItem("popupbanner")&&$("#popupbaner").hide(),function(e){e(function(){e("a[href*=#]:not([href=#])").click(function(){if(location.pathname.replace(/^\//,"")==this.pathname.replace(/^\//,"")&&location.hostname==this.hostname){var t=e(this.hash);if((t=t.length?t:e("[name="+this.hash.slice(1)+"]")).length)return e("html,body").animate({scrollTop:t.offset().top-70+"px",scrollLeft:t.offset().left-0},1500),!1}})}),e(window).bind("scroll",function(){e(this).scrollTop()>100?e("header").addClass("ww"):e("header").removeClass("ww")}),e(window).bind("scroll",function(){e(this).scrollTop()>100?e("main").addClass("ww"):e("main").removeClass("ww")})}(jQuery),$("#nav-icon").on("click",function(){$(this).toggleClass("open"),$("#nav-icon").hasClass("open")?($("#main-menu").animate({right:0},0),$("body").addClass("opened"),$("#bcg1").animate({right:"300px"},200),$(".logo-menu a img").animate({opacity:0},200)):($("#main-menu").animate({right:"-100%"},0),$("body").removeClass("opened"),$("body").animate({scrollTop:0},200),$("#bcg1").animate({right:"0px"},200),$(".logo-menu a img").animate({opacity:1},200))}),$(".close-left").on("click",function(){$("#location").animate({marginLeft:"-100px",opacity:0},200)});
          </script>
          <script>
          (function() {
            safeDefer.deferAll();
            })();
          </script>
          <script src="/template/js/owl.carousel.min.js"></script>
          <script type="text/javascript">

          $("#owl-be").owlCarousel({
          autoplay: false,
          slideSpeed: 800,
          paginationSpeed: 800,
          autoplay: false,
          items: 1,
          loop: true
          });

          $("#owl-w").owlCarousel({
          autoplay: true,
          slideSpeed: 800,
          paginationSpeed: 800,
          autoplay: true,
          items: 1,
          loop: true
          });

          $("#owlpms").owlCarousel({
          autoplay: false,
          slideSpeed: 800,
          autoplayTimeout: 8000,
          paginationSpeed: 800,
          autoplay: false,
          items: 1,
          loop: true
          });

          $("#owl-ref").owlCarousel({
           autoplay: false,
           autoplaySpeed: 1000,
           items : 4,
           center: true,
           autoHeight: false,
           pagination: false,
           loop:true,
           dots: false,
           nav: true,
           navText: ["<span class='lefta'></span>","<span class='righta'></span>"],
           autoplayHoverPause:false,
           responsive:{
          0:{
              items:1,

          },
          600:{
              items:2,

          },
          1300:{
              items:4,
          }
            }
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
          <?php echo $content['extra_js_footer']; ?>
          <?php //cookies(); ?>
          <?php //adbanner(); ?>
          <?php //langEditor(); ?>
          <?php echo themeSetup('extra_body_end'); ?>
    </body>
</html>
