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


<?php //var_dump($_SESSION['perfil']);
 
 ?>   
    <div class="container">
        <div class="row">
            <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                <h1>Todas las Agencias de Buses</h1>
            </div>
        </div>  
    </div>

<div class="container">
<div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">

<form action="" method="post">

<?php 
    if(!empty($agenciaBuses)){?>
         <table class="table table-striped table-bordered table-hover">
        <thead>
            <th>Nombre</th>
         <!--   <th>NIF</th> -->
            <th>Dirección</th>
         <!--   <th>Cp</th> -->
            <th>Localidad</th>
            <th>Provincia</th>
            <th>Comunidad</th>
            <th>País</th> 
            <th>email</th>
         <!--   <th>T. Reserva</th> -->
            <th>Tel/Oficina</th> 
         <!--   <th>Horario agencia</th> -->
         <!--   <th>Pago Online</th>  -->
         <!--   <th>Nº de Cuenta</th> -->
         <?php      if(!empty($_SESSION['perfil'])){
                if($_SESSION['perfil']['roll']==="admin"){ ?>
         <th>Eliminar</th>
          <?php      }}?>
         <!--   <th>Buses</th>-->
        </thead>

        <tbody>
                   
                <?php $veces=0;

                foreach($agenciaBuses as $agencia){?>
                        <!--<div class="row">-->
                                <tr>
                    <?php  
                                foreach($agencia as $atributo){ ?>
                                        <td><?= pasarUtf8($atributo);$veces++;?></td>
                                    <?php
                                        if($veces==1){
                                        $nombreAgencia="datos[" . $atributo . "]";
                                        $atribut=$atributo;
                                        }

            
             if(!empty($_SESSION['perfil'])){
                if($_SESSION['perfil']['roll']==="admin"){
            if($veces==8){?>
                    <td>
                        <label for="baja<?=$atribut;?>">
                        <input type="checkbox" id="baja<?=$atribut;?>" name="<?=$nombreAgencia;?>" value="<?=$atribut;?>"> </label>
                    </td>

                                </tr> 
                                   
    <?php
                                                        $veces=0;
}else{}}}}};?>

        </tbody>
    </table>
    <br>
<?php    }else{?>
            <p id="nohay"><?php echo ("¡No hay ninguna Agencia de Buses disponible en este momento!");?></p>
<?php    }

if(!empty($_SESSION['perfil'])){
                if($_SESSION['perfil']['roll']==="admin"){?>
<div class="row">
          <label for="estaseguro">
          <input id="estaseguro" type="checkbox" name="asegura"> Estoy seguro de eliminar las Agencias de Buses seleccionadas.</label>
</div>


<div id="botones">
            <input type="submit" name="eliminarAgenciasBus" value="Eliminar">
            <!--<input type="submit" name="verflotabuses" value="Ver Flota de Buses">-->
            <input type="reset" value="Limpiar">
        </div>


<?php }}?>

        
<br>

</form>

 </div> </div> </div>

    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>



<style>
    #nohay{color:red; font: 4em sans-serif; text-align: center;}
</style>