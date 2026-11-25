<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$home = $d['home'] ?? [];
$page_title = ($d['settings']['site_name'] ?? 'PrintBe') . ' — Printing Company & Custom Merch Store';
$active = 'home';
require __DIR__ . '/inc/header.php';
?>

<section class="hero" id="home">
  <div class="hero-slides" id="heroSlides">
    <?php foreach (($home['hero_slides'] ?? []) as $i => $slide): ?>
    <div class="hero-slide<?php echo $i === 0 ? ' active' : ''; ?>">
      <div class="hero-container">
        <div class="hero-content">
          <div class="hero-badge"><i class="<?php echo e($slide['badge_icon'] ?? 'fas fa-star'); ?>"></i> <?php echo e($slide['badge'] ?? ''); ?></div>
          <h1 class="hero-title"><?php echo e($slide['title_line1'] ?? ''); ?> <span class="highlight"><?php echo e($slide['title_highlight'] ?? ''); ?></span><br><?php echo e($slide['title_line2'] ?? ''); ?></h1>
          <p class="hero-desc"><?php echo e($slide['desc'] ?? ''); ?></p>
          <div class="hero-buttons">
            <a href="<?php echo e($slide['btn1_link'] ?? '#'); ?>" class="btn-primary"><?php echo e($slide['btn1_text'] ?? ''); ?> <i class="fas fa-arrow-right"></i></a>
            <a href="<?php echo e($slide['btn2_link'] ?? '#'); ?>" class="btn-secondary"><i class="fas fa-play-circle"></i> <?php echo e($slide['btn2_text'] ?? ''); ?></a>
          </div>
          <div class="hero-stats">
            <div class="hero-stat"><h3 data-count="<?php echo e($slide['stat1_num'] ?? 0); ?>" data-suffix="<?php echo e($slide['stat1_suffix'] ?? ''); ?>">0</h3><p><?php echo e($slide['stat1_label'] ?? ''); ?></p></div>
            <div class="hero-stat"><h3 data-count="<?php echo e($slide['stat2_num'] ?? 0); ?>" data-suffix="<?php echo e($slide['stat2_suffix'] ?? ''); ?>">0</h3><p><?php echo e($slide['stat2_label'] ?? ''); ?></p></div>
            <div class="hero-stat"><h3 data-count="<?php echo e($slide['stat3_num'] ?? 0); ?>" data-suffix="<?php echo e($slide['stat3_suffix'] ?? ''); ?>">0</h3><p><?php echo e($slide['stat3_label'] ?? ''); ?></p></div>
          </div>
        </div>
        <div class="hero-images">
          <div class="hero-shape s1"></div>
          <div class="hero-shape s2"></div>
          <img src="<?php echo e($slide['main_img'] ?? ''); ?>" alt="" class="hero-img-main">
          <img src="<?php echo e($slide['float_img1'] ?? ''); ?>" alt="" class="hero-img-float f1">
          <img src="<?php echo e($slide['float_img2'] ?? ''); ?>" alt="" class="hero-img-float f2">
          <img src="<?php echo e($slide['float_img3'] ?? ''); ?>" alt="" class="hero-img-float f3">
        </div>
      </div>
    </div>
    <?php endforeach; ?>
  </div>
  <div class="hero-dots" id="heroDots"></div>
</section>

<section class="usp">
  <div class="container usp-grid">
    <?php foreach (($home['usp'] ?? []) as $item): ?>
    <div class="usp-item"><i class="<?php echo e($item['icon']); ?>"></i><div><h4><?php echo e($item['title']); ?></h4><p><?php echo e($item['desc']); ?></p></div></div>
    <?php endforeach; ?>
  </div>
</section>

<section class="stats-band">
  <div class="container stats-grid">
    <?php foreach (($home['stats'] ?? []) as $st): ?>
    <div><div class="stat-num"><span data-count="<?php echo e($st['num']); ?>">0</span><?php echo e($st['suffix']); ?></div><div class="stat-label"><?php echo e($st['label']); ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<section class="reasons">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label">Best printing company</span>
      <h2 class="section-title">Reasons To Get Printing Started With Us</h2>
      <p class="section-desc">Over a decade of combined experience in product design and print production — believe it because you've seen it.</p>
    </div>
    <div class="reasons-grid">
      <?php foreach (($home['reasons'] ?? []) as $r): ?>
      <div class="reason-card reveal"><div class="reason-icon"><i class="<?php echo e($r['icon']); ?>"></i></div><h3><?php echo e($r['title']); ?></h3><p><?php echo e($r['desc']); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="services" id="services">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label">Our best services</span>
      <h2 class="section-title">Premier One-Stop Custom Print Solutions</h2>
      <p class="section-desc">Whatever you're printing, we've got the equipment, the materials, and the know-how.</p>
    </div>
    <div class="services-grid">
      <?php foreach (array_slice($d['services_list'] ?? [], 0, 4) as $i => $sv): ?>
      <a href="services.php" class="service-card reveal">
        <img src="<?php echo e($sv['image']); ?>" alt="<?php echo e($sv['title']); ?>">
        <span class="service-num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
        <div class="service-info"><h3><?php echo e($sv['title']); ?></h3><span>Learn more <i class="fas fa-arrow-right"></i></span></div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php $ribbons = $d['ribbons'] ?? []; ?>
<div class="ribbon-stack">
  <div class="ribbon top"><div class="ribbon-track" id="ribbonTop" data-tags="<?php echo e(implode('|', lines($ribbons['category_tags'] ?? ''))); ?>"></div></div>
  <div class="ribbon bottom"><div class="ribbon-track" id="ribbonBottom" data-tags="<?php echo e(implode('|', lines($ribbons['shop_tags'] ?? ''))); ?>"></div></div>
</div>

<section class="steps" id="steps">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label">How it works</span>
      <h2 class="section-title">PrintBe Makes It Easier In 3 Steps</h2>
      <p class="section-desc">From idea to doorstep — a simple, transparent process with no surprises along the way.</p>
    </div>
    <div class="steps-grid">
      <div class="step-line"></div>
      <?php foreach (($home['steps'] ?? []) as $i => $st): ?>
      <div class="step-card reveal"><div class="step-num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></div><h3><?php echo e($st['title']); ?></h3><p><?php echo e($st['desc']); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php $bulk = $home['bulk_cta'] ?? []; ?>
<section class="bulk-cta">
  <div class="container">
    <div class="bulk-inner reveal">
      <div class="bulk-text">
        <span class="section-label" style="background:rgba(124,58,237,.2);color:var(--primary-light);"><?php echo e($bulk['label'] ?? ''); ?></span>
        <h2><?php echo e($bulk['title'] ?? ''); ?></h2>
        <p><?php echo e($bulk['desc'] ?? ''); ?></p>
        <a href="<?php echo e($bulk['btn_link'] ?? '#'); ?>" class="btn-primary"><?php echo e($bulk['btn_text'] ?? ''); ?> <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="bulk-imgs">
        <img src="<?php echo e($bulk['img1'] ?? ''); ?>" alt="">
        <img src="<?php echo e($bulk['img2'] ?? ''); ?>" alt="">
        <img src="<?php echo e($bulk['img3'] ?? ''); ?>" alt="">
      </div>
    </div>
  </div>
</section>

<section class="products" id="products">
  <div class="container">
    <div class="products-header reveal">
      <div class="section-header"><span class="section-label">Feature products</span><h2 class="section-title" style="margin-bottom:0;">Amazing Products Are Ready For You</h2></div>
      <div class="carousel-arrows"><button id="prodPrev"><i class="fas fa-arrow-left"></i></button><button id="prodNext"><i class="fas fa-arrow-right"></i></button></div>
    </div>
    <div class="products-track" id="productsTrack">
      <?php foreach (($d['products'] ?? []) as $p): ?>
      <div class="product-card">
        <div class="product-img-wrap">
          <?php if (!empty($p['badge'])): ?><span class="product-badge<?php echo $p['badge'] === 'New' ? ' new' : ''; ?>"><?php echo e($p['badge']); ?></span><?php endif; ?>
          <img src="<?php echo e($p['image']); ?>" alt="<?php echo e($p['name']); ?>">
          <div class="product-actions"><button class="product-action-btn"><i class="far fa-heart"></i></button><a href="product.php" class="product-action-btn"><i class="fas fa-eye"></i></a><button class="product-action-btn"><i class="fas fa-arrows-rotate"></i></button></div>
        </div>
        <div class="product-info"><span class="product-cat"><?php echo e($p['category']); ?></span><a href="product.php" class="product-name"><?php echo e($p['name']); ?></a><div class="product-price"><?php echo e($p['price']); ?></div><a href="product.php" class="product-personalize">Personalize</a></div>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="testimonials" id="testimonials">
  <div class="container">
    <div class="mini-ribbon"><div class="mini-ribbon-track" id="miniRibbon" data-tags="<?php echo e(($ribbons['testimonial_word1'] ?? 'Testimonials') . '|' . ($ribbons['testimonial_word2'] ?? 'Review')); ?>"></div></div>
    <div class="section-header reveal">
      <span class="section-label">Testimonials</span>
      <h2 class="section-title">What Our Clients Say</h2>
      <p class="section-desc">Don't just take our word for it — hear from the businesses we've helped grow.</p>
    </div>
    <div class="testi-wrap reveal">
      <?php foreach (($d['testimonials'] ?? []) as $i => $t): ?>
      <div class="testi-slide<?php echo $i === 0 ? ' active' : ''; ?>">
        <div class="testi-stars"><?php for ($k=0;$k<5;$k++) echo '<i class="fa' . ($k < ($t['stars'] ?? 5) ? 's' : 'r') . ' fa-star"></i>'; ?></div>
        <p class="testi-text"><?php echo e($t['text']); ?></p>
        <div class="testi-author"><img src="<?php echo e($t['author_image']); ?>" alt="<?php echo e($t['author_name']); ?>"><div><h4><?php echo e($t['author_name']); ?></h4><p><?php echo e($t['author_role']); ?></p></div></div>
      </div>
      <?php endforeach; ?>
      <div class="testi-dots" id="testiDots"></div>
    </div>
  </div>
</section>

<section class="blog" id="blog">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label">Newest articles</span>
      <h2 class="section-title">Read Our Latest Blog Posts</h2>
      <p class="section-desc">Tips, trends, and behind-the-scenes from the world of custom print.</p>
    </div>
    <div class="blog-grid">
      <?php foreach (array_slice($d['blog_posts'] ?? [], 0, 3) as $i => $b): ?>
      <a href="blog-post.php?post=<?php echo $i; ?>" class="blog-card reveal">
        <img src="<?php echo e($b['image']); ?>" alt="<?php echo e($b['title']); ?>">
        <div class="blog-info"><div class="blog-meta"><span><?php echo e($b['author']); ?></span><span><?php echo e($b['comments']); ?> comments</span></div><h3><?php echo e($b['title']); ?></h3><p><?php echo e($b['excerpt']); ?></p></div>
      </a>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="pricing" id="pricing">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label">Pricing &amp; plan</span>
      <h2 class="section-title">Effective &amp; Flexible Pricing Plans</h2>
      <p class="section-desc">Pick the plan that matches your volume. Need something in between? We'll customize it.</p>
    </div>
    <div class="pricing-toggle reveal"><span class="active" id="labelMonthly">Monthly</span><button class="toggle-switch" id="priceToggle"></button><span id="labelYearly">Yearly</span></div>
    <div class="pricing-grid">
      <?php foreach (($home['pricing'] ?? []) as $pl): ?>
      <div class="price-card<?php echo !empty($pl['featured']) ? ' featured' : ''; ?> reveal">
        <div class="price-tag"><?php echo e($pl['tag']); ?></div><p class="desc"><?php echo e($pl['desc']); ?></p>
        <div class="price-amount"><span class="price-val" data-m="<?php echo e($pl['price_m']); ?>" data-y="<?php echo e($pl['price_y']); ?>">$<?php echo number_format((float)$pl['price_m']); ?></span><sub>/<span class="price-period">mo</span></sub></div>
        <ul class="price-list"><?php foreach (lines($pl['features'] ?? '') as $f): ?><li><i class="fas fa-check"></i> <?php echo e($f); ?></li><?php endforeach; ?></ul>
        <a href="contact.php" class="btn-secondary btn-block"<?php echo !empty($pl['featured']) ? ' style="background:var(--primary);color:#fff;border-color:var(--primary);"' : ''; ?>>Explore More</a>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="newsletter">
  <div class="container newsletter-inner">
    <h2><?php echo e($home['newsletter']['title'] ?? ''); ?></h2>
    <p><?php echo e($home['newsletter']['desc'] ?? ''); ?></p>
    <div class="newsletter-form"><input type="email" id="newsEmail" placeholder="Enter your email"><button id="newsBtn">Subscribe</button></div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
