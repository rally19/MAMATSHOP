<?php
$cart_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($cart_id)) {
    $deleteCartItems = "DELETE FROM cart_items WHERE cart_id = '$cart_id'";
    $resultCartItems = mysqli_query($conn, $deleteCartItems);

    if ($resultCartItems) {
        $deleteCart = "DELETE FROM carts WHERE id = '$cart_id'";
        $resultCart = mysqli_query($conn, $deleteCart);

        if ($resultCart) {
            echo "<script>alert('Keranjang berhasil dihapus!');</script>";
            echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
            exit();
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan saat menghapus keranjang.');</script>";
            echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
        }
    } else {
        echo "<script>alert('Woops! Terjadi kesalahan saat menghapus item keranjang.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
    }
} else {
    echo "<script>alert('ID Keranjang tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
}
?>
