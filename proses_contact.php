<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name    = mysqli_real_escape_string($koneksi, $_POST['name']);
    $email   = mysqli_real_escape_string($koneksi, $_POST['email']);
    $message = mysqli_real_escape_string($koneksi, $_POST['message']);

    $sql = "INSERT INTO contact_messages (name, email, message) 
            VALUES ('$name', '$email', '$message')";

    if (mysqli_query($koneksi, $sql)) {
        echo "<script>alert('Pesan berhasil dikirim!'); window.location.href='index.php#contact';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($koneksi);
    }
}
?>
