<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>From Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Tambah Jadwal Donor</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/jadwal-donor'); ?>">Jadwal Donor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Jadwal Donor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Jadwal Donor</h4>
                </div>
                <div class="card-content">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible show fade mx-5">
                            <div class="alert-body text-center">
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/add-jadwal'); ?>">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-colum" class="form-label">Nama Kegiatan</label>
                                        <input type="text" id="first-name-colum" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>" placeholder="nama kegiatan" name="nama_kegiatan" value="Donor Darah">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_kegiatan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">PMI Penyelenggara</label>
                                        <input type="text" id="last-name-colu" forma class="form-control" name="kontak" value="<?= $petugas->nama_pmi ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-colum" class="form-label">Lokasi Kegiatan</label>
                                        <input type="text" id="first-name-colum" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" placeholder="lokasi kegiatan" name="lokasi" value="<?= $petugas->nama_pmi ?>">
                                        <div id="emailHelp" class="form-text">Lokasi Kegiatan Dapat Diubah jika Kegiatan dilakukan Di lokasi yang berbeda.</div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="country-floating" class="form-label">Alamat Kegiatan</label>
                                        <input type="text" id="country-floating" class="form-control <?= ($validation->hasError('alamat_kegiatan')) ? 'is-invalid' : ''; ?>" name="alamat_kegiatan" placeholder="alamat kegiatan" value="<?= $petugas->alamat ?>">
                                        <div id="emailHelp" class="form-text">Alamat Kegiatan Dapat Diubah jika Kegiatan dilakukan Di lokasi yang berbeda.</div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat_kegiatan'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Golongan Darah Yang Bisa Donor</label>
                                        <div class="form-control <?= ($validation->hasError('pilihan')) ? 'is-invalid' : ''; ?>">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="aa" value="A+">
                                                <label class="form-check-label" for="aa">A+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="a" value="A-">
                                                <label class="form-check-label" for="a">A-</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="bb" value="B+">
                                                <label class="form-check-label" for="bb">B+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="b" value="B-">
                                                <label class="form-check-label" for="b">B-</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="abab" value="AB+">
                                                <label class="form-check-label" for="abab">AB+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="ab" value="AB-">
                                                <label class="form-check-label" for="ab">AB-</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="oo" value="O+">
                                                <label class="form-check-label" for="oo">O+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="o" value="O-">
                                                <label class="form-check-label" for="o">O-</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pilihan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Kontak PMI</label>
                                        <input type="text" id="last-name-colu" forma class="form-control" name="kontak" value="<?= $petugas->kontak ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Deskripsi Kegiatan</label>
                                        <input type="text" id="last-name-colu" class="form-control <?= ($validation->hasError('desc')) ? 'is-invalid' : ''; ?>" name="desc" value="<?= set_value('desc'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('desc'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4 col-12">
                                    <div class="form-group mandatory">
                                        <label for="company-column" class="form-label">Tanggal Kegiatan</label>
                                        <!-- untuk membatasi berapa hari bisa dipilih -->
                                        <?php $batashari = date('Y-m-d', strtotime('+3 days')); ?>
                                        <input type="date" id="company-column" class="form-control <?= ($validation->hasError('date')) ? 'is-invalid' : ''; ?>" name="date" value="<?= set_value('date'); ?>" min="<?= $batashari ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('date'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mandatory">
                                        <label for="email-id-column" class="form-label">Jam Kegiatan Donor</label>
                                        <input type="time" id="email-id-column" class="form-control <?= ($validation->hasError('time')) ? 'is-invalid' : ''; ?>" name="time" value="<?= set_value('time'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('time'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mandatory">
                                        <label for="email-id-column" class="form-label">Jam Selesai Kegiatan Donor</label>
                                        <input type="time" id="email-id-column" class="form-control <?= ($validation->hasError('time_end')) ? 'is-invalid' : ''; ?>" name="time_end" value="<?= set_value('time_end'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('time_end'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                    <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>