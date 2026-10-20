<footer class="footer">
  <div class="container">
    <div class="footer-newsletter">
      <div><h3>Stay Updated 🚀</h3><p>Digital growth tips aur special offers seedha apne inbox mein payein.</p></div>
      <form class="newsletter-form" onsubmit="return false;">
        <input type="email" placeholder="Your email address" aria-label="Email address">
        <button type="submit" class="btn btn-primary">Subscribe</button>
      </form>
    </div>

    <div class="footer-grid">
      <div class="footer-brand">
        <a href="#home" class="logo light"><?php echo $site_name; ?></a>
        <p>A professional software house helping businesses grow online with SEO, Digital Marketing, Web Designing & Web Development.</p>
        <div class="socials">
          <a href="#" aria-label="Facebook" title="Facebook">f</a>
          <a href="#" aria-label="Instagram" title="Instagram">◎</a>
          <a href="#" aria-label="LinkedIn" title="LinkedIn">in</a>
          <a href="#" aria-label="X (Twitter)" title="X">𝕏</a>
          <a href="#" aria-label="YouTube" title="YouTube">▶</a>
        </div>
      </div>
      <div>
        <h4>Our Services</h4>
        <a href="#services">→ SEO Services</a><a href="#services">→ Digital Marketing</a>
        <a href="#services">→ Web Designing</a><a href="#services">→ Web Development</a>
        <a href="#pricing">→ Pricing Plans</a>
      </div>
      <div>
        <h4>Quick Links</h4>
        <a href="#home">→ Home</a><a href="#why-us">→ Why Choose Us</a>
        <a href="#portfolio">→ Portfolio</a><a href="#contact">→ Get Free Quote</a>
        <a href="#contact">→ Contact Us</a>
      </div>
      <div>
        <h4>Get In Touch</h4>
        <p class="touch"><span>📍</span> <?php echo $site_city; ?></p>
        <p class="touch"><span>✉️</span> <?php echo $site_email; ?></p>
        <p class="touch"><span>📞</span> <?php echo $site_phone; ?></p>
        <p class="touch"><span>🕘</span> Mon – Sat: 9:00 AM – 6:00 PM</p>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container bottom-flex">
      <span>© <?php echo date('Y'); ?> <?php echo $site_name; ?>. All rights reserved.</span>
      <span class="bottom-links"><a href="#">Privacy Policy</a><a href="#">Terms of Service</a><a href="#">Sitemap</a></span>
    </div>
  </div>
</footer>

<a class="whatsapp-float" target="_blank" rel="noopener"
   href="https://wa.me/<?php echo $whatsapp; ?>?text=<?php echo urlencode('Hello, I want a free quote for my project.'); ?>">💬</a>

<button class="top-btn" id="topBtn" aria-label="Back to top">↑</button>
<script src="assets/js/main.js"></script>
</body>
</html>
