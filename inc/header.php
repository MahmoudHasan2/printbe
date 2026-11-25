<?php
/**
 * Shared header. The including page must set:
 *   $page_title  (browser tab title)
 *   $active      (one of: home, services, shop, blog, about, contact)
 * before requiring this file.
 */
require_once __DIR__ . '/data.php';
$d = site_data();
$s = $d['settings'] ?? [];
if (!isset($page_title)) $page_title = ($s['site_name'] ?? 'PrintBe');
if (!isset($active)) $active = '';
function nav_active($key, $active) { return $key === $active ? ' class="active"' : ''; }
?><!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo e($page_title); ?></title>
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&family=Playfair+Display:wght@500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
<link rel="stylesheet" href="assets/style.css">
</head>
<body>

<div class="promo-bar"><?php echo e($s['promo_text'] ?? ''); ?> <a href="shop.php"><?php echo e($s['promo_link_text'] ?? 'Shop Now'); ?></a></div>

<div class="top-bar">
  <div class="container">
    <div class="top-bar-left">
      <span><i class="fas fa-phone"></i> <?php echo e($s['phone'] ?? ''); ?></span>
      <span><i class="fas fa-envelope"></i> <?php echo e($s['email'] ?? ''); ?></span>
      <span><i class="fas fa-map-marker-alt"></i> <?php echo e($s['address'] ?? ''); ?></span>
    </div>
    <div class="top-bar-right">
      <a href="#">Track Order</a>
      <a href="#">Help Center</a>
      <div class="lang-switch"><button class="active">EN</button><button>FR</button><button>IT</button></div>
    </div>
  </div>
</div>

<nav class="navbar" id="navbar">
  <div class="nav-container">
    <a href="index.php" class="nav-logo">
      <div class="nav-logo-icon"><i class="fas fa-print"></i></div>
      <div class="nav-logo-text"><?php echo e($s['brand_name'] ?? 'Print'); ?><span><?php echo e($s['brand_accent'] ?? 'Be'); ?></span></div>
    </a>
    <ul class="nav-menu" id="navMenu">
      <li><a href="index.php"<?php echo nav_active('home',$active); ?>>Home</a></li>
      <li><a href="services.php"<?php echo nav_active('services',$active); ?>>Services</a></li>
      <li>
        <a href="shop.php"<?php echo nav_active('shop',$active); ?>>Shop <i class="fas fa-chevron-down caret"></i></a>
        <ul class="nav-dropdown"><li><a href="shop.php">All Products</a></li><li><a href="product.php">Product Detail</a></li></ul>
      </li>
      <li>
        <a href="blog.php"<?php echo nav_active('blog',$active); ?>>Blog <i class="fas fa-chevron-down caret"></i></a>
        <ul class="nav-dropdown"><li><a href="blog.php">Blog List</a></li><li><a href="blog-post.php">Single Post</a></li></ul>
      </li>
      <li><a href="about.php"<?php echo nav_active('about',$active); ?>>About Us</a></li>
      <li><a href="contact.php"<?php echo nav_active('contact',$active); ?>>Contact Us</a></li>
    </ul>
    <div class="nav-actions">
      <button class="nav-icon-btn"><i class="fas fa-search"></i></button>
      <button class="nav-icon-btn"><i class="far fa-user"></i></button>
      <button class="nav-icon-btn"><i class="far fa-heart"></i><span class="nav-badge">3</span></button>
      <button class="nav-icon-btn"><i class="fas fa-shopping-bag"></i><span class="nav-badge">3</span></button>
      <a href="contact.php" class="nav-cta">Get Started</a>
      <div class="mobile-toggle" id="mobileToggle"><span></span><span></span><span></span></div>
    </div>
  </div>
</nav>
