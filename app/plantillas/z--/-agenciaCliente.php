<?php ob_start();                                   // Tenemos Clientes pero después ya los metemos donde serán los sócios //
?>
<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/> 
  <form action="" method="POST">
            <h1>Inscripción de Nueva Agencia de Viajes</h1>
<fieldset>
    <legend>Datos de la Agencia de Autobuses</legend>

<!--Cuando cargue la página debe consultar a la base de datos-->
<!--Select-->
<label for="codAgencia">Código Agencia de Viajes:<input type="text" name="datos[codAgencia]" id="codAgencia" value="<?php echo $datos['codAgencia'] ?? '' ?>"></label>
    <?=isset($errores['codAgencia'])?'<span class="error">'.$errores['codAgencia'].'</span>':'OK'?><br>

<!--Select-->
<label for="codCliente">Código de cliente:<input type="text" name="datos[codCliente]" id="codCliente" value="<?php echo $datos['codCliente'] ?? '' ?>"></label>
    <?=isset($errores['codCliente'])?'<span class="error">'.$errores['codCliente'].'</span>':'OK'?><br>

<label for="fInscripcion">Fecha de Inscripción como Socio de esta Agencia de viajes:<input type="text" name="datos[fInscripcion]" id="fInscripcion" value="<?php echo $datos['nombreAgencia'] ?? '' ?>"></label>
    <?=isset($errores['fInscripcion'])?'<span class="error">'.$errores['fInscripcion'].'</span>':'OK'?><br>

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
 /* display: none;
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  min-height: 1110px;
  background-color: #888;
  z-index:1001;
  opacity:.75;
  -moz-opacity: 0.75;
  filter: alpha(opacity=75);*/
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

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>






 





codAgenciaViajes		INT /*identity (1,1) */ NOT NULL,
codCliente		INT /*identity (1,1) */ NOT NULL,
fechaincripcion  DATE DEFAULT GETDATE () NOT NULL,



































