<?php
include 'koneksi.php';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_penerbit = $_POST['IdPenerbit'];
    $nama_penerbit= $_POST['nama_penerbit'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];   
    $query = "INSERT INTO penerbit (IdPenerbit, nama_penerbit, alamat,kota,telepon) 
              VALUES ('$id_penerbit', '$nama_penerbit', '$alamat', '$kota', '$telepon')";

    try {
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Data berhasil ditambahkan.'); window.location.href = 'admin.php';</script>";
        } else {
            throw new Exception("Terdapat kesalahan.");
        }
    } catch (Exception $e) {
        // Menggunakan JavaScript untuk menampilkan alert box dan redirect
        echo "<script>alert('Terdapat Kesalahan'); window.location.href = 'penerbit_add.php';</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Tambah</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <br><br><br>
    <div class='container-form'>
        <h1>Tambah Penerbit</h1>
        <form action="penerbit_add.php" method="POST">
            <label for="id_buku">ID Penerbit:</label><br>
            <input type="text" id="IdPenerbit" name="IdPenerbit"><br>
            <label for="kategori">Nama Penerbit:</label><br>
            <input type="text" id="nama_penerbit" name="nama_penerbit"><br>
            <label for="nama_buku">Alamat:</label><br>
            <input type="text" id="alamat" name="alamat"><br>
            <label for="harga">Kota:</label><br>
            <input type="text" id="kota" name="kota"><br>
            <label for="stok">Telepon:</label><br>
            <input type="text" id="telepon" name="telepon"><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            <input type="button" value="Back" onclick="history.back()">
        </form>
    </div>
</body>

</html>
