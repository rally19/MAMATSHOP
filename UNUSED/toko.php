<?php
session_start();
 
if (!isset($_SESSION['username'])) {
    header("Location: index.php");
    exit(); // Terminate script execution after the redirect
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GUNSHOP JOMOKERTO</title>
    <link rel="icon" type="image/x-icon" href="https://icons.iconarchive.com/icons/3xhumed/mega-games-pack-39/256/Call-of-Duty-World-at-War-11-icon.png">
    <link rel="stylesheet" href="style.css">
</head>
<body  style="background-image: linear-gradient(rgba(0, 0, 0, .5), rgba(0, 0, 0, .5)), url(https://canfora.se/red-army-on-parade/img/backyard.jpg);">
    <div class="body" style="max-width: 1200px;">
        <div class="super-container">
        <!--SIDEBAR DISINI-->
        <fieldset class="sidebar">
        <div class="dropdown">
  <button class="dropdown-toggle dbutton"><?php echo $_SESSION['username']; ?></button>
  <div class="dropdown-menu">
    <a href="#">Akun</a>
    <a href="#">Settingan</a>
    <a href="#" onclick="logout()">Logout</a>
  </div>
</div>
            <ul class="sidebar-links">
                <li><a href="#">Home</a></li>
                <li><a href="#">Toko</a></li>
                <li><a href="#">Tentang</a></li>
            </ul>
        </fieldset>
        <!--<form action="prosesbeli.php" method="POST"> belum bisa ya-->
        <form>
            <h1>GUNSHOP JOMOKERTO</h1>
            <fieldset class="container-card">
            <legend>KATALOG TOKO:</legend>
                <div class="card">
                    <img src="https://collections.rmg.co.uk/media/389/482/e8743.jpg" alt="Product Image">
                    <h2>AK-47</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="AK-47|15000000">
                    Rp 15.000.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkw4Ebu9YsVG-6cxK3Ysh6YPydrvYf-gRJqw&s" alt="Product Image">
                    <br><br>
                    <h2>HK43</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="HK43|75999000">
                    Rp 75.999.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWZo2VeqcIo83OKds7-lHXAeEoum8fteKAkg&s" alt="Product Image">
                    <h2>IMI Galil</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="IMI Galil|25000000">
                    Rp 25.000.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="https://p.turbosquid.com/ts-thumb/Nq/X6ZK41/Ep/0011200x1200/jpg/1626402876/600x600/fit_q87/0e15c75cf85de3e2504c68a62335bb8478e4939e/0011200x1200.jpg" alt="Product Image">
                    <h2>FN FAL</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="FN FAL|25999000">
                    Rp 25.999.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="data:image/jpeg;base64,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" alt="Product Image">
                    <h2>Dragunov SVD</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="Dragunov SVD|35000000">
                    Rp 35.000.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="https://androcorpind.com/wp-content/uploads/2017/04/5568CB-1954-scaled.jpg" alt="Product Image">
                    <h2>AR-15</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="AR-15|19999000">
                    Rp 19.999.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuAIz7JBKqi4l6bklQhCnrn3bKMwN2ckQhSg&s" alt="Product Image">
                    <h2>Steyr AUG7</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="Steyr AUG7|34000000">
                    Rp 34.000.000
                    </label>
                    <br>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQUsblP8y6cdOP8ZSTXRRUVK6JQPx7QLicHCA&s" alt="Product Image">
                    <h2>Remington 700</h2>
                    <label class="harga-label unselectable">
                    <input type="checkbox" name="produk[]" value="Remington 700|15000000">
                    Rp 15.000.000
                    </label>
                    <br>
                </div>
            </fieldset>
            <br>
            <fieldset>
            <legend>DATA PELANGGAN:</legend>
            <label for="alamat">Alamat:</label>
            <input type="text" name="alamat" id="alamat">
            <label>Pembayaran:</label>
            <select name="Bank">
            <option value="" hidden disabled selected></option>
            <option value="visa">VISA</option>
            <option value="masterCard">Master Card</option>
            <option value="debitBca">Debit BCA</option>
            </select>
            <fieldset class="container-radio">
            <legend>Member?</legend>
            <label class="radio-label"><input class="radio" type="radio" name="member" value="ya">YA</label>
            <label class="radio-label"><input class="radio" type="radio" name="member" value="tidak">TIDAK</label>
            </fieldset>
            </fieldset>
            <br>
            <input type="submit" name="kirim" value="Kirim" class="button" onclick="alert('user?')">
        </form>
    </div>
    <!-- Modal -->
    <?php if (isset($_SESSION['show_popup']) && $_SESSION['show_popup']): ?>
    <div id="selamatModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Selamat Datang <?php echo $_SESSION['level']; ?>, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Terima kasih telah login user.</p>
        </div>
    </div>
    <?php $_SESSION['show_popup'] = false;?>
    <?php endif; ?>
    <script src="fungsis.js"></script>
</body>
</html>