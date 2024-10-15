<?php

namespace Controllers;

use MVC\Router;
use Model\Vendedor;

class VendedorController{

    public static function crear( Router $router ){
        
        $errores = Vendedor::getErrores();

        $vendedor = new Vendedor();

        
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
    
    public static function actualizar( Router $router ){

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        // obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);
        
        $router->render( 'Vendedores/actualizar', [
            'errores' => $errores,
            'vendedor'
        ]);
    }

    public static function eliminar(){
        echo "eliminar vendedor";
    }
}