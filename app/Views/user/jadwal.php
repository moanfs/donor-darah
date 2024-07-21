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
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Penyelenggara</th>
                            <th scope="col">Lokasi Kegiatan</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Golongan Darah Yang Dibutuhkan</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Jam Kegiatan</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['nama_pmi']; ?></td>
                                <td><?= $value['lokasi']; ?></td>
                                <td><?= $value['alamat']; ?></td>
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
<script>
    $(document).ready(function() {
        var table = $('#uJadwal').DataTable({
            language: {
                searchPlaceholder: "Lokasi Kegiatan"
            },
            // Konfigurasi lainnya
        });

        $('input').on('keyup', function() {
            table.column(1).search(this.value).draw();
        });
    });
</script>
<?= $this->endSection(); ?>