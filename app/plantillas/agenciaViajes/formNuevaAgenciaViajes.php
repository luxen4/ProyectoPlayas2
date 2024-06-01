<?php ob_start(); 
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nueva Agencia de Viajes</title>
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <!--<link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>-->             <!--OK-->
  
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href="web/css/styles.css">
  <link rel="stylesheet" type="text/css" href="web/css/forms.css">
</head>
<body>
<div class="container"> 
  
    <form action="" method="POST">
    <div class="row">
        <div class="col-xl-12 text-center">
            <h1>Inscripción de Nueva Agencia de Viajes</h1>
        </div>
    </div>

 <!--Aunque ya estan limitado el VARCHAR en la base de datos en la tabla, lo limito aquí con el maxlength,
        además quito el REQUIRED que el filtro en su clase de validación lo recoge como campo obligatorio-->
                          
            <div class="row">
                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">  
                            <label for="nombre">Nombre de la Agencia</label> <br>
                            <input type="text" name="datos[nombre]" id="nombre" value="<?php echo $datos['nombre'] ?? '' ?>" placeholder="Viajes Laya" maxlength="90" required></label><br>                                         
                             <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                            <label for="nif">NIF</label> <br>
                            <input type="text" name="datos[nif]" id="nif" value="<?php echo $datos['nif'] ?? '' ?>" placeholder="A48265169" maxlength="10" required></label><br>
                             <?php if(isset($datos)){if(isset($errores['nif'])){?><span class="error"><?= $errores['nif'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>

                        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                            <label for="direccion">Dirección</label> <br>
                            <input type="text" name="datos[direccion]" id="direccion" value="<?php echo $datos['direccion'] ?? '' ?>" placeholder="C/Gran Vía 8 4ºA" maxlength="70" required></label> <br>
                             <?php if(isset($datos)){if(isset($errores['direccion'])){?><span class="error"><?= $errores['direccion'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>
            </div>
            

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label for="cp">Código postal</label> <br>
                    <input type="text" name="datos[cp]" id="cp" value="<?php echo $datos['cp'] ?? '' ?>" placeholder="26003" maxlength="5" required></label><br>
                     <?php if(isset($datos)){if(isset($errores['cp'])){?><span class="error"><?= $errores['cp'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label for="localidad">Localidad</label> <br>
                    <input type="text" name="datos[localidad]" id="localidad" value="<?php echo $datos['localidad'] ?? '' ?>" placeholder="Logroño" required></label><br>
                     <?php if(isset($datos)){if(isset($errores['localidad'])){?><span class="error"><?= $errores['localidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>
                        
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <label for="provDepart">Provincia</label> <br>
                        <select id="" name="datos[provincia]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "La Rioja")?"selected" : ""; }}?> value="La Rioja">La Rioja</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Bizkaia")?"selected" : "";}}?>       value="Bizkaia">Bizkaia</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Alava")?"selected" : "";}}?>         value="Álava">Álava</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Navarra")?"selected" : ""; }}?>      value="Navarra">Navarra</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Guipuzkoa")?"selected" : ""; }}?>    value="Guipúzkoa">Guipúzkoa</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Aquitania")?"selected" : "";}} ?>    value="Aquitania">Aquitania</option>
                        </select><br>
                     <?php if(isset($datos)){if(isset($errores['provincia'])){?><span class="error"><?= $errores['provincia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <label for="comunidad">Comunidad</label> <br>
                        <select id="comunidad" name="datos[comunidad]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidad"])){echo ($datos["comunidad"] === "La Rioja")?"selected" : ""; }}?>     value="La Rioja">La Rioja</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidad"])){echo ($datos["comunidad"] === "País Vasco")?"selected" : "";}}?>    value="País Vasco">Pais Vasco</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidad"])){echo ($datos["comunidad"] === "Navarra")?"selected" : "";}}?>       value="Navarra">Navarra</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidad"])){echo ($datos["comunidad"] === "Cantabria")?"selected" : ""; }}?>    value="Cantabria">Cantabria</option>
                            <option <?php if(!empty($datos)){if(isset($datos["comunidad"])){echo ($datos["comunidad"] === "Aquitania")?"selected" : "";}} ?>    value="Aquitania">Aquitania</option>
                        </select><br>
                     <?php if(isset($datos)){if(isset($errores['comunidad'])){?><span class="error"><?= $errores['comunidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                   
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <label for="pais">País</label> <br>
                        <select id="pais" name="datos[pais]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["pais"])){echo ($datos["pais"] === "Francia")?"selected" : ""; }}?> value="Francia">Francia</option>
                            <option <?php if(!empty($datos)){if(isset($datos["pais"])){echo ($datos["pais"] === "España")?"selected" : "";}}?>   value="España">España</option>
                        </select><br>
                     <?php if(isset($datos)){if(isset($errores['pais'])){?><span class="error"><?= $errores['pais'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                      <label for="email">Email</label> <br>
                      <input type="text" name="datos[email]" id="email" placeholder="superlaya50@hotmail.com" value="<?php echo $datos['email'] ?? '' ?>"required></label><br>
                       <?php if(isset($datos)){if(isset($errores['email'])){?><span class="error"><?= $errores['email'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                  </div>
            </div>


            Queda de validar los campos de abajo


            <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                      <label for="tlfnoReserva">Teléfono de Reserva Telefónica</label> <br>
                      <input type="text" id="tlfnoReserva" name="datos[tlfnoReserva]" placeholder="637117965" value="<?php echo $datos['tlfnoReserva'] ?? '' ?>"required> <br>
                       <?php if(isset($datos)){if(isset($errores['tlfnoReserva'])){?><span class="error"><?= $errores['tlfnoReserva'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                  </div>

                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                      <label for="tlfnoAgencia">Teléfono de la Agencia</label> <br>
                      <input type="text" name="datos[tlfnoAgencia]" id="tlfnoAgencia" placeholder="637117965" value="<?php echo $datos['tlfnoAgencia'] ?? '' ?>"required> <br> <?php if(isset($datos)){if(isset($errores['tlfnoAgencia'])){?><span class="error"><?= $errores['tlfnoAgencia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                  </div>

                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label>Horario de mañana</label><br> 
                    <label for="horaEntrManana">De:</label>
                    <input id="horaEntrManana" type="time" name="datos[horaEntrManana]" value=<?php echo $datos['horaEntrManana'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required>
                    <?php if(isset($datos)){if(isset($errores['horaEntrManana'])){?><span class="error"><?= $errores['horaEntrManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    <br>
                    <label for="horaEntrManana">a:</label> 
                    <input type="time" name="datos[horaSalManana]"  value=<?php echo $datos['horaSalManana'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required>
                     <?php if(isset($datos)){if(isset($errores['horaSalManana'])){?><span class="error"><?= $errores['horaSalManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>
            </div>

            <div class="row">
                

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label>Horario de tarde</label> <br>
                    <label for="horaEntrTarde">De:</label>
                    <input type="time" name="datos[horaEntrTarde]" value=<?php echo $datos['horaSalManana'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required> 
                    <?php if(isset($datos)){if(isset($errores['horaEntrTarde'])){?><span class="error"><?= $errores['horaEntrTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    <br>
                    <label for="horaSalTarde">a:</label>    
                    <input type="time" name="datos[horaSalTarde]" value=<?php echo $datos['horaSalTarde'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required>
                     <?php if(isset($datos)){if(isset($errores['horaSalTarde'])){?><span class="error"><?= $errores['horaSalTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label for="lugarSalida">Lugar de Salida Predeterminado</label> <br>
                    <input type="text" name="datos[lugarSalida]" id="lugarSalida" value="<?php echo $datos['lugarSalida'] ?? '' ?>" placeholder="Estación de Buses de Logroño" required><br>
                     <?php if(isset($datos)){if(isset($errores['lugarSalida'])){?><span class="error"><?= $errores['lugarSalida'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
              </div>



                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont"><!--.front -->
                    <div class=" col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12 tres">
                        <label for="compania">Compañía de Bus Habitual</label> <br>
                        <select id="" name="datos[companiabus]]" >
                                    <option value="" selected>Seleccione!</option>
                                                            
                            <?php //-----------------------------------------------------------------------------
                                for($i=0; $i<count($agenciasBuses);$i++){
                                    $codAgenciaBuses=$agenciasBuses[$i]->cod_AgenciaBuses;
                                    $nombreAgenciaBuses=$agenciasBuses[$i]->nombre?>
                                    <option value="<?php echo($codAgenciaBuses);?>"><?php echo($nombreAgenciaBuses);?></option>
                            <?php }?>

                            <?php                                                   // con foreach
                            /* $result=$agenciasBuses;
                                foreach($result as $opciones){
                                    $codAgenciaBuses=$opciones->cod_AgenciaViajes;
                                    $nombreAgenciaBuses=$opciones->nombre;?>
                                    <option value="<?php echo($codAgenciaBuses);?>"><?php echo($nombreAgenciaBuses);?></option>
                                -------------------------------------------------------------------------------    
                            <?php   } */?>
                        </select>
                    </div>
                    <?php if(isset($datos)){if(isset($errores['compania'])){?><span class="error"><?= $errores['compania'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>

                </div> 

            </div>

<div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-3 tres cont">
                   
                        <label for="compania">Compañías Bus: </label> <br>
                            
                         <input id="button" type="button" onclick="aparece()" value="Desplegar">   
                            
                            <br>
                        <select id="compania_bus" name="compania_bus[]" multiple>
                                   <!-- <option value="" selected>Seleccione!</option>--> <!--Lo omito ya que si se selecciona tira exception/fallo en el try-catch-->
                                                            
                            <?php //-----------------------------------------------------------------------------
                                for($i=0; $i<count($agenciasBuses);$i++){
                                    $codAgenciaBuses=$agenciasBuses[$i]->cod_AgenciaBuses;
                                    $nombreAgenciaBuses=$agenciasBuses[$i]->nombre?>
                                    <option value="<?php echo($codAgenciaBuses);?>"><?php echo($nombreAgenciaBuses);?></option>
                            <?php }?>

                        </select>
                        <?php if(isset($datos)){if(isset($errores['compania'])){?><span class="error"><?= $errores['compania'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>                    
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 cont">
                    <label for="username">Username</label> <br>
                    <input type="username" name="datos[username]" id="username" value="<?php echo $datos['username'] ?? '' ?>" maxlength="20" placeholder="viajeslaya21" required> <br>
                   </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 cont">
                    <label for="pwd">Contraseña</label> <br>
                    <input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>" placeholder="***" required> <br>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 cont">
                    <label for="pwd">Vuelva escribir la Contraseña</label> <br>
                    <input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>" placeholder="***" required> <br> </div>
<div>

            <div class="row">
                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"></div>
                <div class="col-xl-2 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                    <label>Pago Online</label> <br>
                      <label for="onlinesi">
                      <input type="radio" id="onlinesi" name="datos[pagoonline]" value="SI" checked> SI</label>
              
                      <label for="onlineno" style="margin-left:2em">
                      <input type="radio" id="onlineno" name="datos[pagoonline]" value="NO"><label for="onlineno"> NO</label></div>

                <div class="col-xl-4 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                      <label for="email">Nº Cuenta Pagos Online: 
                      <input type="text" name="datos[numCuenta]" id="numCuenta" value="<?php echo $datos['numCuenta'] ?? '' ?>" placeholder="ES-12345678" required></label>
                      <?php if(isset($datos)){if(isset($errores['numCuenta'])){?><span class="error"><?= $errores['numCuenta'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"></div>
            </div>

            <div class="row">
            <div id="seg" class="col-xl-12 text-center">
                <label for="estaseguro">
                <input id="estaseguro" type="checkbox" name="datos[estaseguro]"> Estoy seguro de añadir este nuevo destino.</label>
            </div>
            </div>
            
          <div id="botones" style="text-align:center;">
              <input type="submit" name="nuevaAgenciaViajes" value="Crear">
              <input type="reset" value="Limpiar">
          </div>
    </form>
</div></div>

  <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>


<?php $contenido = ob_get_clean() ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>


<style>
    .ok{color:green;}
    .error{color:red;}

   
</style>




<style>
     #compania_bus{
        display: none;
    }
</style>

<script>
	$(document).ready(function() {		// Necesário encerrar bajo .ready(function)	
		// Función que esconde el contenido de "compañía de bus"
		$("#button").click(function() {	
			$("#compania_bus").toggle();
		});
	});
</script>