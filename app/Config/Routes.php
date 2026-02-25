<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Usuarios::loginVista');
$routes->post('/login','Usuarios::loginUs');
$routes->get('/registro','Usuarios::nuevoUsuarioVista');
$routes->post('/registro','Usuarios::nuevoUsuario');



