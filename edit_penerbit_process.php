<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['id_penerbit'])) {
    $id_penerbit = $_POST['id_penerbit'];
    $nama_penerbit = $_POST['nama_penerbit'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $telepon = $_POST['telepon'];

    $query = "UPDATE penerbit SET nama_penerbit = '$nama_penerbit', alamat = '$alamat', kota = '$kota', telepon = '$telepon' WHERE IdPenerbit = '$id_penerbit'";
    
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
