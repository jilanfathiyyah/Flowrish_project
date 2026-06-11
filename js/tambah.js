document.addEventListener('DOMContentLoaded', function () {
    const formGudang = document.getElementById('formGudang');
    const modalElement = document.getElementById('modalBarang');

    // Hanya tangani penutupan modal dan reset form
    formGudang.addEventListener('simpan', function (e) {
        e.preventDefault(); // Mencegah refresh halaman

        // 2. Tutup modal secara otomatis
        const modalInstance = bootstrap.Modal.getInstance(modalElement);
        modalInstance.hide();

        // 3. Reset isi form agar bersih kembali
        formGudang.reset();
        
    });

    // Reset form jika user klik tombol "Batal" atau tanda "X"
    modalElement.addEventListener('hidden.bs.modal', function () {
        formGudang.reset();
    });
});