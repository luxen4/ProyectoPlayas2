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
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
            

<?php   
    if(empty($agenciaViajes)){?>

        

        <div class="row">
            <div id="ningun_destino" class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>No tiene ninguna Agencia de Viajes donde sea Socio, hasta ahora!</h3>
            </div>
        </div> 


        <script>//alert("No tiene Destinos contratados")</script><?php
    }else{?>

<div class="container">
            <div class="row">
                <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                    <h1>Agencias de Viajes donde usted es socio</h1>
                </div>
            </div>
        </div>


<form action="" method="post">
                <table>
                    <thead>
                        <th>Nombre</th><th>Dirección</th><th>Localidad</th><th>Teléfono</th><th>Horario Oficina</th><th>Salida desde...</th><th>Eliminar como Sócio</th>
                    </thead>

                    <tbody>
                            
                            <?php $veces=0;

                            foreach($agenciaViajes as $agencia){?>
                                            <tr>
                                <?php   foreach($agencia as $atributo){ 

                                                if($veces==0){
                                                    $codigo_AgenciaViajes=$atributo;
                                                }else{?>

                                                     <td><?= pasarUtf8($atributo);?></td>
                                             <?php   } $veces++; ?>

                                                   
                                               
                                                <?php


                                                if($veces==1){
                                                    $id_Agencia=$atributo;
                                                   
                                                }



                                                if($veces==7){?>
                                                <td>
                                                    <label for="<?=$id_Agencia;?>">
                                                    <input type="checkbox" id="<?=$id_Agencia;?>" name="datos[codigoagencia<?=$id_Agencia;?>]" value="<?=$codigo_AgenciaViajes;?>"> Seleccionar</label>
                                                </td>
                                            </tr>
                                         <?php    $veces=0;   }


                                        }?>


                                        
                               <?php
                                               
                                               
                                               };?>
                    </tbody>
                </table>


                <div id="seguridad" class="row">
                    <div id="seg" class="col-xl-12 text-center">
                        <label for="asegura">
                        <input id="asegura" type="checkbox" name="asegura">Estoy seguro de darme de baja como sócio.</label>
                    </div>
                </div>




            
                    <div id="botones">
                        <input type="submit" name="dardebajasocio" value="Darme de Baja"> 
                        <input type="reset" value="Limpiar">
                    </div>


            </form><?php
        

    }?>



        </div></div>
    </div>

<!--<script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>-->
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>






<?php 
/*

if($_SESSION['perfil']['roll']=="cliente"){

if($veces==6){?>
    <td>
        <label for="<?=$nombreAgencia;?>">
        <input type="checkbox" id="<?=$nombreAgencia;?>" name="<?=$nombreAgencia;?>" value="<?=$atributo;?>"> Desacer Sócio</label>
    </td>
</tr> 

<?php
    $veces=0;
}else{

}




}
*/
?>