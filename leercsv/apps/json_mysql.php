<?php


// Importar el archivo de conexión
require './../connection/connection.php';


// Definir la ruta del archivo JSON
$archivo_json = './../data/json/datos.json';

// Verificar si el archivo existe
if (!file_exists($archivo_json) || !is_readable($archivo_json)) {
    die("El archivo no existe o no se puede leer.");
}

// Leer el contenido del archivo JSON
$json_contenido = file_get_contents($archivo_json);

// Decodificar el contenido JSON a un array asociativo
$datos = json_decode($json_contenido, true);

// Verificar si la decodificación fue exitosa
if (json_last_error() !== JSON_ERROR_NONE) {
    die("Error al decodificar el JSON: " . json_last_error_msg());
}

// Preparar la consulta de inserción
$sql = "INSERT INTO usuarios (nombre, edad, correo) VALUES (:nombre, :edad, :correo)";
$stmt = $pdo->prepare($sql);

// Insertar cada fila en la base de datos
foreach ($datos as $fila) {
    $stmt->execute([
        ':nombre' => $fila['nombre'],
        ':edad' => $fila['edad'],
        ':correo' => $fila['correo']
    ]);
}

echo "Datos insertados correctamente.";
?>