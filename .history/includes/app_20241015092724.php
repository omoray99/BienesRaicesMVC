<?php

use Dotenv\Dotenv;
use Model\ActiveRecord;
    require __DIR__ . '/../vendor/autoload.php';
    $dotenv = Dotenv\Dotenv::createInmutable(__DIR__);

    $dotenv->safeLoad();
    require 'funciones.php';
    require __DIR__ . '/../includes/templates/config/database.php';
    

    // CONECTAR A LA BD
    $db = conectarDB();

    
    ActiveRecord::setDB($db);