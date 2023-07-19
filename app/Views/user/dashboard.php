<?= $this->extend('template/user') ?>
<!-- title -->
<?= $this->Section('title') ?>
<title>Donortree</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="container mt-5" id="beranda">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <img class="img-fluid" src="assets/img/gambar1.png" alt="brand">
            <!-- <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img src="assets/img/gambar1.png" class="d-block w-100" alt="gambar1.png">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/berita.jpg" class="d-block w-100" alt="gambar1.png">
                    </div>
                    <div class="carousel-item">
                        <img src="assets/img/donor.jpg" class="d-block w-100" alt="gambar1.png">
                    </div>
                </div>
            </div> -->
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
        <div class="table-responsive border shadow-sm rounded p-3">
            <table class="table table-hover" id="myTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Golongan Darah</th>
                        <th scope="col">Jumlah</th>
                        <th scope="col">Provinsi</th>
                        <th scope="col">Kab/Kota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($stok as $key => $value) : ?>
                        <tr>
                            <td><?= $key + 1; ?></td>
                            <td><?= $value['goldar']; ?></td>
                            <td><?= $value['jumlah']; ?></td>
                            <td><?= $value['kab_kota']; ?></td>
                            <td><?= $value['provinsi']; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="container mt-5" id="berita">
    <div class="berita">
        <p class="font-monospace text-center text-danger">&mdash;&mdash; Berita</p>
        <h2 class="text-center">Berita Donortree</h2>
        <div class="clearfix">
            <?php foreach ($berita as $key => $value) : ?>
                <img src="assets/berita/<?= $value['img']; ?>" class="col-md-6 rounded float-md-end mb-3 ms-md-3" width="200rem" alt="berita">
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
        Jika Anda memiliki pertanyaan atau saran tentang Kebijakan Privasi kami, jangan ragu untuk menghubungi kami di donortree@gmail.com
    </div>
</div>
<?= $this->endSection(); ?>