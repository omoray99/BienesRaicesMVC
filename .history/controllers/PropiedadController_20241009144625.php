<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\vendedor;

class PropiedadController{
    public static function index( Router $router){
        
        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('Propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear( Router $router){
        $propiedad = new Propiedad;
        $vendedores = vendedor::all();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            debugear($_POST);
        }

        $router->render('Propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores
        ]);
        
    }
    public static function actualizar(){
        echo "actualizar propiedad...";
    }
}