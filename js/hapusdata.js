// Ambil element modal hapus
const modalHapus = document.getElementById('modalHapusBarang');

// Deteksi saat modal hapus mulai terbuka di layar
modalHapus.addEventListener('show.bs.modal', function (event) {
    // Tombol sampah di tabel yang barusan diklik
    let tombolHapusDiTabel = event.relatedTarget;
    
    // Ambil nilai ID dari data-id tombol tersebut
    let idYangMauDihapus = tombolHapusDiTabel.getAttribute('data-id');
    
    // Masukkan ID-nya ke dalam input hidden milik modal hapus
    document.getElementById('hapus-id').value = idYangMauDihapus;
});