<?php ob_start();  ?>                                 <!--Formulario de registro de Usuarios -->

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario Nuevo cliente</title>
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">


  <link rel="stylesheet" type="text/css" href='web/css/#.css'/>             <!--OK-->
  <link rel="stylesheet" type="text/css" href="web/css/forms.css">
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href="web/css/styles.css"> 

</head>
<body>

<div class="container"> 
      <div id="titulo">
        <div class="row">
            <div class="col-xl-12 text-center">
              <h1>Nuevo Cliente</h1>
            </div>
        </div>
      </div>

  <form action="" method="POST">
      
<!--
<div class="row">
    <div id="botones" class="col-xl-12">
      <input type="button" onclick="inserta()" value="Rellenar" >
    </div>
</div>
-->

  

<script>
  function inserta(){

    var nombree =document.getElementById("nombree");
    nombree.style.background="yellow";
    nombree.value="Adrián";

    var apellidos =document.getElementById("apellidos");
    apellidos.style.background="yellow";
    apellidos.value="Laya García";

    var nif =document.getElementById("nif");
    nif.style.background="yellow";
    nif.value="01234567R";

    var tlfnoParticular =document.getElementById("tlfnoParticular");
    tlfnoParticular.style.background="yellow";
    tlfnoParticular.value="637117965";

    var email =document.getElementById("email");
    email.style.background="yellow";
    email.value="superlaya51@gmail.com";

    var fNacimiento =document.getElementById("fNacimiento");
    fNacimiento.style.background="yellow";
    fNacimiento.value="17-06-1982";


    var calle =document.getElementById("calle");
    calle.style.background="yellow";
    calle.value="C/ Paseo Prior, 41";

    var cp =document.getElementById("cp");
    cp.style.background="yellow";
    cp.value="26007";

    var localidad =document.getElementById("localidad");
    localidad.style.background="yellow";
    localidad.value="Logroño";

    var provincia =document.getElementById("provincia");
    provincia.style.background="yellow";
    provincia.value="La Rioja";

    var comunidad =document.getElementById("comunidad");
    comunidad.style.background="yellow";
    comunidad.value="La Rioja";
    
    var pais =document.getElementById("pais");
    pais.style.background="yellow";
    pais.value="España";

    var username =document.getElementById("username");
    username.style.background="yellow";
    username.value="laya82";

    var pwd =document.getElementById("pwd");
    pwd.style.background="yellow";
    pwd.value="alberite";

    var pwd2 =document.getElementById("pwd2");
    pwd2.style.background="yellow";
    pwd2.value="alberite";

    var numcuenta =document.getElementById("numcuenta");
    numcuenta.style.background="yellow";
    numcuenta.value="ES5555555555555555555555";
    
  }
</script>
    
    <div class="row">
          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 cont">
              <label for="nombree" >Nombre</label><br>
              <input type="text" name="datos[nombre]" id="nombree" value="<?php echo $datos['nombre'] ?? '' ?>" placeholder="Adríán" size="10" required><br>
              <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
              <!--isset($errores['nombre'])?'<span class="error">'.$errores['nombre'].'</span>':'<span class="ok">OK</span>'?></label>-->
          </div> 

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 cont">
                <label for="apellidos">Apellidos</label><br>
                <input type="text" name="datos[apellidos]" id="apellidos" value="<?php echo $datos['apellidos'] ?? '' ?>" placeholder="Laya García" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['apellidos'])){?><span class="error"><?= $errores['apellidos'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-12 cont">
              <label for="nif">NIF</label><br>
              <input type="text" name="datos[nif]" id="nif" value="<?php echo $datos['nif'] ?? '' ?>" placeholder="01234567R" size="7" required><br>
              <?php if(isset($datos)){if(isset($errores['nif'])){?><span class="error"><?= $errores['nif'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>



          <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12 cont">
            <label for="tlfnoParticular">Teléfono</label><br>
            <input type="text" name="datos[tlfnoParticular]" id="tlfnoParticular" value="<?php echo $datos['tlfnoParticular'] ?? '' ?>" placeholder="637117965" size="7" required><br>
            <?php if(isset($datos)){if(isset($errores['tlfnoParticular'])){?><span class="error"><?= $errores['tlfnoParticular'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
            <label for="email">email</label><br>
            <input type="text" name="datos[email]" id="email" value="<?php echo $datos['email'] ?? '' ?>" placeholder="superlaya50@gmail.com" size="21" required><br>
            <?php if(isset($datos)){if(isset($errores['email'])){?><span class="error"><?= $errores['email'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-5 col-md-4 col-sm-6 col-12 cont">
            <label for="fNacimiento">F. nacimiento</label><br>
            <input style="width: 60%;" type="date" name="datos[fNacimiento]" id="fNacimiento" value="<?php echo $datos['fNacimiento'] ?? '' ?>" size="10" required><br>
            <?php if(isset($datos)){if(isset($errores['fNacimiento'])){?><span class="error"><?= $errores['fNacimiento'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-2 col-md-4 col-sm-6 col-12 cont">
              <label>Sexo</label> <br>
              <label for="sexohombre">
              <input id="sexohombre" type="radio" name="datos[sexo]" value="H" checked>  Hombre</label>

              <label for="sexomujer">
              <input id="sexomujer" type="radio" name="datos[sexo]" value="M">  Mujer</label>
          </div>

          <div class="col-xl-4 col-lg-3 col-md-4 col-sm-4 col-12 cont">
              <label for="calle">Calle</label><br>
              <input type="text" name="datos[calle]" id="calle" value="<?php echo $datos['calle'] ?? '' ?>" size="10" required><br>
              <?php if(isset($datos)){if(isset($errores['calle'])){?><span class="error"><?= $errores['calle'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-4 col-lg-3 col-md-4 col-sm-4 col-12 cont">
              <label for="cp">CP</label><br>
              <input type="text" name="datos[cp]" id="cp" value="<?php echo $datos['cp'] ?? '' ?>" size="5" required><br>
              <?php if(isset($datos)){if(isset($errores['cp'])){?><span class="error"><?= $errores['cp'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>
 
          <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 cont">
              <label for="localidad">Localidad</label><br>
              <input type="text" name="datos[localidad]" id="localidad" value="<?php echo $datos['localidad'] ?? '' ?> " size="12" required><br>
              <?php if(isset($datos)){if(isset($errores['localidad'])){?><span class="error"><?= $errores['localidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>



<!--///-->    
          <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
              <div> <!--Recoger esto en la memoria, que persisten los datos https://stackoverflow.com/questions/39074077/echo-value-of-select-box-->
              <label for="provDepart">Provincia</label><br>
                  <select id="" name="datos[provincia]">
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


          <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
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

          <div class="col-xl-4 col-lg-4 col-md-3 col-sm-4 col-12 cont"> <!--Ejemplo de un select con persistencia de datos y validación-->
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
<!--///-->    


          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 cont">
                <label for="username">Usuario</label><br>
                <input type="username" name="datos[username]" id="username" value="<?php echo $datos['username'] ?? '' ?>" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['username'])){?><span class="error"><?= $errores['username'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 cont">
                <label for="pwd">Contraseña</label><br>
                <input type="password" name="datos[contrasena]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['pwd'])){?><span class="error"><?= $errores['pwd'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 cont">
                <label for="pwd2">Repetir contraseña <br>
                <input type="password" name="datos[contrasenarepetida]" id="pwd2" value="<?php echo $datos['pwd2'] ?? '' ?>" size="12" required><br>
                <?php if(isset($datos)){if(isset($errores['pwd2'])){?><span class="error"><?= $errores['pwd2'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div>

          <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 cont">
                    <label for="numcuenta">Nº de Cuenta</label><br>
                    <input type="text" name="datos[numcuenta]" id="numcuenta" value="<?php echo $datos['numcuenta'] ?? '' ?>" placeholder="nº de cuenta" size="12" required><br>
                    <?php if(isset($datos)){if(isset($errores['numcuenta'])){?><span class="error"><?= $errores['numcuenta'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
          </div> 
</div>
                  <div class="row">
                    <div id="seg" class="col-xl-12 text-center">
                      <label for="asegura">
                      <input id="asegura" type="checkbox" name="asegura"> Doy mi consentimiento.</label>
                    </div>
                  </div>

                  <div id="botones">
                      <input type="submit" name="nuevocliente" value="Alta">
                      <input type="reset" name="limpiar" value="Limpiar">
                  </div>

    </div>

</form>


</div>
<script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>


<?php $contenido = ob_get_clean() ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>
<!--<div id="seg" class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">-->
  