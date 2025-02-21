<?php
session_start();
include '../../config.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: ../../auth/haruslogin.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$product_id = $_POST['product_id'];

$sql = "SELECT id FROM carts WHERE user_id = $user_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $cart = $result->fetch_assoc();
    $cart_id = $cart['id'];
} else {
    $sql = "INSERT INTO carts (user_id) VALUES ($user_id)";
    if ($conn->query($sql) === TRUE) {
        $cart_id = $conn->insert_id;
    } else {
        die("Error creating cart: " . $conn->error);
    }
}

$sql = "SELECT * FROM cart_items WHERE cart_id = $cart_id AND product_id = $product_id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $new_quantity = $row['quantity'] + 1;
    $sql = "UPDATE cart_items SET quantity = $new_quantity WHERE id = " . $row['id'];
} else {
    $sql = "INSERT INTO cart_items (cart_id, product_id, quantity) VALUES ($cart_id, $product_id, 1)";
}

if ($conn->query($sql) === TRUE) {
    header('Location: ../index.php');
} else {
    die("Error adding product to cart: " . $conn->error);
}