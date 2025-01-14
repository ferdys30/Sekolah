<div class="content-wrapper">
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tugas Kelas Card -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <p class="text-secondary fs-6">Tugas Kelas</p>
          <p class="mt-n3 fs-5 fw-semibold">Kelas <span>
              <?= $data['kelas']['nama_kelas'] ?>
            </span></p>
          <?php if ($data['kelas']['penugasan'] === NULL): ?>
            <div class="row justify-content-between">
              <div class="col-9 d-flex gap-2">
              </div>
              <div class="col-3">
                <div class="d-grid gap-3 d-md-flex d-flex justify-content-md-end">
                  <div class="text-center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                      data-bs-target="#ModalTambahTugas">
                      Tambah Tugas
                    </button>
                  </div>
                </div>
              </div>
            </div>
          <?php endif ?>
          <br>
          <?php if ($data['kelas']['penugasan'] !== NULL): ?>
            <div class="table-responsive text-nowrap">
              <!-- Tugas Kelas Table -->
              <table class="table table-hover">
                <thead>
                  <tr class="text-center">
                    <th>Actions</th>
                    <th class="text-start">Deskripsi</th>
                  </tr>
                </thead>
                <tbody class="table-border-bottom-4">
                  <tr class="text-center">
                    <td>
                      <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-center">
                        <a href="<?= BASEURL; ?>/penugasan/detail/<?= $data['kelas']['id_kelas'] ?>"
                          class="btn btn-primary me-md-2 btn-sm ModalUbahTugas" data-bs-toggle="modal"
                          data-bs-target="#ModalTambahTugas" data-id="<?= $data['kelas']['id_kelas'] ?>">Edit</a>
                      </div>
                    </td>
                    <td class="text-start">
                      <?= $data['kelas']['penugasan'] ?>
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          <?php endif ?>
        </div>
      </div>
    </div>

    <!-- Materi Card -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-body">
          <p class="text-secondary fs-6">Materi</p>
          <p class="mt-n3 fs-5 fw-semibold">Kelas
            <?= $data['kelas']['nama_kelas'] ?>
          </p>



          <div class="d-flex mb-3 row gap-5">
            <form action="<?= BASEURL; ?>/mentor/materi" method="post">
              <label for="exampleFormControlInput1" class="form-label">Cari Materi</label>
              <div class="input-group mb-3 gap-2">
                <input type="text" class="form-control rounded" placeholder="Cari Data" name="keyword" id="keyword">
                <button class="btn btn-primary rounded" type="submit" id="tombolCari" autocomplete="off">Cari
                  Materi</button>
            </form>
            <button class="btn btn-primary me-5 rounded">
              <i class='bx bx-refresh'></i>
            </button>
            <button type="button" class="btn btn-primary ModalTambahMateri rounded" data-bs-toggle="modal"
              data-bs-target="#formModalMateri">
              <i class='bx bx-plus'></i>Tambah Materi
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Materi Table -->
  <div class="card">
    <div class="table-responsive text-nowrap">
      <table class="table table-hover">
        <thead>
          <tr class="text-center">
            <th>Actions</th>
            <th>Preview Materi</th>
            <th>Urutan</th>
            <th>Judul</th>
            <th>Deskripsi</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-4">
          <?php foreach ($data['materi'] as $materi): ?>
            <tr class="text-center">
              <!-- Materi Actions -->
              <td>
                <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-end">
                  <a href="<?= BASEURL; ?>/materi/detail/<?= $materi['id_materi'] ?>"
                    class="btn btn-primary me-md-2 btn-sm ModalUbahMateri" data-bs-toggle="modal"
                    data-bs-target="#formModalMateri" data-id="<?= $materi['id_materi'] ?>">Edit</a>
                  <a href="<?= BASEURL; ?>/materi/hapus/<?= $materi['id_materi'] ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin?')">Hapus</a>
                </div>
              </td>
              <!-- Preview Materi -->
              <td class="align-content-center align-self-center ">
                <a href="<?= $materi['link_materi'] ?>" target="_blank" class="btn btn-outline-primary btn-sm">Link
                  Materi</a>


              </td>
              <!-- Urutan -->
              <td>
                <?= $materi['urutan_materi'] ?><br>
              </td>
              <!-- Judul -->
              <td>
                <?= $materi['judul'] ?>
              </td>
              <!-- Deskripsi Materi -->
              <td>
                <?= $materi['deskripsi_materi'] ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
  </div>
  <br>
  <br>
</div>
</div>

<!-- Materi Modal -->
<div class="modal fade" id="formModalMateri" tabindex="-1" aria-labelledby="judulModalMateri" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModalMateri">Tambah Data Materi</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Materi Form -->
        <form action="<?= BASEURL; ?>/materi/tambah" method="post" enctype="multipart/form-data">
          <!-- Form Inputs -->
          <input type="hidden" class="form-control" id="id_materi" name="id_materi">
          <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"
            value="<?= $data['kelas']['id_kelas'] ?>">
          <div class="mb-3">
            <label for="urutan_materi" class="form-label">Urutan Materi</label>
            <input type="text" class="form-control" id="urutan_materi" name="urutan_materi">
          </div>
          <div class="mb-3">
            <label for="judul" class="form-label">Judul Materi</label>
            <input type="text" class="form-control" id="judul" name="judul">
          </div>
          <div class="mb-3">
            <label for="link_materi" class="form-label">Link Materi</label>
            <input type="text" class="form-control" id="link_materi" name="link_materi">
          </div>
          <div class="mb-3">
            <label for="deskripsi_materi" class="form-label">Deskripsi Materi</label>
            <input type="text" class="form-control" id="deskripsi_materi" name="deskripsi_materi">
          </div>
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Tambah Tugas Modal -->
<div class="modal fade" id="ModalTambahTugas" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="judulModalKelas">
          Tambah Tugas
        </h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- Tambah Tugas Form -->
        <form action="<?= BASEURL; ?>/penugasan/tambah" method="post" enctype="multipart/form-data">
          <div class="row">
            <div class="mb-3">
              <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"
                value="<?= $data['kelas']['id_kelas'] ?>">
              <label for="penugasan" class="form-label">Deskripsi Tugas</label>
              <textarea class="form-control" id="penugasan" name="penugasan" rows="3"
                value="Deskripsi Tugas"></textarea>
            </div>
          </div>
      </div>
      <!-- Modal Footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>