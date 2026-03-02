<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// los filtros de uso mas comun estan en el filters.php de config
$routes->get('/login', 'Usuarios::login');
$routes->post('/login','Usuarios::procesarLogin');
$routes->get('/registro','Usuarios::registro');
$routes->post('/registro','Usuarios::procesarRegistro');

$routes->get('/dashboard/user','DashboardController::dashboards');
$routes->get('/admin/dashboard','DashboardController::dashboards');
$routes->get('/admin/edituser/(:num)','AdminActionsController::editUsuarioView/$1');
$routes->put('/admin/edituser/(:num)','AdminActionsController::editUsuario/$1');
$routes->delete('/admin/deluser/(:num)','AdminActionsController::delUsuario/$1');




$routes->post('/logout','Usuarios::logout');




