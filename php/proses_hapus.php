<?php
// memanggil file koneksi
include 'koneksi.php';
    // mengambil id dari input hidden modal hapus
    $id = $_POST['id'];
    $id = mysqli_real_escape_string($koneksi, $id);

    // jalankan query hapus
    $query_hapus = "DELETE FROM daftar_flowrish WHERE id = '$id'";
    $hapus = mysqli_query($koneksi, $query_hapus);

    // cek keberhasilan query
    if ($hapus) {
        // kmbali ke hlmn utama
        header("Location: ../data.php");
        exit();
    } else {
        echo "Data gagal dihapus! Error: " . mysqli_error($koneksi);
    }

?>