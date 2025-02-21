<?php
include '../../config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../../");
    exit();
}

if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
    $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256

    if ($password == $cpassword) {
        $sql = "SELECT id FROM users WHERE username='$username' AND email='$email'";
        $result = mysqli_query($conn, $sql);
        
        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            
            $update = "UPDATE users SET password='$password' WHERE id='$id'";
            if (mysqli_query($conn, $update)) {
                echo "<script>alert('Password berhasil diubah!'); window.location.href = '../auth/loginregister.php';</script>";
            } else {
                echo "<script>alert('Terjadi kesalahan saat mengubah password.'); window.location.href = '../auth/loginregister.php';</script>";
            }
        } else {
            echo "<script>alert('Username atau Email tidak ditemukan.'); window.location.href = '../auth/loginregister.php';</script>";
        }
    } else {
        echo "<script>alert('Password dan Konfirmasi Password tidak cocok!'); window.location.href = '../auth/loginregister.php';</script>";
    }
}
?>
