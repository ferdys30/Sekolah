<!-- STARTHERO -->
<div class="container my-lg-5 ">
    <div class="HERO row my-5">
        <!-- img -->
        <div class="col-md-6 d-flex justify-content-center  order-md-2 order-lg-last">
            <img class="img w-100"
                src="<?= BASEURL; ?>/public/img/assets/kategori/<?= $data['detail_kategori']['hero_gambar'] ?>" alt=""
                class="justify-content-center " />
        </div>
        <!-- ENd img -->

        <!-- text section -->

        <div class="col-md-6 d-flex align-items-center authentication-inner">
            <div>
                <p class="fs-5 fw-bold badge bg-label-primary">
                    <?= $data['detail_kategori']['nama_kategori'] ?>
                </p>
                <p class=" fs-1 fw-bold">
                    <span class=" text-black">Belajar Materi</span> <span class="text-primary">
                        <?= $data['detail_kategori']['nama_kategori'] ?>
                    </span>
                    <span class=" text-black">bersama</span> <span class="text-primary">DigiSkill</span>
                </p>
                <p class="fs-5">
                    <?= $data['detail_kategori']['hero_deskripsi'] ?>
                </p>


                <!-- <div class="d-flex gap-2 align-content-center ">
                    <div class="btn-group">
                        <button type="button" class="btn btn-outline-primary dropdown-toggle" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            <i class='bx bx-filter'></i>
                        </button>
                        <ul class="dropdown-menu p-3">
                            <div class="mb-2">
                                <p class="fs-5 fw-semibold ">Filter</p>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="terbaru" />
                                    <label class="form-check-label fs-6" for="terbaru"> Terbaru </label>
                                </div>
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" value="" id="populer" />
                                    <label class="form-check-label fs-6" for="populer"> Populer </label>
                                </div>
                            </div>
                        </ul>
                    </div>
                    <div class="input-group input-group-merge">
                        <span class="input-group-text" id="carimentor"><i class="bx bx-search"></i></span>
                        <input type="search" id="form1" class="form-control" placeholder="Cari kelas UI/UX Design..."
                            aria-label="Search" />
                    </div>
                    <button type="submit" class="btn btn-primary  px-3">Cari </button>
                </div> -->


            </div>
        </div>
    </div>
</div>
<!-- END HERO -->




<!-- START CARD CLASS-->
<div class="container mt-5">
    <div class="row mt-5 justify-content-center">
        <?php if (empty($data['kelas'])) { ?>
            <h1>Data Kosong</h1>
        <?php } else {
            foreach ($data['kelas'] as $kategori): ?>
                <div class="col-lg-4 col-md-6 mb-4 rounded ">
                    <div class="card p-3 ">
                        <?php
                        $currentClassId = $kategori['id_kelas']; // Store the value in a variable
                        ?>
                        <div class="img-box ">
                            <img src="<?= BASEURL ?>/public/img/assets/kelas/<?= $kategori['thumbnail'] ?>" alt=""
                                class="img-fluid figure-img rounded  w-100" />
                        </div>
                        <div class="d-flex justify-content-between mt-2">

                            <p class="badge bg-label-primary fw-semibold">
                                <?= $kategori['nama_kategori'] ?>
                            </p>
                        </div>
                        <div class="product-caption ">
                            <p class="product-name fs-6 fw-bold ">
                                <?= $kategori['nama_kelas'] ?>
                            </p>
                            <div>
                                <div class="dropdown-divider"></div>
                            </div>
                            <div class="pt-2">
                                <ul class="bx-ul d-flex justify-content-between">
                                    <li><i class='bx bx-video'></i>
                                        <?= $kategori['total_materi'] ?> Video
                                    </li>
                                    <li><i class='bx bx-book'></i>
                                        <?= $kategori['total_materi'] ?> Materi
                                    </li>
                                    <li><i class='bx bx-user'></i>
                                        <?= $kategori['total_data_user'] ?> User
                                    </li>
                                </ul>
                            </div>
                            <div class="d-grid ">
                                <!-- <div class="btn  btn-primary mt-1 btn-lg px-3 py-2">Belajar Sekarang</div> -->
                                <?php
                                if (isset($_SESSION['id_profile'])) {
                                    $telahDaftar = false;
                                    foreach ($data['user_daftar'] as $usr) {
                                        if ($usr['id_kelas'] === $currentClassId) {
                                            $telahDaftar = true;
                                            break;
                                        }
                                    }
                                }

                                if (isset($_SESSION['id_profile']) && !$telahDaftar) { ?>
                                    <a href="<?= BASEURL; ?>/pendaftaran/tambah/<?= $kategori['id_kelas'] ?>"
                                        class="btn btn-primary btn-sm mt-1 btn-lg mb-2 px-3 py-2 K_ModalMasukKelas"
                                        data-bs-toggle="modal" data-bs-target="#MasukKelas"
                                        data-id="<?= $kategori['id_kelas'] ?>">Masuk Kelas
                                    </a>
                                <?php } elseif (isset($_SESSION['id_profile'])) { ?>
                                    <a href="<?= BASEURL ?>/materi/<?= $kategori['id_kelas'] ?>"
                                        class="btn btn-primary btn-sm mt-1 btn-lg px-3 py-2">Lihat Kelas</a>
                                <?php } else { ?>
                                    <a href="<?= BASEURL; ?>/auth/" class="btn btn-primary btn-sm mt-1 btn-lg mb-2 px-3 py-2">Masuk
                                        Kelas</a>
                                <?php } ?>
                                <a href="<?= BASEURL; ?>/kelas/detail/<?= $kategori['id_kelas'] ?>"
                                    class="btn  btn-outline-primary btn-sm mt-1 btn-lg px-3 py-2">Detail Kelas</a>
                            </div>
                        </div>

                        <div class="modal fade" id="MasukKelas" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="judulModal">Masuk Kelas</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="<?= BASEURL; ?>/pendaftaran/tambah" method="post">
                                            <input type="hidden" class="form-control" id="id_kelas" name="id_kelas">
                                            <input type="hidden" class="form-control" id="id_profile" name="id_profile"
                                                value="<?= $data['data_user']['id_profile'] ?>">
                                            <div class="mb-3">
                                                <label for="nama_user" class="form-label">Nama</label>
                                                <input type="text" class="form-control" id="nama_user" name="nama_user"
                                                    value="<?= $data['data_user']['nama_user'] ?>" readonly>
                                            </div>
                                            <div class="mb-3">
                                                <label for="nama_kelas" class="form-label">Kelas Yang dipilih</label>
                                                <input type="text" class="form-control" id="nama_kelas" name="nama_kelas"
                                                    readonly>
                                            </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">Masuk Kelas</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        } ?>

    </div>
</div>
<!-- END CARD -->