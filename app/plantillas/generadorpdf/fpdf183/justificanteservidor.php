<?php ob_start();
//var_dump($_SESSION);die();
//echo "entro"; //die();
//var_dump($_SESSION['dest']); die();
//var_dump($_SESSION['perfil']);die();

$nombre=$_SESSION['perfil']['nombre'];
$codigoDestino=$_SESSION['dest'][0]->cod_Destino;
$desti=$_SESSION['dest'][0]->nombre_Lugar;
$fecha=$_SESSION['dest'][0]->fecha_Viaje;
$salida=$_SESSION['dest'][0]->lugar_SalidaPredeterminado;
$vuelta="Punto en el destino";
$bus=$_SESSION['dest'][0]->cod_Bus;
$asiento=$_SESSION['dest'][0]->plaza_Bus;
$precio="12 euros";
$telefono=$_SESSION['dest'][0]->telefono_Reserva;




require('fpdf.php');



 
$pdf=new FPDF();
$pdf->AddPage();

$pdf->SetFillColor(232,232,232);
$pdf->SetFont('Arial','B',20);
//convertimos el texto a utf8
//$texto = utf8_decode('Lorem Ipsum …...');
$pdf->Cell(190,10, utf8_decode('Información de su viaje a ' .  utf8_encode($desti) ),1,0,'C',1) ;

/*
$pdf->SetFont('Arial','B',16);
$pdf->Cell(-100,20,'Hello World!');
*/
$pdf->SetFont('Arial','B',9);
//$pdf->Cell(10,10,'<input type="text">');
//$pdf->Write(200,588);


if (in_array($desti, $_SESSION['fotosLugares'])) {
   
$pdf->Image('web/imagenes/' . utf8_encode($desti) . '.jpg', 10, 40, 40, 40, 'JPG','www.plus2net.com');

}else{
 $pdf->Image('web/imagenes/predeterminada.jpg', 10, 40, 40, 40, 'JPG','www.plus2net.com');
}






$pdf->Ln(15);

$pdf->Cell(10,10,'********************************************************************************************************************************************************',0,1);
$pdf->Ln(5);
$pdf->SetFont('Arial','B',10);

$pdf->MultiCell(190,-8,'Abajo le mostramos todos los detalles de su compra:');
$pdf->Ln(10);




$pdf->SetTextColor(0,0,0);
$pdf->SetFont('Arial','B');
$pdf->SetXY(50,40);


$pdf->MultiCell(195,5,utf8_decode(  "Codigo de Viaje: " . utf8_encode($codigoDestino) .
                                    "\n Nombre: " .  utf8_encode($nombre) .
                                    "\n Destino: " .  utf8_encode($desti) .
                                    "\n Fecha: " .  utf8_encode($fecha) .
                                    "\n Salida: " .  utf8_encode($salida) .
                                    "\n Vuelta: " .  utf8_encode($vuelta) .
                                    "\n Bus nº: " .  utf8_encode($bus) .
                                    "\n Asiento nº: " .  utf8_encode($asiento) .
                                    "\n Precio: " .  utf8_encode($precio) 
                                    )

);

$pdf->SetXY(10,72);
$pdf->Cell(10,23,   "imagen de: " . $desti,0,0,'D');     $pdf->Ln(5);


$pdf->Ln(5);

$pdf->SetFont('Arial','b',12);
//$pdf->SetTextColor(0,0,0);
$pdf->Ln(7);
$pdf->SetTextColor(194,8,8);
$pdf->Write(7,utf8_decode('En caso de algún tipo de incidencia, puede llamar al número de teléfono: ' . $telefono));
$pdf->Ln(7);

$pdf->SetFont('Arial','b',12);
$pdf->SetTextColor(153,0,153);
$pdf->Write(7,utf8_decode('Muchísimas gracias por su confianza y le deseamos tenga buen viaje con nosotros.'));

$pdf->Ln(7);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(10,10,'*********************************************************************************************************************',0,1);



/*
//$pdf->SetXY($coordXbase,$coordY);
$pdf->SetTextColor(194,8,8);
$pdf->MultiCell(100,100,"sss");

//Setting the text color to black
$pdf->SetTextColor(0,0,0);

//Printing my cell      
$pdf->SetFont('Arial','B');
$pdf->Cell(55,5,"Black Text ",1,0,'C');
//$pdf->SetXY($coordXbase,$coordY);

//Setting the text color to red
$pdf->SetTextColor(194,8,8);

//Printing another cell, over the other
$pdf->SetFont('Arial','B');
//Give some space from the left border, and print the red text after the black text that is in the cell behind this one.
$pdf->Cell(55,5,"                        Red Text",0,0,'C');
//$pdf->SetXY($coordXbase,$coordY);

//Setting the text color back to back, in the next cells.
$pdf->SetTextColor(0,0,0);

$pdf->Cell(200,20,'Probando FPDF',0,1,'L');




//Seteamos el inicio del margen superior en 25 pixeles

$y_axis_initial = 25;

$pdf->SetFont('Arial','B',12);

$pdf->Cell(40,6,'',0,0,'C');
$pdf->Cell(100,6,'LISTA DE PRODUCTOS',1,0,'C');


//Creamos las celdas para los titulo de cada columna y le asignamos un fondo gris y el tipo de letra
$pdf->SetFillColor(232,232,232);

$pdf->SetFont('Arial','B',10);
$pdf->Cell(1025,6,'Titulo',1,0,'C',1);

$pdf->Cell(30,6,'Precio',1,0,'C',1);
$pdf->Cell(30,6,'Foto',1,0,'C',1);



$pdf->Cell(50,5,'78878',0,1);






$pdf->SetFont('Arial','B',16);
$pdf->Cell(500,10,'Probando FPDF',1,1,'L');




              $pdf->SetTextColor(255,255,255);
           $pdf->Text(90,90,"Holaaaaaaaaaa");
$pdf = new FPDF();
$pdf->AddPage();

$pdf->Output($nuevoNombreDelPDF, "F");



*/


  

$pdf->Output();

 







?>

<!--https://www.solvetic.com/tutoriales/article/1501-dise%c3%b1o-de-reportes-en-pdf-con-fpdf-y-php/
https://www.solvetic.com/tutoriales/article/1501-dise%c3%b1o-de-reportes-en-pdf-con-fpdf-y-php/
-->


<input type="file" name="pic" id="pic" accept="image/gif, image/jpeg" />


<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <iframe src="your.pdf" width="100%" height="500px">aaa
    </iframe>
</body>
</html>-->




<!--https://www.codegrepper.com/code-examples/html/show+pdf+in+html PARA LOS PDF iframe-->