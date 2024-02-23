<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_penerbit'])) {
    $id_penerbit = $_GET['id_penerbit'];

    // Query untuk mengambil data penerbit berdasarkan id_penerbit
    $query = "SELECT * FROM penerbit WHERE IdPenerbit = '$id_penerbit'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Data penerbit ditemukan, tampilkan form edit
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Penerbit</title>
            <link rel="stylesheet" href="./style.css">
        </head>
        <body>
            <div class='container-form'>
                <h1>Edit Penerbit</h1>
                <form action="edit_penerbit_process.php" method="POST">
                    <input type="hidden" name="id_penerbit" value="<?php echo $row['IdPenerbit']; ?>">
                    <label for="nama_penerbit">Nama Penerbit:</label><br>
                    <input type="text" id="nama_penerbit" name="nama_penerbit" value="<?php echo $row['nama_penerbit']; ?>"><br>
                    <label for="alamat">Alamat:</label><br>
                    <input type="text" id="alamat" name="alamat" value="<?php echo $row['alamat']; ?>"><br>
                    <label for="kota">Kota:</label><br>
                    <input type="text" id="kota" name="kota" value="<?php echo $row['kota']; ?>"><br>
                    <label for="telepon">Telepon:</label><br>
                    <input type="text" id="telepon" name="telepon" value="<?php echo $row['telepon']; ?>"><br>
                    <input type="submit" value="Simpan">
                    <input type="button" value="Back" onclick="history.back()">
                </form>
            </div>
        </body>
        </html>
        <?php
    } else {
        // Jika data penerbit tidak ditemukan, tampilkan pesan error
        echo "Data penerbit tidak ditemukan.";
    }
} else {
    // Jika id_penerbit tidak disertakan dalam URL, tampilkan pesan error
    echo "ID Penerbit tidak valid.";
}

mysqli_close($connection);
?>
