<?php
require "koneksi.php";
$tanggal = date('Y-m-d');
if(isset($_POST['logout'])){
    session_unset();
    header('Location: index.php');
}
if($_SESSION['status']=='login'){
    $username= $_SESSION['username'];
    $id_user = $_SESSION['id_user'];
    echo "<script>alert('Selamat Datang ",$username," ')</script>";
}else{
    echo "<script>alert('Silahkan Login terlebih dahulu')</script>";
    echo "<meta http-equiv=\"refresh\" content=\"0; URL=index.php\" />";
}
$query1="SELECT * FROM `reminder` WHERE `id_user` = '$id_user' and `tanggal` = '$tanggal'";
$today = agenda($query1);
$query2="SELECT * FROM `reminder` WHERE `id_user` = '$id_user' and `tanggal` != '$tanggal' ORDER BY tanggal ASC";
$comingsoon = agenda($query2);
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
        <link rel="icon" type="image/png" href="assets/logo-title.png">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
        <title>Reline | Home</title>
    </head>
    <body class="bg-dark">
    <nav class="navbar navbar-secondary bg-secondary">
        <div class="container">
            <a class="navbar-brand" href="#" style="text-decoration:none;">
                <img src="assets/logo1.png" alt="" width =5%>
                <span style="padding-left: 10px;text-decoration : none; color :white;"> 
                    Reline | Reminder Online 
                </span>
            </a>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#" style="color:white">Home</a>
                </li>
            </ul>  
            <div class="navbar-nav dropdown">
                <a class="nav-link dropdown-toggle" style="color:white;" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <?=$username; ?>
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li>
                        <form method="POST" style="padding-right :10px">
                            <button style="float : right" type="submit" class="btn btn-danger" name="logout">
                            Logout
                            </button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <br>
    <main class="container bg-light card">
        <br><br>
        <h2 class="text-secondary">Today</h2>
        <h4 class="text-secondary"><?=$tanggal?></h4>
        <br>
        <table class="table table-striped table-hover w-75">
            <tbody>
            <?php 
                foreach ($today as $data) : 
            ?>
                <tr>
                    <th align="center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                    </th>
                    <td><?= $data['keterangan'] ?></td>
                    <td align="right">
                        <a href="hapusData.php?id=<?=$data['id_reminder'];?>" ><button class="btn btn-danger">Hapus</button></a>
                        <a href="updateData.php?id=<?=$data['id_reminder'];?>" ><button class="btn btn-success">Update</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td align="right"><a href="tambahDataToday.php" ><button class="btn btn-success">Tambah</button></a></td>
                </tr>
            </tbody>
        </table>
        <br>
        <h2 class="text-secondary">Coming Soon</h2>
        <br><br>
        <table class="table table-striped table-hover w-75">
            <tbody>
        <?php foreach ($comingsoon as $data) :
            ?>
                <tr>
                    <th scope="row">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check" viewBox="0 0 16 16">
                            <path d="M10.854 7.146a.5.5 0 0 1 0 .708l-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 1 1 .708-.708L7.5 9.793l2.646-2.647a.5.5 0 0 1 .708 0z"/>
                            <path d="M3.5 0a.5.5 0 0 1 .5.5V1h8V.5a.5.5 0 0 1 1 0V1h1a2 2 0 0 1 2 2v11a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V3a2 2 0 0 1 2-2h1V.5a.5.5 0 0 1 .5-.5zM1 4v10a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1V4H1z"/>
                        </svg>
                    </th>
                    <td><?=$data['tanggal'] ?></td>
                    <td><?= $data['keterangan'] ?></td>
                    <td align="right">
                        <a href="hapusData.php?id=<?=$data['id_reminder'];?>" ><button class="btn btn-danger">Hapus</button></a>
                        <a href="updateData.php?id=<?=$data['id_reminder'];?>" ><button class="btn btn-success">Update</button></a>
                    </td>
                </tr>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td align="right"><a href="tambahData.php"><button class="btn btn-success">Tambah</button></a></td>
            </tr>
        </tbody>
        </table>
    </main>
    </body>
</html>