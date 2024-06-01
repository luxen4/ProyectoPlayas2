<?php                           // La clase AgenciaBusesException no lleva namespace //

  class AgenciaBusesException extends Exception
  {
    private /*array*/ $errores;              // En el host no admite el tipado de datos
  
    public function __construct(string $mensaje, array $errores)
    {
      parent::__construct($mensaje);
      $this->errores=$errores;
    }
  
    public function getErrores():array
    {
      return $this->errores;
    }
}