<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $type = $_POST['type'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    if (!empty($id) && !empty($name) && !empty($type) && !empty($manufacturer) && !empty($price) && !empty($stock) && !empty($description) && !empty($image_url)) {
        $sql = "UPDATE products 
                SET name='$name', type='$type', manufacturer='$manufacturer', price='$price', stock='$stock', description='$description', image_url='$image_url'
                WHERE id='$id'";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Produk berhasil diperbarui!');</script>";
            echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
            exit();
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan saat memperbarui produk.');</script>";
            echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi.');</script>";
        echo "<script>window.location.href = 'index.php?action=edit-produk&id=$id';</script>";
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($id)) {
    $sql = "SELECT * FROM products WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $product = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Woops! Produk tidak ditemukan.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
    }
} else {
    echo "<script>alert('Id produk tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
}
?>



<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center uk-margin-bottom">Edit Produk</h2>
    <div class="uk-card uk-card-default uk-box-shadow-small uk-margin-bottom">
        <div class="uk-card-body">
    <form method="POST" action="" class="uk-form-stacked">
        <input type="hidden" name="id" value="<?php echo $product['id']; ?>">
        <div class="uk-margin">
            <label for="name" class="uk-form-label"><strong>Nama:</strong></label>
            <div class="uk-form-controls">
                <input id="name" type="text" name="name" value="<?php echo $product['name']; ?>" class="uk-input" required>
            </div>
        </div>
        <div class="uk-margin">
            <label for="type" class="uk-form-label"><strong>Tipe:</strong></label>
            <div class="uk-form-controls">
                <input id="type" type="text" name="type" value="<?php echo $product['type']; ?>" class="uk-input" required>
            </div>
        </div>
        <div class="uk-margin">
            <label for="manufacturer" class="uk-form-label"><strong>Pembuat:</strong></label>
            <div class="uk-form-controls">
                <input id="manufacturer" type="text" name="manufacturer" value="<?php echo $product['manufacturer']; ?>" class="uk-input" required>
            </div>
        </div>
        <div class="uk-margin">
            <label for="price" class="uk-form-label"><strong>Harga:</strong></label>
            <div class="uk-form-controls">
                <input id="price" type="number" name="price" value="<?php echo $product['price']; ?>" class="uk-input" step="0.01" required>
            </div>
        </div>
        <div class="uk-margin">
            <label for="stock" class="uk-form-label"><strong>Stok:</strong></label>
            <div class="uk-form-controls">
                <input id="stock" type="number" name="stock" value="<?php echo $product['stock']; ?>" class="uk-input" required>
            </div>
        </div>
        <div class="uk-margin">
            <label for="description" class="uk-form-label"><strong>Deskripsi:</strong></label>
            <div class="uk-form-controls">
                <textarea id="description" name="description" class="uk-textarea" required><?php echo $product['description']; ?></textarea>
            </div>
        </div>
        <div class="uk-margin">
            <label for="image_url" class="uk-form-label"><strong>Image URL:</strong></label>
            <div class="uk-form-controls">
                <input id="image_url" type="text" name="image_url" value="<?php echo $product['image_url']; ?>" class="uk-input" required>
            </div>
        </div>
        <br>
        <div class="uk-text-center">
            <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-box-shadow-small">Update Product</button>
        </div>
    </form>
    </div>
    </div>
</div>
