(function () {
  function bindSwitch(root, buttons, panels) {
    if (!root || !buttons.length || !panels.length) return;
    buttons.forEach(function (btn, i) {
      btn.addEventListener('click', function () {
        buttons.forEach(function (b) { b.classList.remove('is-on'); });
        panels.forEach(function (p) { p.classList.remove('is-on'); });
        btn.classList.add('is-on');
        if (panels[i]) panels[i].classList.add('is-on');
      });
    });
  }

  document.querySelectorAll('[data-hg-switch]').forEach(function (root) {
    bindSwitch(root, root.querySelectorAll('[data-hg-tab]'), root.querySelectorAll('[data-hg-panel]'));
  });

  function fixArticleProgress() {
    var article = document.querySelector('.hg-article article.main-content, article.main-content');
    var percent = document.querySelector('.article-progress-bar .progress-percent');
    var fill = document.querySelector('.article-progress-bar .progress-fill');
    if (!article || !percent || !fill) return;
    function update() {
      var rect = article.getBoundingClientRect();
      var articleTop = window.scrollY + rect.top;
      var articleHeight = article.offsetHeight;
      var view = window.innerHeight;
      var start = articleTop;
      var end = articleTop + Math.max(articleHeight - view, 1);
      var progress = ((window.scrollY - start) / (end - start)) * 100;
      if (window.scrollY + view < articleTop) progress = 0;
      if (window.scrollY > articleTop + articleHeight) progress = 100;
      progress = Math.max(0, Math.min(100, Math.round(progress)));
      percent.textContent = progress + '%';
      fill.style.width = progress + '%';
    }
    update();
    window.addEventListener('scroll', update, { passive: true });
    window.addEventListener('resize', update);
  }

  function enhanceToc() {
    var toc = document.querySelector('.article-toc');
    if (!toc || toc.querySelector('.toc-more')) return;
    var items = toc.querySelectorAll('.toc-item');
    if (items.length <= 3) return;
    toc.classList.add('is-collapsed');
    var btn = document.createElement('button');
    btn.type = 'button';
    btn.className = 'toc-more';
    btn.textContent = 'Zobraziť celý obsah';
    btn.setAttribute('aria-expanded', 'false');
    btn.addEventListener('click', function () {
      var expanded = toc.classList.toggle('is-collapsed') === false;
      btn.textContent = expanded ? 'Zbaliť obsah' : 'Zobraziť celý obsah';
      btn.setAttribute('aria-expanded', expanded ? 'true' : 'false');
    });
    toc.appendChild(btn);
  }

  function ready(fn) {
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
    else fn();
  }

  ready(function () {
    // ellipse.js builds TOC/progress asynchronously after jQuery ready
    setTimeout(function () {
      fixArticleProgress();
      enhanceToc();
    }, 400);
  });
})();
