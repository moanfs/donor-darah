<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Berita - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Berita Donor Tree</h3>
</div>
<?php if (session()->getFlashdata('message')) : ?>
    <div class="alert alert-info alert-dismissible show fade mx-5">
        <div class="alert-body text-center">
            <?= session()->getFlashdata('message'); ?>
        </div>
    </div>
<?php endif; ?>
<div class="page-content">
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Berita</h4>
                        <a href="<?= site_url('admin/form-berita'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Berita</a>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">lokasi</th>
                                    <th scope="col">Upload At</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($berita as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['judul']; ?></td>
                                        <td><?= $value['lokasi']; ?></td>
                                        <td><?= $value['created_at']; ?></td>
                                        <td class="col">
                                            <a href="<?= site_url('admin/berita/edit/') . $value['id_berita']; ?>" class="btn btn-info"><i class="bi bi-pencil"></i></a>
                                            <button data-bs-toggle="modal" data-bs-target="#delete" class="btn icon icon-left btn-danger text-nowrap"><i class="bi bi-trash"></i></button>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>

<div class="modal fade text-left modal-borderless" id="delete" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Logout</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin ingin hapus berita!!</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/berita/delete/') . $value['id_berita']; ?>" method="post">
                    <button type="submit" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>