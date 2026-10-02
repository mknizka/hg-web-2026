<?php
$hgAssociations = require __DIR__.'/hg-solution-modules.php';
$hgRelatedKeys = $selected['related_modules'] ?? ($hgAssociations[$selected['sef']] ?? $hgAssociations[$selected['slug']] ?? array());
$hgRelatedModules = array();
foreach ($hgRelatedKeys as $hgKey) {
  if (!is_string($hgKey)) continue;
  $hgRelatedModule = hg_module($hgKey);
  if ($hgRelatedModule) $hgRelatedModules[$hgRelatedModule['id']] = $hgRelatedModule;
}
?>
<link rel="stylesheet" href="/template/ellipse/css/hg-platform-map.css?v=6">
<link rel="stylesheet" href="/template/ellipse/css/hg-solution-explore.css?v=1">
<section class="es-module-context" id="solution-modules" aria-labelledby="solution-modules-title">
  <p class="kicker">OD POSTUPU K MODULOM</p>
  <h2 id="solution-modules-title">Ktoré súčasti Ellipse spolupracujú pri tomto riešení?</h2>
  <p>Otvorte súvisiaci modul alebo v schéme preskúmajte celú platformu pre svoj typ prevádzky.</p>
  <?php if ($hgRelatedModules): ?>
  <ul class="es-module-links">
  <?php foreach ($hgRelatedModules as $hgRelatedModule): ?>
    <li><a href="<?php echo hg_esc($hgRelatedModule['href']); ?>"><?php echo hg_esc($hgRelatedModule['name']); ?> <svg class="hg-arrow" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" focusable="false"><path d="M6 18 18 6M6 6h12v12"/></svg></a></li>
  <?php endforeach; ?>
  </ul>
  <?php endif; ?>
</section>
<?php include __DIR__.'/hg-platform-explore.php'; ?>
<script src="/template/ellipse/js/hg-platform-map.js?v=6" defer></script>
