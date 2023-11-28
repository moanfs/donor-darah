<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Profile - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5">
    <div class="row col-12">
        <div class="col-sm-4 col-md-4 ">
            <img src="<?= base_url(); ?>/assets/img/<?= $profile->img_profile; ?>" alt="<?= $profile->nama_depan; ?>" class="img-fluid rounded shadow-sm">
        </div>
        <div class="col-sm-4 col-md-8 card shadow-sm p-4">
            <h5>Profil pengguna</h5>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Nama Depan : <?= $profile->nama_depan; ?></li>
                <li class="list-group-item"><span>Nama Belakang</span> : <?= $profile->nama_belakang; ?></li>
                <li class="list-group-item"><span>Email </span> : <?= $profile->email; ?></li>
                <li class="list-group-item"><span>Nik Anda </span> : <?= $profile->nik; ?></li>
                <li class="list-group-item"><span>Golongan Darah </span> : <?= $profile->goldar; ?></li>
                <li class="list-group-item"><span>Jenis Kelamin </span> : <?= $profile->jenis_klamin; ?></li>
                <li class="list-group-item"><span>Tanggal Lahir </span> : <?= date('d-m-Y', strtotime($profile->tanggal_lahir)) ?></li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>