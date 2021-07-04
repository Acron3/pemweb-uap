<?php

$conn = mysqli_connect("localhost","root","","uap");
session_start();

function login($data){
    global $conn;    
    $username = $data['username'];
    $raw_pwd = $data['password'];
    $pwd = md5($raw_pwd);
    $query="SELECT * FROM `user` WHERE `user`.`username` = '$username'";
    $tmp=mysqli_query($conn,$query);
    $cek = mysqli_num_rows($tmp);
    if($cek>0){
        $tmp=mysqli_query($conn,$query);
        $result=mysqli_fetch_assoc($tmp);
        $validasi=$result['password'];
        if($pwd === $validasi){
            $_SESSION['id_user'] = $result['id_user'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['status'] = 'login';
            return true;
        }
    }
    else{
        session_abort();
        return false;
    }
    
}

function register($data){
    global $conn;
    $username = $data['username'];
    $raw_pwd = $data['password'];
    $pwd = md5($raw_pwd);
    $query="SELECT * FROM `user` WHERE `user`.`username` = '$username'";
    $tmp=mysqli_query($conn,$query);
    $cek = mysqli_num_rows($tmp);
    if($cek>0){
        echo "<script>alert('username sudah ada')</script>";
    }else{   
        $tambah="INSERT INTO `user` VALUES ('null', '$username', '$pwd')";
        mysqli_query($conn, $tambah);
        echo "<script>alert('Akun Anda Berhasil terdaftar, Silahkan Login')</script>";
        echo "<meta http-equiv=\"refresh\" content=\"1; URL=index.php\" />";
    }
    // header('Location: index.php');
}

function agenda($query){
    global $conn;
    $result = mysqli_query ($conn,$query);
    $datas =[];
    while ($data = mysqli_fetch_assoc($result)){
        $datas[] = $data;
    }
    return $datas;
}
function update($data){
    global $conn;
    $id = $data['id'];
    $tanggal = $data['date'];
    $keterangan = $data['keterangan'];
    $query = "UPDATE reminder SET tanggal = '$tanggal', keterangan ='$keterangan' WHERE id_reminder=$id";
    if(mysqli_query($conn, $query)){
        echo "updated!";
        return true;
    }else{
        echo "Gagal Update. ( Error : ". $query ."<br>" . mysqli_error($conn) . " )";
        return false;
    }
}

function tambah($data){
    global $conn;
    $tanggal = $data['date'];
    $keterangan = $data['keterangan'];
    $id_user = $_SESSION['id_user'];
    $query = "INSERT INTO reminder VALUES ('', '$tanggal', '$keterangan', '$id_user')";
    mysqli_query($conn, $query);
    header('Location: home.php');
}