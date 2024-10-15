<?php

function conectarDB(): mysqli {
    $db = new mysqli('localhost', 'root', '123456789852', 'Bienesraices_crud');
    if(!$db){
        echo "Error, no se pudo conectar";
        exit;
    }
    return $db;
}

   /*if($db){
        echo "se conecto";
    }else{
        echo "No se conecto ";
    }*/
    

    /* GET: TIENDA VIRTUAL Y TIENES UNA URL QUE PUEDES COPIAR Y COMPARTIR CON ALGUIEN*/
    /*  POST: ENVIAR DATOS DE FORMA SEGURA Y GET PARA EXPONER EN LA URL
    GET: PARA OBTENER DATOS DE UN SERVIDOR
    POST: PARA ENVIAR DATOS A UN SERVIDOR */