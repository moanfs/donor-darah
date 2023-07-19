<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Stok Darah - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Stok Darah Donor Tree</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Stok Darah</h4>
                        <a href="<?= site_url('admin/form-stok-darah'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> stok Darah</a>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Golongan Darah</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">Provinsi</th>
                                    <th scope="col">Kab/Kota</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($stok as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['goldar']; ?></td>
                                        <td><?= $value['jumlah']; ?></td>
                                        <td><?= $value['kab_kota']; ?></td>
                                        <td><?= $value['provinsi']; ?></td>
                                        <td><a href="#" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a></td>
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