<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Home::index');
$routes->get('faq', 'Home::faq');
$routes->get('back', 'Home::back');
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attempLogin');
$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attempRegister');
$routes->get('logout', 'Auth::logout');
$routes->get('kebijakan-privasi', 'Home::privasi');
$routes->get('jadwal-donor', 'Jadwal::index');

$routes->get('stok-darah/(:segment)', 'Stok::index/$1');

$routes->get('jadwal-donor/daftar/(:num)', 'Jadwal::daftar/$1', ['filter' => 'isLogin']); //  untuk mendatar donor
$routes->post('jadwal-donor/daftar/(:num)', 'Jadwal::create/$1', ['filter' => 'isLogin']);
$routes->get('jadwal-donor/terdaftar', 'Jadwal::terdaftar', ['filter' => 'isLogin']); // menampilkaaan data yang sudah didaftar
$routes->get('jadwal-donor/terdaftar/(:num)', 'Jadwal::show/$1', ['filter' => 'isLogin']); // melihat detail yang sudah didaftar
$routes->post('jadwal-donor/terdaftar/lihat/(:num)', 'Jadwal::edit/$1', ['filter' => 'isLogin']);
$routes->post('jadwal-donor/terdaftar/hapus/(:num)', 'Jadwal::delete/$1', ['filter' => 'isLogin']);

$routes->get('berita', 'Berita::index');
$routes->get('berita/(:num)/(:segment)', 'Berita::lihatberita/$1/$1');

//profile
$routes->get('profile/(:num)/(:segment)', 'Profile::index/$1/$1');
$routes->get('setting-profile/(:num)/(:segment)', 'Profile::settingProfile/$1/$1');
$routes->post('edit-profile/(:num)', 'Profile::save/$1');
$routes->post('edit-profile-img/(:num)', 'Profile::updateimg/$1');
$routes->post('edit-profile-password/(:num)', 'Profile::password/$1');
$routes->get('auth', 'Admin\Auth::login');
$routes->post('auth', 'Admin\Auth::attempLogin');
$routes->get('auth-out', 'Admin\Auth::logout');

// login admin
$routes->get('login-admin', 'Admin\Auth::login');
$routes->post('login-admin', 'Admin\Auth::attempLogin');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');

    //jadwal
    $routes->get('jadwal-donor', 'Jadwal::index');
    $routes->get('form-jadwal', 'Jadwal::new');
    $routes->post('add-jadwal', 'Jadwal::save');
    $routes->get('edit-jadwal/(:num)/', 'Jadwal::edit/$1');
    $routes->post('edit-jadwal/(:num)/', 'Jadwal::update/$1');
    $routes->post('hapus-jadwal/(:num)/', 'Jadwal::delete/$1');

    // pendaftar
    $routes->get('pendaftar-donor', 'Pendaftar::index');
    $routes->get('pendaftar-donor/(:num)', 'Pendaftar::show/$1');
    $routes->get('pendaftar-donor/peserta/(:num)', 'Pendaftar::peserta/$1');
    $routes->post('pendaftar-donor/selesai/(:num)', 'Pendaftar::selesai/$1');
    $routes->post('pendaftar-donor/batal/(:num)', 'Pendaftar::batal/$1');
    $routes->post('pendaftar-donor/absen/(:num)', 'Pendaftar::absen/$1');

    //stok darah
    $routes->get('stok-darah', 'Stok::index');
    $routes->get('stok-darah-hapus', 'Stok::hapus');
    $routes->get('stok-darah/show/(:num)', 'Stok::show/$1');
    $routes->get('stok-darah/edit/(:num)', 'Stok::edit/$1');
    $routes->post('stok-darah/edit/(:num)', 'Stok::update/$1');
    $routes->get('stok-darah/edit/hapus/(:num)', 'Stok::softDelete/$1');
    $routes->post('stok-darah/edit/hapus/(:num)', 'Stok::refund/$1');
    $routes->post('stok-darah/min/(:num)', 'Stok::min/$1');
    $routes->get('form-stok-darah', 'Stok::new');
    $routes->post('add-darah', 'Stok::save');
    $routes->post('stok-darah/delete/(:num)', 'Stok::delete/$1');

    // petugas pmi
    $routes->get('petugas',  'Petugas::index');
    $routes->get('form-petugas',  'Petugas::new');
    $routes->post('form-petugas',  'Petugas::save');
    $routes->get('petugas/show/(:num)', 'Petugas::show/$1');
    $routes->post('petugas/delete/(:num)', 'Petugas::delete/$1');


    // pengguna
    $routes->get('pengguna', 'Pengguna::index');
    $routes->get('pengguna/show/(:num)', 'Pengguna::show/$1');
    $routes->post('pengguna/edit/(:num)', 'Pengguna::edit/$1');
    $routes->post('pengguna/(:num)', 'Pengguna::delete/$1');

    //berita
    $routes->get('berita', 'Berita::index');
    $routes->get('berita/edit/(:num)', 'Berita::edit/$1');
    $routes->post('berita/edit/(:num)', 'Berita::update/$1');
    $routes->get('form-berita', 'Berita::new');
    $routes->post('add-berita', 'Berita::save');
    $routes->post('berita/delete/(:num)', 'Berita::delete/$1');

    //profile
    $routes->get('profile/(:segment)', 'Profile::index/$1');
    $routes->post('profile/(:num)', 'Profile::update/$1');
    $routes->post('profile-password/(:num)', 'Profile::password/$1');
    $routes->post('profile-img/(:num)', 'Profile::updateimg/$1');
    $routes->get('logout', 'Auth::logout');
});
/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
