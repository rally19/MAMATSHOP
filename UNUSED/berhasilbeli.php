<?php
session_start();

$data = $_SESSION['data'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TRANSAKSI BERHASIL</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="body">
    <h1>GUNSHOP JOMOKERTO</h1>

    <p>PEMBAYARAN BERHASIL</p>
    
    <fieldset>
        <legend>DATA PELANGGAN:</legend>
        <p><strong>ID Pelanggan:</strong> <?= htmlspecialchars($data['id']); ?></p>
        <p><strong>Nama:</strong> <?= htmlspecialchars($data['nama']); ?></p>
        <p><strong>Email:</strong> <?= htmlspecialchars($data['email']); ?></p>
        <p><strong>Alamat:</strong> <?= htmlspecialchars($data['alamat']); ?></p>
        <p><strong>Status Member:</strong> <?= htmlspecialchars($data['member'] == 'ya' ? 'Ya' : 'Tidak'); ?></p>
        <p><strong>Metode Pembayaran:</strong> <?= htmlspecialchars(ucfirst($data['pembayaran'])); ?></p>
    </fieldset>

    <fieldset>
        <legend>PRODUK DIPESAN:</legend>
        <?php foreach ($data['produkDetails'] as $produk): ?>
            <p><strong>Produk:</strong> <?= htmlspecialchars($produk['nama']); ?> | <strong>Harga:</strong> Rp <?= number_format($produk['harga'], 0, ',', '.'); ?></p>
        <?php endforeach; ?>
    </fieldset>

    <fieldset>
        <legend>TOTAL PEMBAYARAN:</legend>
        <p><strong>Total Harga Produk:</strong> Rp <?= number_format($data['totalPembayaran'], 0, ',', '.'); ?></p>
        <p><strong>Diskon Member:</strong> <?= htmlspecialchars($data['diskonMember']); ?></p>
        <p><strong>Pembayaran Akhir:</strong> Rp <?= number_format($data['totalPembayaranAkhir'], 0, ',', '.'); ?></p>
    </fieldset>

    <br><br>
    <a href="index.php" class="abutton">Kembali ke Halaman Utama</a>
</div>

</body>
</html>

<?php unset($_SESSION['data']); ?>
