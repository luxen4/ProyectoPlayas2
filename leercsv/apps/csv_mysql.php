<?php
// Configuración de la base de datos
$host = 'localhost';
$db = 'prueba';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

// Configurar el DSN (Data Source Name)
$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES => false,
];

try {
    // Crear una instancia de PDO
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Error de conexión: ' . $e->getMessage());
}

// Definir la ruta del archivo CSV
$archivo_csv = 'datos.csv';

// Verificar si el archivo existe
if (!file_exists($archivo_csv) || !is_readable($archivo_csv)) {
    die("El archivo no existe o no se puede leer.");
}

// Abrir el archivo en modo lectura
if (($handle = fopen($archivo_csv, 'r')) !== FALSE) {
    // Leer la primera línea (cabeceras)
    if (($cabeceras = fgetcsv($handle, 1000, ',')) !== FALSE) {
        // Preparar la consulta de inserción
        $sql = "INSERT INTO usuarios (nombre, edad, correo) VALUES (:nombre, :edad, :correo)";
        $stmt = $pdo->prepare($sql);

        // Leer el resto de las líneas
        while (($fila = fgetcsv($handle, 1000, ',')) !== FALSE) {
            // Asociar los datos del CSV con los parámetros de la consulta
            $stmt->execute([
                ':nombre' => $fila[0],
                ':edad' => $fila[1],
                ':correo' => $fila[2]
            ]);
        }
    }
    // Cerrar el archivo
    fclose($handle);
    echo "Datos insertados correctamente.";
} else {
    die("No se pudo abrir el archivo.");
}
?>