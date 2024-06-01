<?php
namespace miId\fuente\Modelo;
/*use miId\App\fuente\Repositorio\AmigoException;*/
class Destino{

    private /*string*/ $nombre;                       // En el host no traga el tipado de datos //
    private /*string*/ $provinciaDepartamento;
    private /*string*/ $comunidadRegion;
    private /*string*/ $fechaViaje;
  /*  private string $agenciaViajes;*/

    public function __construct(array $datos, bool $nuevo=true)         //Para distinguir si tengo que hacer comprobaciones o no (nos e pueden sobrecargar los contructores)

    {
        if($nuevo){
            include_once __DIR__.'/../../app/utilidades/sanitiza.inc';
            if(!empty($error = $this->setNombre(htmlspecialchars(trim($datos['nombre']))))){        // Preguntamos si el setter ha devuelto una cadena que noes vacia
                $errores['nombre'] = $error;
            }

            if(!empty($error=$this->setProvinciaDepartamento(sanea($datos['provinciadepartamento'])))){
                $errores['provinciadepartamento'] = $error;
            }

            if(!empty($error=$this->setComunidadRegion(sanea($datos['comunidadregion'])))){
                $errores['comunidadregion'] = $error;
            }

            if(!empty($error=$this->setPais(sanea($datos['pais'])))){
                $errores['pais'] = $error;
            }

            if(!empty($error=$this->setFechaViaje(sanea($datos['fechaviaje'])))){
              $errores['fechaviaje'] = $error;
            }

         /*   if(!empty($error=$this->setAgenciaViajes(sanea($datos['agenciaviajes'])))){
              $errores['agenciaviajes'] = $error;
            }*/




            if(isset($errores)){
                include 'DestinoException.inc';
                throw new \DestinoException("Destino con errores", $errores);
            }
        }
        
    }

// Filtro para nombre de un destino
public function setNombre(string $nombre):string{
    if(empty($nombre)){
        return "El campo es obligatorio";
    }
    
    //$expReg='/^[A-Z]{1}[a-záéíóú]{0,49}$/';   ///Lo último es el caracter con el que termina
    $expReg='/^[A-Z]{1}.{0,89}$/';
    if(!preg_match($expReg, $nombre)){
        return 'Nombre no es correcto';        
    }
    $this->nombre=$nombre;
    return '';
}

public function getNombre():string{
    return $this->nombre;
}


// Función que valida si se a seleccionado una opción
public function setProvinciaDepartamento(string $provinciaDepartamento):string
{ 
  switch($provinciaDepartamento){
    case 'La Rioja';
    case 'Cantabria':
    case 'Bizkaia':
    case 'Guipuzkoa':
    case 'Aquitania':
    $this->provinciaDepartamento = $provinciaDepartamento;
    return '';
  }
  return 'Valor incorrecto en Provincia/Departamento';
}
 
  public function getProvinciaDepartamento()
  { return $this->provinciaDepartamento; }


  // Función que valida si se a seleccionado una opción
public function setComunidadRegion(string $comunidadRegion):string
{ 
  switch($comunidadRegion){
    case 'La Rioja';
    case 'Navarra':
    case 'Cantabria':
    case 'Pais Vasco':
    case 'Aquitania':
    $this->comunidadRegion = $comunidadRegion;
    return '';
  }
  return 'Valor incorrecto en Comunidad/Región';
}
 
  public function getComunidadRegion()
  { return $this->comunidadRegion; }



  // Función que valida si se a seleccionado una opción
  public function setPais(string $pais):string
  { 
    switch($pais){
      case 'España':
      case 'Francia':
      $this->pais = $pais;
      return '';
    }
    return 'Valor incorrecto en pais';
  }
   
    public function getPais()
    { return $this->pais; }

// Función que valida si se ha seleccionado una opción de fecha
public function setFechaViaje(string $fechaViaje){

if(empty($fechaViaje)){
  return "No ha seleccionado ninguna fecha";
}
}

public function getFechaViaje()
    { return $this->fechaViaje; }



// Función que valida si se ha seleccionado una Agencia de Viajes
/*
public function setAgenciaViajes(string $agenciaViajes){

  if(empty($agenciaViajes)){
    return "No ha seleccionado ninguna Agencia de Viajes";
  }
  }
  
  public function getAgenciaViajes()
      { return $this->agenciaViajes; }
  */
  }
  









