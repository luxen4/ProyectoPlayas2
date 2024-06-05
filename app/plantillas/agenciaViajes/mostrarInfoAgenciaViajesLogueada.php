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
<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h1>Perfil de su Agencia de Viajes</h1>
            </div>
        </div>
   
        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">    
                <hr>
            </div>
        </div>
     


        <div class="row">
            <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="infoperfil"><?php echo '<span class="s">Nombre: </span>' . pasarUtf8($agenciaViajes[0]->nombre) . "<br>" ; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">NIF: </span>' . pasarUtf8($agenciaViajes[0]->nif) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Dirección: </span>' . pasarUtf8($agenciaViajes[0]->direcion) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Código Postal: </span>' . pasarUtf8($agenciaViajes[0]->cp) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Localidad: </span>' . pasarUtf8($agenciaViajes[0]->localidad) . "<br>";?></div>
                <div class="infoperfil"><?php echo '<span class="s">Provincia: </span>' . pasarUtf8($agenciaViajes[0]->provincia) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Comunidad: </span>' . pasarUtf8($agenciaViajes[0]->comunidad) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">País: </span>' . pasarUtf8($agenciaViajes[0]->pais) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">email: </span>' . pasarUtf8($agenciaViajes[0]->email) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Teléfono de Reserva: </span>' . pasarUtf8($agenciaViajes[0]->telefono_Reserva) . "<br>"; ?> </div>
                <div class="infoperfil"><?php echo '<span class="s">Teléfono de la Agencia: </span>' . pasarUtf8($agenciaViajes[0]->telefono_Agencia) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Horario: </span>' . pasarUtf8($agenciaViajes[0]->horario_Agencia) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Pago Online: </span>' . pasarUtf8($agenciaViajes[0]->pago_Online) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s">Número de cuenta: </span>' . pasarUtf8($agenciaViajes[0]->num_CuentaPagosOnline) . "<br>"; ?></div>
                <div class="infoperfil"><?php echo '<span class="s"> Username: </span>' . pasarUtf8($agenciaViajes[0]->username) . "<br>"; ?></div>
               <!-- <div class="infoperfil"><?php echo '<span class="s">Contraseña actual:: </span>' . pasarUtf8($agenciaViajes[0]->contrasena) . "<br>"; ?></div>-->
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <hr>
            </div>
        </div>
 
        <form action="" method="post">
            <div class="row">
                <div id="seg" class="col-xl-12 text-center">
                    <label for="estaseguro">
                    <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de eliminar la Agencia de Viajes.</label>
                </div>
            </div>

            <div class="row">

                <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">  
                        <div  id="botones">  
                            <input type="submit" name="baja" value="Baja">
                            <input type="reset" value="Limpiar">
                        </div>
                </div>

            </div>
        </form>
    
    </div></div>
 
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
   
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>


