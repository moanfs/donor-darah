<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Setting Profile - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5">
    <div class="row col-12">
        <div class="col-sm-4 col-md-4 ">
            <img src="<?= base_url(); ?>/assets/img/<?= $profile->img_profile; ?>" alt="<?= $profile->nama_depan; ?>" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-sm-4 col-md-8 card shadow-sm p-4">
            <h5>Edit Profil pengguna</h5>
            <form action="<?= site_url('edit-profile/') . $profile->id_user . '/' . $profile->slug ?>" method="post">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">
                        <div class="row">
                            <label for="namadepan" class="col-sm-3 col-form-label">Nama Depan</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="namadepan" value="<?= $profile->nama_depan; ?>">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="namabelakang" class="col-sm-3 col-form-label">Nama Belakang</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="namabelakang" value="<?= $profile->nama_belakang; ?>">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="nik" class="col-sm-3 col-form-label">Nik</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="nik" value="<?= $profile->nik; ?>">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="tempatlahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="tempatlahir" value="<?= $profile->tempat_lahir; ?>">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="tanggallahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="tanggallahir" value="<?= $profile->tanggal_lahir; ?>">
                            </div>
                        </div>
                    </li>
                    <li class="list-group-item">
                        <div class="row">
                            <label for="goldar" class="col-sm-3 col-form-label">Golongan Darah</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control-plaintext" id="goldar" value="<?= $profile->goldar; ?>">
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