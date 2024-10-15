<?php
namespace Controllers;

use MVC\Router;
use Model\Propiedad;
use PHPMailer\PHPMailer\PHPMailer;

class PaginasController{

    public static function index( Router $router){/* metodo para mostrar una vista. toma la ubicacion del archivo*/
        $propiedades = Propiedad::get(3);
        $inicio = true;

        $router->render('Paginas/index', [
            'propiedades' => $propiedades,
            'inicio' =>$inicio
        ]);
    }

    public static function nosotros( Router $router){
        
        $router->render('Paginas/nosotros', [

        ]);
    }

    public static function propiedades( Router $router){
        $propiedades = Propiedad::all();
        
        $router->render('/Paginas/propiedades', [
            'propiedades' => $propiedades
        ]);
    }

    public static function propiedad( Router $router){
        $id = validarORedireccionar('/propiedades');

        // si es un id valido y pasa esa validacion vamos a buscar la propiedad por su id
        $propiedad = Propiedad::find($id);

        $router->render('Paginas/propiedad', [
            'propiedad' => $propiedad
        ]);
    }

    public static function blog( Router $router){
        
        $router->render('Paginas/blog');
    }

    public static function entrada( Router $router){
        
        $router->render('Paginas/entrada');
    }
 // el controlador se encarga de manejar y administra toda la logica antes de enviar a una vista o mandar llamar a un modelo
    public static function contacto( Router $router){
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            
            // crear una instancia de PHPMailer

            $mail = new PHPMailer();
            // configurar SMTP (ES EL PROTOCOLO PARA EL ENVIO DE MAILS)

        }

        $router->render('Paginas/contacto', [

        ]);
    }
}