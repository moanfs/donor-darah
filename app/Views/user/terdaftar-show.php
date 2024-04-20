<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Daftar Donor - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5 text col-md-6 col-sm-12">
    <form class="card p-5" action="<?= site_url('jadwal-donor/terdaftar/lihat/') . $jadwal->id_daftar; ?>" method="post">
        <div class="mx-auto">
            <h5>Jadwal Yang Didaftar</h5>
        </div>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Golongan Darah Yang Dapat Melakukan Donor</label>
            <?php $pilihan = unserialize($jadwal->jenis_darah); ?>
            <?php if (count($pilihan) <= 7) : ?>
                <input type="text" class="form-control" value="<?= $pilihanString = implode(', ', $pilihan); ?>" id="exampleInputPassword1" readonly>
            <?php else : ?>
                <input type="text" class="form-control" value="Semua Golongan Darah" id="exampleInputPassword1" readonly>
            <?php endif; ?>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Lokasi Kegiatan</label>
            <input type="text" class="form-control" value="<?= $jadwal->lokasi ?>" id="exampleInputPassword1" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Alamat Kegiatan</label>
            <input type="text" class="form-control" value="<?= $jadwal->alamat_kegiatan; ?>" id="exampleInputPassword1" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Tanggal Kegiatan</label>
            <input type="text" class="form-control" value="<?= $jadwal->date; ?>" id="exampleInputPassword1" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Jam Kegiatan</label>
            <input type="text" class="form-control" value="<?= $jadwal->time . ' - ' . $jadwal->time_end; ?> WIB" id="exampleInputPassword1" readonly>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Riwayat Penyakit</label>
            <input type="text" class="form-control" value="<?= $jadwal->riwayat; ?>" name="riwayat" id="exampleInputPassword1">
            <div id="emailHelp" class="form-text">Masukan Jika Ada Riwayat Penyakit</div>
        </div>
        <div class="d-grid">
            <?php $batas_bawah =  strtotime($jadwal->date . ' ' . $jadwal->time) ?>
            <?php $batas_atas =  strtotime($jadwal->date . ' ' . $jadwal->time_end) ?>
            <?php if ($batas_bawah <= time()) : ?>
                <a class="btn btn-info">Kegiatan Sudah Selesai</a>
            <?php else : ?>
                <button type="submit" class="btn btn-primary mb-1">Edit</button>
                <a data-bs-toggle="modal" data-bs-target="#hapus" class="btn btn-danger">Batalkan Mendaftar</a>
            <?php endif; ?>
        </div>
    </form>
</div>

<!-- Modal -->
<div class="modal fade" id="hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Hapus</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                Apakah Anda Yakin Ingin menghapus Pendaftaran ini?
            </div>
            <div class="modal-footer">
                <form action="<?= site_url('jadwal-donor/terdaftar/hapus/' . $jadwal->id_daftar); ?>" method="post">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-danger">Hapus</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>