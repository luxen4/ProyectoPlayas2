<?php
// Definir la ruta del archivo JSON
$archivo_json = 'datos.json';

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

// Mostrar los datos en una tabla HTML
echo '<table border="1">';
echo '<tr><th>Nombre</th><th>Edad</th><th>Correo</th></tr>';
foreach ($datos as $fila) {
    echo '<tr>';
    echo '<td>' . htmlspecialchars($fila['nombre']) . '</td>';
    echo '<td>' . htmlspecialchars($fila['edad']) . '</td>';
    echo '<td>' . htmlspecialchars($fila['correo']) . '</td>';
    echo '</tr>';
}
echo '</table>';
?>