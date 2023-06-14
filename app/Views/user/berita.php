<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Berita - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-5 text">
    <div class="row">
        <div class="col-sm-5 col-md-7">
            <img src="assets/img/donor.jpg" class="img-fluid" alt="berita">
            <h5>DOKTERMUDA FK UNS SUSUR KAMPUNG</h5>
            <span>UDD PMI Kota Surakarta | 30 Jul 22</span>
            <p>
                Bersama doktermuda Fakultas Kedokteran UNS dan relawan Siaga Bencana Berbasis Masyarakat kembali melakukan susur kampung 29/07/2022 jumat pagi di kelurahan Semanggi RW 11 Surakarta. Total 77 warga menerima pelayanan pemeriksaan kesehatan, 48 warga diantaranya mendapatkan terapi berupa obat, dan memastikan warga yang lainnya sudah terkontrol rutin baik ke Puskesmas, klinik atau rumah sakit yang ditunjuk sebagai fasilitas pertama.
            </p>
            <span>sumber :</span>
        </div>
        <div class="col-sm-5 col-md-5">
            <div class="row">
                <div class="w-50">
                    <img src="assets/img/berita.jpg" alt="" class="img-fluid" style="max-width: 12rem;">
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>