<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login( Router $router){
        $errores = [];
        if ($_SERVER["REQUEST_METHOD"] === 'POST') {
            $auth = new Admin($_POST);
            $errores = $auth->validar();

            if(empty($errores)){
                // verificar si el usuario existe
                $resultado = $auth->existeUsuario();
                if(!$resultado){
                    // Verificar si el usuario exista o no (mensaje de error)
                    $errores = Admin::getErrores();
                }else {
                    // verificar el password
                       $autenticado =  $auth->comprobarPassword($resultado);

                       if($autenticado){
                            // AUtenticar al usuario
                            $auth->autenticar();
                       }else{
                            // Password incorrecto (mensaje de error) 
                            $errores = Admin::getErrores();
                       }

                    
                }

            }
        }
        
        $router->render('Auth/login', [
            'errores' => $errores
        ]);
    }

    public static function logout(){
        session_start();
        $_SESSION = [];
    }

}