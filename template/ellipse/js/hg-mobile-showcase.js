(() => {
  'use strict';
  const reduced = window.matchMedia('(prefers-reduced-motion: reduce)');
  document.querySelectorAll('.em-showcase').forEach(group => {
    const rail = group.querySelector('.em-rail');
    const prev = group.querySelector('[data-mobile-prev]');
    const next = group.querySelector('[data-mobile-next]');
    const sync = () => {prev.disabled = rail.scrollLeft < 2;next.disabled = rail.scrollLeft + rail.clientWidth >= rail.scrollWidth - 2;};
    const move = direction => rail.scrollBy({left:direction * (rail.querySelector('.em-shot').getBoundingClientRect().width + parseFloat(getComputedStyle(rail).gap)),behavior:reduced.matches?'instant':'smooth'});
    prev.addEventListener('click',()=>move(-1));next.addEventListener('click',()=>move(1));
    rail.addEventListener('scroll',sync,{passive:true});
    if ('ResizeObserver' in window) new ResizeObserver(sync).observe(rail);
    sync();
  });
  const dialog = document.createElement('dialog');dialog.className='em-zoom';
  const close = document.createElement('button');close.type='button';close.innerHTML='<svg class="hg-icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="20" height="20" fill="none" stroke="currentColor" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true" focusable="false"><path d="m6 6 12 12M18 6 6 18"/></svg>';close.setAttribute('aria-label',document.documentElement.lang.startsWith('en')?'Close preview':'Zavrieť náhľad');
  const image = document.createElement('img');dialog.append(close,image);document.body.append(dialog);
  close.addEventListener('click',()=>dialog.close());
  dialog.addEventListener('click',event=>{if(event.target===dialog)dialog.close();});
  document.querySelectorAll('[data-screen-open]').forEach(button=>button.addEventListener('click',()=>{const source=button.querySelector('img');image.src=source.src;image.alt=source.alt;dialog.setAttribute('aria-label',source.alt);dialog.showModal();}));
})();
