<?php

$host = "Localhost";
$user = "root";
$pass = "";
$db = "db_flowrish";

//membuat koneksi
$koneksi = mysqli_connect($host, $user, $pass, $db);

//mengecek konseksi
if(!$koneksi){
    die("Koneksi gagal :".mysqli_connect_error());
}
?>