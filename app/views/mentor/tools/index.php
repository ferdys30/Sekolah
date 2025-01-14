<!-- Content wrapper -->
<div class="content-wrapper">
  <!-- Content -->
  <div class="container-xxl flex-grow-1 container-p-y">
    <!-- Tabel User -->
    <!-- Form controls -->
    <div class="col">
      <div class="card mb-4">
        <div class="card-body ">

          <p class="text-secondary  fs-6 ">Tools</p>
          <p class="mt-n3 fs-5 fw-semibold">Kelas
            <?= $data['kelas']['nama_kelas'] ?>
          </p>

          <div class="d-flex mb-3 row gap-5">
            <form action="<?= BASEURL; ?>/mentor/tools" method="post">
              <label for="exampleFormControlInput1" class="form-label">Cari Tools</label>
              <div class="input-group mb-3">
                <input type="text" class="form-control rounded" placeholder="Cari Tools" name="keyword" id="keyword">
                <button class="btn btn-primary mx-2 rounded" type="submit" id="tombolCari" autocomplete="off">Cari
                  Tools</button>
            </form>
            <button class="btn btn-primary me-5 rounded">
              <i class='bx bx-refresh'></i>
            </button>
            <button type="button" class="btn btn-primary rounded ModalTambahTools ms-auto" data-bs-toggle="modal"
              data-bs-target="#formModalTools">
              <i class='bx bx-plus'></i>Tambah Tools
            </button>
          </div>



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
            <th>Actions</th>
            <th>Icon</th>
            <th>Nama Tools</th>
            <th>Preview</th>
          </tr>
        </thead>
        <tbody class="table-border-bottom-4">
          <?php foreach ($data['tools'] as $tools): ?>
            <tr class="text-center">
              <!-- Action -->
              <td>
                <div class="d-grid gap-2 d-md-flex d-flex justify-content-md-center">
                  <a href="<?= BASEURL; ?>/tools/detail/<?= $tools['id_tools'] ?>"
                    class="btn btn-primary me-md-2 btn-sm ModalUbahTools" data-bs-toggle="modal"
                    data-bs-target="#formModalTools" data-id="<?= $tools['id_tools'] ?>">Edit</a>
                  <a href="<?= BASEURL; ?>/tools/hapus/<?= $tools['id_tools'] ?>" class="btn btn-danger btn-sm"
                    onclick="return confirm('Yakin?')">Hapus</a>
                </div>
              </td>
              <!-- Icon -->
              <td class="align-content-center align-self-center ">
                <ul class="list-unstyled users-list m-0 avatar-group d-flex align-items-center">
                  <li data-bs-toggle="tooltip" data-popup="tooltip-custom" data-bs-placement="top"
                    class="avatar avatar-l pull-up" title="<?= $tools['nama_tools'] ?>">
                    <img src="<?= BASEURL ?>/public/img/assets/tools/<?= $tools['gambar'] ?>" alt="Avatar"
                      class="rounded-circle  align-items-center" />
                </ul>
              </td>
              <!-- Nama Tools -->
              <td>
                <?= $tools['nama_tools'] ?><br>
              </td>
              <!-- Preview -->
              <td><a target="_blank" href="<?= $tools['link_download'] ?>" target="_blank"
                  class="btn btn-outline-primary btn-sm">Link
                  Tools</a>
              </td>
            </tr>
          <?php endforeach; ?>
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

<div class="modal fade" id="formModalTools" tabindex="-1" aria-labelledby="judulModalTools" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModalTools">Tambah Data Tools</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL; ?>/tools/tambah" method="post" enctype="multipart/form-data">
          <input type="hidden" class="form-control" id="id_tools" name="id_tools">
          <input type="hidden" class="form-control" id="id_kelas" name="id_kelas"
            value="<?= $data['kelas']['id_kelas'] ?>">
          <div class="mb-3">
            <label for="nama_tools" class="form-label">Nama Tools</label>
            <input type="text" class="form-control" id="nama_tools" name="nama_tools">
          </div>
          <div class="mb-3">
            <label for="link_download" class="form-label">Link Download</label>
            <input type="text" class="form-control" id="link_download" name="link_download">
          </div>
          <div class="mb-3">
            <label for="gambar" class="form-label">Gambar Tools</label>
            <input type="file" class="form-control" id="gambar" name="gambar">
            <input type="hidden" class="form-control" id="e_gambar" name="e_gambar">
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