<?php
include '../../config.php';
session_start();

if (isset($_SESSION['username'])) {
    header("Location: ../../");
    exit();
}

if (isset($_POST['submit'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']); // Hash the input password using SHA-256
    $cpassword = hash('sha256', $_POST['cpassword']); // Hash the input confirm password using SHA-256
    $level = isset($_POST['level']) ? $_POST['level'] : '';

    if (!empty($level)) {
        if ($password == $cpassword) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);
            if (!$result->num_rows > 0) {
                $sql = "INSERT INTO users (username, email, password, level)
                        VALUES ('$username', '$email', '$password', '$level')";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    echo "<script>alert('Selamat, registrasi berhasil!')</script>";
                    $username = "";
                    $email = "";
                    $_POST['password'] = "";
                    $_POST['cpassword'] = "";
                    echo '<script>window.location.href = "../auth/loginregister.php"</script>';
                } else {
                    echo "<script>alert('Woops! Terjadi kesalahan.')</script>";
                    echo '<script>window.location.href = "../auth/loginregister.php"</script>';
                }
            } else {
                echo "<script>alert('Woops! Email Sudah Terdaftar.')</script>";
                echo '<script>window.location.href = "../auth/loginregister.php"</script>';
            }
        } else {
            echo "<script>alert('Password Tidak Sesuai')</script>";
            echo '<script>window.location.href = "../auth/loginregister.php"</script>';
        }
    } else {
        echo "<script>alert('Silakan pilih level (user atau admin).')</script>";
        echo '<script>window.location.href = "../auth/loginregister.phpp"</script>';
    }

    
}
?>