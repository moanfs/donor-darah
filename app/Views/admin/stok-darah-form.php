<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>From Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Stok Darah Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/stok-darah'); ?>">Tabel Stok Darah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Stok Darah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>

<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Stok Darah</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/add-darah'); ?>">
                            <input type="hidden" id="last-name-column" class="form-control" name="pmi_id" value="<?= $petugas->pmi_id ?>" hidden>
                            <div class="row">
                                <!-- pilih golongan darah -->
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Golongan Darah</label>
                                        <fieldset class="form-group">
                                            <select class="form-select <?= ($validation->hasError('goldar')) ? 'is-invalid' : ''; ?>" id="basicSelect" name="goldar">
                                                <option selected disabled>Pilih golongan darah</option>
                                                <option value="A-">A-</option>
                                                <option value="A+">A+</option>
                                                <option value="B-">B-</option>
                                                <option value="B+">B+</option>
                                                <option value="AB-">AB-</option>
                                                <option value="AB+">AB+</option>
                                                <option value="O-">O-</option>
                                                <option value="O+">O+</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('goldar'); ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <!--  jumlah stok -->
                                <div class="col-md-6">
                                    <!-- <div class="col-4"> -->
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Jumlah kantong Darah</label>
                                        <input type="number" id="last-name-column" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" placeholder="jumlah kantong darah" min="1" name="jumlah" value="<?= set_value('jumlah'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jumlah'); ?>
                                        </div>
                                    </div>
                                    <!-- </div> -->
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">PMI Penyedia</label>
                                        <!-- <input type="text" id="last-name-column" class="form-control" name="nama_pmi" value="<?= $petugas->nama_pmi ?>" disabled> -->
                                        <fieldset class="form-group">
                                            <select class="form-select " id="basicSelect" name="pmi_id">
                                                <?php foreach ($pmi as $data) : ?>
                                                    <option value="<?= $data['id_pmi'] ?>" <?= ($data['id_pmi'] == $petugas->id_pmi) ? 'selected' : ''; ?>><?= $data['nama_pmi'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </fieldset>
                                    </div>
                                </div>
                                <!-- <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Kontak PMI</label>
                                        <input type="text" id="last-name-column" class="form-control" name="nama_pmi" value="<?= $petugas->kontak ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Alamat PMI</label>
                                        <input type="text" id="last-name-column" class="form-control" name="nama_pmi" value="<?= $petugas->alamat ?>" disabled>
                                    </div>
                                </div> -->

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