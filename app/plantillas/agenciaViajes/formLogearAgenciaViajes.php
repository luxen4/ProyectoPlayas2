<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">

    <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">

</head>
<body>

<div class="container-fluid"> 
        <div class="row">
                <div class="col-xl-12 text-center">
                    <h1>Login-Cliente</h1>
                </div>
        </div>
    <form action="" method="post">


    <div class="row">

        <div class="col-xl-2 col-lg-2 col-sm-12 col-12 "></div>
        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 cont">
                <label for="usuario">Username: <br>
                    <input type="text" name="datos[username]" id="usuario" value="<?php echo $datos['usuario'] ?? '' ?>" required><br>
                    <?=isset($errores['usuario'])?'<span class="error">'.$errores['usuario'].'</span>':'OK'?></label><br>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12 cont">
                <label for="pwd">Contraseña: <br>
                    <input type="password" name="datos[contrasenaactual]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>" required><br>
                    <?=isset($errores['pwd'])?'<span class="error">'.$errores['pwd'].'</span>':'OK'?></label>
        </div>
        <div class="col-xl-2 col-lg-2 col-sm-12 col-12 "></div>
    </div>

                <div id="botones">
                    <input type="submit" name="logincliente" value="Enviar">
                    <input type="reset" value="Limpiar">
                </div>


    </form>

</div>
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>









