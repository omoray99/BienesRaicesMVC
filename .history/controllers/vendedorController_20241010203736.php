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
        $router->render('vendedores/crear', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]); 
    }
    
    public static function actualizar( Router $router ){

        $errores = Vendedor::getErrores();
        $id = validarORedireccionar('/admin');

        // obtener datos del vendedor a actualizar
        $vendedor = Vendedor::find($id);

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            // asignar los valores
        
            $args = $_POST['vendedor'];
        
            // sincronizar objeto en memoria con lo que el usuario escribio 
            $vendedor->sincronizar($args);
        
            // validacion
        
            $errores = $vendedor->validar();
        
            if(empty($errores)){
                $vendedor->guardar();
            }
        }
        
        $router->render( 'vendedores/actualizar', [
            'errores' => $errores,
            'vendedor' => $vendedor
        ]);
    }

    public static function eliminar(){ 
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

           
            debugear($_POST);//este codigo es para que solamente se pueda eliminar ciertas entidades

            // validar id

            $id = $_POST['id'];
            $id = filter_var($id, FILTER_VALIDATE_INT);

            if ($id) {
                // valida el tipo a eliminar
                $tipo = $_POST['tipo']; 
                if(validarTipoContenido($tipo)){
                    $propiedad = Vendedor::find($id);
                    $propiedad->eliminar();
                }
            }

            
        }
    }
}