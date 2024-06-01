<?php ob_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Darse de baja de la aplicación</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>
    <link rel="stylesheet" type="text/css" href='web/css/stylesmostrar.css'/>

</head>
<body>


<div class="container">
    <form action="" method="post">
        <div class="row">
            <div class="col-xl-12 text-center">
                <h1>Baja de un Cliente</h1>
            </div>
        </div>


    <div class="row">
        <div class="col-xl-2 col-lg-2"></div>
        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
            <label for="username">Username</label><br>
            <input type="username" name="datos[username]" id="username" value="<?php echo $datos['username'] ?? '' ?>" required><br>
        </div>

        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
            <label for="pwd">Contraseña</label> <br>
            <input type="password" name="datos[contrasenaactual]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>" required><br>
        </div>
        <div class="col-xl-2 col-lg-2"></div>
    </div>


    <div class="row">
        <div id="seg" class="col-xl-8 text-center col-lg-8 col-md-4 col-sm-4 col-4">
                <label for="estaseguro">
                <input id="estaseguro" type="checkbox" name="datos[estaseguro]"> Doy mi consentimiento.</label>
        </div>
    </div>

    <div id="botones">
        <input type="submit" name="autobajacliente" value="Baja">
        <input type="reset" value="Limpiar">
    </div>


    </form>
</div></div>
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>

<?php $contenido = ob_get_clean()?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>
