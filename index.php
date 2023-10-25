<?php
// API de Libros: 
// Crea una API para administrar una lista de libros. Cada libro puede tener información como título, autor, género, y año de publicación.
// Implementa rutas para listar libros, agregar nuevos libros, actualizar información de libros existentes y eliminar libros.

//include "api.php";

header("Content-type: application/json");

$endpoint=$_SERVER['REQUEST_URI']; 
switch($endpoint){
    case '/curso_uba/clase25/api/index.php';
        include('router.php');
         break;
    default:
       echo json_encode(array('message'=>'Ruta no encontrada'));
}


?>

