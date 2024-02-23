<?php
include 'koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET['id_buku'])) {
    $id_buku = $_GET['id_buku'];

    // Query untuk mengambil data buku berdasarkan id_buku
    $query = "SELECT * FROM buku WHERE IdBuku = '$id_buku'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);

    if ($row) {
        // Data buku ditemukan, tampilkan form edit
        ?>
        <!DOCTYPE html>
        <html lang="en">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Edit Buku</title>
            <link rel="stylesheet" href="./style.css">
        </head>

        <body>
            <br><br><br>
            <div class='container-form'>
                <h1>Edit Buku</h1>
                <form action="buku_edit_process.php" method="POST">
                    <input type="hidden" name="id_buku" value="<?php echo $row['IdBuku']; ?>"><br>
                    <label for="kategori">Kategori:</label><br>
                    <input type="text" id="kategori" name="kategori" value="<?php echo $row['kategori']; ?>"><br>
                    <label for="nama_buku">Nama Buku:</label><br>
                    <input type="text" id="nama_buku" name="nama_buku" value="<?php echo $row['nama_buku']; ?>"><br>
                    <label for="harga">Harga:</label><br>
                    <input type="text" id="harga" name="harga" value="<?php echo $row['harga']; ?>"><br>
                    <label for="stok">Stok:</label><br>
                    <input type="text" id="stok" name="stok" value="<?php echo $row['stok']; ?>"><br>
                    <label for="id_penerbit">Penerbit:</label><br><br>
                    <select id="id_penerbit" name="id_penerbit">
                        <?php
                        $query_penerbit = "SELECT * FROM penerbit";
                        $result_penerbit = mysqli_query($connection, $query_penerbit);
                        while ($penerbit = mysqli_fetch_assoc($result_penerbit)) {
                            $selected = ($penerbit['IdPenerbit'] == $row['IdPenerbit']) ? 'selected' : '';
                            echo "<option value='" . $penerbit['IdPenerbit'] . "' $selected>" . $penerbit['nama_penerbit'] . "</option>";
                        }
                        ?>
                    </select><br><br>
                    <input type="submit" value="Simpan">
                    <input type="button" value="Back" onclick="history.back()">
                </form>
            </div>
        </body>

        </html>
        <?php
    } else {
        // Jika data buku tidak ditemukan, tampilkan pesan error
        echo "Data buku tidak ditemukan.";
    }
} else {
    // Jika id_buku tidak disertakan dalam URL, tampilkan pesan error
    echo "ID Buku tidak valid.";
}

mysqli_close($connection);
?>
