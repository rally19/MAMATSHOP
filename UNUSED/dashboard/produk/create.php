<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $sql = "INSERT INTO products (name, type, manufacturer, price, stock, description, image_url) VALUES (?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdiss", $name, $type, $manufacturer, $price, $stock, $description, $image_url);
    $stmt->execute();
    header("Location: index.php?action=list-produk");
    exit();
}
?>

<div class="uk-container">
    <h2>Create New Product</h2>
    <form method="POST" action="">
        <label>Name:</label>
        <input type="text" name="name" class="uk-input" required>
        <label>Type:</label>
        <input type="text" name="type" class="uk-input" required>
        <label>Manufacturer:</label>
        <input type="text" name="manufacturer" class="uk-input" required>
        <label>Price:</label>
        <input type="number" name="price" class="uk-input" step="0.01" required>
        <label>Stock:</label>
        <input type="number" name="stock" class="uk-input" required>
        <label>Description:</label>
        <textarea name="description" class="uk-textarea" required></textarea>
        <label>Image URL:</label>
        <input type="text" name="image_url" class="uk-input" required>
        <button type="submit" class="uk-button uk-button-primary">Create Product</button>
    </form>
</div>