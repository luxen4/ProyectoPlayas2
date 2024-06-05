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
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">

</head>
<body>
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>  <!--https://www.baulphp.com/como-usar-include-y-require-en-php-ejemplos/ -->



    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center  col-lg-12 col-md-12 col-sm-12 col-12">
                <h1>Perfil Cliente</h1>
            </div>
        </div>
   
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <hr>
            </div>
        </div>


        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                <div class="infoperfil"><?php echo '<span class="s"> Nombre: </span>'  . pasarUtf8($datosPerfilCliente[0]->nombre) . "<br>" ; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Apellidos: </span> ' . pasarUtf8($datosPerfilCliente[0]->apellidos) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> NIF: </span> ' . pasarUtf8($datosPerfilCliente[0]->nif) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Dirección:</span> ' . pasarUtf8($datosPerfilCliente[0]->calle) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Código Postal: </span> ' . pasarUtf8($datosPerfilCliente[0]->cp) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Localidad: </span> ' . pasarUtf8($datosPerfilCliente[0]->localidad) . "<br>";?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Provincia: </span> ' . pasarUtf8($datosPerfilCliente[0]->provincia) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Comunidad: </span> ' . pasarUtf8($datosPerfilCliente[0]->comunidad) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> País: </span> ' . pasarUtf8($datosPerfilCliente[0]->pais) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> email: </span> ' . pasarUtf8($datosPerfilCliente[0]->email) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Teléfono: </span> ' . pasarUtf8($datosPerfilCliente[0]->TlfnoParticular) . "<br>"; ?> </div>
                <div class="infoperfil"><?php echo '<span class="s"> Fecha de Nacimiento: </span> ' . pasarUtf8($datosPerfilCliente[0]->fNacimiento) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Sexo: </span>' . pasarUtf8($datosPerfilCliente[0]->sexo) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Username: </span> ' . pasarUtf8($datosPerfilCliente[0]->username) . "<br>"; ?></div>
            <!--<div class="infoperfil"><?php echo '<span class="s"> Contraseña actual: </span> ' . pasarUtf8($datosPerfilCliente[0]->contrasena) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> roll: </span> ' . pasarUtf8($datosPerfilCliente[0]->roll) . "<br>"; ?></div>
            -->
            </div>
        </div> 

        <div class="row">
            <div class="col-xl-10 col-lg-6 col-md-6 col-sm-6 col-12">
                <hr>
            </div>
        </div>

    </div>
</div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
   
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>

