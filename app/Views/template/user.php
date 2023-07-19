<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- <title>Donor Darah</title> -->
    <?= $this->renderSection('title'); ?>
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/jquery.dataTables.css" />
</head>

<body>
    <section class="container-fluid">
        <nav class="navbar fixed-top navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="/">
                    <img src="<?= base_url() ?>/assets/img/logo.png" alt="Logo" width="28" class="d-inline-block align-text-top">
                    donor<span class="text-danger">tree</span>
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse justify-content-between" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/#beranda">Beranda</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#about">Tentang Kami</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#stokdarah">Stok Darah</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#berita">Berita</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                Info Donor
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="<?= site_url('jadwal-donor'); ?>">Jadwal Donor Darah</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= site_url('faq'); ?>">FAQ Donor Darah</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="<?= site_url('kebijakan-privasi'); ?>">Kebijakan Privasi</a></li>
                            </ul>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/#kontak">Kontak</a>
                        </li>
                    </ul>
                    <ul class="login narbar-nav ms-auto mb-2 mb-lg-0">
                        <!-- <button data-bs-toggle="modal" data-bs-target="#loginModal" class="btn btn-outline-danger btn-sm">Daftar</button> -->
                        <?php if (!userLogin()) : ?>
                            <a class="btn btn-outline-danger btn-sm fw-semibold px-4" href="<?= site_url('login'); ?>">Masuk</a>
                        <?php else : ?>
                            <ul class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false" href=""><img src="<?= base_url(); ?>/assets/img/<?= userLogin()->img_profile; ?>" height="40" class="rounded-circle me-1" alt="image profile" aria-expanded="false" data-bs-offset="10,20"></a>
                                <ul class="dropdown-menu">

                                    <h5 class="ps-1 text-center"><?= userLogin()->nama_depan; ?></h5>

                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= site_url('profile/') . userLogin()->id_user . '/' . userLogin()->slug; ?>"><i class="bi bi-person me-2"></i></i> Profil</a></li>
                                    <li><a class="dropdown-item" href="<?= site_url('setting-profile/') . userLogin()->id_user . '/' . userLogin()->slug; ?>"><i class="bi bi-gear me-2"></i></i> Pengaturan</a></li>
                                    <li>
                                        <hr class="dropdown-divider">
                                    </li>
                                    <li><a class="dropdown-item" href="<?= site_url('logout'); ?>"><i class="bi bi-box-arrow-left me-2"></i></i> Keluar</a></li>
                                </ul>
                            </ul>
                        <?php endif; ?>
                    </ul>

                </div>
            </div>
        </nav>
    </section>

    <!-- Modal -->
    <div class="modal fade" id="loginModal" data-bs-keyboard="true" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-fullscreen-md-down modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <h5>Masuk Ke Donortree</h5>
                    <p>Saya ingin masuk sebagai</p>
                    <div class="d-grid gap-2 col-12 mx-auto">
                        <a href="<?= site_url('login'); ?>" class="btn btn-success py-3"><i class="bi bi-people"></i> User</a>
                        <h5 class="text-center">Atau</h5>
                        <a href="<?= site_url('admin/login'); ?>" class="btn btn-outline-danger py-3"><i class="bi bi-person-gear"></i> Administrator</a>
                    </div>
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
                        <i class="bi bi-facebook-f"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="bi bi-twitter"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="bi bi-google"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="bi bi-instagram"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="bi bi-linkedin"></i>
                    </a>
                    <a href="" class="me-4 link-secondary">
                        <i class="bi bi-github"></i>
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
    <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>
    <script src="<?= base_url(); ?>/assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.js"></script>
    <script>
        let table = new DataTable('#myTable');
    </script>
</body>

</html>