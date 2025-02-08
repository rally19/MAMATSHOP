<?php
session_start();

$errors = isset($_SESSION['errors']) ? $_SESSION['errors'] : [];
?>

<!DOCTYPE html>
<html>
<head>
    <title>TRANSAKSI GAGAL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<br><br>
<div class="body">
    <h1>GUNSHOP JOMOKERTO</h1>
    <fieldset>
        <legend>PESAN GAGAL TRANSAKSI:</legend>
        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?php echo htmlspecialchars($error); ?></li>
            <?php endforeach; ?>
        </ul>
        <br>
        <p><strong>Silahkan ulangi!</strong></p>
    </fieldset><br>
    <a class="abutton" href="index.php">Kembali ke Form</a>
</div>

</body>
</html>

<?php unset($_SESSION['errors']); ?>
