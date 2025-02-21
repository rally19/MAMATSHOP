<?php
session_start();
include '../config.php';

$loggedin = isset($_SESSION['username']);
$username = $loggedin ? $_SESSION['username'] : '';

if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $sql = "SELECT SUM(quantity) as total_quantity FROM cart_items 
          JOIN carts ON cart_items.cart_id = carts.id 
          WHERE carts.user_id = $user_id";
  $result = $conn->query($sql);
  $cart_total_quantity = $result->fetch_assoc()['total_quantity'];
} else {
  $cart_total_quantity = 0;
}

// Filtai
$type_filter = isset($_GET['type']) ? $_GET['type'] : '';
$manufacturer_filter = isset($_GET['manufacturer']) ? $_GET['manufacturer'] : '';
$min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : PHP_FLOAT_MAX;

$sql = "SELECT * FROM products WHERE 1=1";
if (!empty($type_filter)) {
    $sql .= " AND type = '$type_filter'";
}
if (!empty($manufacturer_filter)) {
    $sql .= " AND manufacturer = '$manufacturer_filter'";
}
if ($min_price > 0 || $max_price < PHP_FLOAT_MAX) {
    $sql .= " AND price BETWEEN $min_price AND $max_price";
}

$result = $conn->query($sql);
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
<body>
<div class="uk-section-default uk-background-cover uk-preserve-color">
<div uk-sticky>
<nav class="uk-navbar-container" uk-navbar style="z-index: 50000;">
  <div class="uk-navbar-left uk-margin-left">
    <a class="uk-navbar-item uk-logo uk-text-bold" href="#">MAMATSHOP</a>
    <ul class="uk-navbar-nav uk-visible@m">
      <li><a href="../">HOME</a></li>
      <li><a href="#">TENTANG KAMI</a></li>
      <li><a href="#">TOKO</a></li>
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
    <a class="uk-navbar-toggle" href="keranjang.php" uk-icon="cart">
      <span id="cart-badge" class="uk-badge"><?php echo $cart_total_quantity; ?></span>
    </a>
    </a>
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
              <?php if ($_SESSION['level'] == 'admin'): ?>
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
<div class="uk-container uk-margin-remove-left uk-margin-remove-right uk-margin-large-top uk-width-1-1">
  <div class="uk-grid-small" uk-grid>
    <div class="uk-width-1-4@m">
      <div class="uk-card uk-card-default uk-card-body uk-card-hover" uk-sticky="offset: 90; end: true" style="z-index: 500;">
        <h4 class="uk-card-title">Filter</h4>
        <form method="GET" action="">
          <div class="uk-margin">
            <label class="uk-form-label">Tipe</label>
            <select class="uk-select" name="type">
              <option value="">Semua</option>
              <option value="LFT" <?php echo ($type_filter == 'LFT') ? 'selected' : ''; ?>>LFT</option>
              <option value="MBT" <?php echo ($type_filter == 'MBT') ? 'selected' : ''; ?>>MBT</option>
              <option value="IFW" <?php echo ($type_filter == 'IFW') ? 'selected' : ''; ?>>IFW</option>
            </select>
          </div>
          <div class="uk-margin">
            <label class="uk-form-label">Pembuat</label>
            <select class="uk-select" name="manufacturer">
              <option value="">Semua</option>
              <option value="LFT" <?php echo ($manufacturer_filter == 'LFT') ? 'selected' : ''; ?>>LFT</option>
              <option value="BUMN" <?php echo ($manufacturer_filter == 'BUMN') ? 'selected' : ''; ?>>BUMN</option>
              <option value="LeoFact" <?php echo ($manufacturer_filter == 'LeoFact') ? 'selected' : ''; ?>>LeoFact</option>
            </select>
          </div>
          <div class="uk-margin">
            <label class="uk-form-label">Harga</label>
            <input class="uk-input" type="number" name="min_price" placeholder="Harga min." value="<?php echo $min_price; ?>">
            <input class="uk-input uk-margin-small-top" type="number" name="max_price" placeholder="Harga maks." value="<?php echo $max_price; ?>">
          </div>
          <button class="uk-button uk-button-primary uk-width-1-1">Apply</button>
        </form>
      </div>
    </div>
    <div class="uk-width-expand">
  <div class="uk-grid-small uk-child-width-1-4@l uk-child-width-1-3@m uk-child-width-1-2@s" uk-grid>
    <?php while ($row = $result->fetch_assoc()): ?>
      <div>
        <div class="uk-card-small uk-card-default uk-card-hover uk-flex uk-flex-column uk-height-1-1">
          <div class="uk-card-media-top">
            <img src="<?php echo $row['image_url']; ?>" alt="<?php echo $row['name']; ?>">
          </div>
          <div class="uk-card-body uk-flex-1">
            <h3 class="uk-card-title uk-margin-small uk-text-truncate"><?php echo $row['name']; ?></h3>
            <p class="uk-text-meta uk-margin-remove">Tipe: <?php echo $row['type']; ?></p>
            <p class="uk-text-meta uk-margin-remove">Pembuat: <?php echo $row['manufacturer']; ?></p>
            <p class="uk-text-bold uk-margin-small">Rp <?php echo number_format($row['price'], 2); ?></p>
          </div>
          <div class="uk-card-footer uk-text-center">
          <button class="uk-button uk-button-primary" onclick="window.location.href='produk_details.php?id=<?php echo $row['id']; ?>'">Details</button>
          <form action="proses/add_keranjang.php" method="POST" style="display: inline;">
            <input type="hidden" name="product_id" value="<?php echo $row['id']; ?>">
            <button type="submit" class="uk-button uk-button-primary" uk-icon="cart"></button>
          </form>
        </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
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