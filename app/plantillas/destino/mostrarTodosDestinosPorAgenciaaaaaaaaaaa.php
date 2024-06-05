<?php ob_start();?>
<?php
/* Ejemplo de plantilla que se mostrará dentro de la plantilla principal
  ob_start() activa el almacenamiento en buffer de la página. Mientras se
             almacena en el buffer no se produce salida alguna hacia el
             navegador del cliente
  luego viene el código html y/o php que especifica lo que debe aparecer en
     el cliente web
  ob_get_clean() obtiene el contenido del buffer (que se pasa a la variable
             $contenido) y elimina el contenido del buffer
  Por último se incluye la página que muestra la imagen común de la aplicación
    (en este caso base.php) la cual contiene una referencia a la variable
    $contenido que provocará que se muestre la salida del buffer dentro dicha
    página "base.php"
*/
 ?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Todos los destinos</title>
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">

<!-- <div class="col-xl-3" style="background-color:yellow;"></div>-->
</head>
<body>


<form action="" method="post">

      <div class="row">
          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 tres"><!--Aqui no elijo type text por comodidad para el usuario, si no hay resultados que salga que no hay Destinos programados para esa fecha-->
              <div class="col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12 tres">
                        <label for="fViaje">Fecha del viaje: <br>
                        <input type="date" name="datos[fechaviaje]" id="sexo" value="<?php echo $datos['fechaviaje'] ?? '' ?>" ><br>
                    <input type="submit" name="consultarporfecha" value="Consultar">
              </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 tres"><!--Aqui no elijo type text por comodidad para el usuario, si no hay resultados que salga que no hay Destinos programados para esa fecha-->
              <div class="col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12 tres">
                  <label for="lugardestino">Destino: <br>

                  <select id="lugardestino" name="datos[lugardestino]" >
                      <option value="" selected>Seleccione, por favor!</option>
             

                      <?php 
          $destinos=$_SESSION['todosdestinos'];
          $soloLugares=$_SESSION['sololugares'];
          $soloAgenciasDeViajes=$_SESSION['soloagenciasdeviajes']; 

          for($i=0; $i<count($soloLugares);$i++){
              $lugar=$soloLugares[$i]['nombre_Lugar'];   ?>
              <option value="<?php echo($lugar);?>"><?php echo($lugar);?></option>
    <?php }?>
                  </select>
                  <input type="submit" name="consultarpordestino" value="Consultar">
              </div>
          </div>

          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 tres"><!--Aqui no elijo type text por comodidad para el usuario, si no hay resultados que salga que no hay Destinos programados para esa fecha-->
              <div class="col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12 tres">
                  <label for="comunidad">Destinos por Agencias de Viajes: <br>

                    <select id="" name="datos[agenciaviajes]" >
                      <option value="" selected>Seleccione, por favor;</option>


                           
  <?php   for($i=0; $i<count($soloAgenciasDeViajes);$i++){
              $agenciaViajes=$soloAgenciasDeViajes[$i]['nombre'];   ?>
              <option value="<?php echo($agenciaViajes);?>"><?php echo($agenciaViajes);?></option>
    <?php }?>


                    </select>
                  <input type="submit" name="consultarporagenciaviajes" value="Consultar">
              </div>
          </div>


          <div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 tres"><!--Aqui no elijo type text por comodidad para el usuario, si no hay resultados que salga que no hay Destinos programados para esa fecha-->
              <div class="col-xl-12 col-lg-4 col-md-4 col-sm-6 col-12 tres">
                  <label for="comunidad">Día de la semana: <br>

                    <select id="" name="datos[diasemana]" >
                      <option value="" selected>Seleccione, por favor!</option>
                      <option value="Lunes">Lunes</option>
                      <option value="Martes">Martes</option>
                      <option value="Miercoles">Miercoles</option>
                      <option value="Jueves">Jueves</option>
                      <option value="Viernes">Viernes</option>
                      <option value="Sábado">Sábado</option>
                      <option value="Domingo">Domingo</option>
                    </select>
                  <input type="submit" name="consultarpordia" value="Consultar">
              </div>
          </div>
    </div>

      <div class="container">


      <?php
      $destinos=$_SESSION['destinosfiltradosporlugar'];
     // var_dump($destinos);
      $veces=0;
        foreach($destinos as $destino){?>

            <?php if(is_array($destino)){?>
              <div class="row">

            <?php  foreach($destino as $desti){


                    if($veces==0){?>
        
      <?php  for($i=0; $i<count($destinos);$i++){
          $codDestino=$destinos[$i]['cod_Destino']; //var_dump($codDestino);die();
          $nombreDestino=$destinos[$i]['nombre_Lugar'];
          $comunidad=$destinos[$i]['com_Reg'];
          $fechaDestino=$destinos[$i]['fecha_Viaje'];
          $diaSemana=$destinos[$i]['dia_Semana'];
          $euros=$destinos[$i]['euros']?>

            <div class="col-xl-3 text-center col-lg-6 col-md-6 col-sm-6 col-12 cont">
                        <article>
                          <div class="articulo">
                              <div class="row">

                                  <div class="col-xl-6 text-center col-lg-6 col-md-6 col-sm-6 col-12 comunidad">
                                    <p><?php echo($comunidad);?></p>
                                  </div>

                                  

                                  <div id="a" class="col-xl-6 text-center col-lg-6 col-md-6 col-sm-6 col-12 " >
                                      <input  type="submit" name="apuntar" value="Apuntar" onclick="selecciona(<?php echo($codDestino);?>)"> 
                                      <input id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" 
                                                value="<?php echo($codDestino);?>" hidden >
                                  </div>

    <script>

    // Función que selecciona el checkbox cuando se ejecuta el submit
    function selecciona(codigo){
        var seleccionar=document.getElementById(codigo).checked = true;
    }
    </script>

<?php
   
 
 
 ?>
                                  
                              </div>

                                  <img class="fotodestino" src="web/imagenes/<?php echo ($nombreDestino)?>.jpg" alt="Foto de un destino">

                                  <div class="row">

                                      <div class="col-xl-6 text-center col-lg-6 col-md-6 col-sm-6 col-12 textodestino">
                                          <p><?php echo($fechaDestino . ' ' . $diaSemana);?> <br>
                                        
                                        </p> 
                                      </div>

                                      

                                      <div class="col-xl-6 text-center col-lg-6 col-md-6 col-sm-6 col-12 textoprecio">
                                          <p><?php echo($euros . " euros");?></p> 
                                      </div>

                                      <div >
                                    <?php echo($nombreDestino);?>
                                  </div>

                                  </div>
                              <!--  <div class="prec" style="display: flex;"><img src="img/oferprecio.png" style="width: 100%;" alt=""></div> -->

                          </div>
                        </article>
                      </div>

      <?php  }?>

                      <?php $veces++;
                        
                        if($veces/4==1){
                          echo("*");
                          $veces=0;?>
                            </div>
                  <?php }else{
                    
                  }?>
                    
      <?php       
          
                }
            }
        }
        }
      ?>

        
        </div>
</div>




</form>



    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>





 <?php $contenido = ob_get_clean() ?>

 <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>







 <style>


  .tres{border:1px solid black; padding: 1em; text-align:center ;}



  article{border:1px solid black;
          border-radius: 0.5em;
          margin-top: 1em;
          }
  img{height:220px; width:280px}

  .cont{padding: 0.5em;}
  .comunidad{ transform: rotate(-45deg); margin-top: 2em; }
  .destino{z-index: 1; background-color: red;}
  .plazas ,#a{z-index: 1;}
  #a{font-size: 1.5em; }
  #a input{border-radius:0.3em; float: right;   margin-right: 0.5em; }
  .carrito{border: 1px solid black;}
 
  .fotodestino{margin-top: -2.5em; border-radius: 0.3em; z-index: -1;}
  .textodestino{font-size: 1.3em; /*margin-left: 1em;*/ }
  .textoprecio{font-size: 1.5em; float: right; text-align: right; }
  

</style>









<style>
    input [type=submit] {
    background: url(web/imagenes/carrito.png);
    border: 0;
    display: block;
    height: 50px;
    width: 50px;
}
</style>

<?php 
  if(isset($_POST['laredo'])){
    $datos=$_POST['laredo'];
    //var_dump($datos);//die();
   ?><script>//alert("yt");</script>
<?php  }


?>
