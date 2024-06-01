<?php
// Función que codifica a utf8 un dato (String), valorando en qué servidor estamos
 function pasarUtf8($nombre){

    if($_SERVER['SERVER_NAME']=="localhost"){
      $dato=$nombre;
      return $dato;
    }else{   
      $dato= utf8_encode ($nombre);
      return $dato;
    }

}



?>

<script>

    // Función que selecciona el checkbox cuando se ejecuta el submit
   function selecciona(codigo){
      //alert("entro"); alert(codigo); 
      var seleccionar=document.getElementById(codigo).checked = true;
      
  }




// Para cancelar Billetes de Viaje de un Cliente //

// Función que inserta en el campo el id de Destino cuando se ejecuta el submit de cancelar un billete en tabla
  function insertaIdDestino(codigo){
  var codigo=codigo+"cod";
  var seleccionar=document.getElementById(codigo).checked = true; 
}

// Función que selecciona el checkbox cuando se ejecuta el submit
function seleccionaPlaza(plaza){
  var plaza=plaza+"pla";
  var seleccionar2=document.getElementById(plaza).checked = true;
  
}




// Función que hace cambiar el color del asiento si se encuentra libre
  function selecciona2(codigo){

     if(document.getElementById(codigo).checked ==false){
         seleccionar=document.getElementById(codigo).checked = true;
         var asiento="asiento" + codigo;
         document.getElementById(asiento).style.background="green";
        

     }else if(document.getElementById(codigo).checked ==true){
       var seleccionar=document.getElementById(codigo).checked = false;
       var asiento="asiento" + codigo;
       document.getElementById(asiento).style.background="white";
     }
   }
</script>


