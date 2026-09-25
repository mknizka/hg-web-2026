(function () {
  'use strict';
  var header = document.querySelector('header.nav');
  if (!header || header.dataset.navigationReady) return;
  header.dataset.navigationReady = 'true';
  var menu = header.querySelector('.menu');
  var nav = header.querySelector('nav');
  if (!menu || !nav) return;
  var body = document.body;
  var savedScroll = 0;
  var savedTop = '';
  var desktop = window.matchMedia('(min-width:1081px)');
  var english = document.documentElement.lang.indexOf('en') === 0;

  function closeGroups(except) {
    header.querySelectorAll('.nav-group.is-open').forEach(function (group) {
      if (group === except) return;
      group.classList.remove('is-open');
      var button = group.querySelector('.nav-parent');
      if (button) button.setAttribute('aria-expanded', 'false');
    });
  }

  function setNav(open, restoreFocus) {
    var wasOpen = nav.classList.contains('open');
    if (open === wasOpen) return;
    if (open) {
      savedScroll = window.scrollY || 0;
      savedTop = body.style.top;
      body.style.top = '-' + savedScroll + 'px';
    }
    nav.classList.toggle('open', open);
    body.classList.toggle('nav-open', open);
    menu.setAttribute('aria-expanded', open ? 'true' : 'false');
    menu.setAttribute('aria-label', english ? (open ? 'Close menu' : 'Open menu') : (open ? 'Zavrieť menu' : 'Otvoriť menu'));
    if (!open) {
      body.style.top = savedTop;
      window.scrollTo(0, savedScroll);
      closeGroups();
      if (restoreFocus) menu.focus();
    }
  }

  menu.addEventListener('click', function () {
    setNav(!nav.classList.contains('open'), false);
  });
  nav.querySelectorAll('a').forEach(function (link) {
    link.addEventListener('click', function () {
      setNav(false, false);
      closeGroups();
    });
  });
  nav.querySelectorAll('.nav-parent').forEach(function (button) {
    button.addEventListener('click', function () {
      var group = button.closest('.nav-group');
      if (!group) return;
      var open = !group.classList.contains('is-open');
      closeGroups(group);
      group.classList.toggle('is-open', open);
      button.setAttribute('aria-expanded', open ? 'true' : 'false');
    });
  });
  document.addEventListener('click', function (event) {
    if (!header.contains(event.target)) {
      closeGroups();
      setNav(false, false);
    }
  });
  document.addEventListener('keydown', function (event) {
    if (event.key !== 'Escape') return;
    var expanded = header.querySelector('.nav-parent[aria-expanded="true"]');
    closeGroups();
    if (nav.classList.contains('open')) setNav(false, true);
    else if (expanded) expanded.focus();
  });
  function viewportChanged() {
    if (desktop.matches) setNav(false, false);
    closeGroups();
  }
  if (desktop.addEventListener) desktop.addEventListener('change', viewportChanged);
  else desktop.addListener(viewportChanged);
})();
