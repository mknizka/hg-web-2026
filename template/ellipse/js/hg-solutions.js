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
  const texts=slides.map(slide=>{
   const text=slide.querySelector('.eq-text');
   if(!text)return null;
   const fragment=document.createDocumentFragment(),words=[];
   text.textContent.split(/(\s+)/).forEach(part=>{
    if(!part)return;
    if(/^\s+$/.test(part)){fragment.append(document.createTextNode(part));return;}
    const word=document.createElement('span');word.className='eq-word';word.textContent=part;words.push(word);fragment.append(word);
   });
   text.replaceChildren(fragment);text.classList.add('eq-reveal');return {text,words};
  });
  const pin=root.querySelector('.eq-pin');
  let pinTop=0,distance=700,progress=0,lastY=window.scrollY,held=false,heldY=0,correctionY=null;
  const scroller=document.documentElement;
  let savedOverflow=null;
  // Keep the scrollbar's space while locking native wheel/touch movement.
  scroller.style.scrollbarGutter='stable';
  const lock=()=>{
   if(savedOverflow!==null)return;
   savedOverflow={value:scroller.style.getPropertyValue('overflow'),priority:scroller.style.getPropertyPriority('overflow')};
   scroller.style.setProperty('overflow','hidden','important');
  };
  const unlock=()=>{
   if(savedOverflow===null)return;
   if(savedOverflow.value)scroller.style.setProperty('overflow',savedOverflow.value,savedOverflow.priority);
   else scroller.style.removeProperty('overflow');
   savedOverflow=null;
  };
  window.addEventListener('pagehide',unlock);
  const clamp=value=>Math.max(0,Math.min(1,value));
  const paint=()=>{
   const entry=texts[index];if(!entry)return;
   entry.words.forEach((word,i)=>word.style.setProperty('--eq-fill',`${clamp((reduced.matches?1:progress)*entry.words.length-i)*100}%`));
  };
  const measure=()=>{
   root.classList.remove('eq-sticky');
   pinTop=Math.max(84,(window.innerHeight-pin.offsetHeight)/2);
   distance=Math.max(500,window.innerHeight*.8);
   if(reduced.matches){progress=1;held=false;unlock();}
   paint();
  };
  // Consume a bounded reading gesture at the natural section position.
  // No spacer: neighbouring sections remain adjacent and stationary.
  const consume=(delta,event)=>{
   if(reduced.matches||!event.cancelable||!delta)return;
   if(event.target.closest('input,textarea,select,[contenteditable="true"],dialog,[aria-modal="true"],#site-nav'))return;
   const target=held?heldY:Math.round(window.scrollY+root.getBoundingClientRect().top-pinTop);
   const offset=target-window.scrollY;
   const forward=delta>0;
   if((forward&&progress>=1)||(!forward&&progress<=0))return;
   if(!held && Math.abs(offset)>2 && !(forward&&offset>0&&offset<=delta) && !(!forward&&offset<0&&offset>=delta))return;
   event.preventDefault();
   if(!held){held=true;heldY=target;lock();}
   if(Math.abs(offset)>1){lastY=heldY;correctionY=heldY;window.scrollTo({top:heldY,behavior:'instant'});}
   progress=clamp(progress+(delta-offset)/distance);
   if(progress===0||progress===1){held=false;unlock();}
   paint();
  };
  window.addEventListener('wheel',event=>{
   if(event.ctrlKey||Math.abs(event.deltaX)>Math.abs(event.deltaY))return;
   consume(event.deltaY*(event.deltaMode===1?16:event.deltaMode===2?innerHeight:1),event);
  },{passive:false});
  let touchY=null;
  window.addEventListener('touchstart',event=>{touchY=event.touches.length===1?event.touches[0].clientY:null;},{passive:true});
  window.addEventListener('touchmove',event=>{
   if(touchY===null||event.touches.length!==1)return;
   const next=event.touches[0].clientY,delta=touchY-next;touchY=next;consume(delta,event);
  },{passive:false});
  window.addEventListener('touchend',()=>{touchY=null;},{passive:true});
  window.addEventListener('keydown',event=>{
   if(event.key==='Escape'||event.key==='End'){held=false;unlock();progress=1;paint();return;}
   if(event.target.closest('a,button,input,textarea,select,[contenteditable="true"]'))return;
   const delta={ArrowDown:60,ArrowUp:-60,PageDown:innerHeight*.7,PageUp:-innerHeight*.7,' ':innerHeight*.7}[event.key];
   if(delta)consume(event.shiftKey?-delta:delta,event);
  });
  // Touch inertia and browser-native scrolling can cross the threshold without
  // a cancellable wheel/touch event. Keep the same reading state in that path.
  window.addEventListener('scroll',()=>{
   const y=window.scrollY;
   if(reduced.matches){lastY=y;progress=1;held=false;unlock();paint();return;}
   // Ignore our own rounded scroll correction; it is not reverse user input.
   if(correctionY!==null&&Math.abs(y-correctionY)<=2){lastY=y;correctionY=null;return;}
   const anchor=held?heldY:Math.round(y+root.getBoundingClientRect().top-pinTop);
   const delta=y-lastY;
   const crossingDown=delta>0 && lastY<=anchor+2 && y>anchor+1 && progress<1;
   const crossingUp=delta<0 && lastY>=anchor-2 && y<anchor-1 && progress>0;
   if((held&&Math.abs(y-anchor)>2)||crossingDown||crossingUp){
    const consumed=held?y-anchor:crossingDown?y-Math.max(lastY,anchor):y-Math.min(lastY,anchor);
    heldY=anchor;held=true;lock();
    progress=clamp(progress+Math.max(-120,Math.min(120,consumed))/distance);
    lastY=anchor;correctionY=anchor;
    window.scrollTo({top:anchor,behavior:'instant'});
    if(progress===0||progress===1){held=false;unlock();}
   }else{
    lastY=y;
    // Hysteresis: subpixel rounding or viewport changes cannot reset the reveal.
    if(!held&&y<anchor-48)progress=0;
   }
   paint();
  },{passive:true});
  window.addEventListener('resize',measure);reduced.addEventListener('change',measure);
  if(document.fonts)document.fonts.ready.then(measure);
  if(pin)new ResizeObserver(measure).observe(pin);
  const show=i=>{index=i;slides.forEach((slide,j)=>{slide.classList.toggle('is-active',i===j);slide.setAttribute('aria-hidden',String(i!==j));});dots.forEach((dot,j)=>dot.setAttribute('aria-pressed',String(i===j)));paint();};
  dots.forEach((dot,i)=>dot.addEventListener('click',()=>show(i)));
  const order=slides.map((_,i)=>i);
  for(let i=order.length-1;i>0;i--){const j=Math.floor(Math.random()*(i+1));[order[i],order[j]]=[order[j],order[i]];}
  // Avoid repeating the opening quote on consecutive page loads in this tab.
  try{
   const key='ellipse-last-opening-quote',previous=sessionStorage.getItem(key);
   const identity=i=>slides[i].querySelector('figcaption')?.textContent.trim()||String(i);
   if(order.length>1&&identity(order[0])===previous)[order[0],order[1]]=[order[1],order[0]];
   if(order.length)sessionStorage.setItem(key,identity(order[0]));
  }catch{/* Storage may be unavailable; the shuffled order still works. */}
  measure();show(order[0]||0);
  // Never replace the quote midway through its pinned reading sequence.
  if(slides.length>1)rotation(root,()=>{if(progress>=1)show(order[(order.indexOf(index)+1)%order.length]);},10000);
 });
})();
