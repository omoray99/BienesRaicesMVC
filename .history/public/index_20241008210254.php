<?php

require_once __DIR__ . '/../includes/app.php';

use MVC\Router;

$router = new Router();

$router->get('/nosotros', 'funcion_nosotros');
$router->get('/admin', 'funcion_nosotros');

$router->comprobarRutas(); // va a revisar que las rutas esten definidas en el router y tambien el tipo de request ya sea get y post
/*  eso lo hará en el metodo de comprobarRutas*/