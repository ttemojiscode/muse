<footer class="footer">
  <div class="container footer-grid">
    <div>
      <a href="#home" class="logo light"><?php echo $site_name; ?></a>
      <p>Professional software house for SEO, Digital Marketing, Web Designing & Web Development.</p>
    </div>
    <div>
      <h4>Services</h4>
      <a href="#services">SEO Services</a><a href="#services">Digital Marketing</a>
      <a href="#services">Web Designing</a><a href="#services">Web Development</a>
    </div>
    <div>
      <h4>Company</h4>
      <a href="#why-us">Why Choose Us</a><a href="#portfolio">Portfolio</a>
      <a href="#pricing">Pricing</a><a href="#contact">Contact</a>
    </div>
    <div>
      <h4>Contact</h4>
      <p>📍 <?php echo $site_city; ?><br>✉️ <?php echo $site_email; ?><br>📞 <?php echo $site_phone; ?></p>
    </div>
  </div>
  <div class="footer-bottom">© <?php echo date('Y'); ?> <?php echo $site_name; ?>. All rights reserved.</div>
</footer>

<a class="whatsapp-float" target="_blank" rel="noopener"
   href="https://wa.me/<?php echo $whatsapp; ?>?text=<?php echo urlencode('Hello, I want a free quote for my project.'); ?>">💬</a>

<button class="top-btn" id="topBtn" aria-label="Back to top">↑</button>
<script src="assets/js/main.js"></script>
</body>
</html>
