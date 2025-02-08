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
    <title>DASHBOARD</title>
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
    <a href="#">Atmins</a>
    <a href="#" onclick="logout()">Logout</a>
  </div>
</div>
            <ul class="sidebar-links">
                <li><a href="#">Users</a></li>
                <li><a href="#">Charts</a></li>
                <li><a href="#">Tentang</a></li>
            </ul>
        </fieldset>
        <form>
            <h1>DASHBOARD GUNSHOP JOMOKERTO</h1>
            <fieldset class="container-card">
            <legend>KATALOG TOKO TERPOPULER BERDASARKAN DATA 2069-2420:</legend>
                <div class="card">
                    <img src="https://collections.rmg.co.uk/media/389/482/e8743.jpg" alt="Product Image">
                    <h2>AK-47</h2>
                    <br>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQkw4Ebu9YsVG-6cxK3Ysh6YPydrvYf-gRJqw&s" alt="Product Image">
                    <br><br>
                    <h2>HK43</h2>
                    <br>
                </div>
                <div class="card">
                    <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRWZo2VeqcIo83OKds7-lHXAeEoum8fteKAkg&s" alt="Product Image">
                    <h2>IMI Galil</h2>
                    <br>
                </div>
                <div class="card">
                    <img src="https://p.turbosquid.com/ts-thumb/Nq/X6ZK41/Ep/0011200x1200/jpg/1626402876/600x600/fit_q87/0e15c75cf85de3e2504c68a62335bb8478e4939e/0011200x1200.jpg" alt="Product Image">
                    <h2>FN FAL</h2>
                    <br>
                </div>
            </fieldset>
            <br>
            <fieldset>
            <legend>JUAL DATA PELANGGAN:</legend>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas vitae laoreet lorem, nec vulputate sapien. Nullam non condimentum enim. Aenean interdum dictum viverra. In vitae ligula varius, viverra ante ac, ultrices neque. Nullam non hendrerit ante. Suspendisse efficitur justo ac auctor varius. Donec tincidunt congue enim et iaculis. Donec fringilla massa eu magna pharetra, at suscipit felis pharetra. Maecenas pulvinar dignissim metus pretium tincidunt. Duis interdum velit sagittis turpis feugiat pulvinar. Donec aliquam at dolor ut gravida. Mauris iaculis, velit a feugiat varius, ipsum turpis sollicitudin sapien, nec mattis urna urna sit amet ipsum. Donec fringilla nec nulla quis pharetra. Vivamus nec tempor velit. Donec varius, sapien ac venenatis iaculis, enim velit interdum ante, non eleifend libero neque ac neque. Proin in ex sit amet est ultricies maximus.</p>
            <fieldset class="container-radio">
            <legend>YAKING JUAL?</legend>
            <label class="radio-label"><input class="radio" type="radio" name="jual" value="ya">YA</label>
            <label class="radio-label"><input class="radio" type="radio" name="jual" value="tidak">TIDAK</label>
            </fieldset>
            </fieldset>
            </fieldset>
            <br>
            <input type="submit" name="kirim" value="Kirim" class="button" onclick="alert('atmin?')">
        </form>
    </div>
    <!-- Modal -->
    <?php if (isset($_SESSION['show_popup']) && $_SESSION['show_popup']): ?>
    <div id="selamatModal" class="modal">
        <div class="modal-content">
            <span class="close">&times;</span>
            <h2>Selamat datang <?php echo $_SESSION['level']; ?>, <?php echo $_SESSION['username']; ?>!</h2>
            <p>Terima kasih telah login kembali min.</p>
        </div>
    </div>
    <?php $_SESSION['show_popup'] = false;?>
    <?php endif; ?>
    <script src="fungsis.js"></script>
</body>
</html>