<?php
  namespace miId\fuente\Modelo;
  /*use miId\App\fuente\Repositorio\ClienteException;*/
  class Bus{
  
      private $matricula;                       // En un host, no quiere el tipado de datos String //
      private $apellidos;
     // private string $comunidadRegion;
  
      public function __construct(array $datos, bool $nuevo=true)         
  
      {
          if($nuevo){
              include_once __DIR__.'/../../app/utilidades/sanitiza.inc';
              
              if(!empty($error = $this->setMatricula(htmlspecialchars(trim($datos['matricula']))))){   
                  $errores['matricula'] = $error;
              }
  
             
  /*
              if(!empty($error=$this->setProvinciaDepartamento(sanea($datos['provinciadepartamento'])))){
                  $errores['provinciadepartamento'] = $error;
              }
  
              if(!empty($error=$this->setComunidadRegion(sanea($datos['comunidadregion'])))){
                  $errores['comunidadregion'] = $error;
              }
  
              if(!empty($error=$this->setPais(sanea($datos['pais'])))){
                  $errores['pais'] = $error;
              }
  */
  
  
  
              if(isset($errores)){
                  include 'BusException.inc';
                  throw new \BusException("Bus con errores con errores", $errores);
              }
          }
          
      }
  
  // Filtro para nombre de un cliente
  public function setMatricula(string $matricula):string{
  
      if(empty($matricula)){
         
          return "El campo es obligatorio";
      }
      
      $expReg='/^[0-9]{4}\s{1}[A-Z]{3}$/';   ///Lo último es el caracter con el que termina
      if(!preg_match($expReg, $matricula)){
          
          return 'Matricula no es correcto';        
      }
      $this->matricula=$matricula;
      return '';
  }
  
  public function getMatricula():string{
      return $this->matricula;
  }















  

  }

















    /*
public function setMatricula(string $matricula):string{

  if(empty($matricula)){
    var_dump($matricula);die();
   return "El campo es obligatorio";
}
    
    $expReg='/^[A-Z]{1}[a-záéíóú]{0,49}$/';   ///Lo último es el caracter con el que termina
    if(!preg_match($expReg, $matricula)){
        
        return 'matricula no es correcto';        
    }
    $this->matricula=$matricula;
    return '';
}

public function getMatricula():string{
    return $this->matricula;
}
*/





/*
//Función que nos valida el tipoBus del Manipulador.
public function settipoBus($tipoBus){                                                             
  //Dígitos, minúsculas y mayúsculas (2)   URL http://w3.unpocodetodo.info/utiles/regex-ejemplos.php?type=email
  if(!empty($tipoBus)){
  $expReg='/^[^@]+@[^@]+\.[a-zA-Z]{2,}$/';    
  if(preg_match($expReg, $tipoBus)){          
  $this->tipoBus = $tipoBus;return '';
  }else{return 'tipoBus no es correcto (algo@algo.algo)';}
  }else{return 'Campo tipoBus vacio';}
  }
public function gettipoBus()
{return $this->tipoBus;}


// Función que valida una contraseña.
public function setplazas($plazas){                                                             
  //Dígitos, minúsculas y mayúsculas (2)   URL  http://w3.unpocodetodo.info/utiles/regex-ejemplos.php?type=psw
  if(!empty($plazas)){
  $expReg='/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/';    
  if(preg_match($expReg, $plazas)){         
  $this->plazas = $plazas;return '';
  }else{return 'plazasword no es correcto (8/16 (Mayus. + Minus. y núm.)';}
  }else{return 'Campo plazasword vacio';}
  }
public function getplazas()
{return $this->plazas;}



// Función que verifica si una plazas se corresponde con un hash
  public static function isplazasOk($plazas, $hash):bool
  { 
   return plazasword_verify($plazas, $hash);
  }  
  }
*/

  