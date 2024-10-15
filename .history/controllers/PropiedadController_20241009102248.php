<?php

namespace Controllers;
use MVC\Router;


class PropiedadController{
    public static function index( Router $router){
        debugear($router);
        
    }
    public static function crear(){
        echo "crear propiedad.....";
    }
    public static function actualizar(){
        echo "actualizar propiedad...";
    }
}