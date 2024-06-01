<?php ob_start();   ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <!-- <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">-->
    <title>Document</title>
</head>
<body>
    <!--
<form class="form-inline" role="form">
  <div class="form-group">
    <label for="email">Email address:</label>
    <input type="email" class="form-control" id="email">
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" id="pwd">
  </div>
  <div class="checkbox">
    <label><input type="checkbox"> Remember me</label>
  </div>
  <button type="submit" class="btn btn-default">Submit</button>
</form><br>-->

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="well well-sm">
                <form class="form-horizontal" method="post">
                    <fieldset>
                        <legend class="text-center header">Datos de la Agencia</legend>
                       

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="fname" name="name" type="text" placeholder="First Name" class="form-control">
                            </div>
                        </div>




                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-user bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="lname" name="name" type="text" placeholder="Last Name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-envelope-o bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="email" name="email" type="text" placeholder="Email Address" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-phone-square bigicon"></i></span>
                            <div class="col-md-8">
                                <input id="phone" name="phone" type="text" placeholder="Phone" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center"><i class="fa fa-pencil-square-o bigicon"></i></span>
                            <div class="col-md-8">
                                <textarea class="form-control" id="message" name="message" placeholder="Enter your massage for us here. We will get back to you within 2 business days." rows="7"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-12 text-center">
                                <button type="submit" class="btn btn-primary btn-lg">Submit</button>
                            </div>
                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>





<form action="" method="POST">
            <h1>Inscripción de Nueva Agencia de Viajes</h1>
<fieldset>
    <legend>Datos de la Agencia</legend>


<!--Fecha de inscripción que faltaría en la base de datos-->
<label for="fInscripcion">Fecha de Inscripción de la Agencia:
  <input type="date" name="datos[fInscripcion]" step="1" min="2021-01-01" max="2030-12-31" value="<?php echo date("Y-m-d");?>"></label>
    <?=isset($errores['fInscripcion'])?'<span class="error">'.$errores['fInscripcion'].'</span>':'OK'?><br>

<label for="nombre">Nombre de la Agencia:<input type="text" name="datos[nombre]" id="nombre"    value="<?php echo $datos['nombre'] ?? '' ?>"></label>
    <?=isset($errores['nombre'])?'<span class="error">'.$errores['nombre'].'</span>':'OK'?><br>

<label for="nif">NIF:<input type="text" name="datos[nif]" id="nif" value="<?php echo $datos['nif'] ?? '' ?>"></label>
    <?=isset($errores['nif'])?'<span class="error">'.$errores['nif'].'</span>':'OK'?><br>
 
<label for="direccion">Dirección:<input type="text" name="datos[direccion]" id="direccion" value="<?php echo $datos['direccion'] ?? '' ?>"></label>
    <?=isset($errores['direccion'])?'<span class="error">'.$errores['direccion'].'</span>':'OK'?><br>

<!--Falta base de datos-->
<label for="cp">Código postal:<input type="text" name="datos[cp]" id="cp" value="<?php echo $datos['cp'] ?? '' ?>"></label>
    <?=isset($errores['cp'])?'<span class="error">'.$errores['cp'].'</span>':'OK'?><br>

<label for="localidad">Localidad<input type="text" name="datos[localidad]" id="localidad" value="<?php echo $datos['localidad'] ?? '' ?>"></label>
    <?=isset($errores['localidad'])?'<span class="error">'.$errores['localidad'].'</span>':'OK'?><br>

<label for="provincia">Provincia:<input type="text" name="datos[provincia]" id="provincia" value="<?php echo $datos['provincia'] ?? '' ?>"></label>
    <?=isset($errores['provincia'])?'<span class="error">'.$errores['provincia'].'</span>':'OK'?><br>

<label for="comunidad">Comunidad:<input type="text" name="datos[comunidad]" id="cp" value="<?php echo $datos['comunidad'] ?? '' ?>"></label>
    <?=isset($errores['comunidad'])?'<span class="error">'.$errores['comunidad'].'</span>':'OK'?><br>

<label for="pais">Pais:<input type="text" name="datos[pais]" id="pais" value="<?php echo $datos['pais'] ?? '' ?>"></label>
    <?=isset($errores['pais'])?'<span class="error">'.$errores['pais'].'</span>':'OK'?><br>

<label for="lugarSalida">Lugar de Salida Predeterminado:<input type="text" name="datos[lugarSalida]" id="lugarSalida" value="<?php echo $datos['lugarSalida'] ?? '' ?>"></label>
    <?=isset($errores['lugarSalida'])?'<span class="error">'.$errores['lugarSalida'].'</span>':'OK'?><br>


<!--Forzosamente un select (y que haga consulta de los nombre de las compañías) ya que podemos confundirnos al meter los datos -->
<label for="compania">Compañía de bus Habitual:<input type="text" name="datos[compania]" id="compania" value="<?php echo $datos['compania'] ?? '' ?>"></label>
    <?=isset($errores['compania'])?'<span class="error">'.$errores['compania'].'</span>':'OK'?><br>



<!--https://www.anerbarrena.com/time-input-html5-una-campo-de-formaulario-para-introducir-la-hora-3505/-->

   <!-- <label for="horarioAgencia">Horario de Agencia (no he puesto nada):<input type="text" name="datos[horarioAgencia]" id="horarioAgencia" value="<?php echo $datos['horarioAgencia'] ?? '' ?>"></label>      De francia, por ejemplo
    <?=isset($errores['horarioAgencia'])?'<span class="error">'.$errores['horarioAgencia'].'</span>':'OK'?>-->

    <label>Horario de Agencia por la mañana:</label>

    <input type="time" name="datos[horaEntrManana]"  value="00:00:00" max="23:59:59" min="0:00:00" step="1">
    <input type="time" name="datos[horaSalManana]"   value="00:00:00" max="23:59:59" min="0:00:00" step="1"><br>

    <label>Horario de Agencia por la tarde:</label>
    <input type="time" name="datos[horaEntrTarde]"   value="00:00:00" max="23:59:59" min="0:00:00" step="1">
    <input type="time" name="datos[horaSalTarde]"    value="00:00:00" max="23:59:59" min="0:00:00" step="1"><br>

<label for="tlfnoReserva">Teléfono de Reserva Telefónica (Si o NO or numeric):<input type="text" name="datos[tlfnoReserva]" id="tlfnoReserva" value="<?php echo $datos['tlfnoReserva'] ?? '' ?>"></label>
    <?=isset($errores['tlfnoReserva'])?'<span class="error">'.$errores['tlfnoReserva'].'</span>':'OK'?><br>



<label for="tlfnoAgencia">Teléfono de la Agencia(SI o NO or numeric):<input type="text" name="datos[tlfnoAgencia]" id="tlfnoAgencia" value="<?php echo $datos['tlfnoAgencia'] ?? '' ?>"></label>
    <?=isset($errores['tlfnoAgencia'])?'<span class="error">'.$errores['tlfnoAgencia'].'</span>':'OK'?><br>

<!--OK-->
<label for="pagoonline">Pago Online:</label>
<input type="radio" id="onlineSi" name="datos[pagoonline]" value="SI" checked><label for="onlinesi">SI</label>
<input type="radio" id="onlineno" name="datos[pagoonline]" value="NO"><label for="onlineno">NO</label><br>

<label for="email">Nº de cuenta:<input type="text" name="datos[numCuenta]" id="numCuenta" value="<?php echo $datos['numCuenta'] ?? '' ?>" required></label>
    <?=isset($errores['numCuenta'])?'<span class="error">'.$errores['numCuenta'].'</span>':'OK'?><br>



<label for="email">Email (lo que se quiera):<input type="text" name="datos[email]" id="email" value="<?php echo $datos['email'] ?? '' ?>"></label>
    <?=isset($errores['email'])?'<span class="error">'.$errores['email'].'</span>':'OK'?><br>




<!--Contraseña que faltaría en la base de datos-->
<label for="pwd">Inserte Contraseña de la Agencia:<input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"></label>
    <?=isset($errores['pwd'])?'<span class="error">'.$errores['pwd'].'</span>':'OK'?><br>

<label for="pwd">Vuelva escribir la Contraseña:<input type="password" name="datos[pwd]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>"></label>
    <?=isset($errores['pwd'])?'<span class="error">'.$errores['pwd'].'</span>':'OK'?><br>


</fieldset>

<div id="botones">
    <input type="submit" name="nuevaAgenciaViajes" value="Enviar">
    <input type="reset" value="Limpiar">
</div>





</form> <br>





















<style>
    .header {
    color: #36A0FF;
    font-size: 27px;
    padding: 10px;
}

.bigicon {
    font-size: 35px;
    color: #36A0FF;
}
</style>