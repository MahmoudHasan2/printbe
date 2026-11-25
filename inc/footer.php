<?php $s = site_data()['settings'] ?? []; ?>
<footer class="footer" id="contact-footer">
  <div class="container footer-grid">
    <div class="footer-brand">
      <div class="nav-logo-text"><?php echo e($s['brand_name'] ?? 'Print'); ?><span><?php echo e($s['brand_accent'] ?? 'Be'); ?></span></div>
      <p><?php echo e($s['footer_about'] ?? ''); ?></p>
      <div class="footer-social">
        <a href="<?php echo e($s['facebook'] ?? '#'); ?>"><i class="fab fa-facebook-f"></i></a>
        <a href="<?php echo e($s['twitter'] ?? '#'); ?>"><i class="fab fa-x-twitter"></i></a>
        <a href="<?php echo e($s['instagram'] ?? '#'); ?>"><i class="fab fa-instagram"></i></a>
        <a href="<?php echo e($s['pinterest'] ?? '#'); ?>"><i class="fab fa-pinterest-p"></i></a>
      </div>
    </div>
    <div><h4 class="footer-title">Information</h4><ul class="footer-links"><li><a href="about.php">About Us</a></li><li><a href="blog.php">Our Blog</a></li><li><a href="#">Start A Return</a></li><li><a href="contact.php">Contact Us</a></li><li><a href="#">FAQs Page</a></li></ul></div>
    <div><h4 class="footer-title">Useful Links</h4><ul class="footer-links"><li><a href="#">My Account</a></li><li><a href="#">Shipping</a></li><li><a href="contact.php">Contact &amp; Support</a></li><li><a href="shop.php">All Products</a></li></ul></div>
    <div>
      <h4 class="footer-title">Keep In Touch</h4>
      <ul class="footer-links footer-contact">
        <li><i class="fas fa-location-dot"></i> <?php echo e($s['address'] ?? ''); ?></li>
        <li><i class="fas fa-envelope"></i> <?php echo e($s['email'] ?? ''); ?></li>
        <li><i class="fas fa-phone"></i> <?php echo e($s['phone'] ?? ''); ?></li>
      </ul>
      <div class="footer-payments"><span>Visa</span><span>Mastercard</span><span>PayPal</span><span>Apple Pay</span></div>
    </div>
  </div>
  <div class="footer-bottom"><p>&copy; <?php echo date('Y'); ?> <?php echo e($s['site_name'] ?? 'PrintBe'); ?>. All rights reserved. Designed with <i class="fas fa-heart" style="color:var(--primary-light);"></i> for printers.</p></div>
</footer>

<script src="assets/script.js"></script>
</body>
</html>
