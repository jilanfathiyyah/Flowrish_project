<?php
// Memanggil file koneksi
include 'koneksi.php';

// Pastikan tombol dengan name="delete" ditekan
if (isset($_POST['delete'])) {
    // Menangkap ID dari input hidden modal hapus
    $id = $_POST['id'];
    $id = mysqli_real_escape_string($koneksi, $id);

    // Jalankan query hapus
    $query_hapus = "DELETE FROM daftar_flowrish WHERE id = '$id'";
    $hapus = mysqli_query($koneksi, $query_hapus);

    // Cek keberhasilan query
    if ($hapus) {
        // Kembali ke halaman utama setelah berhasil menghapus
        header("Location: ../data.php");
        exit();
    } else {
        echo "Data gagal dihapus! Error: " . mysqli_error($koneksi);
    }
} 
?>