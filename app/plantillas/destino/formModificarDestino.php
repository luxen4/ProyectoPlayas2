<?php ob_start();                                   // Formulario de inscripción de Destinos //
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Añadir Nuevo Destino</title>

  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href="web/css/styles.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>

<div class="container">
<div class="row">
      <div class="col-xl-12 text-center">
        <h1>Modificación de un Destino</h1>
      </div>
    </div>
  <form action="" method="POST">
    
        
    <?php $infoDestino=$_SESSION['infoDestino'];?>

  <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6 col-12 cont">
                    <div>
                    <?php echo "Nombre: " . pasarUtf8($infoDestino[0]->nombre_Lugar) . "<br>" ; ?>
                        <label for="nombre">Nombre del Destino</label> <br>
                        <input type="text" name="datos[nombre]" id="nombre" value="<?php echo (pasarUtf8($infoDestino[0]->nombre_Lugar)) ?? '' ?>" 
                        
                        size="12" maxlength="50" required><br>
                        <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>
     
                <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6 col-12 cont">
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <?php echo "Provincia: " . pasarUtf8($infoDestino[0]->prov_Depart) . "<br>" ; ?>
                      <label for="provDepart">Provincia</label><br>
                        <select id="" name="datos[provinciadepartamento]" >
                          <option value="" selected>Seleccione, por favor!</option>
                          <option <?php if(!empty($datos)){ if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "La Rioja")?"  selected" : "";}} ?>  value="La Rioja">La Rioja</option>
                          <option <?php if(!empty($datos)){ if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Cantabria")?" selected" : "";}} ?>  value="Cantabria">Cantabria</option>
                          <option <?php if(!empty($datos)){ if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Bizkaia")?"   selected" : "";}} ?>  value="Bizkaia">Bizkaia</option>
                          <option <?php if(!empty($datos)){ if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Guipuzkoa")?" selected" : "";}} ?>  value="Guipuzkoa">Guipuzkoa</option>
                          <option <?php if(!empty($datos)){ if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Aquitania")?" selected" : "";}} ?>  value="Aquitania">Aquitania</option>
                        </select><br>
                      <?php if(isset($datos)){if(isset($errores['provinciadepartamento'])){?><span class="error"><?= $errores['provinciadepartamento'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>
                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <?php echo "Comunidad: " . pasarUtf8($infoDestino[0]->com_Reg) . "<br>" ; ?>
                    <label for="comunidadregion">Comunidad</label><br>
                        <select id="comunidadregion" name="datos[comunidadregion]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidadregion"])){echo ($datos["comunidadregion"] === "La Rioja")?"selected" : ""; }}?>     value="La Rioja">La Rioja</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidadregion"])){echo ($datos["comunidadregion"] === "Pais Vasco")?"selected" : "";}}?>    value="Pais Vasco">Pais Vasco</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidadregion"])){echo ($datos["comunidadregion"] === "Navarra")?"selected" : "";}}?>       value="Navarra">Navarra</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidadregion"])){echo ($datos["comunidadregion"] === "Cantabria")?"selected" : ""; }}?>    value="Cantabria">Cantabria</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidadregion"])){echo ($datos["comunidadregion"] === "Aquitania")?"selected" : "";}} ?>    value="Aquitania">Aquitania</option>
                        </select><br>
                    <?php if(isset($datos)){if(isset($errores['comunidadregion'])){?><span class="error"><?= $errores['comunidadregion'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>

                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <?php echo "País: " . pasarUtf8($infoDestino[0]->pais) . "<br>" ; ?>
                    <label for="pais">País</label><br>
                        <select id="pais" name="datos[pais]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["pais"])){echo ($datos["pais"] === "Francia")?"selected" : ""; }}?> value="Francia">Francia</option>
                            <option <?php if(!empty($datos)){if(isset($datos["pais"])){echo ($datos["pais"] === "España")?"selected" : "";}}?>   value="España">España</option>
                        </select><br>
                    <?php if(isset($datos)){if(isset($errores['pais'])){?><span class="error"><?= $errores['pais'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>

</div>
<?php //var_dump($todosBusesCompanias);?>

<div class="row">
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 cont">
        <?php echo "Fecha del Viaje: " . pasarUtf8($infoDestino[0]->fecha_Viaje) . "<br>" ; ?>
          <label for="fViaje">Fecha del viaje</label><br>
          <input type="date" name="datos[fechaviaje]" id="sexo" value="<?php echo $datos['fechaviaje'] ?? '' ?>" ><br>
          <?php if(isset($datos)){if(isset($errores['fechaviaje'])){?><span class="error"><?= $errores['fechaviaje'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        </div>

        <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6 col-12 cont">
        <?php echo "Kilómetros: " . pasarUtf8($infoDestino[0]->kilometrosIdaVuelta) . "<br>" ; ?>
            <label for="kilometros">Kilometros</label><br>
            <input id="kilometros" type="number"  name="datos[kilometros]" value="<?php echo (pasarUtf8($infoDestino[0]->kilometrosIdaVuelta)) ?? '' ?>" placeholder="1km" step="0.5" min="12" max="500" size="3" required > <br>
            <?php if(isset($datos)){if(isset($errores['kilometros'])){?><span class="error"><?= $errores['kilometros'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        </div>

        <div class="col-xl-3 col-lg-2 col-md-6 col-sm-6 col-12 cont">
        <?php echo "Precio: " . pasarUtf8( round($infoDestino[0]->euros,2,PHP_ROUND_HALF_DOWN)) . "€<br>" ; ?>
      <!--  echo round($desti, 2, PHP_ROUND_HALF_DOWN) . "€";-->
            <label for="precio">Precio</label><br>
            <input id="precio" type="number" name="datos[euros]" value="<?php echo $datos['euros'] ?? '' ?>" placeholder="10euros" step="0.5" min="12" max="20" size="3" required> <br>
            <?php if(isset($datos)){if(isset($errores['euros'])){?><span class="error"><?= $errores['euros'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        </div>
<?php // var_dump($todosBusesCompanias);// die();?>
        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 cont">
                      <?php echo "Matricula: " . pasarUtf8($infoDestino[0]->matricula) . "<br>" ; ?>
                          <label for="busasignado">Matricula Bus</label> <br>

              <select id="" name="datos[busasignado]" >
                                            <option value="" selected>Seleccione!</option>
<!--$busesCompania para su predeterminada-->
                              

<?php        

                  $busesCompaniaPredeterminada=$busesCompania;
                for($i=0; $i<count($busesCompaniaPredeterminada);$i++){
                $matriculaBus=$busesCompaniaPredeterminada[$i]->matricula; 
                $plazas=$busesCompaniaPredeterminada[$i]->plazas; 
                $nombreCompaniaBuses=$busesCompaniaPredeterminada[$i]->nombre; 
                $codBus= $busesCompaniaPredeterminada[$i]->cod_Bus; 
                $opcionBus=$matriculaBus . " // " .  $plazas . " plazas... " . $nombreCompaniaBuses;?>
                <option value="<?php echo($codBus);?>"><?php echo($opcionBus);?></option><?php }?>


                  <?php   for($i=0; $i<count($todosBusesCompanias);$i++){
                            $matriculaBus=$todosBusesCompanias[$i]->matricula; 
                            $codBus= $todosBusesCompanias[$i]->cod_Bus; 
                            $opcionBus= $todosBusesCompanias[$i]->matricula . "//" .  $todosBusesCompanias[$i]->plazas . " plazas... " . $todosBusesCompanias[$i]->nombre;?>
                            <option value="<?php echo($codBus);?>"><?php echo($opcionBus);?></option>            
                  <?php }?>

              </select>
                      <!--   <input id="busasignado" type="text" name="datos[busasignado]" value="<?php echo $datos['busasignado'] ?? '' ?>"> --><br>
                          <?=isset($errores['busasignado'])?'<span class="error">'.$errores['busasignado'].'</span>':'<span class="ok">OK</span>'?></label>
        </div>





<!--        <div class="col-xl-6 col-lg-6 col-sm-6 col-md-6 col-12 cont">
            <div>
              <label for="agenciaviajes">Agencia de Viajes que lo oferta: <br>
                <select name="datos[agenciaviajes]" id="agengiaviajes">
                <option value="" selected>Seleccione, por favor!</option>
<?php
 if(!empty($datos)){?>





                  <option <?php 
                  if(!empty($datos)){
                    if(isset($datos["agenciaviajes"])){
                      echo ($datos["agenciaviajes"] === "España")?"selected" : "";
                    }
                  }
                  ?> value="España">Gran Reserva</option>


                  <option <?php 
                  if(!empty($datos)){
                    if(isset($datos["agenciaviajes"])){
                      echo ($datos["agenciaviajes"] === "Francia")?"selected" : "";
                    }
                  }
                  ?> value="Francia">Azul Marino</option>
<?php };?>
                </select><br>
              <?=isset($errores['agenciaviajes'])?'<span class="error">'.$errores['agenciaviajes'].'</span>':'<span class="ok">OK</span>'?></label>
            </div> 
        </div>
</div>-->

  </div>  


    <div class="row">
      <div id="seg" class="col-xl-12 text-center">
        <label for="estaseguro">
        <input id="estaseguro" type="checkbox" name="datos[estaseguro]"> Estoy seguro de modificar el destino.</label> 
      </div>
    </div>


<div class="row">
 <!-- <div class="col-xl-3" style="background-color:yellow;"></div>-->
    <div id="botones" class="col-xl-12">
        <input type="submit" name="modificardestino" value="Modificar">
        <input type="reset" value="Limpiar">
    </div> 
 <!-- <div class="col-xl-3" style="background-color:yellow;"></div>-->
</div>


  </form>
</div>

</div>

  <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>

<!--
<?php if(isset($_SESSION['perfil'])){ if ($_SESSION['perfil']['roll']=="agenciabuses"){?> disabled <?php }}?>><br>  
-->