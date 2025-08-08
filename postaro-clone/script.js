const $ = (q) => document.querySelector(q);
const $$ = (q) => Array.from(document.querySelectorAll(q));

// Sticky header
(function initStickyHeader(){
  const header = $('#siteHeader');
  const onScroll = () => {
    if (window.scrollY > 8) header.classList.add('is-sticky');
    else header.classList.remove('is-sticky');
  };
  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
})();

// Mobile drawer
(function initMobileDrawer(){
  const drawer = $('#mobileDrawer');
  const openBtn = $('#mobileMenuBtn');
  const closeBtn = $('#mobileCloseBtn');
  const toggle = (open) => {
    drawer.classList.toggle('is-open', open);
    drawer.setAttribute('aria-hidden', String(!open));
    document.body.style.overflow = open ? 'hidden' : '';
  };
  openBtn.addEventListener('click', () => toggle(true));
  closeBtn.addEventListener('click', () => toggle(false));
  drawer.addEventListener('click', (e) => {
    if (e.target === drawer) toggle(false);
  });
})();

// Hero carousel
(function initCarousel(){
  const root = $('#heroCarousel');
  const slides = $$('.slide');
  const dotsRoot = root.querySelector('.dots');
  const prevBtn = root.querySelector('.prev');
  const nextBtn = root.querySelector('.next');
  let active = 0; let timer = null; const intervalMs = 5000;

  const renderDots = () => {
    dotsRoot.innerHTML = '';
    slides.forEach((_, i) => {
      const b = document.createElement('button');
      b.type = 'button';
      b.setAttribute('role', 'tab');
      b.setAttribute('aria-selected', String(i === active));
      b.addEventListener('click', () => go(i));
      dotsRoot.appendChild(b);
    });
  };

  const go = (i) => {
    slides[active].classList.remove('is-active');
    active = (i + slides.length) % slides.length;
    slides[active].classList.add('is-active');
    $$('.dots button').forEach((b, j) => b.setAttribute('aria-selected', String(j === active)));
    resetTimer();
  };

  const next = () => go(active + 1);
  const prev = () => go(active - 1);

  const resetTimer = () => {
    if (timer) clearInterval(timer);
    timer = setInterval(next, intervalMs);
  };

  renderDots();
  prevBtn.addEventListener('click', prev);
  nextBtn.addEventListener('click', next);
  resetTimer();
})();

// Products
const PRODUCTS = [
  { id: 'p1', title: 'Wireless Noise-Canceling Headphones', price: 129.99, rating: 4.7, ratingsCount: 892, img: 'https://images.unsplash.com/photo-1518441902117-f26c36d3acf3?w=600&q=70&auto=format&fit=crop', tag: 'Hot', category: 'electronics' },
  { id: 'p2', title: 'Smart Fitness Watch Pro', price: 89.99, rating: 4.5, ratingsCount: 411, img: 'https://images.unsplash.com/photo-1511735111819-9a3f7709049c?w=600&q=70&auto=format&fit=crop', tag: 'Deal', category: 'electronics' },
  { id: 'p3', title: 'Lightweight Running Shoes', price: 59.0, rating: 4.2, ratingsCount: 146, img: 'https://images.unsplash.com/photo-1542291026-7eec264c27ff?w=600&q=70&auto=format&fit=crop', tag: 'New', category: 'fashion' },
  { id: 'p4', title: 'Minimal Ceramic Vase', price: 24.5, rating: 4.4, ratingsCount: 89, img: 'https://images.unsplash.com/photo-1519710164239-da123dc03ef4?w=600&q=70&auto=format&fit=crop', tag: 'Trending', category: 'home' },
  { id: 'p5', title: 'Espresso Machine Compact', price: 149.0, rating: 4.6, ratingsCount: 221, img: 'https://images.unsplash.com/photo-1504754524776-8f4f37790ca0?w=600&q=70&auto=format&fit=crop', tag: 'Hot', category: 'home' },
  { id: 'p6', title: 'Organic Skin Care Set', price: 39.99, rating: 4.1, ratingsCount: 133, img: 'https://images.unsplash.com/photo-1505575967455-40e256f73376?w=600&q=70&auto=format&fit=crop', tag: 'Deal', category: 'fashion' },
  { id: 'p7', title: 'Bluetooth Speaker Mini', price: 35.0, rating: 4.3, ratingsCount: 378, img: 'https://images.unsplash.com/photo-1490376840453-5f616fbebe5b?w=600&q=70&auto=format&fit=crop', tag: 'New', category: 'electronics' },
  { id: 'p8', title: 'Nonstick Cookware Pan', price: 19.99, rating: 4.0, ratingsCount: 52, img: 'https://images.unsplash.com/photo-1517256064527-09c73fc73e38?w=600&q=70&auto=format&fit=crop', tag: 'Deal', category: 'home' },
  { id: 'p9', title: 'Ergonomic Office Chair', price: 189.99, rating: 4.8, ratingsCount: 605, img: 'https://images.unsplash.com/photo-1582582621959-48d5d6fc3c4e?w=600&q=70&auto=format&fit=crop', tag: 'Top', category: 'home' },
];

(function renderProducts(){
  const row = $('#bestSellers');
  const createCard = (p) => {
    const el = document.createElement('article');
    el.className = 'product-card';
    el.innerHTML = `
      <div class="product-media">
        <img loading="lazy" src="${p.img}" alt="${p.title}" />
        <span class="product-badge">${p.tag}</span>
      </div>
      <div class="product-body">
        <h4 class="product-title">${p.title}</h4>
        <div class="product-meta">
          <span class="price">$${p.price.toFixed(2)}</span>
          <span class="rating">★ ${p.rating} (${p.ratingsCount})</span>
        </div>
        <div class="card-actions">
          <button class="btn btn-primary" data-add-cart="${p.id}">Add to cart</button>
          <button class="pill-btn" data-wishlist="${p.id}">♥</button>
        </div>
      </div>`;
    return el;
  };

  const render = (filter = 'all') => {
    row.innerHTML = '';
    PRODUCTS.filter(p => filter === 'all' || p.category === filter)
      .forEach(p => row.appendChild(createCard(p)));
  };

  render('all');

  $$('.pill-btn[data-products-filter]').forEach(btn => {
    btn.addEventListener('click', () => render(btn.dataset.productsFilter));
  });
})();

// Cart interactions
(function initCart(){
  const cartCount = $('#cartCount');
  let count = 0;
  document.addEventListener('click', (e) => {
    const target = e.target.closest('[data-add-cart]');
    if (!target) return;
    count += 1;
    cartCount.textContent = String(count);
    target.textContent = 'Added';
    target.disabled = true;
    setTimeout(() => {
      target.textContent = 'Add to cart';
      target.disabled = false;
    }, 1000);
  });
})();

// Search suggestions (mock)
(function initSearch(){
  const input = $('#searchInput');
  const panel = $('#searchSuggestions');
  const DATA = ['iPhone 14', 'Samsung Galaxy', 'Sony Headphones', 'Smart Watch', 'Running Shoes', 'Office Chair', 'Cookware Pan', 'Coffee Machine', 'Face Serum', 'Bluetooth Speaker'];

  const search = (q) => DATA.filter(x => x.toLowerCase().includes(q.toLowerCase())).slice(0, 6);

  const render = (items) => {
    if (!items.length) { panel.innerHTML = ''; panel.style.display = 'none'; return; }
    panel.style.display = 'grid';
    panel.innerHTML = items.map(x => `<button type="button" class="suggest-item">${x}</button>`).join('');
  };

  input.addEventListener('input', () => {
    const q = input.value.trim();
    if (!q) { render([]); return; }
    render(search(q));
  });

  document.addEventListener('click', (e) => {
    if (!panel.contains(e.target) && e.target !== input) panel.style.display = 'none';
  });

  panel.addEventListener('click', (e) => {
    const item = e.target.closest('.suggest-item');
    if (!item) return;
    input.value = item.textContent;
    panel.style.display = 'none';
  });
})();

// Newsletter
(function initNewsletter(){
  const form = document.getElementById('newsletterForm');
  form.addEventListener('submit', (e) => {
    e.preventDefault();
    const email = form.querySelector('input').value;
    alert(`Thanks for subscribing, ${email}!`);
    form.reset();
  });
})();

// Footer year
(function setYear(){
  const y = document.getElementById('year');
  y.textContent = new Date().getFullYear();
})();