document.addEventListener('DOMContentLoaded', function () {
    const modalHapus = document.getElementById('modalHapusBarang');

    if (modalHapus) {
        modalHapus.addEventListener('show.bs.modal', function (event) {
            // mengambil fungsi tombol delete
            const button = event.relatedTarget;

            // menganbil data id dari tombol bagian iitu
            const id = button.getAttribute('data-id');

            // menghubungkan id hidden
            const inputId = document.getElementById('hapus-id'); //nama id ini hrs sma dgn id di tag input hidden id bagian modul hapus
            if (inputId) {
                inputId.value = id;
            }
        });
    }
});