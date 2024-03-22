<?php
$conn = mysqli_connect("localhost", "root", "", "smk");

$result = mysqli_query($conn, "SELECT * FROM crud");

require 'function.php';
$produk = query("SELECT * FROM crud");



// Koneksi ke database
include_once 'function.php'; // Sesuaikan dengan file koneksi Anda

// Query untuk mendapatkan semua produk
$query = "SELECT * FROM crud";

// Periksa apakah ada kata kunci pencarian
if (isset ($_GET['keyword'])) {
    // Ambil kata kunci pencarian
    $keyword = $_GET['keyword'];
    // Tambahkan kondisi pencarian ke dalam query
    $query .= " WHERE nama LIKE '%$keyword%' OR umur LIKE '%$keyword%' OR hobi LIKE '%$keyword%'";
}

// Eksekusi query
$result = mysqli_query($conn, $query);

// Ambil data produk
$produk = [];
while ($row = mysqli_fetch_assoc($result)) {
    $produk[] = $row;
}



?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
    <!-- Nav -->
    <nav class="justify-content-between">
        <a href="#" onclick="location.reload();">
            <h1>TechPro Solutions.</h1>
        </a>

        <form class="form-inline" action="" method="GET">
            <input class="form-control mr-sm-2" type="search text" name="keyword" placeholder="Search"
                aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>

        <div class="link-create"><a href="create/index.php">Create</a></div>


    </nav>
    <!-- Nav End -->


    <div class="table">
        <table border="2px">
            <tr>
                <th>Nisn</th>
                <th>Aksi</th>
                <th>Nama</th>
                <th>Gambar</th>
                <th>Umur</th>
                <th>Hobi</th>
            </tr>

            <?php $i = 1;
            foreach ($produk as $row): ?>
                <tr>


                    <td>
                        <?= $row['nisn']; ?>
                    </td>
                    <td>
                        <div class="aksi"> <a class="update" href="update/index.php?nisn=<?= $row['nisn']; ?>">Update </a>
                            <p> | </p>
                            <a class="delete"  href="hapus.php?id=<?= $row['id']; ?>"> Delete</a>
                        </div>
                    </td>
                    <td>
                        <?= $row["nama"]; ?>
                    </td>
                    <td><img src="image/<?= $row['gambar']; ?>"></td>
                    <td>
                        <?= $row["umur"]; ?>
                    </td>
                    <td>
                        <?= $row["hobi"]; ?>
                    </td>

                </tr>
                <?php $i++ ?>
            <?php endforeach; ?>
        </table>

    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
</body>

</html>