<?php
require_once 'config.php';

// --- Simple Contact Form Handling (test ke liye) ---
$form_msg = "";
if (($_SERVER['REQUEST_METHOD'] ?? 'GET') === 'POST' && isset($_POST['lead_name'])) {
    $name = htmlspecialchars(trim($_POST['lead_name']));
    $email = htmlspecialchars(trim($_POST['lead_email']));
    $service = htmlspecialchars(trim($_POST['lead_service'] ?? ''));
    $message = htmlspecialchars(trim($_POST['lead_message'] ?? ''));
    if ($name && filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Live site par yahan mail() ya database save add hoga
        $form_msg = "Thank you, $name! Your request for '$service' has been received. We will contact you soon.";
    } else {
        $form_msg = "Please enter a valid name and email.";
    }
}

$services = [
    ['icon'=>'🔍','title'=>'SEO Services','desc'=>'Google par #1 rank karein. On-Page, Off-Page, Technical & Local SEO ke saath organic traffic barhayein.','list'=>['Keyword Research','Technical SEO Audit','Link Building']],
    ['icon'=>'📣','title'=>'Digital Marketing','desc'=>'Google Ads, Social Media Marketing aur Content Marketing se zyada leads aur sales hasil karein.','list'=>['Google Ads / PPC','Social Media Marketing','Email Marketing']],
    ['icon'=>'🎨','title'=>'Web Designing','desc'=>'Modern, fast aur user-friendly UI/UX design jo visitors ko customers mein badal de.','list'=>['UI / UX Design','Landing Pages','E-commerce Design']],
    ['icon'=>'💻','title'=>'Web Development','desc'=>'Business websites, e-commerce stores aur custom web apps — secure, fast aur scalable.','list'=>['Business Websites','E-commerce Stores','Custom Web Apps']],
];
$projects = [
    ['tag'=>'E-commerce','title'=>'Online Fashion Store','result'=>'Sales +180% in 6 months'],
    ['tag'=>'SEO','title'=>'Local Clinic Website','result'=>'Google Traffic +250%'],
    ['tag'=>'Web App','title'=>'Booking Management System','result'=>'Manual work -70%'],
    ['tag'=>'Corporate','title'=>'Real Estate Company Site','result'=>'Leads +140%'],
];
$plans = [
    ['name'=>'Starter','price'=>'PKR 49,999','per'=>'/ project','features'=>['5 Pages Website','Mobile Responsive','Basic SEO Setup','Contact Form','1 Month Support'],'hot'=>false],
    ['name'=>'Business','price'=>'PKR 99,999','per'=>'/ project','features'=>['10 Pages Website','Advanced SEO Setup','Blog + CMS','WhatsApp Integration','3 Months Support'],'hot'=>true],
    ['name'=>'Premium','price'=>'PKR 199,999','per'=>'/ project','features'=>['Unlimited Pages','E-commerce / Web App','Complete Digital Marketing','Speed Optimization','12 Months Support'],'hot'=>false],
];
include 'includes/header.php';
?>

<!-- ================= HERO ================= -->
<section class="hero" id="home">
  <div class="container hero-grid">
    <div class="reveal">
      <span class="badge">🚀 Trusted Software House in <?php echo $site_city; ?></span>
      <h1>We Build Websites That <span class="grad">Grow Your Business</span></h1>
      <p>Professional SEO, Digital Marketing, Web Designing & Development services — ek hi jagah, ek expert team ke saath.</p>
      <div class="hero-btns">
        <a href="#contact" class="btn btn-primary">Get Free Quote →</a>
        <a href="#portfolio" class="btn btn-outline">View Our Work</a>
      </div>
      <div class="hero-trust">⭐⭐⭐⭐⭐ <b>4.9/5</b> from 200+ happy clients</div>
    </div>
    <div class="hero-card reveal">
      <h3>Free Website Audit</h3>
      <p>Apni website ka free SEO & speed check karwayein.</p>
      <ul><li>✅ Complete SEO Report</li><li>✅ Speed Analysis</li><li>✅ Competitor Check</li></ul>
      <a href="#contact" class="btn btn-primary w100">Claim Free Audit</a>
    </div>
  </div>
</section>

<!-- ================= STATS ================= -->
<section class="stats"><div class="container stats-grid">
  <div><h2><span class="counter" data-target="250">0</span>+</h2><p>Projects Completed</p></div>
  <div><h2><span class="counter" data-target="200">0</span>+</h2><p>Happy Clients</p></div>
  <div><h2><span class="counter" data-target="8">0</span>+</h2><p>Years Experience</p></div>
  <div><h2><span class="counter" data-target="98">0</span>%</h2><p>Client Satisfaction</p></div>
</div></section>

<!-- ================= SERVICES ================= -->
<section class="section" id="services">
  <div class="container">
    <div class="sec-head reveal"><span class="badge">Our Services</span><h2>Everything Your Business Needs to <span class="grad">Succeed Online</span></h2></div>
    <div class="cards">
      <?php foreach($services as $s): ?>
      <article class="card reveal">
        <div class="card-icon"><?php echo $s['icon']; ?></div>
        <h3><?php echo $s['title']; ?></h3><p><?php echo $s['desc']; ?></p>
        <ul><?php foreach($s['list'] as $li) echo "<li>✓ $li</li>"; ?></ul>
        <a href="#contact" class="card-link">Learn More →</a>
      </article>
      <?php endforeach; ?>
    </div>
  </div>
</section>

<!-- ================= WHY US ================= -->
<section class="section alt" id="why-us">
  <div class="container why-grid">
    <div class="reveal"><span class="badge">Why Choose Us</span><h2>Ek Team Jo Sirf Website Nahi, <span class="grad">Results Deti Hai</span></h2>
      <p>Hum design, development aur marketing ko mila kar aisi website banate hain jo khoobsurat bhi ho aur paisa bhi kamaye.</p></div>
    <div class="why-list">
      <div class="why-item reveal"><b>⚡ Fast & SEO Ready</b><span>Har site speed-optimized aur Google-friendly.</span></div>
      <div class="why-item reveal"><b>🎯 Result Focused</b><span>Traffic, leads aur sales — yehi hamari kamyabi hai.</span></div>
      <div class="why-item reveal"><b>🤝 Dedicated Support</b><span>Project ke baad bhi mukammal support.</span></div>
      <div class="why-item reveal"><b>💰 Transparent Pricing</b><span>Koi hidden charges nahi, pehle din se clear quote.</span></div>
    </div>
  </div>
</section>

<!-- ================= PROCESS ================= -->
<section class="section"><div class="container">
  <div class="sec-head reveal"><span class="badge">Our Process</span><h2>Simple 4-Step Process</h2></div>
  <div class="steps">
    <div class="step reveal"><span>01</span><h3>Discovery</h3><p>Aapke business aur goals ko samajhte hain.</p></div>
    <div class="step reveal"><span>02</span><h3>Design</h3><p>Modern light design aapki approval ke liye.</p></div>
    <div class="step reveal"><span>03</span><h3>Development</h3><p>Fast, secure aur responsive coding.</p></div>
    <div class="step reveal"><span>04</span><h3>Launch & Growth</h3><p>SEO + marketing ke saath live aur grow.</p></div>
  </div>
</div></section>

<!-- ================= PORTFOLIO ================= -->
<section class="section alt" id="portfolio"><div class="container">
  <div class="sec-head reveal"><span class="badge">Portfolio</span><h2>Recent Work & Results</h2></div>
  <div class="cards">
    <?php foreach($projects as $p): ?>
    <article class="card project reveal"><span class="tag"><?php echo $p['tag']; ?></span>
      <h3><?php echo $p['title']; ?></h3><p class="result">📈 <?php echo $p['result']; ?></p></article>
    <?php endforeach; ?>
  </div>
</div></section>

<!-- ================= TESTIMONIALS ================= -->
<section class="section"><div class="container">
  <div class="sec-head"><span class="badge">Testimonials</span><h2>Clients Kya Kehte Hain</h2></div>
  <div class="slider" id="slider">
    <div class="slide active"><p>"Hamari website aur SEO ke baad online orders double ho gaye. Bohot professional team hai."</p><b>— Ahmed Raza, Fashion Store Owner</b></div>
    <div class="slide"><p>"Design, speed aur support — teeno top class. Har choti baat par foran response milta hai."</p><b>— Dr. Sara Khan, Clinic Director</b></div>
    <div class="slide"><p>"Google par pehle page par aa gaye hain. Investment ka poora faida mila."</p><b>— Bilal Hussain, Real Estate CEO</b></div>
  </div>
  <div class="dots" id="dots"></div>
</div></section>

<!-- ================= PRICING ================= -->
<section class="section alt" id="pricing"><div class="container">
  <div class="sec-head reveal"><span class="badge">Pricing</span><h2>Clear & Affordable Packages</h2></div>
  <div class="cards pricing">
    <?php foreach($plans as $plan): ?>
    <article class="card price-card reveal <?php echo $plan['hot']?'hot':''; ?>">
      <?php if($plan['hot']) echo '<span class="tag hot-tag">Most Popular</span>'; ?>
      <h3><?php echo $plan['name']; ?></h3>
      <div class="price"><?php echo $plan['price']; ?> <small><?php echo $plan['per']; ?></small></div>
      <ul><?php foreach($plan['features'] as $f) echo "<li>✓ $f</li>"; ?></ul>
      <a href="#contact" class="btn <?php echo $plan['hot']?'btn-primary':'btn-outline'; ?> w100">Choose Plan</a>
    </article>
    <?php endforeach; ?>
  </div>
</div></section>

<!-- ================= FAQ ================= -->
<section class="section"><div class="container narrow">
  <div class="sec-head"><span class="badge">FAQ</span><h2>Aksar Poochay Janay Walay Sawal</h2></div>
  <div class="faq-item"><button class="faq-q">Website banne mein kitna time lagega? <span>+</span></button><div class="faq-a"><p>Business website aam tor par 7-14 din mein tayyar ho jati hai. E-commerce ya custom project mein zyada time lag sakta hai.</p></div></div>
  <div class="faq-item"><button class="faq-q">Kya aap SEO bhi shamil karte hain? <span>+</span></button><div class="faq-a"><p>Ji haan, har website ke saath basic SEO setup free hai. Advanced monthly SEO packages bhi available hain.</p></div></div>
  <div class="faq-item"><button class="faq-q">Payment ka tareeqa kya hai? <span>+</span></button><div class="faq-a"><p>50% advance aur 50% project complete hone par. Bank transfer, JazzCash aur EasyPaisa sab accepted hain.</p></div></div>
  <div class="faq-item"><button class="faq-q">Kya website ke baad support milega? <span>+</span></button><div class="faq-a"><p>Ji, har package mein free support period shamil hai, us ke baad affordable maintenance plans available hain.</p></div></div>
</div></section>

<!-- ================= CONTACT ================= -->
<section class="section alt" id="contact"><div class="container contact-grid">
  <div class="reveal"><span class="badge">Contact Us</span><h2>Get Your <span class="grad">Free Quote</span> Today</h2>
    <p>Form bharein, hum 24 ghantay ke andar reply karenge.<br><br>✉️ <?php echo $site_email; ?><br>📞 <?php echo $site_phone; ?><br>📍 <?php echo $site_city; ?></p></div>
  <form class="contact-form reveal" method="POST" action="#contact">
    <?php if($form_msg) echo "<div class='form-msg'>".htmlspecialchars($form_msg)."</div>"; ?>
    <input type="text" name="lead_name" placeholder="Your Name *" required>
    <input type="email" name="lead_email" placeholder="Your Email *" required>
    <select name="lead_service"><option>SEO Services</option><option>Digital Marketing</option><option>Web Designing</option><option>Web Development</option><option>Complete Package</option></select>
    <textarea name="lead_message" rows="4" placeholder="Tell us about your project..."></textarea>
    <button type="submit" class="btn btn-primary w100">Send Request →</button>
  </form>
</div></section>

<?php include 'includes/footer.php'; ?>
