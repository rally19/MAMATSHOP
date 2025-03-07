<?php 
include $_SERVER['DOCUMENT_ROOT'] . '/mamatshop1/fungsi.php';

session_start(); 
 
$loggedin = isset($_SESSION['username']);
$username = $loggedin ? $_SESSION['username'] : '';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/3xhumed/mega-games-pack-39/256/Call-of-Duty-World-at-War-11-icon.png">
    <link rel="stylesheet" type="text/css" href="/mamatshop1/src/css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="/mamatshop1/src/css/uikit-mod.css">
    <link rel="stylesheet" type="text/css" href="/mamatshop1/src/css/style.css">
    <title>MAMATSHOP</title>
</head>
<body >
<div class="uk-section-secondary uk-background-cover uk-preserve-color">
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/mamatshop1/components/navbar-index.php'; ?>
    <div class="uk-section uk-section-default" data-src="/mamatshop1/src/img/tanki1.jpg" uk-img>
        <div class="uk-container">
                <div  class="uk-card uk-card-default uk-card-body">
                  <div class="uk-text-center">
                    <br>
                  <h2 class="uk-text-bolder">MOHON MAAF HALAMAN YANG ANDA TUJUI TIDAK ADA</h2>
                  <h4>Silahkan kembali ke <a href="#" onclick="history.go(-1)">halaman sebelumnya</a> atau ke <a href="./">halaman utama </a></h4>
                  <br>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/mamatshop1/components/footer.php'; ?>
</div>
<script src="/mamatshop1/src/js/fungsis.js"></script>
<script src="/mamatshop1/src/js/uikit.js"></script>
<script src="/mamatshop1/src/js/uikit-icons.js"></script>
</body>
</html>