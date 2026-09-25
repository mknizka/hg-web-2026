(() => {
 'use strict';
 document.querySelectorAll('[data-solution-carousel]').forEach(root=>{
  const track=root.querySelector('.es-footer-track');
  const prev=root.querySelector('[data-solution-prev]'),next=root.querySelector('[data-solution-next]');
  const reduced=matchMedia('(prefers-reduced-motion: reduce)');
  const update=()=>{prev.disabled=track.scrollLeft<=2;next.disabled=track.scrollLeft+track.clientWidth>=track.scrollWidth-2;};
  const move=direction=>track.scrollBy({left:direction*track.clientWidth*0.85,behavior:reduced.matches?'instant':'smooth'});
  prev.addEventListener('click',()=>move(-1));next.addEventListener('click',()=>move(1));
  track.addEventListener('scroll',update,{passive:true});
  track.addEventListener('keydown',e=>{if(e.target!==track)return;if(e.key==='ArrowLeft'||e.key==='ArrowRight'){e.preventDefault();move(e.key==='ArrowLeft'?-1:1);}});
  new ResizeObserver(update).observe(track);update();
 });
})();
