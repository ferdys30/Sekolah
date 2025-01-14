<!DOCTYPE html>

<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="<?= BASEURL?>/public/"
    data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>DigiSkill | Mentor Join Kelas</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />
    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Favicon -->

    <link rel="icon" type="image/x-icon" href="<?= BASEURL?>/public/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet" />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="<?= BASEURL?>/public/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="<?= BASEURL?>/public/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="<?= BASEURL?>/public/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="<?= BASEURL?>/public/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="<?= BASEURL?>/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="<?= BASEURL?>/public/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="<?= BASEURL?>/public/vendor/js/helpers.js"></script>


    <script src="<?= BASEURL?>/public/js/config.js"></script>
</head>

<body class="bg-white">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="container mx-auto">
            <!-- Menu -->

            <div class="container my-lg-5">
                <div class="HERO row my-5">
                    <div class="col-md-6 d-flex justify-content-center  order-md-2 order-lg-last">
                        <img class="img w-100" src="<?= BASEURL?>/public/img/illustrations/Hero 1.svg" alt="Hero Join Mentor"
                            class="justify-content-center" />
                    </div>
                    <!-- ENd img -->

                    <!-- text section -->

                    <div class="col-md-6 d-flex align-items-center authentication-inner">
                        <div>
                            <p class="fs-6 fw-bold badge bg-label-primary">Selamat Datang</p>
                            <p class=" fs-3 fw-bold">
                                <span class=" text-black">Terima Kasih Telah Berkontribusi Bersama</span> <span
                                    class="text-primary">DigiSkill</span>
                                <span class=" text-black">Dengan Menjadi</span> <span class="text-primary">Mentor</span>
                            </p>
                            <p class="fs-5">
                                Silahkan ke kelas anda, dengan memaukan kode kelas yang telah diberikan oleh admin
                            </p>
                            <form action="<?= BASEURL;?>/mentor/index" method="post">
                                <div class="d-flex gap-2 align-content-center ">
                                    <div class="input-group input-group-merge">
                                        <span class="input-group-text" id="carimentor"><i class="bx bx-search"></i></span>
                                        <input type="text" class="form-control" placeholder="Masukan kode kelas anda" name="keyword" id="keyword">
                                    </div>
                                    <button class="btn btn-primary" type="submit" id="tombolCari" autocomplete="off">Cari</button>
                                </div>
                            </form>                            
                        </div>
                    </div>
                </div>

                <div class="row mt-5 container  justify-content-center">
                    <?php if ($data['kelas']) {?>
                        <div class="col-lg-4 col-md-6 mb-4 rounded ">
                            <div class="card p-3 ">
                                <div class="img-box">
                                    <img src="<?= BASEURL?>/public/img/assets/kelas/<?= $data['kelas']['thumbnail']?>" alt=""
                                        class="img-fluid figure-img rounded h-25 w" />
                                </div>
                                <div class="d-flex justify-content-between mt-2">
                                    <p class="badge bg-label-primary fs-6"><?= $data['kelas']['nama_kategori']?>"</p>
                                </div>
                                <div class="product-caption ">
                                    <p class="product-name fs-5 fw-bold ">
                                        <?= $data['kelas']['nama_kelas']?>"
                                    </p>
                                    <div class="d-grid ">
                                        <a href="<?= BASEURL;?>/kelas/ubah/<?= $data['kelas']['id_kelas']?>" 
                                        class="btn  btn-primary btn-sm mt-1 btn-lg px-3 py-2 ModalMentorMasukKelas" 
                                        data-bs-toggle="modal" data-bs-target="#formModalMentorMasukKelas" 
                                        data-id="<?= $data['kelas']['id_kelas']?>">Masuk Kelas</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php }elseif($data['kelas'] === NULL){?>
                        <h1 class="text-center">Data Kosong</h1>
                    <?php }?>
                </div>
            </div>
        </div>

        <div class="modal fade" id="formModalMentorMasukKelas" tabindex="-1" aria-labelledby="judulModalMentorMasukKelas" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="judulModalMentorMasukKelas">Masuk Kelas</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="<?= BASEURL; ?>/pendaftaran/tambahMentor" method="post">
                        <input type="hidden" class="form-control" id="id_kelas" name= "id_kelas" value="<?=$data['kelas']['id_kelas']?>">
                        <input type="hidden" class="form-control" id="id_profile" name= "id_profile_mentor" value="<?=$data['login']['id_profile_mentor']?>">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name= "nama" value="<?=$data['login']['nama_mentor']?>">
                            </div>
                            <div class="mb-3">
                                <label for="kelas_dipilih" class="form-label">Kelas Yang dipilih</label>
                                <input type="text" class="form-control" id="kelas_dipilih" name= "kelas_dipilih" value="<?=$data['kelas']['nama_kelas']?>">
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
        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->


    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= BASEURL?>/public/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= BASEURL?>/public/vendor/libs/popper/popper.js"></script>
    <script src="<?= BASEURL?>/public/vendor/js/bootstrap.js"></script>
    <script src="<?= BASEURL?>/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= BASEURL?>/public/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= BASEURL?>/public/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= BASEURL?>/public/js/main.js"></script>

    <!-- Modal JS -->
  <script src="<?= BASEURL;?>/public/js/script.js"></script>

    <!-- Page JS -->
    <script src="<?= BASEURL?>/public/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>