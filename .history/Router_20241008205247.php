<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    // van a ser todas las urls que van a reaccionar a un metodo get
    public function get()

    public function comprobarRutas(){
        
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
           
        }
    }

}