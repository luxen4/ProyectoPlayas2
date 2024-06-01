<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los Destinos</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">

    <link rel="stylesheet" type="text/css" href="web/css/styles.css">
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>
<div class="container">
        <div class="row">
            <div class="col-xl-12 text-center  col-lg-12 col-md-12 col-sm-12 col-12">
                <h1>Perfil de su Agencia de Buses</h1>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <hr>
            </div>
        </div>
    </div>


    <div class="container">
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                <div class="izda infoperfil"><?php echo '<span class="s">Nombre </span>' . ": " . pasarUtf8($agenciaBuses[0]->nombre) . "<br>" ; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">NIF </span>' . ": " . pasarUtf8($agenciaBuses[0]->nif) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Dirección </span>' . ": " . pasarUtf8($agenciaBuses[0]->direccion) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Código Postal </span>' . ": " . pasarUtf8($agenciaBuses[0]->cp) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Localidad </span>' . ": " . pasarUtf8($agenciaBuses[0]->localidad) . "<br>";?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Provincia </span>' . ": " . pasarUtf8($agenciaBuses[0]->provincia) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Comunidad </span>' . ": " . pasarUtf8($agenciaBuses[0]->comunidad) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">País </span>' . ": " . pasarUtf8($agenciaBuses[0]->pais) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Email </span>' . ": " . pasarUtf8($agenciaBuses[0]->email) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Teléfono de Reserva </span>' . ": " . pasarUtf8($agenciaBuses[0]->telefono_Reserva) . "<br>"; ?> </div>
                <div class="izda infoperfil"><?php echo '<span class="s">Teléfono de la Agencia </span>' . ": " . pasarUtf8($agenciaBuses[0]->telefono_Agencia) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Horario </span>' . ": " . pasarUtf8($agenciaBuses[0]->horario_Agencia) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Pago Online </span>' . ": " . pasarUtf8($agenciaBuses[0]->pago_Online) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Número de cuenta </span>' . ": " . pasarUtf8($agenciaBuses[0]->numero_Cuenta) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Username </span>' . ": " . pasarUtf8($agenciaBuses[0]->username) . "<br>"; ?></div>
                <div class="izda infoperfil"><?php echo '<span class="s">Contraseña actual </span> : *** <br>'; ?></div>
            <!--<div class="izda infoperfil"><?php echo '<span class="s">Contraseña actual </span>' . ": " . pasarUtf8($agenciaBuses[0]->contrasena) . "<br>"; ?></div>-->
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-xl-12  text-center col-lg-6 col-md-6 col-sm-6 col-12">
                <hr>
            </div>
        </div>
    </div>



<form action="" method="post">
<?php   //if(isset($_SESSION->perfil)){
            //if($_SESSION->perfil->roll=="admin" || $_SESSION->perfil->roll=="agenciabuses"){?>

        <div class="row">
            <div class="col-xl-12  text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <label for="estaseguro">
                <input id="estaseguro" type="checkbox" name="estaseguro"> Estoy seguro de eliminar los datos de la Agencia de Buses.</label>
            </div>
        </div>


    <div class="row">
        <div class="col-xl-12  text-center col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="botones">
                <input type="submit" name="eliminaragenciabuseslogeada" value="Dar de Baja">   
            </div>
        </div>
    </div>


<?php //}};?>
</form></div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
   
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>