<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los Destinos</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/styles2.css">


</head>
<body>
    <div class="container">
    <div class="row">
        <div class="col-xl-12 col-lg-6 col-md-6 col-sm-6 col-12 cont">
            <h1>Todas las Agencias de Viajes a las que usted pertenece</h1>
        </div>
    </div>

<form action="" method="post">

    <table>
        <thead>
            <th>Nombre</th><th>Dirección</th><th>Localidad</th><th>Teléfono</th><th>Horario Oficina</th><th>Lugar de salida buses</th>
        </thead>

        <tbody>
                   
                <?php $veces=0;

                foreach($agenciaViajes as $agencia){?>
                        <!--<div class="row">-->
                                <tr>
                    <?php   if(is_array($agencia)){
                                foreach($agencia as $atributo){ ?>
                                    <!--<div class="col-xl-2 col-lg-6 col-md-6 col-sm-6 col-12 cont">-->
                                        <td><?=$atributo;$veces++;?></td>
                                    <!--</div>-->

<?php
if($veces==1){
$nombreAgencia="datos[" . $atributo . "]";

}

                                       if($veces==6){?>
                                                <td>
                                                    <label for="socio">
                                                    <input type="checkbox" class="socio" name="<?=$nombreAgencia;?>" value="<?=$atributo;?>"> Ya no ser socio</label>
                                                </td>
                                </tr> 
                        <!--</div>-->
                <?php
                                            $veces=0;
                                            }else{
                        
                }; ?>


                <?php           }     
                            }
                };?>
            

        </tbody>
    </table>
   
    

   
        <div id="botones">
            <input type="submit" name="socioclienteagencia" value="Hacerse Socio">
            <input type="reset" value="Limpiar"> 
        </div>
    

</form>

 </div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include __DIR__ . '/../base.php' ?>



<style>
body{
    background-image: url("img/fondo3.jpg");       /*Cuelga de la siguiente carpeta*/ 
    background-size: cover;
  }
  
    .headerBase h1{
      font-family: Verdana, Geneva, Tahoma, sans-serif;
      font-size: 2.2em;
      text-align: center;
      text-decoration: underline overline wavy red 2px; 
      /*text-decoration: line-through;*/
      /*text-decoration: blink;*/
    }
  
    h2{
      text-align: center;
      text-decoration: underline red 2px; 
    }
  
    #consulta{
    display: flex;
  }
  
    #busquedaporuncampo, #busquedapor2campos{
      margin: 1em;
      padding: 0.3em;
      padding-bottom: 0.1em;
      background: khaki;
      border-radius: 0.7em;
    }
  
     a{
      font-size: 1.5em;
      color: white;
    }
  
      .inises{
        width: 240px;
        margin: 0 auto;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-size: 1.2rem;
      }
  
      .error{color:red;}
  
      #contenido{
        margin-bottom: 1em;
        padding-bottom: 20px;
        background-image: url("img/fondo2.jpg");
        background-size: cover;
      }
  
      #central{
        background-image: url("img/fondo1.jpg");
        background-size: cover;
      }
  
  
  table{
      border: black solid 2px ; text-align: center;
      font-size: 1.5em; 
  }
  
   td{
      border: black solid 2px ;padding: 0.2em;
  }


</style>