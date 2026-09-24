(() => {
  'use strict';
  const content = document.querySelector('.ed-article-content');
  const cta = document.querySelector('[data-editorial-cta]');
  if (content && cta) {
    const paragraphs = [...content.children].filter(el=>el.tagName==='P' && el.textContent.trim().length>100);
    // Move a single existing server-rendered CTA only between top-level paragraphs.
    if (paragraphs.length>=6) paragraphs[Math.floor(paragraphs.length/2)].after(cta);
  }
  document.querySelectorAll('.ed-article-content img,.ed-rich-content img').forEach(img=>{img.loading='lazy';img.decoding='async';});
})();
