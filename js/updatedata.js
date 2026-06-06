document.getElementById('formUpdateGudang').addEventListener('submit', function(e) {
    e.preventDefault();
    
    let modalUpdate = document.getElementById('modalUpdateBarang');
    let instanceUpdate = bootstrap.Modal.getInstance(modalUpdate);
    instanceUpdate.hide();
});