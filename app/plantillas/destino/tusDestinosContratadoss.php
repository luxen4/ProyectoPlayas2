<?php ob_start();
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
  <link rel="stylesheet" type="text/css" href="web/css/styles.css"> 
  <link rel="stylesheet" type="text/css" href="web/css/forms.css"> 
</head>
<body>
<script type=”text/javascript” src=”web/js/stacktable/stacktable.js”></script>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>

<div class="container">
<form action="" method="post">

    <div class="row">
      <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
          <h1>Mis Destinos contratados</h1>
      </div>
    </div> 

<?php 
    if(empty($destinosContratados)){?>
        <div class="row">
            <div id="ningun_destino" class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <h3>No tienes ningún Destino contratado hasta ahora!</h3>
            </div>
        </div> 

        <script>//alert("No tiene Destinos contratados")</script><?php
    }else{?>

    <div class="row">
    <div class="table-responsive"> 
    <table id="tabla1" class="table table-striped table-responsive table-bordered table-hover" 
                    class="table stacktable border:0">

            <thead>
                <th>Destino</th><th>Fecha</th>
                <th>Agencia de Viajes</th>
                <th>Teléfono</th>
                <th>Lugar de salida</th>
                <th>Bus</th>
                <th>Plaza</th>
                <th>Eliminar</th>
                <th>Justificante</th>
             
            </thead>

                <tbody>
        
                        <div class="col-xl-12 text-center col-lg-12 col-md-6 col-sm-6 col-12">

                            <?php foreach($destinosContratados as $destino){?>
                                <tr> <?php $veces=0;
                                
                                        foreach($destino as $desti){ 

                                            if($veces==0){$codDes=$desti;}

                                            if($veces==1){$codDestino=$desti;/*var_dump($codDestino); die();*/ $veces++; }else{$veces++;}                              
                                        
                                            if($veces>1){?><td><?php echo pasarUtf8($desti);?></td> <?php  }

                                            if($veces==8){$plaza=$desti;}
                                                    

                                            if($veces==8){?>
                                                <td>
                                                    <input id="<?php echo($codDes.'cod');?>" type="checkbox" name="datos[destinoselecionado]" value="<?php echo($codDes);?>" hidden>
                                                    <input id="<?php echo($plaza.'pla');?>" type="checkbox" name="datos[plaza]" value="<?php echo($plaza);?>" hidden>
                                                
                                                    <input class="btn btn-danger" type="submit" name="cancelarbillete" value="Cancelar" onclick="insertaIdDestino(<?php echo($codDes);?>); seleccionaPlaza(<?php echo($plaza);?>)">
                                                </td>

                                                <td >
                                                    
                                              <!--  <a class="dropdown-item" href="index.php?ctl=generarpdf" name="generapdf" onclick="selecciona(<?php echo($codDes);?>); seleccionaPlaza(<?php echo($plaza);?>)">Generar PDF.</a>-->
                                                <input class="btn btn-success" type="submit" name="generapdf"  value="Generar" onclick="insertaIdDestino(<?php echo($codDes);?>); seleccionaPlaza(<?php echo($plaza);?>)"       >
                                            
                                                </td>

                                                <?php $veces++; ?>      
                                </tr>
                            <?php }}}?>
                                
                        </div>
                    </div>

                    <?php   }?>
                    </div>
                </tbody>
            </table>
        </div>

 <?php   if(!empty($destinosContratados)){?> 
  
            <div class="row">
                <div id="seg" class="col-xl-12 text-center">
                    <label for="estaseguroo">
                    <input id="estaseguroo" type="checkbox" name="datos[estaseguro]" > Estoy seguro de eliminar mi Viaje.</label> 
                </div>
            </div>

 <?php };?>  
 
</form>
</div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script> 

</body>
</html>

 <?php $contenido = ob_get_clean() ?>
 <?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>
