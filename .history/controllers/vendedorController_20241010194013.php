<?php

namespace Controllers;

use MVC\Router;
use Model\vendedor;

class VendedorController{

    public static function crear( Router $router ){
        
        $errores = vendedor::getErrores();

        // pasar la vista  
        $router->render('Vendedores/crear', [
            'errores' => $errores
        ]); 
    }
    
    public static function actualizar(){
        echo "actualizar vendedor";
    }

    public static function eliminar(){
        echo "eliminar vendedor";
    }
}