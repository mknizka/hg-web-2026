(() => {
  'use strict';
  document.querySelectorAll('[data-logo-marquee]').forEach(windowEl => {
  const button = windowEl.parentElement.querySelector('[data-logo-pause]');
  if (!button) return;
  const en = document.documentElement.lang.startsWith('en');
  button.addEventListener('click', () => {
    const paused = windowEl.dataset.paused !== 'true';
    windowEl.dataset.paused = String(paused);
    button.setAttribute('aria-pressed', String(paused));
    button.textContent = paused ? (en ? 'Resume motion' : 'Spustiť pohyb') : (en ? 'Pause motion' : 'Pozastaviť pohyb');
  });
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
 const root=document.querySelector('.eh-module-tour');if(!root)return;
 const tabs=Array.from(root.querySelectorAll('[data-tour-target]'));
 const panels=Array.from(root.querySelectorAll('[data-tour-panel]'));
 const motion=root.querySelector('[data-tour-pause]');
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
 let index=0,manual=false,paused=reduced.matches,visible=false,timer;
 function stop(){clearInterval(timer);timer=null;}
 function sync(){stop();motion.setAttribute('aria-pressed',String(paused||manual));motion.textContent=manual?'Automatická prehliadka zastavená':paused?'Spustiť prehliadku':'Pozastaviť prehliadku';motion.disabled=manual;if(!manual&&!paused&&visible&&!document.hidden&&!root.matches(':hover')&&!root.contains(document.activeElement))timer=setInterval(()=>select(tabs[(index+1)%tabs.length].dataset.tourTarget,false),6500);}
 function select(id,user){
  const next=tabs.findIndex(t=>t.dataset.tourTarget===id);if(next<0)return;
  index=next;if(user)manual=true;
  tabs.forEach(t=>{const on=t.dataset.tourTarget===id;t.setAttribute('aria-selected',String(on));t.tabIndex=on?0:-1;});
  panels.forEach(p=>{p.hidden=p.id!==id;p.dataset.tourActive=String(p.id===id);});
  sync();
 }
 tabs.forEach((t,i)=>{
  t.addEventListener('click',()=>select(t.dataset.tourTarget,true));
  t.addEventListener('keydown',e=>{let next;if(e.key==='ArrowRight')next=(i+1)%tabs.length;if(e.key==='ArrowLeft')next=(i+tabs.length-1)%tabs.length;if(e.key==='Home')next=0;if(e.key==='End')next=tabs.length-1;if(next!==undefined){e.preventDefault();select(tabs[next].dataset.tourTarget,true);tabs[next].focus();}});
 });
 motion.addEventListener('click',()=>{paused=!paused;sync();});
 root.addEventListener('mouseenter',stop);root.addEventListener('mouseleave',sync);root.addEventListener('focusin',stop);root.addEventListener('focusout',()=>setTimeout(sync,0));
 document.addEventListener('visibilitychange',sync);reduced.addEventListener('change',e=>{paused=e.matches;sync();});
 new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;sync();},{threshold:0.2}).observe(root);
 const fromHash=()=>select(location.hash.slice(1),true);fromHash();window.addEventListener('hashchange',fromHash);
 // Keep legacy deep links useful inside the expandable original galleries.
 document.addEventListener('click',e=>{const a=e.target.closest('a[href]');if(!a)return;const url=new URL(a.href,location.href);if(url.origin!==location.origin||url.pathname!==location.pathname)return;select(url.hash.slice(1),true);const target=document.getElementById(url.hash.slice(1));if(target){const details=target.closest('.eh-original-screens');if(details)details.open=true;}});
 const initial=document.getElementById(location.hash.slice(1));if(initial){const details=initial.closest('.eh-original-screens');if(details)details.open=true;}
 sync();
})();

(() => {
 const root=document.querySelector('.eh-problems-carousel');if(!root)return;
 const panels=Array.from(root.querySelectorAll('[data-problem-panel]'));let index=0;
 function show(delta){index=(index+delta+panels.length)%panels.length;panels.forEach((p,i)=>p.hidden=i!==index);root.querySelector('[data-problem-page]').textContent=(index+1)+' / '+panels.length;}
 root.querySelector('[data-problem-prev]').addEventListener('click',()=>show(-1));root.querySelector('[data-problem-next]').addEventListener('click',()=>show(1));
})();
