<?php

error_reporting(E_ALL);

require 'vendor/autoload.php';
$client = new MongoDB\Client("mongodb://mongodb:27017");
$bd = $client->miBaseDeDatos;
$collection = $bd->miColeccion;


// Consulta para obtener las materias del estudiante Juan Pérez
$resultado = $collection->findOne(['edad' => 81]);

var_dump($resultado);