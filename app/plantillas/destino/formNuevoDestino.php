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
  <link rel="stylesheet" type="text/css" href='web/css/plantabus.css'/>
  <link rel="stylesheet" type="text/css" href='web/css/forms.css'/>  
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>   


</head>
<body>


<div class="container">
      <div class="row">
          <div class="col-xl-12 text-center">
            <h1>Inscripción de Nuevo Destino</h1>
          </div>
      </div>

  <form action="" method="POST">
 
    <div class="row">
                <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6 col-12 cont">
                    <div>
                        <label for="nombre">Nombre del Destino</label> <br>
                        <input type="text" name="datos[nombre]" id="nombre" value="<?php echo $datos['nombre'] ?? '' ?>" size="20" maxlength="50" placeholder="Alberire" required><br>
                        <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>
                    
                <div class="col-xl-3 col-lg-6 col-sm-6 col-md-6 col-12 cont">
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                      <label for="provDepart">Provincia</label> <br>
                        <select id="" name="datos[provinciadepartamento]" >
                          <option value="" selected>Seleccione, por favor!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "La Rioja")?"selected" : "";}}?>  value="Cantabria">La Rioja</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Cantabria")?"selected" : "";}}?> value="Cantabria">Cantabria</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Bizkaia")?"selected" : "";}}?>   value="Bizkaia">Bizkaia</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Guipuzkoa")?"selected" : "";}}?> value="Guipuzkoa">Guipuzkoa</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provinciadepartamento"])){echo ($datos["provinciadepartamento"] === "Aquitania")?"selected" : "";}}?> value="Aquitania">Aquitania</option>
                        </select><br>
                      <?php if(isset($datos)){if(isset($errores['provinciadepartamento'])){?><span class="error"><?= $errores['provinciadepartamento'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>

                </div>

                
                <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <label for="comunidadregion">Comunidad</label> <br>
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

<?php //var_dump($busesCompania);die();?>

<div class="row">
        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 cont">
          <label for="fViaje">Fecha del viaje</label><br>
          <input type="date" name="datos[fechaviaje]" id="sexo" value="<?php echo $datos['fechaviaje'] ?? '' ?>" ><br>
          <?php if(isset($datos)){if(isset($errores['fechaviaje'])){?><span class="error"><?= $errores['fechaviaje'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 cont">
            <label for="kilometros">Kilometros</label><br>
            <input id="kilometros" type="number"  name="datos[kilometros]" value="<?php echo $datos['kilometros'] ?? '' ?>" placeholder="1km" step="0.5" min="12" max="500" size="3" required > <br>
            <?php if(isset($datos)){if(isset($errores['kilometros'])){?><span class="error"><?= $errores['kilometros'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12 cont">
            <label for="precio">Precio</label> <br>
            <input id="precio" type="number" name="datos[euros]" value="<?php echo $datos['euros'] ?? '' ?>" placeholder="10euros" step="0.5" min="12" max="20" size="3" required> <br>
            <?php if(isset($datos)){if(isset($errores['euros'])){?><span class="error"><?= $errores['euros'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        </div>

        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 cont">
            <label for="busasignado">Matricula Bus</label> <br>

            <select id="" name="datos[busasignado]" >
                <option value="" selected>Seleccione!</option>
               
                <?php

                $busesCompaniaPredeterminada=$busesCompania;
                for($i=0; $i<count($busesCompaniaPredeterminada);$i++){
                $matriculaBus=$busesCompaniaPredeterminada[$i]->matricula; 
                $plazas=$busesCompaniaPredeterminada[$i]->plazas; 
                $nombreCompaniaBuses=$busesCompaniaPredeterminada[$i]->nombre; 
                $codBus= $busesCompaniaPredeterminada[$i]->cod_Bus; 
                $opcionBus=$matriculaBus . " // " .  $plazas . " plazas... " . $nombreCompaniaBuses;?>
                <option  style="color: #006293; background-color:#CEF0FA; font-weight: bold" value="<?php echo($codBus);?>"><?php echo($opcionBus);?></option><?php }


                $busesCompania=$busesOtrasCompanias;
                for($i=0; $i<count($busesCompania);$i++){
                      $matriculaBus=$busesCompania[$i]->matricula; 
                      $plazas=$busesCompania[$i]->plazas; 
                      $nombreCompaniaBuses=$busesCompania[$i]->nombre; 
                      $codBus= $busesCompania[$i]->cod_Bus; 
                      $opcionBus=$matriculaBus . " // " .  $plazas . " plazas... " . $nombreCompaniaBuses;?>
                        <option value="<?php echo($codBus);?>"><?php echo($opcionBus);?></option><?php }?>
            </select><br>
            <?php if(isset($datos)){if(isset($errores['busasignado'])){?><span class="error"><?= $errores['busasignado'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
        

                </select><br>
        
            </div> 
        </div>
</div> 

              <div class="row">
                <div id="seg" class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                  <label for="estaseguro">
                  <input id="estaseguro" type="checkbox" name="datos[estaseguro]"> Estoy seguro de crear este Destino.</label>
                </div>
              </div>


              <div class="row">
                  <div id="botones" class="col-xl-12">
                      <input type="submit" name="nuevodestino" value="Enviar">
                      <input type="reset" value="Limpiar">
                  </div> 
              </div>
</div>
</div>

  </form>
</div>
</div>

</div>

  <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>





































































































<style>
  .ok{color:green;}
  .error{color:red;}
</style>















<style>
  #example-multiple-optgroups{
    width: 400px;
    height: 300px;
  }
</style>
<!--
<select id="example-multiple-optgroups" multiple="multiple">

<?php
$veces=0;
foreach($busesOtrasCompanias as $bus){
  
    if($veces==0){
      $nombreCompaniaBuses=$bus->nombre;?>
      	<optgroup label=<?php echo(/*$nombreCompaniaBuses*/ "Todos_los_Buses_Disponibles");?> class="group-1"><br><?php
        $veces++;
    }

    if($veces!=0 && $veces!=144){
          $codigoBus=$bus->cod_Bus;
          $opcionBus=$bus->matricula . " // " .  $bus->plazas . " plazas... " . $bus->nombre  /*. $busesCompania[$i]['nombre']*/?>
          <option value="<?php echo($codigoBus);?>"><?php echo($opcionBus);?><?php
          $veces++;
         
    }else{
      $veces=0;
    }

}?>
		</optgroup>
	</select>-->

<!--
  <select id="example-multiple-optgroups" multiple="multiple">
		<optgroup label="Group 1" class="group-1">
			<option value="1-1">Option 1.1</option>
			<option value="1-2" selected="selected">Option 1.2</option>
			<option value="1-3" selected="selected">Option 1.3</option>
		</optgroup>
		<optgroup label="Group 2" class="group-2">
			<option value="2-1">Option 2.1</option>
			<option value="2-2">Option 2.2</option>
			<option value="2-3">Option 2.3</option>
		</optgroup>
	</select>
-->
























<!--
  <label for="kilometros">Kilometros Ida/Vuelta: <br>
  <input type="text" name="datos[kilometros]" id="plazas" value="<?php echo $datos['kilometros'] ?? '' ?>" size="17"><br>
  <?=isset($errores['kilometros'])?'<span class="error">'.$errores['kilometros'].'</span>':'OK'?></label>
-->




 <!-- <div class="row" style="border:1px solid black;">
        <div class=" col-xl-3 col-md-3 col-sm-3">
            <label for="nombre">Nombre del Lugar: <br>
            <input type="text" name="datos[nombre]" id="nombre" value="<?php echo $datos['nombre'] ?? '' ?>" size="17"><br>
            <?=isset($errores['nombre'])?'<span class="error">'.$errores['nombre'].'</span>':'OK'?></label>
        </div>

        <div class=" col-xl-3 col-md-3 col-sm-4">
            <label for="provDepart">Provincia/Departamento: <br>
            <input type="text" name="datos[provDepart]" id="provDepart" value="<?php echo $datos['provDepart'] ?? '' ?>" size="17"><br>
            <?=isset($errores['provDepart'])?'<span class="error">'.$errores['provDepart'].'</span>':'OK'?></label>
        </div> 
      
        <div class=" col-xl-3 col-md-3 col-sm-4">
          <label for="comunidadregion">Comunidadregion: <br>
          <input type="text" name="datos[comunidadregion]" id="comunidadregion" value="<?php echo $datos['comunidadregion'] ?? '' ?>" size="17"><br>
          <?=isset($errores['comunidadregion'])?'<span class="error">'.$errores['comunidadregion'].'</span>':'OK'?></label>
        </div>

        <div class=" col-xl-1 col-md-1 col-sm-4">
          <label for="pais">Pais: <br>
          <input type="text" name="datos[pais]" id="pais" value="<?php echo $datos['pais'] ?? '' ?>" size="17"><br>
          <?=isset($errores['pais'])?'<span class="error">'.$errores['pais'].'</span>':'OK'?></label>
        </div>       
  </div>
-->

<!--
    <div>
        <label for="provDepart">Provincia/Departamento(Fr): <br>
        <input type="text" name="datos[provDepart]" id="provDepart" value="<?php echo $datos['provDepart'] ?? '' ?>" size="17"><br>
        <?=isset($errores['provDepart'])?'<span class="error">'.$errores['provDepart'].'</span>':'OK'?></label>
    </div> 
-->

<!--
  <div>
        <label for="comunidadregion">Comunidadregion/Región(Fr): <br>
        <input type="text" name="datos[comunidadregion]" id="comunidadregion" value="<?php echo $datos['comunidadregion'] ?? '' ?>" size="17"><br>
        <?=isset($errores['comunidadregion'])?'<span class="error">'.$errores['comunidadregion'].'</span>':'OK'?></label>
  </div>
-->


<!--
        <label for="pais">Pais: <br>
        <input type="text" name="datos[pais]" id="pais" value="<?php echo $datos['pais'] ?? '' ?>" size="17"><br>
        <?=isset($errores['pais'])?'<span class="error">'.$errores['pais'].'</span>':'OK'?></label>
-->

