<?php
namespace miId\fuente\Repositorio;
use miId\core\ConexionBd;

class ViajarRepositorio{  

// Función que comprueba si una plaza está libre
 public function comprobarPlazaBus($cod_Destino, $codCliente, $codBus, $plazasAocupar){
    
    

if(!empty($plazasAocupar["asientoseleccionado"])){          // Servidor gratuito
    $plazasAocupar=$plazasAocupar["asientoseleccionado"];
}else{
    $clave=array_keys($plazasAocupar);                      // Apaño para el local
    
    $plazasAocupar=$plazasAocupar[$clave[0]];
    var_dump($plazasAocupar);
}

    $sql="SELECT * FROM VIAJAR WHERE cod_Destino= $cod_Destino AND cod_Cliente=$codCliente AND cod_Bus=$codBus AND plaza_Bus=$plazasAocupar";	


    include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

    $result = $gbd->query($sql); 
    $results = $result -> fetchAll(\PDO::FETCH_OBJ); 

    var_dump($results);

    if (empty($results)) { 
        ?><script>//alert("LIBRE!");</script><?php
        return true; 
    } else {
        ?><script>alert("OCUPADA");</script><?php 
        return false;
    } 

} 

// Función que hace ocupar una plaza un cliente        https://www.hostinger.es/tutoriales/como-usar-php-para-insertar-datos-en-mysql/                                   
public function ocuparPlazaBus($codigoDestino,$codCliente,$codBus,$plazasAocupar){    // echo "ocupar plazabus viajar REPOSITORIO"; //die();
    $plazas=array_keys($plazasAocupar); $plaza=$plazas[0]; 

    foreach($plazasAocupar as $plaza){

        $sql="INSERT INTO VIAJAR (cod_Destino,cod_Cliente,cod_Bus,plaza_Bus)	
        VALUES ($codigoDestino,$codCliente,$codBus,$plaza)";

        include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionmysqli.inc'; // Modo MySql, si no, no lo hago tragar

        if (mysqli_query($conn, $sql)) { 
            ?><script>alert("BRAVO, plaza reservada \n BUÉN VIAJE!");</script><?php //echo "Nueva Plaza Asignada"; die();
        } else {
            ?><script>//alert("VALOR NO INSERTADO!");
            alert("Valor no insertado, ya ocupada justo hace un momento!");
            </script><?php //echo "Error: " . $sql . "<br>" . mysqli_error($conn); die();
        }
    }          
}

 // VERSION-2      
// Función que hace ver los nombres de los ocupantes de las plazas de bus                                    
public function infoOcupacionBus($cod_Destino){  
  /*  include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; 
        try {
            $sql="SELECT * FROM VIAJAR WHERE cod_Destino='$cod_Destino' ORDER BY plaza_Bus asc";

            $result = $gbd->query($sql);

            var_dump($result);die();
            return $results = $result->fetchAll(\PDO::FETCH_OBJ);

        }catch(\PDOException $ex){
            //throw $ex;?>
            <script>alert("¡El nombre de objeto 'VIAJAR' no es válido(No existe la tabla)!");</script><?php 
        }catch(\Exception $ex){
            throw $ex;
        }finally{
            $gbd = null;
        }
*/


        try {   
            include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
            $sql="SELECT * FROM VIAJAR WHERE cod_Destino='$cod_Destino' ORDER BY plaza_Bus asc";
        
                $result = $gbd->query($sql); 
                    return  $results = $result -> fetchAll(\PDO::FETCH_OBJ); 
            }catch(\PDOException $e) {
                echo $e->getMessage();
            }finally{
                $gbd = null;
            }


}


// Función que devuelve el nombre de un ocupante
public function nombreClienteOcupacionPlaza($codDestino){
    include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE

            try {
                    
                $sql="SELECT c.nombre,c.apellidos,c.tlfnoParticular,v.plaza_Bus FROM CLIENTE c INNER JOIN VIAJAR v 
                ON c.cod_Cliente = v.cod_Cliente
                WHERE v.cod_Destino='$codDestino'";
                
                $result = $gbd->query($sql);
                return $results = $result->fetchAll(\PDO::FETCH_OBJ);

            /*    if($result===true){
                    return $results = $result->fetchAll(\PDO::FETCH_OBJ);
                }else{
                    return $results = $result->fetchAll(\PDO::FETCH_OBJ);
                }
            */

                

            } catch (\PDOException $e) {
                echo $e->getMessage();
                throw $ex; die();?>
                <script>alert("¡El nombre de objeto 'VIAJAR' no es válido(No existe la tabla)!");</script><?php 
            } catch (\Exception $ex) {
                throw $ex; die();?>
                <script>alert("*");</script><?php
            } finally {
                $gbd = null;
            }
}

// Función que hace desocupar una plaza un cliente (params codDestino, codCliente)                                  
public function desOcuparPlazaBus($codDestino,$plaza){
   echo "entro en desOcuparPlazaBus"; die();
    include $_SERVER['DOCUMENT_ROOT'] . '/proyectomodohost/app/conf/configuracionfantasma.inc'; // ASI ES LA ÚNICA MANERA DE QUE FUNCIONE
        try {
            $sql="DELETE FROM  VIAJAR WHERE plaza_Bus='$plaza' AND cod_Destino='$codDestino'";
            var_dump($sql);die();
            
            $result = $gbd->query($sql); ?>
            <script>alert("¡Billete eliminado con Exito!");</script><?php
            return true;
        } catch (\PDOException $e) {
            echo $e->getMessage();
            throw $ex;
            die(); ?>
            <script>alert("¡El nombre de objeto 'VIAJAR' no es válido(No existe la tabla)!");</script><?php
        } catch (\PDOException $ex) {
            throw $ex; ?><script>alert("Billete No eliminado!");</script><?php
        } catch (\Exception $ex) {
            throw $ex; ?><script>alert("Billete No eliminado!");</script><?php
        } finally {
            $gbd = null;
        }
}
}
