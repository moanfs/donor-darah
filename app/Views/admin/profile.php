<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Stok Darah - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-content">
    <section class="section">
        <div class="page-heading">
            <div class="page-title">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3>Profil Akun</h3>
                    </div>
                </div>
            </div>
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar">
                                        <img src="<?= base_url('assets/img/') . $profile->img_profile; ?>" alt="Avatar" class="" style="width: 15rem; height: auto;">
                                    </div>

                                    <h3 class="mt-3"><?= $profile->nama_depan . ' ' . $profile->nama_belakang; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <?php if (isset($validation)) { ?>
                                    <div class="alert alert-danger" role="alert">
                                        <?php echo $validation->listErrors() ?>
                                    </div>
                                <?php } ?>
                                <form action="<?= site_url('admin/profile/') . $profile->id_user; ?>" method="post">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama Depan</label>
                                        <input type="text" name="namadepan" id="namadepan" class="form-control" placeholder="Your Name" value="<?= $profile->nama_depan; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama Belakang</label>
                                        <input type="text" name="namabelakang" id="namabelakang" class="form-control" placeholder="Your Name" value="<?= $profile->nama_belakang; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="text" name="email" id="email" class="form-control" placeholder="Your Email" value="<?= $profile->email; ?>">
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Save Changes</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </section>
</div>
<?= $this->endSection(); ?>