<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Controllers\VendedorController;
use Controllers\PaginasController;

$router = new Router();

//debugear(PropiedadController::class); // vamos a poder identificar en que clase se encuentra el metodo

$router->get('/admin', [PropiedadController::class, 'index']); // en este controlador en propiedad controller, busca el metodo de index
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->post('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);
$router->post('/propiedades/eliminar', [PropiedadController::class, 'eliminar']);


$router->get('/vendedores/crear', [VendedorController::class, 'crear']);
$router->post('/vendedores/crear', [VendedorController::class, 'crear']);
$router->get('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/actualizar', [VendedorController::class, 'actualizar']);
$router->post('/vendedores/eliminar', [VendedorController::class, 'eliminar']);



$router->get('/', [PaginasControllers]);


$router->comprobarRutas(); // va a revisar que las rutas esten definidas en el router y tambien el tipo de request ya sea get y post
/*  eso lo hará en el metodo de comprobarRutas*/