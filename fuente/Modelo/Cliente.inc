<?php
namespace miId\fuente\Modelo;
/*use miId\App\fuente\Repositorio\ClienteException;*/
class Cliente{

    private /*string*/ $nombre;                 // El host no quiere tipado de datos //
    private /*string*/ $apellidos;
   // private string $comunidadRegion;

    public function __construct(array $datos, bool $nuevo=true)         

    {
        if($nuevo){
            include_once __DIR__.'/../../app/utilidades/sanitiza.inc';
            
            if(!empty($error = $this->setNombre(htmlspecialchars(trim($datos['nombre']))))){   
                $errores['nombre'] = $error;
            }

            if(!empty($error = $this->setApellidos(htmlspecialchars(trim($datos['apellidos']))))){   
                $errores['apellidos'] = $error;
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
                include 'ClienteException.inc';
                throw new \ClienteException("Cliente con errores", $errores);
            }
        }
        
    }

// Filtro para nombre de un cliente
public function setNombre(string $nombre):string{

   

    if(empty($nombre)){
         var_dump($nombre);die();
        return "El campo es obligatorio";
    }
    
    $expReg='/^[A-Z]{1}[a-záéíóú]{0,49}$/';   ///Lo último es el caracter con el que termina
    if(!preg_match($expReg, $nombre)){
        
        return 'Nombre no es correcto';        
    }
    $this->nombre=$nombre;
    return '';
}

public function getNombre():string{
    return $this->nombre;
}



// Filtro para nombre de un cliente
public function setApellidos(string $apellidos):string{
    if(empty($apellidos)){
        return "El campo es obligatorio";
    }
    
    $expReg='/^[A-Z]{1}[a-záéíóú]{0,49}\s{1}[A-ZÁÉÍÓÚ]{1}[a-záéíóú]{0,49}$/';   ///Lo último es el caracter con el que termina
   // $expReg='/^[A-Z]{1}[a-záéíóú]{0,49}$/';
    if(!preg_match($expReg, $apellidos)){
        return 'Apellidos no es correcto';        
    }
    $this->apellidos=$apellidos;
    return '';
}

public function getApellidos():string{
    return $this->apellidos;
}



/*
public static function isPassOk(string $pass, string $hash):bool
{                                                    // Método que recibe el usuario y la contraseña
    return password_verify($pass, $hash);           // Lamma al método de comprobación de la Expresión regular. //
}
*/

}