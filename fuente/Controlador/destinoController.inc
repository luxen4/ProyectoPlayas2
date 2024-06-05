<?php
namespace miId\fuente\Controlador;
use miId\fuente\Modelo\Destino;
use miId\fuente\Repositorio\ViajarRepositorio;
use miId\fuente\Repositorio\DestinoRepositorio;
use miId\fuente\Repositorio\BusRepositorio;
use miId\fuente\Repositorio\AgenciaBusesRepositorio;

class DestinoController{

// Función que crea un nuevo destino
public function nuevoDestino(){

// Necesito la consulta de todos Buses de una compañía de Buses asociada a una Agencia de Viajes
require __DIR__ . '/../../fuente/Repositorio/BusRepositorio.inc';


$codAgenciaViajes=$_SESSION['perfil']['cod_AgenciaViajes']; // Tengo el código de la Agencia de Viajes, con esto ahora saco el código de la agencia de buses asociada

$busesCompania = (new BusRepositorio())-> todosBusesdeUnaAgenciaBusesCodAgenciaViajes($codAgenciaViajes);

$busesOtrasCompanias = (new BusRepositorio())-> todosBusesDisponiblesParaUnaAgenciaViajes($codAgenciaViajes);


      if(isset($_POST['nuevodestino'])){
            $datos=$_POST['datos'];
           
        if(isset($datos['estaseguro'])){
              try {
                  require __DIR__ . '/../../fuente/Modelo/Destino.inc';  
                  $destino =  new Destino ($datos);
      
                  require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';
                  $obj = (new DestinoRepositorio())->nuevoDestino($datos);
                  ?><script>window.location.href="index.php?ctl=inicio";</script><?php

              }catch (\DestinoException $ex) {
                $errores=$ex->getErrores();
                echo("No ha pasado los filtros");
              }
            
        }else{ ?>          
            <pre><script>alert("No ha seleccionado si está seguro de agregar este nuevo destino.!")</script></pre><?php
          }
        }
            require __DIR__ . '/../../app/plantillas/destino/formNuevoDestino.php';
  }    



// Función que borra un destino
public function borrarUnDestino(){}

// Función que modifica los datos de un destino
public function modificarDestino(){}


  // Función que muestra todos los destinos
  public function mostrarTodosDestinos(){  
     //echo "estoy en mostrar todos destinos"; die();
    
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';
    $destinos = (new DestinoRepositorio())->todosDestinos();  


    // Para buscar las plazas
    $plazasTotalesCadaBus=[];  $plazasQuedanCadaBus=[];     $plazasDisponibles=[];
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/BusRepositorio.inc';

    for($i=0; $i<count($destinos); $i++){

        $codDestino=$destinos[$i]->cod_Destino;
        $plazasBusTotales = (new BusRepositorio())->plazasTotalesBus($codDestino);
        array_push($plazasTotalesCadaBus, $plazasBusTotales[0]->plazas);

        $totalPlazas=$plazasBusTotales[0]->plazas;

        $plazasQuedanBus = (new BusRepositorio())-> plazasQuedanEnUnBus($codDestino);

        $plaz=($totalPlazas - count($plazasQuedanBus)); 
        array_push($plazasQuedanCadaBus, $plaz);


        $disp=$totalPlazas - $plaz;
        array_push($plazasDisponibles, $disp);

    }
//----------------------------------------------
    if(isset($_POST['apuntar'])){
      $datos=$_POST['datos'];
      if(isset($_POST['asegura'])){
          $codigoDestino=$datos;                                    // Sacar el código de destino
                    $key=array_keys($datos);
                    
                    $codigoDestino=$codigoDestino[$key[0]]; 
                    $_SESSION['codigodestino']=$codigoDestino;
                    
                    $codCliente=$_SESSION['perfil']['cod_Cliente'];           //var_dump($codCliente);die();          // Sacar el código del cliente
                    
                    $plazasAocupar=$_POST['datos'];                           // Sacar las plazas a ocupar
                   // Necesito la planta del bus
                    ?><script>window.location.href="index.php?ctl=motrarplantabus";</script><?php
                    
                    require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/ViajarRepositorio.inc';
                    
                    $datos = (new ViajarRepositorio())->ocuparPlazaBus($codigoDestino,$codCliente,$plazasAocupar);


      }else{?>          
        <pre><script>alert("No ha seleccionado si está seguro de agregar este nuevo destino.!")</script></pre><?php
      }
         
    }
    require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinos.php';
  } 

  
  // Función que muestra todos los destinos de una Agencia de Buses Logueada
  public function mostrarTodosDestinosQueVaUnaAgenciaBusesLogeada(){ //echo "entro a mostrarTodosDestinosQueVaUnaAgenciaBusesLogeada controller"; //die();
    $cod_AgenciaBusesLogeada=$_SESSION['perfil']['cod_AgenciaAutobus'];

    require $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';
    $destinos = (new DestinoRepositorio())->todosDestinosPorAgenciaBuses($cod_AgenciaBusesLogeada);  

    // Para buscar las plazas
    $plazasTotalesCadaBus=[];  $plazasQuedanCadaBus=[];     $plazasOcupadas=[];
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/BusRepositorio.inc';

    for($i=0; $i<count($destinos); $i++){

        $codDestino=$destinos[$i]->cod_Destino;
        $plazasBusTotales = (new BusRepositorio())->plazasTotalesBus($codDestino);

        array_push($plazasTotalesCadaBus, $plazasBusTotales[0]->plazas);
        $totalPlazas=$plazasBusTotales[0]->plazas;

        $plazasQuedanBus = (new BusRepositorio())-> plazasQuedanEnUnBus($codDestino);
        $plaz=($totalPlazas - count($plazasQuedanBus));
        array_push($plazasQuedanCadaBus, $plaz);

        $disp=$totalPlazas - $plaz;
        array_push($plazasOcupadas, $disp);

    }

        $infoDestino=[];
        if (isset($_POST['cancelardestino'])) {
                $datos=$_POST['datos'];
                $obj=(new DestinoRepositorio())->borrarUnDestino($datos['destinoseleccionado']);
            if ($obj==true) {
                ?><script>window.location.href="index.php?ctl=mostrartodosdestinosquevaunaagenciabuseslogeada";</script><?php
            } else {
                ?><script>alert("No se ha podido eliminar el destino seleccionado!");</script><?php
            }
        }

        if (isset($_POST['modificardestino'])) {  // Hace falta la info del destino a modificar
            $datos=$_POST['datos'];
            if (isset($datos['estaseguro'])) {
                $codDestino=$datos['destinoseleccionado'];
          
                $infoDestino=(new DestinoRepositorio())->infoDestino($codDestino);
                $_SESSION['infoDestino']=$infoDestino;
                //var_dump($infoDestino);die();

            ?><script>window.location.href="index.php?ctl=modificardestino";</script><?php
            } else {?>          
              <pre><script>alert("No ha seleccionado si está seguro de modificar el destino.!")</script></pre><?php

            }
        }
    require __DIR__ . '/../../app/plantillas/destino/mostrartodosdestinosdeunaagenciabuseslogeada.php';
  } 

  // Función que módifica un destino
  public function modificarUnDestino(){ 
   //  echo ("Entro a destinoController->modificarUnDestino"); //die();
    require __DIR__ . '/../../fuente/Repositorio/BusRepositorio.inc';
    //var_dump($_SESSION['perfil']);die();

    if(isset($_SESSION['perfil'])){
      if ($_SESSION['perfil']['roll']=="agenciabuses") {
          $codAgenciaBuses=$_SESSION['perfil']['cod_AgenciaAutobus']; // Tengo el código de la Agencia de Viajes, con esto ahora saco el código de la agencia de buses asociada
          $busesCompania = (new BusRepositorio())-> todosBusesdeUnaAgenciaBuses($codAgenciaBuses);
          
      }}
        require __DIR__ . '/../../fuente/Repositorio/AgenciaBusesRepositorio.inc'; // Necesito todas las Agencias de Buses y extraer datos para el Select
        $agenciasBuses = (new AgenciaBusesRepositorio())->todasAgenciasDeBuses();

        //var_dump($agenciasBuses);die();


    /*    if(isset($_SESSION['perfil'])){
            if ($_SESSION['perfil']['roll']=="agenciaviajes") {
              require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/AgenciaBusesRepositorio.inc';
              $agenciaViajes= (new AgenciaBusesRepositorio())->codigoAgenciaBuses();
              $codAgenciaBuses=$agenciaViajes[0]->cod_CompaniaBusHabitual;
              //var_dump($agenciaViajes[0]->cod_CompaniaBusHabitual);die();
              $busesCompania =  (new BusRepositorio())-> todosBusesdeUnaAgenciaBuses($codAgenciaBuses);
            }
        }
*/
        if(isset($_SESSION['perfil'])){
          if ($_SESSION['perfil']['roll']=="agenciaviajes") {
            $codAgenciaViajes=$_SESSION['perfil']['cod_AgenciaViajes']; 
            require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/AgenciaBusesRepositorio.inc';
            $busesCompania = (new BusRepositorio())-> todosBusesdeUnaAgenciaBusesCodAgenciaViajes($codAgenciaViajes);
            $todosBusesCompanias =  (new BusRepositorio())->  todosBusesDisponiblesParaUnaAgenciaViajes($codAgenciaViajes);
          }
      }

    if (isset($_POST['modificardestino'])) { 
        $datos=$_POST['datos'];
//var_dump($datos);die();
        $codDestino=$_SESSION['infoDestino'][0]->cod_Destino;
 
        if(isset($datos['estaseguro'])){
          try {
              require __DIR__ . '/../../fuente/Modelo/Destino.inc';  
              $destino =  new Destino ($datos);
  
              require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';

              $obj=(new DestinoRepositorio())->modificarUnDestino($datos,$codDestino);

              if ($obj==true) {

                    ?><script>window.location.href="index.php?ctl=inicio";</script><?php
              }else{
                ?><script>alert("No se ha podido modificar el destino seleccionado!");</script><?php
              }
          }catch (\DestinoException $ex) {
              $errores=$ex->getErrores();
              echo("No ha pasado los filtros");
          }
        }else{ ?>          
            <pre><script>alert("No ha seleccionado si está seguro de agregar este nuevo destino.!")</script></pre><?php
          }  
    }
      require __DIR__ . '/../../app/plantillas/destino/formModificarDestino.php';
    } 


  // Función que muestra todos los destinos de una Agencia de Viajes Logueada
  public function mostrarTodosDestinosDeAgenciaViajesLogeada(){ //echo "mostrarTodosDestinosDeAgenciaViajesLogeada"; //die();
    //echo "entro"; die();
        require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';
            $cod_AgenciaViajesLogeada=$_SESSION['perfil']['cod_AgenciaViajes'];
            $destinos = (new DestinoRepositorio())->todosDestinosPorAgenciaViajes($cod_AgenciaViajesLogeada);  //var_dump($destinos);die();

    // Para buscar las plazas
    $plazasTotalesCadaBus=[];  $plazasQuedanCadaBus=[];     $plazasOcupadas=[];
    require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/BusRepositorio.inc';

    for($i=0; $i<count($destinos); $i++){

        $codDestino=$destinos[$i]->cod_Destino;
        $plazasBusTotales = (new BusRepositorio())->plazasTotalesBus($codDestino);
        array_push($plazasTotalesCadaBus, $plazasBusTotales[0]->plazas);

        $totalPlazas=$plazasBusTotales[0]->plazas;

        $plazasQuedanBus = (new BusRepositorio())-> plazasQuedanEnUnBus($codDestino);
        $plaz=($totalPlazas - count($plazasQuedanBus)); 
        array_push($plazasQuedanCadaBus, $plaz);


        $disp=$totalPlazas - $plaz;
        array_push($plazasOcupadas, $disp);

    }

    $infoDestino=[];
    if (isset($_POST['cancelardestino'])) {
        $datos=$_POST['datos'];

            if(isset($_POST['asegura'])){ 
                    $obj=(new DestinoRepositorio())->borrarUnDestino($datos['destinoseleccionado']);

                    if ($obj==true) {
                        ?><script>window.location.href="index.php?ctl=mostrartodosdestinosdeagenciaviajeslogeada";</script><?php
                    } else {
                        ?><script>alert("No se ha podido eliminar el destino seleccionado!");</script><?php
                    }
            } else{ ?>          
              <pre><script>alert("No ha seleccionado si está seguro de agregar este nuevo destino.!")</script></pre><?php
            }
    }

    if (isset($_POST['modificardestino'])) {  // Hace falta la info del destino a modificar
        $datos=$_POST['datos'];
        if(isset($_POST['asegura'])){ 
            $codDestino=$datos['destinoseleccionado'];
      
            $infoDestino=(new DestinoRepositorio())->infoDestino($codDestino);
            $_SESSION['infoDestino']=$infoDestino;
            //var_dump($infoDestino);die();

        ?><script>window.location.href="index.php?ctl=modificardestino";</script><?php
        } else {?>          
          <pre><script>alert("No ha seleccionado si está seguro de modificar el destino.!")</script></pre><?php

        }
    }

    if(isset($_POST['apuntar'])){
      $datos=$_POST['datos'];

        $codigoDestino=$datos;                                 // Sacar el código de destino
        $key=array_keys($datos);
        
        $codigoDestino=$codigoDestino[$key[0]]; 
        
        $codCliente=$_SESSION['perfil']['cod_Cliente'];       // Necesito el código del cliente
        $plazasAocupar=$_POST['datos'];                       // Necesito la planta del bus
        
        ?><script>window.location.href="index.php?ctl=motrarplantabus";</script><?php
        header('Location: index.php?ctl=motrarplantabus');

        require __DIR__ . '/../../fuente/Repositorio/ViajarRepositorio.inc';
        $datos = (new ViajarRepositorio())->ocuparPlazaBus($codigoDestino,$codCliente,$plazasAocupar);

    }
    require __DIR__ . '/../../app/plantillas/destino/mostrartodosdestinosdeunaagenciaviajeslogeada.php';
  } 

  

// Función que muestra todos los destinos por lugar de destino
public function destinosPorFecha(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorFecha.php';
}

// Función que muestra todos los destinos por fecha
public function destinosPorFechaFiltrados(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorFecha.php';
}

// Función que muestra todos los destinos por lugar de destino
public function destinosPorDestino(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorDestino.php';
}

// Función que muestra todos los destinos por lugar de destino filtrados
public function destinosPorDestinoFiltrados(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorDestino.php';
}

// Función que muestra todos los destinos por lugar de destino
  public function   destinosPorAgenciaViajes(){
    require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
    require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorAgenciaViajes.php';
  }

// Función que muestra todos los destinos por Agencia de Viajes seleccionada
public function destinosPorAgenciaViajesFiltrados(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorAgenciaViajes.php';
}

// Función que muestra todos los destinos por dia de la semana
public function destinosPorDia(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorDia.php';
}


// Función que muestra los destinos a los que se ha apuntado un cliente.
public function tusDestinosContratados(){
      require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';
              $cod_Cliente=$_SESSION['perfil']["cod_Cliente"];
              $destinosContratados = (new DestinoRepositorio())->destinosDeUnClienteLogueado($cod_Cliente);  

      if (isset($_POST['cancelarbillete'])) {
              $datos=$_POST['datos'];
            
                
          if (isset($datos['estaseguro'])) { 
              $codigoDestino=$datos['destinoselecionado'];
              $plaza=$datos["plaza"];

              $obj = (new DestinoRepositorio())->cancelarBillete($codigoDestino,$cod_Cliente,$plaza);  
              ?><script>window.location.href="index.php?ctl=tusdestinoscontratados";</script><?php
            
          }else{ ?>
              <script>alert("¡LO SENTIMOS:\nDebe marcar la casilla de verificación!")</script><?php
          }
      }


      if(isset($_POST['generapdf'])){
              $datos=$_POST['datos'];   

              $cod_destino=$datos['destinoselecionado'];

              $plaza_bus=$datos['plaza'];
              $dest = (new DestinoRepositorio())-> destinosContratado($cod_destino,$plaza_bus);

              $_SESSION['dest']=$dest;?>
              <script>window.location.href="index.php?ctl=generarpdf";</script><?php
          
    }
      require __DIR__ . '/../../app/plantillas/destino/tusDestinosContratadoss.php';
    
    }

}

//header('Location: index.php?ctl=motrarplantabus');
//header('Location: index.php?ctl=tusdestinoscontratados');   
//header('Location: index.php?ctl=generarpdf');

//require $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/destino/tusDestinosContratadoss.php';

// Función que muestra todos los destinos por Agencia de Viajes seleccionada                            // POR HACER, es una función de usuario//
/*public function destinosPorDiaFiltrados(){
  require __DIR__ . '/../../fuente/Modelo/busquedas.inc';
  require __DIR__ . '/../../app/plantillas/destino/mostrarTodosDestinosPorDia.php';
}*/