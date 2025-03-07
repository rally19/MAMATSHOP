<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $type = $_POST['type'];
    $manufacturer = $_POST['manufacturer'];
    $price = $_POST['price'];
    $stock = $_POST['stock'];
    $description = $_POST['description'];
    $image_url = $_POST['image_url'];

    if (!empty($name) && !empty($type) && !empty($manufacturer) && !empty($price) && !empty($stock) && !empty($description) && !empty($image_url)) {
        $sql = "INSERT INTO products (name, type, manufacturer, price, stock, description, image_url) 
                VALUES ('$name', '$type', '$manufacturer', '$price', '$stock', '$description', '$image_url')";

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('Produk berhasil ditambahkan!');</script>";
            echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
            exit();
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan saat menambahkan produk.');</script>";
            echo "<script>window.location.href = 'index.php?action=list-produk';</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi.');</script>";
        echo "<script>window.location.href = 'index.php?action=add-produk';</script>";
    }
}
?>




<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center uk-margin-bottom">Buat Produk Baru</h2>
    <div class="uk-card uk-card-default uk-box-shadow-small uk-margin-bottom">
        <div class="uk-card-body">
    <form method="POST" action="" class="uk-form-stacked">
        <div class="uk-margin">
            <label for="name" class="uk-form-label"><strong>Nama:</strong></label>
            <div class="uk-form-controls">
                <input id="name" type="text" name="name" class="uk-input" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="type" class="uk-form-label"><strong>Tipe:</strong></label>
            <div class="uk-form-controls">
                <input id="type" type="text" name="type" class="uk-input" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="manufacturer" class="uk-form-label"><strong>Pembuat:</strong></label>
            <div class="uk-form-controls">
                <input id="manufacturer" type="text" name="manufacturer" class="uk-input" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="price" class="uk-form-label"><strong>Harga:</strong></label>
            <div class="uk-form-controls">
                <input id="price" type="number" name="price" class="uk-input" step="0.01" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="stock" class="uk-form-label"><strong>Stok:</strong></label>
            <div class="uk-form-controls">
                <input id="stock" type="number" name="stock" class="uk-input" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="description" class="uk-form-label"><strong>Deskripsi:</strong></label>
            <div class="uk-form-controls">
                <textarea id="description" name="description" class="uk-textarea" required></textarea>
            </div>
        </div>

        <div class="uk-margin">
            <label for="image_url" class="uk-form-label"><strong>Image URL:</strong></label>
            <div class="uk-form-controls">
                <input id="image_url" type="text" name="image_url" class="uk-input" required>
            </div>
        </div>
        <br>
        <div class="uk-text-center">
            <button type="submit" class="uk-button uk-button-primary uk-box-shadow-small">Create Product</button>
        </div>
    </form>
    </div>
    </div>
</div>
