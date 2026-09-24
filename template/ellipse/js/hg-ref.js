(function () {
  var menu = document.querySelector('.menu');
  var nav = document.querySelector('.nav nav');
  var scrollY = 0;
  function setNav(open) {
    if (!nav || !menu) return;
    nav.classList.toggle('open', open);
    document.body.classList.toggle('nav-open', open);
    menu.setAttribute('aria-expanded', open ? 'true' : 'false');
    menu.setAttribute('aria-label', open ? 'Zavrieť menu' : 'Otvoriť menu');
    if (open) {
      scrollY = window.scrollY || window.pageYOffset || 0;
      document.body.style.top = '-' + scrollY + 'px';
    } else {
      document.body.style.top = '';
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

  document.querySelectorAll('.segment-tabs button').forEach(function (b) {
    b.addEventListener('click', function () {
      document.querySelectorAll('.segment-tabs button').forEach(function (x) { x.classList.remove('active'); });
      b.classList.add('active');
      var num = document.querySelector('.segment-content .number');
      var h = document.querySelector('.segment-content h3');
      var p = document.querySelector('.segment-content .seg-lead');
      var ul = document.querySelector('.segment-content ul');
      var a = document.querySelector('.segment-content .button');
      if (num) num.textContent = b.getAttribute('data-kicker') || '';
      if (h) {
        h.textContent = '';
        (b.getAttribute('data-title') || '').split('\n').forEach(function (part, i) {
          if (i) h.appendChild(document.createElement('br'));
          h.appendChild(document.createTextNode(part));
        });
      }
      if (p) p.textContent = b.getAttribute('data-lead') || '';
      if (a && b.getAttribute('data-cta')) {
        var arrow = a.querySelector('span');
        a.textContent = b.getAttribute('data-cta') + ' ';
        if (arrow) a.appendChild(arrow);
      }
      if (ul && b.getAttribute('data-points')) {
        ul.innerHTML = '';
        JSON.parse(b.getAttribute('data-points')).forEach(function (item) {
          var li = document.createElement('li');
          li.textContent = item;
          ul.appendChild(li);
        });
      }
      if (a && b.getAttribute('data-href')) a.setAttribute('href', b.getAttribute('data-href'));
    });
  });

  var reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
  var flowSteps = [].slice.call(document.querySelectorAll('.flow-step'));
  var flowIndex = 0;
  if (flowSteps.length && !reduceMotion) {
    setInterval(function () {
      flowSteps[flowIndex].classList.remove('is-active');
      flowIndex = (flowIndex + 1) % flowSteps.length;
      flowSteps[flowIndex].classList.add('is-active');
    }, 2200);
  }

  var systemSlides = [].slice.call(document.querySelectorAll('.showcase-slide'));
  var systemCount = document.querySelector('.showcase-nav b');
  var systemIndex = 0;
  function showSystem(n) {
    if (!systemSlides.length) return;
    systemSlides[systemIndex].classList.remove('is-active');
    systemIndex = (n + systemSlides.length) % systemSlides.length;
    systemSlides[systemIndex].classList.add('is-active');
    if (systemCount) systemCount.textContent = String(systemIndex + 1).padStart(2, '0');
  }
  var prev = document.querySelector('.showcase-prev');
  var next = document.querySelector('.showcase-next');
  if (prev) prev.addEventListener('click', function () { showSystem(systemIndex - 1); });
  if (next) next.addEventListener('click', function () { showSystem(systemIndex + 1); });
  if (systemSlides.length && !reduceMotion) setInterval(function () { showSystem(systemIndex + 1); }, 5000);

  var phones = [].slice.call(document.querySelectorAll('.iphone-card'));
  var phoneLabels = [].slice.call(document.querySelectorAll('.phone-labels span'));
  var phoneIndex = 0;
  function showPhone(n) {
    if (!phones.length) return;
    phoneIndex = (n + phones.length) % phones.length;
    phones.forEach(function (p, i) {
      p.classList.remove('is-active', 'is-prev', 'is-next');
      if (i === phoneIndex) p.classList.add('is-active');
      else if (i === (phoneIndex - 1 + phones.length) % phones.length) p.classList.add('is-prev');
      else if (i === (phoneIndex + 1) % phones.length) p.classList.add('is-next');
    });
    phoneLabels.forEach(function (l, i) { l.classList.toggle('is-active', i === phoneIndex); });
  }
  showPhone(0);
  var phonePrev = document.querySelector('.phone-prev');
  var phoneNext = document.querySelector('.phone-next');
  if (phonePrev) phonePrev.addEventListener('click', function () { showPhone(phoneIndex - 1); });
  if (phoneNext) phoneNext.addEventListener('click', function () { showPhone(phoneIndex + 1); });
  phoneLabels.forEach(function (l, i) { l.addEventListener('click', function () { showPhone(i); }); });
  if (phones.length && !reduceMotion) setInterval(function () { showPhone(phoneIndex + 1); }, 3600);

  var heroScreens = [].slice.call(document.querySelectorAll('.hero-product-screen'));
  var heroTabs = [].slice.call(document.querySelectorAll('.hero-product-tabs button'));
  var heroBadge = document.querySelector('.hero-real-badge');
  var heroScreenIndex = 0;
  function showHeroScreen(n) {
    if (!heroScreens.length) return;
    heroScreenIndex = (n + heroScreens.length) % heroScreens.length;
    heroScreens.forEach(function (s, i) { s.classList.toggle('is-active', i === heroScreenIndex); });
    heroTabs.forEach(function (t, i) { t.classList.toggle('is-active', i === heroScreenIndex); });
    if (heroBadge) {
      heroBadge.querySelector('span').textContent = String(heroScreenIndex + 1).padStart(2, '0');
      var tab = heroTabs[heroScreenIndex];
      var label = tab ? (tab.getAttribute('data-badge') || tab.textContent) : '';
      heroBadge.querySelector('b').textContent = label;
    }
  }
  heroTabs.forEach(function (t, i) { t.addEventListener('click', function () { showHeroScreen(i); }); });
  if (heroScreens.length && !reduceMotion) setInterval(function () { showHeroScreen(heroScreenIndex + 1); }, 4800);

  var heroPhones = [].slice.call(document.querySelectorAll('.hero-phone-screen'));
  var heroPhoneIndex = 0;
  function showHeroPhone(n) {
    if (!heroPhones.length) return;
    heroPhoneIndex = (n + heroPhones.length) % heroPhones.length;
    heroPhones.forEach(function (screen, i) {
      screen.classList.toggle('is-active', i === heroPhoneIndex);
    });
  }
  if (heroPhones.length && !reduceMotion) setInterval(function () { showHeroPhone(heroPhoneIndex + 1); }, 3400);

  if (!reduceMotion) {
    [].slice.call(document.querySelectorAll('.connectivity')).forEach(function (host) {
      var specs = [
        { size: 7, opacity: 0.95, ease: 0.012 },
        { size: 5, opacity: 0.62, ease: 0.028 },
        { size: 6, opacity: 0.8, ease: 0.018 }
      ];
      var balls = specs.map(function (spec, i) {
        var el = document.createElement('span');
        el.className = 'drift-ball';
        el.style.width = spec.size + 'px';
        el.style.height = spec.size + 'px';
        el.style.opacity = String(spec.opacity);
        host.appendChild(el);
        var dir = i === 1 ? -1 : 1;
        var speed = 0.05 + Math.random() * 0.08;
        return {
          el: el,
          size: spec.size,
          ease: spec.ease,
          lane: i,
          x: 0.12 + Math.random() * 0.7,
          vx: dir * speed,
          tx: dir * speed,
          next: 500 + Math.random() * 1800
        };
      });
      function laneY(h, lane) {
        var mid = h / 2;
        var y = mid + [-152, 0, 152][lane];
        if (y < 18 || y > h - 18) y = h * (0.22 + lane * 0.28);
        return y;
      }
      var last = 0;
      function frame(t) {
        var dt = last ? Math.min(0.05, (t - last) / 1000) : 0.016;
        last = t;
        var w = host.clientWidth || 1;
        var h = host.clientHeight || 1;
        balls.forEach(function (ball) {
          if (t > ball.next) {
            var dir = ball.vx < 0 ? -1 : 1;
            var burst = Math.random();
            var speed = burst > 0.62 ? 0.16 + Math.random() * 0.2 : 0.025 + Math.random() * 0.07;
            ball.tx = dir * speed;
            ball.next = t + 700 + Math.random() * 2600;
          }
          ball.vx += (ball.tx - ball.vx) * ball.ease;
          ball.x += ball.vx * dt;
          if (ball.x < 0.06) { ball.x = 0.06; ball.vx = Math.abs(ball.vx); ball.tx = Math.abs(ball.tx); }
          if (ball.x > 0.94) { ball.x = 0.94; ball.vx = -Math.abs(ball.vx); ball.tx = -Math.abs(ball.tx); }
          var y = laneY(h, ball.lane);
          ball.el.style.transform = 'translate3d(' + (ball.x * w - ball.size / 2) + 'px,' + (y - ball.size / 2) + 'px,0)';
        });
        requestAnimationFrame(frame);
      }
      requestAnimationFrame(frame);
    });
  }

  var reveal = [].slice.call(document.querySelectorAll('section, .feature'));
  if (reduceMotion || !('IntersectionObserver' in window)) {
    reveal.forEach(function (el) { el.classList.add('visible'); });
  } else {
    var observer = new IntersectionObserver(function (entries) {
      entries.forEach(function (entry) {
        if (entry.isIntersecting) entry.target.classList.add('visible');
      });
    }, { threshold: 0.12 });
    reveal.forEach(function (el) { observer.observe(el); });
  }
})();
