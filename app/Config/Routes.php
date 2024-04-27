<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index'); <- Comment out the initial route
$routes->get('/', 'OrderingController::index');
$routes->post('/', 'OrderingController::index');

$routes->get('/register', 'OrderingController::register');
$routes->post('/register', 'OrderingController::register');

$routes->get('/dashboard', 'OrderingController::dashboard');
$routes->get('/menu_management', 'OrderingController::menu_management');
$routes->get('/table_management', 'OrderingController::table_management');
$routes->get('/order_management', 'OrderingController::order_management');
$routes->get('/forgot_password', 'OrderingController::forgot_password');
$routes->get('/menu', 'OrderingController::menu');



$routes->get('/qr_code_management', 'OrderingController::qr_code_management');
$routes->get('/revenue','OrderingController::check_revenue');



