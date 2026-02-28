<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/login', 'Usuarios::login');
$routes->post('/login','Usuarios::procesarLogin');
$routes->get('/registro','Usuarios::registro');
$routes->post('/registro','Usuarios::procesarRegistro');

$routes->get('/dashboard/user','DashboardController::dashboards',['filter'=>'auth']);
$routes->get('/admin/dashboard','DashboardController::dashboards',['filter'=>'auth','adminFilter']);

$routes->post('/logout','Usuarios::logout');




