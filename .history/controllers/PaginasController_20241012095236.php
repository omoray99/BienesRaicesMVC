<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;

class PaginasController{

    public static function index( Router $router){/* metodo para mostrar una vista. toma la ubicacion del archivo*/
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('Paginas/index', [
            'propiedades' => $propiedades,
            'inicio' =>$inicio
        ]);
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