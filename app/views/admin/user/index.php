<div class="content-wrapper">
          <!-- Content -->
          <div class="container-xxl flex-grow-1 container-p-y">
            <!-- Tabel User -->
            <!-- Form controls -->
            <div class="col">
              <div class="card mb-4">
                <h5 class="card-header">Cari Peserta Tergabung</h5>
                <div class="card-body ">
                    <form action="<?= BASEURL;?>/admin/data_user" method="post">
                        <div class="row align-items-end">
                            <div class="mb-3 col-5 ">
                            <label for="cari" class="form-label">Nama User</label>
                            <input type="text" class="form-control" placeholder="Masukkan Nama User" name="keyword" id="keyword">
                            </div>

                            <div class="mb-3 col-4">
                            <label for="pilihkelas" class="form-label">Pilih Kelas</label>
                                <select name="pilihan" class="form-select">
                                    <option value="">Pilih Kelas User</option>
                                    <?php foreach ($data['kelas'] as $ktg) : ?>
                                        <option class="form-control" value="<?=$ktg['id_kelas']; ?>"><?=$ktg['nama_kelas']; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-2 mx-auto justify-content-center align-content-center mb-3 d-grid gap-3">
                            <button class="btn btn-primary" type="submit" id="tombolCari" autocomplete="off">Cari</button>
                            </div>

                            <div class="col-1 mb-3">
                            <button type="submit" class="btn btn-icon btn-primary">
                                <i class='bx bx-refresh'></i>
                            </button>
                            </div>
                        </div>
                    </form>
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
                      <th>Actions</th>
                      <th>Profil</th>
                      <th>Nama</th>
                      <th>Kategori Kelas</th>
                      <th class="text-start">Judul Kelas</th>
                      <th>Waktu Bergabung</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-4">
                    <?php foreach ($data['user'] as $usr) :?>
                        <tr class="text-center">
                            <!-- Action -->
                            <td>
                                <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-end">
                                <a href="<?= BASEURL;?>/user/detail/<?= $usr['id_data_user']?>" 
                                        class="btn btn-primary me-md-2 btn-sm ModalDataUser" 
                                        data-bs-toggle="modal" data-bs-target="#formDataUser" 
                                        data-id="<?= $usr['id_data_user']?>">Detail</a>
                                <a href="<?= BASEURL;?>/user/hapus/<?= $usr['id_data_user']?>" 
                                class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                                </div>
                            </td>
                            <!-- Profil -->
                            <td class="align-content-center align-self-center ">
                                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                    class="avatar avatar-l pull-up" title="<?= $usr['nama_user']?>">
                                    <img src="<?= BASEURL;?>/public/img/profile/<?= $usr['foto_user'] ?>" alt="Avatar" class="rounded-circle" />
                                </ul>
                            </td>
                            <!-- Nama -->
                            <td><?= $usr['nama_user']?></td>
                            <!-- nama kategori -->
                            <td ><?= $usr['nama_kategori']?></td>
                            <!-- judul Kelas -->
                            <td class="text-start"><?= $usr['nama_kelas']?></td>
                            <!-- Waktu Gabung -->
                            <td><?= $usr['tgl_pendaftaran']?></td>
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
        
<div class="modal fade" id="formDataUser" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModal">Data User</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3 text-center">
                    <img src="<?= BASEURL?>/public/img/profile/<?= $usr['foto_user']?>" alt="Avatar" class="rounded-circle" id="profile" name= "profile"/>
                </div>
                <div class="mb-3">
                    <label for="nama" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="nama" name= "nama" readonly>
                </div>
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <input type="text" class="form-control" id="kategori" name= "kategori" readonly>
                </div>
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Kelas</label>
                    <input type="text" class="form-control" id="judul" name= "judul" readonly>
                </div>
                <div class="mb-3">
                    <label for="tgl_pendaftaran" class="form-label">Tanggal Bergabung</label>
                    <input type="text" class="form-control" id="tgl_pendaftaran" name= "tgl_pendaftaran" readonly>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
