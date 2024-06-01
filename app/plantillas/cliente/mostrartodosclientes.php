<?php ob_start(); 
//echo "entro al mostrartodosclientes.php"; //die();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todos los cli$todosClientess</title>
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">

</head>
<body>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/utilidades/utilidades.inc'; ?>
    <div class="container">
        <div class="row">
                <div class="col-xl-12 text-center ">
                    <h1>Todos los Clientes de la Plataforma</h1>
                </div>
        </div>
    </div>
    
<form action="" method="post">
        
   
        <div class="row">
          <!--  <div class="col-xl-10 col-lg-6 col-md-6 col-sm-6 col-12 cont">
                <hr>
            </div>
-->
            <div>
            <div class="table-responsive"> 
            <table id="tabla1" class="table table-striped table-responsive table-bordered table-hover" 
                        class="table stacktable border:0">
                            <thead>
                                <th>Nombre</th><th>Apellidos</th><th>NIF</th><th>Dirección</th><th>C.P.</th><th>Localidad</th> <th>Provincia</th>
                                <th>Comunidad</th><th>País</th><th>Email</th><th>Teléfono</th><th>F.Nacimiento</th><th>Sexo</th>
                                <th></th>
                            </thead>

                            <tbody>
                                <?php foreach($todosClientes as $todosClientes){?>
                                            <tr>
                                                <?php   $veces=0;
                                            
                                                    foreach($todosClientes as $cliente){ 

                                                        if($veces==0){
                                                            $codDes=$cliente;
                                                        }else{?>
                                                            <td><?=pasarUtf8($cliente);?></td>
                                                     <?php   }

                                                        if($veces==17){
                                                            $codtodosClientes=$cliente;
                                                            //var_dump($codcli$todosClientes);//die();
                                                            $veces++;
                                                        }else{
                                                            $veces++;
                                                        }               
                                                        ?>
                                                            
                                                        
                                                    <?php  
                                                        if($veces==14){?>                                 

                                                            <td>
                                                                <input id="<?php echo($codDes);?>" type="checkbox" name="datos[clienteaeliminar]" value="<?php echo($codDes);?>" hidden >
                                                                <input class="btn btn-danger" type="submit" name="eliminarcliente" value="Cancelar" onclick="selecciona(<?php echo($codDes);?>)">
                                                            </td>

                                                        <?php $veces++; ?>
                                            </tr>
                                                <?php   } } } ?>
                            </tbody>
                        </table>
                    </div>
            </div>

            <div id="seguridad" class="row">
                <div id="seg" class="col-xl-12 text-center">
                    <label for="asegura">
                    <input id="asegura" type="checkbox" name="asegura"> Estoy seguro de eliminar un Cliente.</label>
                </div>
            </div>
</div>
        </div>

    </form>
    <script type="text/javascript" src="js/jquery-3-5.1.min.js"></script>
    <script type="text/javascript" src="js/boostrap.min.js"></script>
    <script type="text/javascript" src="js/boostrap-bundle.min.js"></script>
    
</body>
</html>

<?php $contenido = ob_get_clean() ?>

<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/plantillas/basefantasma.php';?>

<style>
   /* .cont{margin-left: 5em;}
    .izda{margin-left: 13em;}*/
</style>

