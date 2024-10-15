<?php

namespace MVC;

class Router{

    public $rutasGET = [];
    public $rutasPOST = [];

    // van a ser todas las urls que van a reaccionar a un metodo get
    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
    }

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
           // debugear($this);
            /* nos va a permitir de una forma dinamica va a leer el nombre de la funcion y se la va a pasar */
            call_user_func($fn, $this); // es una funcion que nos va a permitir llamar una funcion cuando no sabemos como se llama esa funcion
        }else{
            echo "pagina no encontrada...";
        }
    }

    // Muesta una vista

    public function render($view, $datos = []){

        foreach ($datos as $key =>$value){
            $$key = $value;
        }

        ob_start(); // iniciar un almacenamiento en memoria durante un tiempo
        include __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean(); // limpiamos la vista

        include __DIR__ . "/views/layout.php";
    }

}