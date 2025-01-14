 <!-- Content wrapper -->
 <div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Tabel User -->
            <!-- Form controls -->
            <div class="col">
              <div class="card mb-4">
                <div class="card-body ">
                  <p class="text-secondary  fs-6 ">Penilaian</p>
                  <p class="mt-n3 fs-5 fw-semibold">User Kelas <?= $data['kelas']['nama_kelas']?></p>
                  <div class="row align-items-end mt-4">
                    <form action="<?= BASEURL;?>/mentor/penilaian" method="post">
                        <label for="exampleFormControlInput1" class="form-label">Cari Siswa</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" placeholder="Cari Siswa" name="keyword" id="keyword">
                            <button class="btn btn-primary" type="submit" id="tombolCari" autocomplete="off">Cari Siswa</button>
                        </div>
                    </form>
                  </div>
                </div>
              </div>
            </div>

            <!-- Hoverable Table rows -->
            <div class="card">
              <!-- <h5 class="card-header">Hoverable rows</h5> -->
              <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                  <thead>
                    <tr class="text-center">
                      <th>Action</th>
                      <th>Nama User</th>
                      <th>Link Tugas User</th>
                      <th>Waktu Pengumpulan</th>
                      <th>Komentar</th>
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-4">
                    <?php foreach ($data['penugasan'] as $pngs) :?>
                        <tr class="text-center">
                            <!-- Action -->
                            <td>
                                <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-center">
                                    <a href="<?= BASEURL;?>/penugasan/detail/<?= $pngs['id_penugasan']?>" 
                                    class="btn btn-primary me-md-2 btn-sm ModalPenilaian" 
                                    data-bs-toggle="modal" data-bs-target="#formModalPenilaian" 
                                    data-id="<?= $pngs['id_penugasan']?>">Beri Penilaian</a>
                                </div>
                            </td>
                            <!-- Icon -->
                            <td class="align-content-center align-self-center ">
                                <?= $pngs['nama_user']?>
                            </td>
                            <!-- Nama penugasan -->
                            <td><a href="<?= $pngs['link_tugas_user']?>" target="_blank" class="btn btn-info btn-sm">Link Materi</a><br></td>
                            <!-- Preview -->
                            <td><?= $pngs['waktu_pengumpulan']?></td>
                            <td><?= $pngs['komentar_mentor']?></td>
                            <td><?= $pngs['status']?></td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Hoverable Table rows -->
            <br>
            <br>
          </div>
          <!-- / Content -->
          <div class="content-backdrop fade"></div>
        </div>
        <!-- Content wrapper -->

<div class="modal fade" id="formModalPenilaian" tabindex="-1" aria-labelledby="judulModalTools" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalTools">Berikan Penilaian</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/penugasan/tambahPenilaianMentor" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id_penugasan" name= "id_penugasan">
                    <input type="hidden" class="form-control" id="id_kelas" name= "id_kelas" value="<?= $data['kelas']['id_kelas']?>">
                    <div class="mb-3">
                        <label for="nama_user" class="form-label">Nama User</label>
                        <input type="text" class="form-control" id="nama_user" name= "nama_user" readonly>
                    </div>
                    <div class="mb-3">
                        <label for="komentar_mentor" class="form-label">Komentar Mentor</label>
                        <input type="text" class="form-control" id="komentar_mentor" name= "komentar_mentor">
                    </div>
                    <div class="mb-3">
                      <label for="status" class="form-label">Status Tugas</label>
                      <select class="form-select" aria-label="Default select example" id="status" name= "status">
                        <option value="1">Salah</option>
                        <option value="2">Revisi</option>
                        <option value="3">Bagus</option>
                      </select>
                    </div>
            </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>