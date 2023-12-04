<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pendaftar - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Pendaftar Donor Tree</h3>
</div>
<div class="page-content">
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Pendaftar Kegiatan Donor</h4>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pendaftar</th>
                                    <th scope="col">Nama Kegiatan</th>
                                    <th scope="col">Lokasi </th>
                                    <th scope="col">Tanggal Kegiatan </th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_depan']; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['lokasi']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
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