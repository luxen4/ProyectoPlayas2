<?php ob_start();                                   // Formulario de registro de Usuarios //
?>
<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/> 
  <form action="" method="POST">
            <h1>Inscripción del Personal de la Agencia de Buses</h1>
<fieldset>
    <legend>Datos del Personales.</legend>

<label for="apellidos">Apellidos:<input type="text" name="datos[apellidos]" id="apellidos" value="<?php echo $datos['apellidos'] ?? '' ?>"></label>
    <?=isset($errores['apellidos'])?'<span class="error">'.$errores['apellidos'].'</span>':'OK'?><br>

<label for="nombre">Nombre:<input type="text" name="datos[nombre]" id="nombre" value="<?php echo $datos['nombre'] ?? '' ?>"></label>
    <?=isset($errores['nombre'])?'<span class="error">'.$errores['nombre'].'</span>':'OK'?><br>
 
<label for="sexo">Sexo:<input type="text" name="datos[sexo]" id="sexo" value="<?php echo $datos['sexo'] ?? '' ?>"></label>
    <?=isset($errores['sexo'])?'<span class="error">'.$errores['sexo'].'</span>':'OK'?><br>

<label for="nif">NIF:<input type="text" name="datos[nif]" id="nif" value="<?php echo $datos['nif'] ?? '' ?>"></label>
    <?=isset($errores['nif'])?'<span class="error">'.$errores['nif'].'</span>':'OK'?><br>
 
<label for="fNacimiento">Fecha de Nacimiento:<input type="text" name="datos[fNacimiento]" id="fNacimiento" value="<?php echo $datos['fNacimiento'] ?? '' ?>"></label>
    <?=isset($errores['fNacimiento'])?'<span class="error">'.$errores['fNacimiento'].'</span>':'OK'?><br>

<label for="calle">Calle:<input type="text" name="datos[calle]" id="calle" value="<?php echo $datos['calle'] ?? '' ?>"></label>
    <?=isset($errores['calle'])?'<span class="error">'.$errores['calle'].'</span>':'OK'?><br>

<label for="cp">Código Postal:<input type="text" name="datos[cp]" id="cp" value="<?php echo $datos['cp'] ?? '' ?>"></label>
    <?=isset($errores['cp'])?'<span class="error">'.$errores['cp'].'</span>':'OK'?><br>

<label for="ciudad">Ciudad<input type="text" name="datos[ciudad]" id="ciudad" value="<?php echo $datos['ciudad'] ?? '' ?>"></label>
    <?=isset($errores['ciudad'])?'<span class="error">'.$errores['ciudad'].'</span>':'OK'?><br>

<label for="provincia">Provincia:<input type="text" name="datos[provincia]" id="provincia" value="<?php echo $datos['provincia'] ?? '' ?>"></label>
    <?=isset($errores['provincia'])?'<span class="error">'.$errores['provincia'].'</span>':'OK'?><br>

<label for="nacionalidad">Nacionalidad:<input type="text" name="datos[nacionalidad]" id="nacionalidad" value="<?php echo $datos['nacionalida'] ?? '' ?>"></label>
    <?=isset($errores['nacionalidad'])?'<span class="error">'.$errores['nacionalidad'].'</span>':'OK'?><br>

<label for="tlfnoparticular">Teléfono Particular:<input type="text" name="datos[tlfnoParticular]" id="tlfnoParticular" value="<?php echo $datos['tlfnoParticular'] ?? '' ?>"></label>
    <?=isset($errores['tlfnoParticular'])?'<span class="error">'.$errores['tlfnoParticular'].'</span>':'OK'?><br>

<label for="email">email:<input type="text" name="datos[email]" id="email" value="<?php echo $datos['email'] ?? '' ?>"></label>
    <?=isset($errores['email'])?'<span class="error">'.$errores['email'].'</span>':'OK'?><br>

<label for="codAgenciaBus">Código de Agencia de Bus:<input type="text" name="datos[codAgenciaBus]" id="codAgenciaBus" value="<?php echo $datos['codAgenciaBus'] ?? '' ?>"></label>
    <?=isset($errores['codAgenciaBus'])?'<span class="error">'.$errores['codAgenciaBus'].'</span>':'OK'?><br>

<label for="compania">Puesto:<input type="text" name="datos[compania]" id="compania" value="<?php echo $datos['compania'] ?? '' ?>"></label>
    <?=isset($errores['compania'])?'<span class="error">'.$errores['compania'].'</span>':'OK'?><br>




    

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


codTrabajador		INT identity (1,1) NOT NULL,
	apellidos			NVARCHAR (50) NOT NULL,	
	nombre				NVARCHAR (20) NOT NULL,	
	sexo				NVARCHAR CONSTRAINT dfSexoPERSONALAGENCIABUSES DEFAULT N'M' NOT NULL,
	nif					NVARCHAR (10) NOT NULL,																-- Mirar esto para nif  https://ocw.unizar.es/ciencias-experimentales/modelos-matematicos-en-bases-de-datos/diseno/DisenoProgramacion.pdf
	fNacimiento			DATE		  NOT NULL,
	Calle			NVARCHAR(50) NOT NULL,
	Cp				NCHAR (5)  NOT NULL,
	Ciudad			NVARCHAR(50) NOT NULL,
	Provincia		NVARCHAR(15) NOT NULL,
	nacionalidad	NVARCHAR (10) NOT NULL,	
	TlfnoParticular NVARCHAR (10) CONSTRAINT dfTlfnoParticularPERSONALAGENCIABUSES DEFAULT N'NO TIENE' NOT NULL,
	email			NVARCHAR (100) DEFAULT N'-NO TIENE-'NOT NULL,
	codAgenciaAutobus  INT     /*identity (001,001)*/ NOT NULL, 
	puesto	

