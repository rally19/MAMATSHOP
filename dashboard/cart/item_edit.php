<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $quantity = isset($_POST['quantity']) ? $_POST['quantity'] : null;
    $item_id = isset($_POST['item_id']) ? $_POST['item_id'] : null;
    $cart_id = isset($_POST['cart_id']) ? $_POST['cart_id'] : null;

    if (!empty($quantity) && !empty($item_id) && !empty($cart_id)) {
        $sql = "UPDATE cart_items SET quantity = '$quantity' WHERE id = '$item_id'";
        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Jumlah item berhasil diperbarui!'); window.location.href = 'index.php?action=view-cart&id=$cart_id';</script>";
            exit();
        } else {
            echo "<script>alert('Terjadi kesalahan saat memperbarui jumlah item.'); window.location.href = 'index.php?action=view-cart&id=$cart_id';</script>";
        }
    } else {
        echo "<script>alert('Data tidak lengkap.'); window.location.href = 'index.php?action=list-cart';</script>";
    }
}

$item_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($item_id)) {
    $sql = "SELECT ci.id AS item_id, ci.cart_id, ci.quantity, p.name 
            FROM cart_items ci 
            JOIN products p ON ci.product_id = p.id 
            WHERE ci.id = '$item_id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $item = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Terjadi kesalahan saat mengambil data item.'); window.location.href = 'index.php?action=list-cart';</script>";
    }
} else {
    echo "<script>alert('ID Item tidak ada.'); window.location.href = 'index.php?action=list-cart';</script>";
}
?>


<div class="uk-container uk-margin-large-top">
    <h2>Edit Cart Item</h2>
    <div class="uk-card uk-card-default uk-card-body uk-border-rounded uk-box-shadow-small">
        <form method="POST" action="" class="uk-form-stacked">
            <input type="hidden" name="item_id" value="<?php echo $item['item_id']; ?>">
            <input type="hidden" name="cart_id" value="<?php echo $item['cart_id']; ?>">
            <div class="uk-margin">
                <label class="uk-form-label">Product Name:</label>
                <div class="uk-form-controls">
                    <input type="text" value="<?php echo $item['name']; ?>" class="uk-input uk-border-rounded" disabled>
                </div>
            </div>
            <div class="uk-margin">
                <label class="uk-form-label">Quantity:</label>
                <div class="uk-form-controls">
                    <input type="number" name="quantity" value="<?php echo $item['quantity']; ?>" class="uk-input uk-border-rounded" required>
                </div>
            </div>
            <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-width-1-1">
                Update Quantity
            </button>
        </form>
    </div>
</div>
