<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "portofolio"; // <-- perbaiki sesuai nama database di phpMyAdmin

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
?>