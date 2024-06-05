<?php
namespace miId\fuente\Repositorio;
use miId\core\ConexionBd;

class AgenciaBusesRepositorio{  

// Función que inserta una Nueva Agencia de buses | Recive un array de datos y un hash/contraseña                                 --OK--                             
public function nuevaAgenciaBuses($datos,$hash){     

  $horario=$datos['horaEntrManana'] . " a " . $datos['horaSalManana'] . " y " . $datos['horaEntrTarde'] . " a " . $datos['horaSalTarde'] ;

  try {
    include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
 
      $sql="INSERT INTO AGENCIABUSES (/*codAgenciaAutobus,*/ fecha_incripcion, nombre, nif, direccion, cp,
          localidad, provincia, comunidad, pais, 
          email, telefono_Reserva,telefono_Agencia,
          horario_Agencia,pago_Online,numero_Cuenta,
          username,contrasena,roll)

          VALUES	(default,'$datos[nombre]', '$datos[nif]', '$datos[direccion]','$datos[cp]',
          '$datos[localidad]', '$datos[provincia]','$datos[comunidad]','$datos[pais]',
          '$datos[email]','$datos[tlfnoReserva]','$datos[tlfnoAgencia]',
          '$horario','$datos[pagoonline]','$datos[numCuenta]',
          '$datos[username]','$hash',default)";

        $acentos = $gbd->query("SET NAMES 'utf8'");
      $result = $gbd->query($sql); ?>
          <script>
            alert("¡NUEVA AGENCIA DE BUSES INSERTADA CON EXITO!");
          </script>

<?php   return  true;

  }catch(\PDOException $e) {
    //echo $e->getMessage();
    //throw $ex; /die();?>
        <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS,\n el campo email y/o username podrían ya estar escogidos por otra persona!");</script><?php //die();
  }catch(\Exception $ex){
    throw $ex;// die();?>
      <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS, el campo email/username podrían estar escogidos por otra persona!");</script><?php 
  }finally{
        $gbd = null;
    }

}

// Función que busca el hash de una Agencia de Buses
public function hashAgenciaBuses($datos){
    try {   
      include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
 
        $sql="SELECT contrasena FROM AGENCIABUSES WHERE username='$datos[username]'";
        $result = $gbd->query($sql); 
        return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        }catch(\PDOException $e) {
            echo $e->getMessage();
        }finally{
            $gbd = null;
        }
}


// Función que busca el hash de una Agencia de Buses, parámetros: username(para buscar la contraseña "hash")
public function datosAgenciaBuses($datos){

      try {   
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
 
          $sql="SELECT cod_AgenciaBuses,nombre,nif,direccion,cp,localidad,provincia,comunidad,pais,email,
                  telefono_Reserva,telefono_Agencia,horario_Agencia,numero_Cuenta,username,contrasena,roll FROM AGENCIABUSES WHERE username='$datos[username]'";
        
          $result = $gbd->query($sql); 
          return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

          }catch(\PDOException $e) {
              echo $e->getMessage();
          }catch(\Exception $ex){
              throw $ex;
          }finally{
              $gbd = null;
          }
}

// Función que muestra los datos de una Agencia de buses | La misma sesión creada en el logeo tiene los datos para hacer la consulta y extraer los datos                      
public function datosAgenciaBusesLogeada(){ 
  
          $usernamee=$_SESSION['perfil']['username']; 
          $contrasenaa=$_SESSION['perfil']['contrasena'];

      try {   
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
 
        $sql="SELECT  fecha_incripcion,nombre,nif,direccion,cp,
                localidad,provincia,comunidad,pais, 
                email,telefono_Reserva,telefono_Agencia,
                horario_Agencia,pago_Online,numero_Cuenta,
                username,contrasena FROM AGENCIABUSES WHERE username='$usernamee' and contrasena='$contrasenaa'";

        $result = $gbd->query($sql); 
        return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        }catch(\PDOException $e) {
            echo $e->getMessage();
        }catch(\Exception $ex){
            throw $ex;
        }finally{
            $gbd = null;
        }
}


// Función que devuelve el código de una agencia de buses                      
public function codigoAgenciaBuses(){ 
    $codAgenciaViajes=$_SESSION['perfil']['cod_CompaniaBusHabitual']; 
    
try {   
  include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

  $sql="SELECT cod_CompaniaBusHabitual FROM AGENCIAVIAJES WHERE cod_AgenciaViajes='$codAgenciaViajes'";


  $result = $gbd->query($sql); 
  return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

  }catch(\PDOException $e) {
      echo $e->getMessage();
  }catch(\Exception $ex){
      throw $ex;
  }finally{
      $gbd = null;
  }

  /*

   Creamos la conexión con la base de datos
  $conn = mysqli_connect($host, $username, $contrasena, $dbname);
  $conn->set_charset("utf8");                     https://www.oscarperez.es/problemas-con-las-enes-acentos-y-demas-caracteres-cuando-usas-mysql-y-php/
  // Aquí se revisa la conexión con MySQL
  if (!$conn) {
      die("la conexión ha fallado: " . mysqli_connect_error());
  }
 $host="fdb30.awardspace.net";
  $dbname="3714088_proyectoplayas";
  $username="3714088_proyectoplayas";
  $contrasena="alberite2";

  if (mysqli_query($conn, $sql)) {
    echo "Bravo";

    $result = $gbd->query($sql); 
    return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

    var_dump($results);

  } else {
    echo "Error al extraer dato" . mysqli_error($conn) . "<br>";
    return false;
  }
*/
  
}


// Función que modifica una Agencia de Buses logeada, recibe un array de datos
public function modificarAgenciaBusesLogeada(array $datos,string $hash){

$contrasenaa=$_SESSION['perfil']['contrasena'];
$nuevoHorario= $datos['horaEntrManana'] . " a " . $datos['horaEntrManana'] . " y " . $datos['horaEntrManana'] . " a " .  $datos['horaEntrManana'] ;

        try {   
          include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        
          
        $sql="UPDATE AGENCIABUSES
        SET /*fechaincripcion,*/nombre='$datos[nombre]',nif='$datos[nif]',direccion='$datos[direccion]',cp='$datos[cp]',
                      localidad='$datos[localidad]',provincia='$datos[provincia]',comunidad='$datos[comunidad]',pais='$datos[pais]', 
                      email='$datos[email]',telefono_Reserva='$datos[telefonoDeReserva]',telefono_Agencia='$datos[telefonoDeAgencia]',
                      
                      horario_Agencia='$nuevoHorario',

                      pago_Online='$datos[pagoonline]',numero_Cuenta='$datos[numeroCuenta]',
                      username='$datos[username]',contrasena='$hash'   WHERE contrasena='$contrasenaa'";


          $acentos = $gbd->query("SET NAMES 'utf8'");

          $result = $gbd->query($sql); 
          return  true;

          }catch(\PDOException $e) {
              echo $e->getMessage();
          }catch(\Exception $ex){
              throw $ex;
          }finally{
              $gbd = null;
          }
}

// Función que elimina la Agencia de Buses logeada (autoEliminación o eliminación por parte del administrador)
public function eliminarAgenciaBusesLogeada(){

  $codAgenciaBuses=$_SESSION['perfil']['cod_AgenciaAutobus'];

        try {   
          include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
 
          $sql="DELETE FROM AGENCIABUSES WHERE cod_AgenciaBuses='$codAgenciaBuses'" ; //  AND contrasena='$contrasena'
                  //var_dump($sql);  die();
          $result = $gbd->query($sql); ?>
          <script>alert("Agencia de Buses liminada con exito");</script><?php
          return true;

          }catch(\PDOException $e) {
              echo $e->getMessage();
          }catch(\Exception $ex){
              throw $ex;
          }finally{
              $gbd = null;
          }
}

// Función que busca todas las agencias de buses para el Select
public function todasAgenciasDeBuses(){
   
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
 
            //$sql="SELECT nombre,direccion,localidad,provincia,comunidad,pais,email,telefono_Agencia FROM AGENCIABUSES";
            $sql="SELECT cod_AgenciaBuses,nombre,direccion,localidad,provincia,comunidad,pais,email,telefono_Agencia FROM AGENCIABUSES";

            $result = $gbd->query($sql); 

            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

            }catch(\PDOException $ex){ 
              throw $ex; 
                                        ?><script>alert("¡LO SENTIMOS, Ha habido un problema!");</script><?php
            }catch(\Exception $ex){
              throw $ex;
                                        ?><script>alert("*");</script><?php
            }finally{
                $gbd = null;
            }
}

// Función que busca todas las Agencias de Buses
public function todasAgenciasDeBuses2(){
      
      try {
         include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

        $sql="SELECT nombre,direccion,localidad,provincia,comunidad,pais,email,telefono_Agencia FROM AGENCIABUSES";
          $result = $gbd->query($sql);
          return $results = $result->fetchAll(\PDO::FETCH_OBJ);

      } catch (\PDOException $e) {
          echo $e->getMessage();
          throw $ex; die();?>
          <script>alert("*");</script><?php
      } catch (\Exception $ex) {
          throw $ex; die();?>
          <script>alert("*");</script><?php
      } finally {
          $gbd = null;
      }
  }


// Función que busca el código de una Agencia de Buses
public function buscarCodAgenciaBuses($codAgenciaBuses){

    try {
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        $sql="SELECT cod_agenciaBuses FROM AGENCIABUSES WHERE cod_agenciaBuses='$codAgenciaBuses'";

        $result = $gbd->query($sql);
        return $results = $result->fetchAll(\PDO::FETCH_OBJ);

    } catch (\PDOException $e) {
        echo $e->getMessage();

        throw $ex; ?>
        <script>alert("¡LO SENTIMOS, Ha habido un problema!");</script><?php
    } catch (\Exception $ex) {
        throw $ex; ?>
        <script>alert("*");</script><?php
    } finally {
        $gbd = null;
    }
}

// Función que busca el nombre de una Agencia de Buses a partir de si código de la Agencia de Viajes
public function nombreAgenciaBuses($codAgenciaViajes){

      try {
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT ab.nombre FROM AGENCIABUSES ab 
                        INNER JOIN AGENCIAVIAJES av ON av.cod_CompaniaBusHabitual=ab.cod_AgenciaBuses
                        WHERE cod_agenciaViajes='$codAgenciaViajes'";
            
        $result = $gbd->query($sql); 
        return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

      } catch (\PDOException $e) {
          echo $e->getMessage();
          throw $e; ?>
          <script>alert("*");</script><?php
      } catch (\Exception $ex) {
          throw $ex; ?>
          <script>alert("*");</script><?php
      } finally {
          $gbd = null;
      }
}


// Función que elimina las Agencias seleccionadas por el administrador en los checkboxes
public function eliminarAgenciasDeBuses(string $nombreAgenciaBuses){
        try {
          include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
      
          $sql="DELETE FROM AGENCIABUSES WHERE nombre='$nombreAgenciaBuses'";

          $result = $gbd->query($sql); 
          ?><script>alert("¡Empresa de Buses ELIMINADA CON EXITO!");</script><?php
          return true;

        }catch(\PDOException $ex){ 
          throw $ex; 
                                    ?><script>alert("¡LO SENTIMOS, Ha habido un problema!");</script><?php
        }catch(\Exception $ex){
          throw $ex;
                                    ?><script>alert("*");</script><?php
        }finally{
            $gbd = null;
        }
}


}

  

