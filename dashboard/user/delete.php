<?php
$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($id)) {
    $sql = "DELETE FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('User berhasil dihapus!');</script>";
        echo "<script>window.location.href = 'index.php?action=list-user';</script>";
        exit();
    } else {
        echo "<script>alert('Woops! Terjadi kesalahan saat menghapus user.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-user';</script>";
    }
} else {
    echo "<script>alert('User ID tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-user';</script>";
}
?>
