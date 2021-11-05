<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Login');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'Login::index', ['as' => 'login']);

$routes->get('/home', 'Home::index', ['as' => 'home']);

// ASN
$routes->group('asn', function ($routes) {
    $routes->get('list', 'Asn::index', ['as' => 'list_asn']);
    $routes->get('create', 'Asn::create', ['as' => 'create_asn']);
    $routes->get('edit/(:num)', 'Asn::edit/$1', ['as' => 'edit_asn']);
    $routes->patch('update/(:num)', 'Asn::update/$1', ['as' => 'update_asn']);
    $routes->post('store', 'Asn::store', ['as' => 'store_asn']);
    $routes->post('data/(:num)', 'Asn::data/$1', ['as' => 'data_user']);
    $routes->delete('delete/(:num)', 'Asn::delete/$1', ['as' => 'delete_asn']);
    $routes->get('show/(:num)', 'Asn::show/$1', ['as' => 'show_asn']);
});

// HONORER
$routes->group('honorer', function ($routes) {
    $routes->get('list', 'honorer::index', ['as' => 'list_honorer']);
    $routes->get('create', 'honorer::create', ['as' => 'create_honorer']);
    $routes->post('store', 'honorer::store', ['as' => 'store_honorer']);
    $routes->post('data/(:num)', 'honorer::data/$1', ['as' => 'data_user']);
    $routes->get('edit/(:num)', 'honorer::edit/$1', ['as' => 'edit_honorer']);
    $routes->patch('update/(:num)', 'honorer::update', ['as' => 'update_honorer']);
    $routes->delete('delete/(:num)', 'honorer::delete/$1', ['as' => 'delete_honorer']);
    $routes->get('show/(:num)', 'honorer::show/$1', ['as' => 'show_honorer']);
});

// USER
$routes->group('user', function ($routes) {
    $routes->get('list', 'user::index', ['as' => 'list_user']);
    $routes->get('create', 'user::create', ['as' => 'create_user']);
    $routes->post('store', 'user::store', ['as' => 'store_user']);
    $routes->get('edit/(:num)', 'user::edit/$1', ['as' => 'edit_user']);
    $routes->patch('update/(:num)', 'user::update/$1', ['as' => 'update_user']);
    $routes->delete('delete/(:num)', 'user::delete/$1', ['as' => 'delete_user']);
});

// PROFILE
$routes->group('profile', function ($routes) {
    $routes->get('user', 'profile::index', ['as' => 'profile']);
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
