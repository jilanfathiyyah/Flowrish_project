document.addEventListener('DOMContentLoaded', function () {
    const formGudang = document.getElementById('formGudang');
    const modalElement = document.getElementById('modalBarang');



    //untuk reset form klw user klik tombol batal atau tanda x
    modalElement.addEventListener('hidden.bs.modal', function () {
        formGudang.reset();
    });
});