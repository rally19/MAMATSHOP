<?php
$cart_id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($cart_id)) {
    $sql_cart = "SELECT c.id AS cart_id, u.username, c.created_at 
                 FROM carts c 
                 JOIN users u ON c.user_id = u.id 
                 WHERE c.id = '$cart_id'";
    $result_cart = mysqli_query($conn, $sql_cart);

    if ($result_cart && mysqli_num_rows($result_cart) > 0) {
        $cart = mysqli_fetch_assoc($result_cart);
    } else {
        echo "<script>alert('Woops! Keranjang tidak ditemukan.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
        exit();
    }

    $sql_items = "SELECT ci.id AS item_id, p.name, p.price, ci.quantity 
                  FROM cart_items ci 
                  JOIN products p ON ci.product_id = p.id 
                  WHERE ci.cart_id = '$cart_id'";
    $result_items = mysqli_query($conn, $sql_items);

    if ($result_items) {
        $items = $result_items;
    } else {
        echo "<script>alert('Woops! Terjadi kesalahan saat mengambil item keranjang.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
        exit();
    }
} else {
    echo "<script>alert('ID Keranjang tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-cart';</script>";
}
?>


<div class="uk-container uk-margin-large-top">
    <h2>View Cart</h2>
    <div class="uk-card uk-card-default uk-card-body uk-margin-bottom uk-box-shadow-small">
        <h3 class="uk-card-title">Cart ID: <?php echo $cart['cart_id']; ?></h3>
        <ul class="uk-list uk-list-divider">
            <li><strong>User:</strong> <?php echo $cart['username']; ?></li>
            <li><strong>Created At:</strong> <?php echo $cart['created_at']; ?></li>
        </ul>
    </div>

    <h3 class="uk-heading-bullet">Cart Items</h3>
    <div class="uk-overflow-auto">
        <table class="uk-table uk-table-divider uk-table-hover uk-table-middle">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th class="uk-text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($item = $items->fetch_assoc()): ?>
                    <tr>
                        <td><?php echo $item['name']; ?></td>
                        <td>Rp <?php echo number_format($item['price'], 2); ?></td>
                        <td><?php echo $item['quantity']; ?></td>
                        <td>Rp <?php echo number_format($item['price'] * $item['quantity'], 2); ?></td>
                        <td class="uk-text-center uk-flex uk-flex-middle uk-flex-center">
                            <a href="index.php?action=edit-item-cart&id=<?php echo $item['item_id']; ?>" class="uk-button uk-button-small uk-button-secondary">Edit</a>
                            <a href="index.php?action=delete-item-cart&id=<?php echo $item['item_id']; ?>" class="uk-button uk-button-small uk-button-danger" onclick="return confirm('Are you sure?')">Delete</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>

    <div class="uk-flex uk-flex-right uk-margin-top uk-margin-small-bottom">
        <a href="index.php?action=list-cart" class="uk-button uk-button-primary uk-margin-small-bottom">
            <span uk-icon="icon: arrow-left"></span> Kembali
        </a>
    </div>
</div>
