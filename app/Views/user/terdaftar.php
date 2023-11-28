<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Jadwal - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-4">
    <!-- <div id="carouselExample" class="carousel slide">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <div class="mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="assets/img/donor.jpg" class="img-fluid rounded" alt="donor darah">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="assets/img/berita.jpg" class="img-fluid rounded" alt="donor darah">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <div class="mb-3">
                    <div class="row g-0">
                        <div class="col-md-6">
                            <img src="assets/img/donor.jpg" class="img-fluid rounded" alt="donor darah">
                        </div>
                        <div class="col-md-6">
                            <div class="card-body">
                                <h5 class="card-title">Card title</h5>
                                <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                                <p class="card-text"><small class="text-body-secondary">Last updated 3 mins ago</small></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div> -->

    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-header text-center">Jadwal Donor Yang Sudah Didaftar</h4>
        </div>
        <div class="card-body m-2">
            <div class="table-responsive">
                <?php if (session()->getFlashdata('success')) : ?>
                    <div class="alert alert-info alert-dismissible show fade mx-5">
                        <div class="alert-body text-center">
                            <?= session()->getFlashdata('success'); ?>
                        </div>
                    </div>
                <?php endif; ?>
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Nomor Pendaftaran</th>
                            <th scope="col">Tanggal Kegiatan</th>
                            <th scope="col">Jam Kegiatan</th>
                            <th scope="col">Status Kegiatan</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['lokasi']; ?></td>
                                <td><?= $value['nomor']; ?></td>
                                <td><?= date("d-m-Y", strtotime($value['date'])) ?></td>
                                <td><?= $value['time']; ?></td>
                                <?php $batas =  strtotime($value['date'] . ' ' . $value['time']) ?>
                                <?php if ($batas <= time()) : ?>
                                    <td>Selesai</td>
                                <?php else : ?>
                                    <td>Belum Selesai</td>
                                <?php endif; ?>
                                <!-- <td><a href="<?= site_url('jadwal-donor/terdaftar/lihat/') . $value['id_daftar']; ?>" class="btn btn-primary">Lihat</a></td> -->
                            </tr>
                        <?php endforeach; ?>

                </table>
            </div>

        </div>
    </div>
    <!-- modal daftar donor -->
    <div class="modal" tabindex="-1">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Modal title</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Modal body text goes here.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <!-- end modal daftar donor-->
</div>
<?= $this->endSection(); ?>