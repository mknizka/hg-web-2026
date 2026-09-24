(() => {
  'use strict';
  const content = document.querySelector('.ed-article-content');
  const lead = document.querySelector('.ed-article .ed-lead');
  const firstParagraph = content && content.querySelector(':scope > p');
  if (lead && firstParagraph && lead.textContent.trim() === firstParagraph.textContent.trim()) firstParagraph.remove();
  const cta = document.querySelector('[data-editorial-cta]');
  if (content && cta) {
    const paragraphs = [...content.children].filter(el=>el.tagName==='P' && el.textContent.trim().length>100);
    // Move a single existing server-rendered CTA only between top-level paragraphs.
    if (paragraphs.length>=6) paragraphs[Math.floor(paragraphs.length/2)].after(cta);
  }
  document.querySelectorAll('.ed-article-content img,.ed-rich-content img').forEach(img=>{img.loading='lazy';img.decoding='async';});
})();
