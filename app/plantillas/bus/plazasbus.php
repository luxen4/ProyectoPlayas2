<?php ob_start(); 
use miId\fuente\Repositorio\DestinoRepositorio;

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">
    <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/>             <!--OK-->
</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>
<?php $plazas=  $plazasBusTotales;

//var_dump($plazas);die();
?>

<div class="container">
<div class="row">
        <div class=" col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12 ">
            <h1>Selecciones de entre las <?php echo $plazas . " plazas (+1 Conductor)" ?></h1>
            <h4>IMPORTANTE: Tenga en cuenta que prebalece el dibujo frente a la disposición de las casillas</h4>
        </div>

    <form action="" method="post">
    <div class="row">
            <div class=" col-xl-1 text-center col-lg-1 col-md-1 col-sm-1 col-1 "></div>

            <div class=" col-xl-3 text-center col-lg-3 col-md-3 col-sm-3 col-3 ">
                <img  class="fotoplantabus"style="border: 1px solid black;" src="web/imagenes/bus<?=$plazas . '.jpg';?>" alt="Foto de un destin">
            </div>

            <div class=" col-xl-2 text-center col-lg-2 col-md-2 col-sm-2 col-2 "></div>

            <div  class=" col-xl-3 text-center col-lg-3 col-md-4 col-sm-4 col-4 casillas"style="border: 1px solid black;">
                <?php
                for($i=0; $i<=$plazas; $i++){
                    
                    if($i==0){

                       
                    }else{

                    
                    
                    ?>

                    <label class="plaza" for="plaza<?php echo($i)?>">
                        <input id="plaza<?php echo($i)?>" type="checkbox" name="datos[<?php echo($i)?>]" value="<?php echo($i)?>" 

                        <?php                                                               // Para que no muestre el checkbox si está la plaza ya ocupada.
                                for ($j=0; $j<count($plazasOcupadas); $j++) {
                                    if ($plazasOcupadas[$j]==$i){ ?>
                                            hidden
                        <?php  }
                                };
                        ?>    

                        > 
                        <span class="checkboxtext"><?php echo(" " . $i)?></span><br>
                    </label>

                    <?php if($i%4==0){?>
                    <br>
                    <?php }}?>

                <?php }?>
            </div> 

 

            <div class=" col-xl-3 text-center col-lg-3 col-md-2 col-sm-2 col-2"></div>
    </div>
    <br><br><br>

<?php 

//require __DIR__ . '/../../../fuente/Repositorio/destinoRepositorio.inc'; 
require $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc'; 


if(!empty($_SESSION['datosdestino'])){
$codDestino=$_SESSION['datosdestino'];

}else{
    $codDestino = $_SESSION['codigodestino'];
}


$destino = (new DestinoRepositorio())->nombreDestinoSeleccionado($codDestino);
$_SESSION['destino']=$destino;?>

<div class="container">
    <div class="row">
        <div class="col-xl-12 text-center col-lg-6 col-md-6 col-sm-6 col-12">
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


<div class="row">
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
            <div id="botones">
                <input type="submit" name="ocupaplazas" value="Ocupar">
                <input type="reset" name="reset" value="Reset">
            </div>
        </div>
</div>              
     
    </form>

<br>


<div class="row">
    <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12 ">
        <h2>Ocupación de las plazas del Bus</h2>
    </div>
</div>

<?php if(!empty($_SESSION['perfil'])){


//Si es el administrador y agencias, puede ver los datos de los ocupantes del bus, si es cliente, un plaza OCUPADA.
if($_SESSION['perfil']['roll']=="admin" || $_SESSION['perfil']['roll']=='agenciaviajes'){?>


<div class="row">
    <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12 ">

<?php       $numPlazasOcupadas=count($datosPlazasBusCliente);

                for($i=0; $i<$numPlazasOcupadas; $i++){
            echo("Plaza "   . $datosPlazasBusCliente[$i]->plaza_Bus . " " 
                            . $datosPlazasBusCliente[$i]->nombre . " " 
                            . $datosPlazasBusCliente[$i]->apellidos . " "
                            . $datosPlazasBusCliente[$i]->tlfnoParticular . "<br>"
                        
                        );
            }  }


    if($_SESSION['perfil']['roll']=="cliente"){?>

    <div class="row">
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12 ">

                <?php $numPlazasOcupadas=count($datosPlazasBusCliente);
                    for($i=0; $i<$numPlazasOcupadas; $i++){
                        echo("Plaza "   . $datosPlazasBusCliente[$i]->plaza_Bus . " OCUPADA. <br>" );
                    }  
    }
?>

    
    </div>
</div>
 
<?php }?>
</div>
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>

</body>
</html>

<?php $contenido = ob_get_clean() ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>





<?php /*
echo "Destino: " . $destino[0]["nombre_Lugar"] . "<br>Prov/Depart: " . $destino[0]['prov_Depart'] . "<br>Comunidad/Región: " . $destino[0]['com_Reg'] ."<br>País: " . $destino[0]['pais'] ."<br>Dia de la semana: " . $destino[0]['dia_Semana'] . 
 "<br>Fecha de Viaje: " . $destino[0]['fecha_Viaje'] . 
 "<br>Agencia: " . $destino[0]['agencia_Oferta'] . 
 "<br>Kilometros: " . $destino[0]['kilometrosIdaVuelta'] .
 "<br>Precio: " . $destino[0]['euros'] . "euros"; */?>




