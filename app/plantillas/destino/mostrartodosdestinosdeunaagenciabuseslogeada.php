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
    <link rel="stylesheet" type="text/css" href="web/css/forms.css">

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>
<div class="container"> 

    <div class="row">
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
            <hr class="letra">
        </div>
    </div>

    <div class="row">
        <div class="col-xl-12 text-center">
            <h1>Destinos de su Agencia de Buses</h1><br>
        </div>
    </div>

        <?php //echo"estoy en mostrartodosdestinosdeunaagenciabuseslogeada php"; ?>

    <div class="row">
    <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
    <form action="" method="post">
    <div class="table-responsive"> 
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr class="table-active">
            <th>Destino</th>
            <th>Provincia</th>
            <th>Comunidad</th>
            <th>País</th>
            <th>Dia</th>
            <th>Fecha</th>
           
            <th>Km.</th>
        <!--<th>Precio(€)</th>-->
            <th>Matricula</th>
            <th>Plazas</th>
            <th>Ocup.</th>
            <th>Quedan</th>
        <!--<th>Recaudado</th>--> 
        </tr>
        </thead>

        <tbody>
                   
                <?php 
    $i=0;
                foreach($destinos as $destino){?>
                    <tr>
                <?php    $veces=0;
                       
                            foreach($destino as $desti){ 
                               
                                if($veces==0){
                                $codDestino=$desti;
                                }     
                                
                                if($veces==8){
                                    $precioBillete=$desti;
                                    }    
                                    
                                

                                if($veces!=0 && $veces!=8){?>
                                    <td><?=$desti;$veces++;?></td>
                                    <!--<td><?php //echo pasarUtf8($desti);$veces++;?></td>-->
                              <?php  }else{$veces++;} 

                 // var_dump($plazasTotalesCadaBus);die();
            if($veces==10){?>              
                <td><label><?= $plazasTotalesCadaBus[$i];?></label></td>
                <td><label><?= $plazasOcupadas[$i];?></label></td>
                <td><label><?= $plazasQuedanCadaBus[$i]; ?></label></td>
            
            <!--<td><label><?= $precioBillete * $plazasOcupadas[$i] . "€";  $i++?></label></td>

            <td>
                    <input class="btn btn-primary" type="submit" name="modificardestino" value="Modificar" onclick="selecciona(<?php echo($codDestino);?>)">
                </td>

                <td>
                    <input id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" value="<?php echo($codDestino);?>" hidden >
                    <input class="btn btn-danger" type="submit" name="cancelardestino" value="Cancelar" onclick="selecciona(<?php echo($codDestino);?>)">
                </td>
            -->
        </tr> 
            
    <?php
                                $veces=0;
                                }else{
        

    }; 
                
if($veces==1){
$nombreDestino="datos[" . $desti . "]";

}

if(!empty($_SESSION['perfil']['roll'])){

    if($_SESSION['perfil']['roll']=="cliente"){
    
if($veces==9){?>
                        <td>
                            <label for="<?=$nombreDestino;?>">
                            <input id="<?=$nombreDestino;?>" type="checkbox" class="socio" name="<?=$nombreDestino;?>" value="<?=$codDestino/*$desti*/;?>"> Apuntarse al viaje</label>
                        </td>
                    </tr> 
                        
                <?php
                                            $veces=0;
                                            }else{
                        
                }}}; ?>

                <?php }};?>
            

        </tbody>

    </table>
</div>
<br>
    <!--Por si se amplia <div id="botones"><input type="submit" name="apuntar" value="Enviar"><input type="reset" value="Limpiar"></div>-->
<!--    
    <div class="row">
    <div id="seg" class="col-xl-4 text-center col-lg-8 col-md-4 col-sm-4 col-4">
          <label for="estaseguro">
          <input id="estaseguro" type="checkbox" name="datos[estaseguro]"> Estoy seguro de modificar este Destino.</label>
    </div>
    </div>
--> 
    
    <div class="row">
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
            <hr class="letra">
        </div>
    </div>
    
    </div>
</form>
</div>

            </div>
        </div>
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>




