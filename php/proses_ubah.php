<?php
//memanggil file koneksi
include 'koneksi.php';

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $produk = $_POST['produk'];
    $kategori = $_POST['kategori'];
    $stok = $_POST['stok'];
    $harga = $_POST['harga'];
    $tanggal_masuk = $_POST['tanggal_masuk'];
    $tanggal_expired = $_POST['tanggal_expired'];
    $lokasi_rak = $_POST['lokasi_rak'];

    // Menjalankan query update berdasarkan ID
    $query_update = "UPDATE daftar_flowrish SET
        produk = '$produk',
        kategori = '$kategori',
        stok = '$stok',
        harga = '$harga',
        tanggal_masuk = '$tanggal_masuk',
        tanggal_expired = '$tanggal_expired',
        lokasi_rak = '$lokasi_rak'
        WHERE id = '$id'";
    $update = mysqli_query($koneksi, $query_update);

    if ($update) {
        header("Location: ../data.php");
        exit();
    } else {
        echo "Data gagal diperbarui: " . mysqli_error($koneksi);
    }
}
?>