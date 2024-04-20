<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Setting Profile - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5">
    <div class="row col-12">
        <?php if (session()->getFlashdata('success')) : ?>
            <div class="alert alert-info alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('success'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-4 col-md-4 ">
            <img src="<?= base_url(); ?>/assets/img/<?= $profile->img_profile; ?>" alt="<?= $profile->nama_depan; ?>" class="img-fluid rounded shadow-sm">
            <form action="<?= site_url('edit-profile-img/') . $profile->id_user; ?>" method="post" enctype="multipart/form-data">
                <div class="input-group mt-3">
                    <input type="file" class="form-control" name="img_profile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                    <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update</button>
                </div>
                <span style="font-size: 0.75rem;">Gambar harus PNG, JPEG, JPG, dengan ukuran max 2MB</span>
            </form>
        </div>
        <div class="col-sm-4 col-md-8 card shadow-sm p-4">
            <h5>Edit Profil pengguna</h5>
            <form action="<?= site_url('edit-profile/') . $profile->id_user ?>" method="post">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <label for="namadepan" class="col-sm-3 col-form-label">Nama Depan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" name="namadepan" id="namadepan" value="<?= $profile->nama_depan; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namadepan'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="namabelakang" class="col-sm-3 col-form-label">Nama Belakang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" name="namabelakang" id="namabelakang" value="<?= $profile->nama_belakang; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('namabelakang'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" name="nik" minlength="16" maxlength="16" id="nik" value="<?= $profile->nik; ?>">
                                <span style="font-size: 0.75rem;">Pastikan Nik 16 Angka</span>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('nik'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="tempatlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" name="tempatlahir" id="tempatlahir" value="<?= $profile->tempat_lahir; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tempatlahir'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="tanggallahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="date" class="form-control-plaintext" name="tanggallahir" id="tanggallahir" value="<?= $profile->tanggal_lahir; ?>">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('tanggallahir'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="goldar" class="col-sm-3 col-form-label">Golongan Darah</label>
                            <div class="col-sm-9">
                                <select class="form-select" required aria-label="Default select example" name="goldar">
                                    <option value="A+" <?php if ($profile->goldar == 'A+') : ?>selected <?php endif; ?>>A+</option>
                                    <option value="A-" <?php if ($profile->goldar == 'A-') : ?>selected <?php endif; ?>>A-</option>
                                    <option value="B+" <?php if ($profile->goldar == 'B+') : ?>selected <?php endif; ?>>B+</option>
                                    <option value="B-" <?php if ($profile->goldar == 'B-') : ?>selected <?php endif; ?>>B-</option>
                                    <option value="AB+" <?php if ($profile->goldar == 'AB+') : ?>selected <?php endif; ?>>AB+</option>
                                    <option value="AB-" <?php if ($profile->goldar == 'AB-') : ?>selected <?php endif; ?>>AB-</option>
                                    <option value="O+" <?php if ($profile->goldar == 'O+') : ?>selected <?php endif; ?>>O+</option>
                                    <option value="O-" <?php if ($profile->goldar == 'O-') : ?>selected <?php endif; ?>>O-</option>
                                    <option value="-" <?php if ($profile->goldar == '-') : ?>selected <?php endif; ?>>Belum Tau</option>
                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('goldar'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="goldar" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select class="form-select" required aria-label="Default select example" name="jenis_kelamin">
                                    <option value="Laki Laki" <?php if ($profile->jenis_klamin == 'Laki Laki') : ?>selected <?php endif; ?>>Laki Laki</option>
                                    <option value="Perempuan" <?php if ($profile->jenis_klamin == 'Perempuan') : ?>selected <?php endif; ?>>Perempuan</option>

                                </select>
                                <div class="invalid-feedback">
                                    <?= $validation->getError('goldar'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-grid">
                            <button type="submit" class="d-block btn btn-primary">Simpan</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>

    <!-- ganti pasword -->
    <div class="row col-12 mt-5">
        <?php if (session()->getFlashdata('successpas')) : ?>
            <div class="alert alert-info alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('successpas'); ?>
                </div>
            </div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('gagalpas')) : ?>
            <div class="alert alert-danger alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('gagalpas'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="col-sm-4 col-md-4 ">
            <h5>Ganti Password</h5>
        </div>
        <div class="col-sm-4 col-md-8 card shadow-sm p-4">
            <h5>Edit Password</h5>
            <form action="<?= site_url('edit-profile-password/') . $profile->id_user ?>" method="post">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <label for="passlama" class="col-sm-3 col-form-label">Password Lama</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="passlama" id="passlama">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('passlama'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="passbaru" class="col-sm-3 col-form-label">Password Baru</label>
                            <div class="col-sm-9">
                                <input type="password" class="form-control" name="passbaru" id="passbaru">
                                <div class="invalid-feedback">
                                    <?= $validation->getError('passbaru'); ?>
                                </div>
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="d-grid">
                            <button type="submit" class="d-block btn btn-primary">Simpan</button>
                        </div>
                    </li>
                </ul>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>