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
                <h3>Stok Darah Dihapus</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/stok-darah'); ?>">Tabel Stok Darah</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Edit Stok Darah</li>
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
                    <h4 class="card-title">Kembalikan Stok Darah yang dihapus</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/stok-darah/edit/hapus/') . $darah['id_darah']; ?>">
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
                                        <label for="last-name-column" class="form-label">Golongan Darah</label>
                                        <input type="text" id="last-name-column" class="form-control " placeholder="jumlah kantong darah" name="jumlah" value="<?= $darah['goldar'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="col-md-6 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Jumlah kantong</label>
                                        <input type="number" id="last-name-column" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" placeholder="jumlah kantong darah" min="1" name="jumlah" value="<?= $darah['jumlah'] ?>" disabled>
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jumlah'); ?>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Nama PMI</label>
                                        <input type="text" id="last-name-column" class="form-control" name="nama_pmi" value="<?= $darah['nama_pmi'] ?>" disabled>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <a data-bs-toggle="modal" data-bs-target="#delete" class="btn btn-danger text-nowrap  me-1 mb-1">Batal Hapus</a>
                                    </div>
                                </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal hapus -->
    <div class="modal fade text-left modal-borderless" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5>Hapus Data!!</h5>
                    <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <h4 class="text-center">Anda yakin Ingin Mengembalikan Stok Darah Yang dihapus !!</h4>
                </div>
                <div class="modal-footer d-flex row">
                    <form action="<?= site_url('admin/stok-darah/edit/hapus/') . $darah['id_darah']; ?>" method="post">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Iya</button>
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


</section>


<?= $this->endSection(); ?>