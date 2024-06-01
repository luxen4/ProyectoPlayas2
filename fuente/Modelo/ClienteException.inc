<?php                           // La clase ClienteException no lleva namespace //

  class ClienteException extends Exception
  {
    private /*array*/ $errores;      // El host no permite el tipado de datos //
  
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