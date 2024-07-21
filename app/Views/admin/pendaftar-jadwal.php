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
                <h3>Peserta Donor </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/pendaftar-donor'); ?>">Tabel Pendaftar Jadwal</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Peserta</li>
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
                    <div class="card-header col-sm-12 ">
                        <h4 class="card-title">Tabel Peserta Donor Pada <?= $pmi->nama_pmi ?></h4>
                        <p>Lokasi Kegiatan <?= $pmi->alamat_kegiatan ?> </p>
                        <p>Pada Tanggal <?= date('d-m-Y', strtotime($pmi->date)); ?></p>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="tdaftar">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Peserta </th>
                                    <th scope="col">Golongan Darah</th>
                                    <th scope="col">Riwayat Penyakit</th>
                                    <th scope="col">Nomor Peserta</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($pendaftar as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_depan'] . ' ' . $value['nama_belakang'] ?></td>
                                        <td><?= $value['goldar']; ?></td>
                                        <td><?= $value['riwayat']; ?></td>
                                        <td><?= $value['nomor']; ?></td>
                                        <?php if ($value['status'] == 0) : ?>
                                            <td>Belum Donor</td>
                                        <?php elseif ($value['status'] == 1) : ?>
                                            <td>Sudah Donor</td>
                                        <?php else : ?>
                                            <td>Tidak Hadir</td>
                                        <?php endif; ?>
                                        <td>
                                            <a href="<?= site_url('admin/pendaftar-donor/peserta/') . $value['id_daftar']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
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
<script>
    $(document).ready(function() {
        var table = $('#tdaftar').DataTable({
            language: {
                searchPlaceholder: "Nama Peserta"
            },
            // Konfigurasi lainnya
        });

        $('input').on('keyup', function() {
            table.column(1).search(this.value).draw();
        });
    });
</script>
<?= $this->endSection(); ?>