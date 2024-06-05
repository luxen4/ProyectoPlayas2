<?php ob_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todos los destinos</title>

  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrarfiltrados.css">

</head>
<body>

<form action="" method="post">

<?php 


require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Modelo/buscadoresfantasma.inc'; ?>

  <script>
        $(".flip").click(function(){
        $(this).parents(".card").toggleClass("flipped");
      });
      $(".clickcard").click(function(){
        $(this).toggleClass("flipped");
      });
  </script>
    
</body>
</html>


 <?php $contenido = ob_get_clean() ?>
 <?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php' ?>
      


 <style>
.front{
  background-image:url('https://i.imgur.com/W3tra4F.gif');
  z-index:1;
  box-shadow: 5px 5px 5px #aaa;
}
</style>


 






