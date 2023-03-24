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
        </div>
        <div class="col-sm-5 offset-sm-2 col-md-5 m-auto">
            <h4>Langka Kecil Untuk Memberi</h4>
            <h2>Dampak Besar</h2>
            <p>Ayo donor darah sekarang dan berikan dampak yang besar bagi yang membutuhkan</p>
            <a href="#" class="btn btn-danger rounded-4 shadow btn-donate">DONATE NOW</a>
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

<div class="container mt-5" id="about">
    <div class="about">
        <h2>About Us</h2>
        <div class="row">
            <div class="col-sm-6 col-md-6">
                <img class="img-fluid rounded" src="assets/img/donor.jpg" alt="donor darah">
            </div>
            <div class="col-sm-6 col-md-6">
                <h5>Ayo Donor Darah</h5>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, minus laboriosam? Sed sequi explicabo tenetur laborum nemo consequuntur dignissimos fuga blanditiis. Cupiditate rem laborum soluta doloribus quo. Ex nesciunt, minima commodi accusantium exercitationem ipsum nostrum et eius suscipit illo eaque.
                    Lorem ipsum dolor sit amet consectetur, adipisicing elit. Excepturi, error eos. Minus, numquam! Dolorum eveniet provident optio, impedit aliquam cumque ut facere blanditiis. Consectetur magnam explicabo illum quos dolorum quibusdam assumenda maiores quo sit, neque totam magni, est eum quas?
                </p>
            </div>
        </div>
    </div>
</div>

<div class="container mt-5" id="stokdarah">
    <div class="stokdarah">
        <h2 class="text-center">Stok Darah</h2>
        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia sapiente nisi consequatur quidem rem deleniti provident nemo dolores temporibus ipsa, non eum eaque. Rerum, voluptas! Lorem ipsum dolor sit amet consectetur adipisicing elit. Mollitia consequatur, consectetur ut illum sapiente fugiat natus iste, voluptates asperiores omnis nam maiores laudantium! Quam quod impedit, minima architecto tempora quaerat velit natus atque illo libero tenetur assumenda, esse numquam. Accusantium.</p>
    </div>
</div>

<div class="container mt-5" id="berita">
    <div class="berita">
        <h2>Berita</h2>
        <div class="clearfix">
            <img src=".." class="col-md-6 float-md-end mb-3 ms-md-3" height="200" alt="berita">

            <p>
                A paragraph of placeholder text. We're using it here to show the use of the clearfix class. We're adding quite a few meaningless phrases here to demonstrate how the columns interact here with the floated image.
            </p>

            <p>
                As you can see the paragraphs gracefully wrap around the floated image. Now imagine how this would look with some actual content in here, rather than just this boring placeholder text that goes on and on, but actually conveys no tangible information at. It simply takes up space and should not really be read.
            </p>

            <p>
                And yet, here you are, still persevering in reading this placeholder text, hoping for some more insights, or some hidden easter egg of content. A joke, perhaps. Unfortunately, there's none of that here.
            </p>
        </div>
    </div>
</div>

<div class="container mt-5" id="kontak">
    <div class="kontak">
        <h2>Kontak Kami</h2>
        Lorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit odio possimus, eum debitis aut officia. Qui, minus quis voluptate ipsam hic, saepe reprehenderit quidem magni error odit voluptas et unde?
    </div>
</div>
<?= $this->endSection(); ?>