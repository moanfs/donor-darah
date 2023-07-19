<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Berita - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Berita Donor Tree</h3>
</div>
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
                                        <td><a href="<?= site_url('admin/edit-berita/') . $value['slug']; ?>" class="btn btn-info">edit</a></td>
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
<?= $this->endSection(); ?>