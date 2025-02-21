<?php
include '../config.php';

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
?>

<div class="uk-container">
    <h2>View Product</h2>
    <div class="uk-card uk-card-default">
        <div class="uk-card-body">
            <h3 class="uk-card-title"><?php echo $product['name']; ?></h3>
            <p><strong>Type:</strong> <?php echo $product['type']; ?></p>
            <p><strong>Manufacturer:</strong> <?php echo $product['manufacturer']; ?></p>
            <p><strong>Price:</strong> <?php echo $product['price']; ?></p>
            <p><strong>Stock:</strong> <?php echo $product['stock']; ?></p>
            <p><strong>Description:</strong> <?php echo $product['description']; ?></p>
            <img src="<?php echo $product['image_url']; ?>" alt="<?php echo $product['name']; ?>" class="uk-width-1-2">
        </div>
    </div>
    <a href="index.php?action=list-produk" class="uk-button uk-button-default">Back to List</a>
</div>