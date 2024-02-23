<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    $query = "DELETE FROM buku WHERE IdBuku = '$id_buku'";
    if (mysqli_query($connection, $query)) {
        echo "<script>alert('Data berhasil dihapus.'); window.location.href = 'admin.php';</script>";
    } else {
        echo "<script>alert('Terdapat kesalahan saat menghapus data.'); window.location.href = 'admin.php';</script>";
    }
} else {
    echo "<script>alert('Tidak ada data yang diproses.'); window.location.href = 'admin.php';</script>";
}

mysqli_close($connection);
?>
