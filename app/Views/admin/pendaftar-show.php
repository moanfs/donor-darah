<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pengguna - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Peserta Donor Darah </h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active" aria-current="page"><a href="<?= site_url('admin/pendaftar-donor') ?>">Tabel Pendaftar Jadwal</a></li>
                        <li class="breadcrumb-item"><a href="<?= site_url('admin/pendaftar-donor/' . $peserta->id_jadwal) ?>">Tabel Peserta</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Pendonor</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<section>
    <div class="row match-height">
        <?php if (session()->getFlashdata('errors')) : ?>
            <div class="alert alert-danger alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('errors'); ?>
                </div>
            </div>
        <?php endif; ?>

        <div class="col-12 col-md-8">
            <div class="card">
                <div class="card-body">
                    <div class="comment">
                        <div class="comment-header">
                            <div class="comment-body">
                                <div class="row g-2 ">
                                    <p class="col-2">Nama Lengkap</p>
                                    <p class="col">: <?= $peserta->nama_depan; ?> <?= $peserta->nama_belakang; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Usia</p>
                                    <p class="col">: <?= $peserta->usia; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Golongan Darah</p>
                                    <p class="col">: <?= $peserta->goldar; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Riwayat Penyakit</p>
                                    <p class="col">: <?= $peserta->riwayat; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Jenis kelamin</p>
                                    <p class="col">: <?= $peserta->jenis_klamin; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Lokasi Kegiatan</p>
                                    <p class="col">: <?= $peserta->lokasi; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Nomor Peserta</p>
                                    <p class="col">: <?= $peserta->nomor; ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Waktu Donor</p>
                                    <p class="col">: <?= date('d-m-Y', strtotime($peserta->date)); ?></p>
                                </div>
                                <div class="row g-2 ">
                                    <p class="col-2">Tanggal Donor</p>
                                    <p class="col">: <?= $peserta->time . '-' . $peserta->time_end; ?>WIB</p>
                                </div>
                                <?php if ($peserta->status == 0) : ?>
                                    <!-- untuk merubah status donor batal -->
                                    <form action="<?= site_url('admin/pendaftar-donor/batal/' . $peserta->id_daftar); ?>" method="post">
                                        <div class="row g-3">
                                            <p class="col-3"><button class="btn btn-success">Donor Tidak Bisa Dilakukan</button></p>
                                            <p class="col"><input type="text" name="keterangan" class="form-control" placeholder="Alasan Tidak bisa Donor"></p>
                                        </div>
                                    </form>
                                    <!-- untuk merubah status donor selesai -->
                                    <form action="<?= site_url('admin/pendaftar-donor/selesai/' . $peserta->id_daftar); ?>" method="post">
                                        <div class="row g-3 ">
                                            <p class="col-3"><button class="btn btn-primary">Donor Telah Selesai</button></p>
                                            <!-- <p class="col-3">Jumlah Darah Yang Diperoleh</p>
                                            <p class="col"><input type="number" name="jumlah" class="form-control"></p> -->
                                        </div>
                                    </form>
                                <?php else : ?>
                                    <!-- menampilkan informasi status donor -->
                                    <?php if ($peserta->status == 1) : ?>
                                        <div class="row g-2 ">
                                            <p class="col-2">Status</p>
                                            <p class="col">: Selesai Donor</p>
                                        </div>
                                    <?php elseif ($peserta->status == 2) : ?>
                                        <div class="row g-2 ">
                                            <p class="col-2">Status</p>
                                            <p class="col">: Gagal Melakukan Donor dikarenakan <?= $peserta->keterangan ?></p>
                                        </div>
                                    <?php elseif ($peserta->status == 3) : ?>
                                        <div class="row g-2 ">
                                            <p class="col-2">Status</p>
                                            <p class="col">: Peserta Tidak Hadir</p>
                                        </div>
                                    <?php endif; ?>

                                <?php endif; ?>
                                <div class="row g-2">
                                    <?php if ($peserta->status == 0) : ?>
                                        <p> <button data-bs-toggle="modal" data-bs-target="#absen" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Peserta Tidak Hadir</button></p>
                                    <?php elseif ($peserta->status == 3) : ?>
                                        <p><button data-bs-toggle="modal" data-bs-target="#hadir" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Peserta Telah Hadir</button></p>
                                    <?php else : ?>
                                        <p><?= $peserta->nama_depan; ?> <?= $peserta->nama_belakang; ?></p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- profile -->
        <div class="col-12 col-md-4">
            <div class="card ">
                <div class="card-body m-auto">
                    <div class="pr-50">
                        <div class="avatar avatar-2xl">
                            <img src="<?= base_url('assets/img/'), $peserta->img_profile; ?>" alt="Avatar" style="width: 15rem; height: auto;">
                        </div>
                    </div>
                </div>
                <!-- <div class="comment-actions mx-auto mb-2">

            </div> -->
            </div>
        </div>
    </div>

</section>

<!-- modal konfirmasi peserta tidak hadir -->
<div class="modal fade text-left modal-borderless" id="absen" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Tidak Hadir!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Apakah Peserta Donor Tidak Hadir?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/pendaftar-donor/absen/') . $peserta->id_daftar; ?>" method="post">
                    <input type="hidden" name="status" id="" value="3">
                    <button type="submit" class="btn icon icon-left btn-danger me-2 text-nowrap"><i class="bi bi-x-circle"></i> Tidak Hadir</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal konfirmasi peserta hadir kembali -->
<div class="modal fade text-left modal-borderless" id="hadir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5>Hadir Kembali!!</h5>
                <button type="button" class="close rounded-pill" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <h4 class="text-center">Anda yakin ingin Peserta Telah Hadir?</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-primary" data-bs-dismiss="modal">
                    <i class="bx bx-x d-block d-sm-none"></i>
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <form action="<?= site_url('admin/pendaftar-donor/absen/') . $peserta->id_daftar; ?>" method="post">
                    <input type="hidden" name="status" id="" value="0">
                    <button type="submit" class="btn icon icon-left btn-info me-2 text-nowrap"><i class="bi bi-x-circle"></i> Hadir</button>
                </form>
            </div>
        </div>
    </div>
</div>

<?= $this->endSection(); ?>