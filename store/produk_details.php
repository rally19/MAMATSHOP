<?php
session_start();
include '../config.php';

if (!isset($_GET['id'])) {
    header("Location: ./"); 
    exit();
} else {
    $loggedin = isset($_SESSION['username']);
    $username = $loggedin ? $_SESSION['username'] : '';
 }

include '../fungsi.php';

$product_id = $_GET['id'];

$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $product_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header("Location: ./");
    exit();
}

$product = $result->fetch_assoc();
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
    <title><?php echo htmlspecialchars($product['name']); ?> - MAMATSHOP</title>
</head>
<body>
<div class="uk-section-default uk-background-cover uk-preserve-color">
    <?php include_once '../components/navbar-store.php'; ?>
    <div class="uk-container uk-margin-large-top">
    <div class="uk-grid-large uk-child-width-1-2@m uk-grid-match" uk-grid>
        <div>
            <div class="uk-card uk-card-default uk-card-body uk-text-center">
                <img src="<?php echo htmlspecialchars($product['image_url']); ?>" alt="<?php echo htmlspecialchars($product['name']); ?>" class="uk-width-1-1 uk-border-rounded">
                <a href="#" onclick="history.go(-1)" class="uk-button uk-button-default uk-margin-small-top"><span uk-icon="icon: arrow-left"></span> Kembali</a>
            </div>
        </div>
        <div>
        <div class="uk-card uk-card-default uk-card-body">
            <h3 class="uk-heading-bullet uk-margin-small-bottom"><?php echo htmlspecialchars($product['name']); ?></h3>
            <ul class="uk-list uk-list-divider">
                <li><strong>Tipe:</strong> <?php echo htmlspecialchars($product['type']); ?></li>
                <li><strong>Pembuat:</strong> <?php echo htmlspecialchars($product['manufacturer']); ?></li>
                <li><strong>Harga:</strong> Rp <?php echo number_format($product['price'], 2); ?></li>
                <li><strong>Stock:</strong> <?php echo htmlspecialchars($product['stock']); ?></li>
            </ul>
            <p class="uk-margin-small-top"><?php echo htmlspecialchars($product['description']); ?></p>
            <br><br><br>
            <form action="proses/add_keranjang.php" method="POST" style="display: inline;">
                <input type="hidden" name="product_id" value="<?php echo $product['id']; ?>">
                <button type="submit" class="uk-button uk-button-primary uk-width-1-1 uk-box-shadow-small">
                    <span uk-icon="icon: cart"></span> Tambah ke Keranjang
                </button>
            </form>
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