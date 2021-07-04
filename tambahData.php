<?php
require 'koneksi.php';
$tanggal = date('Y-m-d');

if (isset($_POST['tambah'])) {
    if(tambah($_POST)){
        header('Location: home.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
        <title>Reline | Login</title>
        <link rel="icon" type="image/png" href="assets/logo-title.png">
    </head>
    <body class="bg-danger">
    <div class="container-fluid" align='center'><br><br><br><br><br><br>
        <h1 style="font-family: 'Bebas Neue', cursive;color:white">Tambah Agenda Baru </h1>
        <div class="card align-middle w-50">
            <form style="margin: 10px 20px;" method="POST">
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Tanggal : </label>
                  <input type="date" class="form-control" id="date" name="date" placeholder="Tanggal" min="<?=$tanggal;?>" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Agenda :</label>
                  <textarea style="width:100%"name="keterangan" wrap="hard" required></textarea><br/>
                </div>
                <button align="left" class = "btn btn-success"><a style="text-decoration:none;color:white;" href="./home.php">Kembali</a></button>
                <button type="submit" class="btn btn-danger" name="tambah">Submit</button>
              </form>
        </div>
    </div>
    </body>
</html>