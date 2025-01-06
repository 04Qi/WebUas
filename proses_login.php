<?php
session_start();
include 'konesi.php';

$username = mysqli_escape_string($koneksi,$_POST['username']);
$password = mysqli_escape_string($koneksi,$_POST['password']);

$sql = "SELECT * FROM data_admin WHERE nm_admin = '$username' AND pass = '$password'";
$query = mysqli_query($koneksi,$sql);

if(mysqli_num_rows($query) > 0){
    $data = mysqli_fetch_array($query);
    $_SESSION['id'] = $data['id'];
    $_SESSION['username'] = $data['nm_admin'];
    $_SESSION['password'] = $data['pass'];

    header('Location: admin.php');
}else{
    echo "<script>alert('Username atau Password salah!');window.location='index.php';</script>";
}

?>