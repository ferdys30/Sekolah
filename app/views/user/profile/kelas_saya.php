<!-- Content wrapper -->
<div class="content-wrapper">
                    <!-- Content -->



                    <div class="container-xxl flex-grow-1 container-p-y">
                        <div class="row  justify-content-start">
                            <?php if(!$data['kelas']) {?>
                                <h1 class="m-center text-center">Anda belum memilih Kelas</h1>
                            <?php }else{
                                foreach ($data['kelas'] as $kelas) :?>
                                <div class="col-lg-4 col-md-6 mb-4 rounded ">
                                    <div class="card p-3 ">
                                        <div class="img-box">
                                            <img src="<?= BASEURL?>/public/img/assets/kelas/<?= $kelas['thumbnail']?>" alt=""
                                                class="img-fluid figure-img rounded h-25 w" />
                                        </div>
                                        <div class="d-flex justify-content-between mt-2">
                                            <p class="badge bg-label-primary fw-semibold"><?= $kelas['nama_kategori']?></p>
                                        </div>
                                        <div class="product-caption ">
                                            <p class="product-name fs-6 fw-bold ">
                                                <?= $kelas['nama_kelas']?>
                                            </p>
                                            <div>
                                                <div class="dropdown-divider"></div>
                                            </div>
                                            <div class="pt-2">
                                                <ul class="bx-ul d-flex justify-content-between">
                                                    <li><i class='bx bx-video'></i> <?= $kelas['total_materi']?> Video</li>
                                                    <li><i class='bx bx-book'></i> <?= $kelas['total_materi']?> Materi</li>
                                                    <li><i class='bx bx-user'></i> <?= $kelas['total_data_user']?> User</li>
                                                </ul>
                                            </div>
                                            <div class="d-grid gap-2">
                                                <!-- <div class="btn  btn-primary mt-1 btn-lg px-3 py-2">Belajar Sekarang</div> -->
                                                <a href="<?= BASEURL?>/materi/<?= $kelas['id_kelas']?>" class="btn  btn-primary btn-sm mt-1 btn-lg px-3 py-2">Lihat Kelas
                                                </a>
                                                <a href="<?= BASEURL;?>/penilaian/tambah/<?= $kelas['id_kelas']?>" 
                                                    class="btn  btn-outline-primary btn-sm mt-1 btn-lg px-3 py-2" 
                                                    data-bs-toggle="modal" data-bs-target="#ModalPenilaian" 
                                                    data-id="<?= $kelas['id_kelas']?>">Beri Penilian
                                                </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Modal -->
                                <div class="modal fade" id="ModalPenilaian" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="judulModal">Masuk Kelas</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <form action="<?= BASEURL; ?>/penilaian/tambah" method="post">
                                                    <input type="hidden" class="form-control" id="id_data_user" name="id_data_user"  value="<?=$kelas['id_data_user']?>">
                                                    <input type="hidden" class="form-control" id="id_profile" name="id_profile" value="<?=$data['login']['id_profile']?>">
                                                    <div class="mb-3 text-center">
                                                        <img src="<?= BASEURL?>/public/img/profile/<?= $data['login']['foto_user']?>" alt="Avatar" class="rounded-circle" id="profile" name= "profile"/>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="nama_user" class="form-label">Nama</label>
                                                        <input type="text" class="form-control" id="nama_user" name= "nama_user" value="<?=$data['login']['nama_user']?>" readonly>
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="asal_instansi" class="form-label">Masukkan Asal Instansi Anda</label>
                                                        <input type="text" class="form-control" id="asal_instansi" name="asal_instansi">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="komentar_user" class="form-label">Masukkan Komentar Anda</label>
                                                        <input type="text" class="form-control" id="komentar_user" name="komentar_user">
                                                    </div>
                                            </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                        <button type="submit" class="btn btn-primary">Kirim</button>
                                                    </div>
                                                </form>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach;
                            }?>
                        </div>
                        <br>
                        <br>
                    </div>
                    <!-- / Content -->





                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->

               