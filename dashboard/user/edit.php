<?php
include '../config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = isset($_POST['id']) ? $_POST['id'] : null;
    $level = $_POST['level'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($id) && !empty($level) && !empty($username) && !empty($email)) {
        if (!empty($password)) {
            $hashedPassword = hash('sha256', $password);
            $sql = "UPDATE users SET level = '$level', username = '$username', email = '$email', password = '$hashedPassword' WHERE id = '$id'";
        } else {
            $sql = "UPDATE users SET level = '$level', username = '$username', email = '$email' WHERE id = '$id'";
        }

        $result = mysqli_query($conn, $sql);

        if ($result) {
            echo "<script>alert('User berhasil diperbarui!');</script>";
            echo "<script>window.location.href = 'index.php?action=list-user';</script>";
            exit();
        } else {
            echo "<script>alert('Woops! Terjadi kesalahan saat memperbarui user.');</script>";
            echo "<script>window.location.href = 'index.php?action=list-user';</script>";
        }
    } else {
        echo "<script>alert('Semua field harus diisi.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-user';</script>";
    }
}

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($id) && is_numeric($id)) {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('User tidak ditemukan.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-user';</script>";
    }
} else {
    echo "<script>alert('Id User tidak ada atau tidak valid.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-user';</script>";
}
?>

<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center uk-margin-bottom">Edit User</h2>
    <div class="uk-card uk-card-default uk-box-shadow-small uk-margin-bottom">
        <div class="uk-card-body">
            <form method="POST" action="" class="uk-form-stacked">
                <input type="hidden" name="id" value="<?php echo htmlspecialchars($user['id']); ?>">
                <div class="uk-margin">
                <label for="level" class="uk-form-label"><strong>Level:</strong></label>
                <div class="uk-form-controls">
                    <select id="level" name="level" class="uk-select" required>
                        <option value="user" <?php echo ($user['level'] === 'user') ? 'selected' : ''; ?>>User</option>
                        <option value="admin" <?php echo ($user['level'] === 'admin') ? 'selected' : ''; ?>>Admin</option>
                    </select>
                </div>
                </div>
                <div class="uk-margin">
                    <label for="username" class="uk-form-label"><strong>Username:</strong></label>
                    <div class="uk-form-controls">
                        <input id="username" type="text" name="username" value="<?php echo htmlspecialchars($user['username']); ?>" class="uk-input" required>
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="email" class="uk-form-label"><strong>Email:</strong></label>
                    <div class="uk-form-controls">
                        <input id="email" type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" class="uk-input" required>
                    </div>
                </div>
                <div class="uk-margin">
                    <label for="password" class="uk-form-label"><strong>Password:</strong></label>
                    <div class="uk-form-controls">
                        <input id="password" type="password" value="<?php echo htmlspecialchars($user['password']); ?>" name="password" class="uk-input">
                    </div>
                </div>
                <br>
                <div class="uk-text-center">
                    <button type="submit" class="uk-button uk-button-primary uk-border-rounded uk-box-shadow-small">Update User</button>
                </div>
            </form>
        </div>
    </div>
</div>
