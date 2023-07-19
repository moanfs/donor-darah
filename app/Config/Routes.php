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
$routes->get('berita', 'Berita::index');
$routes->get('berita/(:num)/(:segment)', 'Berita::lihatberita/$1/$1');

//profile
$routes->get('profile/(:num)/(:segment)', 'Profile::index/$1/$1');
$routes->get('setting-profile/(:num)/(:segment)', 'Profile::settingProfile/$1/$1');
$routes->post('edit-profile/(:num)/(:segment)', 'Profile::save/$1/$1');
$routes->get('auth', 'Admin\Auth::login');
$routes->post('auth', 'Admin\Auth::attempLogin');
$routes->get('auth-out', 'Admin\Auth::logout');

$routes->group('admin', ['namespace' => 'App\Controllers\Admin'], function ($routes) {
    $routes->get('/', 'Dashboard::index');
    $routes->get('jadwal-donor', 'Jadwal::index');
    $routes->get('form-jadwal', 'Jadwal::new');
    $routes->post('add-jadwal', 'Jadwal::save');
    $routes->get('stok-darah', 'Stok::index');
    $routes->get('form-stok-darah', 'Stok::new');
    $routes->post('add-darah', 'Stok::save');
    $routes->get('pengguna', 'Pengguna::index');
    $routes->get('berita', 'Berita::index');

    $routes->get('form-berita', 'Berita::new');
    $routes->post('add-berita', 'Berita::save');
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
