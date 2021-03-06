<?php
require 'koneksi.php';
$tanggal = date('Y-m-d');
if($_GET['id']){
    $id=$_GET['id'];
    $query1="SELECT * FROM `reminder` WHERE `id_reminder`=$id";
    $ket = agenda($query1);
}
if (isset($_POST['update'])) {
    if(update($_POST)){
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
        <h1 style="font-family: 'Bebas Neue', cursive;color:white">Update Agenda </h1>
        <div class="card align-middle w-50">
            <form style="margin: 10px 10px;" method="POST">
                <input type="hidden" name="id" value = "<?= $ket[0]['id_reminder'] ?>">
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Tanggal : </label>
                  <input type="date" class="form-control" id="date" name="date" placeholder="Tanggal" min="<?=$tanggal; ?>" value="<?=$ket[0]['tanggal']?>">
                </div>
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Agenda :</label>
                  <textarea style="width:100%" name="keterangan" wrap="hard">
                    <?=$ket[0]['keterangan']?>
                  </textarea><br/>
                </div>
                <button type="submit" class="btn btn-danger" name="update">Submit</button>
              </form>
        </div>
    </div>
    </body>
</html>