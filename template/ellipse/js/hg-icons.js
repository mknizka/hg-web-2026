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
 clean(document);
 new MutationObserver(records=>records.forEach(record=>{
  if(record.type==='characterData') {const el=record.target.parentElement?.closest(selector);if(el) clean(el);}
  else {clean(record.target);record.addedNodes.forEach(clean);}
 })).observe(document.body,{childList:true,subtree:true,characterData:true});
})();
