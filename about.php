<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$ab = $d['about_page'] ?? [];
$page_title = 'About Us — ' . ($d['settings']['site_name'] ?? 'PrintBe');
$active = 'about';
require __DIR__ . '/inc/header.php';
?>

<header class="page-header">
  <div class="container">
    <h1>About Us</h1>
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><span>About Us</span></div>
  </div>
</header>

<section class="about-story">
  <div class="container about-grid">
    <div class="about-img-stack reveal">
      <img src="<?php echo e($ab['story_img'] ?? ''); ?>" alt="PrintBe press floor">
      <div class="badge-float"><h3><?php echo e($ab['badge_years'] ?? ''); ?></h3><p>Years Experience</p></div>
    </div>
    <div class="about-copy reveal">
      <span class="section-label"><?php echo e($ab['badge'] ?? ''); ?></span>
      <h2 class="section-title"><?php echo e($ab['title'] ?? ''); ?></h2>
      <p><?php echo e($ab['desc1'] ?? ''); ?></p>
      <p><?php echo e($ab['desc2'] ?? ''); ?></p>
      <div class="values-list">
        <div class="value-item"><i class="fas fa-leaf"></i><div><h4><?php echo e($ab['value1_title'] ?? ''); ?></h4><p><?php echo e($ab['value1_desc'] ?? ''); ?></p></div></div>
        <div class="value-item"><i class="fas fa-file-lines"></i><div><h4><?php echo e($ab['value2_title'] ?? ''); ?></h4><p><?php echo e($ab['value2_desc'] ?? ''); ?></p></div></div>
        <div class="value-item"><i class="fas fa-earth-americas"></i><div><h4><?php echo e($ab['value3_title'] ?? ''); ?></h4><p><?php echo e($ab['value3_desc'] ?? ''); ?></p></div></div>
      </div>
    </div>
  </div>
</section>

<section class="stats-band">
  <div class="container stats-grid">
    <?php foreach (($ab['stats'] ?? []) as $st): ?>
    <div><div class="stat-num"><span data-count="<?php echo e($st['num']); ?>">0</span><?php echo e($st['suffix']); ?></div><div class="stat-label"><?php echo e($st['label']); ?></div></div>
    <?php endforeach; ?>
  </div>
</section>

<section class="team">
  <div class="container">
    <div class="section-header reveal" style="margin-top:90px;">
      <span class="section-label">Our team</span>
      <h2 class="section-title">The People Behind PrintBe</h2>
      <p class="section-desc">A tight-knit team of designers, press operators, and support specialists.</p>
    </div>
    <div class="team-grid">
      <?php foreach (($d['team'] ?? []) as $m): ?>
      <div class="team-card reveal">
        <div class="team-photo"><img src="<?php echo e($m['image']); ?>" alt="<?php echo e($m['name']); ?>"><div class="team-social"><a href="<?php echo e($m['linkedin'] ?? '#'); ?>"><i class="fab fa-linkedin-in"></i></a><a href="<?php echo e($m['twitter'] ?? '#'); ?>"><i class="fab fa-x-twitter"></i></a></div></div>
        <h4><?php echo e($m['name']); ?></h4><span><?php echo e($m['role']); ?></span>
      </div>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<?php $ribbons = $d['ribbons'] ?? []; ?>
<div class="ribbon-stack">
  <div class="ribbon top"><div class="ribbon-track" id="ribbonTop" data-tags="<?php echo e(implode('|', lines($ribbons['category_tags'] ?? ''))); ?>"></div></div>
  <div class="ribbon bottom"><div class="ribbon-track" id="ribbonBottom" data-tags="<?php echo e(implode('|', lines($ribbons['shop_tags'] ?? ''))); ?>"></div></div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>
