<?php

    use Model\ActiveRecord;
    require __DIR__ . '/../vendor/autoload.php';
    require 'funciones.php';
    require __DIR__ . '/../includes/templates/config/database.php';
    

    // CONECTAR A LA BD
    $db = conectarDB();

    
    ActiveRecord::setDB($db);