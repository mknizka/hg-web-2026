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

// Original MCP screenshots share one stable presentation area.
(() => {
 const buttons = Array.from(document.querySelectorAll('[data-mcp-slide]'));
 const panels = Array.from(document.querySelectorAll('.er-mcp-gallery .er-mcp'));
 buttons.forEach((button, index) => button.addEventListener('click', () => {
  buttons.forEach((item, i) => item.setAttribute('aria-pressed', String(i === index)));
  panels.forEach((panel, i) => { panel.hidden = i !== index; });
 }));
})();

(() => {
 const tabs=Array.from(document.querySelectorAll('[data-tour-target]'));
 if(!tabs.length)return;
 const panels=Array.from(document.querySelectorAll('[data-tour-panel]'));
 function select(id){
  if(!tabs.some(t=>t.dataset.tourTarget===id))return;
  tabs.forEach(t=>{const on=t.dataset.tourTarget===id;t.setAttribute('aria-selected',String(on));t.tabIndex=on?0:-1;});
  panels.forEach(p=>{p.hidden=p.id!==id;p.dataset.tourActive=String(p.id===id);});
 }
 tabs.forEach((t,i)=>{
  t.addEventListener('click',()=>select(t.dataset.tourTarget));
  t.addEventListener('keydown',e=>{let next;if(e.key==='ArrowRight')next=(i+1)%tabs.length;if(e.key==='ArrowLeft')next=(i+tabs.length-1)%tabs.length;if(e.key==='Home')next=0;if(e.key==='End')next=tabs.length-1;if(next!==undefined){e.preventDefault();select(tabs[next].dataset.tourTarget);tabs[next].focus();}});
 });
 select(tabs[0].dataset.tourTarget);const fromHash=()=>select(location.hash.slice(1));fromHash();window.addEventListener('hashchange',fromHash);
 document.addEventListener('click',e=>{const a=e.target.closest('a[href]');if(!a)return;const url=new URL(a.href,location.href);if(url.origin===location.origin&&url.pathname===location.pathname)select(url.hash.slice(1));});
})();

(() => {
 const root=document.querySelector('.eh-problems-carousel');if(!root)return;
 const panels=Array.from(root.querySelectorAll('[data-problem-panel]'));let index=0;
 function show(delta){index=(index+delta+panels.length)%panels.length;panels.forEach((p,i)=>p.hidden=i!==index);root.querySelector('[data-problem-page]').textContent=(index+1)+' / '+panels.length;}
 root.querySelector('[data-problem-prev]').addEventListener('click',()=>show(-1));root.querySelector('[data-problem-next]').addEventListener('click',()=>show(1));
})();
