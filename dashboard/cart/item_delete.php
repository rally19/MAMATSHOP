<?php
$item_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($item_id)) {
    $fetchCartId = "SELECT cart_id FROM cart_items WHERE id = '$item_id'";
    $resultFetch = mysqli_query($conn, $fetchCartId);

    if ($resultFetch && mysqli_num_rows($resultFetch) > 0) {
        $item = mysqli_fetch_assoc($resultFetch);
        $cart_id = $item['cart_id'];

        $deleteItem = "DELETE FROM cart_items WHERE id = '$item_id'";
        $resultDelete = mysqli_query($conn, $deleteItem);

        if ($resultDelete) {
            echo "<script>alert('Item berhasil dihapus!');</script>";
            echo "<script>window.location.href = 'index.php?action=view-cart&id=$cart_id';</script>";
            exit();
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan saat menghapus item.');</script>";
            echo "<script>window.location.href = 'index.php?action=view-cart&id=$cart_id';</script>";
        }
    } else {
        echo "<script>alert('Item tidak ditemukan.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
    }
} else {
    echo "<script>alert('ID Item tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
}
?>