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
 const track=root.querySelector('.eh-module-track'),panels=Array.from(track.children);
 const count=root.querySelector('[data-module-count]');
 const reduced=window.matchMedia('(prefers-reduced-motion: reduce)');
 let index=0,manual=false,paused=reduced.matches,visible=false,timer;
 function stop(){clearInterval(timer);timer=null;}
 function sync(){stop();if(!manual&&!paused&&visible&&!document.hidden&&!root.matches(':hover')&&!root.contains(document.activeElement))timer=setInterval(()=>move(1,false),6000);}
 function select(id,user){const next=panels.findIndex(p=>p.id===id);if(next<0)return;index=next;if(user)manual=true;track.scrollTo({left:panels[index].offsetLeft-panels[0].offsetLeft,behavior:reduced.matches?'instant':'smooth'});sync();}
 function move(delta,user){select(panels[(index+delta+panels.length)%panels.length].id,user);}
 root.querySelector('[data-module-prev]').addEventListener('click',()=>move(-1,true));
 root.querySelector('[data-module-next]').addEventListener('click',()=>move(1,true));
 track.addEventListener('scroll',()=>{index=panels.reduce((best,p,i)=>Math.abs(p.offsetLeft-panels[0].offsetLeft-track.scrollLeft)<Math.abs(panels[best].offsetLeft-panels[0].offsetLeft-track.scrollLeft)?i:best,0);count.textContent=String(index+1).padStart(2,'0')+' / '+panels.length;},{passive:true});
 track.addEventListener('pointerdown',()=>{manual=true;sync();});
 track.addEventListener('wheel',()=>{manual=true;sync();},{passive:true});
 track.addEventListener('keydown',e=>{if(e.target!==track)return;if(e.key==='ArrowRight'||e.key==='ArrowLeft'){e.preventDefault();move(e.key==='ArrowRight'?1:-1,true);}});
 track.addEventListener('focusin',e=>{const card=e.target.closest('.eh-module-panel');if(card)select(card.id,true);});
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
 root.querySelector('[data-problem-prev]').addEventListener('click',()=>show(-1));root.querySelector('[data-problem-next]').addEventListener('click',()=>show(1));show(0);
})();

// Count the existing RS statistics once, preserving labels and final values.
(() => {
 const reduced=matchMedia('(prefers-reduced-motion: reduce)');
 const observer=new IntersectionObserver(entries=>entries.forEach(entry=>{
  if(!entry.isIntersecting)return;observer.unobserve(entry.target);
  const el=entry.target,original=el.textContent,match=original.match(/[0-9][0-9\s\u00a0]*/);
  if(!match||reduced.matches)return;
  const target=Number(match[0].replace(/\s/g,''));if(!Number.isFinite(target))return;
  const prefix=original.slice(0,match.index),suffix=original.slice(match.index+match[0].length);
  el.setAttribute('aria-label',original);const value=document.createElement('span');value.setAttribute('aria-hidden','true');el.replaceChildren(value);
  let start;const tick=time=>{if(start===undefined)start=time;const progress=Math.min((time-start)/1600,1);value.textContent=prefix+Math.round(target*(1-Math.pow(1-progress,3))).toLocaleString('sk-SK')+suffix;if(progress<1)requestAnimationFrame(tick);else value.textContent=original;};requestAnimationFrame(tick);
 }),{threshold:0.6});document.querySelectorAll('[data-count-up]').forEach(el=>observer.observe(el));
})();
