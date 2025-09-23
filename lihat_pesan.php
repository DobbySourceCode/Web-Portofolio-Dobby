<?php
include 'koneksi.php';

$result = mysqli_query($koneksi, "SELECT * FROM contact_messages ORDER BY created_at DESC");
?>

<h2>Daftar Pesan</h2>
<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Email</th>
        <th>Pesan</th>
        <th>Tanggal</th>
    </tr>
    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
    <tr>
        <td><?= $row['id'] ?></td>
        <td><?= $row['name'] ?></td>
        <td><?= $row['email'] ?></td>
        <td><?= $row['message'] ?></td>
        <td><?= $row['created_at'] ?></td>
    </tr>
    <?php } ?>
</table>
