/* =========================================================
   PrintBe — shared behavior, loaded on every page
   ========================================================= */
document.addEventListener('DOMContentLoaded', () => {

  /* ---------- Navbar scroll shadow ---------- */
  const navbar = document.getElementById('navbar');
  if (navbar) window.addEventListener('scroll', () => navbar.classList.toggle('scrolled', window.scrollY > 50));

  /* ---------- Mobile menu ---------- */
  const mobileToggle = document.getElementById('mobileToggle');
  const navMenu = document.getElementById('navMenu');
  if (mobileToggle && navMenu) {
    mobileToggle.addEventListener('click', () => {
      mobileToggle.classList.toggle('active');
      navMenu.classList.toggle('active');
    });
    document.querySelectorAll('.nav-menu > li > a').forEach(link => {
      link.addEventListener('click', (e) => {
        const parentLi = link.parentElement;
        if (window.innerWidth <= 768 && parentLi.querySelector('.nav-dropdown')) {
          e.preventDefault();
          parentLi.classList.toggle('open');
          return;
        }
        mobileToggle.classList.remove('active');
        navMenu.classList.remove('active');
      });
    });
  }

  /* ---------- Smooth in-page scroll (only for #hash links) ---------- */
  document.querySelectorAll('a[href^="#"]').forEach(a => {
    a.addEventListener('click', function (e) {
      const id = this.getAttribute('href');
      if (id.length < 2) return;
      const target = document.querySelector(id);
      if (target) { e.preventDefault(); target.scrollIntoView({ behavior: 'smooth', block: 'start' }); }
    });
  });

  /* ---------- Scroll reveal ---------- */
  const revealEls = document.querySelectorAll('.reveal');
  if (revealEls.length) {
    const revealObserver = new IntersectionObserver(entries => {
      entries.forEach(en => { if (en.isIntersecting) en.target.classList.add('active'); });
    }, { threshold: .12, rootMargin: '0px 0px -60px 0px' });
    revealEls.forEach(el => revealObserver.observe(el));
  }

  /* ---------- Hero slider (home only) ---------- */
  const heroSlideEls = document.querySelectorAll('.hero-slide');
  const heroDots = document.getElementById('heroDots');
  if (heroSlideEls.length && heroDots) {
    let heroIndex = 0, heroTimer;
    heroSlideEls.forEach((_, i) => {
      const dot = document.createElement('button');
      if (i === 0) dot.classList.add('active');
      dot.addEventListener('click', () => showHero(i));
      heroDots.appendChild(dot);
    });
    function showHero(i) {
      heroSlideEls.forEach(s => s.classList.remove('active'));
      heroDots.querySelectorAll('button').forEach(d => d.classList.remove('active'));
      heroSlideEls[i].classList.add('active');
      heroDots.children[i].classList.add('active');
      heroIndex = i;
      restartHeroTimer();
    }
    function restartHeroTimer() {
      clearInterval(heroTimer);
      heroTimer = setInterval(() => showHero((heroIndex + 1) % heroSlideEls.length), 6000);
    }
    restartHeroTimer();
  }

  /* ---------- Counters (run once, on view) ---------- */
  const counterEls = document.querySelectorAll('[data-count]');
  if (counterEls.length) {
    const counterObserver = new IntersectionObserver(entries => {
      entries.forEach(entry => {
        if (!entry.isIntersecting) return;
        const el = entry.target;
        const target = parseInt(el.dataset.count, 10);
        const suffix = el.dataset.suffix || '';
        const duration = 1600;
        const start = performance.now();
        function tick(now) {
          const p = Math.min((now - start) / duration, 1);
          el.textContent = Math.floor(p * target) + suffix;
          if (p < 1) requestAnimationFrame(tick); else el.textContent = target + suffix;
        }
        requestAnimationFrame(tick);
        counterObserver.unobserve(el);
      });
    }, { threshold: .6 });
    counterEls.forEach(el => counterObserver.observe(el));
  }

  /* ---------- Ribbon marquees (rotated tag strips) ---------- */
  function buildRibbon(el, items, repeats) {
    if (!el) return;
    const frag = document.createDocumentFragment();
    for (let r = 0; r < repeats; r++) {
      items.forEach(t => {
        const span = document.createElement('div');
        span.className = el.dataset.mini !== undefined ? 'mini-ribbon-item' : 'ribbon-item';
        span.innerHTML = `${t} <i class="fas fa-circle"></i>`;
        frag.appendChild(span);
      });
    }
    el.appendChild(frag);
  }
  const fallbackCategoryTags = ['Roller Banners', 'Brochures & Catalogs', 'Business Cards', 'Stickers & Labels', 'Calendars', 'Print Packaging'];
  const fallbackShopTags = ['Dress Shirts', 'New Products', 'Infants & Toddlers', 'Tank Tops', "Men's Shirts", "Women's Shirts", 'Bags & Accessories'];
  const fallbackTestiTags = ['Testimonials', 'Review'];
  function tagsFrom(el, fallback) {
    if (el && el.dataset.tags) return el.dataset.tags.split('|').filter(Boolean);
    return fallback;
  }
  const ribbonTopEl = document.getElementById('ribbonTop');
  const ribbonBottomEl = document.getElementById('ribbonBottom');
  const miniRibbonEl = document.getElementById('miniRibbon');
  buildRibbon(ribbonTopEl, tagsFrom(ribbonTopEl, fallbackCategoryTags), 2);
  buildRibbon(ribbonBottomEl, tagsFrom(ribbonBottomEl, fallbackShopTags), 2);
  buildRibbon(miniRibbonEl, tagsFrom(miniRibbonEl, fallbackTestiTags), 8);

  /* ---------- Products horizontal carousel (home) ---------- */
  const track = document.getElementById('productsTrack');
  const prodNext = document.getElementById('prodNext');
  const prodPrev = document.getElementById('prodPrev');
  if (track && prodNext && prodPrev) {
    prodNext.addEventListener('click', () => track.scrollBy({ left: 300, behavior: 'smooth' }));
    prodPrev.addEventListener('click', () => track.scrollBy({ left: -300, behavior: 'smooth' }));
  }

  /* ---------- Testimonials carousel ---------- */
  const testiSlides = document.querySelectorAll('.testi-slide');
  const testiDots = document.getElementById('testiDots');
  if (testiSlides.length && testiDots) {
    let testiIndex = 0, testiTimer;
    testiSlides.forEach((_, i) => {
      const dot = document.createElement('button');
      if (i === 0) dot.classList.add('active');
      dot.addEventListener('click', () => showTesti(i));
      testiDots.appendChild(dot);
    });
    function showTesti(i) {
      testiSlides.forEach(s => s.classList.remove('active'));
      testiDots.querySelectorAll('button').forEach(d => d.classList.remove('active'));
      testiSlides[i].classList.add('active');
      testiDots.children[i].classList.add('active');
      testiIndex = i;
      restartTestiTimer();
    }
    function restartTestiTimer() {
      clearInterval(testiTimer);
      testiTimer = setInterval(() => showTesti((testiIndex + 1) % testiSlides.length), 5000);
    }
    restartTestiTimer();
  }

  /* ---------- Pricing toggle ---------- */
  const priceToggle = document.getElementById('priceToggle');
  if (priceToggle) {
    const labelMonthly = document.getElementById('labelMonthly');
    const labelYearly = document.getElementById('labelYearly');
    let yearly = false;
    priceToggle.addEventListener('click', () => {
      yearly = !yearly;
      priceToggle.classList.toggle('yearly', yearly);
      if (labelMonthly) labelMonthly.classList.toggle('active', !yearly);
      if (labelYearly) labelYearly.classList.toggle('active', yearly);
      document.querySelectorAll('.price-val').forEach(el => {
        const val = yearly ? el.dataset.y : el.dataset.m;
        el.textContent = '$' + Number(val).toLocaleString();
      });
      document.querySelectorAll('.price-period').forEach(el => el.textContent = yearly ? 'yr' : 'mo');
    });
  }

  /* ---------- Newsletter ---------- */
  const newsBtn = document.getElementById('newsBtn');
  if (newsBtn) {
    newsBtn.addEventListener('click', (e) => {
      e.preventDefault();
      const input = document.getElementById('newsEmail');
      if (input && !input.value.trim()) { input.focus(); return; }
      const original = newsBtn.textContent;
      newsBtn.textContent = 'Subscribed!';
      setTimeout(() => { newsBtn.textContent = original; if (input) input.value = ''; }, 2000);
    });
  }

  /* ---------- Product detail page: gallery, swatches, sizes, qty, tabs ---------- */
  const galleryMain = document.getElementById('galleryMain');
  document.querySelectorAll('.product-gallery-thumbs img').forEach(thumb => {
    thumb.addEventListener('click', () => {
      document.querySelectorAll('.product-gallery-thumbs img').forEach(t => t.classList.remove('active'));
      thumb.classList.add('active');
      if (galleryMain) galleryMain.src = thumb.src;
    });
  });
  document.querySelectorAll('.pd-swatch').forEach(sw => {
    sw.addEventListener('click', () => {
      sw.parentElement.querySelectorAll('.pd-swatch').forEach(s => s.classList.remove('active'));
      sw.classList.add('active');
    });
  });
  document.querySelectorAll('.pd-sizes').forEach(group => {
    group.querySelectorAll('button').forEach(btn => {
      btn.addEventListener('click', () => {
        group.querySelectorAll('button').forEach(b => b.classList.remove('active'));
        btn.classList.add('active');
      });
    });
  });
  const qtyInput = document.getElementById('qtyInput');
  const qtyMinus = document.getElementById('qtyMinus');
  const qtyPlus = document.getElementById('qtyPlus');
  if (qtyInput && qtyMinus && qtyPlus) {
    qtyMinus.addEventListener('click', () => { qtyInput.value = Math.max(1, parseInt(qtyInput.value || 1, 10) - 1); });
    qtyPlus.addEventListener('click', () => { qtyInput.value = parseInt(qtyInput.value || 1, 10) + 1; });
  }
  document.querySelectorAll('.pd-tab-btn').forEach(btn => {
    btn.addEventListener('click', () => {
      const tabsWrap = btn.closest('.product-page');
      tabsWrap.querySelectorAll('.pd-tab-btn').forEach(b => b.classList.remove('active'));
      tabsWrap.querySelectorAll('.pd-tab-panel').forEach(p => p.classList.remove('active'));
      btn.classList.add('active');
      tabsWrap.querySelector('#' + btn.dataset.tab).classList.add('active');
    });
  });

  /* ---------- Contact form: prevent real submit in this demo ---------- */
  const contactForm = document.getElementById('contactForm');
  if (contactForm) {
    contactForm.addEventListener('submit', (e) => {
      e.preventDefault();
      const btn = contactForm.querySelector('button[type=submit]');
      const original = btn.textContent;
      btn.textContent = 'Message Sent!';
      setTimeout(() => { btn.textContent = original; contactForm.reset(); }, 2200);
    });
  }

});
