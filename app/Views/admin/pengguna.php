<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pengguna - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Pengguna Donor Tree</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Tabel Pengguna</h4>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Gol Darah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_depan']; ?> <?= $value['nama_belakang']; ?></td>
                                        <td><?= $value['usia']; ?></td>
                                        <td><?= $value['jenis_klamin']; ?></td>
                                        <td><?= $value['goldar']; ?></td>
                                        <td><?php if ($value['active'] == 1) : ?>
                                                <p>Aktif</p>
                                            <?php else : ?>
                                                <p>Tidak Aktif</p>
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?= site_url('admin/pengguna/show/') . $value['id_user']; ?>">Lihat</a></td>
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