// Mobile menu
const menuBtn=document.getElementById('menuBtn'),nav=document.getElementById('nav');
if(menuBtn)menuBtn.addEventListener('click',()=>nav.classList.toggle('open'));
document.querySelectorAll('.nav a').forEach(a=>a.addEventListener('click',()=>nav.classList.remove('open')));

// Scroll reveal
const io=new IntersectionObserver(es=>es.forEach(e=>{if(e.isIntersecting){e.target.classList.add('visible');io.unobserve(e.target)}}),{threshold:.12});
document.querySelectorAll('.reveal').forEach(el=>io.observe(el));

// Animated counters
const cio=new IntersectionObserver(es=>es.forEach(e=>{
  if(!e.isIntersecting)return;const el=e.target,target=+el.dataset.target;let cur=0;
  const step=Math.max(1,Math.ceil(target/60));
  const t=setInterval(()=>{cur+=step;if(cur>=target){cur=target;clearInterval(t)}el.textContent=cur},25);
  cio.unobserve(el);
}),{threshold:.5});
document.querySelectorAll('.counter').forEach(el=>cio.observe(el));

// Testimonial slider (auto + dots)
const slides=document.querySelectorAll('.slide'),dotsWrap=document.getElementById('dots');let idx=0,timer;
slides.forEach((_,i)=>{const d=document.createElement('button');d.setAttribute('aria-label','Slide '+(i+1));if(i===0)d.classList.add('active');d.onclick=()=>show(i,true);dotsWrap&&dotsWrap.appendChild(d)});
function show(i,manual){slides[idx].classList.remove('active');dotsWrap.children[idx].classList.remove('active');idx=i;slides[idx].classList.add('active');dotsWrap.children[idx].classList.add('active');if(manual){clearInterval(timer);start()}}
function start(){timer=setInterval(()=>show((idx+1)%slides.length),4000)} if(slides.length)start();

// Portfolio filters
document.querySelectorAll('.filter-btn').forEach(btn=>btn.addEventListener('click',()=>{
  document.querySelectorAll('.filter-btn').forEach(b=>b.classList.remove('active'));
  btn.classList.add('active');
  const f=btn.dataset.filter;
  document.querySelectorAll('.project').forEach(card=>{
    const show=f==='all'||card.dataset.cat===f;
    card.classList.toggle('hide',!show);
    if(show){card.classList.add('visible')}
  });
}));

// FAQ accordion
document.querySelectorAll('.faq-q').forEach(q=>q.addEventListener('click',()=>{
  const item=q.parentElement,wasOpen=item.classList.contains('open');
  document.querySelectorAll('.faq-item').forEach(i=>{i.classList.remove('open');i.querySelector('.faq-q span').textContent='+'});
  if(!wasOpen){item.classList.add('open');q.querySelector('span').textContent='−'}
}));

// Back to top
const topBtn=document.getElementById('topBtn');
window.addEventListener('scroll',()=>{topBtn.style.display=window.scrollY>500?'block':'none'});
topBtn.addEventListener('click',()=>window.scrollTo({top:0,behavior:'smooth'}));
