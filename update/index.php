<?php
$nisn = $_GET["nisn"];
$conn = mysqli_connect("localhost", "root", "", "smk");

$result = mysqli_query($conn, "SELECT * FROM crud WHERE nisn = $nisn");
$row = mysqli_fetch_assoc($result);

if (isset ($_POST["submit"])) {
    $nisn = $_POST["nisn"];
    $nama = $_POST["nama"];
    $gambar = $_POST["gambar"];
    $umur = $_POST["umur"];
    $hobi = $_POST["hobi"];

    echo "<script>
    alert('Data Berhasil Di Perbarui'
    document.location.href = 'index.php';
</script>";

    $query = "UPDATE crud SET nama='$nama', gambar='$gambar', umur='$umur', hobi='$hobi' WHERE nisn ='$nisn'";
    mysqli_query($conn, $query);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data</title>
    <style>
        *,
        html,
        body {
            margin: 0;
            padding: 0;

        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(to right, black, gray);
        }

        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            position: relative;
            /* Penting untuk pengaturan posisi */
            width: 100%;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99;
        }

        form {
            position: absolute;
            /* Mengatur posisi form */
            width: 300px;
            /* Sesuaikan lebar form sesuai kebutuhan */
            padding: 20px;
            background: linear-gradient(to bottom right, rgb(131, 0, 207), rgb(255, 28, 255));
            border: 3px solid transparent;
            border-image: linear-gradient(to right, rgb(255, 55, 0), rgb(255, 208, 0))1;
            /* border-radius: 20px; */
            z-index: 100;
        }


        input {
            background-color: white;
            text-decoration: underline;
            border-radius: 5px;
        }

        button {
            border-radius: 5px;
            width: 20em;
            margin: 5px;
            padding: 5px;
            cursor: pointer;
        }

        a {
            position: relative;
            text-align: center;
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container">

        <form action="" method="post">
            <ul>
                <li><label for="nisn">Nisn</label>
                    <input type="text" name="nisn" id="nisn" value="<?= $row['nisn']; ?>">
                </li>
                <li><label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" value="<?= $row['nama']; ?>">
                </li>
                <li><label for="gambar">Gambar</label>
                    <input type="text" name="gambar" id="gambar" value="<?= $row['gambar']; ?>">
                </li>
                <li><label for="umur">Umur</label>
                    <input type="text" name="umur" id="umur" value="<?= $row['umur']; ?>">
                </li>
                <li><label for="hobi">Hobi</label>
                    <input type="text" name="hobi" id="hobi" value="<?= $row['hobi']; ?>">
                </li>

                <button type="submit" name="submit">Update</button>
                <a href="index.php">kembali ke halaman utama</a>

            </ul>
        </form>
    </div>
</body>

</html>