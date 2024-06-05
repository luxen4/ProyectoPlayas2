<?php
namespace miId\fuente\Repositorio;
use miId\core\ConexionBd;

class DestinoRepositorio{  

// Función que inserta un nuevo destino | Recive un array de datos                                            
public function nuevoDestino($datos){    
        $cod_AgenciaViajes=$_SESSION['perfil']['cod_AgenciaViajes'];

            try {
                include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

                $sql0='SET lc_time_names = "es_ES"';

                $sql="INSERT INTO DESTINO (nombre_Lugar,prov_Depart,com_Reg,pais,dia_Semana,
                fecha_Viaje,cod_AgenciaOferta,kilometrosIdaVuelta,euros,cod_bus)

                    VALUES ('$datos[nombre]','$datos[provinciadepartamento]','$datos[comunidadregion]','$datos[pais]', DAYNAME('$datos[fechaviaje]'),
                    '$datos[fechaviaje]','$cod_AgenciaViajes','$datos[kilometros]','$datos[euros]','$datos[busasignado]')";


                $acentos = $gbd->query("SET NAMES 'utf8'");
                $result = $gbd->query($sql0); 
                $result = $gbd->query($sql);

                if ($result) {?>
                    <script>alert("¡Destino añadido CON EXITO!");</script><?php
                } else {?>
                <script>alert("¡Destino NO AÑADIDO!");</script><?php
                return false;
                }

                return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);
            } catch (\PDOException $e) {
                echo $e->getMessage();
            } finally {
                $gbd = null;
            }
}


// Función que borra un destino "creado por una Agencia de Viajes"
public function borrarUnDestino($codDestino){
    try {  
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        $sql=" DELETE FROM DESTINO WHERE cod_Destino='$codDestino'";

    //var_dump($sql);die();
       $result =$gbd ->query($sql); 
       return true;

   }catch(\PDOException $e) {
       echo $e->getMessage();
   }finally{
       $gbd = null;
   }
}

// Función que modifica los datos de un destino "creado por una Agencia de Viajes"
public function modificarUnDestino($datos, $codDestino){
    try {
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        $sql="UPDATE DESTINO
                  SET nombre_Lugar='$datos[nombre]',prov_Depart='$datos[provinciadepartamento]',com_Reg='$datos[comunidadregion]',pais='$datos[pais]',
                  dia_Semana= ELT(WEEKDAY('$datos[fechaviaje]') + 1, 'Lunes', 'Martes', 'Miercoles', 'Jueves', 'Viernes', 'Sabado', 'Domingo'),
                     fecha_Viaje='$datos[fechaviaje]',kilometrosIdaVuelta='$datos[kilometros]',
                  euros='$datos[euros]',cod_Bus='$datos[busasignado]'
                    WHERE cod_Destino='$codDestino'"; 
                    


    $acentos = $gbd->query("SET NAMES 'utf8'");      
    $result = $gbd->query($sql);

    if($result->rowCount()){ ?>
        <script>alert("VALOR MODIFICADO");</script><?php  

        return true;
        } else {?>
        <script>alert("Lo sentimos, no se ha podido modificar el BUS");</script><?php
        return false;
        } 

    }catch (\PDOException$e) {?>
    <script>alert("VALOR NO MODIFICADO,!");</script><?php 
    echo $e->getMessage();
        $insertado=false;
        return $insertado;

    } catch (\Exception$ex) {
        throw $ex; ?>
        <script>alert("¡No se Ha modificado el Destino!");</script><?php 
    } finally {
        $gbd = null;
}
}

// INICIO //
// Función que muestra todos los destinos
public function todosDestinos(){
        try {  
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

            $sql="SELECT  d.cod_Destino,d.nombre_Lugar,d.prov_Depart,d.com_Reg,d.pais,d.dia_Semana,d.fecha_Viaje,b.matricula,av.nombre,d.euros 
            FROM DESTINO d 
            INNER JOIN AGENCIAVIAJES av ON av.cod_AgenciaViajes=d.cod_AgenciaOferta
            /*INNER JOIN AGENCIABUSES ab ON ab.cod_AgenciaBuses=av.cod_CompaniaBusHabitual*/
            /*INNER JOIN BUS b ON b.cod_AgenciaBuses=ab.cod_AgenciaBuses*/
            INNER JOIN BUS b ON b.cod_Bus=d.cod_Bus
            where d.fecha_Viaje >=CURDATE() ORDER BY fecha_Viaje asc";

            $acentos = $gbd->query("SET NAMES 'utf8'");
            $result =$gbd ->query($sql); 
            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        }catch(\PDOException $e) {
            echo $e->getMessage();
        }finally{
            $gbd = null;
        }
}


// Función que nos da la info de plazas de un Bus de un destino
public function plazasBusViaje(){
    try {  
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

            $sql2="SELECT b.plazas,sum(v.plaza_Bus) FROM VIAJAR v
                            INNER JOIN BUS b ON v.cod_Bus=b.cod_Bus
                            WHERE d.fecha_Viaje >=CURDATE() ORDER BY fecha_Viaje asc";
      $result =$gbd ->query($sql); 
      return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

    }catch(\PDOException $e) {
        echo $e->getMessage();
    }finally{
        $gbd = null;
    }
}


// Función que busca los Destinos por fecha
public function todosDestinosPorFecha($datos){
    try {  
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        $sql="SELECT d.cod_Destino,d.nombre_Lugar,d.com_Reg,d.fecha_Viaje,d.dia_Semana, d.euros,
        d.cod_AgenciaOferta, av.nombre FROM DESTINO d INNER JOIN AGENCIAVIAJES av ON d.cod_AgenciaOferta=av.cod_AgenciaViajes 
        WHERE d.fecha_Viaje='$datos[fechaviaje]'";

        $acentos = $gbd->query("SET NAMES 'utf8'");
        $result = $gbd->query($sql); 
        return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

    }catch(\PDOException $e) {
        echo $e->getMessage();
    }finally{
        $gbd = null;
    }
}

// BUSCADORES //
// Función que busca los Destinos por Destino
public function todosDestinosPorDestino($datos){
   try {   
    include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        $sql="SELECT d.cod_Destino,d.nombre_Lugar,d.com_Reg,d.fecha_Viaje,d.dia_Semana, d.euros,
        d.cod_AgenciaOferta, av.nombre FROM DESTINO d INNER JOIN AGENCIAVIAJES av ON d.cod_AgenciaOferta=av.cod_AgenciaViajes 
        WHERE nombre_Lugar='$datos[lugardestino]' and d.fecha_Viaje >=CURDATE() ORDER BY d.fecha_Viaje ASC ";  // No va a salir Laredo que es del verano 2021 //

        $acentos = $gbd->query("SET NAMES 'utf8'");
        $result = $gbd->query($sql); 

        return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);
        
    }catch(\PDOException $e) {
        echo $e->getMessage();
    }finally{
        $gbd = null;
    }
}


// Función que busca todos los destinos a los que va a dar servicio una Agencia de Buses
 public function todosDestinosPorAgenciaBuses($datos){
     try {
        include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        $sql="SELECT d.cod_Destino, d.nombre_Lugar,d.prov_Depart, d.com_Reg, d.pais, d.dia_Semana, d.fecha_Viaje,
                    d.kilometrosIdaVuelta, d.euros, b.matricula, b.plazas FROM DESTINO d INNER JOIN BUS b ON d.cod_Bus=b.cod_bus
                     WHERE b.cod_AgenciaBuses='$datos'";

        $acentos = $gbd->query("SET NAMES 'utf8'");
        $result = $gbd->query($sql); 

        return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        }catch(\PDOException $e) {
            echo $e->getMessage();
        }finally{
            $gbd = null;
        }
 }


 // Función que busca los nombres de los lugares de los Destinos (para el Select de las búsquedas que no se repitan)
 public function soloAgenciasDeViajes(){
            try {
              include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
                $sql = "SELECT * FROM AGENCIAVIAJES"; 

                $acentos = $gbd->query("SET NAMES 'utf8'");
                $result = $gbd->query($sql); 

            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

            }catch(\PDOException $e) {
                echo $e->getMessage();
            }finally{
                $gbd = null;
            }
}


 // Función que busca los nombres de los lugares de los Destinos (para el Select de las búsquedas que no se repitan)
 public function soloLugares(){
            try {
                include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
                $sql="SELECT DISTINCT nombre_Lugar FROM DESTINO ";

                $result = $gbd->query($sql); 
                return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

                }catch(\PDOException $e) {
                    echo $e->getMessage();
            }finally{
                $gbd = null;
            }
}


// BUSCADORES //
// Función que busca los Destinos por Agencia de Viajes
public function todosDestinosPorAgenciaViajes($codigoAgenciaViajes){
   // var_dump($codigoAgenciaViajes);
   // var_dump($codigoAgenciaViajes['agenciaviajes']);
    $codigoAgenciaViajes=$codigoAgenciaViajes["agenciaviajes"];
            try {   
                include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
               
                    $sql="SELECT d.cod_Destino,d.nombre_Lugar,d.prov_Depart,d.com_Reg,d.pais,d.dia_Semana,d.fecha_Viaje,d.kilometrosIdaVuelta,b.matricula,d.euros,
                        /*d.cod_AgenciaOferta,*/ av.nombre FROM DESTINO d 
                        INNER JOIN BUS b ON d.cod_Bus=b.cod_bus
                        INNER JOIN AGENCIAVIAJES av ON d.cod_AgenciaOferta=av.cod_AgenciaViajes 
                        WHERE av.cod_AgenciaViajes='$codigoAgenciaViajes'";
    
                $acentos = $gbd->query("SET NAMES 'utf8'");
                $result = $gbd->query($sql); 
                return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);
        
            }catch(\PDOException $e) {
                echo $e->getMessage();
            }finally{
                $gbd = null;
            }
        }


// BUSCADORES //
 // Función que busca los nombres de los lugares de los Destinos (para el Select de las búsquedas que no se repitan)
 public function todosDestinosPorDia($datos){
   
        try { 
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql0='SET lc_time_names = "es_ES"';
            $sql="SELECT d.cod_Destino,d.nombre_Lugar,d.prov_Depart,d.com_Reg,d.pais,d.dia_Semana,d.fecha_Viaje,av.nombre,d.euros, d.cod_AgenciaOferta 
            FROM DESTINO d INNER JOIN AGENCIAVIAJES av ON av.cod_AgenciaViajes=d.cod_AgenciaOferta
            where d.dia_Semana='$datos[diasemana]' and d.fecha_Viaje >=CURDATE() ORDER BY d.fecha_Viaje ASC ";

            $acentos = $gbd->query("SET NAMES 'utf8'");
            $result = $gbd->query($sql); 

            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

            }catch(\PDOException $e) {
                echo $e->getMessage();
            }finally{
                $gbd = null;
            }
    }

// BUSCADORES //
  // Función que busca el Destino a partir de su código
  public function nombreDestinoSeleccionado($codigDestino){
  
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT d.cod_Destino,d.nombre_Lugar,d.prov_Depart,d.com_Reg,d.pais,d.dia_Semana,d.fecha_Viaje,av.nombre,d.kilometrosIdaVuelta, d.euros, d.cod_AgenciaOferta 
            FROM DESTINO d INNER JOIN AGENCIAVIAJES av ON d.cod_AgenciaOferta=av.cod_AgenciaViajes 
            WHERE d.cod_Destino='$codigDestino' ORDER BY d.fecha_Viaje ASC ";

            $result = $gbd->query($sql); 
            return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

            }catch(\PDOException $e) {
                echo $e->getMessage();} catch (\Exception$ex) {
                throw $ex;
            } finally {
                $gbd = null;
            }
  }

  
// Función que busca todos los destinos contratados por un cliente.         (Después se genera el PDF)
public function infoDestino($cod_destino){
         try {
             include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc';                
 
            // $sql=  "SELECT * FROM DESTINO WHERE cod_Destino='$cod_destino'";

        $sql="SELECT d.cod_Destino,d.nombre_Lugar,d.prov_Depart,d.com_Reg,d.pais,d.dia_Semana,d.fecha_Viaje,d.kilometrosIdaVuelta,d.euros, b.matricula
             FROM DESTINO d INNER JOIN BUS b ON b.cod_Bus=d.cod_Bus
             WHERE d.cod_Destino='$cod_destino'";

                 $result = $gbd->query($sql); 
                 return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);
 
         } catch (\PDOException $ex) {
             throw $ex; ?><script>alert("¡LO SENTIMOS, Ha habido un problema!");</script><?php 
         } catch (\Exception $ex) {
             throw $ex; ?><script>alert("*");</script><?php 
         } finally {
             $gbd = null;
         }
 }


// Función que busca todos los destinos contratados por un cliente.
 public function destinosDeUnClienteLogueado($cod_Cliente){
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE             

            $sql="SELECT d.cod_Destino,d.nombre_Lugar, d.fecha_Viaje, av.nombre, av.telefono_Reserva, av.lugar_SalidaPredeterminado,
                            v.cod_Bus,v.plaza_Bus FROM VIAJAR v
                    INNER JOIN DESTINO d ON v.cod_Destino=d.cod_Destino
                    INNER JOIN AGENCIAVIAJES av ON d.cod_AgenciaOferta= av.cod_AgenciaViajes
                    WHERE v.cod_Cliente='$cod_Cliente'"; ?>

                <script>//alert("¡Mostrando todos sus Destinos!");</script><?php
                $result = $gbd->query($sql); 
                    return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        } catch (\PDOException $ex) {
            throw $ex; ?><script>alert("VALOR NO INSERTADO UNIQUE!");</script><?php 
        } catch (\Exception $ex) {
            throw $ex; ?><script>alert("VALOR NO INSERTADO UNIQUE!");</script><?php 
        } finally {
            $gbd = null;
        }
}

// Función que busca la información de un Billete contratado por un Cliente.         (Después se genera el PDF)
public function destinosContratado($cod_destino,$plaza_Bus){
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc';                

            $sql=  "SELECT d.cod_Destino,d.nombre_Lugar, d.fecha_Viaje,
                            av.nombre, av.telefono_Reserva,	av.lugar_SalidaPredeterminado,
                            v.cod_Bus,v.plaza_Bus FROM VIAJAR v
        
                            INNER JOIN DESTINO d ON v.cod_Destino=d.cod_Destino
                            INNER JOIN AGENCIAVIAJES av ON d.cod_AgenciaOferta=av.cod_AgenciaViajes
                            WHERE d.cod_Destino='$cod_destino' and v.plaza_Bus='$plaza_Bus' ";


                $result = $gbd->query($sql); 
                return  $results = $result -> fetchAll(\PDO::FETCH_OBJ);

        } catch (\PDOException $ex) {
            throw $ex; ?><script>alert("¡LO SENTIMOS, Ha habido un problema!");</script><?php 
        } catch (\Exception $ex) {
            throw $ex; ?><script>alert("*");</script><?php 
        } finally {
            $gbd = null;
        }
}

// Función que cancela un billete ya comprado de un cliente desde la tabla "Tus Destinos contratados"
public function cancelarBillete($codDestino,$codCliente,$plaza):bool{
        try {
            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc';                
            $gbd = new \PDO("mysql:host=$host;dbname=$dbname", $username, $contrasena);

            $sql=  "DELETE FROM VIAJAR WHERE cod_Destino='$codDestino' AND cod_Cliente='$codCliente' AND plaza_Bus='$plaza'";
            //var_dump($sql);die();
            $result = $gbd->query($sql); 

            if ($result) {?>
                <script>alert("¡Su Billete ha sido Cacelado con exito!");</script><?php
            } else {?>
            <script>alert("¡Destino NO CANCELADO!");</script><?php
            return false;
            }



            return true;
        
            }catch(\PDOException $ex){ 
            throw $ex; ?>
                <script>alert("¡LO SENTIMOS, Ha habido un problema!");</script><?php
            }catch(\Exception $ex){
            throw $ex; ?>
                <script>alert("*");</script><?php
            }finally{
                $gbd = null;
        }
 }

}