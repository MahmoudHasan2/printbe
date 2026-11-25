<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$sp = $d['services_page'] ?? [];
$page_title = 'Our Services — ' . ($d['settings']['site_name'] ?? 'PrintBe');
$active = 'services';
require __DIR__ . '/inc/header.php';
?>

<header class="page-header">
  <div class="container">
    <h1>Our Services</h1>
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><span>Services</span></div>
  </div>
</header>

<section class="reasons">
  <div class="container">
    <div class="section-header reveal">
      <span class="section-label"><?php echo e($sp['badge'] ?? ''); ?></span>
      <h2 class="section-title"><?php echo e($sp['title'] ?? ''); ?></h2>
      <p class="section-desc"><?php echo e($sp['desc'] ?? ''); ?></p>
    </div>
    <div class="services-grid">
      <?php foreach (($d['services_list'] ?? []) as $i => $sv): ?>
      <a href="#" class="service-card reveal">
        <img src="<?php echo e($sv['image']); ?>" alt="<?php echo e($sv['title']); ?>">
        <span class="service-num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></span>
        <div class="service-info"><h3><?php echo e($sv['title']); ?></h3><p><?php echo e($sv['desc']); ?></p></div>
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
      <h2 class="section-title">A Simple, Transparent Process</h2>
      <p class="section-desc">Every service follows the same reliable workflow, so you always know where your order stands.</p>
    </div>
    <div class="steps-grid">
      <div class="step-line"></div>
      <?php foreach (($d['home']['steps'] ?? []) as $i => $st): ?>
      <div class="step-card reveal"><div class="step-num"><?php echo str_pad($i + 1, 2, '0', STR_PAD_LEFT); ?></div><h3><?php echo e($st['title']); ?></h3><p><?php echo e($st['desc']); ?></p></div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<section class="bulk-cta">
  <div class="container">
    <div class="bulk-inner reveal">
      <div class="bulk-text">
        <span class="section-label" style="background:rgba(124,58,237,.2);color:var(--primary-light);">Not sure which service fits?</span>
        <h2>Talk To A Print Specialist</h2>
        <p>Tell us about your project and we'll recommend the right service, material, and finish for your budget.</p>
        <a href="contact.php" class="btn-primary">Contact Us <i class="fas fa-arrow-right"></i></a>
      </div>
      <div class="bulk-imgs">
        <img src="<?php echo e($d['home']['bulk_cta']['img1'] ?? ''); ?>" alt="">
        <img src="<?php echo e($d['home']['bulk_cta']['img2'] ?? ''); ?>" alt="">
        <img src="<?php echo e($d['home']['bulk_cta']['img3'] ?? ''); ?>" alt="">
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
