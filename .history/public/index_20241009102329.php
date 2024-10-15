<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;
use Controllers\PropiedadController;
use Model\Propiedad;

$router = new Router();

//debugear(PropiedadController::class); // vamos a poder identificar en que clase se encuentra el metodo

$router->get('/admin', [PropiedadController::class, 'index']); // en este controlador en propiedad controller, busca el metodo de index
$router->get('/propiedades/crear', [PropiedadController::class, 'crear']);
$router->get('/propiedades/actualizar', [PropiedadController::class, 'actualizar']);

$router->comprobarRutas(); // va a revisar que las rutas esten definidas en el router y tambien el tipo de request ya sea get y post
/*  eso lo hará en el metodo de comprobarRutas*/