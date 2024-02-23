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
    $resultPenerbit = mysqli_query($connection, "SELECT * FROM penerbit");
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
    <h3>TABLE BUKU</h3>
    <table>
        <tr><th>ID BUKU</th><th>Kategori</th><th>Nama Buku</th><th>Harga</th><th>Stok</th><th>Penerbit</th><th>Menu Admin</th></tr>
        <?php
        while ($row = mysqli_fetch_assoc($resultBuku)) {
            echo "<tr>";
            echo "<td>" . $row['IdBuku'] . "</td>";
            echo "<td>" . $row['kategori'] . "</td>";
            echo "<td>" . $row['nama_buku'] . "</td>";
            echo "<td>" . number_format($row['harga'],0, ',',',') . "</td>";
            echo "<td>" . $row['stok'] . "</td>";
            echo "<td>" . $row['IdPenerbit'] . "</td>";
            echo "<td>" . "<button type='button'><a href='buku_edit.php?id_buku=" . $row['IdBuku'] . "'>Edit</a></button> <button type='button'><a href='buku_delete.php?id_buku=". $row['IdBuku'] . "'>Delete</a></button> </td>";
            echo "</tr>";
        }
        ?>
    </table>
    <br>
    <button class='tambah' type='Tambah' name='Tambah' value='Tambah' ><a href=buku_add.php>Tambah </a></button>
    <br><br>
    <h3>TABLE PENERBIT</h3>
    <table>
    <tr><th>ID Penerbit</th><th>Nama Penerbit</th><th>Alamat</th><th>Kota</th><th>Telepon</th><th>Menu Admin</th></tr>
    <?php
    while ($row = mysqli_fetch_assoc($resultPenerbit)) {
        echo "<tr>";
        echo "<td>" . $row['IdPenerbit'] . "</td>";
        echo "<td>" . $row['nama_penerbit'] . "</td>";
        echo "<td>" . $row['alamat'] . "</td>";
        echo "<td>" . $row['kota'] . "</td>";
        echo "<td>" . $row['telepon'] . "</td>";
        echo "<td>" . "<button type='button'><a href='penerbit_edit.php?id_penerbit=" . $row['IdPenerbit'] . "'>Edit</a></button> <button type='button'><a href='penerbit_delete.php?id_penerbit=". $row['IdPenerbit'] . "'>Delete</a></button> </td>";
        echo "</tr>";
    }
    ?>
</table>
<br>
<button class='tambah' type='Tambah' name='Tambah' value='Tambah'><a href=penerbit_add.php>Tambah</button>
<br> <br><br><br>
        </div>
    <?php
    // Close the database connection
    mysqli_close($connection);
    ?>
</body>

</html>
