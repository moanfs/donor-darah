<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>From Edit Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Edit Jadwal Donor</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/jadwal-donor'); ?>">Jadwal Donor</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Jadwal Donor</li>
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
                    <h4 class="card-title">Edit Jadwal Donor</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/edit-jadwal/') . $jadwal->id_jadwal; ?>">
                            <div class="row">
                                <?php if (session()->getFlashdata('error')) : ?>
                                    <div class="alert alert-danger alert-dismissible show fade mx-5">
                                        <div class="alert-body text-center">
                                            <?= session()->getFlashdata('error'); ?>
                                        </div>
                                    </div>
                                <?php endif; ?>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-colum" class="form-label">Nama Kegiatan</label>
                                        <input type="text" id="first-name-colum" class="form-control <?= ($validation->hasError('nama_kegiatan')) ? 'is-invalid' : ''; ?>" placeholder="nama kegiatan" name="nama_kegiatan" value="<?= $jadwal->nama_kegiatan ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama_kegiatan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">PMI Penyelenggara</label>
                                        <fieldset class="form-group">
                                            <select class="form-select " id="basicSelect" name="pmi_id">
                                                <?php foreach ($pmi as $data) : ?>
                                                    <option value="<?= $data['id_pmi'] ?>" <?= ($data['id_pmi'] == $jadwal->id_pmi) ? 'selected' : ''; ?>><?= $data['nama_pmi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="country-floating" class="form-label">Lokasi</label>
                                        <input type="text" id="country-floating" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" placeholder="lokasi" value="<?= $jadwal->lokasi ?>">
                                        <!-- <div id="emailHelp" class="form-text">Lokasi Kegiatan Dapat Diubah jika Kegiatan dilakukan Di lokasi yang berbeda.</div> -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="country-floating" class="form-label">Alamat Kegiatan</label>
                                        <input type="text" id="country-floating" class="form-control <?= ($validation->hasError('alamat_kegiatan')) ? 'is-invalid' : ''; ?>" name="alamat_kegiatan" placeholder="alamat kegiatan" value="<?= $jadwal->alamat_kegiatan ?>">
                                        <!-- <div id="emailHelp" class="form-text">Alamat Kegiatan Dapat Diubah jika Kegiatan dilakukan Di lokasi yang berbeda.</div> -->
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('alamat_kegiatan'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Golongan Darah Yang Bisa Donor</label>
                                        <?php $pilihan = unserialize($jadwal->jenis_darah) ?>
                                        <div class="form-control <?= ($validation->hasError('pilihan')) ? 'is-invalid' : ''; ?>">
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="aa" value="A+" <?= in_array('A+', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="aa">A+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="a" value="A-" <?= in_array('A-', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="a">A-</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="bb" value="B+" <?= in_array('B+', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="bb">B+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="b" value="B-" <?= in_array('B-', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="b">B-</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="abab" value="AB+" <?= in_array('AB+', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="abab">AB+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="ab" value="AB-" <?= in_array('AB-', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="ab">AB-</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="oo" value="O+" <?= in_array('O+', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="oo">O+</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" name="pilihan[]" type="checkbox" id="o" value="O-" <?= in_array('O-', $pilihan) ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="o">O-</label>
                                            </div>
                                        </div>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('pilihan'); ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Kontak PMI</label>
                                        <input type="text" id="last-name-colu" forma class="form-control" name="kontak" value="<?= $petugas->kontak ?>" disabled>
                                    </div>
                                </div> -->


                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Deskripsi Kegiatan</label>
                                        <input type="text" id="last-name-colu" class="form-control <?= ($validation->hasError('desc')) ? 'is-invalid' : ''; ?>" name="desc" value="<?= $jadwal->desc ?>">
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
                                        <input type="date" id="company-column" class="form-control <?= ($validation->hasError('date')) ? 'is-invalid' : ''; ?>" name="date" value="<?= $jadwal->date ?>" min="<?= $batashari ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('date'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mandatory">
                                        <label for="email-id-column" class="form-label">Jam Kegiatan Donor</label>
                                        <input type="time" id="email-id-column" class="form-control <?= ($validation->hasError('time')) ? 'is-invalid' : ''; ?>" name="time" value="<?= $jadwal->time ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('time'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4 col-12">
                                    <div class="form-group mandatory">
                                        <label for="email-id-column" class="form-label">Jam Selesai Kegiatan Donor</label>
                                        <input type="time" id="email-id-column" class="form-control <?= ($validation->hasError('time_end')) ? 'is-invalid' : ''; ?>" name="time_end" value="<?= $jadwal->time_end ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('time_end'); ?>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit Jadwal</button>
                                    <!-- <button type="reset" class="btn btn-danger me-1 mb-1">Hapus Jadwal</button> -->
                                    <a data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger me-1 mb-1">Hapus Jadwal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

</section>

<!-- modal untuk hapus -->
<div class="modal fade text-left modal-borderless" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Hapus!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin ingin hapus Jadwal!!</h4>
            </div>
            <div class="modal-footer d-flex row">
                <form action="<?= site_url('admin/hapus-jadwal/') . $jadwal->id_jadwal ?>" method="post">
                    <div class="form-group mandatory">
                        <label for="email-id-column" class="form-label">Masukan Lokasi Kegiatan Untuk Menghapus</label>
                        <input type="text" class="form-control" name="hapus" required>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Hapus</button>
                        <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>