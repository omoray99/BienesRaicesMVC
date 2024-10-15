<?php

namespace Controllers;

use MVC\Router;

class VendedorController{

    public static function crear( Router $router ){
        echo "crear vendedor";
    }
    
    public static function actualizar(){
        echo "actualizar vendedor";
    }

    public static function eliminar(){
        echo "eliminar vendedor";
    }
}