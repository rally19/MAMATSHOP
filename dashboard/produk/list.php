<?php
$sql = "SELECT * FROM products";
$result = mysqli_query($conn, $sql);

if (!$result) {
    echo "<script>alert('Woops! Terjadi kesalahan saat mengambil data produk.');</script>";
    echo "<script>window.location.href = 'index.php?action=home';</script>";
    exit();
}
?>

<div class="uk-container uk-margin-top">
    <div class="uk-flex uk-flex-between uk-align-center uk-margin-bottom">
        <h2 class="uk-margin-remove">List Produk</h2>
        <a href="index.php?action=create-produk" class="uk-button uk-button-primary uk-box-shadow-small">Buat Produk Baru</a>
    </div>
    <div class="uk-overflow-auto">
    <table class="uk-table uk-table-striped uk-table-hover uk-box-shadow-small">
        <thead>
            <tr>
                <th class="uk-text-center">No.</th>
                <th class="uk-text-center">Id</th>
                <th>Name</th>
                <th class="uk-text-center">Tipe</th>
                <th class="uk-text-center">Pembuat</th>
                <th class="uk-text-center">Harga</th>
                <th class="uk-text-center">Stok</th>
                <th class="uk-text-center">Actions</th>
            </tr>
        </thead>
        <tbody>
    <?php $counter = 1; while ($row = $result->fetch_assoc()): ?>
        <tr>
            <td class="uk-text-center"><?php echo $counter++; ?></td>
            <td class="uk-text-center"><?php echo $row['id']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td class="uk-text-center"><?php echo $row['type']; ?></td>
            <td class="uk-text-center"><?php echo $row['manufacturer']; ?></td>
            <td class="uk-text-center"><?php echo formatUang($row['price']); ?></td>
            <td class="uk-text-center"><?php echo $row['stock']; ?></td>
            <td class="uk-text-center uk-flex uk-flex-middle uk-flex-center">
                <a href="index.php?action=view-produk&id=<?php echo $row['id']; ?>" class="uk-icon-button uk-button-primary" uk-icon="eye"></a>
                <a href="index.php?action=edit-produk&id=<?php echo $row['id']; ?>" class="uk-icon-button uk-button-secondary" uk-icon="pencil"></a>
                <a href="index.php?action=delete-produk&id=<?php echo $row['id']; ?>" class="uk-icon-button uk-button-danger" uk-icon="trash" onclick="return confirm('Kamu yakin untuk menghapus data ini?')"></a>
            </td>
        </tr>
    <?php endwhile; ?>
</tbody>

    </table>
    </div>
</div>
