

<?php ob_start(); 
use miId\fuente\Repositorio\DestinoRepositorio;

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Bus</title>
  <!--<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/>-->
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>             <!--OK-->
  <link rel="stylesheet" type="text/css" href='#'/>

  
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href='web/css/plantasbuses/plantabus.css'/>   
  <link rel="stylesheet" type="text/css" href='web/css/plantasbuses/bus_19plazas.css'/>   

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>

<div class="container"> 
  
<form action="" method="POST">


    <div class="row">
        <div class="col-xl-12 text-center">
        <h1>Distribución Bus de 19 Plazas</h1>
        </div>
    </div>
    
   <?php //var_dump($plazasOcupadas );?>


    <div class="row">  
        <div id="planta_bus" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">  

            <div id="todos_sientos_bloque">


                    <div class="junto">
                        <div class="filas">

                                <!--------------------------------------------------------------------------------------------------------------->                     
                                <?php
                                for($i=16; $i>=1; $i=$i - 3){ ?><?php      // Para cada una de las plazas, que compare si está ocupada
                                $entra=0;
                                for ($k=0; $k<count($plazasOcupadas); $k++) {
                                    $entra=0;
                                    if ($plazasOcupadas[$k]==$i) {
                                        if ($entra==0) {
                                            $entra=1; ?>
                                            <div class="bloque_asiento">

                                                <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                    <div>
                                                        <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                        <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                        <div id="asiento<?=$i;?>" class="asiento" style="background-color: red;" ><?= $i;?></div>

                                                        <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                    </div>
                                            </div>
                                <?php break;
                                        }  
                                    } 
                                }
                                if ($entra==0) {?>
                                        <div class="bloque_asiento">
                                            <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                <div>
                                                    <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                    <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                    <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)"><?= $i;?></div>

                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                </div>
                                        </div>
                                <?php } } ?>
                                <!--------------------------------------------------------------------------------------------------------------->                        
                                                    
                        </div>
                    </div>


                    <div class="junto" >
                        <div class="filas">

                            <!--------------------------------------------------------------------------------------------------------------->                     
                            <?php
                            for($i=17; $i>=2; $i=$i - 3){ ?><?php      // Para cada una de las plazas, que compare si está ocupada
                            $entra=0;
                            for ($k=0; $k<count($plazasOcupadas); $k++) {
                                $entra=0;
                                if ($plazasOcupadas[$k]==$i) {
                                    if ($entra==0) {
                                        $entra=1; ?>
                                        <div class="bloque_asiento">

                                            <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                <div>
                                                    <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                    <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                    <div id="asiento<?=$i;?>" class="asiento" style="background-color: red;" ><?= $i;?></div>

                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                </div>
                                        </div>
                            <?php break;
                                    }  
                                } 
                            }

                            if ($entra==0) {?>
                                    <div class="bloque_asiento">
                                        <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                            <div>
                                                <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)"><?= $i;?></div>

                                                <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                            </div>
                                    </div>
                            <?php } } ?>
                            <!--------------------------------------------------------------------------------------------------------------->                        
                                                

                          

                          

                         
                        </div>
                    </div>

                        
                    <div class="junto" >
                        <div class="filas" style="margin-left: -53.5em;">
                            
                            <!--------------------------------------------------------------------------------------------------------------->   
                            <?php                                            // Para cada una de las plazas, que compare si está ocupada
                                $entra=0; $i=18;
                                for ($k=0; $k<count($plazasOcupadas); $k++) {
                                    $entra=0;
                                    if ($plazasOcupadas[$k]==$i) {
                                        if ($entra==0) {
                                            $entra=1; ?>
                                            <div class="bloque_asiento">

                                                <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                    <div>
                                                        <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                        <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                        <div id="asiento<?=$i;?>" class="asiento" style="background-color: red;" ><?= $i;?></div>

                                                        <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                    </div>
                                            </div>
                                <?php break;
                                        }
                                    } 
                                }

                                if ($entra==0) {?>
                                        <div class="bloque_asiento">
                                            <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                                <div>
                                                                        <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                                        <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                                        <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">18</div>

                                                                        <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                                </div>
                                        </div>


                                <?php }?>
                                <!--------------------------------------------------------------------------------------------------------------->   


                            </div>
                    </div>
                            
                    <div class="junto" >
                        <div class="filas">

                            <!--------------------------------------------------------------------------------------------------------------->   
                            <?php                                            // Para cada una de las plazas, que compare si está ocupada
                            $entra=0; $i=19;
                            for ($k=0; $k<count($plazasOcupadas); $k++) {
                                $entra=0;
                                if ($plazasOcupadas[$k]==$i) {
                                    if ($entra==0) {
                                        $entra=1; ?>
                                        <div class="bloque_asiento">

                                            <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                <div>
                                                    <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                    <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                    <div id="asiento<?=$i;?>" class="asiento" style="background-color: red;" ><?= $i;?></div>

                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                </div>
                                        </div>
                            <?php break;
                                    }
                                } 
                            }

                            if ($entra==0) {?>
                                    <div class="bloque_asiento">
                                        <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                            <div>
                                                                    <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                                    <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                                    <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">19</div>

                                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                            </div>
                                    </div>


                            <?php }?>
                            <!--------------------------------------------------------------------------------------------------------------->   

                            <!--------------------------------------------------------------------------------------------------------------->                     
                            <?php
                            for($i=15; $i>=2; $i=$i - 3){ ?><?php      // Para cada una de las plazas, que compare si está ocupada
                            $entra=0;
                            for ($k=0; $k<count($plazasOcupadas); $k++) {
                                $entra=0;
                                if ($plazasOcupadas[$k]==$i) {
                                    if ($entra==0) {
                                        $entra=1; ?>
                                        <div class="bloque_asiento">

                                            <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                                <div>
                                                    <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                    <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                    <div id="asiento<?=$i;?>" class="asiento" style="background-color: red;" ><?= $i;?></div>

                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                </div>
                                        </div>
                            <?php break;
                                    }  
                                } 
                            }

                            if ($entra==0) {?>
                                    <div class="bloque_asiento">
                                        <div class="respaldo"><img src="web/imagenes/bus<?='/respaldo.png';?>" alt=""></div>
                                            <div>
                                                <div class="brazo_izdo"><img src="web/imagenes/bus<?='/brazo_izdo.png';?>" alt="Foto brazo izquierdo"></div>

                                                <input id="<?= $i;?>" hidden type="checkbox" name="datos[asientoseleccionado_<?=$i;?>]" value="<?=$i;?>"  >
                                                <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)"><?= $i;?></div>

                                                <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                            </div>
                                    </div>
                            <?php } } ?>
                            <!--------------------------------------------------------------------------------------------------------------->                        
                                                

                          

                          

                         
                        </div>
                    </div>
            </div>

     <!--       <div id="alante">
              <img src="web/imagenes/bus<?='/parte_delantera.png';?>" alt="">
            </div>
                            -->
        </div>  

    </div>


<?php 

//require __DIR__ . '/../../../fuente/Repositorio/destinoRepositorio.inc'; 
require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/DestinoRepositorio.inc'; 


if(!empty($_SESSION['datosdestino'])){
$codDestino=$_SESSION['datosdestino'];

}else{
    $codDestino = $_SESSION['codigodestino'];
}


$destino = (new DestinoRepositorio())->nombreDestinoSeleccionado($codDestino);
$_SESSION['destino']=$destino;?>


<div class="container" style="margin: 0 auto;">
    <div class="row">

    <div class="col-xl-12 text-center"></div>
        <div class="table-responsive"> 
            <table class="table table-bordered table-hover">

                <thead class="table-active">
                    <tr>
                    <th>Destino</th>
                    <th>Prov.</th>
                    <th>Com.</th>
                    <th>País</th>
                    <th>Dia</th>
                    <th>Fecha</th>
                    <th>Agencia</th>
                    <th>Km.</th>
                    <th>Precio</th>
                </tr>
                </thead>

                <tbody>
                <tr>
                        <td><?php echo pasarUtf8($destino[0]->nombre_Lugar)?></td>
                        <td><?php echo pasarUtf8($destino[0]->prov_Depart)?></td>
                        <td><?php echo pasarUtf8($destino[0]->com_Reg)?></td>
                        <td><?php echo pasarUtf8($destino[0]->pais)?></td>
                        <td><?php echo pasarUtf8($destino[0]->dia_Semana)?></td>
                        <td><?php echo pasarUtf8($destino[0]->fecha_Viaje)?></td>
                        <td><?php echo pasarUtf8($destino[0]->nombre)?></td>
                        <td><?php echo pasarUtf8($destino[0]->kilometrosIdaVuelta)?></td>
                        <td><?php echo pasarUtf8(round($destino[0]->euros,2))?></td>
                </tr>
                </tbody>

<?php //var_dump($destino);?>
               
            </table>
        </div>
        </div>
        <div class="col-xl-2 text-center col-lg-2 col-md-1 text-center col-sm-2 col-2"></div>
</div>

            <div id="seguridad" class="row">
                <div class="col-xl-4 text-center col-lg-4 col-md-4 col-sm-6 col-12" style="margin: 0 auto;">
                            <label for="numcuenta">Inserte su Nº de Cuenta: <br>
                            <input type="text" name="info[numcuenta]" id="numcuenta" value="<?php echo $datos['numcuenta'] ?? '' ?>" placeholder="nº de cuenta" size="30" required><br>
                           <!-- <?=isset($errores['numcuenta'])?'<span class="error">'.$errores['numcuenta'].'</span>':'<span class="ok">OK</span>'?></label>-->
                </div> 
            </div>

            <div id="seguridad" class="row">
                <div id="seg" class="col-xl-12 text-center">
                    <label for="estaseguro">
                    <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de reservar esta/s plazas.</label>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <div  id="botones">  
                        <input type="submit" name="ocupaplazas" value="Ocupar">
                        <input type="reset" value="Limpiar">
                </div>
                </div>
            </div>

</form>
</div>

</body>
</html>

<?php $contenido = ob_get_clean() ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>
  