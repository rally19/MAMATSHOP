<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $cpassword = hash('sha256', $_POST['cpassword']);
    $level = isset($_POST['level']) ? $_POST['level'] : '';

    if (!empty($username) && !empty($email) && !empty($password) && !empty($cpassword) && !empty($level)) {
        if ($password === $cpassword) {
            $sql = "SELECT * FROM users WHERE email='$email'";
            $result = mysqli_query($conn, $sql);

            if ($result && mysqli_num_rows($result) === 0) {
                $sql = "INSERT INTO users (level, username, email, password) 
                        VALUES ('$level', '$username', '$email', '$password')";
                $insertResult = mysqli_query($conn, $sql);

                if ($insertResult) {
                    echo "<script>alert('User berhasil dibuat!');</script>";
                    echo "<script>window.location.href = 'index.php?action=list-user';</script>";
                    exit();
                } else {
                    echo "<script>alert('Terjadi kesalahan saat menyimpan data.');</script>";
                    echo "<script>window.location.href = 'create.php';</script>";
                }
            } else {
                echo "<script>alert('Woops! Email sudah terdaftar.');</script>";
                echo "<script>window.location.href = 'create.php';</script>";
            }
        } else {
            echo "<script>alert('Password dan konfirmasi password tidak sesuai.');</script>";
            echo "<script>window.location.href = 'create.php';</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi.');</script>";
        echo "<script>window.location.href = 'create.php';</script>";
    }
}
?>



<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center uk-margin-bottom">Buat User Baru</h2>
    <div class="uk-card uk-card-default uk-box-shadow-small uk-margin-bottom">
        <div class="uk-card-body">
    <form method="POST" action="" class="uk-form-stacked">
        <div class="uk-margin">
            <label for="level" class="uk-form-label"><strong>level:</strong></label>
            <div class="uk-form-controls">
                <select class="uk-select" name="level">
                <option disabled selected hidden>Register as</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
                </select>
            </div>
        </div>

        <div class="uk-margin">
            <label for="username" class="uk-form-label"><strong>username:</strong></label>
            <div class="uk-form-controls">
                <input id="username" type="text" name="username" class="uk-input" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="email" class="uk-form-label"><strong>email:</strong></label>
            <div class="uk-form-controls">
                <input id="email" type="text" name="email" class="uk-input" required>
            </div>
        </div>

        <div class="uk-margin">
            <label for="password" class="uk-form-label"><strong>password:</strong></label>
            <div class="uk-form-controls">
                <input id="password" type="password" name="password" class="uk-input" step="0.01" required>
            </div>
        </div>
        <div class="uk-margin">
            <label for="cpassword" class="uk-form-label"><strong>confirm password:</strong></label>
            <div class="uk-form-controls">
                <input id="cpassword" type="password" name="cpassword" class="uk-input" step="0.01" required>
            </div>
        </div>
        <br>
        <div class="uk-text-center">
            <button type="submit" class="uk-button uk-button-primary uk-box-shadow-small">Create User</button>
        </div>
    </form>
    </div>
    </div>
</div>
