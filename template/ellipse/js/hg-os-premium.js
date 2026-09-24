/* === PREMIUM HOMEPAGE V1 / MOTION LAYER === */
(function () {
  'use strict';

  function ready(fn) {
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
    else fn();
  }

  ready(function () {
    var home = document.querySelector('main.os-home');
    if (!home) return;

    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
    home.setAttribute('data-premium-ready', '1');

    /* Compact glass navigation after the first few pixels of scroll. */
    var shellNav = document.querySelector('.homepage .nav');
    if (shellNav) {
      var navTick = false;
      function syncNavState() {
        shellNav.classList.toggle('is-scrolled', (window.scrollY || window.pageYOffset || 0) > 16);
      }
      syncNavState();
      window.addEventListener('scroll', function () {
        if (navTick) return;
        navTick = true;
        requestAnimationFrame(function () {
          navTick = false;
          syncNavState();
        });
      }, { passive: true });
    }

    /* Section reveal: restrained, progressive and accessibility-safe. */
    var sections = Array.prototype.slice.call(home.querySelectorAll(':scope > section:not(.os-canvas)'));
    if ('IntersectionObserver' in window && !reduce.matches) {
      var observer = new IntersectionObserver(function (entries) {
        entries.forEach(function (entry) {
          if (entry.isIntersecting) {
            entry.target.classList.add('is-inview');
            observer.unobserve(entry.target);
          }
        });
      }, { rootMargin: '0px 0px -10% 0px', threshold: 0.08 });

      sections.forEach(function (section) {
        if (section.classList.contains('os-hero')) section.classList.add('is-inview');
        else observer.observe(section);
      });
    } else {
      sections.forEach(function (section) { section.classList.add('is-inview'); });
    }

    /* Draw live connector lines between the Ellipse core and module nodes. */
    var eco = home.querySelector('.os-eco');
    var canvas = home.querySelector('[data-os-canvas]');
    if (eco && canvas) {
      var ns = 'http://www.w3.org/2000/svg';
      var svg = document.createElementNS(ns, 'svg');
      svg.setAttribute('class', 'os-eco-lines');
      svg.setAttribute('aria-hidden', 'true');
      eco.insertBefore(svg, eco.firstChild);

      var core = eco.querySelector('.os-core');
      var nodes = Array.prototype.slice.call(eco.querySelectorAll('.os-node[data-step]:not(.os-core)'));
      var lines = nodes.map(function (node) {
        var line = document.createElementNS(ns, 'line');
        line.setAttribute('data-line-step', node.getAttribute('data-step') || '0');
        svg.appendChild(line);
        return { node: node, line: line };
      });

      function point(el, rootRect) {
        var rect = el.getBoundingClientRect();
        return {
          x: rect.left - rootRect.left + rect.width / 2,
          y: rect.top - rootRect.top + rect.height / 2
        };
      }

      function layoutLines() {
        if (!core || window.innerWidth <= 800) return;
        var rootRect = eco.getBoundingClientRect();
        var c = point(core, rootRect);
        svg.setAttribute('viewBox', '0 0 ' + Math.max(1, rootRect.width) + ' ' + Math.max(1, rootRect.height));
        lines.forEach(function (item) {
          var p = point(item.node, rootRect);
          item.line.setAttribute('x1', c.x.toFixed(2));
          item.line.setAttribute('y1', c.y.toFixed(2));
          item.line.setAttribute('x2', p.x.toFixed(2));
          item.line.setAttribute('y2', p.y.toFixed(2));
        });
      }

      function syncLines() {
        var step = parseInt(canvas.getAttribute('data-os-step'), 10) || 0;
        lines.forEach(function (item) {
          var lineStep = parseInt(item.line.getAttribute('data-line-step'), 10) || 0;
          item.line.classList.toggle('is-on', lineStep <= step);
        });
      }

      var resizeTick = false;
      function onResize() {
        if (resizeTick) return;
        resizeTick = true;
        requestAnimationFrame(function () {
          resizeTick = false;
          layoutLines();
        });
      }

      layoutLines();
      syncLines();
      window.addEventListener('resize', onResize);
      new MutationObserver(syncLines).observe(canvas, { attributes: true, attributeFilter: ['data-os-step'] });
      setTimeout(layoutLines, 250);
      setTimeout(layoutLines, 900);
    }

    /* Very light pointer parallax in hero. No fake UI, only real product layers. */
    var heroVisual = home.querySelector('.os-hero-visual');
    if (heroVisual && !reduce.matches && window.matchMedia('(pointer:fine)').matches) {
      var frame = 0;
      heroVisual.addEventListener('pointermove', function (event) {
        var rect = heroVisual.getBoundingClientRect();
        var x = ((event.clientX - rect.left) / rect.width - 0.5) * 2;
        var y = ((event.clientY - rect.top) / rect.height - 0.5) * 2;
        cancelAnimationFrame(frame);
        frame = requestAnimationFrame(function () {
          heroVisual.style.setProperty('--mx', x.toFixed(3));
          heroVisual.style.setProperty('--my', y.toFixed(3));
        });
      });
      heroVisual.addEventListener('pointerleave', function () {
        heroVisual.style.setProperty('--mx', '0');
        heroVisual.style.setProperty('--my', '0');
      });
    }
  });
})();


/* === PREMIUM HOMEPAGE V1 / FRAGMENT PARALLAX === */
(function () {
  'use strict';

  function ready(fn) {
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
    else fn();
  }

  ready(function () {
    var home = document.querySelector('main.os-home');
    if (!home) return;

    var reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
    var mobile = window.matchMedia('(max-width: 700px)');
    var items = Array.prototype.slice.call(home.querySelectorAll('[data-parallax-depth]'));
    if (!items.length) return;

    var ticking = false;

    function reset() {
      items.forEach(function (item) {
        item.style.setProperty('--parallax-y', '0px');
      });
    }

    function render() {
      ticking = false;
      if (reduced.matches || mobile.matches) {
        reset();
        return;
      }

      var vh = window.innerHeight || document.documentElement.clientHeight || 800;
      var viewportCenter = vh / 2;

      items.forEach(function (item) {
        var rect = item.getBoundingClientRect();
        if (rect.bottom < -160 || rect.top > vh + 160) return;
        var center = rect.top + rect.height / 2;
        var normalized = (viewportCenter - center) / vh;
        if (normalized > 1) normalized = 1;
        if (normalized < -1) normalized = -1;
        var depth = parseFloat(item.getAttribute('data-parallax-depth')) || 0;
        var y = normalized * depth * 190;
        item.style.setProperty('--parallax-y', y.toFixed(2) + 'px');
      });
    }

    function requestRender() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(render);
    }

    render();
    window.addEventListener('scroll', requestRender, { passive: true });
    window.addEventListener('resize', requestRender);

    if (typeof reduced.addEventListener === 'function') {
      reduced.addEventListener('change', requestRender);
      mobile.addEventListener('change', requestRender);
    }
  });
})();


/* === PREMIUM HOMEPAGE V1 / SCENE CONTROLLER === */
(function () {
  'use strict';

  function ready(fn) {
    if (document.readyState === 'loading') document.addEventListener('DOMContentLoaded', fn);
    else fn();
  }

  ready(function () {
    var home = document.querySelector('main.os-home');
    if (!home) return;

    var reduce = window.matchMedia('(prefers-reduced-motion: reduce)');
    var mobile = window.matchMedia('(max-width: 700px)');
    var scenes = Array.prototype.slice.call(home.querySelectorAll(
      '.os-product,.os-booking,.os-team,.os-case,.os-inbox,.os-mcp'
    ));
    var bookingCards = Array.prototype.slice.call(home.querySelectorAll('.os-booking-fragments .os-crop-card'));
    var ticking = false;

    function clamp01(n) {
      if (n < 0) return 0;
      if (n > 1) return 1;
      return n;
    }

    function sectionProgress(section, vh) {
      var rect = section.getBoundingClientRect();
      var total = rect.height + vh;
      return clamp01((vh - rect.top) / total);
    }

    function focusBookingCard(vh) {
      if (!bookingCards.length) return;
      if (mobile.matches || reduce.matches) {
        bookingCards.forEach(function (card) { card.classList.add('is-focus'); });
        return;
      }

      var targetY = vh * 0.53;
      var nearest = null;
      var nearestDistance = Infinity;

      bookingCards.forEach(function (card) {
        var rect = card.getBoundingClientRect();
        var center = rect.top + rect.height / 2;
        var distance = Math.abs(center - targetY);
        if (distance < nearestDistance) {
          nearest = card;
          nearestDistance = distance;
        }
      });

      bookingCards.forEach(function (card) {
        card.classList.toggle('is-focus', card === nearest);
      });
    }

    function render() {
      ticking = false;
      var vh = window.innerHeight || document.documentElement.clientHeight || 800;

      scenes.forEach(function (section) {
        var rect = section.getBoundingClientRect();
        var active = rect.bottom > vh * 0.16 && rect.top < vh * 0.84;
        section.classList.toggle('is-scene-active', active);

        var progress = (reduce.matches || mobile.matches) ? 0.5 : sectionProgress(section, vh);
        section.style.setProperty('--scene-progress', progress.toFixed(4));
      });

      focusBookingCard(vh);
    }

    function requestRender() {
      if (ticking) return;
      ticking = true;
      requestAnimationFrame(render);
    }

    render();
    window.addEventListener('scroll', requestRender, { passive: true });
    window.addEventListener('resize', requestRender);

    if (typeof reduce.addEventListener === 'function') {
      reduce.addEventListener('change', requestRender);
      mobile.addEventListener('change', requestRender);
    }
  });
})();

