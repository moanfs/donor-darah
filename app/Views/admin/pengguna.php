<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Pengguna - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Pengguna Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Tabel Pengguna</li>
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
                    <div class="card-header">
                        <h4 class="card-title">Tabel Pengguna</h4>
                    </div>
                    <!-- table responsive -->
                    <div class="table-responsive p-3">
                        <table class="table mb-0" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama</th>
                                    <th scope="col">Usia</th>
                                    <th scope="col">Jenis Kelamin</th>
                                    <th scope="col">Gol Darah</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($users as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['nama_depan']; ?> <?= $value['nama_belakang']; ?></td>
                                        <td><?= $value['usia']; ?></td>
                                        <td><?= $value['jenis_klamin']; ?></td>
                                        <td><?= $value['goldar']; ?></td>
                                        <td><?php if ($value['active'] == 1) : ?>
                                                <span class="badge text-bg-success">Aktif</span>
                                            <?php else : ?>
                                                <span class="badge text-bg-danger">Tidak Aktif</span>
                                            <?php endif; ?>
                                        </td>
                                        <td><a href="<?= site_url('admin/pengguna/show/') . $value['id_user']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a></td>
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