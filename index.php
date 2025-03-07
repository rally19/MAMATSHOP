<?php
include 'fungsi.php';
session_start();
$loggedin = isset($_SESSION['username']);
$username = $loggedin ? $_SESSION['username'] : '';
?>
 
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/3xhumed/mega-games-pack-39/256/Call-of-Duty-World-at-War-11-icon.png">
    <link rel="stylesheet" type="text/css" href="./src/css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="./src/css/uikit-mod.css">
    <link rel="stylesheet" type="text/css" href="./src/css/style.css">
    <title>MAMATSHOP</title>
</head>
<body>
<div class="uk-section-secondary uk-background-cover uk-preserve-color">
<?php include_once 'components/navbar-index.php'; ?>
  <section class="hero-section">
    <div class="hero-content">
      <h1 class="uk-heading-primary my-text-white">Selamat datang di <span class=" uk-text-bold">MAMATSHOP</span></h1>
      <p class="uk-text-lead my-text-white">Dealer mesin bersenjata lokal terpercaya Anda.</p>
    </div>
    <div style="background-color:black; opacity:0.5;">
    <video class="hero-background" autoplay muted>
      <source src="src/vid/tanks1.mp4" type="video/mp4">
    </video>
    <video class="hero-background" autoplay muted>
      <source src="src/vid/tanks2.mp4" type="video/mp4">
    </video>
    <video class="hero-background" autoplay muted>
      <source src="src/vid/tanks3.mp4" type="video/mp4">
    </video>
    </div>
  </section>
<?php include_once 'components/footer.php'; ?>
</div>
<script src="./src/js/fungsis.js"></script>
<script src="./src/js/uikit.js"></script>
<script src="./src/js/uikit-icons.js"></script>
</body>
</html>