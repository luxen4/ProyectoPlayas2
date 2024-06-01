<?php
namespace miId\fuente\Repositorio;
use miId\core\ConexionBd;

class AgenciaViajesRepositorio
{
     
// Función que busca el hash de una Agencia de Viajes
    public function hashAgenciaViajes($datos)
    {
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT contrasena FROM AGENCIAVIAJES WHERE username='$datos[username]'";
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

    // Función que busca los datos de una Agencia de Viajes
    public function datosAgenciaViajes($datos)
    {
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT cod_AgenciaViajes,nombre,nif,direcion,cp,localidad,provincia,comunidad,pais,
                email,telefono_Reserva,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado,cod_CompaniaBusHabitual,username,contrasena,
                pago_Online,num_CuentaPagosOnline,roll 
                FROM AGENCIAVIAJES WHERE username='$datos[username]'";

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
    //--------------------------------------------------------------------------------------------------------------------

    // Función que modifica los datos de una Agencia de Viajes
    public function modificarAgenciaViajes($datos,$cod_AgenciaViajes/*$hashActual*/, $nuevoHash):bool
    {
    //  var_dump($datos);die();  
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        
            $horario=$datos['horaEntrManana'] . " a " . $datos['horaSalManana'] . " y " . $datos['horaEntrTarde'] . " a " . $datos['horaSalTarde'] ;

            $sql="UPDATE AGENCIAVIAJES
                      SET nombre='$datos[nombre]',nif='$datos[nif]',direcion='$datos[direccion]',cp='$datos[cp]',
                      localidad='$datos[localidad]', provincia='$datos[provincia]',comunidad='$datos[comunidad]',pais='$datos[pais]',
                      email='$datos[email]',telefono_Reserva='$datos[tlfnoReserva]',telefono_Agencia='$datos[tlfnoAgencia]',
                      horario_Agencia='$horario',lugar_SalidaPredeterminado='$datos[lugarSalida]',cod_companiaBusHabitual='$datos[companiabus]', 
                      username='$datos[username]',contrasena='$nuevoHash',pago_Online='$datos[pagoonline]',num_CuentaPagosOnline='$datos[numCuenta]'
                WHERE cod_AgenciaViajes='$cod_AgenciaViajes'";
//var_dump($sql);die();


                $acentos = $gbd->query("SET NAMES 'utf8'");
                $result = $gbd->query($sql); ?>
                <script>alert("¡SU AGENCIA DE VIAJES HA SIDO MODIFICADA CON EXITO!");</script>

                <?php      return  true;
                } catch (\PDOException $e) {
                echo $e->getMessage();
                throw $ex; die();?>
                <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS,\n el campo email y/o podrían ya estar escogidos por otra persona!");</script><?php
                } catch (\Exception $ex) {
                throw $ex; die();?>

                <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS, el campo email podría estar repetido!");</script><?php
                } finally {
                $gbd = null;
}
    }



    // Función que inserta una Nueva Agencia de Viajes | Recive un array de datos
    public function nuevaAgenciaViajes($datos, $hash)
    {
        $horario=$datos['horaEntrManana'] . " a " . $datos['horaSalManana'] . " y " . $datos['horaEntrTarde'] . " a " . $datos['horaSalTarde'] ;

        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

            $sql="INSERT INTO AGENCIAVIAJES (/*codigoAgencia*/fecha_Inscripcion,nombre,nif,direcion,cp,localidad,provincia,comunidad,pais,
            email,telefono_Reserva,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado,cod_CompaniaBusHabitual, 
            username,contrasena,pago_Online,num_CuentaPagosOnline)
          
            VALUES	(default,'$datos[nombre]', '$datos[nif]', '$datos[direccion]','$datos[cp]','$datos[localidad]', '$datos[provincia]','$datos[comunidad]','$datos[pais]',
            '$datos[email]','$datos[tlfnoReserva]','$datos[tlfnoAgencia]','$horario','$datos[lugarSalida]','$datos[companiabus]',
            '$datos[username]','$hash','$datos[pagoonline]', '$datos[numCuenta]')";



// tIENE QUE VALORAR SI HEMOS TENIDO RESULTADO


            $acentos = $gbd->query("SET NAMES 'utf8'");
            $result = $gbd->query($sql); ?>
              <script>alert("¡NUEVA AGENCIA DE VIAJES INSERTADA CON EXITO!");</script>

<?php      return  true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            //throw $ex; die();?>
            <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS, el campo email podría estar repetido!");</script><?php
        } catch (\Exception $ex) {
            throw $ex; //die();?>
          <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS, el campo email podría estar repetido!");</script><?php
        } finally {
            $gbd = null;
        }
    }



    /* Función que inserta las relaciones de Agencia de Viajes y Agencias de Buses */
    public function relacionAgenciasViajesBuses($cod_AgenciaViajes, $cod_AgenciaBuses){
        $cod_AgenciaViajes = $cod_AgenciaViajes[0]->cod_AgenciaViajes;


        if (!empty($cod_AgenciaViajes)) {
            try {
                include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
                $sql="INSERT INTO RELACIONAGENCIAS (/*cod_RelacionAgencias*/cod_AgenciaViajes,cod_AgenciaBuses,fecha_Inscripcion)
                        VALUES	('$cod_AgenciaViajes', '$cod_AgenciaBuses', default)";
//var_dump($sql);die();
                $acentos = $gbd->query("SET NAMES 'utf8'");
                $result = $gbd->query($sql); ?>
                <script>alert("¡Relación confirmada!");</script><?php
            } catch (\PDOException $e) {
                //echo $e->getMessage();
                throw $e;
                die();?>
                    <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS EN RELACIÓN AGENCIAS!");</script><?php
                    return  false;
            } catch (\Exception $ex) {
                //throw $ex; //die();?>
                <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS EN RELAC. DE AGENCIAS!");</script><?php
                return  false;
            } finally {
                $gbd = null;
            }
        }

                        
            return  true;
    }
 
     /* Modificar preferencias entre Agencias */
     public function eliminarRelacionAgenciasViajesBuses($cod_AgenciaViajes){
            try {
                include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
                $sql="DELETE FROM RELACIONAGENCIAS WHERE cod_AgenciaViajes='$cod_AgenciaViajes'";

            
                $result = $gbd->query($sql); 

            } catch (\PDOException $e) {
                echo $e->getMessage();
                //throw $ex; die();?>
                            <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS, el campo email podría estar repetido!");</script><?php
                            return  false;
            } catch (\Exception $ex) {
                throw $ex; //die();?>
                        <script>alert("¡HA HABIDO UN ERROR CON LA INSERCIÓN DE LOS DATOS, el campo email podría estar repetido!");</script><?php
                        return  false;
            } finally {
                //$gbd = null;
            }
        ?>
           <?php
            return true;
        }



// Función que busca todas la Agencias de Viajes
    public function todasAgenciasDeViajes(){
        //echo "Estoy en AgenciaViajesRepositorio->todasAgenciasDeViajes";//die();
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT cod_AgenciaViajes,nombre,direcion,localidad,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado/*,codAgenciaViajes*/ FROM AGENCIAVIAJES";
           
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

    // Función que busca todas la Agencias de Viajes donde no es socio un usuario/Cliente
    public function todasAgenciasDeViajesDondeSeEsSocio($codUsuarioCliente){
      //  echo "Estoy en AgenciaViajesRepositorio->todasAgenciasDeViajesDondeSeEsSocio"; //die();
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
              //  $sql="SELECT nombre,direcion,localidad,telefono_Agencia,horario_Agencia,lugar_SalidaPredeterminado/*,codAgenciaViajes*/ FROM AGENCIAVIAJES";
           
               $sql="SELECT av.cod_AgenciaViajes, av.nombre,av.direcion,av.localidad,av.telefono_Agencia,av.horario_Agencia,av.lugar_SalidaPredeterminado FROM AGENCIAVIAJES av
                        INNER JOIN AGENCIAVIAJESCLIENTE ac ON av.cod_AgenciaViajes= ac.cod_AgenciaViajes 
                        INNER JOIN CLIENTE c ON c.cod_Cliente=ac.cod_Cliente
                        where ac.cod_Cliente='$codUsuarioCliente'";

                   // var_dump($sql);die();

                $result = $gbd->query($sql); 
            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

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


    // Función que busca el código de una Agencias de Viajes (lo hago separado ya que me estorba si lo hago en todasAgenciasDeViajes en la tabla de mostrar las Agencias)
    public function codigoAgenciasDeViajes($nombreAgenciaViajes){
  
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT cod_AgenciaViajes FROM AGENCIAVIAJES where nombre='$nombreAgenciaViajes'";
            $result = $gbd->query($sql);

            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        } catch (\PDOException $e) {
            echo $e->getMessage();
        } finally {
            $gbd = null;
        }
    }

        // Función que busca el código de una Agencias de Viajes con su $hash
        public function codigoAgenciasDeViajes2($hash){

            try {
                include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
                $sql="SELECT cod_AgenciaViajes FROM AGENCIAVIAJES where contrasena='$hash'";
                $result = $gbd->query($sql);
    
                return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);
    
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } finally {
                $gbd = null;
            }
        }

    // Función que muestra los datos de una Agencia de Viajes | La misma sesión creada en el logeo tiene los datos para hacer la consulta y extraer los datos
    public function datosAgenciaViajesLogeada(){
        $usernamee=$_SESSION['perfil']['username'];  $contrasenaa=$_SESSION['perfil']['contrasena'];

        try {  
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT  fecha_Inscripcion,nombre,nif,direcion,cp,
                  localidad,provincia,comunidad,pais, 
                  email,telefono_Reserva,telefono_Agencia,
                  horario_Agencia,pago_Online,num_CuentaPagosOnline,
                  username,contrasena FROM AGENCIAVIAJES WHERE username='$usernamee' and contrasena='$contrasenaa'";

            $result = $gbd->query($sql); 
            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

            }catch(\PDOException $e) {
                echo $e->getMessage();
            }finally{
                $gbd = null;
            }
    }


    // Función que inserta usuarios/Cliente en la tabla "AGENCIACLIENTE"
    public function insertarSocioAgenciasDeViajes($datos, $codigoAgenciaViajes){
        //echo"111";
       // var_dump($codigoAgenciaViajes);die();
      //$codAgenciaViajes=$codigoAgenciaViajes[0]->cod_AgenciaViajes; //die();
            try {
                include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
                $sql="INSERT INTO AGENCIAVIAJESCLIENTE (cod_Agenciaviajes, cod_Cliente/*,fechaInscripcion*/)
                VALUES	('$codigoAgenciaViajes','$datos[cod_Cliente]')";

                $result = $gbd->query($sql);?>
                <script>//alert("¡EXITO!");</script><?php    
                return  true;

            } catch (\PDOException $e) {
                echo $e->getMessage();
               // throw $ex; die();?>
                <script>alert("Usted ya es Socio de esta Agencia de Viajes");</script><?php
            } catch (\Exception $ex) {
                //throw $ex; die();?>
                <script>alert("Error");</script><?php
            } finally {
                $gbd = null;
            }

    }


    // Función que elimina usuarios/Cliente en la tabla "AGENCIACLIENTES"
    public function eliminarSocioAgenciasDeViajes($codCliente, $codigoAgenciaViajes){
       
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="DELETE FROM AGENCIAVIAJESCLIENTE WHERE cod_Agenciaviajes='$codigoAgenciaViajes' and cod_Cliente='$codCliente'"; 

            //var_dump($sql);
            $result = $gbd->query($sql);  

if ($result) {?>
        <script>//alert("¡SOCIO ELIMINADO CON EXITO!");</script><?php
} else {?>
    <script>alert("¡SOCIO NO ELIMINADO!");</script><?php
    return false;
}
        
    return true;

        } catch (\PDOException $ex) {
            throw $ex; ?><script>alert("¡LO SENTIMOS, No se ha podido eliminar el Cliente como Socio!");</script><?php
        } catch (\Exception $ex) {
            throw $ex; ?><script>alert("*");</script><?php
        } finally {
            $gbd = null;
        }
    }


    // ADMINISTRADOR //
// Función con la que el administrador mediante los checkboxes elimina Agencia de Viajes
   public function eliminarAgenciasDeViajes($cod_AgenciaViajes){
    try {
        include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
    
        $sql="DELETE FROM AGENCIAVIAJES WHERE cod_AgenciaViajes='$cod_AgenciaViajes'";

        $result = $gbd->query($sql); 
        ?><script>alert("¡Agencia de Viajes ELIMINADA CON EXITO!");</script><?php
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


// Función que elimina una Agencia de Viajes
                 
   public function eliminarAgenciaViajesLogeada($cod_AgenciaViajes){
    try {
        include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
    
        $sql="DELETE FROM AGENCIAVIAJES WHERE cod_AgenciaViajes='$cod_AgenciaViajes'";

        $result = $gbd->query($sql); 
        ?><script>alert("¡Agencia de Viajes ELIMINADA CON EXITO!");</script><?php
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
