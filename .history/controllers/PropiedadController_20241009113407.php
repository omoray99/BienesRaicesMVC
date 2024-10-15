<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;

class PropiedadController{
    public static function index( Router $router){
        
        $router->render('Propiedades/admin', [

        ]);
    }
    public static function crear(){
        echo "crear propiedad.....";
    }
    public static function actualizar(){
        echo "actualizar propiedad...";
    }
}