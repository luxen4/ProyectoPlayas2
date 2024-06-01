<?php ob_start() ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los Destinos de su Agencia de Viajes</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
    

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>
<div class="container-fluid"> 

<div class="container">

<div class="row">
      <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
        <hr class="letra">
      </div>
</div>

    <div class="row">
        <div class="col-xl-12 text-center">
            <h1>Todos los Destinos de su Agencia de Viajes</h1><br>
        </div>
    </div>

    <form action="" method="post">
    <div class="table-responsive"> 
    <table class="table table-striped table-bordered table-hover">  <!--https://getbootstrap.com/docs/4.0/content/tables/ -->
            <thead>
                <tr class="table-active">
                <th>Destino</th>
                <th>Prov</th>
                <th>Comunidad</th>
                <th>País</th>
                <th>Dia</th>
            
                <th>Fecha</th>
                <th>Km.</th>
                
                <th>Matricula</th>
                <th>Precio(€)</th>
                <th>Agencia</th>
            
                <th>Plazas</th>
                <th>Ocup.</th>
                <th>Libres</th>
                <th>Rec.</th>
                </tr>
            </thead>

            
            <tbody>
                    <?php $i=0; 
                         foreach($destinos as $destino){
                    ?>
            <tr>
                    <?php    $veces=0;
                        
                                foreach($destino as $desti){ 
                                
                                    if($veces==0){
                                    $codDestino=$desti;
                                    }     
                                    
                                    if($veces==9){
                                        $precioBillete=$desti;
                                        
                                        }    
                                        
                                        if($veces!=0){
                                            if($veces==9){?>
                                                <td><?php echo round($desti, 2);$veces++;?></td>
                                            <?php  }else{?>
                                            <td><?php echo $desti;$veces++;?></td><!--Aquí no hay problema de servidores-->

                                           <?php } ?>
                                            
                                            
                                            
                                            
                                            
                                            <!--<td><?php //echo pasarUtf8($desti);$veces++;?></td>-->

                                <?php   }else{$veces++;}
                                
                if($veces==11){?>               
                    <td><label><?= $plazasTotalesCadaBus[$i];?></label></td>
                    <td><label><?= $plazasOcupadas[$i];?></label></td>
                    <td><label><?= $plazasQuedanCadaBus[$i]; ?></label></td>
                    <td><label><?= $precioBillete * $plazasOcupadas[$i] . "€";  $i++?></label></td>

                    <td style="padding: 1em;"><input class="btn btn-primary" type="submit" name="modificardestino" value="Modificar" onclick="selecciona(<?php echo($codDestino);?>)"></td>
                    <td style="padding: 1em;">
                   
                        <input  id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" value="<?php echo($codDestino);?>" hidden >
                        <input class="btn btn-danger" type="submit" name="cancelardestino" value="Cancelar" onclick="selecciona(<?php echo($codDestino);?>)">
                        <!--https://getbootstrap.com/docs/5.0/components/buttons/-->
                    </td>
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

    <div class="row">
        <div id="seg" class="col-xl-12 text-center">
          <label for="estaseguro">
          <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de modificar este Destino.</label>
        </div>
    </div>

    <div class="row">
      <div class="col-xl-12 text-center">
        <hr class="letra">
      </div>
    </div>

</form>

            </div> 
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>




