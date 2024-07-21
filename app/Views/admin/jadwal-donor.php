<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Jadwal Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Jadwal Donor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<div class="page-content">
    <section class="section">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Jadwal Donor</h4>
                        <a href="<?= site_url('admin/form-jadwal'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> jadwal Donor </a>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <!-- untuk menampilkan pesan hapus atau tambah -->
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible show fade mx-5">
                                <div class="alert-body text-center">
                                    <?= session()->getFlashdata('message'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <table class="table mb-0" id="jadwal">
                            <!-- <div class="col-3 d-flex justify-content-end">
                                <input type="text" class="form-control" id="namaSearch" placeholder="Cari Alamat">
                            </div> -->
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">PMI Penyelenggara</th>
                                    <th scope="col">Alamat Kegiatan</th>
                                    <th scope="col">Tanggal Kegiatan</th>
                                    <th scope="col">Golongan Darah Yang Bisa Donor</th>
                                    <th scope="col">Jam Kegiatan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($jadwal as $key => $value) : ?>
                                    <!-- kondisi untuk menampilkan data sesuai pmi yg login -->
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_pmi']; ?></td>
                                        <td><?= $value['alamat_kegiatan']; ?></td>
                                        <td><?= date("d-m-Y", strtotime($value['date'])); ?></td>
                                        <?php $pilihan = unserialize($value['jenis_darah']); ?>

                                        <?php if (count($pilihan) <= 7) : ?>
                                            <td><?= $pilihanString = implode(', ', $pilihan); ?></td>
                                        <?php else : ?>
                                            <td>Semua Golongan Darah</td>
                                        <?php endif; ?>
                                        <td><?= $value['time'] . ' - ' . $value['time_end'] ?> WIB </td>

                                        <?php if (date("d-m-Y", strtotime($value['date'])) < date('d-m-Y')) : ?>
                                            <td>Kegiatan Selesai</td>
                                        <?php else : ?>
                                            <td>Belum Berlangsung</td>
                                        <?php endif; ?>

                                        <td>
                                            <a href="<?= base_url('admin/edit-jadwal/' . $value['id_jadwal']); ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<script>
    $(document).ready(function() {
        var table = $('#jadwal').DataTable({
            language: {
                searchPlaceholder: "Cari Pmi Penyelenggara"
            },
            // Konfigurasi lainnya
        });

        $('input').on('keyup', function() {
            table.column(1).search(this.value).draw();
        });
    });
</script>
<?= $this->endSection(); ?>