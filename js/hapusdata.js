let barisYangMauDihapus = null;

// 1. Deteksi saat modal hapus mulai terbuka
document.getElementById('modalHapusBarang').addEventListener('show.bs.modal', function (event) {
    // Tombol di tabel yang memicu modal terbuka
    let tombolHapusdiTabel = event.relatedTarget; 
    // Cari baris (tr) dari tombol tersebut
    barisYangMauDihapus = tombolHapusDiTabel.closest('tr');
});

// 2. Logika ketika tombol "Ya, Hapus" di dalam modal diklik
document.getElementById('btnKonfirmasiHapus').addEventListener('click', function() {
    if (barisYangMauDihapus) {
        // Hapus baris dari tabel HTML
        barisYangMauDihapus.remove();
        
        
        // Tutup modal secara otomatis
        let modalElement = document.getElementById('modalHapusBarang');
        let instanceConfirm = bootstrap.Modal.getInstance(modalElement);
        instanceConfirm.hide();
    }
});