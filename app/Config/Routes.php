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
$routes->setDefaultController('Home');
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

//--------------------------------------------------------------------
// Route ADMIN
//--------------------------------------------------------------------

$routes->group('admin', ['filter' => 'permission:manage-all'], static function ($routes) {
    // index
    $routes->get('index', 'Admin::index', ['as' => 'index']);
    $routes->addRedirect('index/(:any)', 'index');

    // user
    $routes->get('user', 'Admin::user', ['as' => 'user']);
    $routes->addRedirect('user/(:any)', 'user');
    $routes->get('active_user/(:any)', 'Admin::active_user/$1');
    $routes->get('nonactive_user/(:any)', 'Admin::nonactive_user/$1');

    $routes->post('change_role_user', 'Admin::change_role_user');
    $routes->post('add_role_user', 'Admin::add_role_user');
    $routes->post('delete_user', 'Admin::delete_user');
    $routes->post('edit_user', 'Admin::edit_user');
    $routes->post('change_pass', 'Admin::change_pass');

    // role
    $routes->get('role', 'Admin::role', ['as' => 'role']);
    $routes->addRedirect('role/(:any)', 'role');

    $routes->post('change_role', 'Admin::change_role');
    $routes->post('add_role', 'Admin::add_role');
    $routes->post('delete_role', 'Admin::delete_role');

    // role perm
    $routes->get('role_perm', 'Admin::role_perm', ['as' => 'role_perm']);
    $routes->addRedirect('role_perm/(:any)', 'role_perm');

    $routes->post('change_role_perm', 'Admin::change_role_perm');
    $routes->post('add_role_perm', 'Admin::add_role_perm');

    // approve
    $routes->get('approve', 'Admin::approve');

    $routes->post('approve', 'Admin::approve_action');

    // log
    $routes->get('log', 'Admin::log');

    $routes->post('log', 'Admin::log_result');
    $routes->post('log_cek', 'Admin::log_cek');
});

//--------------------------------------------------------------------
// Route USER
//--------------------------------------------------------------------

$routes->group('user', ['filter' => 'role:user,admin'], static function ($routes) {
    $routes->get('index', 'User::index', ['as' => 'index_user']);
    $routes->addRedirect('/', 'index_user');
    $routes->addRedirect('index/(:any)', 'index_user');
    $routes->post('update', 'User::update');
    $routes->post('update/(:any)', 'User::update');
});
$routes->group('lapor', static function ($routes) {
    $routes->get('data', 'Lapor::data');
    $routes->get('data_admin', 'Lapor::data_admin');
    $routes->get('show/(:any)', 'Lapor::show/$1');
    $routes->get('laporan', 'Lapor::laporan');
});
$routes->post('store', 'Lapor::store');
$routes->post('home/cek', 'Home::cek');
$routes->post('home/cekk', 'Home::cek_action');


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
