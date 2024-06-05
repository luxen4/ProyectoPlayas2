

<?php ob_start(); 
use miId\fuente\Repositorio\DestinoRepositorio;

?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Nuevo Bus</title>
  
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
  <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
  <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>             <!--OK-->
  <!--<link rel="stylesheet" type="text/css" href='web/css/estilos.css'/>-->
  <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
  <link rel="stylesheet" type="text/css" href='web/css/plantasbuses/plantabus.css'/> 
  <link rel="stylesheet" type="text/css" href='web/css/plantasbuses/bus_63plazas.css'/>  

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>





<div class="container"> 
  
<form action="" method="POST">

    <div class="row">
        <div class="col-xl-12 text-center">
        <h1>Distribución Bus 63 Plazas</h1>
        </div>
    </div>


    <div class="row">  
        <div id="planta_bus" class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">  

            <div id="todos_sientos_bloque">
                    <div class="junto">
                        <div class="filas">

                                <!--------------------------------------------------------------------------------------------------------------->   
                                <?php
                                for($i=59; $i>=35; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                                <?php }} ?>
                                <!--------------------------------------------------------------------------------------------------------------->  
      

                                <!--------------------------------------------------------------------------------------------------------------->   
                                <?php                                            // Para cada una de las plazas, que compare si está ocupada
                                $entra=0; $i=33;
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
                                                                        <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">33</div>

                                                                        <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                                </div>
                                        </div>


                                <?php }?>
                                <!--------------------------------------------------------------------------------------------------------------->   


                                <!--------------------------------------------------------------------------------------------------------------->   
                                <?php
                                for($i=29; $i>=1; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                                <?php }} ?>
                                <!--------------------------------------------------------------------------------------------------------------->  

                        </div>
                    </div>

                    <div class="junto">
                        <div class="filas">
                                <!--------------------------------------------------------------------------------------------------------------->   
                                <?php
                                for($i=60; $i>=36; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada
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


                                <?php }} ?>
                                <!--------------------------------------------------------------------------------------------------------------->  
      

                                <!--------------------------------------------------------------------------------------------------------------->   
                                <?php                                            // Para cada una de las plazas, que compare si está ocupada
                                $entra=0; $i=34;
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
                                                                        <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">34</div>

                                                                        <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                                </div>
                                        </div>


                                <?php }?>
                                <!--------------------------------------------------------------------------------------------------------------->   


                                <!--------------------------------------------------------------------------------------------------------------->   
                                <?php
                                for($i=30; $i>=2; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                                <?php }} ?>
                                <!--------------------------------------------------------------------------------------------------------------->  

                        </div>
                    </div>

               
                        <div class="filas">
                            <!---------------------------------------------------------------------------------------------------------------> 
                            <?php                                                       // Para cada una de las plazas, que compare si está ocupada
                            $entra=0; $i=61;
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
                                                                    <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">61</div>

                                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                            </div>
                                    </div>


                            <?php }?>
                            <!---------------------------------------------------------------------------------------------------------------> 
                        </div>
                                
                        <div class="filas" style="margin-top:-10em;">
 
                            <!---------------------------------------------------------------------------------------------------------------> 
                            <?php                                                       // Para cada una de las plazas, que compare si está ocupada
                            $entra=0; $i=62;
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
                                                                    <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">62</div>

                                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                            </div>
                                    </div>


                            <?php }?>
                            <!---------------------------------------------------------------------------------------------------------------> 

                            <!--------------------------------------------------------------------------------------------------------------->   
                            <?php
                            for($i=57; $i>=37; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                            <?php }} ?>
                            <!--------------------------------------------------------------------------------------------------------------->  
                            

                            <div class="bloque_asiento">
                                <div class="respaldo"><img src="respaldo.png" alt=""></div>
                                <div>
                                    <div class="brazo_izdo"><img src="brazo_izdo.png" alt=""></div>
                                    <div class="asiento">***</div>
                                    <div class="brazo_derecho"><img src="brazo_derecho.png" alt=""></div>
                                </div>
                            </div>   
                                

                            <!--------------------------------------------------------------------------------------------------------------->   
                                <?php
                            for($i=31; $i>=3; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                            <?php }} ?>
                            <!--------------------------------------------------------------------------------------------------------------->  
                        
                        </div>

                        <div class="filas" style="margin-top:-10em; margin-bottom: -4em;">
   

                            <!---------------------------------------------------------------------------------------------------------------> 
                            <?php                                                       // Para cada una de las plazas, que compare si está ocupada
                            $entra=0; $i=63;
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
                                                                    <div id="asiento<?=$i;?>" class="asiento" onclick="selecciona2(<?= $i;?>)">63</div>

                                                                    <div class="brazo_derecho"><img src="web/imagenes/bus<?='/brazo_derecho.png';?>" alt=""></div>
                                                            </div>
                                    </div>


                            <?php }?>
                            <!---------------------------------------------------------------------------------------------------------------> 

                            <!--------------------------------------------------------------------------------------------------------------->   
                            <?php
                            for($i=58; $i>=38; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                            <?php }} ?>
                            <!--------------------------------------------------------------------------------------------------------------->  
                

                            <div class="bloque_asiento">
                                <div class="respaldo"><img src="respaldo.png" alt=""></div>
                                <div>
                                    <div class="brazo_izdo"><img src="brazo_izdo.png" alt=""></div>
                                    <div class="asiento">***</div>
                                    <div class="brazo_derecho"><img src="brazo_derecho.png" alt=""></div>
                                </div>
                            </div>   
                                            

                            <!--------------------------------------------------------------------------------------------------------------->   
                                <?php
                            for($i=32; $i>=4; $i=$i - 4){ ?><?php   // Para cada una de las plazas, que compare si está ocupada

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


                            <?php }} ?>
                            <!--------------------------------------------------------------------------------------------------------------->                      
                        </div>

                </div>

                            <div id="alante">
                                 <img src="web/imagenes/bus<?='/parte_delantera.png';?>" alt="">
                            </div>
    </div>

            <?php   //require __DIR__ . '/../../../fuente/Repositorio/destinoRepositorio.inc'; 
            require $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc'; 

            if(!empty($_SESSION['datosdestino'])){
            $codDestino=$_SESSION['datosdestino'];

            }else{$codDestino = $_SESSION['codigodestino'];}

            $destino = (new DestinoRepositorio())->nombreDestinoSeleccionado($codDestino);
            $_SESSION['destino']=$destino;?>


<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center">
        <div class="table-responsive"> 
            <table class="table table-bordered table-hover">
                <thead class="table-active">
                    <th>Destino</th>
                    <th>Provincia/Departamento</th>
                    <th>Comunidad/Región</th>
                    <th>País</th>
                    <th>Dia</th>
                    <th>Fecha</th>
                    <th>Agencia</th>
                    <th>Km.ida-vuela</th>
                    <th>Precio/billete</th>
                </thead>
<?php //var_dump($destino);?>
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

            </table>
        </div>
        </div>
    </div>
</div>


            <div id="seguridad" class="row">
                <div class="col-xl-12 text-center">
                            <label for="numcuenta">Inserte su Nº de Cuenta</label> <br>
                            <input type="text" name="info[numcuenta]" id="numcuenta" value="<?php echo $datos['numcuenta'] ?? '' ?>" placeholder="nº de cuenta" size="30" required><br>
                </div> 
            </div>

            <div id="seguridad" class="row">
                <div id="seg" class="col-xl-12 text-center">
                    <label for="estaseguro">
                    <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de reservar esta/s plazas.</label>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 text-center">
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
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>









