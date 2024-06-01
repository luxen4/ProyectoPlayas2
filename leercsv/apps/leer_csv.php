<?php
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
        echo '<table border="1">';
        echo '<tr>';
        foreach ($cabeceras as $cabecera) {
            echo '<th>' . htmlspecialchars($cabecera) . '</th>';
        }
        echo '</tr>';

        // Leer el resto de las líneas
        while (($fila = fgetcsv($handle, 1000, ',')) !== FALSE) {
            echo '<tr>';
            foreach ($fila as $campo) {
                echo '<td>' . htmlspecialchars($campo) . '</td>';
            }
            echo '</tr>';
        }
        echo '</table>';
    }
    // Cerrar el archivo
    fclose($handle);
} else {
    die("No se pudo abrir el archivo.");
}
?>