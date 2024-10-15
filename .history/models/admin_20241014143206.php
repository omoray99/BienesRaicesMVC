<?php

namespace Model;

class Admin extends ActiveRecord{

    // base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasBD = ['id', 'email', 'PASSWORD'];

    public $id;
    public $email;
    public $password;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->email = $args['email'] ?? '';
        $this->password = $args['PASSWORD'] ?? '';
    }

    public function validar(){
        if(!$this->email){
            self::$errores[] = "El Email es obligatio";
        }
        if(!$this->password){
            self::$errores[] = "El Password es obligatio";
        }

        return self::$errores;
    }

    public function existeUsuario(){
        // Revisar si un usuario existe o no 
        $query = " SELECT * FROM" . self::$tabla . " WHERE email = '" . $this->email . "' LIMIT 1";
        $resultado = self::$db->query($query);

        debugear($resultado);
    }
}