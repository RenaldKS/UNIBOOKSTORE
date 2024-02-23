<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pengadaan Buku</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <br><br><br>
    <div class='container-form'>
        <h1>Laporan Pengadaan Buku</h1>
        <table>
            <tr>
                <th>Judul Buku</th>
                <th>Nama Penerbit</th>
            </tr>
            <?php
            include 'koneksi.php';

            $query = "SELECT b.nama_buku, p.nama_penerbit
                      FROM buku b
                      JOIN penerbit p ON b.IdPenerbit = p.IdPenerbit
                      WHERE b.stok = (SELECT MIN(stok) FROM buku)";
            $result = mysqli_query($connection, $query);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row['nama_buku'] . "</td>";
                echo "<td>" . $row['nama_penerbit'] . "</td>";
                echo "</tr>";
            }

            mysqli_close($connection);
            ?>
        </table>
        <br>
        <button type='button' onclick="history.back()">Back</button>
    </div>
</body>

</html>
