
    <section id="page" class="new list">
      <div class="container-fluid maxcen">
        <div class="row center-md">
          <div class="col-md-10">
            <div class="row start-md">
              <div class="col-md-11 wrapper-30-0">
                <h1><?=$content['name'];?></h1>
                <div class="hg-changelog-col">
                  <p class="hg-kicker">Produkt</p>
                  <h2>Novinky v systéme</h2>
                  <p>Živé aktualizácie Ellipse Cloud priamo z dokumentácie. Každý záznam má dátum, názov a zoznam zmien.</p>
                  <div id="ellipse-changelog-page" class="hg-changelog-embed"></div>
                  <script
                    src="https://docx.ellipsecloud.com/load-changelog.js"
                    data-target="#ellipse-changelog-page"
                    data-limit="15"
                    data-lang="sk"
                    data-infinite-scroll="false"
                    data-more-url="https://docx.ellipsecloud.com/changelog/"
                    data-show-footer-link="true"
                  ></script>
                </div>
                <h2 class="hg-archive-title">Archív aktualizácií</h2>

                <div class="contentt">
                <?php echo $content['text'][0]; ?>
                <div class="row start-md top-md">
                <?php
                   $blogLastArticles = rs_last_articles('74', 'id', 100, 'DESC'); // rs_last_articles($id_category, $orderby = 'id', $limit = 10, $order = 'DESC')
                   foreach($blogLastArticles as $k => $v): ?>

                              <div class="col-md-6">
                                <a href="/aktualizacie/<?php echo $v['sef']; ?>/" class="actu">
                                  <div class="one-article">
                                        <div class="names">
                                          <? echo "<div class='time'><span>Aktualizácia </span>".$v['parex_text']. "</div>"?>
                                          <? echo "<h4>".$v['name']. "</h4>"?>
                                          <span>Zobraziť novinky</span>
                                        </div>
                                      </div>
                                     </a>
                              </div>

                           <?php endforeach; ?>
                </div>
               </div>
              </div>
              <div class="col-md-3">
                <div class="rightbox">

                </div>
              </div>

            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9 wrapper-60-0"></div>
        </div>
      </div>
    </section>
