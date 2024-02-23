<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_buku = $_POST['id_buku'];
    $kategori = $_POST['kategori'];
    $nama_buku = $_POST['nama_buku'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];
    $id_penerbit = $_POST['id_penerbit'];

    $query = "UPDATE buku SET kategori='$kategori', nama_buku='$nama_buku', harga='$harga', stok='$stok', IdPenerbit='$id_penerbit' WHERE IdBuku='$id_buku'";

    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Data berhasil diupdate.'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Terdapat kesalahan saat mengupdate data.'); window.location.href = 'admin.php';</script>";
    }
} else {
    echo "<script>alert('Tidak ada data yang diproses.'); window.location.href = 'admin.php';</script>";
}

mysqli_close($connection);
?>
