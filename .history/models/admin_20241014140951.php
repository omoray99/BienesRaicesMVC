<?php

namespace Model;

class Admin extends ActiveRecord{

    // base de datos
    protected static $tabla = 'usuarios';
    protected static $columnasBD = ['id', 'email', 'PASSWORD'];


}