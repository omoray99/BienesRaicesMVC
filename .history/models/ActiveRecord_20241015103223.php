<?php

namespace Model;

class ActiveRecord{
  // base de datos
  protected static $db;  // el metodo tambien tiene que ser estatico
  protected static $columnasBD = [];
  protected static $tabla = '';

  // Errores o validacion
  protected static $errores = [];

 

  // definir la conexion a la bd
  //es la clase padre, de esa forma mantiene la referencia a la conexion a la bd
  public static function setDB($database)
  {
      self::$db = $database; // no es necesario cambiar a static porque siempre ya sea propiedades o vendedores, siempre se van a conectar a la misma bd, no requerimos que cada vez que intanciemos o mandemos llamar la clase de propiedad o vendedor.
  }



  public function guardar(){
      if(!is_null($this->id)){
          // actualizar
          $this->actualizar();
      } else{
          // creando un nuevo registro
          $this->crear();
      }
  }

  public function crear()
  {
      // Sanitizar los datos
      $atributos = $this->sanitizarAtributos();

      //$string = join(', ',array_keys($atributos));

      //debugear( $string );

      
      //insertar en la base de datos

      $query = "INSERT INTO "  . static::$tabla   .   "  ( ";
      $query .= join(', ',array_keys($atributos));
      $query .= " ) VALUES (' ";  
      $query .=join("', '",array_values($atributos));
      $query .= " ') ";

      //debugear($query);

      $resultado = self::$db->query($query);

      // Mensaje de exito
      if ($resultado) {
          //Redireccionar al usuario.

          header('Location: /admin?resultado=1'); // query string
      }
  }

  public function actualizar(){
      // Sanitizar los datos
      $atributos = $this->sanitizarAtributos();

      /** ir a la memoria, ir al objeto en memoria y va ir uniendo atributos con valores para tener un codigo similar
       *al codigo de update  
       */
      $valores = [];
      foreach( $atributos as $key => $value){
          $valores[] = "{$key}='{$value}'";
      }
      $query = " UPDATE " . static::$tabla   .  " SET ";
      $query .= join(', ', $valores);
      $query .= "WHERE id = '" . self::$db->escape_string($this->id) . "' ";
      $query .=  " LIMIT 1 ";

      $resultado = self::$db->query($query);

      //insertar en la base de datos
      if ($resultado) {
        //Redireccionar al usuario.
         header('Location: /admin?resultado=2'); // query string
      }
  }

  // Eliminar un registro
  public function eliminar(){
      // eliminar el registro
      $query = " DELETE FROM "  .  static::$tabla  .   " WHERE id = " . self::$db->escape_string($this->id) . " LIMIT 1"; // por que hacemos eso? estamos leyendo el id del formulario y alguien puede poner un codigo malicioso
      $resultado = self::$db->query($query);

      if ($resultado) {
          $this->borrarImagen();
          header('location: /admin?resultado=3');
      }
  }

  // identificar y unir los atributos de la bd
  public function atributos(){
      $atributos = [];
      foreach(static::$columnasBD as $columna){
          if($columna === 'id') continue;
          $atributos[$columna] = $this->$columna;
      }
      return $atributos;

  }
  public function sanitizarAtributos(){
      $atributos = $this->atributos();
      $sanitizado = [];
      
      foreach($atributos as $key => $value){
          $sanitizado[$key] = self::$db->escape_string($value);
      }
      
      return $sanitizado;

  }

  // Subida de archivos

  public function setImagen($imagen){
      // Elimina la imagen previa
      if(!is_null ($this->id)){ // isset va a revisar que exista pero que tambien tenga un valor 
          $this->borrarImagen();
      }

      //Asignar al atributo de imagen el nombre de la imagen
      if($imagen){
          $this->imagen = $imagen;
      }
  }

  // Elimina el archivo 

  public function borrarImagen(){
      // Comprobar si existe el archivo 
      $existeArchivo = file_exists(CARPETA_IMAGEN . $this->imagen);
      if($existeArchivo){
          unlink(CARPETA_IMAGEN . $this->imagen);  // para eliminar archivos
      }
      // mantiene una copia del objeto en cuestion, y de esa forma esta sincronizado el objeto en el servidor con lo que hay en la bd
  }

  // validacion
  public static function getErrores(){
    return static::$errores;
  }

  public function validar(){

    static::$errores = [];
    return static::$errores;

  }

  // Lista todos los registros
  public static function all(){
      $query = "SELECT * FROM " . static::$tabla;

      $resultado = self::consultarSQL($query);
      //debugear($resultado->fetch_assoc());
      return $resultado;
  }

  // Obtiene determinado nro de registros
  public static function get($cantidad){
    $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
    //debugear($query);

    $resultado = self::consultarSQL($query);
    return $resultado;
}

  // busca un registro por su id 

  public static function find($id){
      $query = "SELECT * FROM " . static::$tabla  .   " WHERE id = {$id} ";

      $resultado = self::consultarSQL($query);
      return ( array_shift($resultado) );
  }

  public static function consultarSQL($query){
      // consultar la base de datos
      $resultado =  self::$db->query($query);


      // iterar los resultados
      $array = [];
      while($registro = $resultado->fetch_assoc()){
          $array[] = /*$registro['titulo'];*/ static::crearObjeto($registro);
      }
      // liberar la memoria EN POO
      
      $resultado->free();


      // retornar los resultados
      return $array;
  }

  protected static function crearObjeto($registro){
     $objeto = new static;

     // esta tomando un arreglo que son los resultados de la bd y esta creando un objeto en memoria que es un espejo de lo que hay en la bd

     foreach($registro as $key => $value){
         if ( property_exists( $objeto, $key ) ){ // verificar que una propiedad exista
              $objeto->$key = $value;
          }
     } 
     return $objeto;
  }

  // Sincroniza el objeto en memoria con los cambios realizados por el usuario
  /* este codigo se va a encargar de sincronizar, se va a encargar de leer todo el post, se va a encargar de leer
  el objeto que esta en memoria, va a ir iterando cada una de las propiedades id con id, titulo con titulo y va a rescribiendo las
  nuevas*/
  public function sincronizar( $args = []  ){
      foreach ($args as $key => $value){
          if(property_exists($this, $key ) && !is_null($value) ) { // va a revisar de un objeto que una propiedad o atributo exista, va a revisar si una propiedad existe en nuestro arreglo
              $this->$key = $value;  // es variable porque lo hace mas dinamico, va  a ir iterando en cada uno de ellos

          }  
      } 
  }  

}