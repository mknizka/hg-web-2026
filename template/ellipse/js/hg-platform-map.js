(() => {
 'use strict';
 const root=document.querySelector('.ep-map'); if(!root)return;
 const network=root.querySelector('.ep-network'), core=root.querySelector('.ep-core'), svg=root.querySelector('svg'), detail=root.querySelector('.ep-description');
 const tiles=[...root.querySelectorAll('.ep-tile')];
 const hotel=['pms','booking','channel','pay','self','crm','team','pos','reviews','messages','vouchers','aqua'];
 const sets={hotel,komplex:hotel,gastro:['pos','pay','crm','vouchers','tables'],wellness:['booking','channel','pay','pos','crm','vouchers']};
 let sector='komplex', active=null, frame;
 const original=new Map(tiles.map(t=>[t.dataset.module,t.dataset.description]));
 function describe(tile){
  active=tile;
  tiles.forEach(t=>t.setAttribute('aria-expanded',String(t===tile)));
  detail.querySelector('strong').textContent=tile?tile.textContent:'';
  detail.querySelector('p').textContent=tile?tile.dataset.description:'Všetko v jednej platforme bez prepájania systémov.';
  const a=detail.querySelector('a');a.hidden=!tile;if(tile)a.href=tile.dataset.link;
  svg.querySelectorAll('path').forEach(p=>p.classList.toggle('is-active',!!tile&&p.dataset.module===tile.dataset.module));
 }
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
 function update(key){sector=sets[key]?key:'komplex';describe(null);tiles.forEach(t=>{const i=sets[sector].indexOf(t.dataset.module);t.hidden=i<0;t.style.setProperty('--ep-delay',`${Math.max(0,i)*35}ms`);t.dataset.description=original.get(t.dataset.module);});
  if(sector==='wellness'){
   tiles.find(t=>t.dataset.module==='booking').dataset.description='Online rezervácie wellness procedúr a služieb.';
   tiles.find(t=>t.dataset.module==='channel').dataset.description='Prepojenie a synchronizácia kalendárov.';
   tiles.find(t=>t.dataset.module==='pos').dataset.description='3 v 1: eKasa, platobný terminál a tlač v jednom zariadení.';
  }
  network.style.gridTemplateRows=matchMedia('(max-width:600px)').matches?'auto':`repeat(${Math.ceil(sets[sector].length/2)},52px)`;
  requestAnimationFrame(draw);
 }
 tiles.forEach(t=>{t.addEventListener('pointerenter',e=>{if(e.pointerType==='mouse')describe(t)});t.addEventListener('focus',()=>describe(t));t.addEventListener('click',()=>describe(t));});
 root.addEventListener('keydown',e=>{if(e.key==='Escape')describe(null)});
 window.addEventListener('ellipse:audience',e=>update(e.detail));
 new ResizeObserver(()=>{cancelAnimationFrame(frame);frame=requestAnimationFrame(()=>{network.style.gridTemplateRows=matchMedia('(max-width:600px)').matches?'auto':`repeat(${Math.ceil(sets[sector].length/2)},52px)`;draw()})}).observe(network);
 update(document.documentElement.dataset.audience);document.fonts?.ready.then(draw);
})();
