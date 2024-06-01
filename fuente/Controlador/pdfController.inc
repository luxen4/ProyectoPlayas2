<?php
namespace miId\fuente\Controlador;

class pdfController
{
  // Función que genera un archivo PDF.    
  public function generarPdf(){ 
          // Antes de generar el pdf tengo que pasarle los datos como nombre, etc...

          if($_SERVER['SERVER_NAME']=="localhost"){
          require __DIR__ . '/../../app/plantillas/generadorpdf/fpdf183/justificante.php';
          }else{   
          require __DIR__ . '/../../app/plantillas/generadorpdf/fpdf183/justificanteservidor.php';
          }

         





    }

}




