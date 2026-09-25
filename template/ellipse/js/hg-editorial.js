(() => {
  'use strict';
  const content = document.querySelector('.ed-article-content');
  const cta = document.querySelector('[data-editorial-cta]');
  if (content && cta) {
    const paragraphs = [...content.children].filter(el => el.tagName === 'P' && el.textContent.trim().length > 100);
    if (paragraphs.length >= 6) paragraphs[Math.floor(paragraphs.length / 2)].after(cta);
  }
  document.querySelectorAll('.ed-article-content img,.ed-rich-content img').forEach(img => {img.loading='lazy';img.decoding='async';});
  // Retain original markup, links, editor classes and inline styles; just give wide tables a viewport.
  document.querySelectorAll('.ed-article-content table').forEach(table => {
    if (table.closest('.eb-table-scroll') || table.parentElement.closest('table')) return;
    const wrapper = document.createElement('div'); wrapper.className='eb-table-scroll';
    wrapper.tabIndex=0; wrapper.setAttribute('role','region');
    wrapper.setAttribute('aria-label', document.documentElement.lang.startsWith('en') ? 'Article table, scroll horizontally' : 'Tabuľka v článku, posúvajte vodorovne');
    table.before(wrapper); wrapper.append(table);
  });
  document.querySelectorAll('img[data-rs-fallback]').forEach(img => {
    let fallback=false;
    const recover=()=>{
      if (!fallback && img.dataset.rsFallback && img.src !== new URL(img.dataset.rsFallback,location.href).href) {
        fallback=true; img.src=img.dataset.rsFallback; return;
      }
      // Keep the article usable even when a legacy cover is no longer available.
      img.hidden=true;
      const figure=img.closest('.ed-article-cover'); if(figure)figure.hidden=true;
    };
    img.addEventListener('error',recover);
    if(img.complete && !img.naturalWidth)recover();
  });
})();
