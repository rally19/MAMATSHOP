<?php
include '../../config.php';
session_start();

//if (isset($_SESSION['username'])) {
//    if ($_SESSION['level'] == 'admin') {
//        header("Location: dashboard.php");
//    } else {
//        header("Location: toko.php");
//    }
//    exit();
//}

if (isset($_SESSION['username'])) {
    header("Location: ../../");
    exit();
}

if (isset($_POST['submit'])) {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = mysqli_query($conn, $sql);

    if ($result->num_rows > 0) {
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username'] = $row['username'];
        $_SESSION['level'] = $row['level'];
        $_SESSION['user_id'] = $row['id'];
        
        header("Location: ../welcome.php");
        exit();
    } else {
        echo "<script>alert('Email atau password Anda salah. Silakan coba lagi!')</script>";
        echo '<script>window.location.href = "../loginregister.php"</script>';
        exit();
    }
}
?>