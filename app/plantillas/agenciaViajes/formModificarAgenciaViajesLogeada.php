<?php ob_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Modificar Agencia de Viajes</title>
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
        <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
        <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
        <link rel="stylesheet" type="text/css" href="web/css/styles.css">
        <link rel="stylesheet" type="text/css" href="web/css/forms.css">
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>
<div class="container"> 
            <div class="row">
                <div class="col-xl-12 text-center">
                    <h1>Modificación de datos de una Agencia de Viajes</h1>
                </div>
            </div>
  <br>
    <form action="" method="POST">
<!--Selects en los campos que permitan y desde el archivo de NuevaAgenciaViajes.php-->
            <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                        <?php echo "Nombre: " . pasarUtf8($_SESSION['perfil']['name']) . "<br>" ; ?> 
                            <label for="nombre">Nombre</label><br>
                            <input type="text" name="datos[nombre]" id="nombre" value="<?php echo(pasarUtf8($_SESSION['perfil']['name'])) ?? '' ?>"size="10" required> <br>
                            <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                           <!-- <?=isset($errores['nombre'])?'<span class="error">'.$errores['nombre'].'</span>':'OK'?>-->
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                        <?php echo "NIF: " . pasarUtf8($_SESSION['perfil']['nif']) . "<br>" ; ?> 
                            <label for="nif">NIF</label><br>
                            <input type="text" name="datos[nif]" id="nif" value="<?php echo(pasarUtf8($_SESSION['perfil']['nif'])) ?? '' ?>"size="10" required> <br>
                            <?php if(isset($datos)){if(isset($errores['nif'])){?><span class="error"><?= $errores['nif'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                        <?php echo "Dirección: " . pasarUtf8($_SESSION['perfil']['direcion']) . "<br>" ; ?> 
                            <label for="direccion">Dirección</label> <br>
                            <input type="text" name="datos[direccion]" id="direccion" value="<?php echo(pasarUtf8($_SESSION['perfil']['direcion'])) ?? '' ?>"size="13" required> <br>
                            <?php if(isset($datos)){if(isset($errores['direccion'])){?><span class="error"><?= $errores['direccion'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>

                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                        <?php echo "Código Postal: " . pasarUtf8($_SESSION['perfil']['cp']) . "<br>" ; ?> 
                              <label for="cp">Código Postal</label><br>
                              <input type="text" name="datos[cp]" id="cp" value="<?php echo(pasarUtf8($_SESSION['perfil']['cp'])) ?? '' ?>" size="6" required> <br>
                              <?php if(isset($datos)){if(isset($errores['cp'])){?><span class="error"><?= $errores['cp'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>
                </div>
            

            <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                        <?php echo "Localidad: " . pasarUtf8($_SESSION['perfil']['localidad']) . "<br>" ; ?> 
                          <label for="localidad">Localidad</label> <br>
                          <input type="text" name="datos[localidad]" id="localidad" value="<?php echo(pasarUtf8($_SESSION['perfil']['localidad']))  ?? '' ?>"size="10" required> <br>
                          <?php if(isset($datos)){if(isset($errores['localidad'])){?><span class="error"><?= $errores['localidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                        </div>
              
 
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                        <?php echo "Provincia: " . pasarUtf8($_SESSION['perfil']['provincia']) . "<br>" ; ?> 
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


                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                        <?php echo "Comunidad: " . pasarUtf8($_SESSION['perfil']['comunidad']) . "<br>" ; ?> 
                          <label for="comunidad">Comunidad</label><br>
                         <!-- <input type="text" name="datos[comunidad]" id="cp" value="<?php echo $datos['comunidad'] ?? '' ?>"required> <br</label><br>-->
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

                    <!--    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                        <?php echo "País: " . pasarUtf8($_SESSION['perfil']['pais']) . "<br>" ; ?> 
                          <label for="pais">Pais: (select</label> <br>
                          <input type="text" name="datos[pais]" id="pais" value="<?php echo $datos['pais'] ?? '' ?>"required> <br><br>
                          <?php if(isset($datos)){if(isset($errores['pais'])){?><span class="error"><?= $errores['pais'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                          <?=isset($errores['pais'])?'<span class="error">'.$errores['pais'].'</span>':'OK'?><br>
                      </div>
                    -->

                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <?php echo "País: " . pasarUtf8($_SESSION['perfil']['pais']) . "<br>" ; ?> 
                    <label for="pais">País</label> <br>
                        <select id="pais" name="datos[pais]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["pais"])){echo ($datos["pais"] === "Francia")?"selected" : ""; }}?> value="Francia">Francia</option>
                            <option <?php if(!empty($datos)){if(isset($datos["pais"])){echo ($datos["pais"] === "España")?"selected" : "";}}?>   value="España">España</option>
                        </select><br>
                   
                    <?php if(isset($datos)){if(isset($errores['pais'])){?><span class="error"><?= $errores['pais'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>



            </div> 

            <div class="row">
                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 cont">
                  <?php echo "Email: " . pasarUtf8($_SESSION['perfil']['email']) . "<br>" ; ?> 
                      <label for="email">Email</label><br>
                      <input type="text" name="datos[email]" id="email" placeholder="superlaya50@hotmail.com" value="<?php echo(pasarUtf8($_SESSION['perfil']['email'])) ?? '' ?>"required> <br>
                      <?php if(isset($datos)){if(isset($errores['email'])){?><span class="error"><?= $errores['email'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                  </div>

                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 cont">
                  <?php echo "Teléfono de Reserva: " . pasarUtf8($_SESSION['perfil']['telefono_Reserva']) . "<br>" ; ?> 
                      <label for="tlfnoReserva">Teléfono de Reserva</label> <br>
                      <input type="text" id="tlfnoReserva" name="datos[tlfnoReserva]" placeholder="637117965" value="<?php echo(pasarUtf8($_SESSION['perfil']['telefono_Reserva'])) ?? '' ?>"required> <br>
                      <?php if(isset($datos)){if(isset($errores['tlfnoReserva'])){?><span class="error"><?= $errores['tlfnoReserva'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                  </div>

                  <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 cont">
                  <?php echo "Teléfono de la Agencia: " . pasarUtf8($_SESSION['perfil']['telefono_Agencia']) . "<br>" ; ?> 
                      <label for="tlfnoAgencia">Teléfono de la Agencia</label><br>
                      <input type="text" name="datos[tlfnoAgencia]" id="tlfnoAgencia" placeholder="637117965" value="<?php echo(pasarUtf8($_SESSION['perfil']['telefono_Agencia'])) ?? '' ?>"required> <br>
                      <?php if(isset($datos)){if(isset($errores['tlfnoAgencia'])){?><span class="error"><?= $errores['tlfnoAgencia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                  </div>
            </div>

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label>Horario mañana <br>De: 
                    <input type="time" name="datos[horaEntrManana]" value="00:00:00" max="23:59:59" min="0:00:00" step="1" required>
                    <?php if(isset($datos)){if(isset($errores['horaEntrManana'])){?><span class="error"><?= $errores['horaEntrManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    <br> a:
                    <input type="time" name="datos[horaSalManana]"  value="00:00:00" max="23:59:59" min="0:00:00" step="1" required></label>
                    <?php if(isset($datos)){if(isset($errores['horaSalManana'])){?><span class="error"><?= $errores['horaSalManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
                    <label>Horario tarde <br>De: 
                    <input type="time" name="datos[horaEntrTarde]"   value="00:00:00" max="23:59:59" min="0:00:00" step="1" required>
                    <?php if(isset($datos)){if(isset($errores['horaEntrTarde'])){?><span class="error"><?= $errores['horaEntrTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    <br> a:
                    <input type="time" name="datos[horaSalTarde]"    value="00:00:00" max="23:59:59" min="0:00:00" step="1" required><br</label>
                    <?php if(isset($datos)){if(isset($errores['horaSalTarde'])){?><span class="error"><?= $errores['horaSalTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>

              <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4 cont">
              <?php echo "Salida: " . pasarUtf8($_SESSION['perfil']['lugar_SalidaPredeterminado']) . "<br>" ; ?> 
                    <label for="lugarSalida">Lugar Salida</label><br>
                    <input type="text" name="datos[lugarSalida]" id="lugarSalida" value="<?php echo(pasarUtf8($_SESSION['perfil']['lugar_SalidaPredeterminado']))  ?? '' ?>"required> <br>
                    <?php if(isset($datos)){if(isset($errores['lugarSalida'])){?><span class="error"><?= $errores['lugarSalida'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>

              </div>

            </div>
   

        <div class="row">
              
        <!--    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 cont"></div>-->
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 cont">
                              
                                <?php echo "C. Bus Habitual: " .  pasarUtf8($_SESSION['perfil']['nombreAgenciaBuses']) . "<br>" ; ?> 
                                    <label for="compania">C. Bus Habitual <br>
                                        
                                        <input id="button1" type="button" onclick="aparece()" value="Desplegar">   
                                        <br>

                                    <select id="compania_bus1" name="datos[companiabus]" >
                                        <option value="" selected>Seleccione, por favor!</option>  
                                                                 
                            <?php 

                                
                                    for($i=0; $i<count($agenciasBuses);$i++){
                                        $codAgenciaBuses=$agenciasBuses[$i]->cod_AgenciaBuses;
                                        $agenciaBuses=$agenciasBuses[$i]->nombre;   ?>
                                        <option value="<?php echo($codAgenciaBuses);?>"><?php echo($agenciaBuses);?></option>
                            <?php }?>

                                    </select><br>
                                    
                              
                                <?php if(isset($datos)){if(isset($errores['compania'])){?><span class="error"><?= $errores['compania'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>

                </div>
            
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-6 cont">
                    
                    <label for="compania">Compañías Bus</label> <br>
                        
                        <input id="button2" type="button" onclick="aparece()" value="Desplegar">   
                        
                        <br>
                    <select id="compania_bus2" name="compania_bus[]" multiple>
                             <!--   <option value="" selected>Seleccione, por favor!</option> --->
                                                        
                        <?php //-----------------------------------------------------------------------------
                            for($i=0; $i<count($agenciasBuses);$i++){
                                $codAgenciaBuses=$agenciasBuses[$i]->cod_AgenciaBuses;
                                $nombreAgenciaBuses=$agenciasBuses[$i]->nombre?>
                                <option value="<?php echo($codAgenciaBuses);?>"><?php echo($nombreAgenciaBuses);?></option>
                        <?php }?>

                        <?php                                                     // con foreach
                        /* $result=$agenciasBuses;
                            foreach($result as $opciones){
                                $codAgenciaBuses=$opciones->cod_AgenciaViajes;
                                $nombreAgenciaBuses=$opciones->nombre;?>
                                <option value="<?php echo($codAgenciaBuses);?>"><?php echo($nombreAgenciaBuses);?></option>
                            -------------------------------------------------------------------------------    
                        <?php   } */?>
                    </select><br>
                
                <?=isset($errores['compania'])?'<span class="error">'.$errores['compania'].'</span>':'<span class="ok">OK</span>'?><br>
                </div>
</div>
        <!--    <div class="col-xl-1 col-lg-1 col-md-1 col-sm-1 col-1 cont"></div>-->

        <div> 

            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <?php echo "Username: " . pasarUtf8($_SESSION['perfil']['username']) . "<br>" ; ?> 
                    <label for="username">Inserte Username</label><br>
                    <input type="username" name="datos[username]" id="username" value="<?php echo(pasarUtf8($_SESSION['perfil']['username'])) ?? '' ?>"
                    maxlength="20" required>
                </div>


                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <?php echo "Contraseña => *<br>" ; ?> 
                    <label for="pwd">Nueva Contraseña Agencia</label> <br>
                    <input type="password" name="datos[contrasena]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"required> <br>
                </div>

                <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cont"><br>
                    <label for="pwd">Vuelva escribir la Contraseña</label><br>
                    <input type="password" name="datos[contrasenarepetida]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"required> <br>
                </div>
            <div>

            <div class="row">
              <!--  <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 " style="background-color: white; border:none;"></div>-->
                 
                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                    <?php echo "Pago Online: " . pasarUtf8($_SESSION['perfil']['pago_Online']) . "<br>" ; ?>
                    <label>Pago Online</label><br>
                      <label for="onlinesi">
                      <input type="radio" id="onlinesi" name="datos[pagoonline]" value="SI" checked> Si</label>
              
                      <label for="onlineno" style="margin-left:2em">
                      <input type="radio" id="onlineno" name="datos[pagoonline]" value="NO"> No</label>
                </div>

                <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <?php echo "Nº cuenta: " . pasarUtf8($_SESSION['perfil']['num_CuentaPagosOnline']) . "<br>" ; ?> 
                      <label for="email">Nº. Cuenta Pagos Online</label> 
                      <input type="text" name="datos[numCuenta]" id="email" value="<?php echo $datos['numCuenta'] ?? '' ?>" required> <br>
                      <?php if(isset($datos)){if(isset($errores['numCuenta'])){?><span class="error"><?= $errores['numCuenta'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                </div>

               <!-- <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont" style="background-color: white; border:none;"></div>-->
            </div>

            <div id="seguridad" class="row">
                <div id="seg" class="col-xl-12 text-center">
                    <label for="estaseguroo">
                    <input id="estaseguroo" type="checkbox" name="datos[estaseguro]"> Estoy seguro de modificar esta Agencia de Viajes</label>
                </div>
            </div>

          <div id="botones"  style="text-align:center;">
              <input class="front" type="submit" name="modificarAgenciaViajes" value="Modificar">
              <input  type="reset" value="Limpiar">
          </div>

          <br>
    </form>
</div></div></div></div>

  <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>
 

<?php $contenido = ob_get_clean() ?>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>


<style>
     #compania_bus1,#compania_bus2{
        display: none;
    }
</style>

<script>
	$(document).ready(function() {		// Necesário encerrar bajo .ready(function)	
		// Función que esconde el contenido de "compañía de bus"


        $("#button1").click(function() {	
			$("#compania_bus1").toggle();
		});


		$("#button2").click(function() {	
			$("#compania_bus2").toggle();
		});
	});
</script>