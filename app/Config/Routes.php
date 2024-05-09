<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
//$routes->get('/', 'Home::index'); <- Comment out the initial route
$routes->get('/', 'OrderingController::index');
$routes->post('/', 'OrderingController::index');

$routes->get('logout', 'OrderingController::logout');

$routes->get('/register', 'OrderingController::register');
$routes->post('/register', 'OrderingController::register');

$routes->get('dashboard', 'OrderingController::dashboard');

$routes->get('complete_order/(:num)', 'OrderingController::complete_order/$1', ['as' => 'complete_order']);
$routes->get('cancel_order/(:num)', 'OrderingController::cancel_order/$1', ['as' => 'cancel_order']);
$routes->get('view_order_details/(:num)', 'OrderingController::view_order_details/$1', ['as' => 'view_order_details']);

$routes->post('add_table', 'OrderingController::add_table', ['as' => 'add_table']);
$routes->get('edit_table/(:num)', 'OrderingController::edit_table/$1', ['as' => 'edit_table']);
$routes->post('edit_table/(:num)', 'OrderingController::edit_table/$1', ['as' => 'edit_table']);
$routes->get('delete_table/(:num)', 'OrderingController::delete_table/$1', ['as' => 'delete_table']);


$routes->get('menu_management', 'OrderingController::menu_management');
$routes->get('edit_dish/(:num)', 'OrderingController::edit_dish/$1');
$routes->post('update_dish/(:num)', 'OrderingController::update_dish/$1');
$routes->get('delete_dish/(:num)', 'OrderingController::delete_dish/$1');
$routes->post('add_dish', 'OrderingController::add_dish');

$routes->get('table_management', 'OrderingController::table_management');
$routes->get('/order_management', 'OrderingController::order_management');
$routes->get('/forgot_password', 'OrderingController::forgot_password');
$routes->get('/menu', 'OrderingController::menu');

$routes->get('/user_management', 'OrderingController::user_management');
$routes->post('add_user', 'OrderingController::add_user');
$routes->post('edit_user/(:num)', 'OrderingController::edit_user/$1');
$routes->get('delete_user/(:num)', 'OrderingController::delete_user/$1');

$routes->get('cart', 'OrderingController::cart');
$routes->post('addToCart', 'OrderingController::addToCart');
$routes->post('removeFromCart', 'OrderingController::removeFromCart');
$routes->post('submitOrder', 'OrderingController::submitOrder');

$routes->get('menu_forordering', 'OrderingController::menu_forordering');

$routes->get('/qr_code_management', 'OrderingController::qr_code_management');
$routes->get('/revenue','OrderingController::check_revenue');



