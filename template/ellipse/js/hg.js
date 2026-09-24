(function () {
  var body = document.body;
  var menu = document.querySelector('.menu');
  var nav = document.querySelector('.nav nav');
  var scrollY = 0;

  function setNav(open) {
    if (!nav || !menu) return;
    nav.classList.toggle('open', open);
    body.classList.toggle('nav-open', open);
    menu.setAttribute('aria-expanded', open ? 'true' : 'false');
    menu.setAttribute('aria-label', open ? 'Zavrieť menu' : 'Otvoriť menu');
    if (open) {
      scrollY = window.scrollY || window.pageYOffset || 0;
      body.style.top = '-' + scrollY + 'px';
    } else {
      body.style.top = '';
      window.scrollTo(0, scrollY);
      document.querySelectorAll('.nav-group.is-open').forEach(function (g) {
        g.classList.remove('is-open');
        var btn = g.querySelector('.nav-parent');
        if (btn) btn.setAttribute('aria-expanded', 'false');
      });
    }
  }

  if (menu && nav) {
    menu.addEventListener('click', function () {
      setNav(!nav.classList.contains('open'));
    });
    nav.querySelectorAll('a').forEach(function (link) {
      link.addEventListener('click', function () {
        if (nav.classList.contains('open')) setNav(false);
      });
    });
  }

  document.querySelectorAll('.nav-parent').forEach(function (btn) {
    btn.addEventListener('click', function (e) {
      e.preventDefault();
      var group = btn.closest('.nav-group');
      if (!group) return;
      var open = !group.classList.contains('is-open');
      document.querySelectorAll('.nav-group.is-open').forEach(function (g) {
        if (g !== group) {
          g.classList.remove('is-open');
          var other = g.querySelector('.nav-parent');
          if (other) other.setAttribute('aria-expanded', 'false');
        }
      });
      group.classList.toggle('is-open', open);
      btn.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });

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
    btn.addEventListener('click', function () {
      var open = toc.classList.toggle('is-collapsed') === false;
      if (!open) {
        toc.classList.add('is-collapsed');
        btn.textContent = 'Zobraziť celý obsah';
      } else {
        toc.classList.remove('is-collapsed');
        btn.textContent = 'Zbaliť obsah';
      }
    });
    // Fix toggle logic
    btn.onclick = function () {
      if (toc.classList.contains('is-collapsed')) {
        toc.classList.remove('is-collapsed');
        btn.textContent = 'Zbaliť obsah';
      } else {
        toc.classList.add('is-collapsed');
        btn.textContent = 'Zobraziť celý obsah';
      }
    };
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
