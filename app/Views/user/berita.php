<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Berita - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5 text">
    <div class="row">
        <?php foreach ($berita as $key => $value) : ?>
            <div class="row col-12">
                <div class="col-sm-6 col-md-4">
                    <div class="w-75 mb-4">
                        <img src="<?= base_url(); ?>/assets/berita/<?= $value['img']; ?>" alt="" class="img-fluid">
                    </div>
                </div>
                <div class="col-sm-6 col-md-8">
                    <h5><?= $value['judul']; ?></h5>
                    <span><?= $value['lokasi']; ?></span>
                    <p> <?php echo (str_word_count($value['isi']) > 10 ? substr($value['isi'], 0, 200) : $value['isi']) ?> <a href="<?= site_url('berita/') . $value['id_berita'] . '/' . $value['slug']; ?>" class="">Baca selengkapnya....</a></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?= $this->endSection(); ?>