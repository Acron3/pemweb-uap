<?php
    require "koneksi.php";
    if(isset($_POST['submit'])){
        if($_POST['password'] == $_POST['confirm']){
            register($_POST);
        }else{
            echo "<script>alert('Password tidak sama')</script>";
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
        <title>Reline | Register</title>
        <link rel="icon" type="image/png" href="assets/logo-title.png">
    </head>
    <body class="bg-danger">
    <div class="container-fluid" align='center'><br><br><br><br><br><br>
        <h1 style="font-family: 'Bebas Neue', cursive;color:white"> REGISTER </h1>
        <div class="card align-middle w-50">
            <form style="margin: 10px 20px;" method="POST">
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Username</label>
                  <input type="text" class="form-control" id="username" name="username" placeholder="Username" required>
                </div>
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Password</label>
                  <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                  <!-- <span>Belum punya akun? <a href="#">Daftar disini</a></span>   -->
                </div>
                <div class="mb-3">
                  <label class="form-label" style="float: left;">Confirm Password</label>
                  <input type="password" class="form-control" id="corfirm" name="confirm" placeholder="Confirm Password" required>
                  <!-- <span>Belum punya akun? <a href="#">Daftar disini</a></span>   -->
                </div>
                <button type="submit" class="btn btn-danger" name="submit">Submit</button>
              </form>
        </div>
    </div>
    </body>
</html>
