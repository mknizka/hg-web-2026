(() => {
 'use strict';
 const reduced=matchMedia('(prefers-reduced-motion: reduce)');
 function rotation(root,advance,delay){
  let paused=reduced.matches,visible=false,timer;
  const stop=()=>{clearInterval(timer);timer=null;};
  const sync=()=>{stop();if(!paused&&visible&&!document.hidden&&!root.matches(':hover')&&!root.contains(document.activeElement))timer=setInterval(advance,delay);};
  root.addEventListener('mouseenter',stop);root.addEventListener('mouseleave',sync);
  root.addEventListener('focusin',stop);root.addEventListener('focusout',()=>setTimeout(sync,0));
  document.addEventListener('visibilitychange',sync);reduced.addEventListener('change',e=>{paused=e.matches;sync();});
  new IntersectionObserver(entries=>{visible=entries[0].isIntersecting;sync();},{threshold:0.2}).observe(root);sync();
 }
 document.querySelectorAll('[data-solution-carousel]').forEach(root=>{
  const track=root.querySelector('.es-footer-track');
  const prev=root.querySelector('[data-solution-prev]'),next=root.querySelector('[data-solution-next]');
  const update=()=>{prev.disabled=track.scrollLeft<=2;next.disabled=track.scrollLeft+track.clientWidth>=track.scrollWidth-2;};
  const move=direction=>{const card=track.querySelector('.es-footer-card');track.scrollBy({left:direction*(card.getBoundingClientRect().width+16),behavior:reduced.matches?'instant':'smooth'});};
  prev.addEventListener('click',()=>move(-1));next.addEventListener('click',()=>move(1));
  track.addEventListener('scroll',update,{passive:true});
  track.addEventListener('keydown',e=>{if(e.target!==track)return;if(e.key==='ArrowLeft'||e.key==='ArrowRight'){e.preventDefault();move(e.key==='ArrowLeft'?-1:1);}});
  new ResizeObserver(update).observe(track);update();
  rotation(root,()=>{if(track.scrollLeft+track.clientWidth>=track.scrollWidth-4)track.scrollTo({left:0,behavior:'instant'});else move(1);},5000);
 });
 document.querySelectorAll('[data-quotes]').forEach(root=>{
  const slides=Array.from(root.querySelectorAll('[data-quote-slide]')),dots=Array.from(root.querySelectorAll('[data-quote-index]'));let index=0;
  const show=i=>{index=i;slides.forEach((slide,j)=>{slide.classList.toggle('is-active',i===j);slide.setAttribute('aria-hidden',String(i!==j));});dots.forEach((dot,j)=>dot.setAttribute('aria-pressed',String(i===j)));};
  dots.forEach((dot,i)=>dot.addEventListener('click',()=>show(i)));
  if(slides.length>1)rotation(root,()=>show((index+1)%slides.length),10000);
 });
})();
