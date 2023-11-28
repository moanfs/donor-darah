<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pengguna - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Stok Darah Donor Tree</h3>
</div>
<div class="card">
    <div class="card-body">
        <div class="comment">
            <div class="comment-header">
                <div class="comment-body">
                    <div class="comment-profileName">Golongan Darah : <?= $darah['goldar']; ?> </div>
                    <div class="comment-profileName">Stok Darah : <?= $darah['jumlah']; ?> </div>

                </div>
            </div>
        </div>
    </div>
</div>
</section>

<?= $this->endSection(); ?>