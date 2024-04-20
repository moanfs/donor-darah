<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Petugas - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Petugas Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/petugas'); ?>">Tabel Petugas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Petugas</li>
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
                    <h4 class="card-title">Form Petugas PMI</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/form-petugas'); ?>">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="first-name-colum" class="form-label">Nama</label>
                                        <input type="text" id="first-name-colum" class="form-control <?= ($validation->hasError('nama')) ? 'is-invalid' : ''; ?>" placeholder="nama petugas" name="nama" value="<?= set_value('nama'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('nama'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="country-floating" class="form-label">Email</label>
                                        <input type="text" id="country-floating" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" name="email" placeholder="email" value="<?= set_value('email'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('email'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Petugas PMI?</label>
                                        <select class="form-select" name="pmi" id="kabupaten" aria-label="Default select example">
                                            <?php foreach ($pmi as $data) : ?>
                                                <option value="<?= $data->id_pmi; ?>"><?= $data->nama_pmi; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colu" class="form-label">Phone</label>
                                        <input type="number" id="last-name-colu" forma class="form-control <?= ($validation->hasError('phone')) ? 'is-invalid' : ''; ?>" name="phone" value="<?= set_value('phone'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('phone'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="city-column" class="form-label">Password</label>
                                        <input type="password" id="city-column" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('password'); ?>
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