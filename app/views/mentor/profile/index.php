<!-- Content wrapper -->
<!-- Content -->
<div class="content-wrapper">
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="card mb-4">
            <h5 class="card-header">Profile Detail</h5>
            <!-- Account -->
            <div class="card-body">
                <form id="formAccountSettings" method="POST" onsubmit="return false">
                    <div class="d-flex align-items-start align-items-sm-center gap-4">
                        <img src="<?= BASEURL?>/public/img/profile/<?= $data['login']['foto_user']?>" alt="user-avatar" class="d-block rounded"
                        height="100" width="100" id="uploadedAvatar" />
                        <div class="button-wrapper">
                            <label for="upload" class="btn btn-primary me-2 mb-4" tabindex="0">
                                <span class="d-none d-sm-block">Upload new photo</span>
                                <i class="bx bx-upload d-block d-sm-none"></i>
                                <input type="file" id="upload" class="account-file-input" hidden
                                accept="image/png, image/jpeg" />
                                            </label>
                                            <button type="button"
                                            class="btn btn-outline-secondary account-image-reset mb-4">
                                                <i class="bx bx-reset d-block d-sm-none"></i>
                                                <span class="d-none d-sm-block">Reset</span>
                                            </button>
                                            <p class="text-muted mb-0">Allowed JPG, GIF or PNG. Max size of 800K</p>
                                        </div>
                                    </div>
                                </div>
                            <hr class="my-0" />
                            <div class="card-body">
                                <div class="row">
                                        <div class="mb-3 col-md-6">
                                            <label for="firstName" class="form-label fw-bold">Nama Lengkap</label>
                                            <input class="form-control" type="text" id="firstName" name="firstName"
                                            value="<?= $data['login']['nama_user']?>" autofocus />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="lastName" class="form-label fw-bold">username</label>
                                            <input class="form-control" type="text" name="lastName" id="lastName"
                                                value="<?= $data['login']['username']?>" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="email" class="form-label fw-bold">E-mail</label>
                                            <input class="form-control" type="text" id="email" name="email"
                                                value="<?= $data['login']['email']?>" placeholder="User@example.com" />
                                        </div>
                                        <div class="mb-3 col-md-6">
                                            <label for="nomor" class="form-label fw-bold fw-bold">Nomor Telepon</label>
                                            <input type="text" class="form-control " id="nomor" name="nomor"
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
                                            <label for="zipCode" class="form-label fw-bold">Provinsi</label>
                                            <input type="text" class="form-control" id="zipCode" name="zipCode"
                                                value="<?= $data['login']['provinsi']?>" maxlength="6" />
                                        </div>

                                        <div class="mb-3 col-md-6">
                                            <label for="address" class="form-label fw-bold">Password</label>
                                            <input type="password" class="form-control" id="Password" name="Password"
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