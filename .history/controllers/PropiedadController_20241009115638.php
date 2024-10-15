<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;

class PropiedadController{
    public static function index( Router $router){
        
        $propiedades = Propiedad::all();
        $resultado = null;

        $router->render('Propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    publ
    }
    public static function actualizar(){
        echo "actualizar propiedad...";
    }
}