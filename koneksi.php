<?php
// Informasi koneksi database
$servername = "localhost"; // Hostname, misalnya localhost
$username = "root"; // Username MySQL
$password = ""; // Password MySQL, biasanya kosong untuk localhost
$dbname = "data"; // Nama database yang ingin Anda gunakan

// Membuat koneksi
$connection = mysqli_connect($servername, $username, $password, $dbname);

// Memeriksa koneksi
if (!$connection) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
