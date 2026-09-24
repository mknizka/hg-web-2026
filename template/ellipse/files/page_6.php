<main class="solution-detail">
  <section id="automation">
    <div class="container-fluid">
      <div class="row center-md middle-md vh80 righthead">
        <div class="col-md-10">
          <div class="pms">
            <div class="container-fluid">
              <div class="row middle-md start-md">

                <div class="col-md-5 wow animated fadeIn" >
                  <h1><?php echo $content['title']; ?></h1>
                  <div class="adv">
                    <div class="container-fluid">
                      <div class="row top-md">
                        <div class="col-md-10">
                          <h2><?php echo $content['parex_text']; ?></h2>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <?php if ($content['id'] == 48):  // Pri mailingu kus vačšejšie pri ostatnych kus menše ?>

                  <div class="col-md-7 wow animated fadeIn" data-wow-delay="1s" data-wow-duration="2s">

                <?php else: ?>

                <div class="col-md-1"></div>
                <div class="col-md-6 wow animated fadeIn" data-wow-delay="1s" data-wow-duration="2s">

                <?php endif; ?>

                  <img src="/img/rs/<?php echo $content['id']; ?>.<?php echo $content['file_type']; ?>" alt="<?php echo $content['name']; ?> - Ellipse Hospitality Cloud solutions" width="100%" data-safe-defer-src>
                </div>
                <div class="col-md-12">
                  <div class="wrapper-30-0">

                  </div>
                </div>
                <div class="col-md-12">
                <div class="cooperation">
                  <div class="container-fluid">
                    <div class="row center-md">
                      <div class="col-md-4">
                        <div class="wrapp">
                          <h3>Odporúčanie</h3>
                          <p>Ste spokojný zákazník? Alebo poznáte naše riešenie ako ideálne pre vašich známych? Odporučte nás a my vám odpustíme poplatok za jeden mesiac alebo vás odmeníme mesačným poplatkom.</p>
                          <a href="/kontakt-pre-partnerov/?one-time-next-time" class="bigbut center">Toto je pre mňa</a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="wrapp">
                          <h3>Pravidelné partnerstvo</h3>
                          <p>Pracujete s ubytovateľmi? Ste webový developer, konzultant alebo správca nehnuteľností? Za pravidelné odporúčania vás odmeníme 50% výškou mesačného poplatku prých troch mesiacov spolupráce.</p>
                          <a href="/kontakt-pre-partnerov/?part-time" class="bigbut center">Mám záujem</a>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <div class="wrapp">
                          <h3>Aktívny predajca</h3>
                          <p>Vidíte v Ellipse potenciál na dlhodobé podnikanie? Poďte s nami do aktívnej spolupráce, aktívne obchodujte a budujte si sieť klientov. My vám poskytneme support, materiály a podelíme sa z každého spoločného zárobku.</p>
                          <a href="/kontakt-pre-partnerov/?pobocka" class="bigbut center">Idem do toho</a>
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
    </div>
  </section>
