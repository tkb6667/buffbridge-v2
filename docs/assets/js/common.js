/* Static preview. No network requests, account storage or order processing. */
(() => {
  'use strict';
  const data = window.BB_DEMO;
  const page = document.body.dataset.page;
  const $ = (selector, parent = document) => parent.querySelector(selector);
  const $$ = (selector, parent = document) => [...parent.querySelectorAll(selector)];
  const esc = value => String(value).replace(/[&<>"']/g, char => ({'&':'&amp;','<':'&lt;','>':'&gt;','"':'&quot;',"'":'&#39;'}[char]));
  const price = value => '฿' + new Intl.NumberFormat('en-US', {minimumFractionDigits:2,maximumFractionDigits:2}).format(value);
  const categoryName = id => data.categories.find(c => c.id === id)?.name || id;
  const productUrl = p => './product-detail.html?id=' + p.id;
  const blogUrl = p => './blog-detail.html?id=' + p.id;
  const categoryUrl = c => c.id === 'buffbridge-custom' ? './products.html#buffbridge-custom' : './products.html?category=' + encodeURIComponent(c.id);
  const external = (url, text, cls = '') => `<a href="${esc(url)}" target="_blank" rel="noopener noreferrer" class="${cls}">${text}</a>`;
  const iconPaths = {
    search:'<circle cx="11" cy="11" r="7"/><path d="m20 20-4-4"/>',
    account:'<circle cx="12" cy="7" r="4"/><path d="M4 21v-3a8 8 0 0 1 16 0v3"/>',
    cart:'<path d="M2 3h3l3 12h11l3-9H6"/><circle cx="9" cy="20" r="1"/><circle cx="18" cy="20" r="1"/>',
    menu:'<path d="M3 6h18M3 12h18M3 18h18"/>',
    down:'<path d="m6 9 6 6 6-6"/>',
    location:'<path d="M12 21s7-6 7-12A7 7 0 0 0 5 9c0 6 7 12 7 12Z"/><circle cx="12" cy="9" r="2.5"/>',
    phone:'<path d="M5 4h4l2 5-2 2a15 15 0 0 0 4 4l2-2 5 2v4c0 1-1 2-2 2C10 21 3 14 3 6c0-1 1-2 2-2Z"/>',
    email:'<rect x="3" y="5" width="18" height="14" rx="1"/><path d="m4 7 8 6 8-6"/>',
    clock:'<circle cx="12" cy="12" r="9"/><path d="M12 7v5l3 2"/>',
    zoom:'<circle cx="10" cy="10" r="7"/><path d="m15 15 6 6M7 10h6M10 7v6"/>'
  };
  const icon = name => `<svg viewBox="0 0 24 24" aria-hidden="true">${iconPaths[name]}</svg>`;
  const brand = () => `<a class="brand" href="./index.html"><img src="./assets/images/BUFF_LOGO.png" alt="Buffbridge logo" width="64" height="64"><span><strong>BUFFBRIDGE</strong><small>CUSTOM CREW</small><span class="jp" lang="ja">エアガンの収集家です。</span></span></a>`;
  const nav = [ ['HOME','./index.html','index'],['BLOG','./blog.html','blog'],['PRODUCTS','./products.html','products'],['BUFFBRIDGE CUSTOM','./products.html#buffbridge-custom','custom'],['CONTACT US','./contact.html','contact'] ];
  const navLink = ([name,url,key]) => `<a href="${url}" class="nav-link ${page === key || (page === 'blog-detail' && key === 'blog') || (page === 'product-detail' && key === 'products') ? 'active' : ''}">${name}</a>`;
  $('#site-header').innerHTML = `<header class="header"><div class="shell header-inner">${brand()}<nav class="navigation" aria-label="Main navigation">${nav.map(n => n[2] === 'products' ? `<div class="nav-products">${navLink(n)}<button class="dropdown-toggle" aria-label="Toggle product categories" aria-expanded="false" aria-controls="product-dropdown">${icon('down')}</button><div class="dropdown" id="product-dropdown" hidden><a href="./products.html">ALL PRODUCTS →</a>${data.categories.map(c=>`<a href="${categoryUrl(c)}">${esc(c.name)}</a>`).join('')}</div></div>` : navLink(n)).join('')}</nav><div class="header-actions"><button class="icon-btn" data-open="search-dialog" aria-label="Search">${icon('search')}</button><button class="icon-btn" data-open="login-dialog" aria-label="Account">${icon('account')}</button><button class="icon-btn cart-button" data-demo="Your cart is a demo. Explore the collection to find your favourites." aria-label="Cart">${icon('cart')}</button><button class="icon-btn menu-toggle" aria-label="Toggle mobile menu" aria-expanded="false" aria-controls="mobile-menu">${icon('menu')}</button></div></div><nav id="mobile-menu" class="mobile-nav shell" aria-label="Mobile navigation" hidden>${nav.map(n=>`<a href="${n[1]}">${n[0]}</a>`).join('')}<button id="mobile-products-toggle" aria-expanded="false" aria-controls="mobile-categories">PRODUCT CATEGORIES +</button><div id="mobile-categories" class="mobile-categories" hidden>${data.categories.map(c=>`<a href="${categoryUrl(c)}">${esc(c.name)}</a>`).join('')}</div><button data-open="login-dialog">LOGIN / REGISTER</button></nav></header><div class="preview-strip">UI PREVIEW · SAMPLE CATALOGUE · NO LIVE ORDERS</div>`;

  const s = data.store;
  const contactItems = () => `<div class="contact-item">${icon('location')}<div><b>LOCATION</b><p><strong>${esc(s.name)}</strong><br>${esc(s.address)}<br>${esc(s.city)}</p>${external(s.maps,'OPEN GOOGLE MAPS →','map-link')}</div></div><div class="contact-item">${icon('phone')}<div><b>PHONE</b><p><a href="tel:+66902998211">${esc(s.phone)}</a></p></div></div><div class="contact-item">${icon('email')}<div><b>EMAIL</b><p><a href="mailto:${s.email}">${s.email}</a></p></div></div><div class="contact-item">${icon('clock')}<div><b>OPEN HOURS</b><p>${s.days}<br>${s.hours}</p></div></div>`;
  const socials = () => `<div class="socials">${external(s.facebook,'Facebook')}${external(s.line,'<img src="./assets/images/icons8-line.svg" alt=""> LINE')}</div>`;
  $('#site-footer').innerHTML = `<footer class="footer"><div class="shell footer-grid"><div>${brand()}<p class="footer-tagline">Selected gear for real players.</p>${socials()}</div><div><h3>QUICK LINKS</h3><nav class="footer-links" aria-label="Footer navigation">${[nav[0],nav[2],nav[1],nav[3],nav[4]].map(n=>`<a href="${n[1]}">${n[0]}</a>`).join('')}</nav></div><div><h3>CUSTOMER SERVICE</h3><div class="footer-links"><button data-open="login-dialog">LOGIN</button><button data-demo="Your cart is a demo. No items are purchased or reserved.">MY CART</button><button data-legal="terms">TERMS OF USE</button><button data-legal="privacy">PRIVACY POLICY</button></div></div><div><h3>CONTACT US</h3>${contactItems()}</div></div><div class="footer-bottom"><div class="shell"><span>© ${new Date().getFullYear()} <strong>BUFFBRIDGE CUSTOM CREW.</strong> ALL RIGHTS RESERVED.</span><span><a href="#terms" data-legal="terms">TERMS OF USE</a><a href="#privacy" data-legal="privacy">PRIVACY POLICY</a></span></div></div></footer>`;

  const closeButton = '<button class="close-dialog" data-close aria-label="Close dialog">×</button>';
  const google = '<div class="or">OR</div><button class="google-button" data-demo="Demo preview only: Google sign-in is not connected."><img src="./assets/images/google.png" alt="">CONTINUE WITH GOOGLE</button>';
  $('#overlays').innerHTML = `<dialog id="login-dialog" class="auth-modal" aria-labelledby="login-title">${closeButton}<span class="eyebrow">BUFFBRIDGE</span><h2 class="modal-title" id="login-title">LOGIN</h2><p class="modal-description">Login to your Buffbridge account</p><form data-demo-form="Demo preview only: no sign-in request was sent."><label class="field">EMAIL<input type="email" placeholder="Email address" autocomplete="email" required></label><label class="field">PASSWORD<input type="password" placeholder="Password" autocomplete="current-password" required></label><div class="login-options"><label class="checkbox"><input type="checkbox" checked>Remember me</label><button type="button" class="link-button" data-demo="Demo preview only: password recovery is not connected.">Forgot password?</button></div><button class="btn" type="submit">LOGIN</button><p class="form-feedback" role="status" hidden></p></form>${google}<button class="switch-bar" data-open="register-dialog">Don't have an account? <strong>REGISTER</strong></button></dialog>
  <dialog id="register-dialog" class="auth-modal" aria-labelledby="register-title">${closeButton}<span class="eyebrow">BUFFBRIDGE</span><h2 class="modal-title" id="register-title">REGISTER</h2><p class="modal-description">Create your Buffbridge account</p><form id="register-form" data-demo-form="Demo preview only: no account was created."><div class="form-row"><label class="field">USER NAME (LOGIN)<input type="text" placeholder="User name" autocomplete="username" required></label><label class="field">PASSWORD<input id="register-password" type="password" placeholder="Password" minlength="6" autocomplete="new-password" required></label></div><div class="form-row"><label class="field">E-MAIL<input type="email" placeholder="Email address" autocomplete="email" required></label><label class="field">CONFIRM PASSWORD<input id="register-confirm" type="password" placeholder="Confirm password" minlength="6" autocomplete="new-password" required></label></div><label class="checkbox"><input type="checkbox" required>I agree to the Terms &amp; Conditions</label><p class="small muted">Minimum 6 characters</p><button class="btn" type="submit">SIGN UP</button><p class="form-feedback" role="status" hidden></p></form>${google}<button class="switch-bar" data-open="login-dialog">Already have an account? <strong>LOGIN</strong></button></dialog>
  <dialog id="search-dialog" class="search-dialog" aria-labelledby="search-title">${closeButton}<span class="eyebrow">EXPLORE THE COLLECTION</span><h2 id="search-title">SEARCH</h2><label class="field">PRODUCT NAME, BRAND OR SKU<input id="global-search" type="search" placeholder="Try Buffbridge, gear or BB-DEMO-001" autocomplete="off" aria-controls="search-results"></label><p id="search-count" class="small muted" role="status"></p><div id="search-results" class="suggestions"></div></dialog>
  <dialog id="legal-dialog" class="legal-dialog" aria-labelledby="legal-title">${closeButton}<span class="eyebrow">PREVIEW INFORMATION</span><h2 id="legal-title"></h2><div id="legal-copy"></div></dialog>
  <dialog id="image-dialog" class="image-dialog" aria-label="Product image viewer">${closeButton}<div id="image-viewer-content"></div></dialog>`;

  let toastTimer;
  function notify(message) {
    const opened = $('dialog[open]');
    if (opened) {
      let feedback = $('.dialog-feedback', opened);
      if (!feedback) { feedback = document.createElement('p'); feedback.className='dialog-feedback form-feedback'; feedback.setAttribute('role','status'); opened.append(feedback); }
      feedback.textContent=message;
      return;
    }
    const toast = $('#toast');
    toast.textContent=message; toast.hidden=false;
    clearTimeout(toastTimer); toastTimer=setTimeout(()=>{toast.hidden=true;},4200);
  }
  function openDialog(id) {
    $$('dialog[open]').forEach(d=>d.close());
    closeMenu();
    $('#'+id).showModal();
    if(id === 'search-dialog') { renderSearch(); $('#global-search').focus(); }
  }
  $$('dialog').forEach(d=>d.addEventListener('click',e=>{
    const r=d.getBoundingClientRect();
    if(e.target===d && (e.clientX<r.left || e.clientX>r.right || e.clientY<r.top || e.clientY>r.bottom)) d.close();
  }));
  function toggle(button,target) {
    const open = target.hidden;
    target.hidden=!open; button.setAttribute('aria-expanded',String(open));
  }
  function closeMenu() {
    $('#mobile-menu').hidden=true;
    $('.menu-toggle').setAttribute('aria-expanded','false');
    $('#product-dropdown').hidden=true;
    $('.dropdown-toggle').setAttribute('aria-expanded','false');
  }
  $('.menu-toggle').addEventListener('click',()=>toggle($('.menu-toggle'),$('#mobile-menu')));
  $('.dropdown-toggle').addEventListener('click',()=>toggle($('.dropdown-toggle'),$('#product-dropdown')));
  $('#mobile-products-toggle').addEventListener('click',()=>toggle($('#mobile-products-toggle'),$('#mobile-categories')));
  document.addEventListener('keydown',e=>{if(e.key==='Escape') closeMenu();});
  document.addEventListener('click',e=>{
    if(!e.target.closest('.nav-products')) { $('#product-dropdown').hidden=true; $('.dropdown-toggle').setAttribute('aria-expanded','false'); }
    const opener=e.target.closest('[data-open]');
    if(opener) openDialog(opener.dataset.open);
    const closer=e.target.closest('[data-close]');
    if(closer) closer.closest('dialog').close();
    const demo=e.target.closest('[data-demo]');
    if(demo) { e.preventDefault(); notify(demo.dataset.demo); }
    const legal=e.target.closest('[data-legal]');
    if(legal) {
      e.preventDefault();
      const privacy=legal.dataset.legal==='privacy';
      $('#legal-title').textContent=privacy?'PRIVACY POLICY':'TERMS OF USE';
      $('#legal-copy').innerHTML=privacy ? '<p>This static preview does not send form entries to the store or save account information. Search and catalogue filters run only in this page.</p><p>External Facebook, LINE and Google Maps links open third-party services. Their own policies apply when you leave the preview.</p><p>This preview notice is not the live store privacy policy. Contact info@buffbridge.com for the current store policy.</p>' : '<p>This website is an interactive UI demonstration. Products, prices, stock, reviews and editorial content are samples. No orders, payments, reservations or account registrations are processed.</p><p>Contact BuffBridge Gallery for current availability and the terms applicable to an actual purchase. This notice describes the preview only.</p>';
      openDialog('legal-dialog');
    }
    if(e.target.closest('#mobile-menu a')) closeMenu();
  });
  document.addEventListener('submit',e=>{
    e.preventDefault();
    const form=e.target;
    if(form.id==='register-form' && $('#register-password').value!==$('#register-confirm').value) {
      $('#register-confirm').setCustomValidity('Passwords must match.'); $('#register-confirm').reportValidity(); return;
    }
    if(form.dataset.demoForm) {
      const feedback=$('.form-feedback',form);
      if(feedback) { feedback.textContent=form.dataset.demoForm; feedback.hidden=false; }
      else notify(form.dataset.demoForm);
    }
  });
  $('#register-confirm').addEventListener('input',()=>$('#register-confirm').setCustomValidity(''));
  $('#register-password').addEventListener('input',()=>$('#register-confirm').setCustomValidity(''));
  function renderSearch() {
    const term=$('#global-search').value.trim().toLowerCase();
    const results=data.products.filter(p=>[p.name,p.brand,p.sku,categoryName(p.category)].join(' ').toLowerCase().includes(term));
    $('#search-count').textContent=`${results.length} demo products${term?' found':' · start typing to filter'}`;
    $('#search-results').innerHTML=results.length ? results.map(p=>`<a class="suggestion" href="${productUrl(p)}"><img src="${p.image}" alt="${esc(p.name)}"><span><strong>${esc(p.name)}</strong><small>${esc(p.brand)}</small><b>${price(p.price)}</b></span></a>`).join('') : '<p class="empty">No matches. Try another name or brand.</p>';
  }
  $('#global-search').addEventListener('input',renderSearch);

  const badge = stock => `<span class="badge ${stock==='Out of Stock'?'out':stock==='Pre-Order'?'pre':''}">${esc(stock)}</span>`;
  const productCard = p => `<article class="product-card"><a href="${productUrl(p)}" class="product-photo" aria-label="View ${esc(p.name)}"><img src="${p.image}" alt="${esc(p.name)} — illustrative collection image" loading="lazy">${badge(p.stock)}</a><div class="product-copy"><span class="eyebrow">${esc(p.brand)}</span><a href="${productUrl(p)}"><h3>${esc(p.name)}</h3></a><span class="category">${esc(categoryName(p.category))}</span><a href="${productUrl(p)}" class="product-bottom"><span>${price(p.price)}</span><span aria-hidden="true">→</span></a></div></article>`;
  const productGrid = products => `<div class="product-grid">${products.map(productCard).join('')}</div>`;
  const sectionHead = (eyebrow,title,link='') => `<div class="section-head"><div><span class="eyebrow">${eyebrow}</span><h2>${title}</h2></div>${link}</div>`;
  const pageHero = (eyebrow,title,subtitle,cls='') => `<section class="page-hero ${cls}"><div class="shell"><span class="eyebrow">${eyebrow}</span><h1>${title}</h1><p>${subtitle}</p></div></section>`;
  const breadcrumb = (parent,url,current) => `<nav class="breadcrumb" aria-label="Breadcrumb"><div class="shell"><a href="./index.html">HOME</a> / <a href="${url}">${parent}</a> / <span>${esc(current)}</span></div></nav>`;
  const main=$('#main');
  function home() {
    main.innerHTML=`<section class="hero" aria-label="Gallery highlights" aria-roledescription="carousel"><div class="hero-slides">${data.heroes.map((im,i)=>`<div class="hero-slide ${i===0?'active':''}" aria-hidden="${i!==0}"><img src="${im}" alt="Buffbridge Custom Crew gallery ${i+1}" ${i===0?'fetchpriority="high"':''}></div>`).join('')}</div><div class="shell hero-copy"><h1>NEW<span>ARRIVALS</span></h1><div class="hero-line"></div><p>SELECTED GEAR<br>FOR REAL PLAYERS.</p><a href="./products.html" class="btn">VIEW ALL <span>→</span></a></div><div class="slider-controls"><button class="slide-arrow" id="slide-prev" aria-label="Previous slide">←</button>${data.heroes.map((_,i)=>`<button class="slide-dot ${i===0?'active':''}" data-slide="${i}" aria-label="Slide ${i+1}" aria-pressed="${i===0}"></button>`).join('')}<button class="slide-arrow" id="slide-next" aria-label="Next slide">→</button><button class="slider-pause" id="slider-pause" aria-label="Pause slideshow">Ⅱ</button></div></section><nav class="shell category-bar" aria-label="Shop categories"><a href="./products.html">ALL</a>${data.categories.map(c=>`<a href="${categoryUrl(c)}">${esc(c.name.toUpperCase())}</a>`).join('')}</nav><section class="shell section">${sectionHead('SELECTED GEAR','NEW ARRIVALS','<a class="text-link" href="./products.html">VIEW ALL →</a>')}${productGrid(data.products.slice(0,8))}<p class="demo-note">Demo catalogue · illustrative collection imagery, prices and availability.</p></section><section class="shell section">${sectionHead('FIND YOUR NEXT FAVOURITE','SHOP BY CATEGORY')}<div class="category-cards">${data.categories.map(c=>`<a class="category-card" href="${categoryUrl(c)}"><img src="${c.image}" alt="${esc(c.name)} collection" loading="lazy"><span>${esc(c.name.toUpperCase())} →</span></a>`).join('')}</div></section><section class="feature"><div class="shell"><span class="eyebrow">BUFFBRIDGE CUSTOM CREW</span><h2>MAKE THE COLLECTION<br>YOUR OWN.</h2><p>Discover the gallery selection, explore the details and find your next favourite. Visit BuffBridge Gallery to talk through your ideas with the team.</p><a class="btn" href="./products.html#buffbridge-custom">EXPLORE CUSTOM CREW →</a></div></section><div class="shell benefits"><div><h3>01 / SELECTED GEAR</h3><p>A considered collection, all in one place.</p></div><div><h3>02 / GALLERY EXPERIENCE</h3><p>Compare finishes and details in person.</p></div><div><h3>03 / TALK TO THE CREW</h3><p>Questions? <a class="text-link" href="./contact.html">GET IN TOUCH →</a></p></div></div>`;
    let current=0,paused=window.matchMedia('(prefers-reduced-motion: reduce)').matches;
    const show=i=>{current=(i+data.heroes.length)%data.heroes.length;$$('.hero-slide').forEach((el,n)=>{el.classList.toggle('active',n===current);el.setAttribute('aria-hidden',String(n!==current));});$$('.slide-dot').forEach((el,n)=>{el.classList.toggle('active',n===current);el.setAttribute('aria-pressed',String(n===current));});};
    const updatePause=()=>{$('#slider-pause').textContent=paused?'▶':'Ⅱ';$('#slider-pause').setAttribute('aria-label',paused?'Play slideshow':'Pause slideshow');};
    $('#slide-prev').onclick=()=>show(current-1);$('#slide-next').onclick=()=>show(current+1);
    $$('[data-slide]').forEach(b=>b.onclick=()=>show(Number(b.dataset.slide)));
    $('#slider-pause').onclick=()=>{paused=!paused;updatePause();};updatePause();
    setInterval(()=>{if(!paused && !document.hidden && !$('.hero').matches(':hover') && !$('.hero').contains(document.activeElement) && !$('dialog[open]')) show(current+1);},5500);
  }
  function products() {
    main.innerHTML=pageHero('BUFFBRIDGE CUSTOM CREW','SELECTED <span>GEAR.</span>','Explore airsoft, parts, accessories and the Buffbridge Custom collection.','shop-hero')+`<div class="shell section shop-layout"><aside class="filters" aria-label="Product filters"><h2>FILTER PRODUCTS</h2><div class="filter-group"><label class="field">SEARCH<input id="product-search" type="search" placeholder="Name, brand or SKU"></label></div><div class="filter-group"><label class="field">CATEGORY<select id="category-filter"><option value="">All categories</option>${data.categories.map(c=>`<option value="${c.id}">${esc(c.name)}</option>`).join('')}</select></label></div><div class="filter-group brand-group"><h3>BRANDS</h3><div class="brand-filter"><button class="active" data-brand="" aria-pressed="true">ALL</button>${data.brands.map(b=>`<button data-brand="${esc(b)}" aria-pressed="false">${esc(b)}</button>`).join('')}</div></div><button class="btn outline" id="reset-filters">RESET FILTERS ↺</button></aside><section class="shop-results" aria-label="Product results"><div class="shop-toolbar"><span id="product-count" role="status"></span><select id="product-sort" aria-label="Sort products"><option value="newest">NEWEST</option><option value="low">PRICE LOW – HIGH</option><option value="high">PRICE HIGH – LOW</option></select></div><div id="product-results"></div><p class="demo-note">Sample catalogue. Images illustrate collections; product names, prices and stock are for preview only.</p></section></div>`;
    let brandFilter='';
    const fromUrl=()=>{const cat=window.location.hash==='#buffbridge-custom'?'buffbridge-custom':new URLSearchParams(window.location.search).get('category')||'';$('#category-filter').value=data.categories.some(c=>c.id===cat)?cat:'';};
    const render=()=>{
      const term=$('#product-search').value.trim().toLowerCase(); const cat=$('#category-filter').value;
      const list=data.products.filter(p=>(!brandFilter||p.brand===brandFilter)&&(!cat||p.category===cat)&&[p.name,p.brand,p.sku,p.description].join(' ').toLowerCase().includes(term));
      const sort=$('#product-sort').value;
      list.sort((a,b)=>sort==='low'?a.price-b.price:sort==='high'?b.price-a.price:b.id-a.id);
      $('#product-count').textContent=`${list.length} OF ${data.products.length} DEMO PRODUCTS`;
      $('#product-results').innerHTML=list.length?productGrid(list):'<div class="empty"><h3>No matching products</h3><p>Try a different search or reset the filters.</p></div>';
    };
    $$('[data-brand]').forEach(b=>b.onclick=()=>{brandFilter=b.dataset.brand;$$('[data-brand]').forEach(el=>{el.classList.toggle('active',el===b);el.setAttribute('aria-pressed',String(el===b));});render();});
    $('#product-search').addEventListener('input',render);$('#category-filter').addEventListener('change',render);$('#product-sort').addEventListener('change',render);
    $('#reset-filters').onclick=()=>{brandFilter='';$('#product-search').value='';$('#category-filter').value='';$('#product-sort').value='newest';$$('[data-brand]').forEach(b=>{b.classList.toggle('active',b.dataset.brand==='');b.setAttribute('aria-pressed',String(b.dataset.brand===''));});render();};
    window.addEventListener('hashchange',()=>{fromUrl();render();});fromUrl();render();
  }
  function productDetail() {
    const id=new URLSearchParams(window.location.search).get('id');
    const p=data.products.find(p=>String(p.id)===id)||data.products[0];
    document.title=p.name+' | Buffbridge Custom Crew';
    main.innerHTML=breadcrumb('PRODUCTS','./products.html',p.name)+`<div class="shell"><section class="product-main"><div class="gallery"><button class="gallery-main" id="gallery-open" aria-label="Open product image viewer"><img id="main-product-image" src="${p.images[0]}" alt="${esc(p.name)} — illustrative collection image"><span class="zoom-icon">${icon('zoom')}</span></button><div class="thumbnails">${p.images.map((im,i)=>`<button class="thumbnail ${i===0?'active':''}" data-gallery="${i}" aria-label="View image ${i+1}" aria-pressed="${i===0}"><img src="${im}" alt="${i===0?'Collection view':'Gallery atmosphere'}"></button>`).join('')}</div><p class="demo-note">Illustrative local gallery images. Alternate image shows the gallery atmosphere.</p></div><div class="product-info"><span class="eyebrow">— PRODUCT DETAILS</span><h1>${esc(p.name)}</h1><p class="detail-price">${price(p.price)}</p><dl class="product-meta"><dt>SKU</dt><dd>${p.sku}</dd><dt>BRAND</dt><dd>${esc(p.brand)}</dd><dt>AVAILABILITY</dt><dd>${badge(p.stock)}</dd><dt>CATEGORY</dt><dd>${esc(categoryName(p.category))}</dd></dl><form class="buy-form" data-demo-form="Demo preview: item added to cart. No order or reservation was made.">${p.variants.length?`<label class="field">VARIANT<select aria-label="Product variant">${p.variants.map(v=>`<option>${esc(v)}</option>`).join('')}</select></label>`:''}<label class="field" for="quantity">QUANTITY</label><div class="buy-row"><input id="quantity" type="number" value="1" min="1" max="99" required aria-label="Quantity"><button type="submit" class="btn orange">ADD TO CART <span>→</span></button></div><p class="demo-note">Demo interaction only. Prices and availability are sample data.</p><p class="form-feedback" role="status" hidden></p></form></div></section><section class="section">${sectionHead('KNOW THE DETAILS','DESCRIPTION')}<div class="description-card"><div class="description-head"><span>PRODUCT INFORMATION</span><div class="font-controls"><button data-font="minus" aria-label="Decrease description font size">A−</button><button data-font="reset">Reset</button><button data-font="plus" aria-label="Increase description font size">A+</button></div></div><div class="description-text" id="description-text"><p>${esc(p.description)}</p><p>${esc(p.details)}</p></div></div></section><section class="section">${sectionHead('FROM THE COMMUNITY','REVIEWS · DEMO')}<div class="reviews-layout"><div class="reviews-list">${data.reviews.map(r=>`<article class="review"><strong>${esc(r.name)}</strong><div class="stars" aria-label="${r.rating} out of 5 stars">${'★'.repeat(r.rating)}${'☆'.repeat(5-r.rating)}</div><p>${esc(r.text)}</p></article>`).join('')}</div><form class="review-form" data-demo-form="Demo preview only: your review was not submitted."><h3>WRITE A REVIEW</h3><label class="field">RATING<select aria-label="Review rating"><option>5 — Excellent</option><option>4 — Good</option><option>3 — Average</option><option>2 — Fair</option><option>1 — Poor</option></select></label><label class="field">YOUR REVIEW<textarea rows="3" required placeholder="Share your thoughts..."></textarea></label><button class="btn orange" type="submit">SUBMIT REVIEW →</button><p class="form-feedback" role="status" hidden></p></form></div></section></div><section class="related section"><div class="shell">${sectionHead('KEEP EXPLORING','RELATED PRODUCTS')}${productGrid(data.products.filter(item=>item.id!==p.id).sort((a,b)=>Number(b.category===p.category)-Number(a.category===p.category)).slice(0,4))}</div></section>`;
    let selected=0,fontSize=16;
    $$('[data-gallery]').forEach(b=>b.onclick=()=>{selected=Number(b.dataset.gallery);$('#main-product-image').src=p.images[selected];$$('[data-gallery]').forEach(el=>{el.classList.toggle('active',el===b);el.setAttribute('aria-pressed',String(el===b));});});
    $('#gallery-open').onclick=()=>{$('#image-viewer-content').innerHTML=`<img src="${p.images[selected]}" alt="${esc(p.name)} enlarged collection view">`;openDialog('image-dialog');};
    $$('[data-font]').forEach(b=>b.onclick=()=>{fontSize=b.dataset.font==='reset'?16:Math.max(12,Math.min(24,fontSize+(b.dataset.font==='plus'?2:-2)));$('#description-text').style.fontSize=fontSize+'px';});
  }
  const date = p => new Date(p.date+'T12:00:00').toLocaleDateString('en-GB',{day:'2-digit',month:'short',year:'numeric'});
  const blogCard=p=>`<article class="blog-card"><a href="${blogUrl(p)}"><img src="${p.image}" alt="${esc(p.title)}" loading="lazy"></a><div class="blog-card-copy"><div class="post-meta">${esc(p.category.toUpperCase())} · ${date(p)}</div><h2><a href="${blogUrl(p)}">${esc(p.title)}</a></h2><p>${esc(p.excerpt)}</p><a class="text-link" href="${blogUrl(p)}">READ MORE →</a></div></article>`;
  function sidebar() {
    const cats=[...new Set(data.blogPosts.map(p=>p.category))];
    const recent=data.blogPosts.slice(0,3),popular=[...data.blogPosts].sort((a,b)=>b.views-a.views).slice(0,3);
    const rows=posts=>posts.map(p=>`<a class="recent" href="${blogUrl(p)}"><img src="${p.image}" alt="${esc(p.title)}" loading="lazy"><span><strong>${esc(p.title)}</strong><small>${date(p)}</small></span></a>`).join('');
    return `<aside class="blog-sidebar" aria-label="Blog sidebar"><section class="widget"><h2>CATEGORIES</h2><a class="blog-category" href="./blog.html">All articles <span>${data.blogPosts.length}</span></a>${cats.map(c=>`<a class="blog-category" href="./blog.html?category=${encodeURIComponent(c)}">${esc(c)}<span>${data.blogPosts.filter(p=>p.category===c).length}</span></a>`).join('')}</section><section class="widget"><h2>RECENT POSTS</h2>${rows(recent)}</section><section class="widget"><h2>POPULAR POSTS</h2>${rows(popular)}</section></aside>`;
  }
  function blog() {
    const category=new URLSearchParams(window.location.search).get('category');
    const filtered=data.blogPosts.filter(p=>!category||p.category===category);
    main.innerHTML=pageHero('THE BUFFBRIDGE JOURNAL','ALL ARTICLES','Stories from the gallery, collection notes and inspiration from Custom Crew.','blog-hero')+`<div class="shell section blog-layout">${sidebar()}<section aria-label="Blog posts">${category?`<p class="small muted">CATEGORY: ${esc(category)} · <a class="text-link" href="./blog.html">SHOW ALL</a></p>`:''}<div class="blog-grid">${filtered.length?filtered.map(blogCard).join(''):'<div class="empty">No articles in this category. <a href="./blog.html">View all articles →</a></div>'}</div><p class="demo-note">Sample editorial content for the UI preview.</p></section></div>`;
  }
  function blogDetail() {
    const id=new URLSearchParams(window.location.search).get('id');
    const p=data.blogPosts.find(p=>String(p.id)===id)||data.blogPosts[0];
    document.title=p.title+' | Buffbridge Journal';
    main.innerHTML=breadcrumb('BLOG','./blog.html',p.title)+`<div class="shell section blog-layout">${sidebar()}<article class="article"><img class="article-cover" src="${p.image}" alt="${esc(p.title)}"><div class="post-meta">${esc(p.category.toUpperCase())} · ${date(p)} · BUFFBRIDGE JOURNAL</div><h1>${esc(p.title)}</h1><p class="muted">${esc(p.excerpt)}</p><div class="article-copy">${p.content.map(text=>`<p>${esc(text)}</p>`).join('')}</div><p class="demo-note">Demo editorial · prepared for this static preview.</p><div class="article-bottom"><a href="./blog.html" class="text-link">← BACK TO ALL ARTICLES</a></div><section class="section">${sectionHead('MORE FROM THE JOURNAL','RELATED STORIES')}<div class="blog-grid">${data.blogPosts.filter(b=>b.id!==p.id).slice(0,2).map(blogCard).join('')}</div></section></article></div>`;
  }
  function contact() {
    main.innerHTML=pageHero('BUFFBRIDGE CUSTOM CREW','CONTACT <span>US</span>','Need help with products, orders or custom builds? Get in touch with our team.','contact-hero')+`<div class="shell contact-layout"><section class="contact-info"><span class="eyebrow">GET IN TOUCH</span><h2>WE’RE HERE<br>TO HELP.</h2><p class="contact-intro">Questions about products, availability, orders or Buffbridge Custom? Contact us through the channels below.</p>${contactItems()}<span class="eyebrow">FOLLOW BUFFBRIDGE</span>${socials()}</section><section class="contact-form-card"><span class="eyebrow">LET’S TALK</span><h2>SEND A MESSAGE</h2><p>Fill in the form to try the demo. No message will be sent.</p><form id="contact-form" data-demo-form="Demo preview only: no message was sent. Use phone, Facebook or LINE to contact the gallery."><div class="form-row"><label class="field">NAME<input placeholder="Your name" autocomplete="name" required></label><label class="field">PHONE<input type="tel" placeholder="Phone number" autocomplete="tel"></label></div><label class="field">EMAIL<input type="email" placeholder="Email address" autocomplete="email" required></label><label class="field">SUBJECT<select required><option value="">Select subject</option><option>Product Inquiry</option><option>Order Inquiry</option><option>Buffbridge Custom</option><option>Stock / Availability</option><option>Other</option></select></label><label class="field">MESSAGE<textarea rows="6" placeholder="Tell us how we can help..." required></textarea></label><button type="submit" class="btn orange">SEND MESSAGE <span>→</span></button><p class="form-feedback" role="status" hidden></p><p>For urgent inquiries, please contact us directly by phone, Facebook or LINE.</p></form></section></div><section class="map-section"><div class="shell"><div class="map-heading"><div><span class="eyebrow">OUR LOCATION</span><h2>VISIT BUFFBRIDGE</h2><p>${esc(s.name)} · ${esc(s.address)}</p></div>${external(s.maps,'OPEN GOOGLE MAPS →','btn')}</div>${external(s.maps,`<span class="map-pin">${icon('location')}<strong>BUFFBRIDGE GALLERY</strong><small>OPEN IN GOOGLE MAPS →</small></span>`,'map-preview')}<p class="map-caption">Location preview illustration — open Google Maps for the actual map and directions. ${esc(s.address)}, ${esc(s.city)}.</p></div></section>`;
  }
  ({index:home,products,'product-detail':productDetail,blog,'blog-detail':blogDetail,contact}[page]||home)();
})();
