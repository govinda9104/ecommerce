<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(false);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// Dashboard route
$routes->get('/', 'Home::index');

// Login routes
$routes->get('login/admin', 'Login::admin');
$routes->get('login/customer', 'Login::customer');
$routes->post('login/authenticate', 'Login::authenticate');

// Admin routes
$routes->get('admin/dashboard', 'Admin::dashboard');
$routes->get('admin/addProduct', 'Admin::addProduct');
$routes->post('admin/saveProduct', 'Admin::saveProduct');

// Customer routes
$routes->get('customer/dashboard', 'Customer::dashboard');
$routes->post('customer/dashboard2/(:any)', 'Customer::dashboard2/$1');
$routes->get('customer/getCustomerProducts', 'Customer::getCustomerProducts');
$routes->get('admin/viewCustomerProducts', 'Admin::viewCustomerProducts'); // Adjust this as per your controller structure



//$routes->get('customer/addToCard/$1', 'Customer::addToCard/$1');

// API routes
$routes->get('api/products', 'Api::getProducts');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. You
 * can do that below.
 *
 * --------------------------------------------------------------------
 */

if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}
