<?php
include '../config.php';

$sql = "SELECT * FROM products";
$result = $conn->query($sql);
?>

<div class="uk-container">
    <h2>Product List</h2>
    <a href="index.php?action=create-produk" class="uk-button uk-button-primary">Create New Product</a>
    <table class="uk-table uk-table-striped">
        <thead>
            <tr>
                <th>No.</th>
                <th>ID</th>
                <th>Name</th>
                <th>Type</th>
                <th>Manufacturer</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php $counter = 1; while ($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?php echo $counter++; ?></td>
                    <td><?php echo $row['id']; ?></td>
                    <td><?php echo $row['name']; ?></td>
                    <td><?php echo $row['type']; ?></td>
                    <td><?php echo $row['manufacturer']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    <td><?php echo $row['stock']; ?></td>
                    <td>
                        <a href="index.php?action=view-produk&id=<?php echo $row['id']; ?>" class="uk-button uk-button-small uk-button-primary">View</a>
                        <a href="index.php?action=edit-produk&id=<?php echo $row['id']; ?>" class="uk-button uk-button-small uk-button-secondary">Edit</a>
                        <a href="index.php?action=delete-produk&id=<?php echo $row['id']; ?>" class="uk-button uk-button-small uk-button-danger" onclick="return confirm('Kamu yakin untuk menghapus data ini?')">Delete</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>