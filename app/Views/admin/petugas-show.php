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
                <h3>Data Petugas Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/petugas'); ?>">Tabel Petugas</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Lihat Petugas</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<section>
    <div class="row match-height">
        <div class="col-12 col-md-4">
            <div class="card ">
                <div class="card-body m-auto">
                    <div class="pr-50">
                        <div class="avatar avatar-2xl">
                            <img src="<?= base_url('assets/img/'), $petugas['img_profile']; ?>" alt="Avatar" style="width: 15rem; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="comment-actions mx-auto mb-2">
                    <?php if ($petugas['active'] == 1) : ?>
                        <button data-bs-toggle="modal" data-bs-target="#nonaktif" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Non Aktifkan Akun Petugas</button>
                    <?php else : ?>
                        <button data-bs-toggle="modal" data-bs-target="#aktif" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Memulihkan Petugas PMI</button>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="comment">
                        <div class="comment-header">

                            <div class="comment-body">
                                <div class="row g-2 ">
                                    <p class="col-2">Nama Lengkap</p>
                                    <p class="col">: <?= $petugas['nama']; ?> </p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Email</p>
                                    <p class="col">: <?= $petugas['email']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Phone</p>
                                    <p class="col">: <?= $petugas['phone']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Tugas PMI</p>
                                    <p class="col">: <?= $petugas['nama_pmi']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Tanggal Bergabung</p>
                                    <p class="col">: <?= date('d-m-Y', strtotime($petugas['created_at'])) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal untuk mematikan akun petugas-->
<div class="modal fade text-left modal-borderless" id="nonaktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Matikan!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin Ingin ingin Mematikan Akun Petugas PMI !!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/petugas/delete/') . $petugas['id_admin']; ?>" method="post">
                    <input type="hidden" name="active" id="" value="1">
                    <button type="submit" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Non Aktifkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal untuk memulihkan akun petugas -->
<div class="modal fade text-left modal-borderless" id="aktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Memulihkan!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin ingin Memulihkan Akun Petugas PMI!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/petugas/delete/') . $petugas['id_admin']; ?>" method="post">
                    <input type="hidden" name="active" id="" value="0">
                    <button type="submit" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Aktifkan</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

<?= $this->endSection(); ?>