<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>Berita - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<!-- heading -->
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita Donor Tree</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?= site_url('admin'); ?>">Dashboard</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Berita</li>
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
                        <h4 class="card-title">Tabel Berita</h4>
                        <a href="<?= site_url('admin/form-berita'); ?>" class="btn btn-primary"><i class="bi bi-plus-lg"></i> Berita</a>
                    </div>
                    <div class="table-responsive p-3">
                        <!-- table responsive -->
                        <?php if (session()->getFlashdata('message')) : ?>
                            <div class="alert alert-success alert-dismissible show fade mx-5">
                                <div class="alert-body text-center">
                                    <?= session()->getFlashdata('message'); ?>
                                </div>
                            </div>
                        <?php endif; ?>
                        <table class="table mb-0" id="Tberita">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Judul</th>
                                    <th scope="col">lokasi</th>
                                    <th scope="col">Tanggal Upload</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($berita as $key => $value) : ?>
                                    <tr>
                                        <td><?= $key + 1; ?></td>
                                        <td><?= $value['judul']; ?></td>
                                        <td><?= $value['lokasi']; ?></td>
                                        <td><?= date('d-m-Y', strtotime($value['created_at'])); ?></td>
                                        <td class="col">
                                            <a href="<?= site_url('admin/berita/edit/') . $value['id_berita']; ?>" class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>
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
<script>
    $(document).ready(function() {
        var table = $('#Tberita').DataTable({
            language: {
                searchPlaceholder: "judul berita"
            },
            // Konfigurasi lainnya
        });

        $('input').on('keyup', function() {
            table.column(1).search(this.value).draw();
        });
    });
</script>
<?= $this->endSection(); ?>