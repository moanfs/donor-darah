<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Stok Darah - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Stok Darah Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Stok Darah</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- content -->
<section class="section">
    <div class="page-content">
        <div class="row" id="table-responsive">
            <div class="col-12">
                <div class="card">
                    <div class="card-header col-sm-12 d-flex justify-content-between">
                        <h4 class="card-title">Tabel Stok Darah</h4>
                        <a href="<?= site_url('admin/form-stok-darah'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> stok Darah</a>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <!-- untuk menampilkan pesan hapus atau tambah -->
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible show fade mx-5">
                                <div class="alert-body text-center">
                                    <?= session()->getFlashdata('message'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <table class="table mb-0 " id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Golongan Darah</th>
                                    <th scope="col">Jumlah</th>
                                    <th scope="col">PMI Penyedia</th>
                                    <th scope="col">Kontak</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($stok as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['goldar']; ?></td>
                                        <td><?= $value['jumlah']; ?> Kantong</td>
                                        <td><?= $value['nama_pmi']; ?></td>
                                        <td><?= $value['kontak']; ?></td>
                                        <td>
                                            <!-- <a href="<?= site_url('admin/stok-darah/show/') . $value['id_darah']; ?>" class="btn btn-sm btn-warning"><i class="bi bi-eye"></i></a> -->
                                            <a href="<?= site_url('admin/stok-darah/edit/') . $value['id_darah']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>