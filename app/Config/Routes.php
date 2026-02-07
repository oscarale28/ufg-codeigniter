<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Alumnos;

/**
 * @var RouteCollection $routes
 */

$routes->get('alumnos', [Alumnos::class, 'index']);

$routes->get('alumnos/create', [Alumnos::class, 'renderCreate']);
$routes->post('alumnos/create', [Alumnos::class, 'create']);

$routes->get('alumnos/edit/(:num)', [Alumnos::class, 'renderEdit']);
$routes->post('alumnos/edit/(:num)', [Alumnos::class, 'edit']);

$routes->get('alumnos/delete/(:num)', [Alumnos::class, 'delete']);
