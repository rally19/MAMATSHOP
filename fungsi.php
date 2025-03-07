<?php
function formatUang($number) {
    return 'Rp ' . number_format($number, 2, ',', '.');
}

function NavActive($pageName) {
    $currentPage = basename($_SERVER['PHP_SELF']);
    return $currentPage == $pageName ? 'class="uk-active"' : '';
}

function CartActive($pageName) {
  $currentPage = basename($_SERVER['PHP_SELF']);
  return $currentPage == $pageName ? 'style="color: #333333 !important;"' : '';
}


//karanjang
if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $sql = "SELECT SUM(quantity) as total_quantity FROM cart_items 
            JOIN carts ON cart_items.cart_id = carts.id 
            WHERE carts.user_id = $user_id";
    $result = $conn->query($sql);
    $cart_total_quantity = $result->fetch_assoc()['total_quantity'];
  } else {
    $cart_total_quantity = 0;
  }
  if ($cart_total_quantity < 1) {
    $cart_total_quantity = 0;
  }
?>