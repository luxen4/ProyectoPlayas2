<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los Destinos</title>
   <!-- <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">-->
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">


</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">

<?php               if($_SESSION['perfil']['roll']=="cliente"){ ?>
                        <h1>Todas las Agencias de Viajes disponibles para usted</h1>
<?php               }?>

<?php               if($_SESSION['perfil']['roll']=="admin"){ ?>
                        <h1>Todas las Agencias de Viajes disponibles</h1>
<?php               }?>

                
            </div>
        </div>
    </div>


    <div class="container">


<?php   if(!empty($agenciaViajes)){?>




<?php   }else{?>
            <p id="nohay"><?php echo ("¡No hay ninguna Agencia de Viajes disponible en este momento!");?></p>
<?php   }?>





        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="" method="post">

            <div class="table-responsive"> 
            <table class="table table-striped table-bordered table-hover">
                    <thead>
                        <th>Nombre</th><th>Dirección</th><th>Localidad</th><th>Teléfono</th><th>Horario Oficina</th><th>Salida desde...</th><th>*</th>
                    </thead>

                    <tbody>
                            
                            <?php $veces=0;



$numAgencias=count($agenciaViajes);

for($i=0; $i<$numAgencias; $i++){

$cod_AgenciaViajes=$agenciaViajes[$i]->cod_AgenciaViajes;?>
</tr> 
<td><?= pasarUtf8($agenciaViajes[$i]->nombre);?></td>
<td><?= pasarUtf8($agenciaViajes[$i]->direcion);?></td>
<td><?= pasarUtf8($agenciaViajes[$i]->localidad);?></td>
<td><?= pasarUtf8($agenciaViajes[$i]->telefono_Agencia);?></td>
<td><?= pasarUtf8($agenciaViajes[$i]->horario_Agencia);?></td>
<td><?= pasarUtf8($agenciaViajes[$i]->lugar_SalidaPredeterminado);?></td>

<?php

if (!empty($_SESSION['perfil'])) {
    if ($_SESSION['perfil']['roll']=="admin") {?>

<td>
    <label for="<?=$cod_AgenciaViajes;?>">
    <input type="checkbox" id="<?=$cod_AgenciaViajes;?>" name="datos[<?=$cod_AgenciaViajes;?>]" value="<?=$cod_AgenciaViajes;?>"> Hacerse Socio</label>
</td>

</tr> 
<?php };



    if ($_SESSION['perfil']['roll']=="cliente") {?>
        <td>
            <label for="<?=$cod_AgenciaViajes;?>">
            <input type="checkbox" id="<?=$cod_AgenciaViajes;?>" name="datos[<?=$cod_AgenciaViajes;?>]" value="<?=$cod_AgenciaViajes;?>"> Hacerse Socio</label>
        </td>
</tr> 


<?php
}
}








}    /* 


                            foreach($agenciaViajes as $agencia){?>
                                            <tr>
                                <?php foreach($agencia as $atributo){ 
                                    
                                    if(!$veces==0){?>
                                            <td><?= pasarUtf8($atributo);$veces++;?></td>
                                <?php    }?>
                                                    
                                               
                                                <?php

                                                if($veces==0){
                                                    $codAgenciaViajes=$atributo;
                                                }

                                                if($veces==1){
                                                    $nombreAgencia="datos[" . $atributo . "]";
                                                }

                                            if($_SESSION['perfil']['roll']=="cliente"){

                                                if($veces==6){?>
                                                    <td>
                                                        <label for="<?=$nombreAgencia;?>">
                                                        <input type="checkbox" id="<?=$nombreAgencia;?>" name="<?=$nombreAgencia;?>" value="<?=$atributo;?>"> Hacerse Socio</label>
                                                    </td>
                                            </tr> 
                                   
                                        <?php
                                                    $veces=0;
                                                }else{}


                                            }


                                            if($_SESSION['perfil']['roll']=="admin"){
                                                if($veces==6){?>
                                                        <td>
                                                            <label for="baja<?=$atribut;?>">
                                                            <input type="checkbox" id="baja<?=$atributo;?>" name="<?=$nombreAgencia;?>" value="<?=$atributo;?>"> Dar de baja</label>
                                                        </td>
                                            </tr> 
                                    
                                                                       
                                        <?php  
                                                    $veces=0;
                                                }else{}}






                                               }};*/?>
                    </tbody>
                </table>
            </div>
            





  <!--Esto para la opción de dar de baja a la agencia si se es administrador-->
  <?php    
  if(!empty($_SESSION['perfil'])){
    if($_SESSION['perfil']['roll']==="admin"){?>
<div class="row">
<label for="estaseguro">
<input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de eliminar las Agencias de Viajes seleccionadas.</label>
</div>

 
<div id="botones">
<input type="submit" name="eliminarAgenciasViajes" value="Eliminar">
<!--<input type="submit" name="verflotabuses" value="Ver Flota de Buses">-->
<input type="reset" value="Limpiar">
</div>


<?php }}?>


<?php               if($_SESSION['perfil']['roll']=="cliente"){ ?>


                        <div class="row">
                            <div id="seg" class="col-xl-12 text-center">
                                <label for="estaseguroo"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
                                <input id="estaseguroo" type="checkbox" name="asegura"> Doy mi consentimiento.</label>
                            </div>
                        </div>


                        <div id="botones">
                            <input type="submit" name="socioclienteagencia" value="Hacer socio">
                            <input type="reset" value="Limpiar">
                        </div>
<?php               }?>

            </form>
        </div>
    </div></div>

<!-- <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>-->
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>

