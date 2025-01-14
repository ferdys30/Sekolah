<div class="container-xxl flex-grow-1 container-p-y">
            <div class="row">

              <!-- Pengguna -->
              <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">Total Pengguna DigiSkill</h4>
                        <h3 class="mb-4">
                          <div class="d-flex gap-2 align-items-end">
                            <h2 class="fw-bold"> <?= $data['jml_user']['total']?></h2>
                            <p class="fs-6 fw-light">Pengguna</p>
                          </div>

                        </h3>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">Lihat Details</a>
                      </div>
                    </div>
                    <div class="col-sm-3 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-0">
                        <img src="<?= BASEURL;?>/public/img/illustrations/Char.png" height="140" alt="View Badge User"
                          data-app-dark-img="illustrations/man-with-laptop-dark.png"
                          data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Mentor -->
              <div class="col-lg-6 mb-4 order-0">
                <div class="card">
                  <div class="d-flex align-items-end row">
                    <div class="col-sm-7">
                      <div class="card-body">
                        <h4 class="card-title text-primary fw-bold">Total Mentor DigiSkill</h4>
                        <h3 class="mb-4">
                          <div class="d-flex gap-2 align-items-end">
                            <h2 class="fw-bold"> <?= $data['jml_mentor']['total']?></h2>
                            <p class="fs-6 fw-light">Mentor</p>
                          </div>

                        </h3>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">Lihat Details</a>
                      </div>
                    </div>
                    <div class="col-sm-3 text-center text-sm-left">
                      <div class="card-body pb-0 px-0 px-md-0">
                        <img src="<?= BASEURL;?>/public/img/illustrations/man-with-laptop-light.png" height="140"
                          alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                          data-app-light-img="illustrations/man-with-laptop-light.png" />
                      </div>
                    </div>
                  </div>
                </div>
              </div>



              <div class="card-class col-lg-12 col-md-4 order-1">
                <div class="row">

                  <!-- Card Data User Tiap Klas -->
                    <?php foreach ($data['user_bykategori'] as $data_pendaftar) :?>
                        <div class="col-lg-3 col-md-12 col-6 mb-4">
                            <div class="card">
                            <div class="card-body">
                                <div class="card-title d-flex align-items-start justify-content-between">
                                <div class="avatar flex-shrink-0">
                                    <img src="<?= BASEURL;?>/public/img/icons/unicons/chart.png" alt="chart " class="rounded" />
                                </div>
                                </div>
                                <div class="flex-column gap-2">
                                <span class="fw-semibold d-block mb-1">Kategori</span>
                                <span class="fw-semibold d-block mb-1"><?= $data_pendaftar['nama_kategori']; ?></span>
                                </div>
                                <div class="d-flex gap-2 align-items-center">
                                <h3 class="card-title mb-2"><?= $data_pendaftar['total']; ?></h3>
                                <h6 class=" mb-2 fw-normal">Pengguna</h6>
                                </div>
                            </div>
                            </div>
                        </div>
                    <?php endforeach;?>
                </div>
              </div>
            </div>



            <!-- Hoverable Table rows -->
            <div class="card">
              <h5 class="card-title  fw-semibold m-3">Detail Jumlah Pengguna DigiSkill</h5>
              <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                  <thead>
                    <tr class="">
                      <th class="h-px-50 text-center">Kode Kelas</th>
                      <th class="h-px-50 text-center">Jumlah User Tergabung</th>
                      <th class="h-px-50 text-center">Kategori Kelas</th>
                      <th class="h-px-50">Judul Kelas</th>
                    </tr>
                  </thead>
                  <tbody class="table-border-bottom-2">
                    <?php foreach ($data['pndf_kelas'] as $kls) :?>
                        <tr class="">
                            <!-- ID -->
                            <td class="text-center"><?= $kls['kode_kelas']?></td>
                            <!-- Jumlah User -->
                            <td class="text-center"><?= $kls['total']?></td>
                            <!-- Kategori -->
                            <td class="text-center"><?= $kls['nama_kategori']?></td>
                            <!-- Kelas -->
                            <td ><?= $kls['nama_kelas']?></td>
                        </tr>
                    <?php endforeach;?>
                  </tbody>
                </table>
              </div>
            </div>
            <!--/ Hoverable Table rows -->


          </div>