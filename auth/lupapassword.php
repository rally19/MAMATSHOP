<?php 
session_start(); 
 
 if (isset($_SESSION['username'])) {
   header("Location: ../");
   exit();
 } else {
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
<div class="uk-section-secondary uk-background-cover uk-preserve-color">
<div uk-sticky="start: 170; animation: uk-animation-slide-top; sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky; cls-inactive: uk-navbar-transparent uk-light; end: ! *">
<nav class="uk-navbar-container" uk-navbar>
  <div class="uk-navbar-left uk-margin-left">
    <a class="uk-navbar-item uk-logo uk-text-bold" href="#">MAMATSHOP</a>
  </div>
  <div class="uk-navbar-right uk-margin-right">
    <ul class="uk-navbar-nav uk-visible@m">
      <li><a href="../">HOME</a></li>
      <li><a href="#">TENTANG KAMI</a></li>
      <li><a href="../store">TOKO</a></li>
      <li><a href="#">BUSSINESS</a></li>
    </ul>
    <div class="uk-visible@m">
      <input class="uk-input uk-form-width-small uk-width-1-1" type="text" placeholder="Input" aria-label="Input">
    </div>
    <div class="uk-visible@m">
      <a class="uk-navbar-toggle" href="#" uk-search-icon></a>
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
          <li class="uk-active"><a href="#">Active</a></li>
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
    <!-- Main Content -->
    <div class="uk-section uk-section-default" data-src="../src/img/tanki1.jpg" uk-img>
        <div class="uk-container">
                <div  class="uk-card uk-card-default uk-card-body">
                  <div>
                  <form action="../auth/proses/proseslupa.php" method="POST">
                        <h2 class="uk-card-title">Ganti Password</h2>
                        <div class="uk-margin">
                            <input class="uk-input" type="text" placeholder="Username" name="username" required>
                        </div>
                        <div class="uk-margin">
                            <input class="uk-input" type="email" placeholder="Email" name="email" required>
                        </div>
                        <div class="uk-margin">
                            <input class="uk-input" type="password" placeholder="Password" name="password" required>
                        </div>
                        <div class="uk-margin">
                            <input class="uk-input" type="password" placeholder="Confirm Password" name="cpassword" required>
                        </div>
                        <div class="uk-margin">
                            <button class="uk-button uk-button-primary uk-width-1-1" name="submit">Ganti</button>
                        </div>
                        <p class="uk-text-small"><a href="loginregister.php">Gak jadi.</a></p>
                    </form>
                  </div>
                </div>
                </div>

        </div>
    </div>
<footer class="uk-section uk-section-secondary uk-padding-remove-bottom">
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
        <p class="uk-text-muted">Email: info@company.com<br>Phone: +1 234 567 890</p>
      </div>
    </div>
    <div class="uk-section uk-section-xsmall">
    <hr>
      <div class="uk-flex uk-flex-between uk-flex-middle">
        <p class="uk-text-small uk-text-muted">&copy; 2023 Company Name. All rights reserved.</p>
        <p class="uk-text-small uk-text-muted">123 Main Street, City, Country</p>
      </div>
    </div>
  </div>
</footer>
</div>
<script src="../src/js/fungsis.js"></script>
<script src="../src/js/uikit.js"></script>
<script src="../src/js/uikit-icons.js"></script>
</body>
</html>