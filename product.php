<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$products = $d['products'] ?? [];
$idx = isset($_GET['p']) ? (int)$_GET['p'] : 4; // defaults to the Mug demo entry
if (!isset($products[$idx])) $idx = 0;
$product = $products[$idx] ?? ['name' => 'Product', 'image' => '', 'price' => '', 'category' => ''];
$page_title = e($product['name']) . ' — ' . ($d['settings']['site_name'] ?? 'PrintBe');
$active = 'shop';
require __DIR__ . '/inc/header.php';
?>

<header class="page-header" style="padding:38px 0;">
  <div class="container">
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><a href="shop.php">Shop</a><span>/</span><span><?php echo e($product['name']); ?></span></div>
  </div>
</header>

<div class="container product-page">
  <div class="product-detail">
    <div class="reveal">
      <div class="product-gallery-main"><img src="<?php echo e($product['image']); ?>" id="galleryMain" alt="<?php echo e($product['name']); ?>"></div>
      <div class="product-gallery-thumbs">
        <img src="<?php echo e($product['image']); ?>" class="active" alt="">
        <img src="https://images.unsplash.com/photo-1481391319762-47dff72954d9?w=200&q=80" alt="">
        <img src="https://images.unsplash.com/photo-1517256064527-09c73fc73e38?w=200&q=80" alt="">
        <img src="https://images.unsplash.com/photo-1442512595331-e89e73853f31?w=200&q=80" alt="">
      </div>
    </div>
    <div class="reveal">
      <span class="pd-cat"><?php echo e($product['category']); ?></span>
      <h1 class="pd-title"><?php echo e($product['name']); ?></h1>
      <div class="pd-rating"><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star"></i><i class="fas fa-star-half-alt"></i><span>4.6 (128 reviews)</span></div>
      <div class="pd-price"><?php echo e($product['price']); ?></div>
      <p class="pd-desc">Printed in-house on premium materials with a full-color, edge-to-edge finish that won't fade or peel. Perfect for personal use, gifting, or branded merch drops.</p>

      <div class="pd-options">
        <div class="pd-option">
          <h5>Color</h5>
          <div class="pd-swatches">
            <div class="pd-swatch active" style="background:#1E1B4B;"></div>
            <div class="pd-swatch" style="background:#7C3AED;"></div>
            <div class="pd-swatch" style="background:#EF4444;"></div>
            <div class="pd-swatch" style="background:#F3F4F6;box-shadow:0 0 0 2px var(--border), inset 0 0 0 1px #ddd;"></div>
          </div>
        </div>
        <div class="pd-option">
          <h5>Size</h5>
          <div class="pd-sizes"><button class="active">Standard</button><button>Large</button><button>XL</button></div>
        </div>
      </div>

      <div class="pd-qty-row">
        <div class="pd-qty"><button id="qtyMinus">−</button><input type="text" id="qtyInput" value="1"><button id="qtyPlus">+</button></div>
        <a href="#" class="btn-primary">Add To Cart <i class="fas fa-shopping-bag"></i></a>
        <button class="nav-icon-btn"><i class="far fa-heart"></i></button>
      </div>

      <div class="pd-meta">
        <span><b>SKU:</b> PB-<?php echo strtoupper(substr(preg_replace('/[^a-zA-Z]/','',$product['name']),0,3)); ?>-0<?php echo $idx+1; ?></span>
        <span><b>Categories:</b> <?php echo e($product['category']); ?></span>
        <span><b>Turnaround:</b> 3–5 business days</span>
      </div>
    </div>
  </div>

  <div class="reveal">
    <div class="pd-tabs">
      <button class="pd-tab-btn active" data-tab="tab-desc">Description</button>
      <button class="pd-tab-btn" data-tab="tab-specs">Specifications</button>
      <button class="pd-tab-btn" data-tab="tab-reviews">Reviews (128)</button>
    </div>
    <div class="pd-tab-panel active" id="tab-desc"><p>Upload your own artwork or pick one of our free templates — either way, you'll approve a digital proof before we print.</p></div>
    <div class="pd-tab-panel" id="tab-specs"><p><b>Print method:</b> Full-color digital print &nbsp; • &nbsp; <b>Care:</b> See product care card &nbsp; • &nbsp; <b>Turnaround:</b> 3–5 business days</p></div>
    <div class="pd-tab-panel" id="tab-reviews"><p>"Colors came out exactly like the proof — will order again." — Verified Buyer</p></div>
  </div>

  <div class="section-header reveal" style="margin-top:90px;">
    <span class="section-label">You may also like</span>
    <h2 class="section-title">Related Products</h2>
  </div>
  <div class="product-grid reveal">
    <?php
    $shown = 0;
    foreach ($products as $i => $rp) {
        if ($i === $idx || $shown >= 3) continue;
        $shown++;
        ?>
        <div class="product-card">
          <div class="product-img-wrap"><img src="<?php echo e($rp['image']); ?>" alt="<?php echo e($rp['name']); ?>"><div class="product-actions"><button class="product-action-btn"><i class="far fa-heart"></i></button><a href="product.php?p=<?php echo $i; ?>" class="product-action-btn"><i class="fas fa-eye"></i></a></div></div>
          <div class="product-info"><span class="product-cat"><?php echo e($rp['category']); ?></span><a href="product.php?p=<?php echo $i; ?>" class="product-name"><?php echo e($rp['name']); ?></a><div class="product-price"><?php echo e($rp['price']); ?></div></div>
        </div>
        <?php
    }
    ?>
  </div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>
