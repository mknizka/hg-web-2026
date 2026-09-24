/* Keep CMS handlers and reaction identifiers intact when refreshed asynchronously. */
(() => {
 'use strict';
 const en=document.documentElement.lang.startsWith('en');
 const labels=new Map([['👍',en?'Like':'Páči sa mi'],['❤',en?'Inspiring':'Inšpiratívne'],['👏',en?'Agree':'Súhlasím'],['🤔',en?'Thought-provoking':'Na zamyslenie'],['😮',en?'Interesting':'Zaujímavé'],['💡',en?'Useful':'Užitočné'],['👀',en?'Views:':'Zobrazenia:']]);
 const selector='.emotion-emoji,.emotion-icon,.emotion-preview,.reaction-label';
 function clean(root){
  const nodes=[];
  if(root.nodeType===1 && root.matches(selector)) nodes.push(root);
  if(root.querySelectorAll) nodes.push(...root.querySelectorAll(selector));
  nodes.forEach(el=>{
   const walker=document.createTreeWalker(el,NodeFilter.SHOW_TEXT);let node;
   while((node=walker.nextNode())){
    let text=node.nodeValue;
    for(const [emoji,label] of labels) text=text.split(emoji+'\uFE0F').join(label).split(emoji).join(label);
    if(text!==node.nodeValue) node.nodeValue=text;
   }
  });
 }
 const paths={
  like:'M7 10v11H3V10h4Zm0 0 5-8c3 0 2 5 1 7h6a2 2 0 0 1 2 2l-2 8a2 2 0 0 1-2 2H7',
  love:'M20.8 4.6a5.5 5.5 0 0 0-7.8 0L12 5.7l-1.1-1.1a5.5 5.5 0 0 0-7.8 7.8L12 21l8.8-8.6a5.5 5.5 0 0 0 0-7.8Z',
  clap:'m5 12 4 4L19 6M3 6l1-2m7-1V1m8 16 2 1M6 21l-2 1',
  think:'M9 9a3 3 0 1 1 5 2c-2 1-2 2-2 3M12 18h.01M22 12a10 10 0 1 1-20 0 10 10 0 0 1 20 0Z',
  wow:'m12 2 3 6 7 1-5 5 1 8-6-4-6 4 1-8-5-5 7-1 3-6Z',
  useful:'M9 18h6M9 21h6M8 14a7 7 0 1 1 8 0l-1 2H9l-1-2Z'
 };
 function decorate(){document.querySelectorAll('.article-emotions .emotion-btn').forEach(button=>{
  const path=paths[button.dataset.emotion];
  if(!path||button.querySelector('.hg-reaction-svg'))return;
  const svg=document.createElementNS('http://www.w3.org/2000/svg','svg');
  svg.setAttribute('viewBox','0 0 24 24');svg.setAttribute('class','hg-reaction-svg');svg.setAttribute('aria-hidden','true');
  const shape=document.createElementNS('http://www.w3.org/2000/svg','path');shape.setAttribute('d',path);svg.append(shape);button.prepend(svg);
 });}
 clean(document);decorate();
 new MutationObserver(records=>records.forEach(record=>{
  if(record.type==='characterData') {const el=record.target.parentElement?.closest(selector);if(el) clean(el);}
  else {clean(record.target);record.addedNodes.forEach(clean);decorate();}
 })).observe(document.body,{childList:true,subtree:true,characterData:true});
})();
