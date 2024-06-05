<?php
namespace miId\fuente\Controlador;
use miId\fuente\Repositorio\ClienteRepositorio;
use miId\fuente\Repositorio\DestinoRepositorio;
use miId\fuente\Repositorio\AgenciaViajesRepositorio;
use miId\fuente\Repositorio\AgenciaBusesRepositorio;


class DefaultController{
  
  // Función que situa en la pantalla principal de inicio y presenta todos los Destinos en forma de cards
  public function inicio()
  { 

    require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/DestinoRepositorio.inc';
   
          $destinos = (new DestinoRepositorio())->todosDestinos();  
          //var_dump(count($destinos));die();
          $_SESSION['destinos']=$destinos; 

          $_SESSION['fotosLugares']= array('Alberite','Santoña','Zarautz','Fuenterrabía','San Sebastián',
        'Noja','Biarritz','Laredo','Santander','Castro Urdiales','Hendaya','Saint-Jean-de-Luz','Getaria','Zumaia','Orio','Somo','Plentzia','Lekeitio','Isla','Ajo');

          $soloLugares = (new DestinoRepositorio())->soloLugares(); 
          $_SESSION['sololugares']=$soloLugares;
 
          $soloAgenciasDeViajes= (new DestinoRepositorio())->soloAgenciasDeViajes();
          $_SESSION['soloagenciasdeviajes']=$soloAgenciasDeViajes;


        //$infoPlazasBusDestino=(new DestinoRepositorio())->plazasBusViaje();  

    if(isset($_POST['consultarporfecha'])){
      $datos=$_POST['datos']; 
      $destinos = (new DestinoRepositorio())->todosDestinosPorFecha($datos);  
      $_SESSION['destinos']=$destinos; 
      //header('Location:index.php?ctl=destinosporfecha'); 
    }
    
    if(isset($_POST['consultarpordestino'])){
        $datos=$_POST['datos']; 
        $destinos = (new DestinoRepositorio())->todosDestinosPorDestino($datos);
        $_SESSION['destinos']=$destinos;
        //header('Location:index.php?ctl=destinospordestino'); 
    }

    if(isset($_POST['consultarporagenciaviajes'])){
      $datos=$_POST['datos']; 
      $destinos = (new DestinoRepositorio())->todosDestinosPorAgenciaViajes($datos);  
      $_SESSION['destinos']=$destinos;
      //header('Location:index.php?ctl=destinosporagenciaviajes'); 
    }

    if(isset($_POST['consultarpordia'])){
      $datos=$_POST['datos']; //die();
      $destinos = (new DestinoRepositorio())->todosDestinosPorDia($datos);  
      $_SESSION['destinos']=$destinos;
    }
  
    
    if(isset($_POST['apuntar'])){
      $datos=$_POST['datos'];// var_dump($datos);die();
      $_SESSION['datosdestino']=$datos['destinoseleccionado'];?>
      <script>window.location.href="index.php?ctl=motrarplantabus";</script><?php
     // header('Location:index.php?ctl=motrarplantabus'); 
    }
    
    require __DIR__ . '/../../app/plantillas/inicio.php';
    //require_once $_SERVER['DOCUMENT_ROOT'] . '/proyecto/app/plantillas/inicio.php';
  }



// Función que logea un Cliente
public function logearCliente(){
//echo "entrooooo a logear cliente"; //die();
    if(isset($_POST['logincliente'])){
        $datos=$_POST['datos'];

       //header('Location: /playas2024/index.php');

        //Tenemos que comprobar si la contraseña se encuentra en la base de datos.

        require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/ClienteRepositorio.inc';

        $hash=password_hash($datos['contrasenaactual'],PASSWORD_DEFAULT);

        $obj = (new ClienteRepositorio())->hashClienteAgenciaViajes($datos,$hash);
         //var_dump($obj[0]->contrasena);die();
          if(!empty($obj[0]->contrasena)){
          
              if(password_verify($datos['contrasenaactual'], $obj[0]->contrasena)){
               
                    // Hago una sesión que acoge username y contraseña y roll del usuario logeado en este momento
                    $_SESSION['perfil']=array("nombre"=>$obj[0]->nombre, "cod_Cliente"=>$obj[0]->cod_Cliente,"username"=>$datos['username'],
                    "contrasena"=>$obj[0]->contrasena,"roll"=>$obj[0]->roll); { ?>
                      <script>/*alert("Datos CORRECTOS")*/</script><?php
                    }
                    $todoBien=true;
                    $this->meterIndex();
                    //header('Location: /playas2024/index.php');
                    ?><script>window.location.href="index.php?ctl=inicio";</script><?php
                        
              }else{ ?>
                <script>alert("Datos Incorrectos")</script><?php
              }
          }else{?>
                <script>alert("¡Lo sentimos, los datos introducidos no se encuentran registrados!")</script><?php  
          }
    }
    
    require $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/cliente/formLogearCliente.php';
}


public function meterIndex(){?>
  <script>//alert("Datos CORRECTOS")</script><?php 
}


// Función que logea una Agencia de Viajes
public function logearAgenciaViajes(){

  if(isset($_POST['logincliente'])){
      $datos=$_POST['datos'];

      //Tenemos que comprobar si la contraseña se encuentra en la base de datos.
       require __DIR__ . '/../../fuente/Repositorio/AgenciaViajesRepositorio.inc';
      // require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/agenciaViajesRepositorio.inc';
      $hash=password_hash($datos['contrasenaactual'],PASSWORD_DEFAULT);
      $obj = (new AgenciaViajesRepositorio())->hashAgenciaViajes($datos,$hash);

      if(!empty($obj)){
        $hasContrasena=$obj[0]->contrasena;//die();
      }
        if(!empty($hasContrasena)){
        
            if(password_verify($datos['contrasenaactual'], $hasContrasena)){
                                                                                              // Hago una sesión que acoge username y contraseña y roll del usuario logeado en este momento
                  $datos=(new AgenciaViajesRepositorio())->datosAgenciaViajes($datos);

                  require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/AgenciaBusesRepositorio.inc';
                  $codAgenciaBuses=$datos[0]->cod_CompaniaBusHabitual;
                  $codigoAgenciaViajes=$datos[0]->cod_AgenciaViajes;
                  $nombreAgenciaBuses=(new AgenciaBusesRepositorio())->nombreAgenciaBuses($codigoAgenciaViajes);

// var_dump($nombreAgenciaBuses);die();   
//  $_SESSION['perfil']['cod_CompaniaBusHabitual'];

                  $_SESSION['perfil']=array(
                      "cod_AgenciaViajes"=>$datos[0]->cod_AgenciaViajes,
                      "name"=>$datos[0]->nombre,
                      "nif"=>$datos[0]->nif,
                      "direcion"=>$datos[0]->direcion,
                      "cp"=>$datos[0]->cp,
                      "localidad"=>$datos[0]->localidad,
                      "provincia"=>$datos[0]->provincia,
                      "comunidad"=>$datos[0]->comunidad,
                      "pais"=>$datos[0]->pais,
                      "email"=>$datos[0]->email,
                      "telefono_Reserva"=>$datos[0]->telefono_Reserva,
                      "telefono_Agencia"=>$datos[0]->telefono_Agencia,
                      "horario_Agencia"=>$datos[0]->horario_Agencia,
                      "lugar_SalidaPredeterminado"=>$datos[0]->lugar_SalidaPredeterminado,
                      "cod_CompaniaBusHabitual"=>$datos[0]->cod_CompaniaBusHabitual,  // Necesito el nombre de la Compañia de Buses
                      "nombreAgenciaBuses"=>$nombreAgenciaBuses[0]->nombre,
                      "username"=>$datos[0]->username,
                      "contrasena"=>$datos[0]->contrasena,
                      "pago_Online"=>$datos[0]->pago_Online,
                      "num_CuentaPagosOnline"=>$datos[0]->num_CuentaPagosOnline,
                      "roll"=>$datos[0]->roll);

                     
                      ?><script>window.location.href="index.php?ctl=mostrartodosdestinosdeunaagenciaviajeslogeada";</script><?php
                    // header('Location:index.php?ctl=mostrartodosdestinos'); 
            }

        }else{?>
              <script>alert("¡Lo sentimos, los datos introducidos no se encuentran registrados!")</script><?php  
        }
  }
  require __DIR__ . '/../../app/plantillas/cliente/formLogearCliente.php';   // Se me ocurre que podemos utilizar el mismo archivo 
}


// Función que logea una Agencia de Buses
public function logearAgenciaBuses(){
 
  if(isset($_POST['logincliente'])){
      $datos=$_POST['datos'];

      //Tenemos que comprobar si la contraseña se encuentra en la base de datos.
      //require __DIR__ . '/../../fuente/Repositorio/AgenciaBusesRepositorio.inc';
      require_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/fuente/Repositorio/AgenciaBusesRepositorio.inc';
      $hash=password_hash($datos['contrasenaactual'],PASSWORD_DEFAULT);
      $obj = (new AgenciaBusesRepositorio())->hashAgenciaBuses($datos,$hash);

        if(!empty($obj[0]->contrasena)){
        
            if(password_verify($datos['contrasenaactual'], $obj[0]->contrasena)){
                                                                                              // Hago una sesión que acoge username y contraseña y roll del usuario logeado en este momento
                  $datos=(new AgenciaBusesRepositorio())->datosAgenciaBuses($datos);

                  $_SESSION['perfil']=array( 
                  "cod_AgenciaAutobus"=>$datos[0]->cod_AgenciaBuses,
                  "name"=>$datos[0]->nombre,
                  "nif"=>$datos[0]->nif,
                  "cp"=>$datos[0]->cp,
                  "direccion"=>$datos[0]->direccion,
                  "localidad"=>$datos[0]->localidad,
                  "provincia"=>$datos[0]->provincia,
                  "comunidad"=>$datos[0]->comunidad,
                  "pais"=>$datos[0]->pais,
                  "email"=>$datos[0]->email,
                  "telefonoReserva"=>$datos[0]->telefono_Reserva,
                    "telefono_Agencia"=>$datos[0]->telefono_Agencia,
                    "horario_Agencia"=>$datos[0]->horario_Agencia,
                    "numero_Cuenta"=>$datos[0]->numero_Cuenta,
                  "username"=>$datos[0]->username,
                  "contrasena"=>$datos[0]->contrasena,
                  "roll"=>$datos[0]->roll);

                  ?><script>window.location.href="index.php?ctl=mostrartodosdestinosquevaunaagenciabuseslogeada";</script><?php
                  //header('Location:index.php?ctl=mostrartodosdestinosquevaunaagenciabuseslogeada');
                  //header('Location:index.php?ctl=infoagenciabuses'); 
              
            }

        }else{?>
              <script>alert("¡Lo sentimos, los datos introducidos no se encuentran registrados!")</script><?php  
        }
  }
  require __DIR__ . '/../../app/plantillas/cliente/formLogearCliente.php';   // Se me ocurre que podemos utilizar el mismo archivo 
}

// Función que hace cerrar la sesión y situarse en la pantalla de inicio (Debería crear una función para cada uno de los roles)
  public function deslogearCliente(){
    if(isset($_SESSION['perfil'])){
        unset($_SESSION['perfil']);
        //unset($_SESSION['nombre']);
        session_unset(); session_destroy();
        ?><script>window.location.href="index.php?ctl=inicio";</script><?php
        //header('Location: index.php?ctl=inicio'); 
    }
  }

}

    //var_dump($obj[0]->roll']);die();
    //var_dump($_SESSION['perfil']);die();
    //header('Location: https://www.youtube.com/watch?v=V-CYJ3wbWOQ');
    //echo($_SESSION['perfil']); die();

    



