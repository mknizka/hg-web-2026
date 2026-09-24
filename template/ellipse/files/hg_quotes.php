<?php
  $hgQuoteSource = function_exists('rs_last_articles') ? rs_last_articles('104', 'id', 50, 'ASC') : array();
  if (!is_array($hgQuoteSource) || empty($hgQuoteSource)) {
    return;
  }
?>
<section class="hg-quotes-band" aria-label="Citáty hotelierov">
  <div class="container-fluid">
    <div class="row center-md">
      <div class="col-md-12">
        <div class="claims">
          <div class="swiper references-swiper">
            <div class="swiper-wrapper">
              <?php foreach ($hgQuoteSource as $ref):
                $name_parts = explode(',', $ref['name'], 2);
                $client_name = trim($name_parts[0]);
                $client_company = isset($name_parts[1]) ? trim($name_parts[1]) : '';
              ?>
              <div class="swiper-slide">
                <div class="reference-bubble">
                  <div class="content">
                    <div class="reference-quote">
                      <?php echo nl2br(htmlspecialchars(strip_tags(html_entity_decode($ref['parex_text'], ENT_QUOTES | ENT_HTML5, 'UTF-8')))); ?>
                    </div>
                    <div class="reference-author">
                      <div class="img" style="width: 50px; height: 50px; border-radius: 50px; overflow: hidden;background: url(/img/rs/<?php echo $ref['id']; ?>.<?php echo $ref['file_type']; ?>) no-repeat center center;background-size: cover;"></div>
                      <div class="namebox">
                        <strong><?php echo htmlspecialchars($client_name); ?></strong>
                        <?php if ($client_company): ?>
                          <span class="reference-company"><?php echo htmlspecialchars($client_company); ?></span>
                        <?php endif; ?>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach; ?>
            </div>
            <div class="pagination"></div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
