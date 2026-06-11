<?php
include 'koneksi.php';

//pagination
$batas = 5;

$halaman = isset($_GET['halaman']) ? $_GET['halaman'] : 1;
$halaman_awal = ($halaman - 1) * $batas;

//search
$cari = isset($_GET['cari']) ? $_GET['cari'] : '';

//query data
$query_data = mysqli_query(
    $koneksi,
    "SELECT * FROM daftar_flowrish 
    WHERE produk LIKE '%$cari%'
    ORDER BY id DESC
    LIMIT $halaman_awal, $batas"
);

//hitung total data
$query_total = mysqli_query(
    $koneksi,
    "SELECT * FROM daftar_flowrish
    WHERE produk LIKE '%$cari%'"
);

$total_data = mysqli_num_rows($query_total);
$total_halaman = ceil($total_data / $batas);
?>