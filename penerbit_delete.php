<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_penerbit'])) {
    $id_penerbit = $_GET['id_penerbit'];

    $query = "DELETE FROM penerbit WHERE IdPenerbit = '$id_penerbit'";
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
