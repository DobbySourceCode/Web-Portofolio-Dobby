<?php
include 'koneksi.php';

// ambil data
$sql = "SELECT * FROM about";
$result = mysqli_query($conn, $sql);

// cek jika ada data
$aboutData = [];
if ($result) {
    while ($row = mysqli_fetch_assoc($result)) {
        $aboutData[] = $row;
    }
} else {
    echo "Error: " . mysqli_error($conn);
}
?>