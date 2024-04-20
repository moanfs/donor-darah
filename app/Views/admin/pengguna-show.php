<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pengguna - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data Pengguna Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/pengguna'); ?>">Tabel Pengguna</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pengguna</li>
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
                            <img src="<?= base_url('assets/img/'), $user['img_profile']; ?>" alt="Avatar" style="width: 15rem; height: auto;">
                        </div>
                    </div>
                </div>
                <div class="comment-actions mx-auto mb-2">
                    <?php if ($user['active'] == 1) : ?>
                        <button data-bs-toggle="modal" data-bs-target="#nonaktif" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Non Aktifkan Pengguna</button>
                    <?php else : ?>
                        <button data-bs-toggle="modal" data-bs-target="#aktif" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Aktifkan Pennguna</button>
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
                                    <p class="col">: <?= $user['nama_depan']; ?> <?= $user['nama_belakang']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Email</p>
                                    <p class="col">: <?= $user['email']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Usia</p>
                                    <p class="col">: <?= $user['usia']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Golongan Darah</p>
                                    <p class="col">: <?= $user['goldar']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Nik</p>
                                    <p class="col">: <?= $user['nik']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Tempat Lahir</p>
                                    <p class="col">: <?= $user['tempat_lahir']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Jenis kelamin</p>
                                    <p class="col">: <?= $user['jenis_klamin']; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Tanggal Bergabung</p>
                                    <p class="col">: <?= date('d-m-Y', strtotime($user['created_at'])) ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal -->
<div class="modal fade text-left modal-borderless" id="nonaktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Non Aktif!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin Ingin ingin non aktifkan pengguna !!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/pengguna/edit/') . $user['id_user']; ?>" method="post">
                    <input type="hidden" name="active" id="" value="1">
                    <button type="submit" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Non Aktif</button>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade text-left modal-borderless" id="aktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Aktif!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin ingin aktifkan pengguna!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/pengguna/edit/') . $user['id_user']; ?>" method="post">
                    <input type="hidden" name="active" id="" value="0">
                    <button type="submit" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Aktif</button>
                </form>
            </div>
        </div>
    </div>
</div>
</section>

<?= $this->endSection(); ?>