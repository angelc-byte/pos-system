
<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// Authentication
$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->post('logout', 'Auth::logout', ['filter' => 'auth']);

// Protected application routes
$routes->group('', ['filter' => 'auth'], static function ($routes): void {

    // Dashboard and pages
    $routes->get('/', 'Pages::home');
    $routes->get('about', 'Pages::about');

    // Profile
    $routes->get('profile', 'Profile::index');
    $routes->post('profile', 'Profile::update');

    // Customer management
    $routes->get('customers', 'Customers::index');
    $routes->get('customers/new', 'Customers::new');
    $routes->post('customers', 'Customers::create');
    $routes->get('customers/(:num)/edit', 'Customers::edit/$1');
    $routes->post('customers/(:num)', 'Customers::update/$1');
    $routes->post('customers/(:num)/delete', 'Customers::delete/$1');

    // User management
    $routes->get('users', 'Users::index');
    $routes->get('users/new', 'Users::new');
    $routes->post('users', 'Users::create');
    $routes->get('users/(:num)/edit', 'Users::edit/$1');
    $routes->post('users/(:num)', 'Users::update/$1');
    $routes->post('users/(:num)/delete', 'Users::delete/$1');

    // Product management
    $routes->get('products', 'Products::index');
    $routes->get('products/new', 'Products::new');
    $routes->post('products', 'Products::create');
    $routes->get('products/(:num)/add-to-sales', 'Products::addToSales/$1');

    // Sales management
    $routes->get('sales', 'Sales::index');
    $routes->post('sales', 'Sales::create');
    $routes->get('sales/history', 'Sales::history');

    // Guest page
    $routes->get('guest', 'Home::guest');
});
