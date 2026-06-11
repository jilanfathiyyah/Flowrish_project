<?php
//memanggil file koneksi
include 'koneksi.php';

//PROSES TAMBAH DATA
//mengambil data dari form
if (isset($_POST['simpan'])) {
    $produk = $_POST ['produk'];
    $kategori = $_POST ['kategori'];
    $stok = $_POST ['stok'];
    $harga = $_POST ['harga'];
    $tanggal_masuk = $_POST ['tanggal_masuk'];
    $tanggal_expired = $_POST ['tanggal_expired'];
    $lokasi_rak = $_POST ['lokasi_rak'];

    //query simpan data
    $query = "INSERT INTO daftar_flowrish
    (produk, kategori, stok, harga, tanggal_masuk, tanggal_expired, lokasi_rak)

    VALUES
    ('$produk', '$kategori', '$stok', '$harga', '$tanggal_masuk', '$tanggal_expired', '$lokasi_rak')";

    //menjalankan query
    $simpan = mysqli_query($koneksi, $query);

    //cek berhasil atau tidak
    if ($simpan) {
        //di arahkan ke halaman
        header ("Location: ../data.php");
    }else{
        echo "Data gagal disimpan";
    }
}

?>