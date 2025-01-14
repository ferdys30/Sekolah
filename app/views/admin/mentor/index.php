<!-- <button type="button" class="btn btn-primary ModalTambahMentor" data-bs-toggle="modal" data-bs-target="#formModalMentor">
    Tambah Data Mahasiswa
</button>

<div class="row mt-3">
    <form action="<?= BASEURL; ?>/admin/data_mentor" method="post">
        <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Cari Data" name="keyword" id="keyword">
            <select name="pilihan">
                <option value="">Pilih Kelas</option>
                <?php foreach ($data['kelas'] as $ktg): ?>
                    <option value="<?= $ktg['id_kelas']; ?>"><?= $ktg['nama_kelas']; ?></option>
                <?php endforeach; ?>
            </select>
            <button class="btn btn-primary" type="submit" id="tombolCari" autocomplete="off">Cari</button>
        </div>
    </form>
</div>

<ul class="list-group">
    <?php foreach ($data['mentor'] as $usr): ?>
        <li class="list-group-item">
            <?= $usr['nama_mentor'] ?><br>
            <?= $usr['foto_mentor'] ?><br>
            <?= $usr['nama_kategori'] ?><br>
            <?= $usr['nama_kelas'] ?><br>
            <?= $usr['email'] ?><br>
            <a href="<?= BASEURL; ?>/kelola_mentor/hapus/<?= $usr['id_profile_mentor'] ?>" 
            class="badge bg-danger float-right" onclick="return confirm('Yakin?')">Hapus</a>
        </li>
    <?php endforeach; ?>
</ul>

<h1>Mentor belum memiliki Kelas</h1>
<ul class="list-group">
    <?php foreach ($data['b_mentor'] as $usr): ?>
        <li class="list-group-item">
            <?= $usr['nama_mentor'] ?><br>
            <?= $usr['foto_mentor'] ?><br>
            <?= $usr['email'] ?><br>

            <a href="<?= BASEURL; ?>/kelola_mentor/ubah/<?= $usr['id_profile_mentor'] ?>" 
                    class="badge bg-success float-right ModalUbahMentor" 
                    data-bs-toggle="modal" data-bs-target="#formModalMentor" 
                    data-id="<?= $usr['id_profile_mentor'] ?>">Ubah</a>

            <a href="<?= BASEURL; ?>/kelola_mentor/hapus/<?= $usr['id_profile_mentor'] ?>" 
            class="badge bg-danger float-right" onclick="return confirm('Yakin?')">Hapus</a>
        </li>
    <?php endforeach; ?>
</ul> -->

<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold  py-2"><span class="text-muted fw-light"></span> Data Mentor Digiskilll</h4>
        <!--Tabel Mentor  -->
        <!-- Form controls -->
        <div class="col">
            <div class="card mb-4">
                <h5 class="card-header">Cari Peserta Tergabung</h5>
                <div class="card-body ">
                    <form action="<?= BASEURL; ?>/admin/data_mentor" method="post">
                        <div class="row align-items-end">
                            <div class="mb-3 col-4 ">
                                <label for="cari" class="form-label">Nama Mentor</label>
                                <input type="text" class="form-control" placeholder="Masukkan Nama User" name="keyword"
                                    id="keyword">
                            </div>

                            <div class="mb-3 col-4">
                                <label for="pilihkelas" class="form-label">Pilih Kelas</label>
                                <select name="pilihan" class="form-select">
                                    <option value="">Pilih Kelas User</option>
                                    <?php foreach ($data['kelas'] as $ktg): ?>
                                        <option class="form-control" value="<?= $ktg['id_kelas']; ?>">
                                            <?= $ktg['nama_kelas']; ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="col-1 mx-auto justify-content-center align-content-center mb-3 d-grid gap-3">
                                <button class="btn btn-primary" type="submit" id="tombolCari"
                                    autocomplete="off">Cari</button>
                            </div>

                            <div class="col-3 mb-3 d-grid gap-3">
                                <button type="button" class="btn btn-primary ModalTambahMentor" data-bs-toggle="modal"
                                    data-bs-target="#formModalMentor">
                                    Tambah Data Mentor
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
                            <th>Judul Kelas</th>
                            <th>Email Mentor</th>
                            <th>Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-4">
                        <?php foreach ($data['mentor'] as $usr): ?>
                            <tr class="text-center">
                                <!-- Action -->
                                <td>
                                    <div class="d-grid gap-2 d-md-flex d-flex justify-content-md">
                                        <a href="<?= BASEURL; ?>/mentor/ubah/<?= $usr['id_profile_mentor'] ?>"
                                            class="btn btn-primary me-md-2 btn-sm ModalUbahMentor" data-bs-toggle="modal"
                                            data-bs-target="#formModalMentor"
                                            data-id="<?= $usr['id_profile_mentor'] ?>">Edit</a>
                                        <a href="<?= BASEURL; ?>/kelola_mentor/hapus/<?= $usr['id_profile_mentor'] ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                                    </div>
                                </td>
                                <!-- Profil -->
                                <td class="align-content-center align-self-center ">
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-l pull-up" title="<?= $usr['nama_mentor'] ?>">
                                            <img src="<?= BASEURL; ?>/public/img/profile/<?= $usr['foto_mentor'] ?>"
                                                alt="Avatar" class="rounded-circle" />
                                    </ul>
                                </td>
                                <!-- Nama -->
                                <td>
                                    <?= $usr['nama_mentor'] ?>
                                </td>
                                <!-- Kelas -->
                                <td>
                                    <?= $usr['nama_kategori'] ?>
                                </td>
                                <!-- Kelas -->
                                <td>
                                    <?= $usr['nama_kelas'] ?>
                                </td>
                                <!-- Email -->
                                <td>
                                    <?= $usr['email'] ?>
                                </td>
                                <!-- Waktu Bergabung -->
                                <td class="text-center">
                                    <?= $usr['pekerjaan'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->

        <h4 class="fw-bold  py-3 "><span class="text-muted fw-light"></span> Data Mentor Belum Memilih Kelas</h4>
        <div class="card">
            <!-- <h5 class="card-header">Hoverable rows</h5> -->
            <div class="table-responsive text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center">
                            <th>Actions</th>
                            <th>Profil</th>
                            <th>Nama</th>
                            <th>Email Mentor</th>
                            <th>Pekerjaan</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-4">
                        <?php foreach ($data['b_mentor'] as $usr): ?>
                            <tr class="text-center">
                                <!-- Action -->
                                <td>
                                    <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-center">
                                        <a href="<?= BASEURL; ?>/mentor/ubah/<?= $usr['id_profile_mentor'] ?>"
                                            class="btn btn-primary me-md-2 btn-sm ModalUbahMentor" data-bs-toggle="modal"
                                            data-bs-target="#formModalMentor"
                                            data-id="<?= $usr['id_profile_mentor'] ?>">Edit</a>
                                        <a href="<?= BASEURL; ?>/kelola_mentor/hapus/<?= $usr['id_profile_mentor'] ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                                    </div>
                                </td>
                                <!-- Profil -->
                                <td class="align-content-center align-self-center ">
                                    <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                                        <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                                            class="avatar avatar-l pull-up" title="<?= $usr['nama_mentor'] ?>">
                                            <img src="<?= BASEURL; ?>/public/img/profile/<?= $usr['foto_mentor'] ?>"
                                                alt="Avatar" class="rounded-circle" />
                                        </li>
                                    </ul>
                                </td>
                                <!-- Nama -->
                                <td>
                                    <?= $usr['nama_mentor'] ?>
                                </td>
                                <!-- Email -->
                                <td>
                                    <?= $usr['email'] ?>
                                </td>
                                <!-- Waktu Bergabung -->
                                <td class="text-center">
                                    <?= $usr['pekerjaan'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- / Content -->


    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->

<!-- modal untuk mentor -->
<div class="modal fade" id="formModalMentor" tabindex="-1" aria-labelledby="judulModalMentor" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalMentor">Tambah Data Mentor</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/kelola_mentor/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id_profile_mentor" name="id_profile_mentor">
                    <div class="mb-3">
                        <label for="nama_mentor" class="form-label">Nama :</label>
                        <input type="text" class="form-control" id="nama_mentor" name="nama_mentor">
                    </div>
                    <div class="mb-3">
                        <label for="foto_mentor" class="form-label">Foto</label>
                        <input type="file" class="form-control" id="foto_mentor" name="foto_mentor">
                        <input type="hidden" class="form-control" id="e_foto_mentor" name="e_foto_mentor">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="text" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" class="form-control" id="username" name="username">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password">
                    </div>
                    <div class="mb-3">
                        <label for="pekerjaan" class="form-label">Pekerjaan</label>
                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan">
                    </div>
                    <div class="mb-3">
                        <label for="pengalaman" class="form-label">Pengalaman</label>
                        <input type="text" class="form-control" id="pengalaman" name="pengalaman">
                    </div>
                    <div class="mb-3">
                        <label for="ig" class="form-label">Instagram</label>
                        <input type="text" class="form-control" id="ig" name="ig">
                    </div>
                    <div class="mb-3">
                        <label for="linkedin" class="form-label">LinkedIn</label>
                        <input type="text" class="form-control" id="linkedin" name="linkedin">
                    </div>
                    <div class="mb-3">
                        <label for="git" class="form-label">Git</label>
                        <input type="text" class="form-control" id="git" name="git">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data</button>
                </form>
            </div>
        </div>
    </div>
</div>