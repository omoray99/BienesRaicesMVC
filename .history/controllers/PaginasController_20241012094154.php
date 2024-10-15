<?php
namespace Controllers;

use MVC\Router;

class PaginasController{

    public static function index( Router $router){
        $router->render()   /* metodo para mostrar una vista*/
    }

    public static function nosotros(){
        echo "desde nosotros";
    }

    public static function propiedades(){
        echo "desde propiedade";
    }

    public static function propiedad(){
        echo "desde propiedad";
    }

    public static function blog(){
        echo "desde blog";
    }

    public static function entrada(){
        echo "desde entrada";
    }

    public static function contacto(){
        echo "desde contacto";
    }
}