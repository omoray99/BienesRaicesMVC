<?php

namespace MVC;

class Router{
    public function comprobarRutas(){
        
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        debugear($metodo );
    }

}