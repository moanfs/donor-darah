<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Jadwal - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-4">
    <div id="carouselExample" class="carousel slide">
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
    </div>

    <div class="card mt-5">
        <div class="card-header">
            <h4 class="text-header text-center">Jadwal donor</h4>
        </div>
        <div class="card-body m-2">
            <div class="table-responsive">
                <div>
                    <label for="filter-lokasi">lokasi</label>
                    <select name="filter-lokasi" id="filter-lokasi" class="form-control">
                        <option value="">Pilih Lokasi</option>
                        @foreach($list_lokasi as $lokasi)
                        <option value="">{{$lokasi->nama}}</option>
                        @endforeach
                    </select>
                </div>
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama Kegiatan</th>
                            <th scope="col">Lokasi</th>
                            <th scope="col">Kab/Kota</th>
                            <th scope="col">Jadwal</th>
                            <th scope="col">Status</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($jadwal as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['nama']; ?></td>
                                <td><?= $value['lokasi']; ?></td>
                                <td><?= $value['kab_kota']; ?></td>
                                <td><?= $value['date']; ?> / <?= $value['time']; ?></td>
                                <td><?= $value['date_end']; ?></td>
                                <td><a href="#" class="btn btn-primary">Daftar</a></td>
                            </tr>
                        <?php endforeach; ?>

                </table>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>