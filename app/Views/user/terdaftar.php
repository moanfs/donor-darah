<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Jadwal - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-4">
    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-header text-center">Jadwal Donor Yang Sudah Didaftar</h4>
        </div>
        <div class="card-body m-2">
            <div class="table-responsive">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-info alert-dismissible show fade mx-5">
                        <div class="alert-body text-center">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php endif; ?>

                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nomor Pendaftaran</th>
                            <th scope="col">Tanggal Kegiatan</th>
                            <th scope="col">Jam Kegiatan</th>
                            <th scope="col">Status Kegiatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['lokasi']; ?></td>
                                <td><?= $value['nomor']; ?></td>
                                <td><?= date("d-m-Y", strtotime($value['date'])) ?></td>
                                <td><?= $value['time'] . '-' . $value['time_end']; ?> WIB</td>
                                <?php if ($value['status'] == 1) : ?>
                                    <td>Sudah Donor</td>
                                <?php elseif ($value['status'] == 2) : ?>
                                    <td>Sakit "Tidak Bisa Donor"</td>
                                <?php else : ?>
                                    <td>Tidak/Belum Hadir</td>
                                <?php endif; ?>

                                <td><a href="<?= site_url('jadwal-donor/terdaftar/') . $value['id_daftar']; ?>" class="btn btn-sm btn-primary"><i class="bi bi-pencil-square"></i></a></td>
                            </tr>
                        <?php endforeach; ?>

                </table>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>