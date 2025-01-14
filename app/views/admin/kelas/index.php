<div class="content-wrapper">
    <!-- Content -->
    <div class="container-xxl flex-grow-1 container-p-y">
        <!--Tambah Jenis Kelas  -->
        <div class="card mb-5">
            <div class="d-flex justify-content-between m-4 align-items-center">
                <p class="fs-5 fw-bolder">Data Kategori Kelas DigiSkill</p>
                <button type="button" class="btn btn-primary ModalTambahKategori" data-bs-toggle="modal"
                    data-bs-target="#formModalKategori">
                    Tambah Data Kategori
                </button>
            </div>
            <!-- TABEL KATEGORI KELAS -->
            <div class="table-responsive  text-nowrap">
                <table class="table table-hover">
                    <thead>
                        <tr class="">
                            <th class="text-center  w-25 ">Action</th>
                            <th class="text-center  w-25 ">Kategori Kelas</th>
                            <th class="text-center  w-25 ">Hero Gambar</th>
                            <th>Deskripsi</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-4">
                        <?php foreach($data['kategori'] as $kls): ?>
                            <tr class="text-center">
                                <!-- Kategori -->
                                <td class="text-center  w-25 ">
                                    <a href="<?= BASEURL; ?>/kategori/ubah/<?= $kls['id_kategori'] ?>"
                                        class="btn btn-primary me-md-2 btn-sm ModalUbahKategori" data-bs-toggle="modal"
                                        data-bs-target="#formModalKategori" data-id="<?= $kls['id_kategori'] ?>">Edit</a>

                                    <a href="<?= BASEURL; ?>/kategori/hapus/<?= $kls['id_kategori'] ?>"
                                        class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                                </td>
                                <td class="text-center  w-25 ">
                                    <?= $kls['nama_kategori'] ?>
                                </td>
                                <!-- Profil -->
                                <td class="text-center   ">
                                    <img src="<?= BASEURL ?>/public/img/assets/kategori/<?= $kls['hero_gambar'] ?>"
                                        alt="Avatar" class="avatar  h-25 " data-popup="tooltip-custom"
                                        data-bs-placement="top">
                                </td>
                                <!-- Nama -->
                                <td class="text-start">
                                    <?= $kls['hero_deskripsi'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>

                    </tbody>
                </table>
            </div>
        </div>



        <!-- Hoverable Table rows -->
        <div class="card mb-5">
            <div class="d-flex justify-content-between m-4 align-items-center">
                <p class="fs-5 fw-bolder">Data Kelas DigiSkill</p>
                <button type="button" class="btn btn-primary ModalTambahKelas" data-bs-toggle="modal"
                    data-bs-target="#formModal">
                    Tambah Data Kelas
                </button>
            </div>
            <!-- <h5 class="card-header">Hoverable rows</h5> -->
            <div class="table-responsive ">
                <table class="table table-hover">
                    <thead>
                        <tr class="text-center text-nowrap">
                            <th>Actions</th>
                            <th class="  h-px-50">Kode Kelas</th>
                            <th class="">Kategori Kelas</th>
                            <th class="text-start">Nama Kelas</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-4">
                        <?php foreach($data['kelas'] as $kls): ?>
                            <tr class="text-center">
                                <!-- Action -->
                                <td class="">
                                    <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-center ">
                                        <a href="<?= BASEURL; ?>/kelas/ubah/<?= $kls['id_kelas'] ?>"
                                            class="btn btn-primary me-md-2 btn-sm ModalUbahKelas" data-bs-toggle="modal"
                                            data-bs-target="#formModal" data-id="<?= $kls['id_kelas'] ?>">Ubah</a>

                                        <a href="<?= BASEURL; ?>/kelas/hapus/<?= $kls['id_kelas'] ?>"
                                            class="btn btn-danger btn-sm" onclick="return confirm('Yakin?')">Hapus</a>
                                    </div>
                                </td>
                                <!-- Kode -->
                                <td class="text-center">
                                    <?= $kls['kode_kelas'] ?>
                                </td>
                                <!-- Kategotu -->
                                <td>
                                    <?= $kls['nama_kategori'] ?>
                                </td>
                                <!-- Nama Kelas -->
                                <td class="text-start">
                                    <?= $kls['nama_kelas'] ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--/ Hoverable Table rows -->
    </div>
    <!-- / Content -->
</div>


<!-- Modal Kelas -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModalKelas" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalKelas">Tambah Data Kelas</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/kelas/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="id_kelas" name="id_kelas">
                    <div class="mb-3">
                        <label for="nama_kelas" class="form-label">Nama Kelas</label>
                        <input type="text" class="form-control" id="nama_kelas" name="nama_kelas">
                    </div>
                    <div class="mb-3">
                        <label for="id_kategori" class="form-label">Kategori</label>
                        <select name="id_kategori" id="id_kategori" class="form-select">
                            <?php foreach($data['kategori'] as $ktg): ?>
                                <option value="<?= $ktg['id_kategori']; ?>">
                                    <?= $ktg['nama_kategori']; ?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="detail" class="form-label">Detail Kelas</label>
                        <input type="text" class="form-control" id="detail" name="detail">
                    </div>
                    <div class="mb-3">
                        <label for="thumbnail" class="form-label">Thumbnail</label>
                        <input type="file" class="form-control" id="thumbnail" name="thumbnail">
                        <input type="hidden" class="form-control" id="e_thumbnail" name="e_thumbnail">
                    </div>
                    <div class="mb-3">
                        <label for="detail_program" class="form-label">Detail Program</label>
                        <input type="text" class="form-control" id="detail_program" name="detail_program">
                    </div>
                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="deskripsi" name="deskripsi">
                    </div>
                    <div class="mb-3">
                        <label for="kode_kelas" class="form-label">Kode Kelas</label>
                        <input type="text" class="form-control" id="kode_kelas" name="kode_kelas">
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

<div class="modal fade" id="formModalKategori" tabindex="-1" aria-labelledby="judulModalKategori" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="judulModalKategori">Tambah Data Kategori</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASEURL; ?>/kategori/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" class="form-control" id="K_id_kategori" name="K_id_kategori">
                    <div class="mb-3">
                        <label for="nama_kategori" class="form-label">Kategori</label>
                        <input type="text" class="form-control" id="nama_kategori" name="nama_kategori">
                    </div>
                    <div class="mb-3">
                        <label for="hero_deskripsi" class="form-label">Deskripsi</label>
                        <input type="text" class="form-control" id="hero_deskripsi" name="hero_deskripsi">
                    </div>
                    <div class="mb-3">
                        <label for="hero_gambar" class="form-label">Gambar</label>
                        <input type="file" class="form-control" id="hero_gambar" name="hero_gambar">
                        <input type="hidden" class="form-control" id="e_hero_gambar" name="e_hero_gambar">
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