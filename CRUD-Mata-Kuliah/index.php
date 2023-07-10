<?PHP

//panggil koneksi Database
include "koneksi.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tabel Mata Kuliah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>

    <div class="container">

      <div class="mt-3">
          <h3 class="text-center">Tabel Mata Kuliah</h3>
      </div>

      <div class="card mt-3">
          <div class="card-header bg-primary text-white">
              UTS Dasar Pemrograman II - Achmad Walfajri 210401070066 IT402
          </div>
          <div class="card-body">

          <!-- Button trigger modal -->
          <button type="button" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#modalTambah">
              Tambah Data
          </button>
                  
              <table class="table table-bordered table-striped tabel-hover">
                  <tr class="text-center">
                      <th>No.</th>
                      <th>ID</th>
                      <th>Nama</th>
                      <th>Kode Mata Kuliah</th>
                      <th>Deskripsi</th>
                      <th>Aksi</th>                  
                  </tr>
                  
                  <?php

                  //persiapan menampilkan data
                  $no = 1;
                  $tampil = mysqli_query($koneksi, "SELECT * FROM matkul ORDER BY id ASC");
                  while($data = mysqli_fetch_array($tampil)) :

                  ?>

                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $data['id'] ?></td>
                          <td><?= $data['nama'] ?></td>
                          <td><?= $data['kodematkul'] ?></td>
                          <td><?= $data['desk'] ?></td>
                          <td>
                              <a href="#" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#modalUbah<?= $no ?>">Ubah</a>
                              <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#modalHapus<?= $no ?>">Hapus</a>
                          </td>
                      </tr>

                      <!-- Awal Modal Ubah -->
                      <div class="modal fade" id="modalUbah<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Ubah Data Mata Kuliah</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        <div class="modal-body">
                                            <div class="mb-3">
                                                <label class="form-label">ID</label>
                                                <input type="text" class="form-control" name="tid" value="<?= $data['id'] ?>" placeholder="Masukkan ID!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Nama</label>
                                                <input type="text" class="form-control" name="tnama" value="<?= $data['nama'] ?>" placeholder="Masukkan Nama Mata Kuliah!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Kode Mata Kuliah</label>
                                                <input type="text" class="form-control" name="tmatkul" value="<?= $data['kodematkul'] ?>" placeholder="Masukkan Kode Mata Kuliah!">
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">Deskripsi</label>
                                                <input type="text" class="form-control" name="tdesk" value="<?= $data['desk'] ?>"placeholder="Isi Deskripsi Mata Kuliah!">
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bubah">Ubah</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                      <!-- Akhir Modal Ubah -->

                      <!-- Awal Modal Hapus -->
                      <div class="modal fade" id="modalHapus<?= $no ?>" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                    <h5 class="modal-title fs-5" id="staticBackdropLabel">Konfirmasi Hapus Data</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <form method="POST" action="aksi_crud.php">
                                        <input type="hidden" name="id" value="<?= $data['id'] ?>">
                                        
                                        <div class="modal-body">
                                         
                                        <h5 class="text-center"> Apakah Anda yakin akan menghapus data ini? <br>
                                            <span class="text-danger"><?= $data['nama'] ?> - <?= $data['kodematkul'] ?></span>
                                        </h5>
                                        
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" name="bhapus">Ya, hapus aja!</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                                        </div>
                                    </form>
                                </div>
                                </div>
                            </div>
                      <!-- Akhir Modal Hapus -->

                  <?php endwhile; ?>
              </table>

              <!-- Awal Modal -->
              <div class="modal fade" id="modalTambah" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title fs-5" id="staticBackdropLabel">Form Tambah Data Mata Kuliah</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <form method="POST" action="aksi_crud.php">
                        <div class="modal-body">
                            <div class="mb-3">
                                <label class="form-label">ID</label>
                                <input type="text" class="form-control" name="tid" placeholder="Masukkan ID Mata Kuliah!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" class="form-control" name="tnama" placeholder="Masukkan Nama Mata Kuliah!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Kode Mata Kuliah</label>
                                <input type="text" class="form-control" name="tmatkul" placeholder="Masukkan Kode Mata Kuliah!">
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Deskripsi</label>
                                <input type="text" class="form-control" name="tdesk" placeholder="Isi Deskripsi Mata Kuliah!">
                            </div>

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" name="bsimpan">Simpan</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Keluar</button>
                            </div>
                    </form>
                  </div>
                </div>
              </div>
              <!-- Akhir Modal -->

          </div>
      </div>
    
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>

</html>
