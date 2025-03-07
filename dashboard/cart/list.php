<?php
$query = "
    SELECT c.id AS cart_id, u.username, c.created_at, COUNT(ci.id) AS item_count 
    FROM carts c 
    JOIN users u ON c.user_id = u.id 
    LEFT JOIN cart_items ci ON c.id = ci.cart_id 
    GROUP BY c.id
";

$result = mysqli_query($conn, $query);

if (!$result) {
    echo "<script>alert('Woops! Terjadi kesalahan saat mengambil data keranjang.');</script>";
    echo "<script>window.location.href = 'index.php';</script>";
    exit();
}?>


<div class="uk-container uk-margin-top">
    <div class="uk-flex uk-flex-between uk-align-center uk-margin-bottom">
        <h2 class="uk-margin-remove">Cart List</h2>
    </div>
    <div class="uk-overflow-auto">
    <table class="uk-table uk-table-striped uk-table-hover uk-box-shadow-small">
        <thead>
            <tr>
                <th class="uk-text-center">No.</th>
                <th class="uk-text-center">Cart ID</th>
                <th>User</th>
                <th class="uk-text-center">Item Count</th>
                <th class="uk-text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td class="uk-text-center"><?php echo $counter++; ?></td>
                    <td class="uk-text-center"><?php echo $row['cart_id']; ?></td>
                    <td><?php echo $row['username']; ?></td>
                    <td class="uk-text-center"><?php echo $row['item_count']; ?></td>
                    <td class="uk-text-center uk-flex uk-flex-middle uk-flex-center">
                        <a href="index.php?action=view-cart&id=<?php echo $row['cart_id']; ?>" class="uk-icon-button uk-button-primary" uk-icon="eye"></a>
                        <a href="index.php?action=delete-cart&id=<?php echo $row['cart_id']; ?>" class="uk-icon-button uk-button-danger" uk-icon="trash" onclick="return confirm('Kamu yakin untuk menghapus keranjang ini?')"></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
    </div>
</div>
