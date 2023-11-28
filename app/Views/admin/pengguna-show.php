<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pengguna - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Pengguna Donor Tree</h3>
</div>
<div class="card">
    <div class="card-body">
        <div class="comment">
            <div class="comment-header">
                <div class="pr-50">
                    <div class="avatar avatar-2xl">
                        <img src="<?= base_url('assets/img/'), $user['img_profile']; ?>" alt="Avatar" style="width: 5rem; height: auto;">
                    </div>
                </div>
                <div class="comment-body">
                    <div class="comment-profileName">Nama Lengkap : <?= $user['nama_depan']; ?> <?= $user['nama_belakang']; ?> </div>
                    <div class="comment-profileName">Email : <?= $user['email']; ?> </div>
                    <!-- <div class="comment-profileName">Nomor: <?= $user['email']; ?> </div> -->
                    <div class="comment-profileName">Usia : <?= $user['usia']; ?> Tahun </div>
                    <div class="comment-profileName">Nik : <?= $user['nik']; ?> </div>
                    <div class="comment-profileName">Tempat Lahir : <?= $user['tempat_lahir']; ?> </div>
                    <div class="comment-profileName">Jenis kelamin : <?= $user['jenis_klamin']; ?> </div>

                    <div class="comment-actions">
                        <?php if ($user['active'] == 1) : ?>

                            <button data-bs-toggle="modal" data-bs-target="#nonaktif" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Non Aktifkan Pengguna</button>

                        <?php else : ?>

                            <button data-bs-toggle="modal" data-bs-target="#aktif" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Aktifkan Pennguna</button>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade text-left modal-borderless" id="nonaktif" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Logout</h5>
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
                <h5>Logout</h5>
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