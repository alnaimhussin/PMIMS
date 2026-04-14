<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('admin');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// 1. Group for Guest Access (Prevents logged-in users from seeing the login form)
$routes->group('', ['filter' => 'guest'], function($routes) {
    // URL: /auth/login (GET: Shows Form)
    $routes->get('auth/login', 'AuthController::login'); 
    
    // URL: /auth/login (POST: Processes Login)
    $routes->post('auth/login', 'AuthController::attemptLogin'); 
    
    // Add other guest pages here (e.g., /auth/register, /auth/forgotpassword)
    // Example: $routes->get('auth/register', 'AuthController::register'); 
});

// 2. Logout (Protected by Auth filter)
// URL: /auth/logout
$routes->get('auth/logout', 'AuthController::logout', ['filter' => 'auth']);

// Optional: Redirect the old simple /login path to the new /auth/login path
$routes->add('login', 'AuthController::login'); 
$routes->add('logout', 'AuthController::logout');

$routes->get('/', 'Dashboard::index',['filter' => 'auth']);
$routes->get('/Employee', 'Employee::index');

$routes->post('attendance/get_employee_attendance', 'Attendance::get_employee_attendance');
$routes->post('attendance/get_dtr_records', 'Attendance::get_dtr_records');

$route['dynamic/fetch_citymun/(:any)'] = 'Dynamic/fetch_citymun/$1';
$route['dynamic/fetch_barangay/(:any)'] = 'Dynamic/fetch_barangay/$1';
$route['genid/(:any)']='Genid/index/$1';

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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
