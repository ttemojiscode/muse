<?php require_once __DIR__ . '/../config.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?php echo $site_name; ?> — Web Development, SEO & Digital Marketing Services</title>
<meta name="description" content="<?php echo $site_name; ?> is a professional software house offering SEO, Digital Marketing, Web Designing and Web Development services.">
<meta property="og:title" content="<?php echo $site_name; ?> — <?php echo $site_tagline; ?>">
<meta property="og:description" content="We build websites that grow your business. SEO, Digital Marketing, Web Design & Development.">
<meta property="og:type" content="website">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" href="assets/css/style.css">
</head>
<body>

<header class="header" id="header">
  <div class="container nav-wrap">
    <a href="#home" class="logo"><?php echo explode(' ', $site_name)[0]; ?><span><?php echo isset(explode(' ', $site_name)[1]) ? explode(' ', $site_name)[1] : ''; ?></span></a>
    <nav class="nav" id="nav">
      <a href="#home">Home</a>
      <a href="#services">Services</a>
      <a href="#why-us">Why Us</a>
      <a href="#portfolio">Portfolio</a>
      <a href="#pricing">Pricing</a>
      <a href="#contact">Contact</a>
      <a href="#contact" class="btn btn-primary btn-sm nav-cta">Get Free Quote</a>
    </nav>
    <button class="menu-btn" id="menuBtn" aria-label="Menu">☰</button>
  </div>
</header>
