<?php
namespace miId\fuente\Controlador;

use miId\fuente\Modelo\Bus;
use miId\fuente\Repositorio\ClienteRepositorio;
use miId\fuente\Repositorio\BusRepositorio;
use miId\fuente\Repositorio\ViajarRepositorio;

class BusController
{
// Función que Da de Alta un Bus.
    public function nuevoBus(){
        if (isset($_POST['crearnuevobus'])) {
            $datos = $_POST['datos'];
            if (isset($_POST['asegura'])) {

                try {
                    //require __DIR__ . '/../../fuente/Modelo/Bus.inc';   // Ha entrado //
                    require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Modelo/Bus.inc';    // Para el host
                    $bus = new Bus($datos);

                    require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/BusRepositorio.inc';
                    $datos = (new BusRepositorio())->nuevoBus($datos);
                    
                    ?><script>window.location.href="index.php?ctl=inicio";</script><?php
                    //header('Location: index.php?ctl=inicio');
  

                } catch (\BusException$ex) {
                    $errores = $ex->getErrores();?>             <!--Para que marque cada error en la plantilla-->
                  <pre>  <script>alert("  ¡LO SENTIMOS,\n Hay campos que no son correctos!")</script></pre><?php
                    echo ("No ha pasado los filtros");
                }
            } else { ?>
          <pre>  <script>alert("¡Debe seleccionar su consentimiento!")</script></pre>
      <?php

            }
        }
        require __DIR__ . '/../../app/plantillas/bus/formNuevoBus.php';
    }

// Función que muestra la planta de un bus.
    public function motrarPlantaBus(){
                                  // require __DIR__ . '/../../fuente/Repositorio/ViajarRepositorio.inc';
        require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/ViajarRepositorio.inc';  // Para el host

        if(!empty($_SESSION['datosdestino'])){
            $cod_Destino = $_SESSION['datosdestino'];
        }else{
            $cod_Destino = $_SESSION['codigodestino'];
        }
             
        $infoPlazas = (new ViajarRepositorio())->infoOcupacionBus($cod_Destino);                        // Para buscar los nombres de los ocupantes de un bus.
        $datosPlazasBusCliente = (new ViajarRepositorio())->nombreClienteOcupacionPlaza($cod_Destino);


    $plazasOcupadas=[];
    for($i=0; $i<count($datosPlazasBusCliente); $i++){
        array_push($plazasOcupadas,$datosPlazasBusCliente[$i]->plaza_Bus);
    }

        //require __DIR__ . '/../../fuente/Repositorio/busRepositorio.inc';
        require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/BusRepositorio.inc';      // Para el host
        $codBus = (new BusRepositorio())->buscaCodBus($cod_Destino);

        // Ocupacion del bus
        $ocupacionBus = (new ViajarRepositorio())->infoOcupacionBus($cod_Destino);           // Nos da info de lo que se encuentra ocupado
       // var_dump(count($ocupacionBus));//die();                                            // Tengo que valorar si el bus ya va completo

        // Necesito las plazas totales del bus
        require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/BusRepositorio.inc';
        $plazasBusTotales = (new BusRepositorio())->plazasTotalesBus($cod_Destino);

        $plazasBusTotales=($plazasBusTotales[0]->plazas);//die(); ?><br><?php
        
        if(count($ocupacionBus)==$plazasBusTotales){ ?>
            <script>alert("COMPLETO")</script>
            <script>window.location.href="index.php?ctl=inicio";</script><?php
        }else{

        }

       // var_dump($plazasBusTotales);
        if($plazasBusTotales==19){
            require __DIR__ . '/../../app/plantillas/bus/bus_19plazas.php';
        }elseif($plazasBusTotales==28){
            require __DIR__ . '/../../app/plantillas/bus/bus_28plazas.php';     
        }elseif($plazasBusTotales==51){
            require __DIR__ . '/../../app/plantillas/bus/bus_51plazas.php';
        }elseif($plazasBusTotales==55){
            require __DIR__ . '/../../app/plantillas/bus/bus_55plazas.php';
        }elseif($plazasBusTotales==63){
            require __DIR__ . '/../../app/plantillas/bus/bus_63plazas.php';
        }


        if (isset($_POST['ocupaplazas'])) {
                if (isset($_POST['asegura'])) {
 
                    if ($_SESSION['perfil']['roll'] == 'cliente') {
                   
                        $codCliente = $_SESSION['perfil']['cod_Cliente']; 
                        $plazasAocupar = $_POST['datos']; 
                        $info= $_POST['info'];
        
                    // Necesito saber si ese número de cuenta es el del Cliente
                                                                                                                                                                //var_dump($info);die(); 
                        require_once $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/ClienteRepositorio.inc';
                        $numCuentaCorrecto = (new ClienteRepositorio())->numCuentaCorrecto($codCliente);
                                                                                                                                                                /*
                                                                                                                                                                var_dump($numCuentaCorrecto[0]->num_Cuenta);
                                                                                                                                                                var_dump($info['numcuenta']);die();
                                                                                                                                                                */
                        // Si son iguales, que reserve la plaza
                        if($numCuentaCorrecto[0]->num_Cuenta==$info['numcuenta']){?>
                            <script>//alert("¡Número de cuenta CORRECTO!")</script><?php 

                            // Necesitamos saber si previamente está reservada un instante antes
                            
                            $codBus=$codBus[0]->cod_Bus;
//var_dump($codBus);die();
                            $comprobarPlazaBus=(new ViajarRepositorio())->comprobarPlazaBus($cod_Destino, $codCliente, $codBus, $plazasAocupar);


                           // var_dump($comprobarPlazaBus);die();
                            if($comprobarPlazaBus){
                                ?><script>//alert("¡Plaza libre!")</script><?php  

                                 $datos = (new ViajarRepositorio())->ocuparPlazaBus($cod_Destino, $codCliente, $codBus, $plazasAocupar);?>
                                <script>//alert("¡Plaza/s Reservada!")</script>
                                <script>window.location.href="index.php?ctl=inicio";</script><?php
                                //header('Location: index.php?ctl=inicio');

                            }else{
                                ?><script>alert("¡Plaza ocupada!")</script><?php

                                
                            }
 
 


                               

                        }else{?>
                            <script>alert("¡Número de cuenta INCORRECTO!")</script><?php
                        }

                    } else {?>
                        <script>alert("¡Lo sentimos, debe logearse antes de apuntarse a un destino!")</script>
                        <?php
                             ?><script>window.location.href="index.php?ctl=logearcliente";</script><?php
                            //header('Location: index.php?ctl=logearCliente');
                    }
                    
                  
                } else { ?>
                    <pre>  <script>alert("¡Debe seleccionar su consentimiento!")</script></pre><?php
    
                }
        }
    }

// Función que Modifica un Bus
    public function modificarBus(){

        $codBus=$_SESSION['codBus'];

        if (isset($_POST['modificacionbus'])) {
            if (isset($_POST['asegura'])) {  
                 $datos = $_POST['datos'];
                
                try {
                    require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Modelo/Bus.inc';    // Para el host
                    $bus = new Bus($datos);

                   // require __DIR__ . '/../../fuente/Repositorio/BusRepositorio.inc';
                    require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/BusRepositorio.inc';

                    $datos = (new BusRepositorio())->modificarBus($datos, $codBus);
                    ?><script>window.location.href="index.php?ctl=todosbusesdeunaagenciabuses";</script><?php
                    header('Location: index.php?ctl=inicio');

                } catch (\BusException$ex) {
                    $errores = $ex->getErrores();?>             <!--Para que marque cada error en la plantilla-->
              <pre>  <script>alert("    ¡LO SENTIMOS,\n Hay campos que no son correctos!")</script></pre>
              <?php //echo ("No ha pasado los filtros");
                }

            } else { ?>
                    <pre>   
                        <script>
                            alert("¡Debe seleccionar su consentimiento!");
                           // window.location.href="index.php?ctl=todosbusesdeunaagenciabuses";
                        </script>
                    </pre><?php
            }
        }

        require __DIR__ . '/../../app/plantillas/bus/modificarbus.php';
    }


// Función que busca todos los buses.
    public function todosBusesdeUnaAgenciaBuses(){
    
        $codAgenciaBuses = $_SESSION['perfil']["cod_AgenciaAutobus"];
        require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/BusRepositorio.inc';   // Para el host

        $buses = (new BusRepositorio())->todosBusesdeUnaAgenciaBuses($codAgenciaBuses);
      
        if (isset($_POST['modificarbus'])) {
            if(isset($_POST['asegura'])){

                $_SESSION['codBus']=$_POST['modificar'];
                    $this->modificarBus();?>
                <script>window.location.href="index.php?ctl=modificarbus";</script><?php

            }else{ ?>
                <pre><script>alert("¡Debe seleccionar su consentimiento!")</script></pre><?php
            }
        }

        if (isset($_POST['eliminarbus'])) {
            if (isset($_POST['asegura'])) {
                if (!empty($_POST['eliminar'])) { // Seguridad por si no se selecciona nada
                    
                        $datos = $_POST['eliminar'];
                        $matricula = $datos['matricula'];
                        $buses = (new BusRepositorio())->eliminarBusAgenciaBusesLogeada($matricula); ?><script>window.location.href="index.php?ctl=todosbusesdeunaagenciabuses";</script><?php
                
                } else {?>
                    <script>alert("¡Seleccione un Bus a eliminar, por favor!")</script><?php }

            }else{?>
                <pre>   
                    <script>alert("¡Debe seleccionar que está seguro de eliminar!");
                            window.location.href="index.php?ctl=todosbusesdeunaagenciabuses";
                    </script>
                </pre><?php
            }
        }
        require __DIR__ . '/../../app/plantillas/bus/todosBusesdeUnaAgenciaBuses.php';
    }

}


