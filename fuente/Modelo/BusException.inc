<?php                           // La clase BusException no lleva namespace //

  class BusException extends Exception
  {
    private /*array*/ $errores;      // En un host, no quiere el tipado de datos //
  
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