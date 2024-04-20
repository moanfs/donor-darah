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
                <h3>Form Edit Berita Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/berita'); ?>">Berita</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Berita</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
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
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Berita</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" enctype="multipart/form-data" action="<?= site_url('admin/berita/edit/') . $berita['id_berita']; ?>">
                            <div class="row">
                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Judul</label>
                                        <input type="text" id="last-name-column" class="form-control <?= ($validation->hasError('judul')) ? 'is-invalid' : ''; ?>" placeholder="mahasiswa telkom donor darah" name="judul" value="<?= $berita['judul'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('judul'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">lokasi</label>
                                        <input type="text" id="last-name-column" class="form-control <?= ($validation->hasError('lokasi')) ? 'is-invalid' : ''; ?>" placeholder="lokasi berita" name="lokasi" value="<?= $berita['lokasi']  ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('lokasi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <!-- <div class="col-md-6 col-12"> -->
                                    <img src="<?= base_url('assets/berita/') . $berita['img']; ?>" alt="" style="width: 20rem;">
                                    <!-- </div> -->
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Gambar</label>
                                        <input type="file" id="last-name-column" class="form-control <?= ($validation->hasError('img')) ? 'is-invalid' : ''; ?>" name="img">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('img'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Isi</label>
                                        <textarea type="text" id="last-name-colum" class="form-control <?= ($validation->hasError('isi')) ? 'is-invalid' : ''; ?>" placeholder="isi berita" name="isi" cols="60" rows="12"><?= $berita['isi']  ?></textarea>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('isi'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Sumber</label>
                                        <input type="text" id="last-name-colum" class="form-control <?= ($validation->hasError('sumber')) ? 'is-invalid' : ''; ?>" placeholder="link sumber" name="sumber" value="<?= $berita['sumber']  ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('sumber'); ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="<?= site_url('admin/berita'); ?>" class="btn btn-success me-1 mb-1">Daftar Berita Lain</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">Edit Berita</button>
                                    <a data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger me-1 mb-1">Hapus Berita</a>
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
                <h4 class="text-center">Anda yakin ingin hapus Berita!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/berita/delete/') . $berita['id_berita'] ?>" method="post">
                    <button type="submit" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>