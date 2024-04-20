<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Berita - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5 text">
    <div class="row">
        <div class="col-md-8">
            <div class="w-50 m-auto">
                <img src="<?= base_url(); ?>/assets/berita/<?= $berita->img; ?>" class="img-fluid mb-5" alt="berita">
            </div>
            <h5><?= $berita->judul; ?></h5>
            <span><?= $berita->lokasi; ?></span>
            <p><?= $berita->isi; ?></p>
            <span>sumber : <?= $berita->sumber; ?></span>
        </div>
        <div class="col-md-4 ">
            <?php foreach ($beritalain as $key => $value) : ?>
                <div class="row col-12">
                    <div class="col-md-5 col-sm-6 ">
                        <div class="w-50">
                            <img src="<?= base_url(); ?>/assets/berita/<?= $value['img']; ?>" alt="" class="img-fluid" style="max-width: 10rem;">
                        </div>
                    </div>
                    <div class="col-md-7 col-sm-6">
                        <h5><?= $value['judul'];  ?></h5>
                        <p><?= (str_word_count($value['isi']) > 10 ? substr($value['isi'], 0, 50) : $value['isi']) ?> <a href="<?= site_url('berita/' . $value['id_berita'] . '/' . $value['slug']); ?>">Baca Selengkapya...</a></p>

                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>