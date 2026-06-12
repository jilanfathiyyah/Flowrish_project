document.addEventListener('DOMContentLoaded', function () {
    const modalHapus = document.getElementById('modalHapusBarang');

    if (modalHapus) {
        modalHapus.addEventListener('show.bs.modal', function (event) {
            // 1. Ambil tombol tempat sampah yang diklik
            const button = event.relatedTarget;

            // 2. Ambil angka ID dari atribut data-id tombol tersebut
            const id = button.getAttribute('data-id');

            // 3. Masukkan angka ID ke dalam input hidden di modal hapus
            const inputId = document.getElementById('hapus-id'); // <-- PASTIKAN NAMA ID INI SAMA!
            if (inputId) {
                inputId.value = id;
            }
        });
    }
});