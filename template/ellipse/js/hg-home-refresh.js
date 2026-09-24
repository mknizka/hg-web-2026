(() => {
  'use strict';
  const windowEl = document.querySelector('[data-logo-marquee]');
  const button = document.querySelector('[data-logo-pause]');
  if (!windowEl || !button) return;
  const en = document.documentElement.lang.startsWith('en');
  button.addEventListener('click', () => {
    const paused = windowEl.dataset.paused !== 'true';
    windowEl.dataset.paused = String(paused);
    button.setAttribute('aria-pressed', String(paused));
    button.textContent = paused ? (en ? 'Resume motion' : 'Spustiť pohyb') : (en ? 'Pause motion' : 'Pozastaviť pohyb');
  });
})();
