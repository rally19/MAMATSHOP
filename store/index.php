<?php
session_start();
include '../config.php';

$loggedin = isset($_SESSION['username']);
$username = $loggedin ? $_SESSION['username'] : '';

include '../fungsi.php';

// Filtai
$type_filter = isset($_GET['type']) ? $_GET['type'] : '';
$manufacturer_filter = isset($_GET['manufacturer']) ? $_GET['manufacturer'] : '';
$min_price = isset($_GET['min_price']) ? (float)$_GET['min_price'] : 0;
$max_price = isset($_GET['max_price']) ? (float)$_GET['max_price'] : 99999999999999;

$sql = "SELECT * FROM products WHERE 1=1";
if (!empty($type_filter)) {
    $sql .= " AND type = '$type_filter'";
}
if (!empty($manufacturer_filter)) {
    $sql .= " AND manufacturer = '$manufacturer_filter'";
}
if ($min_price > 0 || $max_price < 99999999999999) {
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
<?php include_once '../components/navbar-store.php'; ?>
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
<?php include_once '../components/footer.php'; ?>
<script src="../src/js/fungsis.js"></script>
<script src="../src/js/uikit.js"></script>
<script src="../src/js/uikit-icons.js"></script>
</body>
</html>