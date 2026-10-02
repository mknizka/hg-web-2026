<?php require_once __DIR__.'/hg_site.php'; ?>
<main class="ec-contact ec-pricing">
<section class="ec-sales" id="contact-form">
  <div class="ec-sales-copy">
    <p class="kicker">CENNÍK ELLIPSE</p>
    <h1>Vaša prevádzka.<br>Váš Ellipse.</h1>
    <p class="ec-lead">Cloudové riešenie Ellipse môžete mať už</p>
    <div class="ec-price"><span class="ec-price-from">od</span><strong>50 <span>€</span></strong><span class="ec-price-period">mesačne</span></div>
    <p class="ec-price-description">Povedzte nám o svojej prevádzke. Vyberieme spolu vhodné moduly a pripravíme konkrétnu cenovú ponuku podľa vašich potrieb.</p>
    <div class="ec-price-contact"><span>Radšej sa porozprávate?</span><a href="tel:+421527871911">+421 52 787 1911</a><a href="mailto:office@horecagroup.sk">office@horecagroup.sk</a></div>
  </div>
  <?php $salesFormTitle='Ponuka pre vašu prevádzku.'; $salesFormSubmit='Vyžiadať cenovú ponuku'; include __DIR__.'/hg-sales-form.php'; unset($salesFormTitle,$salesFormSubmit); ?>
</section>
</main>
