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
        $mensaje =  null;
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){

            //debugear($_POST);
            $respuesta = $_POST['contacto'];
            
            // crear una instancia de PHPMailer

            $mail = new PHPMailer();
            // configurar SMTP (ES EL PROTOCOLO PARA EL ENVIO DE MAILS)
            $mail->isSMTP();
            $mail->Host = 'sandbox.smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->Username = '2de81388e4cc44';
            $mail->Password = 'fee023963b410f';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 2525;

            // Configurar el contenido del email
            $mail->setFrom('admin@bienesraices.com'); // quien envia el email
            $mail->addAddress('admin@bienesraices.com', 'BienesRaices.com'); // a que email va a llegar ese correo
            $mail->Subject = 'Tienes un nuevo mensaje';          // es el mensaje que va a llegar una vez que tengamos un nuevo mail

            // habilitar HTML

            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';  // VAMOS A RECIBIR MAIL DE PERSONAS QUE VAN A ESCRIBIR DE FORMA DIFERENTE

            // Definir el contenido

            $contenido = '<html>'; 
            $contenido .= '<p> Tienes un nuevo mensaje </p> ';
            $contenido .= '<p> Nombre: '.  $respuesta['nombre']  . ' </p> ';
            

            // Enviar de forma condicional algunos campos de email y telefono

            if($respuesta['contacto'] === 'telefono'){
                $contenido .= '<p> eligió ser contactado por telefono </p>';
                $contenido .= '<p> Telefono: '.  $respuesta['telefono']  . ' </p> ';
                $contenido .= '<p> Fecha contacto: '.  $respuesta['fecha']  . ' </p> ';
                $contenido .= '<p> hora '.  $respuesta['hora']  . ' </p> ';
                
            }else{
                // es email, entonces agg el campo de email
                $contenido .= '<p> eligió ser contactado por email </p>';
                $contenido .= '<p> Email: '.  $respuesta['email']  . ' </p> ';
            }
            $contenido .= '<p> Mensaje: '.  $respuesta['mensaje']  . ' </p> ';
            $contenido .= '<p> Vende o compra?: '.  $respuesta['tipo']  . ' </p> ';
            $contenido .= '<p> Precio o Presupuesto: Gs.'.  $respuesta['precio']  . ' </p> ';
            $contenido .= '<p> Prefiere ser contactado por: '.  $respuesta['contacto']  . ' </p> ';
            $contenido .= '</html>';

            $mail->Body = $contenido;
            $mail->AltBody = "Esto es texto alternativo sin html";

            // Enviar el email

            if ($mail->send()){
                $mensaje = "Mensaje enviado correctamente.";
            }else{
                $mensaje = "El mensaje no se pudo enviar";
            }

        }

        # Looking to send emails in production? Check out our Email API/SMTP product!

        $router->render('Paginas/contacto', [

        ]);
    }
}