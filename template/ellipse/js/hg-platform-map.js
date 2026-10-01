(() => {
 'use strict';
 const sectorButtons=[...document.querySelectorAll('[data-ep-sector]')];
 const valid=['hotel','gastro','wellness','komplex'];
 function chooseSector(key,persist){
  if(!valid.includes(key))key='komplex';
  document.documentElement.dataset.audience=key;
  sectorButtons.forEach(b=>b.setAttribute('aria-pressed',String(b.dataset.epSector===key)));
  if(persist){try{localStorage.setItem('ellipse-audience',key);}catch(_){}const url=new URL(location.href);url.searchParams.set('prevadzka',key);history.replaceState(null,'',url);}
  window.dispatchEvent(new CustomEvent('ellipse:audience',{detail:key}));
 }
 let stored;try{stored=localStorage.getItem('ellipse-audience');}catch(_){}
 const fromUrl=new URL(location.href).searchParams.get('prevadzka');
 const initial=valid.includes(fromUrl)?fromUrl:(document.documentElement.dataset.audience||stored);
 if(valid.includes(fromUrl)){try{localStorage.setItem('ellipse-audience',fromUrl);}catch(_){}}
 if(sectorButtons.length){chooseSector(initial,false);sectorButtons.forEach(b=>b.addEventListener('click',()=>chooseSector(b.dataset.epSector,true)));}
 document.querySelectorAll('.ep-map').forEach(root=>{
 if(root.dataset.epReady)return;root.dataset.epReady='true';
 const network=root.querySelector('.ep-network'), core=root.querySelector('.ep-core'), svg=root.querySelector('svg'), dialog=root.querySelector('.ep-dialog');
 const tiles=[...root.querySelectorAll('.ep-tile')];
 let sets={};
 try { sets=JSON.parse(root.dataset.sectors || '{}'); } catch (_) { sets={}; }
 // RS segments may reference unpublished or removed modules.
 const available=new Set(tiles.map(t=>t.dataset.module));
 Object.keys(sets).forEach(key=>{sets[key]=Array.isArray(sets[key])?[...new Set(sets[key])].filter(k=>available.has(k)):[];});
 if(!Array.isArray(sets.komplex))sets.komplex=[...available];
 let sector='komplex', active=null, frame;
 const original=new Map(tiles.map(t=>[t.dataset.module,t.dataset.description]));
 function describe(tile){
  active=tile;
  tiles.forEach(t=>t.setAttribute('aria-expanded',String(t===tile&&dialog.open)));
  svg.querySelectorAll('path').forEach(p=>p.classList.toggle('is-active',!!tile&&p.dataset.module===tile.dataset.module));
 }
 function openModule(tile){
  dialog.querySelector('h2').textContent=tile.textContent;
  dialog.querySelector('.ep-dialog-copy').textContent=tile.dataset.description;
  const url=new URL(tile.dataset.link,location.origin);url.searchParams.set('prevadzka',sector);
  dialog.querySelector('.ep-cta').href=url.pathname+url.search;
  dialog.showModal();describe(tile);
 }
 dialog.addEventListener('close',()=>{const trigger=active;describe(null);trigger?.focus({preventScroll:true});});
 dialog.addEventListener('click',e=>{if(e.target!==dialog)return;const r=dialog.getBoundingClientRect();if(e.clientX<r.left||e.clientX>r.right||e.clientY<r.top||e.clientY>r.bottom)dialog.close();});
 function draw(){
  const rect=network.getBoundingClientRect(), c=core.getBoundingClientRect();if(!rect.width)return;
  svg.setAttribute('viewBox',`0 0 ${rect.width} ${rect.height}`);svg.replaceChildren();
  const mobile=matchMedia('(max-width:600px)').matches;
  const selected=sets[sector];const split=Math.ceil(selected.length/2);
  selected.forEach((key,i)=>{const t=tiles.find(t=>t.dataset.module===key);t.style.gridColumn=mobile?String(i%2+1):(i<split?'1':'3');t.style.gridRow=mobile?String(Math.floor(i/2)+2):String(i%split+1);});
  selected.forEach(key=>{
   const t=tiles.find(t=>t.dataset.module===key), b=t.getBoundingClientRect(),left=b.left<c.left;
   const sx=mobile?c.left+c.width/2-rect.left:(left?c.left-rect.left:c.right-rect.left),sy=mobile?c.bottom-rect.top-12:c.top+c.height/2-rect.top;
   const ex=mobile?b.left+b.width/2-rect.left:(left?b.right-rect.left:b.left-rect.left),ey=mobile?b.top-rect.top:b.top+b.height/2-rect.top;
   const p=document.createElementNS('http://www.w3.org/2000/svg','path');
   p.setAttribute('d',mobile?`M ${sx} ${sy} V ${ey-8} Q ${sx} ${ey} ${ex} ${ey}`:`M ${sx} ${sy} C ${(sx+ex)/2} ${sy}, ${(sx+ex)/2} ${ey}, ${ex} ${ey}`);
   p.setAttribute('pathLength','1');p.dataset.module=key;if(active===t)p.classList.add('is-active');svg.append(p);
  });
 }
 function update(key){sector=Object.hasOwn(sets,key)?key:'komplex';if(!sets[sector]) return; if(dialog.open)dialog.close();describe(null);tiles.forEach(t=>{const i=sets[sector].indexOf(t.dataset.module);t.hidden=i<0;t.style.setProperty('--ep-delay',`${Math.max(0,i)*35}ms`);t.dataset.description=sector==='wellness' && t.dataset.wellness ? t.dataset.wellness : original.get(t.dataset.module);});
  network.style.gridTemplateRows=matchMedia('(max-width:600px)').matches?'auto':`repeat(${Math.ceil(sets[sector].length/2)},52px)`;
  requestAnimationFrame(draw);
 }
 tiles.forEach(t=>t.addEventListener('click',()=>openModule(t)));
 window.addEventListener('ellipse:audience',e=>update(e.detail));
 new ResizeObserver(()=>{cancelAnimationFrame(frame);frame=requestAnimationFrame(()=>{network.style.gridTemplateRows=matchMedia('(max-width:600px)').matches?'auto':`repeat(${Math.ceil(sets[sector].length/2)},52px)`;draw()})}).observe(network);
 let saved;try{saved=localStorage.getItem('ellipse-audience');}catch(_){}
 const requested=new URL(location.href).searchParams.get('prevadzka');
 update(Object.hasOwn(sets,requested)?requested:(document.documentElement.dataset.audience||saved));document.fonts?.ready.then(draw);
 });
})();
