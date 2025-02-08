<?php
if (isset($_POST['kirim'])) {
    $produkDipesan = isset($_POST['produk']) ? $_POST['produk'] : [];
    $id = trim($_POST['id']);
    $nama = trim($_POST['nama']);
    $email = trim($_POST['email']);
    $alamat = trim($_POST['alamat']);
    $member = isset($_POST['member']) ? $_POST['member'] : '';
    $pembayaran = isset($_POST['Bank']) ? $_POST['Bank'] : '';
    
    $errors = [];

    if (empty($produkDipesan)) {
        $errors[] = "Produk tidak boleh kosong.";
    }

    if (empty($id)) {
        $errors[] = "ID Pelanggan tidak boleh kosong.";
    } elseif (!is_numeric($id)) {
        $errors[] = "ID Pelanggan harus berupa bilangan.";
    }

    if (empty($nama)) {
        $errors[] = "Nama tidak boleh kosong.";
    }

    if (empty($email)) {
        $errors[] = "Email tidak boleh kosong.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Format email tidak valid.";
    }

    if (empty($alamat)) {
        $errors[] = "Alamat tidak boleh kosong.";
    }

    if (empty($member)) {
        $errors[] = "Status Member tidak boleh kosong.";
    }

    if (empty($pembayaran)) {
        $errors[] = "Metode Pembayaran tidak boleh kosong.";
    }

    if (count($errors) > 0) {
        session_start();
        $_SESSION['errors'] = $errors;
        header('Location: errorbeli.php');
        exit();
    }

    $totalPembayaran = 0;
    $produkDetails = [];

    foreach ($produkDipesan as $produk) {
        list($namaProduk, $harga) = explode('|', $produk);
        $produkDetails[] = ['nama' => $namaProduk, 'harga' => (int)$harga];
        $totalPembayaran += (int)$harga;
    }

    if ($member == 'ya') {
        $diskonMember = 0.1;
    } else {
        $diskonMember = 0;
    }

    $totalDiskon = $totalPembayaran * $diskonMember;
    $pembayaranAkhir = $totalPembayaran - $totalDiskon;

    session_start();
    $_SESSION['data'] = [
        'produkDetails' => $produkDetails,
        'id' => $id,
        'nama' => $nama,
        'email' => $email,
        'alamat' => $alamat,
        'member' => $member,
        'pembayaran' => $pembayaran,
        'totalPembayaran' => $totalPembayaran,
        'diskonMember' => $diskonMember ? '10%' : 'Tidak ada diskon',
        'totalPembayaranAkhir' => $pembayaranAkhir
    ];

    header('Location: berhasil.php');
    exit();
}
?>
