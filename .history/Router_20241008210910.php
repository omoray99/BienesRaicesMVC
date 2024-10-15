<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    // van a ser todas las urls que van a reaccionar a un metodo get
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

    public function comprobarRutas(){
        
        $urlActual = $_SERVER['PATH_INFO'] ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[ $urlActual] ?? null;
        }

        if($fn){
            // la url existe y hay una funciona asociada
            call_user_func(); // es una funcion que nos va a permitir llamar una funcion cuando no sabemos como se llama esa funcion
        }else{
            echo "pagina no encontrada...";
        }
    }

}