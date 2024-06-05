<?php ob_start();                                   // Formulario de registro de un nuevo Bus //

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Bus</title>
  <!--<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/>-->
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>             <!--OK-->
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href="web/css/forms.css">
</head>
<body>
<div class="container"> 

  <div class="row">
      <div class="col-xl-12 text-center">
      <h1>Modificación de un Bus</h1>
      </div>
  </div>

  <form action="" method="POST">
  
<fieldset>
    <div class="row">

            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <label for="tipobus">Tipo de Bus</label><br>
                        <select id="" name="datos[tipobus]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["tipobus"])){echo ($datos["tipobus"] === "Grande")?"selected" : ""; }}?> value="Grande">Grande</option>
                            <option <?php if(!empty($datos)){if(isset($datos["tipobus"])){echo ($datos["tipobus"] === "Mediano")?"selected" : "";}}?> value="Mediano">Mediano</option>
                            <option <?php if(!empty($datos)){if(isset($datos["tipobus"])){echo ($datos["tipobus"] === "Pequeño")?"selected" : "";}}?> value="Pequeño">Pequeño</option>
                            <option <?php if(!empty($datos)){if(isset($datos["tipobus"])){echo ($datos["tipobus"] === "Minibus")?"selected" : "";}}?> value="Minibus">Minibus</option>
                        </select><br>
                        <?php if(isset($datos)){if(isset($errores['tipobus'])){?><span class="error"><?= $errores['tipobus'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
            </div>

              <!-- https://www.yolcar.es/sabias-que/cuantas-plazas-tiene-un-autocar/ info de plazas de un bus
              Autocares de 54 plazas Autocares de 35 plazas Minibuses de 25 plazas Minibuses de 19 plazas -->
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                    <label for="numplazas">Nº de plazas</label><br>
                        <select id="" name="datos[numplazas]" >
                        <option selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["numplazas"])){echo ($datos["numplazas"] === "54")?"selected" : "";}}?> value="54">54</option>
                            <option <?php if(!empty($datos)){if(isset($datos["numplazas"])){echo ($datos["numplazas"] === "35")?"selected" : "";}}?> value="35">35</option>
                            <option <?php if(!empty($datos)){if(isset($datos["numplazas"])){echo ($datos["numplazas"] === "25")?"selected" : "";}}?> value="25">25</option>
                            <option <?php if(!empty($datos)){if(isset($datos["numplazas"])){echo ($datos["numplazas"] === "19")?"selected" : "";}}?> value="19">19</option>
                        </select><br>
                        <?php if(isset($datos)){if(isset($errores['tipobus'])){?><span class="error"><?= $errores['tipobus'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
            </div>
    </div>



    <div class="row">

          <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 cont">  
              <label for="matricula">Matricula</label><br> 
              <input type="text" name="datos[matricula]" id="matricula" value="<?php echo $datos['matricula'] ?? '' ?>" placeholder="0000 AAA" required><br>
              <?php if(isset($datos)){if(isset($errores['matricula'])){?><span class="error"><?= $errores['matricula'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-12 cont">
              <label for="anomatriculacion">Año de matriculación del bus</label><br>
              <input id="anomatriculacion" type="number" name="datos[anomatriculacion]" value="<?php echo $datos['anomatriculacion'] ?? '' ?>"placeholder="2013" required min="2010" max="2025"> <br>
              <?php if(isset($datos)){if(isset($errores['anomatriculacion'])){?><span class="error"><?= $errores['anomatriculacion'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>
    </div>

    <div class="row">
        <div id="seg" class="col-xl-12 text-center">
            <label for="estaseguro">
            <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de modificar este nuevo bus.</label>
        </div>
    </div>

    <div class="row">
          <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12"> 
              <div  id="botones">  
                    <input type="submit" name="modificacionbus" value="Modificar">
                    <input type="reset" value="Limpiar">
              </div>
          </div>
    </div>

</form>
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>





