<?php

    require 'funciones.php';
    require __DIR__ . '/../includes/templates/config/database.php';
    require __DIR__ . '/../vendor/autoload.php';

    // CONECTAR A LA BD
    $db = conectarDB();

    use Model\ActiveRecord;

    ActiveRecord::setDB($db);