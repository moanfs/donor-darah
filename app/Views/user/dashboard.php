<?= $this->extend('template/user') ?>
<!-- title -->
<?= $this->Section('title') ?>
<title>Beranda - Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="container text-center mt-5">
    <div class="row">
        <div class="col-6">
            <img src="assets/img/gambar1.png" height="500" alt="">
        </div>
        <div class="col-6">
            <p class="m-auto">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Enim modi mollitia nam eum obcaecati, commodi rem iusto. Veritatis laudantium voluptate magni, voluptatibus inventore perferendis similique rem nam modi, aut nihil voluptates eos, excepturi molestiae tempore adipisci incidunt sapiente aspernatur? Praesentium similique officia eum aut tempora ex ratione eaque, vitae fugiat.</p>
        </div>
    </div>
</div>

<div class="container">
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <a href="#" class="btn btn-primary">Go somewhere</a>
        </div>
    </div>
</div>

<div class="about">
    <h2>about us</h2>
    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Est atque itaque quas veritatis officiis debitis obcaecati! Optio odit dicta deleniti, officiis vel laboriosam quod, nemo officia alias ea quam iste.</p>
</div>
<?= $this->endSection(); ?>