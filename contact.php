<?php
require_once __DIR__ . '/inc/data.php';
$d = site_data();
$s = $d['settings'] ?? [];
$cp = $d['contact_page'] ?? [];
$page_title = 'Contact Us — ' . ($s['site_name'] ?? 'PrintBe');
$active = 'contact';
require __DIR__ . '/inc/header.php';
?>

<header class="page-header">
  <div class="container">
    <h1>Contact Us</h1>
    <div class="breadcrumb"><a href="index.php">Home</a><span>/</span><span>Contact Us</span></div>
  </div>
</header>

<section class="contact-info-band">
  <div class="container contact-cards">
    <div class="contact-card reveal"><i class="fas fa-location-dot"></i><h4>Visit Us</h4><p><?php echo nl2br(e($s['address'] ?? '')); ?></p></div>
    <div class="contact-card reveal"><i class="fas fa-phone"></i><h4>Call Us</h4><p><?php echo e($s['phone'] ?? ''); ?><br>Mon – Fri, 9am – 6pm</p></div>
    <div class="contact-card reveal"><i class="fas fa-envelope"></i><h4>Email Us</h4><p><?php echo e($s['email'] ?? ''); ?><br>We reply within 24h</p></div>
  </div>
</section>

<section class="contact-main">
  <div class="container">
    <div class="contact-layout">
      <div class="reveal">
        <div class="section-header left">
          <span class="section-label">Get in touch</span>
          <h2 class="section-title">Send Us A Message</h2>
          <p class="section-desc"><?php echo e($cp['intro_desc'] ?? ''); ?></p>
        </div>
        <form class="contact-form" id="contactForm">
          <div class="row2">
            <input type="text" placeholder="Full Name" required>
            <input type="email" placeholder="Email Address" required>
          </div>
          <div class="row2">
            <input type="tel" placeholder="Phone Number">
            <select>
              <option>Select A Service</option>
              <option>Printing Service</option>
              <option>Custom Packaging</option>
              <option>Bulk Order Quote</option>
              <option>Something Else</option>
            </select>
          </div>
          <textarea placeholder="Tell us about your project…" required></textarea>
          <button type="submit" class="btn-primary btn-block">Send Message <i class="fas fa-paper-plane"></i></button>
        </form>
      </div>

      <div class="reveal">
        <div class="contact-map">
          <iframe src="https://maps.google.com/maps?q=New%20York&t=&z=12&ie=UTF8&iwloc=&output=embed" loading="lazy" title="Location map"></iframe>
        </div>
        <div class="contact-hours">
          <h4>Business Hours</h4>
          <?php foreach (($cp['hours'] ?? []) as $h): ?>
          <div class="row"><span><?php echo e($h['day']); ?></span><span><?php echo e($h['time']); ?></span></div>
          <?php endforeach; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php require __DIR__ . '/inc/footer.php'; ?>
