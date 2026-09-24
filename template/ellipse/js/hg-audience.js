/* Explicit visitor choice; no tracking or inferred profiling. */
(() => {
  'use strict';
  const bar = document.querySelector('.aud-bar');
  if (!bar) return;
  const en = bar.dataset.audienceLang === 'en';
  const t = (sk, english) => en ? english : sk;
  const profiles = {
    hotel: [t('Veľké zážitky. Jeden systém.', 'Great experiences. One system.'), t('Hotely, rezorty aj aquaparky. Pobyty, vstupy, predaj, platby a tím v jednej prepojenej prevádzke.', 'Hotels, resorts and waterparks. Stays, admission, sales, payments and your team in one connected operation.')],
    gastro: [t('Viac času pre hostí. Menej pre systém.', 'More time for guests. Less for your system.'), t('Ellipse POS, eKasa a platby v jednom celku. Od obsluhy pri stole až po prehľad o vašej prevádzke.', 'Ellipse POS, eKasa and payments together. From service at the table to an overview of your business.')],
    wellness: [t('Pokoj pre hostí. Prehľad pre vás.', 'Peace for guests. Clarity for you.'), t('Wellness, masáže a služby v prepojenej prevádzke. Vy sa venujete klientom, Ellipse spája rezervácie a platby.', 'Wellness, massages and services in a connected operation. Focus on your clients while Ellipse connects reservations and payments.')],
    komplex: [t('Celá prevádzka. Jeden systém.', 'Your whole operation. One system.'), t('Hotel, reštaurácia aj wellness. Rezervácie, tím, platby a dáta v jednej prepojenej platforme.', 'Hotel, restaurant and wellness. Reservations, team, payments and data in one connected platform.')]
  };
  const dialog = document.querySelector('.aud-dialog');
  const hero = document.querySelector('.os-hero');
  const visual = hero.querySelector('.os-hero-visual');
  const art = document.createElement('div');
  art.className = 'aud-art'; art.hidden = true;
  const photo = document.createElement('img');
  photo.src = '/template/ellipse/img/hg/sunmi-v3-ellipse-pos.webp';
  photo.alt = t('Terminál SUNMI s aplikáciou Ellipse POS', 'SUNMI terminal running Ellipse POS');
  photo.width = 1185; photo.height = 349;
  const caption = document.createElement('p');
  caption.textContent = t('Ellipse POS. Platby a prevádzka v jednom.', 'Ellipse POS. Payments and operations together.');
  art.append(photo, caption); hero.append(art);
  const focus = document.createElement('section');
  focus.className = 'aud-focus'; focus.hidden = true;
  const kicker = document.createElement('p'); kicker.className = 'os-kicker';
  const heading = document.createElement('h2');
  const features = document.createElement('ul'); features.className = 'aud-features';
  focus.append(kicker, heading, features);
  document.querySelector('.os-trust').after(focus);
  const hotelOnly = '#showcase,#revenue,#booking,#komunikacia,#selfcheckin,#recenzie,#ella,#mcp,#referencie,#segmenty,.ef-mobile-widgets';
  const ecoNodes = [...document.querySelectorAll('.os-eco .os-node:not(.os-core)')];
  const ecoOriginal = ecoNodes.map(node => [node.querySelector('b').textContent, node.querySelector('span').textContent]);
  const teamLead = document.querySelector('#team > .os-lead');
  const initialTeamLead = teamLead.textContent;
  const hiddenLinks = [];
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    const target = document.getElementById(a.hash.slice(1));
    if (target && target.matches(hotelOnly)) hiddenLinks.push([a, a.getAttribute('href')]);
  });
  function apply(key, persist) {
    if (!Object.hasOwn(profiles, key)) key = 'komplex';
    const specific = key === 'gastro' || key === 'wellness';
    hero.querySelector('h1').textContent = profiles[key][0];
    hero.querySelector('.os-lead').textContent = profiles[key][1];
    visual.hidden = specific; art.hidden = !specific; focus.hidden = !specific;
    document.querySelectorAll(hotelOnly).forEach(el => { el.hidden = specific; });
    // Prevent in-page navigation from landing in a hidden hotel section.
    hiddenLinks.forEach(([link, href]) => link.setAttribute('href', specific ? '#platforma' : href));
    teamLead.textContent = specific ? t('Úlohy, komunikácia a prehľad o prevádzke. Váš tím zostáva v spojení aj mimo pracovného počítača.', 'Tasks, communication and an operational overview. Keep your team connected away from the desk.') : initialTeamLead;
    ecoNodes.forEach((node, i) => {
      let copy = ecoOriginal[i];
      if (specific && i === 0) copy = key === 'gastro'
        ? ['Ellipse POS', t('Predaj, účty a obsluha vašich hostí.', 'Sales, bills and service for your guests.')]
        : [t('Služby + rezervácie', 'Services + reservations'), t('Wellness a služby v prepojenej prevádzke.', 'Wellness and services in a connected operation.')];
      if (specific && i === 1) copy = [t('Online predaj', 'Online sales'), t('Nákupy a darčekové poukazy prepojené s prevádzkou.', 'Purchases and gift vouchers connected with your operation.')];
      node.querySelector('b').textContent = copy[0]; node.querySelector('span').textContent = copy[1];
    });
    document.querySelectorAll('.os-int-cats li').forEach((li, i) => { li.hidden = specific && (i === 0 || i === 4); });
    const labels = [...bar.querySelectorAll('[data-audience]')];
    labels.forEach(b => b.setAttribute('aria-pressed', String(b.dataset.audience === key)));
    kicker.textContent = labels.find(b => b.dataset.audience === key).querySelector('span').firstChild.textContent;
    heading.textContent = key === 'gastro' ? t('Od objednávky po zaplatenie.', 'From order to payment.') : t('Prepojte služby aj platby.', 'Connect services and payments.');
    const rows = key === 'gastro' ? [
      [t('Ellipse POS', 'Ellipse POS'), t('Predaj a účty v jednom prostredí pre vašu gastro prevádzku.', 'Sales and bills in one place for your restaurant.')],
      [t('Platby pri stole', 'Payments at the table'), t('Platobný terminál alebo Tap to Pay na podporovanom mobile. Hosť zaplatí tam, kde mu to vyhovuje.', 'A payment terminal or Tap to Pay on a supported phone. Let guests pay where it suits them.')],
      [t('Prehľad bez prepisovania', 'Clarity without retyping'), t('Transakcie a prevádzkové dáta prepojené s vaším tímom.', 'Transactions and operational data connected with your team.')]
    ] : [
      [t('Wellness a služby', 'Wellness and services'), t('Prepojte wellness s ostatnými časťami prevádzky v ekosystéme Ellipse.', 'Connect wellness with the rest of your operation in the Ellipse ecosystem.')],
      [t('Pohodlné platby', 'Convenient payments'), t('Online platby aj POS terminály. Jeden prehľad o transakciách.', 'Online payments and POS terminals. One transaction overview.')],
      [t('Tím v spojení', 'A connected team'), t('Komunikácia a úlohy v mobilnej aplikácii Ellipse Team.', 'Communication and tasks in the Ellipse Team mobile app.')]
    ];
    features.replaceChildren(...rows.map(([title, body]) => {
      const li = document.createElement('li'), h = document.createElement('h3'), p = document.createElement('p');
      h.textContent = title; p.textContent = body; li.append(h, p); return li;
    }));
    bar.querySelector('.aud-status').textContent = t('Obsah pre: ', 'Content for: ') + kicker.textContent;
    document.documentElement.dataset.audience = key;
    if (persist) {
      try { localStorage.setItem('ellipse-audience', key); } catch (_) { /* Optional storage. */ }
      const url = new URL(location.href); url.searchParams.set('prevadzka', key);
      history.replaceState(null, '', url);
    }
    window.dispatchEvent(new Event('resize'));
  }
  let saved = null;
  try { saved = localStorage.getItem('ellipse-audience'); } catch (_) { /* Private browsing. */ }
  const requested = new URL(location.href).searchParams.get('prevadzka');
  const selected = Object.hasOwn(profiles, requested) ? requested : saved;
  bar.hidden = false;
  bar.querySelector('.aud-reopen').addEventListener('click', () => { if (typeof dialog.showModal === 'function') dialog.showModal(); });
  apply(selected, false);
  document.querySelectorAll('.aud-options [data-audience], .aud-choices [data-audience]').forEach(button => button.addEventListener('click', () => {
    apply(button.dataset.audience, true);
    if (dialog.open) { dialog.close(); bar.querySelector(`[data-audience="${button.dataset.audience}"]`).focus({preventScroll:true}); }
  }));
  dialog.addEventListener('close', () => {
    if (!selected) { try { if (!localStorage.getItem('ellipse-audience')) localStorage.setItem('ellipse-audience', 'komplex'); } catch (_) {} }
  });
  // Visitor can explore immediately; the visual selector remains available.
})();
