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
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css"> 
    

</head>
<body>
 <?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>

<div class="container">

    <div class="row">

        <div class="col-xl-12 text-center"> 
            <h1>Todos los Buses de su Agencia </h1><br>
        </div>

    </div>

    <div class="row">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">  
                <form action="" method="post">

                        <div class="row">
                            <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">  

                            <div class="table-responsive"> 
                                        <table class="table table-striped table-bordered table-hover">
                                            <thead>
                                                <th>Modelo</th>
                                                <th>Plazas</th>
                                                <th>Matricula</th>
                                                <th>Año</th>
                                                <th>Eliminar</th>
                                                <th>Modificar</th>
                                            </thead>

                                            <tbody>
                                                    
                                                    <?php 
                                                    //var_dump($buses);
                                                    foreach($buses as $bus){
                                                       ?>
                                                        <tr>
                                                    <?php    $veces=0;
                                                               
                                                                foreach($bus as $bu){ 

                                                                    if($veces==0){
                                                                        $codBus=$bu;
                                                                    }

                                                                    if($veces==3){
                                                                        $matricula=$bu;
                                                                    }

                                                                    if($veces!=0){?>
                                                                        <td><?=$bu; ?></td><?php
                                                                       
                                                                        $veces++;?>
                                                            <?php   }else{
                                                                
                                                                        $veces++;
                                                                    }

                                                                    
                                                                    if($veces==5){?>
                                                    <td>
                                                        <label for="baja<?=$bu;?>">
                                                        <input id="baja<?=$bu;?>" type="checkbox" id="<?=$matricula;?>" name="eliminar[matricula]" value="<?=$matricula;?>"> Seleccionar</label>
                                                    </td>                                    

                                    <td>
                                                        <div id="" class="col-xl-12 text-center" >
                                                            <input style="margin: 0 auto;" class="btn btn-primary" type="submit" name="modificarbus" value="Modificar" onclick="selecciona(<?php echo($codBus);?>)"> 
                                                            <input id="<?php echo($codBus);?>" type="checkbox" name="modificar[codbus]" value="<?php echo($codBus);?>" hidden >
                                                        </div>
                                    </td>

                                                            <?php  } 
                                    
                                    }};?>

                                            </tbody>

                                        </table>
                            </div>
                                </div>
                        </div>
                        
                        <div class="row">
                        <div id="seg" class="col-xl-12 text-center">
                            <label for="estaseguro">
                            <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de eliminar/modificar un bus.</label>
                        </div>


                        <div class="row">
                                <div class="col-xl-12 text-center"> 
                                <div  id="botones">     
                                    <input  type="submit" name="eliminarbus" value="Eliminar">
                                    <!--<input type="submit" name="verflotabuses" value="Ver Flota de Buses">-->
                                    <input type="reset" value="Limpiar">
                                </div>
                            </div>
                        </div>

                </form>
            </div>
        </div>
    </div>
    </div>
</div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>


</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>


