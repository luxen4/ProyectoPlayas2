<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Información de su Agencia de Buses</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
    <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
    <link rel="stylesheet" type="text/css" href='web/css/styles.css'/> 


</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>
    <div class="container"> 
        <div class="row">
            <div class="col-xl-12 text-center">
                <h1>Modificación Agencia de Buses</h1>
            </div>
        </div>
    </div>
            <div class="container">
                <div class="col-xl-12 text-center">
                    <p class="fecha_inscripcion">
                    <?php echo "Fecha Inscripción: " . pasarUtf8($agenciaBuses[0]->fecha_incripcion) . "<br>"; ?>
                    </p>
                </div>
            </div>

<div class="container">
                <form action="" method="post">
                
                        <div class="row">

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                <?php echo "Nombre: " . pasarUtf8($agenciaBuses[0]->nombre) . "<br>" ; ?> 
                                <label for="">Nuevo Nombre</label><br>
                                <input type="text" name="datos[nombre]" size="18" value="<?php echo $_SESSION['perfil']['name']?>"><br>
                                <?php if(isset($datos)){if(isset($errores['nombre'])){?><span class="error"><?= $errores['nombre'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                <?php echo "NIF: " . pasarUtf8($agenciaBuses[0]->nif) . "<br>"; ?>
                                <label for="">Nuevo NIF</label><br>
                                <input type="text" name="datos[nif]" size="18" value="<?php echo $_SESSION['perfil']['nif'];?>"><br>
                                <?php if(isset($datos)){if(isset($errores['nif'])){?><span class="error"><?= $errores['nif'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                <?php echo "Dirección: " . pasarUtf8($agenciaBuses[0]->direccion) . "<br>"; ?>
                                <label for="">Nueva Dirección</label><br>
                                <input type="text" name="datos[direccion]" size="22" value="<?php echo $_SESSION['perfil']['direccion'];?>"><br>
                                <?php if(isset($datos)){if(isset($errores['direccion'])){?><span class="error"><?= $errores['direccion'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                <?php  echo "Código Postal: " . pasarUtf8($agenciaBuses[0]->cp) . "<br>"; ?>
                                <label for="">Nuevo Código Postal</label> <br>
                                <input type="text" name="datos[cp]" size="18" value="<?php echo $_SESSION['perfil']['cp'];?>"><br>
                                 <?php if(isset($datos)){if(isset($errores['cp'])){?><span class="error"><?= $errores['cp'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>
                        </div>
                                    
                        <div class="row">
                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                <?php echo "Localidad: " . pasarUtf8($agenciaBuses[0]->localidad) . "<br>";?>
                                <label for="">Nueva Localidad</label> <br>
                                <input type="text" name="datos[localidad]" size="18" value="<?php echo utf8_encode($_SESSION['perfil']['localidad']);?>"><br>
                                 <?php if(isset($datos)){if(isset($errores['localidad'])){?><span class="error"><?= $errores['localidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                    <?php echo "Provincia: " . pasarUtf8($agenciaBuses[0]->provincia) . "<br>"; ?>
                                    <label for="provincia">Nueva Provincia</label><br>
                                    <select id="provincia" name="datos[provincia]" >
                                        <option value="" selected>Seleccione, por favor!</option> 
                                        
                                        <?php
                                        if(!empty($_SESSION['perfil'])){?>
                                            <option <?php echo ($_SESSION['perfil']["provincia"] === "La Rioja")?"selected" : "";?> value="La Rioja">La Rioja</option>
                                            <option <?php echo ($_SESSION['perfil']["provincia"] === "Bizkaia")?"selected" : "";?> value="Bizkaia">Bizkaia</option>
                                            <option <?php echo ($_SESSION['perfil']["provincia"] === "Guipuzkoa")?"selected" : "";?> value="Cantabria">Guipuzcoa</option>
                                            <option <?php echo ($_SESSION['perfil']["provincia"] === "Álava")?"selected" : "";?> value="Álava">Álava</option>
                                            <option <?php echo ($_SESSION['perfil']["provincia"] === "Navarra")?"selected" : "";?> value="Navarra">Navarra</option>
                                            <option <?php echo ($_SESSION['perfil']["provincia"] === "Aquitania")?"selected" : "";?> value="Aquitania">Aquitania</option>-->
                                        <?php };?>

                                    </select><br>
                                 <?php if(isset($datos)){if(isset($errores['provincia'])){?><span class="error"><?= $errores['provincia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?></label>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                <?php echo "Comunidad: " . pasarUtf8($agenciaBuses[0]->comunidad) . "<br>"; ?>
                                <label for="comunidad">Nueva Comunidad</label><br>
                                <select id="comunidad" name="datos[comunidad]" >
                                    <option value="" selected>Seleccione!</option> 
                                    
                                    <?php
                                    if(!empty($_SESSION['perfil'])){?>
                                        <option <?php echo ($_SESSION['perfil']["comunidad"] === "La Rioja")?"selected" : "";?> value="La Rioja">La Rioja</option>
                                        <option <?php echo ($_SESSION['perfil']["comunidad"] === "Cantabria")?"selected" : "";?> value="Cantabria">Cantabria</option>
                                        <option <?php echo ($_SESSION['perfil']["comunidad"] === "País Vasco")?"selected" : "";?> value="Pais Vasco">Pais Vasco</option>
                                        <option <?php echo ($_SESSION['perfil']["comunidad"] === "Aquitania")?"selected" : "";?> value="Aquitania">Aquitania</option>
                                    <?php };?>

                                </select><br>
                             <?php if(isset($datos)){if(isset($errores['comunidad'])){?><span class="error"><?= $errores['comunidad'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?></label>
                            </div>

                            <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                    <?php echo "País: " . pasarUtf8($agenciaBuses[0]->pais) . "<br>"; ?>
                                    <label for="pais">Nuevo país</label><br>
                                    <select id="pais" name="datos[pais]" >
                                        <option value="" selected>Seleccione!</option> 
                                            <option <?php echo ($_SESSION['perfil']["pais"] === "España")?"selected" : "";?> value="España">España</option>
                                            <option <?php echo ($_SESSION['perfil']["pais"] === "Francia")?"selected" : "";?> value="Francia">Francia</option>
                                    </select><br>
                                 <?php if(isset($datos)){if(isset($errores['pais'])){?><span class="error"><?= $errores['pais'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?></label>
                            </div>
            <!------------------------------------------------------------------------------------------------------------------------------------------>
            <!--queda los campos de abajo de hacer la persistencia y la validación y hacer el update para finalizar <br>
            SEGUIR POR AQUI CON LA PERSISTENCIA DE DATOS Y LA VALIDACIÓN en todo lo que se pueda que hay que aprobechar que está caliente-->
                        </div>
            <?php //var_dump($_SESSION['perfil']);die();?>

                        <div class="row">

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                                <?php echo "email: " . pasarUtf8($agenciaBuses[0]->email) . "<br>"; ?>
                                <label for="">Nuevo email</label><br>
                                <input type="text" name="datos[email]" value="<?php echo $_SESSION['perfil']['email'];?>" required> <br>
                                 <?php if(isset($datos)){if(isset($errores['email'])){?><span class="error"><?= $errores['email'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                                <?php echo "Teléfono de Reserva: " . pasarUtf8($agenciaBuses[0]->telefono_Reserva) . "<br>"; ?>
                                <label for="">Nuevo teléfono de Reserva</label>
                                <input type="text" name="datos[telefonoDeReserva]" value="<?php echo $_SESSION['perfil']['telefonoReserva'];?>" required><br>
                                 <?php if(isset($datos)){if(isset($errores['telefonoDeReserva'])){?><span class="error"><?= $errores['telefonoDeReserva'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                                <?php echo "Teléfono de la Agencia: " . pasarUtf8($agenciaBuses[0]->telefono_Agencia) . "<br>"; ?>
                                <label for="">Nuevo teléfono de Agencia</label> <br>
                                <input type="text" name="datos[telefonoDeAgencia]" value="<?php echo $_SESSION['perfil']['telefono_Agencia'];?>" required><br>
                                 <?php if(isset($datos)){if(isset($errores['telefonoDEAgencia'])){?><span class="error"><?= $errores['telefonoDEAgencia'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>
                        </div><br>

                        <div class="row">
                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                        <?php echo "Horario:" . pasarUtf8($agenciaBuses[0]->horario_Agencia) . "<br>"; ?>
                                        <label>Nuevo Horario mañana: <br>
                                    
                                        <label for="horaEntrManana">De: </label>
                                        <input id="horaEntrManana" type="time" name="datos[horaEntrManana]"  value="00:00:00" max="23:59:59" min="0:00:00" step="1" required><br>
                                        <?php if(isset($datos)){if(isset($errores['horaSalManana'])){?><span class="error"><?= $errores['horaSalManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
<br>
                                        <label for="horaSalManana">a</label>
                                        <input id="horaSalManana" type="time" name="datos[horaSalManana]"  value="00:00:00" max="23:59:59" min="0:00:00" step="1" required><br>
                                         <?php if(isset($datos)){if(isset($errores['horaSalManana'])){?><span class="error"><?= $errores['horaSalManana'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                        <?php echo "Horario: " . pasarUtf8($agenciaBuses[0]->horario_Agencia) . "<br>"; ?>
                                        <label>Nuevo Horario tarde</label> <br>

                                        <label for="horaEntrTarde">De: </label>
                                        <input id="horaEntrTarde" type="time" name="datos[horaEntrTarde]" value="00:00:00" max="23:59:59" min="0:00:00" step="1" required><br>
                                        <?php if(isset($datos)){if(isset($errores['horaEntrTarde'])){?><span class="error"><?= $errores['horaEntrTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?> 
                                   <br>
                                        <label for="horaSalTarde">a:</label>
                                        <input id="horaSalTarde" type="time" name="datos[horaSalTarde]"  value="00:00:00" max="23:59:59" min="0:00:00" step="1" required><br>
                                         <?php if(isset($datos)){if(isset($errores['horaSalTarde'])){?><span class="error"><?= $errores['horaSalTarde'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                                    </div>

                                    <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 cont">
                                            <?php echo "Pago Online: " . pasarUtf8($agenciaBuses[0]->pago_Online) . "<br>"; ?>
                                            <label for="">Nuevo Pago Online</label> <br>

                                            <div>
                                                <label for="onlinesi">
                                                <input type="radio" id="onlinesi" name="datos[pagoonline]" value="SI" checked> SI</label>
                                    
                                                <label for="onlineno" style="margin-left:2em">
                                                <input type="radio" id="onlineno" name="datos[pagoonline]" value="NO"><label for="onlineno"> NO</label> 
                                            </div>

                                             <?php if(isset($datos)){if(isset($errores['pagoOnline'])){?><span class="error"><?= $errores['pagoOnline'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                                    </div>

                                    <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                                        <?php echo "Número de cuenta: " . pasarUtf8($agenciaBuses[0]->numero_Cuenta) . "<br>"; ?>
                                        <label for="">Nuevo número de Cuenta </label><br>
                                        <input type="text" name="datos[numeroCuenta]" size="18" value="<?php echo $_SESSION['perfil']['numero_Cuenta'];?>"><br>
                                         <?php if(isset($datos)){if(isset($errores['numeroCuenta'])){?><span class="error"><?= $errores['numeroCuenta'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                                    </div>
                        </div>

                        <div class="row">
                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                              <!--  <?php // echo "Username: " . pasarUtf8($agenciaBuses[0]->username) . "<br>"; ?> -->
                                <label for="">Nuevo Username</label> <br>
                                <input type="text" name="datos[username]"> <br>
                                 <?php if(isset($datos)){if(isset($errores['username'])){?><span class="error"><?= $errores['username'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                              <!--  <?php // echo "Contraseña actual: =>  *   <br>"; ?> . $agenciaBuses[0]['contrasena'] .-->
                                <label for="">Nueva contraseña</label> <br>
                                <input type="text" name="datos[contrasena]"><br>
                                 <?php if(isset($datos)){if(isset($errores['pwd'])){?><span class="error"><?= $errores['pwd'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>

                            <div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                                
                                <label for="">Repita la Nueva contraseña</label> <br>
                                <input type="text" name="datos[contrasenarepetida]"> <br>
                                 <?php if(isset($datos)){if(isset($errores['contrasenarepetida'])){?><span class="error"><?= $errores['contrasenarepetida'].'</span>'?><?php }else{?><span class="ok">OK</span><?php }};?>
                            </div>
                        </div>


                        <div class="row">
                            <div id="seg" class="col-xl-12 text-center">
                                <label for="asegura">
                                <input id="asegura" type="checkbox" name="datos[estaseguro]"> Doy mi consentimiento.</label>
                            </div>
                        </div>





                        <div class="row">
                            <div id="botones" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <input type="submit" name="modificardatosagenciabuseslogeada" value="Modificar">
                                <input type="reset" value="Limpiar">
                            </div>
                        </div>
                </form>
</div></div></div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>
