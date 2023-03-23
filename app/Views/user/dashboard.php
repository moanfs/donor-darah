<?= $this->extend('template/user') ?>
<!-- title -->
<?= $this->Section('title') ?>
<title>Beranda - Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="container mt-5">
    <div class="row">
        <div class="col-sm-6 col-md-6">
            <img class="img-fluid" src="assets/img/gambar1.png" alt="">
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-5 m-auto">
            <h4>Langka Kecil Untuk Memberi</h4>
            <h2>Dampak Besar</h2>
            <p>Ayo donor darah sekarang dan berikan dampak yang besar bagi yang membutuhkan</p>
            <a href="#" class="btn btn-danger rounded-4">DONATE NOW</a>
        </div>
    </div>
</div>

<div class="container mt-5">
    <div class="card text-bg-danger rounded-5">
        <div class="card-body ">
            <div class="row text-center p-3">
                <div class="col-sm-4 col-md-4">
                    <h5>Donor</h5>
                    <h1>20.000</h1>
                </div>

                <div class="col-sm-4 col-md-4">
                    <h5>People needed</h5>
                    <h1>10.000</h1>
                </div>

                <div class="col-sm-4 col-md-4">
                    <h5>People saved</h5>
                    <h1>90.000</h1>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="about">
    <h2>about us</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est atque itaque quas veritatis officiis debitis obcaecati! Optio odit dicta deleniti, officiis vel laboriosam quod, nemo officia alias ea quam iste.</p>
</div>
<?= $this->endSection(); ?>