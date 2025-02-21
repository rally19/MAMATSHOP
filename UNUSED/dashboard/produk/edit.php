<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    $sql = "UPDATE products SET name=?, type=?, manufacturer=?, price=?, stock=?, description=?, image_url=? WHERE id=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sssdissi", $name, $type, $manufacturer, $price, $stock, $description, $image_url, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: dashboard.php?action=list-produk");
    exit();

}

$id = $_GET['id'];
$sql = "SELECT * FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$product = $result->fetch_assoc();
$stmt->close();
?>

<div class="uk-container">
    <h2>Edit Product</h2>
    <form method="POST" action="">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $product['name']; ?>" class="uk-input" required>
        <label>Type:</label>
        <input type="text" name="type" value="<?php echo $product['type']; ?>" class="uk-input" required>
        <label>Manufacturer:</label>
        <input type="text" name="manufacturer" value="<?php echo $product['manufacturer']; ?>" class="uk-input" required>
        <label>Price:</label>
        <input type="number" name="price" value="<?php echo $product['price']; ?>" class="uk-input" step="0.01" required>
        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $product['stock']; ?>" class="uk-input" required>
        <label>Description:</label>
        <textarea name="description" class="uk-textarea" required><?php echo $product['description']; ?></textarea>
        <label>Image URL:</label>
        <input type="text" name="image_url" value="<?php echo $product['image_url']; ?>" class="uk-input" required>
        <button type="submit" class="uk-button uk-button-primary">Update Product</button>
    </form>
</div>