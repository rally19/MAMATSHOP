<?php
include '../config.php';

$id = $_GET['id'];
$sql = "DELETE FROM products WHERE id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
header("Location: index.php?action=list-produk");
exit();
?>