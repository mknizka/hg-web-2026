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

// Keep sidebar statistics quiet: real view and like counts, icon plus number.
(() => {
 document.querySelectorAll('.ed-article .top-article-item').forEach(item=>{
  const meta=item.querySelector('.article-meta');if(!meta)return;
  const views=item.querySelector('.meta-item.views')?.textContent.match(/[\d]+/g)?.join('')||'0';
  const like=[...item.querySelectorAll('.emotion-preview')].find(el=>/Páči sa mi|Like/i.test(el.textContent));
  const likes=like?.textContent.match(/\d+/)?.[0]||'0';
  const stat=(label,value,path)=>{const span=document.createElement('span');span.title=label;span.setAttribute('aria-label',label+': '+value);const svg=document.createElementNS('http://www.w3.org/2000/svg','svg');svg.setAttribute('viewBox','0 0 24 24');svg.setAttribute('aria-hidden','true');const shape=document.createElementNS(svg.namespaceURI,'path');shape.setAttribute('d',path);svg.append(shape);span.append(svg,document.createTextNode(value));return span;};
  meta.replaceChildren(stat('Zobrazenia',views,'M2 12s4-7 10-7 10 7 10 7-4 7-10 7S2 12 2 12Zm13 0a3 3 0 1 0-6 0 3 3 0 0 0 6 0'),stat('Páči sa mi',likes,'M7 10v11H3V10h4Zm0 0 5-8c3 0 2 5 1 7h6a2 2 0 0 1 2 2l-2 8a2 2 0 0 1-2 2H7'));
 });
})();
