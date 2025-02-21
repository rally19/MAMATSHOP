<?php
include '../config.php';
include '../fungsi.php';

$id = isset($_GET['id']) ? $_GET['id'] : null;

if (!empty($id)) {
    $sql = "SELECT * FROM users WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
    } else {
        echo "<script>alert('Woops! User tidak ditemukan.');</script>";
        echo "<script>window.location.href = 'index.php?action=list-user';</script>";
    }
} else {
    echo "<script>alert('Id User tidak ada.');</script>";
    echo "<script>window.location.href = 'index.php?action=list-user';</script>";
}
?>


<div class="uk-container uk-margin-top">
    <h2 class="uk-text-center uk-margin-bottom">User Details</h2>
    <div class="uk-card uk-card-default uk-box-shadow-small">
        <div class="uk-card-body">
                    <p><strong>id:</strong> <?php echo $user['id']; ?></p>
                    <p><strong>level:</strong> <?php echo $user['level']; ?></p>
                    <p><strong>username:</strong> <?php echo $user['username']; ?></p>
                    <p><strong>email:</strong> <?php echo $user['email']; ?></p>
                    <p><strong>password:</strong> <?php echo $user['password']; ?></p>
                    <br><br><br>
                    <a href="index.php?action=list-user" class="uk-button uk-button-primary uk-box-shadow-small">Kembali</a>

            </div>
        </div>
    </div>
</div>
