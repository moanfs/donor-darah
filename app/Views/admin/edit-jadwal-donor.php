<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>From Edit Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Form Edit Jadwal Donor</h3>
</div>

<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Jadwal Donor</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/edit-jadwal/') . $jadwal->id_jadwal; ?>">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-colum" class="form-label">Nama Kegiatan</label>
                                        <input type="text" id="first-name-colum" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="nama kegiatan" name="nama" value="<?= $jadwal->nama ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="country-floating" class="form-label">Lokasi</label>
                                        <input type="text" id="country-floating" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" name="lokasi" placeholder="lokasi" value="<?= $jadwal->lokasi ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Kab/Kota</label>
                                        <select class="form-select" name="kabupaten" id="kabupaten" aria-label="Default select example">
                                            <?php foreach ($kabupaten as $data) : ?>
                                                <option value="<?= $data->id; ?>" <?php if ($data->id == $jadwal->kab_kota) : ?>selected <?php endif; ?>><?= $data->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Deskripsi</label>
                                        <input type="text" id="last-name-colu" class="form-control <?= ($validation->hasError('desc')) ? 'is-invalid' : ''; ?>" name="desc" value="<?= $jadwal->desc ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('desc'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Tanggal Kegiatan</label>
                                        <input type="date" id="last-name-colu" forma class="form-control <?= ($validation->hasError('date')) ? 'is-invalid' : ''; ?>" name="date" value="<?= $jadwal->date ?>" min="<?= date('Y-m-d'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('date'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="city-column" class="form-label">Jam Kegiatan</label>
                                        <input type="time" id="time" class="form-control <?= ($validation->hasError('time')) ? 'is-invalid' : ''; ?>" name="time" value="<?= $jadwal->time ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('time'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="company-column" class="form-label">Batas Tanggal Pendaftaran</label>
                                        <input type="date" id="cleave-date" class="form-control <?= ($validation->hasError('date_end')) ? 'is-invalid' : ''; ?>" name="date_end" value="<?= $jadwal->date_end ?>" min="<?= date('Y-m-d'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('date_end'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="email-id-column" class="form-label">Batas Waktu Pendaftaran</label>
                                        <input type="time" id="email-id-column" class="form-control <?= ($validation->hasError('time_end')) ? 'is-invalid' : ''; ?>" name="time_end" value="<?= $jadwal->time_end ?>">
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