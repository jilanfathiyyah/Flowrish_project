<?php include 'php/pagination.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Product - Flowrish</title>
    <!--link bootstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    <!--link css-->
    <link rel="stylesheet" href="css/data.css">
</head>
<body>
  
  <!--tabel-->
  <div class="container py-5">

      <div class="d-flex justify-content-between align-items-center">
        <h2 class="m-0 fw-bold" ><span>Barang Gudang</span></h2>

        <!-- Form Search -->
        <form method="GET" class="search-box m-0">
          <input type="text" name="cari" placeholder="Cari nama produk">
          <button type="submit">Cari</button>
        </form>
        <!--penutup form search-->

        <button data-bs-target="#modalBarang" class="btn btn-tambah" data-bs-toggle="modal">
          + Tambah Produk
        </button>
      </div>

      <div class="table-container">
          <table class="table m-0">
              <thead>
                  <tr>
                      <th>ID</th>
                      <th>Nama Produk</th>
                      <th>Kategori</th>
                      <th>Stok</th>
                      <th>Harga</th>
                      <th>Tanggal Masuk</th>
                      <th>Tanggal Kadaluarsa</th>
                      <th>Lokasi Rak</th>
                      <th>Aksi</th>
                  </tr>
              </thead>
              <tbody id="isiTabel">
                <?php
                  $no = $halaman_awal + 1;
                  while($data = mysqli_fetch_array ($query_data)) {
                ?>
                  <tr>
                      <td><?php echo $no++; ?></td>
                      <td><?php echo $data['produk']; ?></td>
                      <td><?php echo $data['kategori']; ?></td>
                      <td><?php echo $data['stok']; ?></td>
                      <td><?php echo $data['harga']; ?></td>
                      <td><?php echo $data['tanggal_masuk']; ?></td>
                      <td><?php echo $data['tanggal_expired']; ?></td>
                      <td><?php echo $data['lokasi_rak']; ?></td>
                      <td class="justify-center">
                          <button href="#formUpdateGudang?id=<?php echo $data['id']; ?>" data-bs-toggle="modal" data-bs-target="#modalUpdateBarang"
                            class="btn btn-action btn-update">
                              <i class="bi bi-pencil-square"></i>
                          </button>
                          <button class="btn btn-action btn-delete" data-bs-toggle="modal" data-bs-target="#modalHapusBarang" onclick="hapusProduk(this)">
                              <i class="bi bi-trash"></i>
                          </button>
                      </td>
                  </tr>
                <?php
                }?>
              </tbody>
          </table>
      </div>
  </div>
  <!--penutup tabel-->

  <!--modal tambah produk-->

  <div class="modal fade" id="modalBarang"  >
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">

        <div class="modal-header">
          <h5 class="modal-title" id="modalBarangLabel">Tambah Data Produk</h5>
        </div>

        <div class="modal-body">
          <form action="php/proses.php" method="POST" id="formGudang">
            <!--hidden id-->
            <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
            
            <div class="row g-4">
              <div class="col-md-6">
                <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                <input type="text" name="produk" class="form-control" placeholder="Masukkan nama produk" required>
              </div>
              
              <div class="col-md-6">
                <label class="form-label">Kategori <span class="text-danger"></span></label>
                <select name="kategori" class="form-select" required>
                  <option value="selected disabled">Pilih Kategori</option>
                  <option value="bunga tangkai">Bunga tangkai</option>
                  <option value="bouqet">Bouqet</option>
                  <option value="tanaman hias">Tanaman hias</option>
                  <option value="papan bunga">Papan bunga</option>
                  <option value="alat kebun">Alat kebun</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Stok Barang <span class="text-danger">*</span></label>
                <input type="number" name="stok" class="form-control" placeholder="0" required >
              </div>

              <div class="col-md-6">
                <label class="form-label">Harga Satuan (Rp) <span class="text-danger">*</span></label>
                <input type="text" name="harga" class="form-control" placeholder="50.000" required >
              </div>

              <div class="col-md-6">
                <label class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_masuk" class="form-control" required >
              </div>

              <div class="col-md-6">
                <label class="form-label">Tanggal Kadaluarsa <span class="text-danger">*</span></label>
                <input type="date" name="tanggal_expired" class="form-control" required>
              </div>

              <div class="col-12">
                <label class="form-label">Lokasi Penempatan (Rak) <span class="text-danger">*</span></label>
                <input type="text" name="lokasi_rak" class="form-control" placeholder="Contoh: Rak A-1 atau Gudang B" required >
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-batal" data-bs-dismiss="modal">Batal</button>
          <button type="submit" name="simpan" form="formGudang" class="btn btn-simpan">Simpan</button>
        </div>
      </div>
    </div>
  </div>
  <!--penutup modal tambah produk-->

  <!--modal update produk-->
  <div class="modal fade" id="modalUpdateBarang" tabindex="-1" aria-labelledby="modalBarangLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
      <div class="modal-content">
        
        <div class="modal-header">
          <h5 class="modal-title" id="modalBarangLabel">Ubah Data Produk</h5>
        </div>

        <div class="modal-body">
          <form action="php/proses.php" method="POST" id="formUpdateGudang">
            <div class="row g-4">
              <!-- nama -->
              <div class="col-md-6">
                <label class="form-label">Nama Produk <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placdeholer="Masukkan nama produk" required>
              </div>
              <!-- agama -->
              <div class="col-md-6">
                <label class="form-label">Kategori <span class="text-danger"></span></label>
                <select class="form-select" required>
                  <option value="selected disabled">Pilih Kategori</option>
                  <option value="selected disabled">Pilih Kategori</option>
                  <option value="bunga tangkai">Bunga tangkai</option>
                  <option value="bouqet">Bouqet</option>
                  <option value="tanaman hias">Tanaman hias</option>
                  <option value="papan bunga">Papan bunga</option>
                  <option value="alat kebun">Alat kebun</option>
                </select>
              </div>

              <div class="col-md-6">
                <label class="form-label">Stok Barang <span class="text-danger">*</span></label>
                <input type="number" class="form-control" placeholder="0" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Harga Satuan (Rp) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="50.000" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Tanggal Masuk <span class="text-danger">*</span></label>
                <input type="date" class="form-control" required>
              </div>

              <div class="col-md-6">
                <label class="form-label">Tanggal Kadaluarsa <span class="text-danger">*</span></label>
                <input type="date" class="form-control" required>
              </div>

              <div class="col-12">
                <label class="form-label">Lokasi Penempatan (Rak) <span class="text-danger">*</span></label>
                <input type="text" class="form-control" placeholder="Contoh: Rak A-1 atau Gudang B" required>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-batal" data-bs-dismiss="modal" style="width: 23%;">Batalkan Perubahan</button>
          <button type="submit" name="update" form="formUpdateGudang" class="btn btn-simpan" style="width: 23%;">Simpan Perubahan</button>
        </div>
      </div>
    </div>
  </div>

  <!--penutup modal update produk-->

  <!--pembuka modal hapus data-->
  <div class="modal fade" id="modalHapusBarang" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm"> <div class="modal-content text-center p-3">
            <div class="modal-body">
                <i class="bi bi-exclamation-circle text-danger" style="font-size: 3rem;"></i>
                <h5 class="mt-3 fw-bold">Apakah anda yakin ingin menghapus data ini?</h5>
            </div>
            <div class="d-flex justify-content-center gap-2">
                <button type="button" class="btn btn-simpan shadow-none" style="width: 30%;" data-bs-dismiss="modal">Batal</button>
                <button type="button" id="btnKonfirmasiHapus" class="btn btn-delete">Ya, Hapus</button>
            </div>
        </div>
    </div>
  </div>
  <!--penutup modal hapus data-->

  <!--pagination-->
  <div class="pagination">
    <?php for ($i = 1; $i <= $total_halaman; $i++){ ?>
      <a href="?halaman=<?php echo $i; ?>" class="btn btn-pagination <?php if ($i == $halaman) echo 'active'; ?>">
        <?php echo $i; ?>
      </a>
    <?php } ?>

  </div>
  <!--penutup pagination-->

  <!--link js-->
  <script src="/js/tambah.js"></script>
  <script src="/js/updatedata.js"></script>
  <script src="/js/hapusdata.js"></script>

</body>
</html>