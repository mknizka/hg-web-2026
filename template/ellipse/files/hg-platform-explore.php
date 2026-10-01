<section class="ep-explore" id="product-connected">
  <h2>Objavte ďalšie súčasti Ellipse.</h2>
  <p>Vyberte si typ prevádzky a preskúmajte moduly, ktoré k nej patria.</p>
  <div class="ep-sectors" role="group" aria-label="Typ prevádzky">
    <?php foreach(array('hotel'=>'Hotely a rezorty','gastro'=>'Reštaurácie a gastro','wellness'=>'Wellness a služby','komplex'=>'Všetko pod jednou strechou') as $key=>$label): ?>
    <button type="button" data-ep-sector="<?php echo $key; ?>" aria-pressed="false"><?php echo $label; ?></button>
    <?php endforeach; ?>
  </div>
  <?php include __DIR__.'/hg-platform-map.php'; ?>
</section>
