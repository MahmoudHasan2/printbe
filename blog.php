<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$page_title = 'Blog — ' . ($d['settings']['site_name'] ?? 'PrintBe');
$active = 'blog';
require __DIR__ . '/inc/header.php';
?>

<header class="page-header">
  <div class="container">
    <h1>Our Blog</h1>
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><span>Blog</span></div>
  </div>
</header>

<div class="container">
  <div class="blog-layout">
    <div>
      <?php foreach (($d['blog_posts'] ?? []) as $i => $b): ?>
      <a href="blog-post.php?post=<?php echo $i; ?>" class="blog-list-card reveal">
        <img src="<?php echo e($b['image']); ?>" alt="<?php echo e($b['title']); ?>">
        <div class="blog-list-info">
          <div class="blog-meta"><span><i class="far fa-user"></i> <?php echo e($b['author']); ?></span><span><i class="far fa-comment"></i> <?php echo e($b['comments']); ?> comments</span><span><i class="far fa-clock"></i> <?php echo e($b['date']); ?></span></div>
          <h3 style="font-family:'Playfair Display',serif;font-size:1.35rem;color:var(--dark);margin-bottom:10px;"><?php echo e($b['title']); ?></h3>
          <p style="color:var(--text-light);line-height:1.75;"><?php echo e($b['excerpt']); ?></p>
        </div>
      </a>
      <?php endforeach; ?>
      <div class="pagination reveal"><a href="#" class="active">1</a><a href="#">2</a><a href="#">3</a><a href="#"><i class="fas fa-arrow-right"></i></a></div>
    </div>

    <aside>
      <div class="blog-sidebar-box reveal">
        <h4>Search</h4>
        <div class="search-box"><input type="text" placeholder="Search articles…"><button><i class="fas fa-search"></i></button></div>
      </div>
      <div class="blog-sidebar-box reveal">
        <h4>Recent Posts</h4>
        <?php foreach (array_slice($d['blog_posts'] ?? [], 0, 3) as $i => $b): ?>
        <a href="blog-post.php?post=<?php echo $i; ?>" class="recent-post"><img src="<?php echo e($b['image']); ?>" alt=""><div><h5><?php echo e($b['title']); ?></h5><span><?php echo e($b['date']); ?></span></div></a>
        <?php endforeach; ?>
      </div>
      <div class="blog-sidebar-box reveal">
        <h4>Popular Tags</h4>
        <div class="tag-cloud"><a href="#">Design</a><a href="#">Packaging</a><a href="#">Apparel</a><a href="#">Stickers</a><a href="#">POD</a><a href="#">Tips</a></div>
      </div>
    </aside>
  </div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>
