<?php
  require_once __DIR__ . '/hg_site.php';
  $scenes = hg_claude_scenes();
  $scenes[] = array(
    'kicker' => hg_lang('Kontrola', 'Control'),
    'prompt' => hg_lang('Ktoré datasety môže tento účet čítať a môže AI zapisovať ceny späť?', 'Which datasets may this account read, and may the AI write rates back?'),
    'answer' => hg_lang('Obsadenosť a predaj áno. Mená hostí nie. Zápis cien je vypnutý, kým ho nepovolíte.', 'Occupancy and sales yes. Guest names no. Writing rates stays off until you allow it.'),
  );
  $features = array(
    array(
      'title' => hg_lang('Dochádzka podľa príchodov', 'Staffing from arrivals'),
      'text' => hg_lang('Z príchodov, odchodov a časov upratovania vznikne návrh dochádzky. Extra upratovanie wellnessu alebo kongresu viete doplniť ďalšou vetou.', 'Arrivals, departures and clean times become a staffing draft. Extra cleaning for wellness or a congress can be added in the next sentence.'),
    ),
    array(
      'title' => hg_lang('Revenue z živých cien', 'Revenue from live rates'),
      'text' => hg_lang('Model vidí flexi ceny, tempo predaja a obsadenosť. Návrh úprav pripraví na schválenie. Spätný zápis cien je vypnutý, kým ho výslovne nepovolíte.', 'The model sees flexi rates, pace and occupancy. It prepares changes for approval. Writing rates back stays off until you explicitly allow it.'),
    ),
    array(
      'title' => hg_lang('Menu podľa pokladne', 'A menu from the till'),
      'text' => hg_lang('Gastro dáta ostanú v Ellipse. Do AI odchádzajú súčty položiek a tržieb, nie mená hostí. Z toho vznikne návrh denného alebo sezónneho menu.', 'F&B data stays in Ellipse. AI receives item totals and takings, not guest names. From that comes a daily or seasonal menu draft.'),
    ),
    array(
      'title' => hg_lang('Pripojenie, ktoré viete vypnúť', 'A connection you can switch off'),
      'text' => hg_lang('Claude, ChatGPT aj Gemini sa pripájajú samostatne. Pri každom pripojení vyberiete datasety. Globálne vypnutie zastaví tok dát hneď.', 'Claude, ChatGPT and Gemini connect separately. Each connection chooses datasets. Switching it off globally stops the data at once.'),
    ),
  );
?>
<main class="hg-product">
  <section class="prod-hero">
    <div class="prod-copy">
      <p class="prod-kicker"><?php echo hg_lang('MCP konektor · Ella Vera', 'MCP connector · Ella Vera'); ?></p>
      <h1><?php echo hg_lang('Vaše čísla.<br><em>V Claude, ChatGPT a Gemini.</em>', 'Your numbers.<br><em>In Claude, ChatGPT and Gemini.</em>'); ?></h1>
      <p><?php echo hg_lang('Ellipse pošle do AI aktuálne prevádzkové súčty. Model neodpovedá z internetu. Pri každej otázke si načíta dáta a až potom pripraví analýzu, tabuľku alebo návrh.', 'Ellipse sends current operating totals into the AI. The model does not answer from the internet. For each question it loads the data, then prepares the analysis, table or draft.'); ?></p>
      <div class="prod-actions">
        <a class="prod-btn" href="/kontakt/"><?php echo hg_lang('Dohodnúť demo', 'Book a demo'); ?></a>
        <a class="prod-link" href="https://www.horecagroup.sk/napojte-si-ellipse-data-cez-mcp-konektor-do-sveta-ai-a-vytazte-maximum-z-analyz-a-brainstormingu/"><?php echo hg_lang('Návod krok za krokom', 'Step by step guide'); ?></a>
      </div>
    </div>
    <div class="prod-stage" aria-label="<?php echo hg_lang('Ukážky Claude s dátami Ellipse', 'Claude samples with Ellipse data'); ?>">
      <?php foreach ($scenes as $i => $scene): ?>
        <?php echo hg_claude_panel($scene, 'prod-slide'.($i === 0 ? ' is-on' : '')); ?>
      <?php endforeach; ?>
      <div class="prod-tabs" role="tablist">
        <?php foreach ($scenes as $i => $scene): ?>
          <button type="button" class="<?php echo $i === 0 ? 'is-on' : ''; ?>" data-slide="<?php echo (int)$i; ?>"><?php echo hg_esc($scene['kicker']); ?></button>
        <?php endforeach; ?>
      </div>
    </div>
  </section>

  <section class="prod-story" id="funkcie">
    <div class="prod-sticky" aria-hidden="true">
      <?php foreach ($scenes as $i => $scene): ?>
        <?php echo hg_claude_panel($scene, 'prod-pin'.($i === 0 ? ' is-on' : '')); ?>
      <?php endforeach; ?>
    </div>
    <div class="prod-steps">
      <?php foreach ($features as $i => $feature):
        $scene = $scenes[$i];
      ?>
      <article class="prod-step<?php echo $i === 0 ? ' is-on' : ''; ?>" data-step="<?php echo (int)$i; ?>">
        <div class="prod-step-visual"><?php echo hg_claude_panel($scene, 'is-on'); ?></div>
        <p class="prod-kicker"><?php echo sprintf('%02d', $i + 1); ?></p>
        <h2><?php echo hg_esc($feature['title']); ?></h2>
        <p><?php echo hg_esc($feature['text']); ?></p>
      </article>
      <?php endforeach; ?>
    </div>
  </section>

  <section class="prod-note">
    <h2><?php echo hg_lang('Dáta ostávajú pod vašou kontrolou.', 'The data stays under your control.'); ?></h2>
    <ul>
      <li><?php echo hg_lang('Do AI odchádzajú anonymizované súčty, bez mien hostí.', 'AI receives anonymised totals, without guest names.'); ?></li>
      <li><?php echo hg_lang('Konektor viete globálne vypnúť. Dáta prestanú tiecť hneď.', 'You can switch the connector off globally. The data stops at once.'); ?></li>
      <li><?php echo hg_lang('Výstup je odporúčanie. Rozhodnutie ostáva na manažérovi.', 'The output is advice. The decision stays with the manager.'); ?></li>
    </ul>
    <a class="prod-btn" href="/kontakt/"><?php echo hg_lang('Ukázať na vašich dátach', 'Show it on your data'); ?></a>
  </section>
</main>
<script>
(function () {
  var slides = [].slice.call(document.querySelectorAll('.prod-slide'));
  var tabs = [].slice.call(document.querySelectorAll('.prod-tabs button'));
  var pins = [].slice.call(document.querySelectorAll('.prod-pin'));
  var steps = [].slice.call(document.querySelectorAll('.prod-step'));
  var index = 0;
  var reduce = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  function showSlide(n) {
    if (!slides.length) return;
    index = (n + slides.length) % slides.length;
    slides.forEach(function (s, i) { s.classList.toggle('is-on', i === index); });
    tabs.forEach(function (t, i) { t.classList.toggle('is-on', i === index); });
  }
  tabs.forEach(function (tab, i) { tab.addEventListener('click', function () { showSlide(i); }); });
  if (slides.length && !reduce) setInterval(function () { showSlide(index + 1); }, 4200);
  function showPin(n) {
    pins.forEach(function (pin, i) { pin.classList.toggle('is-on', i === n); });
    steps.forEach(function (step) { step.classList.toggle('is-on', Number(step.getAttribute('data-step')) === n); });
  }
  if ('IntersectionObserver' in window && steps.length) {
    var io = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (!entry.isIntersecting) return;
        showPin(Number(entry.target.getAttribute('data-step')) || 0);
      });
    }, { threshold: 0.55 });
    steps.forEach(function (step) { io.observe(step); });
  }
})();
</script>
