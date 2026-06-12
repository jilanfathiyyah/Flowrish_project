document.addEventListener("DOMContentLoaded", function () {
    const modalUpdateBarang = document.getElementById('modalUpdateBarang');
    
    if (modalUpdateBarang) {
        // klw modal update dibuka, data di tabel db, akan masuk ke modal update nya
        modalUpdateBarang.addEventListener('show.bs.modal', function (event) {
            // di klik tombol update, dia akan mengambil data yg id nya di klik
            const button = event.relatedTarget;
            
            // ambil semua data di php dan db dari atribut data tombol
            const id = button.getAttribute('data-id');
            const produk = button.getAttribute('data-produk');
            const kategori = button.getAttribute('data-kategori');
            const stok = button.getAttribute('data-stok');
            const harga = button.getAttribute('data-harga');
            const tglMasuk = button.getAttribute('data-tanggal_masuk');
            const tglExpired = button.getAttribute('data-tanggal_expired');
            const lokasiRak = button.getAttribute('data-lokasi_rak');
            
            // datanya masuk ke form update di modal update
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

    // tombol simpan perubahan di klik, modal update akan tetertutup, dan data yg diubah tersmpan
    const formUpdateGudang = document.getElementById('formUpdateGudang');
    if (formUpdateGudang) {
        formUpdateGudang.addEventListener('submit', function(e) {
            
            let modalUpdate = document.getElementById('modalUpdateBarang');
            let instanceUpdate = bootstrap.Modal.getInstance(modalUpdate);
            if (instanceUpdate) {
                instanceUpdate.hide();
            }
        });
    }
});