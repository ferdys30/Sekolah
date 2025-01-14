<body class="card">
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->
            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme zindex-1 pt-5">
                <br>
                <div class="menu-inner-shadow"></div>
                <ul class="menu-inner py-1 gap-2">
                    <br>
                    <!-- Dashboard -->
                    <li class="menu-item ">
                        <a href="#tentang-program" class="menu-link">
                            <i class='menu-icon tf-icons bx bx-customize'></i>
                            <div data-i18n="Analytics">Tentang Kelas </div>
                        </a>
                    </li>

                    <!-- Tables -->
                    <li class="menu-item ">
                        <a href="#mentor" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-user-check"></i>
                            <div data-i18n="Tables">Mentor Kelas</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="#kurikulum" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-book"></i>
                            <div data-i18n="Tables">Kurikulum Kelas</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="#tools" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-cog"></i>
                            <div data-i18n="Tables">Tools Program</div>
                        </a>
                    </li>
                    <li class="menu-item ">
                        <a href="#testimoni" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-chat"></i>
                            <div data-i18n="Tables">Review Kelas</div>
                        </a>
                    </li>
                    <li class="menu-item ms-4 mt-2">
                        
                        <?php
                            if (isset($_SESSION['id_profile'])) {
                                $telahDaftar = false;
                                foreach ($data['user_daftar'] as $usr) {
                                    if ($usr['id_kelas'] === $data['Kelas']['id_kelas']) {
                                        $telahDaftar = true;
                                        break;
                                    }
                                }
                            }

                            if (isset($_SESSION['id_profile']) && !$telahDaftar) {?>
                                <a href="<?= BASEURL;?>/pendaftaran/tambah/<?= $data['Kelas']['id_kelas']?>" 
                                    class="btn  btn-primary btn-sm mt-1 btn-lg px-3 py-2 K_ModalMasukKelas" 
                                    data-bs-toggle="modal" data-bs-target="#MasukKelas" 
                                    data-id="<?= $data['Kelas']['id_kelas']?>">Masuk Kelas
                                </a>
                            <?php } elseif (isset($_SESSION['id_profile'])) { ?>
                                <a href="<?= BASEURL?>/materi/<?= $data['Kelas']['id_kelas']?>" class="btn  btn-primary btn-sm mt-1 btn-lg px-3 py-2">Lihat Kelas</a>
                            <?php } else { ?>
                                <a href="<?= BASEURL;?>/auth/" class="btn btn-primary">Belajar Sekarang</a>
                            <?php } ?>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->
            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <!-- Content wrapper -->
                <div class="content p-5 overflow-auto scrollbar smooth-scroll" data-bs-spy="scroll">

                    <!-- Content -->
                    <!-- Start Main Contenct Tentang Program UIUX -->
                    <div class="tentang-program mb-5 pt-2" id="tentang-program">
                        <div class="d-flex flex-column gap-lg-0">
                            <h5 class="text-primary "> Tentang Kelas </h5>
                            <h4 class=" fw-bold"><?= $data['Kelas']['nama_kelas']?></h4>
                        </div>

                        <div class="fs-5">
                            <p class=""> Bersama DigiSkill anda bisa mendaftar kelas 
                                <span class="kategori"> <?= $data['Kelas']['nama_kategori']?>
                            </span> dengan
                                gratis tanpa
                                dipunggut biaya
                                sedikitpun.</p>

                            <p> <?= $data['Kelas']['deskripsi']?></p>

                            <p> <?= $data['Kelas']['detail_program']?></p>
                        </div>

                        <br>

                    </div>
                    <!-- End Main Contenct Tentang Program UIUX -->


                    <!-- Start Mentor Kelas UIUX -->
                    <div class="mentor-kelas " id="mentor">
                        <br> <br><br> <br>
                        <h5 class="text-primary"> Mentor Kelas </h5>
                        <h4 class="fw-bold"> Belajar Langsung Dari Ahlinya </h4>
                        <p class="fs-5"> Anda akan belajar langsung dari mentor yang ahli dalam bidang <?= $data['Kelas']['nama_kategori']?> </p>
                        <div class="row">
                            <div class="col-lg-4">
                                <img src="<?= BASEURL;?>/public/img/profile/<?= $data['Kelas']['foto_mentor']?>" alt="Mentor <?= $data['Kelas']['nama_kategori']?>"
                                    class="img img-fluid rounded">
                            </div>
                            <div class="col-lg-8">
                                <div class="text-mentor">
                                    <h5 class="fw-bold"> <?= $data['Kelas']['nama_mentor']?> </h5>
                                    <p class="fw-bold"> <span> <?= $data['Kelas']['pekerjaan']?> </span> </p>
                                    <p class="fs-5"> <?= $data['Kelas']['nama_mentor']?> bekerja sebagai <?= $data['Kelas']['pengalaman']?> </p>
                                </div>
                                <div class="d-flex gap-3">

                                    <a href="https://www.instagram.com/<?= $data['Kelas']['ig']?>/" target="_blank">
                                        <i class='tf-icons bx bxl-instagram-alt bx-sm btn btn-icon bx-md'></i>
                                    </a>

                                    <a href="https://www.instagram.com/<?= $data['Kelas']['linkedin']?>/" target="_blank">
                                        <i class='tf-icons bx bxl-linkedin-square bx-sm btn btn-icon bx-md'></i>
                                    </a>

                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Mentor Kelas UIUX -->


                    <!-- Start Kurikulum Program -->
                    <div class="kurikulum-program mt-5 fs-5" id="kurikulum">
                        <br><br><br>
                        <h5 class="text-primary"> Pokok Materi </h5>
                        <h4 class="fw-bold"> Belajar Langsung Dari Ahlinya </h4>


                        <p> Kurikulum yang tersedia telah disesuaikan dengan kebutuhan saat ini yang akan selalu update
                            dengan
                            perkembangan, anda akan mempelajari materi dibawah ini </p>
                        <!-- Start Accordion -->
                        <div class="accordion mt-3" id="accordionExample">
                            <?php foreach ($data['materi'] as $materi) :?>
                            <div class="card accordion-item">
                                <h2 class="accordion-header" id="heading<?= $materi['urutan_materi']?>">
                                    <button type="button" class="accordion-button fs-5 fw-semibold"
                                        data-bs-toggle="collapse" data-bs-target="#accordion<?= $materi['urutan_materi']?>" aria-expanded="true"
                                        aria-controls="accordion<?= $materi['urutan_materi']?>">
                                        <?= $materi['judul']?>
                                    </button>
                                </h2>

                                <div id="accordion<?= $materi['urutan_materi']?>" class="accordion-collapse collapse"
                                    data-bs-parent="#accordionExample">
                                    <div class="accordion-body">
                                        <?= $materi['deskripsi_materi']?>
                                    </div>
                                </div>
                            </div>
                            <?php endforeach;?>
                        </div>
                        <!-- End Accordion -->
                    </div>
                    <!-- End Kurikulum Program -->

                    <!-- Start Tools UIUX -->
                    <div class="tools-uiux mb-5" id="tools">
                        <br><br><br><br>
                        <h5 class="text-primary"> Tools </h5>
                        <h4 class="fw-bold"> Belajar <span><?= $data['Kelas']['nama_kategori']?></span> Tools Gratis </h4>



                        <p> Pada sesi pembelajaran pelatihan menggunakan software yang gratis dan mudah digunakan secara
                            bersama-sama.
                        </p>

                        <div class="d-flex align-items-center align-self-center gap-3">
                            <?php foreach ($data['tools'] as $tools) :?>
                                <a href="<?= $tools['link_download']?>" target="_blank" class="d-flex align-items-center">
                                    <img src="<?= BASEURL;?>/public/img/assets/tools/<?= $tools['gambar']?>" alt="figma-pic" class="w-px-40 h-auto rounded-circle">
                                    <p class="ms-2 mt-3 text-secondary"> <?= $tools['nama_tools']?> </p>
                                </a>
                            <?php endforeach;?>
                        </div>


                    </div>
                    <!-- End Tools UIUX -->

                    <!-- Start Testimoni -->
                    <div class="testimoni mb-5" id="testimoni">
                        <br><br><br><br>
                        <h5 class="text-primary"> Review Kelas </h5>
                        <h4 class="fw-bold"> Judul Kelas</h4>
                    </div>

                    <div class="row mt-4">
                        <!-- Bootstrap carousel -->
                            <!-- Bootstrap crossfade carousel -->
                            <div class="col-md">
                                <div id="carouselTes" class="carousel carousel-dark slide carousel-fade" data-bs-ride="carousel">
                                    <!-- <ol class="carousel-indicators">
                                        <li data-bs-target="#carouselTes" data-bs-slide-to="0" class="active"></li>
                                        <li data-bs-target="#carouselTes" data-bs-slide-to="1"></li>
                                        <li data-bs-target="#carouselTes" data-bs-slide-to="2"></li>
                                    </ol> -->
                                    <div class="carousel-inner">
                                        <?php foreach ($data['review'] as $rvw) :?>
                                            <div class="carousel-item <?= ($rvw['id_penilaian'] === 3) ? 'active' : '' ?>">
                                                <div class="d-block w-100 text-center">
                                                    <div class="mb-5 ">
                                                        <i class='bx bxs-quote-right bx-lg mb-2 text-primary'></i>
                                                        <p class="lead font-italic px-4 mx-md-5">
                                                            <?= $rvw['komentar_user']; ?>
                                                        </p>
                                                        <div class="my-3">
                                                            <!-- lupa img -->
                                                            <img src="<?= BASEURL;?>/public/img/profile/<?= $rvw['foto_user']; ?>"
                                                                class="rounded-circle img-fluid shadow-1-strong" alt="smaple image"
                                                                width="100" height="100" />
                                                        </div>
                                                        <p class="text-primary fs-5 fw-bold"><?= $rvw['nama_user']; ?></p>
                                                        <p class="text-secondary mt-n3 fs-5 fw-light"><?= $rvw['asal_instansi']; ?></p>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach;?>
                                    </div>
                                    <div class="">
                                        <a class="carousel-control-prev ps-lg-5 pt-5" href="#carouselTes" role="button"
                                            data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </a>
                                        <a class="carousel-control-next ps-lg-5 pt-5" href="#carouselTes" role="button"
                                            data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </a>
                                    </div>

                                </div>
                            </div>
                    </div>
                    <br><br><br>

                    <!-- / Ent Testi -->



                    <!-- Start CTA -->

                    <div class="container my-lg-5 mb-5 ">
                        <div class="HERO row my-5">
                            <!-- img -->
                            <div class="col-md-6 d-flex justify-content-center  order-md-2 order-lg-last">
                                <img class="img w-100" src="<?= BASEURL;?>/public/img/illustrations/Hero 1.svg" alt=""
                                    class="justify-content-center" />
                            </div>
                            <!-- ENd img -->

                            <!-- text section -->
                            <div class="col-md-6 d-flex align-items-center authentication-inner">
                                <div>

                                    <h5 class="text-primary">Belajar Sekarang Juga </h5>
                                    <h4 class="fw-bold">
                                        Bersiap Belajar untuk masa depan bersama DigiSkill
                                    </h4>
                                    </p>
                                    <p class="fs-5">
                                        Dapatkan pekerjaan impianmu untuk masa <br> depanmu, bersama kami anda
                                        akan mendapatkan pelatihan secara gratis dan terbaik.
                                    </p>
                                    <?php
                                        if (isset($_SESSION['id_profile'])) {
                                            $telahDaftar = false;
                                            foreach ($data['user_daftar'] as $usr) {
                                                if ($usr['id_kelas'] === $data['Kelas']['id_kelas']) {
                                                    $telahDaftar = true;
                                                    break;
                                                }
                                            }
                                        }
                                        
                                        if (isset($_SESSION['id_profile']) && !$telahDaftar) {?>
                                        <a href="<?= BASEURL;?>/pendaftaran/tambah/<?= $data['Kelas']['id_kelas']?>" 
                                            class="btn  btn-primary btn-sm mt-1 btn-lg px-3 py-2 K_ModalMasukKelas" 
                                            data-bs-toggle="modal" data-bs-target="#MasukKelas" 
                                            data-id="<?= $data['Kelas']['id_kelas']?>">Masuk Kelas
                                        </a>
                                    <?php } elseif (isset($_SESSION['id_profile'])) { ?>
                                        <a href="<?= BASEURL?>/materi/<?= $data['Kelas']['id_kelas']?>" class="btn  btn-primary btn-sm mt-1 btn-lg px-3 py-2">Lihat Kelas</a>
                                    <?php } else { ?>
                                        <a href="<?= BASEURL;?>/auth/" class="btn btn-primary">Belajar Sekarang</a>
                                    <?php } ?>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- END CTA -->



                    <!-- STAT MODAL -->
                    <!-- Modal -->
                    <div class="modal fade" id="MasukKelas" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="judulModal">Masuk Kelas</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="<?= BASEURL; ?>/pendaftaran/tambah" method="post">
                                        <input type="hidden" class="form-control" id="id_kelas" name="id_kelas" >
                                        <input type="hidden" class="form-control" id="id_profile" name="id_profile" value="<?=$data['login']['id_profile']?>">
                                        <div class="mb-3">
                                            <label for="nama_user" class="form-label">Nama</label>
                                            <input type="text" class="form-control" id="nama_user" name= "nama_user" value="<?=$data['login']['nama_user']?>" readonly>
                                        </div>
                                        <div class="mb-3">
                                            <label for="nama_kelas" class="form-label">Kelas Yang dipilih</label>
                                            <input type="text" class="form-control" id="nama_kelas" name="nama_kelas" readonly>
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
                    <!-- END MODAL -->


                    <!-- Start Footer -->

                    <footer class=" mt-5">
                        <br><br><br>
                        <div class="container mt-4">
                            <div class="row row-content justify-content-between justify-content-md-start">
                                <div class="col-lg-4 col-md-6 mb-sm-4">
                                    <a href="#" class="app-brand-link">
                                        <span class="app-brand-logo demo">
                                            <svg width="25" viewBox="0 0 25 42" version="1.1"
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink">
                                                <defs>
                                                    <path
                                                        d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                                                        id="path-1"></path>
                                                    <path
                                                        d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                                                        id="path-3"></path>
                                                    <path
                                                        d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                                                        id="path-4"></path>
                                                    <path
                                                        d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                                                        id="path-5"></path>
                                                </defs>
                                                <g id="g-app-brand" stroke="none" stroke-width="1" fill="none"
                                                    fill-rule="evenodd">
                                                    <g id="Brand-Logo" transform="translate(-27.000000, -15.000000)">
                                                        <g id="Icon" transform="translate(27.000000, 15.000000)">
                                                            <g id="Mask" transform="translate(0.000000, 8.000000)">
                                                                <mask id="mask-2" fill="white">
                                                                    <use xlink:href="#path-1"></use>
                                                                </mask>
                                                                <use fill="#696cff" xlink:href="#path-1"></use>
                                                                <g id="Path-3" mask="url(#mask-2)">
                                                                    <use fill="#696cff" xlink:href="#path-3"></use>
                                                                    <use fill-opacity="0.2" fill="#FFFFFF"
                                                                        xlink:href="#path-3"></use>
                                                                </g>
                                                                <g id="Path-4" mask="url(#mask-2)">
                                                                    <use fill="#696cff" xlink:href="#path-4"></use>
                                                                    <use fill-opacity="0.2" fill="#FFFFFF"
                                                                        xlink:href="#path-4"></use>
                                                                </g>
                                                            </g>
                                                            <g id="Triangle"
                                                                transform="translate(19.000000, 11.000000) rotate(-300.000000) translate(-19.000000, -11.000000) ">
                                                                <use fill="#696cff" xlink:href="#path-5"></use>
                                                                <use fill-opacity="0.2" fill="#FFFFFF"
                                                                    xlink:href="#path-5"></use>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                            </svg>
                                        </span>
                                        <span
                                            class="app-brand-text demo menu-text fw-bolder ms-2 text-capitalize">DigiSkill</span>
                                    </a>
                                    <p class="fs-6 mt-2">DigiSKill merupakan platform media pembelajaran untuk menunjang
                                        skill digital
                                        dimasa kini.</p>

                                    <div class="d-flex gap-3">

                                        <a href="https://www.instagram.com/ginanjar_putra22/" target="_blank">
                                            <i class='tf-icons bx bxl-instagram-alt bx-sm btn btn-icon bx-md'></i>
                                        </a>
                                        <a href="https://www.instagram.com/ginanjar_putra22/" target="_blank">
                                            <i class='tf-icons bx bxl-facebook-square bx-sm btn btn-icon bx-md'></i>
                                        </a>
                                        <a href="https://www.instagram.com/ginanjar_putra22/" target="_blank">
                                            <i class='tf-icons bx bxl-youtube bx-sm btn btn-icon bx-md'></i>
                                        </a>
                                        <a href="https://www.instagram.com/ginanjar_putra22/" target="_blank">
                                            <i class='tf-icons bx bxl-linkedin-square bx-sm btn btn-icon bx-md'></i>
                                        </a>

                                    </div>
                                </div>
                                <div class="col-lg-3 offset-lg-1 col-md-6 mt-4 mt-sm-0 mb-sm-4">
                                    <p class="fs-5 fw-semibold">Informasi</p>
                                    <div class="row d-flex mt-3">
                                        <a class="nav-link fs-6" href="#">Beranda</a>
                                        <a class="nav-link fs-6" href="#">Tentang Kami</a>
                                    </div>
                                </div>
                                <div class="col-lg-3 offset-lg-1 col-md-6 mt-4 mt-sm-0 mb-sm-4">
                                    <p class="fs-5 fw-semibold">Kategori Kelas</p>
                                    <div class="row d-flex mt-3">
                                        <a class="nav-link fs-6" href="#">UI/UX Design</a>
                                        <a class="nav-link fs-6" href="#">Front-End-Developer</a>
                                        <a class="nav-link fs-6" href="#">Back-End-Developer</a>
                                    </div>
                                </div>
                                <!-- <div class="col-lg-2 offset-lg-1 col-md-6 mt-4 mt-sm-0 mb-sm-4">
                    <p class="fs-5 fw-semibold">Ikuti Kami</p>
                    <div class="row d-flex mt-3">
                        <button type="button" class="btn btn-sm btn-icon btn-outline-primary">
                            <span class="bx bxl-instagram bx-sm"></span>
                        </button>
                        <div class=" btn-outline-primary">
                            <i class='bx bxl-instagram bx-sm'></i>
                        </div>
                        <a class="nav-link fs-6" href="#">
                            <div class="d-flex gap-2">
                                <i class='bx bxl-instagram bx-sm'></i>
                                <p class="fs-6">
                                    UI/UX Design
                                </p>
                            </div>
                        </a>
                        <a class="nav-link fs-6" href="#">Front-End-Developer</a>
                        <a class="nav-link fs-6" href="#">Back-End-Developer</a>
                    </div>
                </div> -->
                                <div class="dropdown-divider"></div>
                                <div class="d-flex justify-content-between text-secondary">
                                    <p class="fs-6">©Copyright 2022 all right reserved | Kelompok 5 Pemerogaman Web -
                                        PTI-B 2021 UNESA
                                    </p>
                                    <p class="fs-6"> Created by: <a href="#" class="fw-semibold text-secondary">Ginanjar
                                            Putra</a></p>
                                </div>
                            </div>
                        </div>
                    </footer>

                    <!-- End Footer -->
                    <!-- END FOOTER -->



                    <div class="content-backdrop fade"></div>
                </div>
                <!-- Content wrapper -->
            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- <div class="buy-now">
    
  </div> -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="<?= BASEURL;?>/public/vendor/libs/jquery/jquery.js"></script>
    <script src="<?= BASEURL;?>/public/vendor/libs/popper/popper.js"></script>
    <script src="<?= BASEURL;?>/public/vendor/js/bootstrap.js"></script>
    <script src="<?= BASEURL;?>/public/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="<?= BASEURL;?>/public/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="<?= BASEURL;?>/public/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="<?= BASEURL;?>/public/js/main.js"></script>
          <!-- Modal JS -->
  <script src="<?= BASEURL;?>/public/js/script.js"></script>

    <!-- Page JS -->
    <script src="<?= BASEURL;?>/public/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
</body>

</html>