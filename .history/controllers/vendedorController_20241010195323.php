<?php

namespace Controllers;

use MVC\Router;
use Model\vendedor;

class VendedorController{

    public static function crear( Router $router ){
        
        $errores = vendedor::getErrores();

        $vendedor = new vendedor();

        
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            // CREAR UNA NUEVA INSTANCIA

            $vendedor = new Vendedor($_POST['vendedor']);

            // validar que no haya campos vacios
            $errores = $vendedor->validar();

            // NO HAY ERRORES
            if(empty($errores)){
                $vendedor->guardar();
            }

        }

        // pasar la vista  
        $router->render('Vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]); 
    }
    
    public static function actualizar( Router$router ){
        echo "actualizar vendedor";
    }

    public static function eliminar(){
        echo "eliminar vendedor";
    }
}