<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Daftar Donor - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5 text col-5">
    <form class="card p-5" action="<?= site_url('jadwal-donor/daftar/') . $jadwal->id_jadwal; ?>" method="post">
        <div class="mx-auto">
            <h5>Pendaftaran Donor Darah</h5>
        </div>
        <?php if (session()->getFlashdata('gagal')) : ?>
            <div class="alert alert-danger alert-dismissible show fade mx-5">
                <div class="alert-body text-center">
                    <?= session()->getFlashdata('gagal'); ?>
                </div>
            </div>
        <?php endif; ?>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
            <input type="text" name="nama_depan" class="form-control" value="<?= userLogin()->nama_depan, ' ', userLogin()->nama_belakang; ?>" id="exampleInputEmail1" aria-describedby="emailHelp" readonly>
        </div>
        <input type="text" name="user_id" value="<?= userLogin()->id_user; ?>" hidden>
        <input type="text" name="jadwal_id" value="<?= $jadwal->id_jadwal; ?>" hidden>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Golongan Darah Anda</label>
            <input type="text" class="form-control" value="<?= userLogin()->goldar; ?>" id="exampleInputPassword1" readonly>
        </div>
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
            <input type="text" class="form-control" value="" name="riwayat" id="exampleInputPassword1">
            <div id="emailHelp" class="form-text">Masukan Jika Ada Riwayat Penyakit</div>
        </div>
        <div class="d-grid">
            <button type="submit" class="btn btn-primary">Daftar</button>
        </div>
    </form>
</div>
<?= $this->endSection(); ?>