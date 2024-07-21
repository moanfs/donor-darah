<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pendaftar - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Kegiatan Donor Darah</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Pendaftar Jadwal</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<section class="section">
    <div class="page-content">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Kegiatan Donor Darah</h4>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="pdaftar">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Lokasi </th>
                                    <th scope="col">Tanggal Kegiatan</th>
                                    <th scope="col">Jam Kegiatan</th>
                                    <th scope="col">Jumlah Pendaftar</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['lokasi']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($value['date'])) ?></td>
                                        <td><?= $value['time'] . ' - ' . $value['time_end']; ?> WIB</td>
                                        <td><?= $value['jadwal_id']; ?> Orang</td>
                                        <td><a href="<?= site_url('admin/pendaftar-donor/') . $value['id_jadwal']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a></td>
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
<script>
    $(document).ready(function() {
        var table = $('#pdaftar').DataTable({
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