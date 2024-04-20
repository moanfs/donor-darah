<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Petugas - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Petugas Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Petugas</li>
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
                        <h4 class="card-title">Tabel Petugas PMI</h4>
                        <a href="<?= site_url('admin/form-petugas'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Petugas PMI</a>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Tugas PMI</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">No HP</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($admin as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama']; ?></td>
                                        <td><?= $value['nama_pmi']; ?></td>
                                        <td><?= $value['email']; ?></td>
                                        <td><?= $value['phone']; ?></td>
                                        <?php if ($value['active'] == 1) : ?>
                                            <td><span class="badge text-bg-success">Aktif</span></td>
                                        <?php else : ?>
                                            <td><span class="badge text-bg-danger">Tidak Aktif</span></td>
                                        <?php endif; ?>
                                        <td><a href="<?= site_url('admin/petugas/show/') . $value['id_admin']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a></td>
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