<?php
$hgAssociations = require __DIR__.'/hg-solution-modules.php';
$epCases = array();
foreach (hg_solutions() as $epCase) {
  $epKeys = $epCase['related_modules'] ?? ($hgAssociations[$epCase['sef']] ?? $hgAssociations[$epCase['slug']] ?? array());
  if (in_array($epModule['key'], $epKeys, true)) $epCases[] = $epCase;
}
?>
<?php if ($epCases): ?>
<section class="ep-module-body" aria-labelledby="ep-practice-title">
  <h2 id="ep-practice-title">Ako tento modul používame v praxi</h2>
  <ul><?php foreach (array_slice($epCases, 0, 4) as $epCase): ?>
    <li><a href="<?php echo hg_esc(hg_solution_url($epCase)); ?>"><?php echo hg_esc($epCase['title']); ?></a></li>
  <?php endforeach; ?></ul>
</section>
<?php endif; ?>
