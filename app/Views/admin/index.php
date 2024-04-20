<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Beranda - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading     -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <!-- <li class="breadcrumb-item">Dashboard</li> -->
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- conten -->
<div class="page-content">
    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon purple mb-2">
                                        <i class="bi bi-people"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pengguna</h6>
                                    <h6 class="font-extrabold mb-0"><?= getPengguna(); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon blue mb-2">
                                        <i class="bi bi-person-fill-check"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Pendonor</h6>
                                    <h6 class="font-extrabold mb-0"><?= getPendonor(); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-card-checklist"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Stok darah</h6>
                                    <h6 class="font-extrabold mb-0"><?= getStokDarah(); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4 col-lg-12 col-xl-12 col-xxl-5 d-flex justify-content-start ">
                                    <div class="stats-icon green mb-2">
                                        <i class="bi bi-card-checklist"></i>
                                    </div>
                                </div>
                                <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                    <h6 class="text-muted font-semibold">Jumlah PMI</h6>
                                    <h6 class="font-extrabold mb-0"><?= getPMI(); ?></h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Daftar PMI Kota Bandung</h4>
                        </div>
                        <div class="card-body">
                            <!-- <div id="chart-profile-visit"></div> -->
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nama PMI</th>
                                        <th scope="col">Alamat</th>
                                        <th scope="col">Kontak</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($pmi as $key => $value) : ?>
                                        <tr>
                                            <td><?= $key + 1; ?></td>
                                            <td><?= $value->nama_pmi; ?></td>
                                            <td><?= $value->alamat; ?></td>
                                            <td><?= $value->kontak; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-lg-3">
            <div class="card">
                <div class="card-body py-4 px-4">
                    <div class="d-flex align-items-center">
                        <div class="avatar avatar-xl">
                            <img src="<?= site_url('assets/img/' . adminLogin()->img_profile); ?>" alt="Face 1">
                        </div>
                        <div class="ms-3 name">
                            <h5 class="font-bold"><?= adminLogin()->nama; ?></h5>
                            <h6 class="text-muted mb-0"><?= adminLogin()->email; ?></h6>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h4>Top 3 User Donor</h4>
                </div>
                <div class="card-content pb-4">
                    <?php foreach ($donor as $data) : ?>
                        <div class="recent-message d-flex px-4 py-3">
                            <div class="avatar avatar-lg">
                                <img src="<?= base_url('assets/img/') . $data->img_profile; ?>">
                            </div>
                            <div class="name ms-4">
                                <h5 class="mb-1"><?= $data->nama_depan . ' ' . $data->nama_belakang; ?></h5>
                                <h6 class="text-muted mb-0">Jumlah Donor <?= $data->done; ?></h6>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <!-- <div class="card">
                <div class="card-header">
                    <h4>Stok Darah</h4>
                </div>
                <div class="card-body">
                    <div id="chart-visitors-profile"></div>
                </div>
            </div> -->
        </div>
    </section>
</div>
<?= $this->endSection(); ?>