<?php 
include '../fungsi.php';
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
<?php include_once '../components/navbar-index.php'; ?>
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