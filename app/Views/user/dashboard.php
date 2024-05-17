<?= $this->extend('template/user') ?>
<!-- title -->
<?= $this->Section('title') ?>
<title>Donortree</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="container mt-5" id="beranda">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <img class="img-fluid" src="assets/img/sl_050622_50190_20.jpg" alt="brand">
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-5 m-auto">
            <h4>Langka Kecil Untuk Memberi</h4>
            <h2>Dampak Besar</h2>
            <p>Ayo donor darah sekarang dan berikan dampak yang besar bagi yang membutuhkan</p>
            <a href="<?= site_url('jadwal-donor'); ?>" class="btn btn-danger rounded-4 shadow btn-donate"><i class="bi bi-arrow-down-circle"></i> DONATE NOW</a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card text-bg-danger rounded-5">
        <div class="card-body ">
            <div class="row text-center p-3">
                <div class="col-sm-4 col-md-4">
                    <h5>Pendonor</h5>
                    <h1>20.000</h1>
                </div>

                <div class="col-sm-4 col-md-4">
                    <h5>Yang Membutuhkan</h5>
                    <h1>10.000</h1>
                </div>

                <div class="col-sm-4 col-md-4">
                    <h5>Yang terselamatkan</h5>
                    <h1>90.000</h1>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="about">
    <div class="about">
        <p class="font-monospace text-center text-danger">&mdash;&mdash; About Us</p>
        <h2 class="text-center mb-4">Ayo donor darah</h2>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <img class="img-fluid rounded" src="assets/img/donor.jpg" alt="donor darah">
            </div>
            <div class="col-sm-6 col-md-6">
                <h5>Pedulu pada sesama</h5>
                <p>
                    Rajin mendonorkan darah kira-kira mampu menurunkan risiko serangan jantung hingga 88 persen. Tak hanya itu, mendonorkan darah juga bisa meminimalkan risiko kanker, stroke, dan serangan jantung. Menariknya lagi, manfaat donor darah juga bisa membuat kadar zat besi dalam darah jadi stabil.
                    <br>
                    Selain membantu membakar kalori, manfaat donor darah bagi pendonor adalah dapat menurunkan risiko terjadinya kanker. Hal ini disebabkan oleh berkurangnya zat besi yang berlebih dalam tubuh saat melakukan donor darah. Donor darah secara teratur diketahui dapat menurunkan kekentalan darah.
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="stokdarah">
    <div class="stokdarah">
        <p class="font-monospace text-center text-danger">&mdash;&mdash; info PMI</p>
        <h2 class="text-center">Stok Darah</h2>
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <div class="table-responsive border shadow-sm rounded p-3">
                    <table class="table table-sm table-hover" id="">
                        <thead>
                            <tr class="text-center">
                                <th scope="col">Golongan Darah</th>
                                <th scope="col">Jumlah Darah</th>
                                <th scope="col">Tersedia Di</th>
                                <th scope="col">Detail</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($stok as $key => $value) : ?>
                                <tr class="text-center">
                                    <td><?= $value['goldar']; ?></td>
                                    <td><?= $value['jmlh']; ?> Kantong</td>
                                    <td><?= $value['pmi']; ?> PMI</td>
                                    <td><a href="<?= site_url('stok-darah/' . $value['slug']); ?>" class="btn btn-sm btn-primary"><i class="bi bi-eye"></i></a></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- <div class="col-md-5">
                <div>

                </div>
            </div> -->
        </div>
    </div>
</div>

<div class="container mt-5 mb-5" id="berita">
    <div class="berita">
        <p class="font-monospace text-center text-danger">&mdash;&mdash; Berita</p>
        <h2 class="text-center">Berita Donortree</h2>
        <div class="clearfix">
            <?php foreach ($berita as $key => $value) : ?>
                <img src="assets/berita/<?= $value['img']; ?>" class="col-md-6 col-sm-8 rounded float-md-end mb-3 ms-md-3" style="max-width: 30rem;" width="" alt="berita">
                <h5><?= $value['judul']; ?></h5>
                <span><?= $value['lokasi']; ?></span>
                <p><?= (str_word_count($value['isi']) > 30 ? substr($value['isi'], 0, 300) : $value['isi']) ?>
                    <a href="<?= site_url('berita/') . $value['id_berita'] . '/' . $value['slug']; ?>" class="">Baca selengkapnya....</a>
                </p>
            <?php endforeach ?>
        </div>
    </div>
    <div class="d-flex justify-content-end">
        <a href="<?= site_url('berita'); ?>" class="btn btn-primary fw-semibold">lihat berita lainya <i class="bi bi-chevron-double-right"></i></a>
    </div>
</div>

<div class="container mt-5" id="kontak">
    <div class="kontak">
        <p class="font-monospace text-center text-danger">&mdash;&mdash; Kontak Kami</p>
        <h2 class="text-center">Kontak Donortree</h2>
        <!-- <div class="d-flex justify-content-center"> -->
        <div class="row col-12">
            <div class="col-md-4 col-sm-6">
                <h6>Donortree</h6>
                <p><i class="bi bi-geo-alt"></i> Jl. Aceh No.79, Cihapit</p>
                <p><i class="bi bi-telephone-forward"></i> (022) 4207052</p>
                <p><i class="bi bi-envelope"></i> donortree@gmail.com</p>
            </div>
            <div class="col-md-4 col-sm-6">
                <h6>PMI Kota Bandung :</h6>
                <?php foreach ($pmi as $value) : ?>
                    <li><?= $value['nama_pmi'] ?></li>
                <?php endforeach; ?>
            </div>
            <div class="col-md-4 col-sm-12">
                <p class="text-md-end text-sm-center">Donortree merupakan website yang membantu pengguna untuk mendapatkan informasi jadwal donor darah, serta mendapatkan informasi mengenai stok darah yang tersedia di PMI Kota Bandung.</p>
            </div>
            <!-- </div> -->
        </div>
    </div>
</div>

<?= $this->endSection(); ?>