<?php
session_start(); 
 
if (!isset($_SESSION['username'])) {
   header("Location: ../auth/haruslogin.php");
   exit();
}  else {
   $loggedin = isset($_SESSION['username']);
   $username = $loggedin ? $_SESSION['username'] : '';
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/3xhumed/mega-games-pack-39/256/Call-of-Duty-World-at-War-11-icon.png">
    <link rel="stylesheet" type="text/css" href="../src/css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/uikit-mod.css">
    <link rel="stylesheet" type="text/css" href="../src/css/style.css">
    <title>MAMATSHOP</title>
</head>
<body >
<div class="uk-section-default uk-background-cover uk-preserve-color">
<div uk-sticky>
<nav class="uk-navbar-container" uk-navbar style="z-index: 50000;">
  <div class="uk-navbar-left uk-margin-left">
    <a class="uk-navbar-item uk-logo uk-text-bold" href="#">MAMATSHOP</a>
    <ul class="uk-navbar-nav uk-visible@m">
      <li><a href="../">HOME</a></li>
      <li><a href="#">TENTANG KAMI</a></li>
      <li><a href="../store">TOKO</a></li>
      <li><a href="#">BUSSINESS</a></li>
    </ul>
  </div>
  <div class="uk-navbar-right uk-margin-right">
    
    <div class="uk-visible@m">
      <input class="uk-input uk-form-width-small uk-width-1-1" type="text" placeholder="Input" aria-label="Input">
    </div>
    <div class="uk-visible@m">
      <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
    </div>
    <div class="uk-visible@m">
    <a class="uk-navbar-toggle" href="#" uk-icon="cart"></a>
    </div>
    <div class="uk-navbar-item uk-visible@m">
      <div>
        <a class="uk-navbar-toggle" href="#" uk-icon="user"></a>
        <div uk-dropdown="pos: bottom-right; delay-hide: 400; animation: uk-animation-slide-top-small; animate-out: true; offset: -1">
        <ul class="uk-nav uk-dropdown-nav">
            <?php if ($loggedin): ?>
            <li><?php echo htmlspecialchars($username); ?></li>
            <li class="my-text-silver"><?php echo $_SESSION['level']; ?></li>
            <li class="uk-nav-divider"></li>
            <li><a href="#"><span uk-icon="user"></span> Account</a></li>
            <li><a href="#"><span uk-icon="cog"></span> Settings</a></li>
            <li class="uk-nav-divider"></li>
            <?php if ($_SESSION['level']=='admin'): ?>
            <li><a href="../dashboard"><span uk-icon="server"></span> Dashboard</a></li>
            <li class="uk-nav-divider"></li>
            <?php endif; ?>
            <li class="uk-nav-divider"></li>
            <li><a href="../auth/proses/proseslogout.php"><span uk-icon="sign-out"></span> Log Out</a></li>
            <?php endif; ?>
            <?php if (!$loggedin): ?>
            <li><a href="../auth/loginregister.php"><span uk-icon="sign-in"></span> Login/Register</a></li>
            <?php endif; ?>
          </ul>
        </div>
      </div>
    </div>
    
    <a class="uk-navbar-toggle uk-navbar-toggle-animate uk-hidden@m" uk-navbar-toggle-icon href="#" uk-toggle="target: #offcanvas-nav-primary"></a>
    <div id="offcanvas-nav-primary" uk-offcanvas="mode: slide">
      <div class="uk-offcanvas-bar uk-flex uk-flex-column">
        <ul class="uk-nav uk-nav-primary uk-nav-center uk-margin-auto-vertical">
          <li class="uk-active"><a class="uk-navbar-item uk-logo uk-text-bold" href="javascript:void(0)">MAMATSHOP</a></li>
          <li class="uk-parent"><a href="#">Active</a></li>
          <li class="uk-parent">
            <a href="#">Parent</a>
            <ul class="uk-nav-sub">
              <li><a href="#">Sub item</a></li>
              <li><a href="#">Sub item</a></li>
            </ul>
          </li>
          <li class="uk-nav-header">Header</li>
          <li><a href="#"><span class="uk-margin-xsmall-right" uk-icon="icon: table"></span> Item</a></li>
          <li><a href="#"><span class="uk-margin-xsmall-right" uk-icon="icon: thumbnails"></span> Item</a></li>
          <li class="uk-nav-divider"></li>
          <li><a href="#"><span class="uk-margin-xsmall-right" uk-icon="icon: trash"></span> Item</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>
</div>
<div class="uk-container uk-margin-large-top">
    <br>
                    <h1 class="uk-text-center">Keranjang</h1>
                    <h4 class="uk-text-center">Keranjang anda kosong! Silahkan kembali ke <a href="../store">halaman toko</a></h4>
                    <br><br><br>
            </div>
        </div>
    </div>
    </div>
<footer class="uk-section uk-section-secondary uk-padding-remove-bottom uk-margin-top">
  <div class="uk-container">
    <div class="uk-grid uk-child-width-1-3@m" uk-grid>
      <div>
        <h3 class="uk-text-bold">MAMATSHOP</h3>
        <p class="uk-text-muted">MAMATSHOP. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div>
        <h4 class="uk-text-bold">LINKS</h4>
        <ul class="uk-list">
          <li><a href="#" class="uk-link-text">Home</a></li>
          <li><a href="#" class="uk-link-text">Tentang kami</a></li>
          <li><a href="#" class="uk-link-text">Katalog</a></li>
          <li><a href="#" class="uk-link-text">Bussiness</a></li>
        </ul>
      </div>
      <div>
        <h4 class="uk-text-bold">FOLLOW US</h4>
        <div class="uk-margin">
          <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="facebook"></a>
          <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="twitter"></a>
          <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="instagram"></a>
          <a href="#" class="uk-icon-button uk-margin-small-right" uk-icon="linkedin"></a>
        </div>
        <p class="uk-text-muted">Email: mamatshop@leonelrs.my.id<br>Phone: +1 234 567 890</p>
      </div>
    </div>
    <div class="uk-section uk-section-xsmall">
    <hr>
      <div class="uk-flex uk-flex-between uk-flex-middle">
        <p class="uk-text-small uk-text-muted">&copy; 2023 Mamatshop. All rights reserved.</p>
        <p class="uk-text-small uk-text-muted">123 Main Street, City, Country</p>
      </div>
    </div>
  </div>
</footer>

<script src="../src/js/fungsis.js"></script>
<script src="../src/js/uikit.js"></script>
<script src="../src/js/uikit-icons.js"></script>
</body>
</html>