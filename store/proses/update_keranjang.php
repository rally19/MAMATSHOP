<?php
include '../../config.php';
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ../../auth/haruslogin.php");
    exit();
 }

$action = isset($_GET['action']) ? $_GET['action'] : '';
$cart_item_id = isset($_GET['cart_item_id']) ? (int)$_GET['cart_item_id'] : 0;

$user_id = $_SESSION['user_id'];
$sql = "SELECT id FROM carts WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cart = $result->fetch_assoc();
    $cart_id = $cart['id'];

    switch ($action) {
        case 'increase':
            $sql = "SELECT * FROM cart_items WHERE id = $cart_item_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $cart_item = $result->fetch_assoc();
                $current_quantity = $cart_item['quantity'];
                $product_id = $cart_item['product_id'];

                $sql = "SELECT stock FROM products WHERE id = $product_id";
                $result = $conn->query($sql);
                $product = $result->fetch_assoc();
                $stock = $product['stock'];

                if ($current_quantity < $stock) {
                    $new_quantity = $current_quantity + 1;
                    $sql = "UPDATE cart_items SET quantity = $new_quantity WHERE id = $cart_item_id";
                    $conn->query($sql);
                } else {
                    echo "<script>alert('Cannot increase quantity. Stock limit reached.')</script>";
                }
            }
            break;
        case 'decrease':
            $sql = "SELECT * FROM cart_items WHERE id = $cart_item_id";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $cart_item = $result->fetch_assoc();
                $current_quantity = $cart_item['quantity'];

                if ($current_quantity > 1) {
                    $new_quantity = $current_quantity - 1;
                    $sql = "UPDATE cart_items SET quantity = $new_quantity WHERE id = $cart_item_id";
                    $conn->query($sql);
                } else {
                    echo "<script>alert('Quantity cannot be less than 1.')</script>";
                }
            }
            break;
        case 'delete':
            $sql = "DELETE FROM cart_items WHERE id = $cart_item_id";
            $conn->query($sql);
            break;
        case 'delete_all':
            $sql = "DELETE FROM cart_items WHERE cart_id = $cart_id";
            $conn->query($sql);
            break;
        default:
            header('Location: ../keranjang.php');
            exit();
    }
} else {
    header('Location: ../keranjang.php');
    exit();
}

header('Location: ../keranjang.php');
exit();
?>