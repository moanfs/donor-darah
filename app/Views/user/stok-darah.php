<?= $this->extend('template/user'); ?>
<!-- title -->
<?= $this->Section('title'); ?>
<title>Stok Darah - Donortree</title>
<?= $this->endSection(); ?>

<!-- content -->
<?= $this->Section('content'); ?>
<div class="container mt-4">
    <div class="card mt-5">
        <div class="card-body m-2">
            <div class="">
                <h5 class="card-title mb-3">Stok Golongan Darah "<?= $goldar->goldar; ?>"</h5>
            </div>
            <div class="table-responsive">
                <table class="table table-striped" id="myTable">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Nama PMI</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Jumlah Stok Darah</th>
                            <th scope="col">Kontak PMI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($stok as $key => $value) : ?>
                            <tr>
                                <td><?= $key + 1; ?></td>
                                <td><?= $value['nama_pmi']; ?></td>
                                <td><?= $value['alamat']; ?></td>
                                <td><?= $value['jumlah']; ?> Kantong</td>
                                <td><?= $value['kontak']; ?></td>
                            </tr>
                        <?php endforeach; ?>

                </table>
            </div>

        </div>
    </div>
</div>
<?= $this->endSection(); ?>