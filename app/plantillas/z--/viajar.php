<?php ob_start();                                   // Formulario de registro de Usuarios //
?>
<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/> 
  <form action="" method="POST">
            <h1>Inscripción de Nuevo Destino</h1>
<fieldset>
    <legend>Datos del Destino</legend>

<!--podría resolverse con un select de lugar y fuera el código que iría dentro-->
<label for="codDestino">Código Destino:<input type="text" name="datos[codDestino]" id="codDestino" value="<?php echo $datos['codDestino'] ?? '' ?>"></label>
    <?=isset($errores['codDestino'])?'<span class="error">'.$errores['codDestino'].'</span>':'OK'?><br>

<!--un select-->
<label for="codAgencia">Código Agencia Viajes:<input type="text" name="datos[codAgencia]" id="codAgencia" value="<?php echo $datos['codAgencia'] ?? '' ?>"></label>
    <?=isset($errores['codAgencia'])?'<span class="error">'.$errores['codAgencia'].'</span>':'OK'?><br>

<!--un select-->
<label for="codBuses">Código de Agencia Buses:<input type="text" name="datos[codBuses]" id="codBuses" value="<?php echo $datos['codBuses'] ?? '' ?>"></label>
    <?=isset($errores['codBuses'])?'<span class="error">'.$errores['codBuses'].'</span>':'OK'?><br>
 


    
<label for="diaSemana">Dia de la semana:<input type="text" name="datos[diaSemana]" id="diaSemana" value="<?php echo $datos['diaSemana'] ?? '' ?>"></label>
    <?=isset($errores['diaSemana'])?'<span class="error">'.$errores['diaSemana'].'</span>':'OK'?><br>

<label for="fecha">Fecha del Viaje:<input type="text" name="datos[fecha]" id="fecha" value="<?php echo $datos['fecha'] ?? '' ?>"></label>
    <?=isset($errores['fecha'])?'<span class="error">'.$errores['fecha'].'</span>':'OK'?><br>

<label for="lugar">Lugar de Viaje<input type="text" name="datos[lugar]" id="lugar" value="<?php echo $datos['lugar'] ?? '' ?>"></label>
    <?=isset($errores['lugar'])?'<span class="error">'.$errores['lugar'].'</span>':'OK'?><br>

<label for="direccionSalida">Dirección de salida:<input type="text" name="datos[direccionSalida]" id="direccionSalida" value="<?php echo $datos['direccionSalida'] ?? '' ?>"></label>
    <?=isset($errores['direccionSalida'])?'<span class="error">'.$errores['direccionSalida'].'</span>':'OK'?><br>

<label for="horaSalida">Hora de salida:<input type="text" name="datos[horaSalida]" id="horaSalida" value="<?php echo $datos['horaSalida'] ?? '' ?>"></label>
    <?=isset($errores['horaSalida'])?'<span class="error">'.$errores['horaSalida'].'</span>':'OK'?><br>
 
<label for="direccionVuelta">Dirección para la vuelta:<input type="text" name="datos[direccionVuelta]" id="direccionVuelta" value="<?php echo $datos['direccionVuelta'] ?? '' ?>"></label>
    <?=isset($errores['direccionVuelta'])?'<span class="error">'.$errores['direccionVuelta'].'</span>':'OK'?><br>

<label for="horaVuelta">Hora Vuelta<input type="text" name="datos[horaVuelta]" id="horaVuelta" value="<?php echo $datos['horaVuelta'] ?? '' ?>"></label>
    <?=isset($errores['horaVuelta'])?'<span class="error">'.$errores['horaVuelta'].'</span>':'OK'?><br>

<label for="precio">Precio:<input type="text" name="datos[precio]" id="plazas" value="<?php echo $datos['precio'] ?? '' ?>"></label>
    <?=isset($errores['precio'])?'<span class="error">'.$errores['precio'].'</span>':'OK'?><br>

</fieldset>



</div>

<div id="botones">
    <input type="submit" name="nuevaCompania" value="Enviar">
    <input type="reset" value="Limpiar">
</div>

</form>


<style>
    
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
     
      /*Desplazamiento de imagenes https://uniwebsidad.com/libros/referencia-css2/background-position*/ 
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
     /* background-image: url("fondobody.jpg") ;*/
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
}
</style>


<?php $contenido = ob_get_clean() ?>

<?php include 'base.php' ?>


codViajar/*no es suficiente las primarias*/ INT IDENTITY (1,1) NOT NULL,
	codDestino				INT /*identity (001,001)*/ NOT NULL,  -- La lógica dice que ya con datos metidos insertes los viajes --
	codAgenciaViajes		INT /*identity (001,001)*/ NOT NULL,
	codAgenciaBuses			INT /*identity (001,001)*/ NOT NULL,

	diaViaje				NVARCHAR (15)  CONSTRAINT dfDiaViajeViajar DEFAULT N'Domingo' NOT NULL,
	fecha					DATE NOT NULL,
	lugarViaje				NVARCHAR (100)	NOT NULL,											   				                           
	direcionSalida			NVARCHAR (100)   DEFAULT  (N'Estación de autobuses')NOT NULL,
	horaSalida				TIME			 DEFAULT  (N'08:00:00.0000000') NOT NULL,
	direcionVuelta			NVARCHAR (100)	 DEFAULT  (N'Salida de la playa') NOT NULL,
	horaVuelta				TIME			 DEFAULT  (N'19:00:00') NOT NULL,
	precio					MONEY			 DEFAULT  (14) NOT NULL

