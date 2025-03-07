<?php
session_start(); 
include '../config.php';

if (!isset($_SESSION['username'])) {
   header("Location: ../auth/haruslogin.php");
   exit();
}  else {
   $loggedin = isset($_SESSION['username']);
   $username = $loggedin ? $_SESSION['username'] : '';
}

include '../fungsi.php';

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
if ($cart_total_quantity < 1) {
  $cart_total_quantity = 0;
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT id FROM carts WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cart = $result->fetch_assoc();
    $cart_id = $cart['id'];

    $sql = "SELECT cart_items.*, products.name, products.price 
            FROM cart_items 
            JOIN products ON cart_items.product_id = products.id 
            WHERE cart_items.cart_id = $cart_id";
    $result = $conn->query($sql);

    $total_price = 0;
    while ($row = $result->fetch_assoc()) {
        $total_price += $row['price'] * $row['quantity'];
    }
} else {
    $total_price = 0;
    $cart_items = [];
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
<?php include_once '../components/navbar-store.php'; ?>
<div class="uk-container uk-margin-top">
    <h1>Items in Cart</h1>
    
    <table class="uk-table uk-table-striped uk-table-hover uk-box-shadow-small">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Harga</th>
                <th>Total Harga</th>
                <th>Jumlah</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            if (isset($cart_id)) {
                $result->data_seek(0); 
                while ($row = $result->fetch_assoc()): 
                    $item_total_price = $row['price'] * $row['quantity'];
            ?>
                <tr>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo formatUang($row['price']); ?></td>
                    <td><?php echo formatUang($item_total_price); ?></td>
                    <td>
                        <a href="proses/update_keranjang.php?action=decrease&cart_item_id=<?php echo $row['id']; ?>" class="uk-icon-button" uk-icon="minus"></a>
                        <?php echo $row['quantity']; ?>
                        <a href="proses/update_keranjang.php?action=increase&cart_item_id=<?php echo $row['id']; ?>" class="uk-icon-button" uk-icon="plus"></a>
                    </td>
                    <td>
                    <a href="produk_details.php?id=<?php echo $row['product_id']; ?>" class="uk-icon-button uk-button-primary" uk-icon="eye"></a>
                       <a href="proses/update_keranjang.php?action=delete&cart_item_id=<?php echo $row['id']; ?>" class="uk-icon-button uk-button-danger" uk-icon="trash" onclick="return confirm('Are you sure you want to delete this item?')"></a>
                    </td>
                </tr>
                <?php endwhile;
            } else {
                echo '<tr><td colspan="5" class="uk-text-center">Keranjang Anda kosong.</td></tr>';
            }
            ?>
        </tbody>
    </table>

    <h1>Order Summary</h1>
    <div class="uk-flex uk-flex-between uk-align-center uk-margin-bottom">
        <h3>Total Price: <?php echo formatUang($total_price); ?></h3>
        <button class="uk-button uk-button-primary" disabled>Order Now</button>
    </div>
    <a href="proses/update_keranjang.php?action=delete_all" class="uk-button uk-button-danger" onclick="return confirm('Are you sure you want to delete all items in your cart?')">Delete All Items</a>
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


<?php

?>

