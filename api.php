<?php
   
   class CApi {
    private $bd;

    public function __construct($con){
        $this->bd=$con;
    }
    public function get() {
        // Lógica para obtener todos los productos
        //echo json_encode(['message' => 'Obtener todos los productos']);
        try {
            // Realizar una consulta SQL para obtener datos desde la base de datos
            $query = "SELECT * FROM tabla_libros";
            $stmt = $this->bd->prepare($query);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            // Verificar si se encontraron resultados
            if ($stmt->rowCount() > 0) {
                // Si hay resultados, devolverlos en formato JSON
                http_response_code(200); // OK
                echo json_encode($result);
            } else {
                // Si no se encontraron resultados
                http_response_code(404); // No encontrado
                echo json_encode(array("message" => "No se encontraron elementos."));
            }
        } catch (PDOException $e) {
            // Manejo de errores
            http_response_code(500); // Error interno del servidor
            echo json_encode(array("message" => "Error en la consulta: " . $e->getMessage()));
        }
    }


    public function post() {
        // Lógica para crear un nuevo producto
        echo json_encode(['message' => 'Crear un nuevo producto']);
        try {
            // Obtener datos del cuerpo de la solicitud en formato JSON
            $data = json_decode(file_get_contents("php://input"));
    
            // Validar y procesar los datos recibidos
            if (!empty($data->titulo) && !empty($data->autor) && !empty($data->genero)&& !empty($data->anio)) {
                // Insertar datos en la base de datos
                $query = "INSERT INTO tabla_libros (titulo, autor, genero, año) VALUES (:titulo, :autor, :genero,:anio)";
                $stmt = $this->bd->prepare($query);
                $stmt->bindParam(":titulo", $data->titulo);
                $stmt->bindParam(":autor", $data->autor);
                $stmt->bindParam(":genero", $data->genero);
                $stmt->bindParam(":anio", $data->anio, PDO::PARAM_INT);

                if ($stmt->execute()) {
                    // Devolver una respuesta exitosa
                    http_response_code(201); // Creado
                    echo json_encode(array("message" => "Elemento creado exitosamente."));
                } else {
                    // En caso de error al insertar
                    http_response_code(500); // Error interno del servidor
                    echo json_encode(array("message" => "No se pudo crear el elemento."));
                }
            } 
            else {
                // En caso de datos insuficientes
                http_response_code(400); // Solicitud incorrecta
                echo json_encode(array("message" => "Datos insuficientes o incorrectos."));
            }
        } catch (PDOException $e) {
            // Manejo de errores
            http_response_code(500); // Error interno del servidor
            echo json_encode(array("message" => "Error en la consulta: " . $e->getMessage()));
        }
    }

    public function put() {
        // Lógica para actualizar un libro existente
        echo json_encode(['message' => 'Actualizar un libro existente']);
        try {
            // Obtener datos del cuerpo de la solicitud en formato JSON
            $data = json_decode(file_get_contents("php://input"));
            
            // Validar y procesar los datos recibidos
            if (!empty($data->id) && !empty($data->titulo) && !empty($data->autor) && !empty($data->genero) && !empty($data->anio)) {
                // Actualizar datos en la base de datos
                $query = "UPDATE tabla_libros SET titulo = :titulo, autor = :autor, genero = :genero, año = :anio WHERE id = :id";
                $stmt = $this->bd->prepare($query);
                $stmt->bindParam(":titulo", $data->titulo);
                $stmt->bindParam(":autor", $data->autor);
                $stmt->bindParam(":genero", $data->genero);
                $stmt->bindParam(":anio", $data->anio, PDO::PARAM_INT);
                $stmt->bindParam(":id", $data->id, PDO::PARAM_INT);
    
                if ($stmt->execute()) {
                    // Verificar si se actualizó algún registro
                    if ($stmt->rowCount() > 0) {
                        // Devolver una respuesta exitosa
                        http_response_code(200); // OK
                        echo json_encode(array("message" => "Libro actualizado exitosamente."));
                    } else {
                        // En caso de que no se haya actualizado ningún registro
                        http_response_code(404); // No encontrado
                        echo json_encode(array("message" => "No se encontró el libro a actualizar."));
                    }
                } else {
                    // En caso de error al actualizar
                    http_response_code(500); // Error interno del servidor
                    echo json_encode(array("message" => "No se pudo actualizar el libro."));
                }
            } else {
                // En caso de datos insuficientes o incorrectos
                http_response_code(400); // Solicitud incorrecta
                echo json_encode(array("message" => "Datos insuficientes o incorrectos."));
            }
        } catch (PDOException $e) {
            // Manejo de errores
            http_response_code(500); // Error interno del servidor
            echo json_encode(array("message" => "Error en la consulta: " . $e->getMessage()));
        }
    }

  
    public function delete() {
        // Lógica para eliminar un libro existente
        echo json_encode(['message' => 'Eliminar un libro existente']);
        try {
            // Obtener datos del cuerpo de la solicitud en formato JSON
            $data = json_decode(file_get_contents("php://input"));
    
            // Validar y procesar los datos recibidos
            if (!empty($data->id)) {
                // Eliminar el libro de la base de datos
                $query = "DELETE FROM tabla_libros WHERE id = :id";
                $stmt = $this->bd->prepare($query);
                $stmt->bindParam(":id", $data->id, PDO::PARAM_INT);
    
                if ($stmt->execute()) {
                    // Verificar si se eliminó algún registro
                    if ($stmt->rowCount() > 0) {
                        // Devolver una respuesta exitosa
                        http_response_code(200); // OK
                        echo json_encode(array("message" => "Libro eliminado exitosamente."));
                    } else {
                        // En caso de que no se haya eliminado ningún registro
                        http_response_code(404); // No encontrado
                        echo json_encode(array("message" => "No se encontró el libro a eliminar."));
                    }
                } else {
                    // En caso de error al eliminar
                    http_response_code(500); // Error interno del servidor
                    echo json_encode(array("message" => "No se pudo eliminar el libro."));
                }
            } else {
                // En caso de datos insuficientes o incorrectos
                http_response_code(400); // Solicitud incorrecta
                echo json_encode(array("message" => "ID del libro no especificado o incorrecto."));
            }
        } catch (PDOException $e) {
            // Manejo de errores
            http_response_code(500); // Error interno del servidor
            echo json_encode(array("message" => "Error en la consulta: " . $e->getMessage()));
        }
    }
    
    
}
        
?>
    