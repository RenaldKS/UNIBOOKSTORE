<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UNIBOOKSTORE</title>
    <link rel="stylesheet" href="./style.css">
</head>

<body>
    <?php
    include 'koneksi.php';

    // Query to fetch data from table_buku based on search keyword
    $searchKeyword = isset($_GET['search']) ? $_GET['search'] : '';
    $queryBuku = "SELECT * FROM buku WHERE LOWER(CONCAT(IdBuku, kategori, nama_buku, harga, stok, Idpenerbit)) LIKE LOWER('%$searchKeyword%')";
    $resultBuku = mysqli_query($connection, $queryBuku);
    ?>
    <div class='container'>
    <nav>
        <ul>
            <li><a href='pengadaan.php'>Pengadaan</a></li>
            <li><a href='admin.php'>Admin</a></li>
            <li><a href='index.php'>Home</a></li>
        </ul>
    </nav>
    <h1>UNIBOOKSTORE.</h1>
    <h2>Table Buku</h2>
    <form method='GET' action='' align='right'>
        <label for='search'>Search:</label>
        <input type='text' id='search' name='search' value='<?php echo $searchKeyword; ?>'>
        <input type='submit' value='Search'>
    </form>
    <br>
    <table>
        <tr><th>ID BUKU</th><th>Kategori</th><th>Nama Buku</th><th>Harga</th><th>Stok</th><th>Penerbit</th></tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultBuku)) {
            echo "<tr>";
            echo "<td>" . $row['IdBuku'] . "</td>";
            echo "<td>" . $row['kategori'] . "</td>";
            echo "<td>" . $row['nama_buku'] . "</td>";
            echo "<td>" . number_format($row['harga'],0, ',',',') . "</td>";
            echo "<td>" . $row['stok'] . "</td>";
            $idPenerbit = $row['IdPenerbit'];
            $queryPenerbit = "SELECT nama_penerbit FROM penerbit WHERE IdPenerbit = '$idPenerbit'";
            $resultPenerbit = mysqli_query($connection, $queryPenerbit);
            $rowPenerbit = mysqli_fetch_assoc($resultPenerbit);
            $namaPenerbit = isset($rowPenerbit['nama_penerbit']) ? $rowPenerbit['nama_penerbit'] : "";
    
            echo "<td>" . $namaPenerbit . "</td>";
            echo "</tr>";       
        }
        ?>
    </table>
    <br> <br><br><br><br><br><br><br><br>
        </div>
    <?php
    // Close the database connection
    mysqli_close($connection);
    ?>
</body>

</html>
