<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Jadwal Donor Tree</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Jadwal</h4>
                        <a href="<?= site_url('admin/form-jadwal'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> jadwal Donor</a>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible show fade mx-5">
                                <div class="alert-body text-center">
                                    <?= session()->getFlashdata('message'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tanggal</th>
                                    <th scope="col">Waktu</th>
                                    <th scope="col">lokasi</th>
                                    <th scope="col">Kota/Kab</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['date']; ?></td>
                                        <td><?= $value['time']; ?></td>
                                        <td><?= $value['lokasi']; ?></td>
                                        <td><?= $value['name']; ?></td>
                                        <td><a href="<?= base_url('admin/edit-jadwal/' . $value['id_jadwal']); ?>" class="btn btn-info"><i class="bi bi-pencil"></i></a></td>
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