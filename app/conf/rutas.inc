<?php

// Vector multidimensional con rutas a controlador y método que debe
// atender cada enlace
/* formato:
    Primera dimensaión: nombre del enlace pasado mediante variable GET 'ctl'
     'nombreEnlace' => array() segunda dimesion con información del controlador
                       que atiende esa petición, clave 'controller', y del
                       método concreto que está especializado en su tratamiento,
                       clave 'action'
  Se debe agregar una ruta por cada valor diferente que tome la variable 'ctl'.
  La clave 'inicio' referencia la página home de la aplicación y especifica
    el controlador que debe decidir cuál es la vista que se debe mostrar
*/

//use miId\fuente\Controlador\AgenciaViajesController;

$mapeoRutas =
  array(
    
      //-----------------------------------------------------------------------------------------------------------------defaultController.inc
          'inicio' =>
          array('controller' =>'miId\fuente\Controlador\defaultController', 'action' =>'inicio'),

        //----------------------------
          'logearCliente' =>
          array('controller' =>'miId\fuente\Controlador\defaultController', 'action' =>'logearCliente'),

          'deslogearCliente' =>
          array('controller' =>'miId\fuente\Controlador\defaultController', 'action' =>'deslogearCliente'),
        //----------------------------

          'logearagenciaviajes' =>
          array('controller' =>'miId\fuente\Controlador\defaultController', 'action' =>'logearAgenciaViajes'),

          'logearagenciabuses' =>
          array('controller' =>'miId\fuente\Controlador\defaultController', 'action' =>'logearAgenciaBuses'),

          

          

   //-----------------------------------------------------------------------------------------------------------------agenciaBusesController.inc
   'nuevaagenciabuses' =>
   array('controller' => 'miId\fuente\Controlador\AgenciaBusesController', 'action' => 'nuevaAgenciaBuses' ),

   'mostrartodasagenciabuses' =>
   array('controller' => 'miId\fuente\Controlador\AgenciaBusesController', 'action' => 'mostrarTodasAgenciaBuses' ),

   'infoagenciabuses' =>
   array('controller' => 'miId\fuente\Controlador\AgenciaBusesController', 'action' => 'mostrarInfoAgenciaBusesLogeada' ),

   'modificacioninfoagenciabuseslogeada' =>
   array('controller' => 'miId\fuente\Controlador\AgenciaBusesController', 'action' => 'modificacionInfoAgenciaBusesLogeada' ),

   'eliminaragenciabuseslogeada' =>
   array('controller' => 'miId\fuente\Controlador\AgenciaBusesController', 'action' => 'eliminarAgenciaBusesLogeada' ),

   



      //-----------------------------------------------------------------------------------------------------------------agenciaViajesController.inc
    'nuevaAgenciaViajes' =>
    array('controller' => 'miId\fuente\Controlador\AgenciaViajesController', 'action' => 'nuevaAgenciaViajes' ),

    'infoagenciaviajes'  =>
    array('controller' => 'miId\fuente\Controlador\AgenciaViajesController', 'action' => 'mostrarInfoAgenciaViajesLogeada'),      // Permite a un usuario/Cliente ver las agencias donde no está como socio.

     
    /*'modificacioninfoagenciaviajeslogeada' =>
    array('controller' => 'miId\fuente\Controlador\AgenciaBusesController', 'action' => 'modificacionInfoAgenciaViajesLogeada' ),*/
 

    /*'modificarAgenciaviajes' =>*/
    'modificacioninfoagenciaviajeslogeada' =>
    array('controller' => 'miId\fuente\Controlador\AgenciaViajesController', 'action' => 'modificarAgenciaviajesLogeada' ),

    'mostraragenciaviajes' =>
    array('controller' => 'miId\fuente\Controlador\AgenciaViajesController', 'action' => 'mostrarTodasLasAgenciasDeViajes' ),

    
    'mostraragenciaviajesdondeessocio' =>
    array('controller' => 'miId\fuente\Controlador\AgenciaViajesController', 'action' => 'mostrarTodasLasAgenciasDeViajesDondeSeEsSocio' ),


    'tepuedeninteresar'  =>
    array('controller' => 'miId\fuente\Controlador\AgenciaViajesController', 'action' => 'tePuedenInteresar'),      // Permite a un usuario/Cliente ver las agencias donde no está como socio.


          
      //-----------------------------------------------------------------------------------------------------------------autobusesController.inc
          'nuevobus' =>
          array('controller' => 'miId\fuente\Controlador\busController', 'action' => 'nuevoBus' ),

        
          'motrarplantabus' =>
          array('controller' => 'miId\fuente\Controlador\busController', 'action' => 'motrarPlantaBus' ),

          'modificarbus' =>
          array('controller' => 'miId\fuente\Controlador\busController', 'action' => 'modificarBus' ),

          'todosbusesdeunaagenciabuses' =>
          array('controller' => 'miId\fuente\Controlador\busController', 'action' => 'todosBusesdeUnaAgenciaBuses' ),

          'plazasdeunbus' =>
          array('controller' => 'miId\fuente\Controlador\busController', 'action' => 'plazasDeUnBus' ),

           
      //-----------------------------------------------------------------------------------------------------------------clienteController.inc
    'nuevoclienteagenciaviajes' =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'nuevoCliente'),

    'perfilcliente'  =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'mostrarInfoClienteLogeado'),    // Permite dar de baja un usuario/Cliente de una Agencia de Viajes.

    'modificacliente'  =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'modificarCliente'),             // Permite modificar los datos de un cliente

    'autobajacliente'  =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'autobajaCliente'),              // Permite dar de baja un Cliente

    'borrartodosclientes'  =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'borrarTodosClientes'),          // Permite dar de baja un usuario/Cliente de una Agencia de Viajes.


    'darsedebajadenagenciaviajes'  =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'darseDeBajaDenAgenciaViajes'),  // Permite dar de baja un usuario/Cliente de una Agencia de Viajes.

   
    'cancelarbillete' =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'cancelarBillete' ),

    'mostrartodosclientes'  =>
    array('controller' => 'miId\fuente\Controlador\clienteController', 'action' => 'mostrarTodosClientes'),         // Permite dar de baja un usuario/Cliente de una Agencia de Viajes.



      //-----------------------------------------------------------------------------------------------------------------destinoController.inc
          'nuevodestino' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'nuevoDestino' ),

          'modificardestino' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'modificarUnDestino' ),
        

          'mostrartodosdestinos' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'mostrarTodosDestinos' ),


          'destinosporfecha' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorFecha' ),

          'destinosporfechafiltrados' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorFechaFiltrados' ),

          'destinospordestino' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorDestino' ),

          'destinospordestinofiltrados' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorDestinoFiltrados' ),

          'destinosporagenciaviajes' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorAgenciaViajes' ),

          'destinosporagenciaviajesfiltrados' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorAgenciaViajesFiltrados' ),

          'destinospordia' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorDia' ),
        
          'destinospordiafiltrados' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'destinosPorDia' ),

          'tusdestinoscontratados' => // Muestra todos los destinos a los que se ha apuntado un Cliente.
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'tusDestinosContratados' ), 

           

           'mostrartodosdestinosdeunaagenciaviajeslogeada' =>
           array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'mostrarTodosDestinosDeAgenciaViajesLogeada' ),
 


          'mostrartodosdestinosdeagenciaviajeslogeada' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'mostrarTodosDestinosDeAgenciaViajesLogeada' ),  /* Tabla */

          
          'mostrartodosdestinosquevaunaagenciabuseslogeada' =>
          array('controller' => 'miId\fuente\Controlador\destinoController', 'action' => 'mostrarTodosDestinosQueVaUnaAgenciaBusesLogeada' ),

             //-----------------------------------------------------------------------------------------------------------------pdfController.inc
             'generarpdf' =>
             array('controller' => 'miId\fuente\Controlador\pdfController', 'action' => 'generarPdf' ),
   
       );





       // https://www.lawebdelprogramador.com/foros/MySQL/959323-Relacion-1N.html   PARA COPIAR imagen