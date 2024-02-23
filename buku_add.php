<?php
include 'koneksi.php';

// Bagian PHP untuk menambahkan data buku
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_penerbit = $_POST['id_penerbit'];

    $query = "INSERT INTO buku (IdBuku, kategori, nama_buku, harga, stok, IdPenerbit) 
              VALUES ('$id_buku', '$kategori', '$nama_buku', '$harga', '$stok', '$id_penerbit')";

    try {
        if (mysqli_query($connection, $query)) {
            echo "<script>alert('Data berhasil ditambahkan.'); window.location.href = 'admin.php';</script>";
        } else {
            throw new Exception("Terdapat kesalahan.");
        }
    } catch (Exception $e) {
        // Menggunakan JavaScript untuk menampilkan alert box dan redirect
        echo "<script>alert('Terdapat Kesalahan'); window.location.href = 'buku_add.php';</script>";
    }
}

// Bagian HTML untuk menampilkan form tambah buku
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
        <h1>Admin Tambah</h1>
        <form action="buku_add.php" method="POST">
            <label for="id_buku">ID Buku:</label><br>
            <input type="text" id="id_buku" name="id_buku"><br>
            <label for="kategori">Kategori:</label><br>
            <input type="text" id="kategori" name="kategori"><br>
            <label for="nama_buku">Nama Buku:</label><br>
            <input type="text" id="nama_buku" name="nama_buku"><br>
            <label for="harga">Harga:</label><br>
            <input type="text" id="harga" name="harga"><br>
            <label for="stok">Stok:</label><br>
            <input type="text" id="stok" name="stok"><br>
            <label for="id_penerbit">Penerbit:</label><br><br>
            <select id="id_penerbit" name="id_penerbit">
                <?php
                $query = "SELECT * FROM penerbit";
                $result = mysqli_query($connection, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<option value='" . $row['IdPenerbit'] . "'>" . $row['nama_penerbit'] . "</option>";
                }
                mysqli_close($connection);
                ?>
            </select><br><br>
            <input type="submit" value="Submit">
            <input type="reset" value="Reset">
            <input type="button" value="Back" onclick="history.back()">
        </form>
    </div>
</body>

</html>
