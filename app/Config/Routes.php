<?php

use CodeIgniter\Router\RouteCollection;
use App\Controllers\Alumnos;
use App\Controllers\AlumnosCarrera;
use Config\RoutesConstants;

/**
 * @var RouteCollection $routes
 */

$routes->get(RoutesConstants::ALUMNOS_INDEX, [Alumnos::class, 'index']);

# Alumons por carrera
$routes->get(RoutesConstants::ALUMNOS_CARRERA_INDEX, [AlumnosCarrera::class, 'index']);
$routes->post(RoutesConstants::ALUMNOS_CARRERA_FILTRAR, [AlumnosCarrera::class, 'filtrar']);

$routes->get(RoutesConstants::ALUMNOS_CREATE, [Alumnos::class, 'renderCreate']);
$routes->post(RoutesConstants::ALUMNOS_CREATE, [Alumnos::class, 'create']);

$routes->get(RoutesConstants::ALUMNOS_EDIT . '/(:num)', [Alumnos::class, 'renderEdit']);
$routes->post(RoutesConstants::ALUMNOS_EDIT . '/(:num)', [Alumnos::class, 'edit']);

$routes->get(RoutesConstants::ALUMNOS_DELETE . '/(:num)', [Alumnos::class, 'delete']);
