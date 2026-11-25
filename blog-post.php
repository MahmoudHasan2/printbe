<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$posts = $d['blog_posts'] ?? [];
$idx = isset($_GET['post']) ? (int)$_GET['post'] : 0;
if (!isset($posts[$idx])) $idx = 0;
$post = $posts[$idx] ?? ['title' => 'Post', 'image' => '', 'body' => ''];
$page_title = e($post['title']) . ' — ' . ($d['settings']['site_name'] ?? 'PrintBe');
$active = 'blog';
require __DIR__ . '/inc/header.php';

$prev = $posts[$idx - 1] ?? null;
$next = $posts[$idx + 1] ?? null;
?>

<header class="page-header" style="padding:44px 0;">
  <div class="container">
    <h1 style="font-size:clamp(1.6rem,3vw,2.2rem);"><?php echo e($post['title']); ?></h1>
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><a href="blog.php">Blog</a><span>/</span><span><?php echo e($post['title']); ?></span></div>
  </div>
</header>

<div class="container post-page">
  <div class="post-hero-img reveal"><img src="<?php echo e($post['image']); ?>" alt="<?php echo e($post['title']); ?>"></div>

  <div class="post-layout">
    <article class="post-body reveal">
      <div class="blog-meta" style="margin-bottom:6px;"><span><i class="far fa-user"></i> <?php echo e($post['author'] ?? ''); ?></span><span><i class="far fa-calendar"></i> <?php echo e($post['date'] ?? ''); ?></span><span><i class="far fa-comment"></i> <?php echo e($post['comments'] ?? '0'); ?> comments</span></div>
      <?php foreach (explode("\n\n", $post['body'] ?? '') as $para): if (trim($para) === '') continue; ?>
      <p><?php echo nl2br(e($para)); ?></p>
      <?php endforeach; ?>

      <div class="post-tags-share">
        <div class="post-tags"><a href="#">Design</a><a href="#">Print</a><a href="#">Tutorials</a></div>
        <div class="post-share"><a href="#"><i class="fab fa-facebook-f"></i></a><a href="#"><i class="fab fa-x-twitter"></i></a><a href="#"><i class="fab fa-pinterest-p"></i></a></div>
      </div>

      <?php if (!empty($d['team'][1])): $author = $d['team'][1]; ?>
      <div class="post-author-box">
        <img src="<?php echo e($author['image']); ?>" alt="<?php echo e($author['name']); ?>">
        <div><h4><?php echo e($author['name']); ?></h4><p><?php echo e($author['role']); ?> at <?php echo e($d['settings']['site_name'] ?? ''); ?> — writes about the craft side of custom print.</p></div>
      </div>
      <?php endif; ?>

      <div class="post-nav">
        <?php if ($prev): ?><a href="blog-post.php?post=<?php echo $idx-1; ?>" class="prev"><span>Previous</span><h5><?php echo e($prev['title']); ?></h5></a><?php else: ?><span></span><?php endif; ?>
        <?php if ($next): ?><a href="blog-post.php?post=<?php echo $idx+1; ?>" class="next"><span>Next</span><h5><?php echo e($next['title']); ?></h5></a><?php endif; ?>
      </div>

      <div class="comments-section">
        <h3 style="font-family:'Playfair Display',serif;color:var(--dark);margin-bottom:24px;"><?php echo e($post['comments'] ?? '0'); ?> Comments</h3>
        <div class="comment">
          <img src="https://images.unsplash.com/photo-1438761681033-6461ffad8d80?w=150&q=80" alt="">
          <div class="comment-body"><h5>Emily Roberts <span>— 2 days ago</span></h5><p>Really useful walkthrough, thanks for sharing the process.</p></div>
        </div>
        <form class="comment-form">
          <h4 style="margin-bottom:16px;color:var(--dark);">Leave A Comment</h4>
          <div class="form-grid">
            <input type="text" placeholder="Your Name" required>
            <input type="email" placeholder="Your Email" required>
          </div>
          <textarea placeholder="Write your comment…" required></textarea>
          <button type="submit" class="btn-primary" style="margin-top:16px;">Post Comment</button>
        </form>
      </div>
    </article>

    <aside>
      <div class="blog-sidebar-box reveal">
        <h4>Search</h4>
        <div class="search-box"><input type="text" placeholder="Search articles…"><button><i class="fas fa-search"></i></button></div>
      </div>
      <div class="blog-sidebar-box reveal">
        <h4>Recent Posts</h4>
        <?php foreach (array_slice($posts, 0, 3) as $i => $b): ?>
        <a href="blog-post.php?post=<?php echo $i; ?>" class="recent-post"><img src="<?php echo e($b['image']); ?>" alt=""><div><h5><?php echo e($b['title']); ?></h5><span><?php echo e($b['date']); ?></span></div></a>
        <?php endforeach; ?>
      </div>
    </aside>
  </div>
</div>

<?php require __DIR__ . '/inc/footer.php'; ?>
