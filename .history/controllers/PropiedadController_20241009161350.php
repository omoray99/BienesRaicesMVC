<?php

namespace Controllers;
use MVC\Router;
use Model\Propiedad;
use Model\vendedor;
use Intervention\Image\ImageManagerStatic as Image;

class PropiedadController{
    public static function index( Router $router){
        
        $propiedades = Propiedad::all();

        // Muestra mensaje condicional 
        $resultado = $_GET['resultado'] ?? null;

        $router->render('Propiedades/admin', [
            'propiedades' => $propiedades,
            'resultado' => $resultado
        ]);
    }

    public static function crear( Router $router){

        $propiedad = new Propiedad;
        $vendedores = vendedor::all();
        // arreglo con mensajes de errores
        $errores = Propiedad::getErrores();

        if ($_SERVER["REQUEST_METHOD"] === 'POST') {

            /**crea una nueva instancia */
            $propiedad = new Propiedad($_POST['propiedad']);

            //debugear($propiedad);

            /**subida de archivos */


            // generar un nombre único
            $nombreImagen = md5(uniqid(rand(), true)) . ".jpg";

            // setear la imagen
            // Realiza un resize al imagen con Intervention
            if ($_FILES['propiedad']['tmp_name']['imagen']) {

                $image = Image::make($_FILES['propiedad']['tmp_name']['imagen'])->fit(800, 600);
                $propiedad->setImagen($nombreImagen);
            }

            // llamar al metodo de validacion

            // validar
            $errores = $propiedad->validar();

            if (empty($errores)) {

                //crear una carpeta
                $carpetaImagenes = '../../imagenes/';
                if (!is_dir(CARPETA_IMAGEN)) {
                    mkdir(CARPETA_IMAGEN);
                }

                //  Guarda la imagen en el servidor
                $image->save(CARPETA_IMAGEN .  $nombreImagen);

                // Guarda en la base de datos
                $propiedad->guardar();
            }  
        }
        $router->render('Propiedades/crear', [
            'propiedad' => $propiedad,
            'vendedores' => $vendedores,
            'errores' => $errores
        ]);
    }

    public static function actualizar( Router $router){
        $id = validarORedireccionar('/admin');
        $propiedad = Propiedad::find($id);


        $errores = Propiedad::getErrores();

        $router->render('/propiedades/actualizar', [
            'propiedad' => $propiedad
        ]);
    }
}