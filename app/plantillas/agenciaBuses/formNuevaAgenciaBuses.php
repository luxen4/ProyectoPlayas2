<?php ob_start();                                   // Formulario de registro de Agencia de Buses //

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <!--<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/>                Creo que lo voy a eliminar-->
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href='web/css/forms.css'/>                           <!--OK-->
  <!--<link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>-->              <!--OK-->
  <link rel="stylesheet" type="text/css" href='web/css/styles.css'>
  <link rel="stylesheet" type="text/css" href='web/css/stylesmostrar.css'>
</head>
<body>
  <!--Falta la persistencia y la validación de datos -->

<div class="container">
      <div class="row">
        <div class="col-xl-12 text-center">
            <h1>Inscripción de Nueva Agencia de Buses</h1>
        </div>
      </div> 
  <form action="" method="POST">

      <div class="row">

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> 
                <label for="nombre">Nombre</label><br>
                <input type="text" name="datos[nombre]" id="nombre" value="<?php echo $datos['nombre'] ?? '' ?>" placeholder="Autocares Laya" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                          
          </div>

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> 
                <label for="nif">NIF</label> <br>
                <input type="text" name="datos[nif]" id="nif" value="<?php echo $datos['nif'] ?? '' ?>" placeholder="A48265169" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['nif'])){?><span class="error"><?= $errores['nif'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div> 

          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> 
                <label for="direccion">Dirección</label> <br>
                <input type="text" name="datos[direccion]" id="direccion" value="<?php echo $datos['direccion'] ?? '' ?>" placeholder="C/ La Nevera, 12" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['direccion'])){?><span class="error"><?= $errores['direccion'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>


          <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> 
              <label for="cp">Cp</label> <br>
              <input type="text" name="datos[cp]" id="cp" value="<?php echo $datos['cp'] ?? '' ?>" placeholder="26003" maxlength="5" size="12" required></label><br>
              <?php if(isset($datos)){if(isset($errores['cp'])){?><span class="error"><?= $errores['cp'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

      </div>

      <div class="row">
            <!----------------------------------------------------------------------------------------------------->
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> 
                            <label for="localidad">Localidad</label> <br>
                            <input type="text" name="datos[localidad]" id="localidad" value="<?php echo $datos['localidad'] ?? '' ?>" placeholder="Logroño" size="12" required></label><br>
                            <?php if(isset($datos)){if(isset($errores['localidad'])){?><span class="error"><?= $errores['localidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                      </div>
            <!----------------------------------------------------------------------------------------------------->
            <!----------------------------------------------------------------------------------------------------->


                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
                    <label for="provDepart">Provincia</label> <br>
                        <select id="" name="datos[provincia]" >
                        <option value="" selected>Seleccione!</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "La Rioja")?"selected" : ""; }}?> value="La Rioja">La Rioja</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Bizkaia")?"selected" : "";}}?>       value="Bizkaia">Bizkaia</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Álava")?"selected" : "";}}?>         value="Álava">Álava</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Navarra")?"selected" : ""; }}?>      value="Navarra">Navarra</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Guipuzkoa")?"selected" : ""; }}?>    value="Guipúzkoa">Guipúzkoa</option>
                            <option <?php if(!empty($datos)){if(isset($datos["provincia"])){echo ($datos["provincia"] === "Aquitania")?"selected" : "";}} ?>    value="Aquitania">Aquitania</option>
                        </select><br>
                    <?php if(isset($datos)){if(isset($errores['provincia'])){?><span class="error"><?= $errores['provincia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                    </div>
                </div>
            <!-----------------------------------------------------------------------------------------------------> 

            <!----------------------------------------------------------------------------------------------------->
                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
                    <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
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
                </div>
            <!----------------------------------------------------------------------------------------------------->

                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
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
            <!----------------------------------------------------------------------------------------------------->
      </div>

      <div class="row">

          <div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-12 cont">
              <label for="email">Email</label><br>
              <input type="email" name="datos[email]" id="email" placeholder="superlaya50@gmail.com" value="<?php echo $datos['email'] ?? '' ?>"required></label><br>
              <?php if(isset($datos)){if(isset($errores['email'])){?><span class="error"><?= $errores['email'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
              <label for="tlfnoReserva">Teléfono de Reserva</label> <br> 
              <input type="text" name="datos[tlfnoReserva]" id="tlfnoReserva" value="<?php echo $datos['tlfnoReserva'] ?? '' ?>" placeholder="637117965"></label><br> 
              <?php if(isset($datos)){if(isset($errores['tlfnoReserva'])){?><span class="error"><?= $errores['tlfnoReserva'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?> 
            </div>

          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-4 col-12 cont"> 
              <label for="tlfnoAgencia">Teléfono oficina</label> <br> 
              <input type="text" name="datos[tlfnoAgencia]" id="tlfnoAgencia" value="<?php echo $datos['tlfnoAgencia'] ?? '' ?>" placeholder="941 99 99 99"></label><br>
              <?php if(isset($datos)){if(isset($errores['tlfnoAgencia'])){?><span class="error"><?= $errores['tlfnoAgencia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
               
          </div>

      </div>

      <div class="row">

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 cont">
                <label>Horario mañana</label> <br>

                <label for="horaEntrManana">De: 
                <input id="horaEntrManana" type="time" name="datos[horaEntrManana]"  value=<?php echo $datos['horaEntrManana'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required>
                <?php if(isset($datos)){if(isset($errores['horaEntrManana'])){?><span class="error"><?= $errores['horaEntrManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
              <br>
                <label for="horaSalManana">a:
                <input id="horaSalManana" type="time" name="datos[horaSalManana]"  value=<?php echo $datos['horaSalManana'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required></label>
                <?php if(isset($datos)){if(isset($errores['horaSalManana'])){?><span class="error"><?= $errores['horaSalManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-12 cont">
                <label>Horario tarde: <br>

                <label for="horaEntrTarde">De:</label>
                <input id="horaEntrTarde" type="time" name="datos[horaEntrTarde]" value=<?php echo $datos['horaEntrTarde'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required>
                <?php if(isset($datos)){if(isset($errores['horaEntrTarde'])){?><span class="error"><?= $errores['horaEntrTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
              <br>
                <label for="horaSalTarde">a:</label>
                <input id="horaSalTarde" type="time" name="datos[horaSalTarde]"  value=<?php echo $datos['horaSalTarde'] ?? '00:00:00'?> max="23:59:59" min="0:00:00" step="1" required>
                <?php if(isset($datos)){if(isset($errores['horaSalTarde'])){?><span class="error"><?= $errores['horaSalTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
            </div>


            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                <label>Pago Online:</label> <br>
                  <label for="onlinesi">
                  <input type="radio" id="onlinesi" name="datos[pagoonline]" value="SI" checked> SI
          
                  <label for="onlineno" style="margin-left:2em">
                  <input type="radio" id="onlineno" name="datos[pagoonline]" value="NO"><label for="onlineno"> NO</label>
            </div>

            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-12 cont">
                  <label for="email">Nº cuenta</label> <br>
                  <input type="text" name="datos[numCuenta]" id="numCuenta" value="<?php echo $datos['numCuenta'] ?? '' ?>" placeholder="ES-650123456789" required>
                  <?php if(isset($datos)){if(isset($errores['numCuenta'])){?><span class="error"><?= $errores['numCuenta'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
            </div>

      </div>

      <div class="row">

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <label for="username">Inserte Username</label><br>
                <input type="username" name="datos[username]" id="username" value="<?php echo $datos['username'] ?? '' ?>"maxlength="20" required placeholder="autocareslaya82"> <br>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <label for="pwd">Contraseña Agencia de Viajes</label> <br>
                <input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"required placeholder="alberite"> <br>
            </div>

            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <label for="pwd">Vuelva escribir la Contraseña</label> <br>
                <input type="password" name="datos[pwdrepetida]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"required placeholder="alberite"> <br>
            </div>

      </div>

      <div class="row">
      <div id="seg" class="col-xl-12 text-center">
          <label for="estaseguro">
          <input id="estaseguro" type="checkbox" name="datos[estaseguro]"> Estoy seguro de añadir esta nueva Agencia de Buses.</label>
      </div>
      </div>


  <div id="botones">
      <input type="submit" name="nuevaagenciabuses" value="Enviar">
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




<!--Fecha de inscripción que faltaría en la base de datos
<label for="fInscripcion">Fecha de Inscripción de la Agencia:<input type="text" name="datos[fInscripcion]" id="fInscripcion" value="<?php echo $datos['fInscripcion'] ?? '' ?>"></label>
<?=isset($errores['fInscripcion'])?'<span class="error">'.$errores['fInscripcion'].'</span>':'OK'?><br>
Contraseña que faltaría en la base de datos
<label for="pwd">Inserte Contraseña:<input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"></label>
    <?=isset($errores['pwd'])?'<span class="error">'.$errores['pwd'].'</span>':'OK'?><br>
<label for="pwd">Vuelva escribir la Contraseña:<input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"></label>
    <?=isset($errores['pwd'])?'<span class="error">'.$errores['pwd'].'</span>':'OK'?><br>-->




















































  
<style>
    /*use                                       // ESTILO PROPIO //
    #saludo{
          color:red;
          font-size: 3em;
        }
        a{
          font-size: 0.5em;
          color: green;
          margin-left: 1em;
        }
  
  .headerBase h1{
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 2em;
      text-align: center;
    }

    .headerBase h2{
      font-size: 1.9em;
      text-align: center;
    }

    header{
      background-image: url("natural.png") ;
     
      /*Desplazamiento de imagenes https://uniwebsidad.com/libros/referencia-css2/background-position
      background-size: cover;
    }


body{
  background-size: cover;
  font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
}

    form{
      width: 50%;
      margin: 0 auto;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      border: black solid 2px ;
    }

    .error{color:red;}
    #contenido{
      margin-bottom: 8rem;
      padding-bottom: 20px;
    }

    #contenido{
      margin-bottom: 1em;
      padding-bottom: 20px;
     /* background-image: url("fondobody.jpg") ;
      background-size: cover;
    }

    #central{
      background-image: url("natural.jpg");
      background-size: cover;
    }

    

    td{
        border: black solid 2px ;

    }

input[type=button], input[type=submit], input[type=reset], button
{ background-color: olivedrab;
  border: none;
  color: white;
  padding: 10px 20px;
  text-decoration: none;
  margin: 4px 20px;
  cursor: pointer;
  border-radius: 5px;
}
input,select
{ padding: 5px 10px;
  margin: 5px 0;
  box-sizing: border-box;
  border-radius: 4px;
  outline: none;
}

input:focus
{ -webkit-transition: 0.8s;
  transition: 0.8s;
  background-color: #eee;
  border: 2px solid #555;
}

.error{
  font-family: Arial, Helvetica, sans-serif;
  color:red;
}
#agradecimiento p{
  font-size: 1.2rem;
  text-align: center;
  color:darkgreen;
}
#agradecimiento .aviso{
  font-family: Verdana, Geneva, Tahoma, sans-serif;
  font-size: 2rem;
  color: navy;
  text-align: center;
  margin: 3rem 0;
}
#agradecimiento a{
  text-align: center;
}

#fondo{
  display: none;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  min-height: 1110px;
  background-color: #888;
  z-index:1001;
  opacity:.75;
  -moz-opacity: 0.75;
  filter: alpha(opacity=75);
}

#agradecimiento{
  display: none;
  position: absolute;
  top: 20%;
  left: 35%;
  width: 30%;
  height: 37%;
  padding: 16px;
  background-color: #fff;
  z-index: 1002;
  overflow: auto;
}*/
</style>
		



<!--
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
          <label for="lugarSalida">Lugar de Salida Predeterminado: <br>
          <input type="text" name="datos[lugarSalida]" id="lugarSalida" value="<?php echo $datos['lugarSalida'] ?? '' ?>"></label><br>
          <?=isset($errores['lugarSalida'])?'<span class="error">'.$errores['lugarSalida'].'</span>':'OK'?>
</div>


<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
        <label for="compania">Compañía de bus Habitual: <br> 
        <input type="text" name="datos[compania]" id="compania" value="<?php echo $datos['compania'] ?? '' ?>"></label><br>
        <?=isset($errores['compania'])?'<span class="error">'.$errores['compania'].'</span>':'OK'?>
</div>

<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
        <label for="horarioAgencia">Horario de Agencia: <br> 
        <input type="text" name="datos[horarioAgencia]" id="horarioAgencia" value="<?php echo $datos['horarioAgencia'] ?? '' ?>"></label><br>      De francia, por ejemplo
        <?=isset($errores['horarioAgencia'])?'<span class="error">'.$errores['horarioAgencia'].'</span>':'OK'?>
</div>

<div class="col-xl-6 col-lg-4 col-md-4 col-sm-6 col-12 cont">
        <label for="cp">Código postal: <br>
        <input type="text" name="datos[cp]" id="cp" value="<?php echo $datos['cp'] ?? '' ?>" placeholder="26003" maxlength="5"></label><br>
        <?=isset($errores['cp'])?'<span class="error">'.$errores['cp'].'</span>':'<span class="ok">OK</span>'?></label>
</div>
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
                <label for="provincia">Provincia: <br>
                <input type="text" name="datos[provincia]" id="provincia" value="<?php echo $datos['provincia'] ?? '' ?>"></label><br>
                <?=isset($errores['provincia'])?'<span class="error">'.$errores['provincia'].'</span>':'OK'?>
</div>

<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
                <label for="comunidad">Comunidad: <br>
                <input type="text" name="datos[comunidad]" id="cp" value="<?php echo $datos['comunidad'] ?? '' ?>"></label><br>
                <?=isset($errores['comunidad'])?'<span class="error">'.$errores['comunidad'].'</span>':'OK'?>
</div>  

<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont"> 
                <label for="pais">Pais: <br>
                <input type="text" name="datos[pais]" id="pais" value="<?php echo $datos['pais'] ?? '' ?>"></label><br>
                <?=isset($errores['pais'])?'<span class="error">'.$errores['pais'].'</span>':'OK'?>
</div>
<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                <label>Horario de Agencia por la tarde: <br>De: 
                <input type="time" name="datos[horaEntrTarde]"   value="00:00:00" max="23:59:59" min="0:00:00" step="1" required> a:
                <input type="time" name="datos[horaSalTarde]"    value="00:00:00" max="23:59:59" min="0:00:00" step="1" required><br></label>
</div>-->


<style>
/*  select, input{
    width:278px;
    }*/
</style>














