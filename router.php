<?php
// Crear un archivo "router.php" que manejará las solicitudes a la API y llamará a los métodos correspondientes de la clase "API". ● El archivo "router.php" debe leer la solicitud y llamar al método correspondiente de la clase "API".
    
// Incluir el archivo de configuración
require 'config.php';
include "api.php";

// Inicializar la clase API
$conexion=new CConfig();
$con=$conexion->connect();
$api = new CApi($con);

// Determinar el método HTTP (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

// Enrutamiento de solicitudes
switch ($method) {
    case 'GET':
        $api->get();
        break;
    case 'POST':
        $api->post();
        break;
    case 'PUT':
        $api->put();
        break;
    case 'DELETE':
        $api->delete();
        break;
    default:
        // Manejo de errores para métodos no admitidos
        http_response_code(405);
        echo json_encode(array("message" => "Método no permitido"));
        break;
}

        
?>
    