<?php
// File ini khusus untuk mengambil data sebelum modal tampil
$data = null; 

if (isset($_GET['edit_id'])) {
    $id_target = $_GET['edit_id'];
    // Mengambil data dari database berdasarkan ID di URL
    $query_ambil = mysqli_query($koneksi, "SELECT * FROM daftar_flowrish WHERE id = '$id_target'");
    
    if (mysqli_num_rows($query_ambil) > 0) {
        $data = mysqli_fetch_assoc($query_ambil);
    }
}
?>