<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Jadwal - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5">
    <div class="card mt-5">
        <div class="card-body">
            <div class="text-center">
                <h5 class="card-title mb-3">Jadwal Donor Tersedia </h5>
            </div>
            <div class="form-group my-2">
                <label for="kecamatan">Filter Alamat :</label>
                <select id="kecamatan" class="form-control">
                    <option value="">Semua Kecamatan</option>
                    <?php foreach ($kecamatan as $kec) : ?>
                        <option value="<?= $kec['kecamatan']; ?>"><?= $kec['kecamatan']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="uJadwal">
                    <thead>
                        <tr>
                            <th scope="col">Penyelenggara</th>
                            <th scope="col">Alamat</th>
                            <!-- <th scope="col">Lokasi Kegiatan</th>
                            <th scope="col">Alamat</th> -->
                            <th scope="col">Golongan Darah Yang Dibutuhkan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Kegiatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $value) : ?>
                            <tr>
                                <td><?= $value['nama_pmi']; ?></td>
                                <!-- <td><?= $value['lokasi']; ?></td> -->
                                <td><?= $value['kecamatan']; ?></td>
                                <?php $pilihan = unserialize($value['jenis_darah']); ?>
                                <?php if (count($pilihan) <= 7) : ?>
                                    <td><?= $pilihanString = implode(', ', $pilihan); ?></td>
                                <?php else : ?>
                                    <td>Semua Golongan Darah</td>
                                <?php endif; ?>
                                <td><?= date("d-m-Y", strtotime($value['date'])) ?> </td>
                                <td><?= $value['time'] . ' - ' . $value['time_end'] ?> WIB</td>

                                <td><a href="<?= site_url('jadwal-donor/daftar/') . $value['id_jadwal'] ?>" class="btn btn-primary">Daftar</a></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>