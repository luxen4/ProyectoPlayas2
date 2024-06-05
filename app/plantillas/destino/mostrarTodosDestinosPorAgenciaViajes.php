<?php ob_start();?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todos los destinos</title>
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrarfiltrados.css">
</head>
<body>

<form action="" method="post">
<?php require __DIR__ . '/../../../fuente/Modelo/buscadores.inc'; ?>
     
<div class="row">
      <div class="col-xl-12 text-center col-lg-6 col-md-6 col-sm-6 col-12 cont">
          <h1>Todos destinos ordenados por Agencia de Viajes</h1>
      </div>
    </div> 
</form>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>


 <?php $contenido = ob_get_clean() ?>

 <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>

