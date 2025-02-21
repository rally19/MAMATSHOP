<?php
include '../config.php';
include '../fungsi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($id)) {
    $deleteCartItems = "DELETE FROM cart_items WHERE product_id = '$id'";
    $resultCart = mysqli_query($conn, $deleteCartItems);

    if ($resultCart) {
        $deleteProduct = "DELETE FROM products WHERE id = '$id'";
        $resultProduct = mysqli_query($conn, $deleteProduct);

        if ($resultProduct) {
            echo "<script>alert('Produk berhasil dihapus!');</script>";
            echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan saat menghapus produk.');</script>";
            echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
        }
    } else {
        echo "<script>alert('Woops! Terjadi kesalahan saat menghapus item keranjang.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
    }
} else {
    echo "<script>alert('Id produk tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
}
?>
