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
                <li class="list-group-item">Nama : <?= $profile->nama_depan; ?></li>
                <li class="list-group-item"><span>Marga</span> : <?= $profile->nama_belakang; ?></li>
                <li class="list-group-item"><span>Nik </span> : <?= $profile->nik; ?></li>
                <li class="list-group-item">A fourth item</li>
                <li class="list-group-item">And a fifth one</li>
            </ul>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>