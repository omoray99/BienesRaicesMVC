<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login( Router $router){
        $errores = [];
        
        $router->render('Auth/login', [
            'errores' => $errores;
        ]);
    }

    public static function logout(){
        echo "desde el logout";
    }

}