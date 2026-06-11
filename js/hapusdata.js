let barisYangMauDihapus = null;
let idYangMauDihapus = null;

// 1. Deteksi saat modal hapus mulai terbuka
document.getElementById('modalHapusBarang').addEventListener('show.bs.modal', function (event) {
    // Tombol di tabel yang memicu modal terbuka
    let tombolHapusDiTabel = event.relatedTarget; 

    // Ambil ID produk dari atribut data-id yang ada di tombol tabel
    let idYangMauDihapus = tombolHapusDiTabel.getAttribute('data-id');
    
    // Masukkan ID tersebut ke dalam input hidden milik modal hapus (#hapus_id)
    document.getElementById('hapus_id').value = idYangMauDihapus;
});

// 2. Logika ketika tombol "Ya, Hapus" di dalam modal diklik
document.getElementById('btnKonfirmasiHapus').addEventListener('click', function() {
 if (idYangMauDihapus && barisYangMauDihapus){

// Kirim perintah hapus ke PHP secara diam-diam (background)
        fetch('php/proses.php?id=' + idYangMauDihapus)
        .then(response => response.text())
        .then(data => {
            // Jika PHP sukses menghapus, baru kita hapus barisnya dari HTML
            barisYangMauDihapus.remove();

        // Tutup modal secara otomatis
        let modalElement = document.getElementById('modalHapusBarang');
        let instanceConfirm = bootstrap.Modal.getInstance(modalElement);
        instanceConfirm.hide();
        })
        .catch(error => {
            alert('Gagal menghapus data dari database: ' + error);
        });
}});