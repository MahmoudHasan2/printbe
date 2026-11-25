<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$shopPage = $d['shop_page'] ?? [];
$page_title = 'Shop — ' . ($d['settings']['site_name'] ?? 'PrintBe');
$active = 'shop';
require __DIR__ . '/inc/header.php';

$categories = [];
foreach (lines($shopPage['filter_categories'] ?? '') as $row) {
    $parts = explode('|', $row);
    $categories[] = ['name' => trim($parts[0] ?? ''), 'count' => trim($parts[1] ?? '')];
}
?>

<header class="page-header">
  <div class="container">
    <h1>Shop</h1>
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><span>Shop</span></div>
  </div>
</header>

<div class="container">
  <div class="shop-layout">
    <aside class="shop-sidebar reveal">
      <div class="filter-block">
        <h4>Search</h4>
        <div class="search-box" style="display:flex;border:1px solid var(--border);border-radius:10px;overflow:hidden;background:#fff;">
          <input type="text" placeholder="Search products…" style="border:none;padding:12px 14px;flex:1;font-family:inherit;outline:none;">
          <button style="border:none;background:var(--primary);color:#fff;padding:0 16px;cursor:pointer;"><i class="fas fa-search"></i></button>
        </div>
      </div>
      <div class="filter-block">
        <h4><?php echo e($shopPage['badge'] ?? 'Categories'); ?></h4>
        <?php foreach ($categories as $c): ?>
        <label><input type="checkbox"> <?php echo e($c['name']); ?> <span style="margin-inline-start:auto;color:var(--text-lighter);">(<?php echo e($c['count']); ?>)</span></label>
        <?php endforeach; ?>
      </div>
      <div class="filter-block">
        <h4>Price Range</h4>
        <input type="range" min="0" max="200" value="90" class="filter-range">
        <p style="font-size:.82rem;color:var(--text-light);margin-top:8px;">$0 — $200</p>
      </div>
    </aside>

    <div>
      <div class="shop-toolbar reveal">
        <span>Showing <?php echo count($d['products'] ?? []); ?> of <?php echo count($d['products'] ?? []); ?> results</span>
        <select><option>Sort: Featured</option><option>Price: Low to High</option><option>Price: High to Low</option><option>Newest</option></select>
      </div>
      <div class="product-grid">
        <?php foreach (($d['products'] ?? []) as $p): ?>
        <div class="product-card reveal">
          <div class="product-img-wrap">
            <?php if (!empty($p['badge'])): ?><span class="product-badge<?php echo $p['badge'] === 'New' ? ' new' : ''; ?>"><?php echo e($p['badge']); ?></span><?php endif; ?>
            <img src="<?php echo e($p['image']); ?>" alt="<?php echo e($p['name']); ?>">
            <div class="product-actions"><button class="product-action-btn"><i class="far fa-heart"></i></button><a href="product.php" class="product-action-btn"><i class="fas fa-eye"></i></a><button class="product-action-btn"><i class="fas fa-arrows-rotate"></i></button></div>
          </div>
          <div class="product-info"><span class="product-cat"><?php echo e($p['category']); ?></span><a href="product.php" class="product-name"><?php echo e($p['name']); ?></a><div class="product-price"><?php echo e($p['price']); ?></div></div>
        </div>
        <?php endforeach; ?>
      </div>
      <div class="pagination reveal"><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#"><i class="fas fa-arrow-right"></i></a></div>
    </div>
  </div>
</div>

<section class="newsletter">
  <div class="container newsletter-inner">
    <h2><?php echo e($d['home']['newsletter']['title'] ?? ''); ?></h2>
    <p><?php echo e($d['home']['newsletter']['desc'] ?? ''); ?></p>
    <div class="newsletter-form"><input type="email" id="newsEmail" placeholder="Enter your email"><button id="newsBtn">Subscribe</button></div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
