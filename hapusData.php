<?php
require "koneksi.php";

if(isset($_GET['id'])){
    $id=$_GET['id'];
    $query="DELETE FROM reminder WHERE id_reminder=$id";
    $hasil= mysqli_query($conn,$query);
    if($hasil){
        header('Location: home.php');
    }
    else{
        echo "<script>alert('gagal menghapus agenda')</script>";
    }
}else{
    die("Data Tidak Ditemukan.");
}