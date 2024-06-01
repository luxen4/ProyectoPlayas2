<?php
namespace miId\fuente\Modelo;
/*use miId\App\fuente\Repositorio\AmigoException;*/
class AgenciaViajes{

    private /*string*/ $nombre;
    private /*string*/ $nif;
    private /*string*/ $direccion;
    private /*string*/ $cp;
    private /*string*/ $provincia;
    private /*string*/ $comunidad;
    private /*string*/ $pais;
  /*  private string $fechaViaje;
    private string $agenciaViajes;*/

    public function __construct(array $datos, bool $nuevo=true)         //Para distinguir si tengo que hacer comprobaciones o no (nos e pueden sobrecargar los contructores)

    {//var_dump($datos);die();
        if($nuevo){
            include_once __DIR__.'/../../app/utilidades/sanitiza.inc';
            if(!empty($error = $this->setNombre(htmlspecialchars(trim($datos['nombre']))))){        // Preguntamos si el setter ha devuelto una cadena que noes vacia
                $errores['nombre'] = $error;
            }

            if(!empty($error=$this->setNif(sanea($datos['nif'])))){
                $errores['nif'] = $error;
            }

            if(!empty($error=$this->setDireccion(sanea($datos['direccion'])))){
                $errores['direccion'] = $error;
            }

            if(!empty($error=$this->setCp(sanea($datos['cp'])))){
                $errores['cp'] = $error;
            }

            if(!empty($error=$this->setLocalidad(sanea($datos['localidad'])))){
                $errores['localidad'] = $error;
            }

            if(!empty($error=$this->setProvincia(sanea($datos['provincia'])))){
                $errores['provincia'] = $error;
            }

            if(!empty($error=$this->setComunidad(sanea($datos['comunidad'])))){
                $errores['comunidad'] = $error;
            }

            if(!empty($error=$this->setPais(sanea($datos['pais'])))){
                $errores['pais'] = $error;
            }

 /*           if(!empty($error=$this->setFechaViaje(sanea($datos['fechaviaje'])))){
              $errores['fechaviaje'] = $error;
            }

            if(!empty($error=$this->setAgenciaViajes(sanea($datos['agenciaviajes'])))){
              $errores['agenciaviajes'] = $error;
            }
*/

if(!empty($error=$this->setHorarioAgenciaEntradaPorLaMañana(sanea($datos['horaEntrManana'])))){
    $errores['horaEntrManana'] = $error;
}

if(!empty($error=$this->setHorarioAgenciaSalidaPorLaMañana(sanea($datos['horaSalManana'])))){
    $errores['horaSalManana'] = $error;
}

if(!empty($error=$this->setHorarioAgenciaEntradaPorLaTarde(sanea($datos['horaEntrTarde'])))){
    $errores['horaEntrTarde'] = $error;
}

if(!empty($error=$this->setHorarioAgenciaSalidaPorLaTarde(sanea($datos['horaSalTarde'])))){
    $errores['horaSalTarde'] = $error;
}


            if(isset($errores)){
                include 'AgenciaViajesException.inc';
                throw new \AgenciaViajesException("AgenciaViajes con errores", $errores);
            }
        }
        
    }

// Función que valida si el campo Nombre es correcto.
public function setNombre(string $nombre):string{
    if(empty($nombre)){
        return "El campo Nombre es obligatorio";
    }
    
    $expReg='/^[A-Z]{1}.{0,89}$/';              // En la base de datos está limitado el VARCHAR a 90 caracteres.
    if(!preg_match($expReg, $nombre)){
        return 'Nombre no es correcto';        
    }
    $this->nombre=$nombre;
    return '';
}

public function getNombre():string{
    return $this->nombre;
}


// Función que valida si el campo NIF es correcto.
public function setNif(string $nif):string
{ 
    if(empty($nif)){
        return "El campo NIF. es obligatório";
    }
   // BBVA – A48265169;
    $expReg='/^[A-Z]{1}[0-9]{8}$/';             // En la base de datos está limitado el VARCHAR a 9 caracteres.
    if(!preg_match($expReg, $nif)){
        return 'NIF. no es correcto';        
    }
    $this->nif=$nif;
    return '';
}
 
  public function getNif()
  { return $this->nif; }



// Filtro que valida si el campo dirección es correcto.
public function setDireccion(string $direccion):string{
    if(empty($direccion)){
        return "El campo dirección es obligatorio";
    }
    
    $expReg='/^[A-Z]{1}.*$/';                // En la base de datos está limitado el VARCHAR a 100 caracteres.  el punto no me admite {89}
    if(!preg_match($expReg, $direccion)){
        return 'Dirección no es correcto';        
    }
    $this->direccion=$direccion;
    return '';
}

public function getDireccion():string{
    return $this->direccion;
}


// Filtro que valida si el campo cp es correcto.
public function setCp(string $cp):string{
    if(empty($cp)){
        return "El campo Código postal es obligatorio";
    }
    
    $expReg='/^[0-9]{5}$/';                // En la base de datos está limitado el VARCHAR a 100 caracteres.
    if(!preg_match($expReg, $cp)){
        return 'Código postal no es correcto';        
    }
    $this->cp=$cp;
    return '';
}

public function getCp():string{
    return $this->cp;
}


// Función que valida si el campo Localidad es correcto.
public function setLocalidad(string $localidad):string{
    if(empty($localidad)){
        return "El campo Localidad es obligatorio";
    }
    
    $expReg='/^[A-Z]{1}.{0,39}$/';              // En la base de datos está limitado el VARCHAR a 40 caracteres.
    if(!preg_match($expReg, $localidad)){
        return 'Localidad no es correcto';        
    }
    $this->localidad=$localidad;
    return '';
}

public function getLocalidad():string{
    return $this->localidad;
}

// Función que valida si el campo Provincia/Departamento(Fr) es correcto.
public function setProvincia(string $provincia):string{
    switch($provincia){
        case 'La Rioja':
        case 'Bizkaia':
        case 'Guipúzkoa':
        case 'Álava':
        case 'Navarra':
        case 'Aquitania':
        $this->provincia = $provincia;
        return '';
      }
      return 'Valor incorrecto en Provincia';
    }

public function getProvincia():string{
    return $this->provincia;
}

// Función que valida si el campo Comunidad es correcto.
public function setComunidad(string $comunidad):string{

    
    switch($comunidad){
        case 'La Rioja':
        case 'País Vasco':
        case 'Navarra':
        case 'Cantabria':
        case 'Aquitania':
          
        $this->comunidad = $comunidad;
       // var_dump($comunidad);die();  
        return '';
      }
      return 'Valor incorrecto en Comunidad';
    }

public function getComunidad():string{
    return $this->comunidad;
}

// Función que valida si el campo Comunidad es correcto.
public function setPais(string $pais):string{
    switch($pais){
        case 'España':
        case 'Francia':
        $this->pais = $pais;
        return '';
      }
      return 'Valor incorrecto en Pais';
    }

public function getPais():string{
    return $this->pais;
}







/*
  // Función que valida si se a seleccionado una opción
public function setComunidadRegion(string $comunidadRegion):string
{ 
  switch($comunidadRegion){
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
public function setAgenciaViajes(string $agenciaViajes){

  if(empty($agenciaViajes)){
    return "No ha seleccionado ninguna Agencia de Viajes";
  }
  }
  
  public function getAgenciaViajes()
      { return $this->agenciaViajes; }
  */





//--------------------------------------------------------------------------------------------------------------------
// Función que valida si el campo Horario entrada de Agencia por la mañana.
public function setHorarioAgenciaEntradaPorLaMañana(string $horarioAgenciaEntradaPorLaMañana):string{
    if($horarioAgenciaEntradaPorLaMañana==="00:00:00"){ return "Campo Obligatorio"; }
    $this->$horarioAgenciaEntradaPorLaMañana=$horarioAgenciaEntradaPorLaMañana; return '';
}

public function getsetHorarioAgenciaPorLaMañana():string{
    return $this->horarioAgenciaEntradaPorLaMañana;
}

// Función que valida si el campo Horario salida de Agencia por la mañana.
public function setHorarioAgenciaSalidaPorLaMañana(string $horarioAgenciaSalidaPorLaMañana):string{
    if($horarioAgenciaSalidaPorLaMañana==="00:00:00"){return "Campo Obligatorio"; }
    $this->$horarioAgenciaSalidaPorLaMañana=$horarioAgenciaSalidaPorLaMañana; return '';
}

public function getsetHorarioAgenciaSalidaPorLaMañana():string{
    return $this->horarioAgenciaSalidaPorLaMañana;
}
//--------------------------------------------------------------------------------------------------------------------


//--------------------------------------------------------------------------------------------------------------------
// Función que valida si el campo Horario entrada de Agencia por la tarde.
public function setHorarioAgenciaEntradaPorLaTarde(string $horarioAgenciaEntradaPorLaTarde):string{
    if($horarioAgenciaEntradaPorLaTarde==="00:00:00"){ return "Campo Obligatorio"; }
    $this->$horarioAgenciaEntradaPorLaTarde=$horarioAgenciaEntradaPorLaTarde; return '';
}

public function getsetHorarioAgenciaPorLaTarde():string{
    return $this->horarioAgenciaEntradaPorLaTarde;
}

// Función que valida si el campo Horario salida de Agencia por la tarde.
public function setHorarioAgenciaSalidaPorLaTarde(string $horarioAgenciaSalidaPorLaTarde):string{
    if($horarioAgenciaSalidaPorLaTarde==="00:00:00"){return "Campo Obligatorio"; }
    $this->$horarioAgenciaSalidaPorLaTarde=$horarioAgenciaSalidaPorLaTarde; return '';
}

public function getsetHorarioAgenciaSalidaPorLaTarde():string{
    return $this->horarioAgenciaSalidaPorLaTarde;
}


  }