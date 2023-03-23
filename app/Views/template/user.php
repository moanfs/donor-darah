<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Donor Darah</title> -->
    <?= $this->renderSection('title'); ?>
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="shortcut icon" href="assets/img/logo.png" type="image/x-icon">
</head>

<body>
    <section class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="<?= base_url() ?>/assets/img/logo.png" alt="Logo" width="28" class="d-inline-block align-text-top">
                    donortree
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#stokdarah">Stok Darah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#berita">Berita</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Info Donor
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Action</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="#">Something else here</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#kontak">Kontak</a>
                        </li>
                    </ul>
                    <ul class="login narbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-outline-danger btn-sm">Daftar</button> -->
                        <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-outline-danger btn-sm fw-semibold px-4">Masuk</button>
                    </ul>
                </div>
            </div>
        </nav>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="loginModal">Modal title</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Understood</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Main Content -->
    <div class="main-content">
        <?= $this->renderSection('content'); ?>
    </div>
    <!-- end Content -->

    <!-- Footer -->
    <div class="container">
        <footer class="text-center text-lg-start bg-white text-muted">
            <!-- Section: Social media -->
            <section class="d-flex justify-content-center justify-content-lg-between p-4 border-bottom">
                <!-- Left -->
                <div class="me-5 d-none d-lg-block">
                    <span>Get connected with us on social networks:</span>
                </div>
                <!-- Left -->

                <!-- Right -->
                <div>
                    <a href="" class="me-4 link-secondary">
                        <i class="fab fa-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="fab fa-google"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="fab fa-linkedin"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="fab fa-github"></i>
                    </a>
                </div>
                <!-- Right -->
            </section>
            <!-- Section: Social media -->

            <!-- Copyright -->
            <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.025);">
                © <?= date('Y') ?> donortree
            </div>
            <!-- Copyright -->
        </footer>
    </div>
    <!-- Footer -->


    <script src="assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</body>

</html>