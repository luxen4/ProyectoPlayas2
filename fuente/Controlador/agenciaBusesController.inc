<?php ; 
namespace miId\fuente\Controlador;
use miId\fuente\Repositorio\AgenciaBusesRepositorio;
use miId\fuente\Modelo\AgenciaBuses;

class AgenciaBusesController
{
  // Función que crea una nueva Agencia de Buses.    
  public function nuevaAgenciaBuses(){ 
      if(isset($_POST['nuevaagenciabuses'])){
        $datos=$_POST['datos'];

              if(isset($datos['estaseguro'])){

                      if($datos['pwd']===$datos['pwdrepetida']){ // LAS CONTRASEÑAS SEAN IGUALES
                       
                      $hash=password_hash($datos['pwd'],PASSWORD_DEFAULT);//var_dump($hash);die();
                          try {
                              require __DIR__ . '/../../fuente/Modelo/AgenciaBuses.inc';  
                              $agenciaBuses =  new AgenciaBuses ($datos);
                      
                              require __DIR__ . '/../../fuente/Repositorio/AgenciaBusesRepositorio.inc';
                              $datos = (new AgenciaBusesRepositorio())->nuevaAgenciaBuses($datos,$hash);

                            // header('Location: index.php?ctl=inicio');

                          }catch (\AgenciaBusesException $ex) {
                            $errores=$ex->getErrores();
                            //echo("No ha pasado los filtros"); 
                            var_dump($errores);
                            //die();         ?>
                          <pre><script>alert("¡Lo sentimos, No ha pasado los filtros de los campos!")</script></pre><?php
                          }

                      }else{?>          
                          <pre><script>alert("¡Las contraseñas no son iguales!")</script></pre><?php
                      }

                      // Falta PONER LOS SELECT DONDE CORRESPONDA, COPIAR DE MODIFICACIÓN AGENCIABUSES
              }else{ ?>          
                <pre><script>alert("¡No ha seleccionado si está seguro de agregar esta nueva Agencia de Buses!")</script></pre>
        <?php }

      }
          require __DIR__ . '/../../app/plantillas/agenciaBuses/formNuevaAgenciaBuses.php';
  }



// Función que da de baja una Agencia de Buses logeada.
public function eliminarAgenciaBusesLogeada(){ 

  require __DIR__ . '/../../fuente/Repositorio/AgenciaBusesRepositorio.inc';
  $agenciaBuses = (new AgenciaBusesRepositorio())->datosAgenciaBusesLogeada();
  
  if(isset($_POST['eliminaragenciabuseslogeada'])){

    if(isset($_POST['estaseguro'])){
      $agenciaBuses = (new AgenciaBusesRepositorio())->eliminarAgenciaBusesLogeada();
      ?><script>window.location.href="index.php?ctl=deslogearCliente";</script><?php
      //header('Location: index.php?ctl=deslogearCliente');

    }else{?>      
    
    <pre>  <script>alert("¡Debe seleccionar si está seguro de ello!")</script></pre><?php   
    }
  }
  require __DIR__ . '/../../app/plantillas/agenciaBuses/eliminarAgenciaBusesLogeada.php';
}


// Función que permite modificar los datos de la Agencias de Bus logeada.
public function modificacionInfoAgenciaBusesLogeada(){ 
  
  require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/AgenciaBusesRepositorio.inc';
    $agenciaBuses = (new AgenciaBusesRepositorio())->datosAgenciaBusesLogeada();

    if(isset($_POST['modificardatosagenciabuseslogeada'])){
      $datos=$_POST['datos'];

      if(isset($datos['estaseguro'])){ 

        $hash=password_hash($datos['contrasena'],PASSWORD_DEFAULT);//var_dump($hash);die();

            try {
              require __DIR__ . '/../../fuente/Modelo/AgenciaBuses.inc';  
              $agenciaBuses =  new AgenciaBuses ($datos);
              $obj = (new AgenciaBusesRepositorio())->modificarAgenciaBusesLogeada($datos,$hash);?>

              <script>window.location.href="index.php?ctl=deslogearCliente";</script><?php
              //header('Location: index.php?ctl=deslogearCliente');  // ESTE HAFUNCIONADO DE MARAVILLA //

            }catch (\AgenciaBusesException $ex) {
              $errores=$ex->getErrores();
              echo("No ha pasado los filtros");
            }

      }else{ ?> 
      <pre><script>alert("¡No ha seleccionado si está seguro de agregar esta nueva Agencia de Buses!")</script></pre> <?php 
      }
    };

    require __DIR__ . '/../../app/plantillas/agenciaBuses/formModificarDatosAgenciaBusesLogeada.php';           
} 


// Función que muestra los datos de la Agencia de Buses logueada.
public function mostrarInfoAgenciaBusesLogeada(){

    require $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/fuente/Repositorio/AgenciaBusesRepositorio.inc';
    $agenciaBuses = (new AgenciaBusesRepositorio())->datosAgenciaBusesLogeada();

    require __DIR__ . '/../../app/plantillas/agenciaBuses/mostrarInfoAgenciaBusesLogeada.php';
}


// Función que muestra todas las Agencias de Buses y puede eliminarlas
  public function mostrarTodasAgenciaBuses(){

      require __DIR__ . '/../../fuente/Repositorio/AgenciaBusesRepositorio.inc'; 
      $agenciaBuses = (new AgenciaBusesRepositorio())->todasAgenciasDeBuses2();

      if(isset($_POST['eliminarAgenciasBus'])){
        if(isset($_POST['datos'])){

          $datos=$_POST['datos'];
          $numAgenciasAeliminar=count($datos);
          $clavesAgenciasBuses=array_keys($datos);

          if(isset($_POST['asegura'])){

              for($i=0; $i<$numAgenciasAeliminar; $i++){
                $obj = (new AgenciaBusesRepositorio())->eliminarAgenciasDeBuses($clavesAgenciasBuses[$i]);
              }

              ?><script>window.location.href="index.php?ctl=mostrartodasagenciabuses";</script><?php
              //header('Location: index.php?ctl=mostrartodasagenciabuses');

            }else{?>      
              <pre><script>alert("¡Debe seleccionar si está seguro de ello!")</script></pre><?php   
            }
        }else{?>
          <pre><script>alert("¡Debe seleccionar alguna Agencia de Buses!")</script></pre><?php   
        }
      }
      require __DIR__ . '/../../app/plantillas/agenciaBuses/mostrarTodasAgenciasDeBuses.php';
  }
}