<?php ob_start(); 
//echo "estoy en logearcliente.php php"; //die();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href='web/css/stylesnuevo.css'/> 
    <link rel="stylesheet" type="text/css" href="web/css/stylesmostrar.css">

</head>
<body>

<div class="container">
    <div class="row" >
        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <input id="button_logeo_cliente" type="button" onclick="aparece()" value="Clientes Predeterminados"> 
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <input id="button_logeo_agenciasviajes" type="button" onclick="aparece()" value="Agencias de Viajes Predeterminadas"> 
        </div>

        <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-4">
            <input id="button_logeo_agenciasbuses" type="button" onclick="aparece()" value="Agencias de Buses Predeterminadas"> 
        </div>

    </div>
    

    <div class="row"> 
        
                
        <div id="logeo_cliente" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"><br>
                <pre>
                    <h6>Logueo Cliente roll=> cliente</h6>
    Adrián Laya   adri82/alberite <spam style="color:red;">admin</spam>    
    Javier Hernan javi82/alberite
    Eduardo       edu82/alberite	  
    Dayanna       dayanna82/venezuela	   
    Borja         borja82/alberite         
                </pre>
        </div>

        <div id="logeo_agenciaviajes" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"><br>
                    <pre>
                    <h6>Logueo Agencia de Viajes roll=> agenciaviajes</h6>
    Gran Reserva     reser21/reser21 
    GO TRAVELL       gotravell21/gotravell21         
    ROTUPRINT        rotu21/rotu21               
    AZUL MARINO      azulmarino21/azulmarino21 
    Zafiro Tours     zafiro21/zafiro21
    ---Pruebas---
    ViajesLaya           viajeslaya21/viajeslaya21
                    </pre>        
                </div>

        <div id="logeo_agenciabuses" class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-12"><br>
                    <pre>
                    <h6>Logueo Agencias de Buses roll=> agenciabuses</h6>
    Yanguas ---            yanguas21/yanguas21 
    Riojacar ---           riojacar21/riojacar21 
    Victor Bayo ---        victorbayo21/victorbayo21 
    Jimenez  ---           jimenez21/jimenez21 
    Logrobus ---           logrobus21/logrobus21    
    Autocares Laya ---     autocareslaya21/autocareslaya21  "nueva"
                    </pre>  
                </div>
    </div>
</div>

<div class="container"> 
        <div class="row">
                <div class="col-xl-12 text-center">
                    <h1>Login</h1>
                </div>
        </div>

<br>
    <form action="" method="post">

                <div class="row">

                    <div class="col-xl-2 col-lg-2"></div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 cont">
                            <label for="usuario">Username</label> <br>
                                <input type="text" name="datos[username]" id="usuario" value="<?php echo $datos['usuario'] ?? '' ?>" required><br>
                    </div>

                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12 cont">
                            <label for="pwd">Contraseña</label><br>
                                <input type="password" name="datos[contrasenaactual]" id="pwd" value="<?php echo $datos['pwd'] ?? '' ?>" required><br>
                    </div>
                    <div class="col-xl-2 col-lg-2"></div>
                </div>

                <div id="botones">
                    <input type="submit" name="logincliente" value="Entrar">
                    <input type="reset" value="Limpiar">
                </div>

    </form>

</div></div>

</body>
</html>

<?php $contenido = ob_get_clean() ?>
<?php require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/basefantasma.php';?>











<style>
     #logeo_cliente, #logeo_agenciaviajes,#logeo_agenciabuses{
        display: none;
    }
</style>

<script>
	$(document).ready(function() {		// Necesário encerrar bajo .ready(function)	
		// Función que esconde el contenido de "compañía de bus"


        $("#button_logeo_cliente").click(function() {	
			$("#logeo_cliente").toggle();
		});


		$("#button_logeo_agenciasviajes").click(function() {	
			$("#logeo_agenciaviajes").toggle();
		});

        $("#button_logeo_agenciasbuses").click(function() {	
			$("#logeo_agenciabuses").toggle();
		});

	});
</script>