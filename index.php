<?php
include 'koneksi.php';
include 'controller.php';
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CRUD MySQL BS5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
</head>

<body>
  <!-- Ini Awal Container -->
  <div class="container">
    <h3 class="text-center">Daftar Inventaris</h3>
    <h3 class="text-center">UpTech Developer</h3>
    <!-- Awal Row -->
    <div class="row">
      <!-- Awal Col -->
      <div class="col-md-6 mx-auto">
        <!-- Awal Card -->
        <div class="card">
          <div class="card-header bg-info text-light">
            Form Input Data Barang
          </div>
          <div class="card-body">

            <!-- Awal Form -->
            <form method="post">
              <!-- Awal Kode Barang -->
              <div class="mb-3">
                <label class="form-label">Kode Barang</label>
                <input type="text" name="kode_barang" value="<?= $vkode ?>" class="form-control" placeholder="Masukkan Kode Barang">
              </div>
              <!-- Akhir Kode Barang -->

              <!-- Awal Nama Barang -->
              <div class="mb-3">
                <label class="form-label">Nama Barang</label>
                <input type="text" name="nama_barang" value="<?= $vnamabarang ?>" class="form-control" placeholder="Masukkan Nama Barang">
              </div>
              <!-- Akhir Kode Barang -->

              <!-- Awal Asal Barang -->
              <div class="mb-3">
                <label class="form-label">Asal Barang</label>
                <select class="form-select" name="asal_barang">
                  <option value="<?= $vasal ?>"><?= $vasal ?></option>
                  <option value="belisendiri">Beli Sendiri</option>
                  <option value="hibah">Hibah</option>
                  <option value="sumbangan">Sumbangan</option>
                </select>
              </div>
              <!-- Akhir Asal Barang -->

              <!-- Awal Jumlah Barang -->
              <div class="row">
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Jumlah Barang</label>
                    <input type="number" name="jumlah_barang" value="<?= $vjumlah ?>" class="form-control" placeholder="Masukkan Jumlah Barang">
                  </div>
                </div>
                <!-- Akhir Jumlah Barang -->

                <!-- Awal Satuan -->
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Satuan</label>
                    <select class="form-select" name="ket_satuan">
                      <option selected value="<?= $vsatuan ?>"><?= $vsatuan ?></option>
                      <option value="unit">Unit</option>
                      <option value="pcs">Pcs</option>
                      <option value="kotak">Kotak</option>
                      <option value="pax">Pax</option>
                    </select>
                  </div>
                </div>
                <!-- Akhir Satuan -->

                <!-- Awal Tanggal Diterima -->
                <div class="col">
                  <div class="mb-3">
                    <label class="form-label">Tanggal Diterima</label>
                    <input type="date" name="tanggalditer" value="<?= $vtanggalditer ?>" class="form-control">
                  </div>
                </div>
                <!-- Akhir Tanggal Diterima -->

                <!-- Awal Button -->
                <div class="text-center">
                  <hr>
                  <button class="btn btn-primary" name="tsimpan" onclick="berhasil" type="submit">Simpan</button>
                  <button class="btn btn-danger" name="tkosongkan" type="reset">Kosongkan</button>
                </div>
                <!-- Akhir Button -->
              </div>
            </form>
            <!-- Akhir Form -->

          </div>
          <div class="card-footer bg-info">

          </div>
        </div>
        <!-- Akhir Card -->
      </div>
      <!-- Akhir Col -->
    </div>
    <!-- Akhir Row -->


    <!-- Awal Card -->
    <div class="card mt-5">
      <div class="card-header bg-info text-light">
        Tabel Data Barang
      </div>
      <div class="card-body">
        <!-- Awal Cari Data Barang -->
        <div class="col-md-6 mx-auto">
          <form method="POST">
            <div class="input-group mb-3">
              <input type="text" name="katakunci" class="form-control" placeholder="Masukkan Kata Kunci">
              <button class="btn btn-primary" name="caridatbar" type="submit">Cari</button>
              <button class="btn btn-danger" name="resetcardatbar" type="sumbit">Reset</button>
            </div>
          </form>
        </div>
        <!-- Akhir Cari Data Barang -->

        <!-- Awal Tabel -->
        <table class="table table-striped table-hover table-bordered">
          <!-- Awal Header Tabel -->
          <tr>
            <th>No.</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Asal Barang</th>
            <th>Jumlah</th>
            <th>Tanggal Diterima</th>
            <th>Aksi</th>
          </tr>
          <!-- Akhir Header Tabel -->

          <!-- Inisial Penampilan Data -->
          <?php
          $no = 1;
          $tampil = mysqli_query($conn, "SELECT * FROM tbarang order by id_barang desc");
          while ($data = mysqli_fetch_array($tampil)) :
          ?>

            <!-- Awal Isi Tabel -->
            <tr>
              <td><?= $no++; ?></td>
              <td><?= $data['kode']; ?></td>
              <td><?= $data['nama']; ?></td>
              <td><?= $data['asal']; ?></td>
              <td><?= $data['jumlah']; ?> <?= $data['satuan'] ?></td>
              <td><?= $data['tanggal_diterima']; ?></td>
              <td>
                <a href="index.php?hal=edit&id=<?= $data['id_barang'] ?>" class="btn btn-warning">Edit</a>
                <a href="index.php?hal=hapus&id=<?= $data['id_barang'] ?>" class="btn btn-danger">Hapus</a>
              </td>
            </tr>
            <!-- Akhir Isi Tabel -->

          <?php endwhile; ?>

        </table>
        <!-- Akhir Tabel -->
        <!-- <button onclick="berhasil()">test</button> -->

      </div>
      <div class="card-footer bg-info">

      </div>
    </div>
    <!-- Akhir Card -->



  </div>
  <!-- Ini Akhir Container -->

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script>
    function berhasil() {
      Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: 'Your work has been saved',
        showConfirmButton: false,
        timer: 1500
      })
    }
  </script>
</body>

</html>