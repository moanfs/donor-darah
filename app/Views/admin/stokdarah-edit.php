<?= $this->extend('template/admin'); ?>

<?= $this->Section('title') ?>
<title>From Jadwal - Admin Donor Darah</title>
<?= $this->endSection(); ?>

<?= $this->Section('content'); ?>
<div class="page-heading">
    <h3>Form Edit Darah Donor Tree</h3>
</div>

<!-- // Basic multiple Column Form section start -->
<section id="multiple-column-form">
    <div class="row match-height">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">Form Edit Stok Darah</h4>
                </div>
                <div class="card-content">
                    <div class="card-body">
                        <form class="form" data-parsley-validate method="post" action="<?= site_url('admin/add-darah'); ?>">
                            <div class="row">
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Golongan Darah</label>
                                        <fieldset class="form-group">
                                            <select class="form-select <?= ($validation->hasError('goldar')) ? 'is-invalid' : ''; ?>" id="basicSelect" name="goldar">
                                                <option selected disabled>Pilih golongan darah</option>
                                                <option value="A" <?php if ($darah['goldar'] == 'A') : ?>selected <?php endif; ?>>A</option>
                                                <option value="B" <?php if ($darah['goldar'] == 'B') : ?>selected <?php endif; ?>>B</option>
                                                <option value="AB" <?php if ($darah['goldar'] == 'C') : ?>selected <?php endif; ?>>AB</option>
                                                <option value="O" <?php if ($darah['goldar'] == 'D') : ?>selected <?php endif; ?>>O</option>
                                            </select>
                                            <div class="invalid-feedback">
                                                <?= $validation->getError('goldar'); ?>
                                            </div>
                                        </fieldset>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Jumlah kantong</label>
                                        <input type="number" id="last-name-column" class="form-control <?= ($validation->hasError('jumlah')) ? 'is-invalid' : ''; ?>" placeholder="jumlah kantong darah" min="1" name="jumlah" value="<?= $darah['jumlah'] ?>">
                                        <div class="invalid-feedback">
                                            <?= $validation->getError('jumlah'); ?>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-column" class="form-label">Provinsi</label>
                                        <select class="form-select" name="provinsi[]" id="provinsi" aria-label="Default select example">
                                            <option selected>Pilih Provinsi</option>
                                            <?php foreach ($provinsi as $value) : ?>
                                                <option value="<?= $value->id; ?>" <?php if ($value->id == $darah['provinsi']) : ?>selected <?php endif; ?>><?= $value->name; ?></option>
                                            <?php endforeach; ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-12 col-12">
                                    <div class="form-group mandatory">
                                        <label for="last-name-colum" class="form-label">Kab/Kota</label>
                                        <select class="form-select" name="kab_kota" id="kabupaten" aria-label="Default select example">
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                        <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                    </div>
                                </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $("#provinsi").change(function(e) {
            var provinsi = $("#provinsi").val();
            $.ajax({
                type: "POST",
                url: "<?= base_url('admin/kabupaten'); ?>",
                data: {
                    provinsi: provinsi
                },
                success: function(response) {
                    $("#kabupaten").html(response);
                }
            });
        });
    });
</script>
<?= $this->endSection(); ?>