<?php
require 'function.php';
$id = $_GET["id"];

if (hapus($id) > 0) {
    echo "<script>
            alert('Data Berhasil Di Hapus'
            document.location.href = 'index.php';
    </script>";
} else {
    echo "<script>
    alert('Data Gagal Di Hapus'
    document.location.href = 'index.php';
</script>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <a href="index.php">Home</a>
</body>

</html>