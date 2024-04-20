<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register - Donortree</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">

</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card col-md-6 col-sm-12 shadow-lg rounded-4">
            <div class="text-center pt-5 fw-semibold fs-4">
                <img src="<?= base_url() ?>/assets/img/logo.png" alt="Logo" width="28" class="d-inline-block align-text-top">donor<span class="text-danger">tree</span>
                <p class="mt-5 fw-bold fs-5">Register</p>
            </div>
            <form action="<?= site_url('register'); ?>" method="post" class="px-5 py-2">
                <div class="row g-3 mb-2">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-semibold">Nama Depan <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= ($validation->hasError('namadepan')) ? 'is-invalid' : ''; ?>" placeholder="nama depan" name="namadepan" aria-label="nama" value="<?= set_value('namadepan'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('namadepan'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-semibold">Nama Belakang <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= ($validation->hasError('namabelakang')) ? 'is-invalid' : ''; ?>" placeholder="nama belakang" name="namabelakang" aria-label="usia" value="<?= set_value('namabelakang'); ?>">
                        <div class="invalid-feedback">
                            <?= $validation->getError('namabelakang'); ?>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-semibold">Nik <span class="text-danger">*</span></label>
                        <input type="text" class="form-control <?= ($validation->hasError('nik')) ? 'is-invalid' : ''; ?>" name="nik" aria-label="nama" minlength="16" maxlength="16" value="<?= set_value('nik'); ?>">
                        <span style="font-size: 0.75rem;">Pastikan Nik 16 Angka</span>
                        <div class="invalid-feedback">
                            <?= $validation->getError('nik'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail2" class="form-label fw-semibold">Jenis Kelamin</label>
                        <select class="form-select" required aria-label="Default select example" name="jeniskelamin">
                            <option value="Laki Laki">laki Laki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('jenis_klamin'); ?>
                        </div>
                    </div>
                </div>
                <div class="row g-3 mb-2">
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-semibold">Tanggal Lahir <span class="text-danger">*</span></label>
                        <input type="date" class="form-control <?= ($validation->hasError('tgl_lahir')) ? 'is-invalid' : ''; ?>" name="tgl_lahir" aria-label="nama" value="<?= set_value('tgl_lahir'); ?>" id="tanggal_lahir">
                        <div class="invalid-feedback">
                            <?= $validation->getError('tgl_lahir'); ?>
                        </div>
                    </div>
                    <div class="col">
                        <label for="exampleInputEmail1" class="form-label fw-semibold">Golongan Darah</label>
                        <select class="form-select" required aria-label="Default select example" name="goldar">
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="-">Belum Tahu</option>
                        </select>
                        <div class="invalid-feedback">
                            <?= $validation->getError('goldar'); ?>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="exampleInputEmail1" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="email" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="email" placeholder="donor@mail.com" aria-describedby="emailHelp" value="<?= set_value('email'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="mb-2">
                    <label for="exampleInputPassword1" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="exampleInputPassword1">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" type="submit">Register</button>
                </div>
            </form>
            <p class="text-center mb-5">Sudah punya akun? <a href="<?= site_url('login'); ?>" class="text-primary">Login</a></p>
        </div>
    </div>


    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script>
        var alertShown = false; // Inisialisasi variabel status alert
        document.addEventListener('DOMContentLoaded', function() {
            document.getElementById('tanggal_lahir').addEventListener('input', function() {
                var selectedDate = new Date(this.value);
                var currentDate = new Date();

                // Tambahkan 17 tahun ke tanggal saat ini
                currentDate.setFullYear(currentDate.getFullYear() - 17);

                if (selectedDate > currentDate) {
                    if (!alertShown) { // Cek apakah alert belum ditampilkan sebelumnya
                        // alert('Usia Minimal 17 Tahun');
                        var alertElement = document.createElement('div');
                        alertElement.classList.add('custom-alert'); // Menambahkan kelas CSS
                        alertElement.textContent = 'Usia Minimal 17 Tahun';

                        var parentElement = this.parentNode;
                        parentElement.insertBefore(alertElement, this.nextSibling);
                        alertShown = true; // Set status alert menjadi sudah ditampilkan
                    }
                    this.value = ''; // Reset nilai input jika tidak memenuhi kriteria
                } else {
                    alertShown = false; // Reset status alert jika tanggal yang dimasukkan valid
                }

            });
        });
    </script>

</body>

</html>