<?php namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Auth');
$routes->setDefaultMethod('login');
$routes->setTranslateURIDashes(true);
$routes->set404Override();
$routes->setAutoRoute(false);
 
$routes->get('/', 'Auth::login');
 
$routes->get('auth/login', 'Auth::login');
$routes->post('auth/proses_login', 'Auth::proses_login');
 
$routes->get('auth/logout', 'Auth::logout');
 
$routes->get('auth/register', 'Auth::register');
$routes->post('auth/proses_register', 'Auth::proses_register');
 
$routes->get('dashboard', 'Dashboard::index');
 
$routes->get('kategori', 'Kategori::index');
$routes->get('kategori/create', 'Kategori::create');
$routes->post('kategori/store', 'Kategori::store');
$routes->get('kategori/edit/(:num)', 'Kategori::edit/$1');
$routes->post('kategori/update/(:num)', 'Kategori::update/$1');
$routes->get('kategori/delete/(:num)', 'Kategori::delete/$1');

$routes->get('mahasiswa', 'Mahasiswa::index');
$routes->get('mahasiswa/create', 'Mahasiswa::create');
$routes->post('mahasiswa/store', 'Mahasiswa::store');
$routes->get('mahasiswa/edit/(:num)', 'Mahasiswa::edit/$1');
$routes->post('mahasiswa/update/(:num)', 'Mahasiswa::update/$1');
$routes->get('mahasiswa/delete/(:num)', 'Mahasiswa::delete/$1');
 
$routes->get('matakuliah', 'Matakuliah::index');
$routes->get('matakuliah/create', 'Matakuliah::create');
$routes->post('matakuliah/store', 'Matakuliah::store');
$routes->get('matakuliah/edit/(:num)', 'Matakuliah::edit/$1');
$routes->post('matakuliah/update/(:num)', 'Matakuliah::update/$1');
$routes->get('matakuliah/delete/(:num)', 'Matakuliah::delete/$1');

$routes->get('kuis', 'Kuis::index');
$routes->get('kuis/create', 'Kuis::create');
$routes->post('kuis/store', 'Kuis::store');
$routes->get('kuis/edit/(:num)', 'Kuis::edit/$1');
$routes->post('kuis/update/(:num)', 'Kuis::update/$1');
$routes->get('kuis/delete/(:num)', 'Kuis::delete/$1');
 



// We get a performance increase by specifying the default
// route since we don't have to scan directories.

/**
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
