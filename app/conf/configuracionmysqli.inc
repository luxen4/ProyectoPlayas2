<?php




if($_SERVER['SERVER_NAME']=="localhost"){
    $servername="localhost";
    $database="proyectoplayasdefinitivo";
    $username="root";
    $password=""; 
}else{
    $servername="fdb30.awardspace.net";
    $database="3714088_proyectoplayas";
    $username="3714088_proyectoplayas";
    $password="alberite2";
}



// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";