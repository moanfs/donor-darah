<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Berita - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Form Berita Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/berita'); ?>">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Form Berita</li>
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
                    <h4 class="card-title">Form Berita</h4>
                </div>
                <div class="card-content">
                    <?php if (session()->getFlashdata('error')) : ?>
                        <div class="alert alert-danger alert-dismissible show fade">
                            <div class="alert-body">
                                <b>Error !</b>
                                <?= session()->getFlashdata('error'); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" enctype="multipart/form-data" action="<?= site_url('admin/add-berita'); ?>">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Judul</label>
                                        <input type="text" id="last-name-column" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" placeholder="mahasiswa telkom donor darah" name="judul" value="<?= set_value('judul'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">lokasi</label>
                                        <input type="text" id="last-name-column" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" placeholder="lokasi berita" name="lokasi" value="<?= set_value('lokasi'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Gambar</label>
                                        <input type="file" id="last-name-column" class="form-control <?= ($validation->hasError('img')) ? 'is-invalid' : ''; ?>" name="img" value="<?= set_value('img'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('img'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Isi</label>
                                        <textarea type="text" id="last-name-colum" class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" placeholder="isi berita" name="isi" cols="60" rows="12" value="<?= set_value('isi'); ?>"></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('isi'); ?>
                                        </div>
                                        <!-- <textarea name="" va id="" cols="30" rows="10"></textarea> -->
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Sumber</label>
                                        <input type="text" id="last-name-colum" class="form-control <?= ($validation->hasError('sumber')) ? 'is-invalid' : ''; ?>" placeholder="link sumber" name="sumber" value="<?= set_value('sumber'); ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sumber'); ?>
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