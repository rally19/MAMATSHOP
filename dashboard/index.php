<?php 
include '../config.php';
include '../fungsi.php';

session_start(); 
 
 if (!isset($_SESSION['username'])) {
    header("Location: ../unknown.php");
    exit();
}   elseif ($_SESSION['level']!='admin') {
    header("Location: ../unknown.php");
    exit();
}   else {
    $loggedin = isset($_SESSION['username']);
    $username = $loggedin ? $_SESSION['username'] : '';
}

$sql = "SELECT id, username, email, password, level FROM users"; 
$result = $conn->query($sql);

$action = isset($_GET['action']) ? $_GET['action'] : 'home';

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../src/css/uikit.css" />
    <link rel="stylesheet" type="text/css" href="../src/css/uikit-mod.css">
    <link rel="stylesheet" type="text/css" href="../src/css/style.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="uk-grid-collapse" uk-grid>
        <div class="uk-width-1-6 uk-background-secondary uk-light uk-padding-small uk-visible@m" style="height: 100vh; position: sticky; top: 0;">
            <h3 class="uk-text-center">Dashboard</h3>
            <ul class="uk-nav-default" uk-nav="multiple: true">
                <li><a href="index.php?action=home">Home</a></li>
                <li><a href="#">Settings</a></li>
                <li class="uk-parent">
                <a href="#">User<span uk-nav-parent-icon></span></a>
            <ul class="uk-nav-sub">
                <li><a href="index.php?action=list-user">List User</a></li>
                <li><a href="index.php?action=create-user">Create User</a></li>
            </ul>
                </li>
                <li class="uk-parent">
            <a href="#">Product<span uk-nav-parent-icon></span></a>
            <ul class="uk-nav-sub">
                <li><a href="index.php?action=list-produk">List Produk</a></li>
                <li><a href="index.php?action=create-produk">Create Produk</a></li>
            </ul>
            </li>
            <li class="uk-parent">
            <a href="#">Cart<span uk-nav-parent-icon></span></a>
            <ul class="uk-nav-sub">
                <li><a href="index.php?action=list-cart">List Keranjang</a></li>
            </ul>
            </li>
            <li class="uk-nav-divider"></li>
            <li><a href="../">Exit</a></li>
            </ul>
        </div>
        <div class="uk-width-expand">
            <div uk-sticky="sel-target: .uk-navbar-container; cls-active: uk-navbar-sticky">
            <nav class="uk-navbar-container" uk-navbar>
                <div class="uk-navbar-left uk-flex uk-flex-1 uk-margin-left">
                    <form class="uk-search uk-search-default" style="flex-grow: 1;">
                        <span uk-search-icon></span>
                        <input class="uk-search-input uk-width-1-1" type="search" placeholder="Search...">
                    </form>
                </div>
                <div class="uk-navbar-right uk-margin-left uk-margin-right">
                <a class="uk-navbar-toggle" href="#" uk-icon="user"></a>
                <div uk-dropdown="pos: bottom-right; delay-hide: 400; animation: uk-animation-slide-top-small; animate-out: true; offset: -1">
                <ul class="uk-nav uk-dropdown-nav">
                    <?php if ($loggedin): ?>
                    <li><?php echo htmlspecialchars($username); ?></li>
                    <li class="my-text-silver"><?php echo htmlspecialchars($_SESSION['level']); ?></li>
                    <li class="uk-nav-divider"></li>
                    <li><a href="#"><span uk-icon="user"></span> Account</a></li>
                    <li><a href="#"><span uk-icon="cog"></span> Settings</a></li>
                    <li class="uk-nav-divider"></li>
                    <?php if ($_SESSION['level']=='admin'): ?>
                    <li><a href="../dashboard"><span uk-icon="server"></span> Dashboard</a></li>
                    <li class="uk-nav-divider"></li>
                    <?php endif; ?>
                    <li class="uk-nav-divider"></li>
                    <li><a href="../auth/proses/proseslogout.php"><span uk-icon="sign-out"></span> Log Out</a></li>
                    <?php endif; ?>
                    <?php if (!$loggedin): ?>
                    <li><a href="../auth/loginregister.php"><span uk-icon="sign-in"></span> Login/Register</a></li>
                    <?php endif; ?>
                </ul>
                </div>
                    <a class="uk-hidden@m uk-icon-link" href="#" uk-icon="icon: menu" uk-toggle="target: #offcanvas-sidebar"></a>
                </div>
            </nav>
            </div>
            <div id="offcanvas-sidebar" uk-offcanvas="overlay: true">
                <div class="uk-offcanvas-bar">
                    <h3>Dashboard</h3>
                    <ul class="uk-nav uk-nav-default">
                        <ul class="uk-nav-default" uk-nav="multiple: true">
                            <li><a href="index.php?action=home">Home</a></li>
                            <li><a href="#">Settings</a></li>
                            <li class="uk-parent">
                            <a href="#">User<span uk-nav-parent-icon></span></a>
                        <ul class="uk-nav-sub">
                            <li><a href="index.php?action=list-user">List User</a></li>
                            <li><a href="index.php?action=create-user">Create User</a></li>
                        </ul>
                            </li>
                            <li class="uk-parent">
                        <a href="#">Product<span uk-nav-parent-icon></span></a>
                        <ul class="uk-nav-sub">
                            <li><a href="index.php?action=list-produk">List Produk</a></li>
                            <li><a href="index.php?action=create-produk">Create Produk</a></li>
                        </ul>
                        </li>
                        <li class="uk-parent">
                        <a href="#">Cart<span uk-nav-parent-icon></span></a>
                        <ul class="uk-nav-sub">
                            <li><a href="index.php?action=list-cart">List Keranjang</a></li>
                        </ul>
                        </li>
                        <li class="uk-nav-divider"></li>
                        <li><a href="../">Exit</a></li>
                        </ul>
                    </ul>
                </div>
            </div>
            <?php
            switch ($action) {
                case 'list-user':
                    include 'user/list.php';
                    break;
                case 'view-user':
                    include 'user/view.php';
                    break;
                case 'edit-user':
                    include 'user/edit.php';
                    break;
                case 'delete-user':
                    include 'user/delete.php';
                    break;
                case 'create-user':
                    include 'user/create.php';
                    break;
                case 'list-produk':
                    include 'produk/list.php';
                    break;
                case 'view-produk':
                    include 'produk/view.php';
                    break;
                case 'edit-produk':
                    include 'produk/edit.php';
                    break;
                case 'delete-produk':
                    include 'produk/delete.php';
                    break;
                case 'create-produk':
                    include 'produk/create.php';
                    break;
                case 'delete-cart':
                    include 'cart/delete.php';
                    break;
                case 'delete-item-cart':
                    include 'cart/item_delete.php';
                    break;
                case 'edit-item-cart':
                    include 'cart/item_edit.php';
                    break;
                case 'list-cart':
                    include 'cart/list.php';
                    break;
                case 'view-cart':
                    include 'cart/view.php';
                    break;
                default:
                    include 'home.php';
                    break;
            }
            ?>
        </div>
    </div>
    <script src="../src/js/fungsis.js"></script>
    <script src="../src/js/uikit.js"></script>
    <script src="../src/js/uikit-icons.js"></script>
</body>
</html>
