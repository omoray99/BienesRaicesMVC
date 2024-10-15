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

    public static function nosotros( Router $router){
        
        $router->render('Paginas/nosotros', [

        ]);
    }

    public static function propiedades( Router $router){
        $propiedades = Propiedad::all();
        
        $router->render('/Paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad( Router $router){
        $id = validarORedireccionar();
                
        $router->render('Paginas/propiedad', [

        ]);
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