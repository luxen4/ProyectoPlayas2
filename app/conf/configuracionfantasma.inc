<?php



if($_SERVER['SERVER_NAME']=="localhost"){
    $host="localhost";
    $dbname="proyectoplayasdefinitivo";
    $username="root";
    $contrasena="";   

}else{
    $host="fdb30.awardspace.net";
    $dbname="3714088_proyectoplayas";
    $username="3714088_proyectoplayas";
    $contrasena="alberite2";   
}


          
try {
    $gbd = new PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena );
   // echo "Connected to at successfully.";
} catch (PDOException $pe) {
    die("Could not connect to the database $dbname :" . $pe->getMessage());
}








// Así para el host

// Así en local
/*
                    $dsn = 'mysql:host=localhost;dbname=proyectoplayasdefinitivo;charset=utf8mb4';  
                    $nombre_usuario = 'root';
                    $contraseña = '';
                    $opciones = array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'); 
*/

?>





                 

