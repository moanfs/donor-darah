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
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-success alert-dismissible show fade mx-5">
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
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center flex-column">
                                    <div class="avatar">
                                        <img src="<?= base_url('assets/img/') . $profile->img_profile; ?>" alt="Avatar" class="" style="width: 15rem; height: 15rem; border-radius: 50%;">
                                    </div>

                                    <h3 class="mt-3"><?= $profile->nama; ?></h3>
                                </div>
                                <form action="<?= site_url('admin/profile-img/') . $profile->id_admin; ?>" method="post" enctype="multipart/form-data">
                                    <div class="input-group mt-3">
                                        <input type="file" class="form-control" name="img_profile" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                                        <button class="btn btn-outline-secondary" type="submit" id="inputGroupFileAddon04">Update</button>
                                    </div>
                                    <span style="font-size: 0.75rem;">Gambar harus PNG, JPEG, JPG, dengan ukuran max 2MB</span>
                                </form>
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
                                <form action="<?= site_url('admin/profile/') . $profile->id_admin; ?>" method="post">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Nama</label>
                                        <input type="text" name="nama" id="namadepan" class="form-control" placeholder="Your Name" value="<?= $profile->nama; ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Petugas PMI</label>
                                        <input type="text" id="pmi" class="form-control" disabled placeholder="Your Name" value="<?= $profile->nama_pmi; ?>">
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
            <section class="section">
                <div class="row">
                    <div class="col-12 col-lg-4">
                        <p>Ganti Password</p>
                    </div>
                    <div class="col-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
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
                                <form action="<?= site_url('admin/profile-password/') . $profile->id_admin; ?>" method="post">
                                    <div class="form-group">
                                        <label for="name" class="form-label">Password Lama</label>
                                        <input type="password" name="passlama" id="namadepan" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="name" class="form-label">Password Baru</label>
                                        <input type="password" name="passbaru" id="namabelakang" class="form-control">
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