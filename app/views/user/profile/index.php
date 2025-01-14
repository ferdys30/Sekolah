<!-- Content wrapper -->
<!-- Content -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Profile Detail</h5>
            <!-- Account -->
            <div class="card-body">
                <form action="<?= BASEURL; ?>/auth/ubah" method="post" enctype="multipart/form-data">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?= BASEURL?>/public/img/profile/<?= $data['login']['foto_user']?>" alt="user-avatar" class="d-block rounded"
                        height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <input type="file" class="form-control" id="foto_user" name= "foto_user">
                            <input type="hidden" class="form-control" id="e_foto_user" name= "e_foto_user" value="<?= $data['login']['foto_user']?>">
                            <input type="hidden" class="form-control" id="id_profile" name= "id_profile" value="<?= $data['login']['id_profile']?>">
                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                        </div>
                    </div>
            </div>
                <hr class="my-0" />
                <div class="card-body">
                    <div class="row">
                            <div class="mb-3 col-md-6">
                                <label for="nama_user" class="form-label fw-bold">Nama Lengkap</label>
                                <input class="form-control" type="text" id="nama_user" name="nama_user"
                                value="<?= $data['login']['nama_user']?>" autofocus />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="username" class="form-label fw-bold">username</label>
                                <input class="form-control" type="text" name="username" id="username" readonly
                                    value="<?= $data['login']['username']?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="email" class="form-label fw-bold">E-mail</label>
                                <input class="form-control" type="text" id="email" name="email"
                                    value="<?= $data['login']['email']?>" placeholder="User@example.com" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="nomor_hp" class="form-label fw-bold fw-bold">Nomor Telepon</label>
                                <input type="text" class="form-control " id="nomor_hp" name="nomor_hp"
                                value="<?= $data['login']['nomor_hp']?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="kota" class="form-label fw-bold">Kota</label>
                                <input type="text" class="form-control" id="kota" name="kota"
                                value="<?= $data['login']['kota']?>" />
                            </div>
                            <div class="mb-3 col-md-6">
                                <label for="alamat" class="form-label fw-bold">Alamat</label>
                                <input type="text" class="form-control" id="alamat" name="alamat"
                                    value="<?= $data['login']['alamat']?>" />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="provinsi" class="form-label fw-bold">Provinsi</label>
                                <input type="text" class="form-control" id="provinsi" name="provinsi"
                                    value="<?= $data['login']['provinsi']?>"  />
                            </div>

                            <div class="mb-3 col-md-6">
                                <label for="password" class="form-label fw-bold">Password</label>
                                <input type="password" class="form-control" id="password" name="password"
                                    value="<?= $data['login']['password']?>"/>
                            </div>
                        </div>
                        <div class="mt-2">
                            <button type="submit" class="btn btn-primary me-2">Save changes</button>
                            <button type="reset" class="btn btn-outline-secondary">Cancel</button>
                        </div>
                </form>
                </div>
                            <!-- /Account -->
        </div>
                    <!-- / Content -->
                    <div class="content-backdrop fade"></div>
    </div>
                <!-- Content wrapper -->