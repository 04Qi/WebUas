<?php
$host="localhost";
$user="root";
$pass="";
$db="hemart";
$koneksi=mysqli_connect($host,$user,$pass) or mysqli_error();
mysqli_select_db($koneksi,$db);
?>