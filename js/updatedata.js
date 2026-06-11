document.addEventListener("DOMContentLoaded", function () {
    const modalUpdateBarang = document.getElementById('modalUpdateBarang');
    
    if (modalUpdateBarang) {
        // Logika 1: Berjalan SAAT MODAL AKAN DIBUKA (Membawa data dari tabel ke input modal)
        modalUpdateBarang.addEventListener('show.bs.modal', function (event) {
            // Tombol (ikon pensil) yang diklik oleh user
            const button = event.relatedTarget;
            
            // Ambil semua data dari atribut data-* tombol
            const id = button.getAttribute('data-id');
            const produk = button.getAttribute('data-produk');
            const kategori = button.getAttribute('data-kategori');
            const stok = button.getAttribute('data-stok');
            const harga = button.getAttribute('data-harga');
            const tglMasuk = button.getAttribute('data-tanggal_masuk');
            const tglExpired = button.getAttribute('data-tanggal_expired');
            const lokasiRak = button.getAttribute('data-lokasi_rak');
            
            // Masukkan data tersebut ke dalam input form modal secara otomatis
            if(document.getElementById('update-id')) document.getElementById('update-id').value = id;
            if(document.getElementById('update-produk')) document.getElementById('update-produk').value = produk;
            if(document.getElementById('update-kategori')) document.getElementById('update-kategori').value = kategori;
            if(document.getElementById('update-stok')) document.getElementById('update-stok').value = stok;
            if(document.getElementById('update-harga')) document.getElementById('update-harga').value = harga;
            if(document.getElementById('update-tanggal_masuk')) document.getElementById('update-tanggal_masuk').value = tglMasuk;
            if(document.getElementById('update-tanggal_expired')) document.getElementById('update-tanggal_expired').value = tglExpired;
            if(document.getElementById('update-lokasi_rak')) document.getElementById('update-lokasi_rak').value = lokasiRak;
        });
    }

    // Logika 2: Berjalan SAAT FORM DISUBMIT
    const formUpdateGudang = document.getElementById('formUpdateGudang');
    if (formUpdateGudang) {
        formUpdateGudang.addEventListener('submit', function(e) {
            // JANGAN gunakan e.preventDefault() agar form bisa berpindah ke php/proses_ubah.php!
            
            let modalUpdate = document.getElementById('modalUpdateBarang');
            let instanceUpdate = bootstrap.Modal.getInstance(modalUpdate);
            if (instanceUpdate) {
                instanceUpdate.hide();
            }
        });
    }
});