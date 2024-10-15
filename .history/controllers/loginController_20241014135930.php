<?php

namespace Controllers;
use MVC\Router;
use Model\Admin;

class LoginController{

    public static function login( Router $router){
        
        $router->render('Auth/login', [

        ]);
    }

    public static function logout(){
        echo "desde el logout";
    }

}