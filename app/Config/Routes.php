<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Usuarios::login');
$routes->post('/login','Usuarios::procesarLogin');
$routes->get('/registro','Usuarios::registro');
$routes->post('/registro','Usuarios::procesarRegistro');
$routes->post('/dashboard','Usuarios::dashboard',['filter'=>'auth']);




