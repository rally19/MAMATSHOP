<?php
include '../config.php';
include '../fungsi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($id)) {
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Woops! Produk tidak ditemukan.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
    }
} else {
    echo "<script>alert('Id produk tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
}
?>




<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center uk-margin-bottom">Product Details</h2>
    <div class="uk-card uk-card-default uk-box-shadow-small">
        <div class="uk-card-body">
            <h3 class="uk-card-title uk-heading-bullet"><?php echo $product['name']; ?></h3>
            <div class="uk-grid-small uk-child-width-1-2@s uk-text-small" uk-grid>
                <div>
                    <p><strong>Tipe:</strong> <?php echo $product['type']; ?></p>
                    <p><strong>Pembuat:</strong> <?php echo $product['manufacturer']; ?></p>
                    <p><strong>Harga:</strong> <?php echo formatUang($product['price']); ?></p>
                    <p><strong>Stok:</strong> <?php echo $product['stock']; ?></p>
                    <p><strong>Deskripsi:</strong> <?php echo $product['description']; ?></p>
                    <br><br><br>
                    <a href="index.php?action=list-produk" class="uk-button uk-button-primary uk-box-shadow-small">Kembali</a>
                </div>
                <div>
                    <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="uk-width-1-1">
                </div>
            </div>
        </div>
    </div>
</div>
