<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login - Donortree</title>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <div class="container d-flex justify-content-center">
        <div class="card col-md-5 shadow-lg rounded-4">
            <div class="ps-3 pt-3">
                <a href="/"><i class="bi bi-arrow-left"> Beranda</i></a>
            </div>
            <div class="text-center pt-5 fw-semibold fs-4">
                <img src="<?= base_url() ?>/assets/img/logo.png" alt="Logo" width="28" class="d-inline-block align-text-top">donor<span class="text-danger">tree</span>
                <p class="mt-5 fw-bold fs-5">Wellcome Back</p>
            </div>
            <?php if (session()->getFlashdata('message')) : ?>
                <div class="alert alert-danger alert-dismissible show fade mx-5">
                    <div class="alert-body text-center">
                        <?= session()->getFlashdata('message'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('success')) : ?>
                <div class="alert alert-success alert-dismissible show fade mx-5">
                    <div class="alert-body">
                        <?= session()->getFlashdata('success'); ?>
                    </div>
                </div>
            <?php endif; ?>
            <form action="<?= site_url('login'); ?>" method="POST" class="px-5 py-5">
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label fw-semibold">Email <span class="text-danger">*</span></label>
                    <input type="text" class="form-control <?= ($validation->hasError('email')) ? 'is-invalid' : ''; ?>" id="exampleInputEmail1" name="email" aria-describedby="emailHelp" placeholder="donor@gmail.com" value="<?= set_value('email'); ?>">
                    <div class="invalid-feedback">
                        <?= $validation->getError('email'); ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label fw-semibold">Password <span class="text-danger">*</span></label>
                    <input type="password" class="form-control <?= ($validation->hasError('password')) ? 'is-invalid' : ''; ?>" name="password" id="exampleInputPassword1">
                    <div class="invalid-feedback">
                        <?= $validation->getError('password'); ?>
                    </div>
                </div>
                <div class="d-grid gap-2">
                    <button class="btn btn-primary btn-lg" type="submit">Login</button>
                </div>
            </form>
            <p class="text-center mb-5">Belum punya akun? <a href="<?= site_url('register'); ?>" class="text-primary">Register</a></p>
        </div>
    </div>
    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>

</html>