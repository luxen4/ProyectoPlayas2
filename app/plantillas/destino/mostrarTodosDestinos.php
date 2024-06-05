<?php ob_start();
 //var_dump($destinos);die();?>
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
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
    <link rel="stylesheet" type="text/css" href="web/css/styles.css"> 
    <link rel="stylesheet" type="text/css" href="web/css/forms.css"> 

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>

<div class="container-fluid"> 

<div class="container">
   <div class="row">
        <div class="col-xl-12 text-center">
            <h1>Destinos Disponibles</h1><br>
        </div>
    </div>
<?php
if(empty($destinos)){
    echo "No tiene Destinos programados para su Agencia de Viajes";
}else{

  $i=0;?>

    <form action="" method="post">
    <?php //var_dump($destinos);//die();?>
    <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Destino</th>
            <th>Provincia</th>
            <th>Comunidad</th>
            <th>País</th>
            <th>Dia</th>
            <th>Fecha</th>
            <th>Bus</th>
            <th>Agencia</th> 
            <th>Precio</th>

            <th>Plazas</th>
            <th>Ocup.</th>
            <th>Disp.</th>
        <!--   
            <th>€</th>
        -->

 <?php if(!empty($_SESSION['perfil']['roll'])){
        if($_SESSION['perfil']['roll']=="cliente"){?>  
        
          <th>Reservadas</th> 
 <?php }else{?>


<?php }



};?>    
 
            
        </thead>

        <tbody>
                   
                <?php foreach($destinos as $destino){
                  ?>
                    <tr>
                <?php    $veces=0;
                       
                            foreach($destino as $desti){ 

                                if($veces==0){$codDestino=$desti;}      

                                if($veces!=0){?>
                                    <td>
                                        
                                        <?php
                                        if($veces==9){
                                            echo round($desti, 2, PHP_ROUND_HALF_DOWN) . "€";
                                            $precioBillete=$desti; $veces++;
                                        }else{
                                           echo /*utf8_encode(*/$desti/*)*/;
                                            $veces++;
                                        } ?>

                                    </td>

                <?php            }else{$veces++;}

                                        
if($veces==1){
//$nombreDestino="datos[" . $desti . "]";
$nombreDestino="datos[codigodestino]";
}

if(!empty($_SESSION['perfil']['roll'])){?>
                <?php if($veces==10){?>               

 <?php  if(!empty($_SESSION['perfil']['roll'])){
                if($_SESSION['perfil']['roll']=="cliente"){?>  
                    <td>
                        <label for="<?= $codDestino;?>" class="apuntarse">
                        <input id="<?= $codDestino;?>" type="checkbox" class="socio" name="<?=$nombreDestino;?>" value="<?=$codDestino/*$desti*/;?>" > Apuntarse</label>
                    </td>
        <?php   }
        };    

?>               
                <td><label><?= $plazasTotalesCadaBus[$i];?></label></td>
                <td><label><?= $plazasDisponibles[$i];?></label></td>
                <td><label><?= $plazasQuedanCadaBus[$i]; ?></label></td>

            <!--Comento porque no tiene nadie que manipular Destinos de su competencia
                <td><label><?= $precioBillete * $plazasDisponibles[$i] . "€";  $i++?></label></td>

                <td>
                    <input  type="submit" class="btn btn-primary" name="modificardestino" value="Modificar" onclick="selecciona(<?php echo($codDestino);?>)">
                </td>

                <td>   
                    <input id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" value="<?php echo($codDestino);?>" hidden >
                    <input  type="submit" class="btn btn-danger" name="cancelardestino" value="Cancelar" onclick="selecciona(<?php echo($codDestino);?>)">
                </td>
            -->

        </tr> 
            
    <?php $veces=0;?>
                    </tr> 
                        
                <?php
                                            $veces=0;
                                            }else{


                }}; ?>

                <?php }};?>
            

        </tbody>

    </table>

    <!--Por si se amplia <div id="botones"><input type="submit" name="apuntar" value="Enviar"><input type="reset" value="Limpiar"></div>-->


    <?php if(!empty($_SESSION['perfil']['roll'])){
        if($_SESSION['perfil']['roll']=="cliente"){?> 

<div class="separacion">
    <div class="row">
        <div id="seg" class="col-xl-12 text-center">
            <label for="estaseguroo"class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 ">
            <input id="estaseguroo" type="checkbox" name="asegura"> Doy mi consentimiento.</label>
        </div>

        <div id="botones">
            <input type="submit" name="apuntar" value="Contratar">
            <input type="reset" name="limpiar" value="Limpiar">
        </div>
    </div>
    <?php }}; ?>
</div> 

</form>

<?php };?>

            </div> </div>
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
  <script type="text/javascript" src="js/boostrap.min.js"></script>
  <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>



