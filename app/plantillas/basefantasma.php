<!-- Vista común a la mayoría (sino todas) las vistas de la aplicación
     Suele contener la imagen corporativa de la apliación Web
     Concretamente esta página contiene el nombre de la empresa
     "Cadena Tiendas Media" y una barra de hiperenlaces con un enalace a la
     página home, llamado "inicio"
     El nombre del archivo es indiferente: layout, comun, etc.
-->
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
   
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-grid.min.css">
    <link rel="stylesheet" type="text/css" href="web/css/bootstrap-reboot.min.css">
    <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href='web/css/styles.css'>
    <link rel="stylesheet" type="text/css" href='web/css/forms.css'>

  </head>
  <body>
  <?php include_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>  <!--https://www.baulphp.com/como-usar-include-y-require-en-php-ejemplos/ -->




<header id="container_cabecera">
<div class="container">
  

<nav class="navbar navbar-expand-lg navbar-light "><!--bg-light-->

  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown">

    <ul class="navbar-nav">
     
    <div class="flex">
        <li id="logo"><a class="navbar-brand " href="index.php?ctl=inicio">PLAYABUS</a></li><!--sr-only-->

<?php
if(!empty($_SESSION['perfil'])){
  if($_SESSION['perfil']['roll']=='cliente'){
    ?><li class="saludo_izda"><?php echo('<span class="nav-link fas fa-user" > Hola ' . pasarUtf8($_SESSION['perfil']['nombre']) . '!</span>');?></li><?php 
  }

  if($_SESSION['perfil']['roll']=='agenciaviajes'){
    ?><li class="saludo_izda"><?php echo('<span class="nav-link fas fa-user" > Hola ' . pasarUtf8($_SESSION['perfil']['name']) . '!</span>');?></li><?php 
  }

  if($_SESSION['perfil']['roll']=='agenciabuses'){
    ?><li class="saludo_izda"><?php echo('<span class="nav-link fas fa-user" > Hola ' . pasarUtf8($_SESSION['perfil']['name']) . '!</span>');?></li><?php 
  }

  if($_SESSION['perfil']['roll']=='admin'){
    ?><li class="saludo_izda"><?php echo('<span class="nav-link fas fa-user" > Hola ' . ($_SESSION['perfil']['nombre']) . '!</span>');?></li><?php 
  }



  }; ?>
      
   
      </div>
      
        <li><a class="nav-link" href="index.php?ctl=inicio"><i class="fas fa-home"></i> Inicio</a></li>
       <?php

 if(empty($_SESSION['perfil'])){?> 
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
            role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-users"></i> Logins</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <a class="dropdown-item" href="index.php?ctl=logearCliente"><i class="fas fa-users"></i> Clientes</a>
                  <a class="dropdown-item" href="index.php?ctl=logearagenciaviajes"><i class="fas fa-store-alt"></i> Agencias de Viajes</a> 
                  <a class="dropdown-item" href="index.php?ctl=logearagenciabuses"><i class="fas fa-store-alt"></i>Agencias de Buses</a> 

                <!--  <div class="dropdown-divider"></div>
                  <a class="dropdown-item" href="#">Otros</a>-->
                </div>
          </li>

    <li> <a class="nav-link seiscientos" href="index.php?ctl=nuevoclienteagenciaviajes"><i class="fas fa-sign-in-alt"></i> Registro</a></li> 
<?php }; ?>

     

<?php  if(!empty($_SESSION['perfil'])){
  if($_SESSION['perfil']['roll']=="admin"){?>
    <!--  <li class="nav-item margin2"><a class="nav-link" href="index.php?ctl=borrarcliente">Borrar Cliente</a></li> -->
    <!--  <li class="nav-item margin2"><a class="nav-link" href="index.php?ctl=borrartodosclientes">Borrar todos los Clientes</a></li>-->
    <!--  <li class="nav-item margin2"><a class="nav-link" href="index.php?ctl=mostrartodosclientes">Mostrar todos los Clientes</a></li>-->

    <li><a class="nav-link" href="index.php?ctl=mostrartodosdestinos"><i class="fas fa-umbrella-beach"></i> Destinos</a></li>

    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
         <i class="fas fa-users"></i> Clientes</a>

          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?ctl=nuevoclienteagenciaviajes"><i class="far fa-user"></i> Nuevo Cliente</a>
              <a class="dropdown-item" href="index.php?ctl=borrarcliente"><i class="fas fa-trash-alt"></i> Borrar Cliente</a>
              <a class="dropdown-item" href="index.php?ctl=borrartodosclientes"><i class="fas fa-trash-alt"></i> Borrar todos los Clientes</a>
              <a class="dropdown-item" href="index.php?ctl=mostrartodosclientes"><i class="fas fa-eye"></i> Mostrar todos los Clientes</a>

            <!--  <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Otros</a>-->
          </div>
    </li>

    <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" 
          aria-expanded="false"><i class="fas fa-store-alt"></i> Agencias </a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?ctl=nuevaAgenciaViajes"><i class="fas fa-store"></i> Nueva Agencia de Viajes </a> 
              <a class="dropdown-item" href="index.php?ctl=nuevaagenciabuses"><i class="fas fa-store"></i> Nueva Agencia de buses</a>
              <a class="dropdown-item"  href="index.php?ctl=mostraragenciaviajes"><i class="fas fa-eye"></i> Todas Agencias de Viajes</a> 
              <a class="dropdown-item" class="nav-link " href="index.php?ctl=mostrartodasagenciabuses"><i class="fas fa-eye"></i> Todas Agencias de Buses</a> 
        </div>
    </li>

    <li><a class="nav-link" href="index.php?ctl=deslogearCliente"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
    <li class="saludo"><?php echo('<span class="nav-link fas fa-user" > Hola ' . pasarUtf8($_SESSION['perfil']['nombre']) . '!</span>');?></li>

<?php }}; 


if (!empty($_SESSION['perfil'])) {
    if ($_SESSION['perfil']['roll']=="agenciabuses") {?>

  <li><a class="nav-link" href="index.php?ctl=mostrartodosdestinos"><i class="fas fa-umbrella-beach"></i> Destinos</a></li>

  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
      role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-store"></i> Su Agencia de Buses</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="index.php?ctl=infoagenciabuses"><i class="fas fa-eye"></i> Perfil</a> 
              <a class="dropdown-item" href="index.php?ctl=modificacioninfoagenciabuseslogeada"><i class="fas fa-edit"></i> Modificar Perfil</a> 
              <a class="dropdown-item" href="index.php?ctl=eliminaragenciabuseslogeada"><i class="fas fa-trash-alt"></i> Darse de baja</a> 
              <a class="dropdown-item" href="index.php?ctl=mostrartodosdestinosquevaunaagenciabuseslogeada"><i class="fas fa-umbrella-beach"></i> Destinos a cubrir</a> 
              <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Personal Agencia Buses (ampliable V-2)</a>

            <!-- <div class="dropdown-divider"></div>
              <a class="dropdown-item" href="#">Otros</a>-->
          </div>
  </li>


  <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-bus-alt"></i> Area de Buses</a>
          <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?ctl=nuevobus"><i class="fas fa-bus"></i> Nuevo Bus</a> 
                  <!-- <a class="dropdown-item" href="index.php?ctl=nuevobus">Eliminar Bus (Hecho)</a>-->
                  <!-- <a class="dropdown-item" href="index.php?ctl=modificarbus">Modificar un Bus (Hecho)</a>-->
                    <a class="dropdown-item" href="index.php?ctl=todosbusesdeunaagenciabuses"><i class="fas fa-eye"></i> Todos los Buses</a> 
          </div>
  </li>

  <li><a class="nav-link" href="index.php?ctl=deslogearCliente"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
  <li class="saludo"><?php echo('<span class="nav-link fas fa-user" > Hola ' . pasarUtf8($_SESSION['perfil']['name']) . '!</span>');?></li>

<?php }
}


if (!empty($_SESSION['perfil'])) {
    if ($_SESSION['perfil']['roll']=="agenciaviajes") {?>

              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" 
                    role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-umbrella-beach"></i> DESTINOS</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="index.php?ctl=nuevodestino"><i class="fas fa-umbrella-beach"></i> Nuevo Destino</a> 
                         <!--
                          <a class="dropdown-item" href="index.php?ctl=modificardestino">Modificar Destino (mirar si se puede suprimir)</a> 
                          <a class="dropdown-item" href="index.php?ctl=eliminardestino">Eliminar Destino (mirar si se puede suprimir)</a> 
                          -->
                          <a class="dropdown-item" href="index.php?ctl=mostrartodosdestinosdeagenciaviajeslogeada"><i class="fas fa-eye"></i> Destinos de su Agencia</a> 
                          <div class="dropdown-divider"></div>
                          
                          <a class="dropdown-item" href="index.php?ctl=mostrartodosdestinos"><i class="fas fa-umbrella-beach"></i> Destinos de la plataforma</a>
                          

                        <!--  <div class="dropdown-divider"></div>
                          <a class="dropdown-item" href="#">Otros</a>-->
                        </div>
              </li>

              <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-store"></i> Su Agencia</a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="index.php?ctl=infoagenciaviajes"><i class="fas fa-eye"></i> Perfil</a> 
                            <a class="dropdown-item" href="index.php?ctl=modificacioninfoagenciaviajeslogeada"><i class="fas fa-edit"></i> Modificar Perfil</a> 
                            <a class="dropdown-item" href="index.php?ctl=eliminarAgenciaviajesLogeada"><i class="fas fa-trash-alt"></i> Darse de baja</a> 
                            
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#"><i class="fas fa-users"></i> Personal Agencia Viajes (ampliable V2)</a>

                          <!--  <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Otros (ampliable V2)</a>-->
                        </div>
                </li>

                <li><a class="nav-link" style="border-right: 1px solid #006293;" href="index.php?ctl=deslogearCliente"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>
                <li class="saludo"><?php echo('<span class="nav-link fas fa-user" > Hola ' . pasarUtf8($_SESSION['perfil']['name']) . '!</span>');?></li>
    <?php };



    if (!empty($_SESSION['perfil'])) {
        if ($_SESSION['perfil']['roll']==="cliente") {?> 



  <li><a class="nav-link" href="index.php?ctl=mostrartodosdestinos"><i class="fas fa-umbrella-beach"></i> Destinos</a></li>

  <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i> Clientes</a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?ctl=tusdestinoscontratados"><i class="fas fa-umbrella-beach"></i> Tus destinos contratados</a>
                    <a class="dropdown-item" href="index.php?ctl=perfilcliente"><i class="fas fa-eye"></i> Perfil</a>
                    <a class="dropdown-item" href="index.php?ctl=modificacliente"><i class="fas fa-edit"></i> Modificar Perfil</a> 
                    <a class="dropdown-item" href="index.php?ctl=autobajacliente"><i class="fas fa-trash-alt"></i> Baja Cliente</a> 
                </div>   
  </li>

  <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-store-alt"></i> Agencias</a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="index.php?ctl=mostraragenciaviajes"><i class="fas fa-store"></i> A. Viajes disponibles</a> 
                    <a class="dropdown-item" href="index.php?ctl=mostraragenciaviajesdondeessocio"><i class="fas fa-store"></i> A. Viajes/socio </a> 
                    <a class="dropdown-item" href="index.php?ctl=mostrartodasagenciabuses"><i class="fas fa-store"></i>A. Buses</a> 
                    <!-- <div class="dropdown-divider"></div>
                    <a class="dropdown-item" style="padding:0.7em" href="#">Otros</a>-->
            </div>
  </li>

  <li><a class="nav-link" style="border-right: 1px solid #006293;"  href="index.php?ctl=deslogearCliente"><i class="fas fa-sign-out-alt"></i> Cerrar Sesión</a></li>

  <li class="saludo"><?php echo('<span class="nav-link fas fa-user" style="border-right: 1px solid #006293; padding-top: 1.1em;" > Hola ' . pasarUtf8($_SESSION['perfil']['nombre']) . '!</span>');?></li>

<?php    }}

}; ?>

    </ul>
  </div>
</nav>
</div>


<!--https://www.baulphp.com/como-usar-include-y-require-en-php-ejemplos/ -->
<?php include_once $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/partes/carrusel.inc'; ?>  





</header>
    
   <style>
  @media only screen and (min-width: 513px) and (max-width: /*1000*/809px) {
    .carrusel-item .medida{
      display: none;
    }

  }
  </style>
           
    </div>
    <div id="container_cabecera" class="container-fluid">
    <div class="row">
                <div class="col-xl-12 text-center">
   <div class="row">


 <!--   <div id="bienvenida" class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">

                       

<?php   if(!empty($_SESSION['perfil'])){?>

                        <div class="row">
                          <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                          </div>
                        </div>


 <?php                              
              if($_SESSION['perfil']['roll']==="admin"){
                  //echo("Hola " . $_SESSION['perfil']['nombre']. ', estás conectado como <br><span class="admin"> ***ADMINISTRADOR***</span>');
                  // include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; 
                  echo('<span class="bienvenido">Hola ' . pasarUtf8($_SESSION['perfil']['nombre']) . ', BIENVENIDO!,<br><span class="adminnnnn"> ***ADMINISTRADOR***'); //   
                }

              if($_SESSION['perfil']['roll']==="agenciabuses"){
                  //echo('<span class="letra">Hola ' . $_SESSION['perfil']['name'].', estás conectado como <br><span class="admin"> ***AGENCIA DE BUSES***</span></span>');
                  echo('<span class="letra">Hola ' . $_SESSION['perfil']['name'] . ', BIENVENIDO!');
                }

              if($_SESSION['perfil']['roll']==="agenciaviajes"){
                  //echo('<span class="letra">Hola ' . $_SESSION['perfil']['name']. ', estás conectado como <br><span class="admin"> ***AGENCIA DE VIAJES***</span></span>');
                  echo('<span class="letra">Hola ' . $_SESSION['perfil']['name'] . ', BIENVENIDO!');
                }?>



                  <div class="row">
                      <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                <?php
                                if(!empty($_SESSION['perfil'])){
                                  if ($_SESSION['perfil']['roll']=="cliente") {
                                      //echo("Hola " . $_SESSION['perfil']['nombre']. ", ¡Bienvenido! ");}
                                    echo('<span class="bienvenido">Hola ' . $_SESSION['perfil']['nombre'] . ', BIENVENIDO!');}
                                } 
                                ?>
                      </div>

                    <?php            
                            if($_SESSION['perfil']['roll']==="cliente"){?>
                                      <a class="navbar-brand" id="tus_destinos" href="index.php?ctl=tusdestinoscontratados">Tus destinos contratados</a>
                    <?php   }?>


                  </div>

                        <div class="row">
                          <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                <hr>
                          </div>
                        </div>
    </div>-->

    <?php }?>                     
</div>
</div>    
</div>      
    </div>
    </div>

    <div class="row">
                                  
    

<div class="container">
    <div id="contenido" style="padding-bottom:2em">
      <!-- el id css facilita (si se define) la definición del aspecto visual
           de su contenido
           La variable $contenido hará que se muestre la plantilla concreta, el
           contenido concreto, según la solicitud realizada por el usuario
      -->
      <?= $contenido ?>

     
    </div>
</div>


<!--
<div class="container">
  <div class="row">
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
          <hr class="letra">
        </div>
  </div>
</div>

<div class="container">
  <div class="row">
        <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
          <hr class="letra">
        </div>
  </div>
</div>
-->



              <footer>
                <div class="container">
                    <div class="row">
                      <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                                    
                              <div id="container_footer" >
                            
                                        <div class="row"> 
                                          <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                            <h1>Oficinas de turismo</h1>
                                          </div>
                                        </div>

                                        <div class="row">
                                              <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                                <hr class="letra">
                                              </div>
                                        </div>

                                          <div id="comunidades_destinos" class="row"> 
                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                                  <h2>Cantabria</h2>
                                                  <h3><a href="https://www.cylex.es/somo/oficina-de-turismo-de-somo-11456114.html">Santander</a></h3>
                                                  <h3><a href="https://www.cylex.es/somo/oficina-de-turismo-de-somo-11456114.html">Somo</a></h3>
                                                  <h3><a href="https://www.islacantabria.com/inicio">Isla</a></h3>
                                                  <h3><a href="http://nojaturismo.com/">Noja</a></h3>   
                                                  <h3><a href="https://www.laredo.es/09/oficina_turismo.php">Laredo</a></h3>
                                                  <h3><a href="http://turismo.castro-urdiales.net/turcastro/planifica-tu-viaje/oficina-de-turismo">Castro-Urdiales</a></h3> 
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                                  <h2>Guipúzcoa</h2>
                                                  <h3><a href="https://zumaia.eus/es/turismo/zumaia-turismo/oficina-de-turismo">Zumaia</a></h3>
                                                  <h3><a href="https://www.getariaturismo.eus/es">Getaria</a></h3>
                                                  <h3><a href="https://www.turismozarautz.eus/es/">Zarautz</a></h3>
                                                  <h3><a href="http://turismo.orio.eus/es/">Orio</a></h3>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                                  <h2>Vizkaya</h2>
                                                  <h3><a href="https://turismo.euskadi.eus/es/oficinas-turismo/oficina-de-turismo-de-san-sebastian/aa30-12375/es/">San Sebastián</a></h3>
                                                  <h3><a href="https://hondarribiaturismo.com/">Fuenterrabía</a></h3>
                                                  <h3><a href="https://lekeitioturismo.eus/es/">Lekeitio</a></h3>
                                                  <h3><a href="https://visitplentzia.com/">Plentzia</a></h3>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-3 col-sm-6 col-6">
                                                  <h2>Francia</h2>
                                                  <h3><a href="https://www.hendaye-tourisme.fr/es/">Hendaya</a></h3>
                                                  <h3><a href="https://www.saint-jean-de-luz.com/homepage-es/">San Juan de Luz</a></h3>
                                                  <h3><a href="https://tourisme.biarritz.fr/es">Biarritz</a></h3>
                                                </div>
                                          </div>

                                          <div class="row">
                                              <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                                <hr class="letra">
                                              </div>
                                          </div>
                              </div>

                        <div class="row">
                              <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12">
                                  <div id="copyright">     
                                    <a href="#container_cabecera">  Adrián Laya García © 2021  - superlaya50@gmail.com- </a>
                                  </div> 
                              </div>
                        </div> 

                      </div>
                    </div>
                </div>
              </footer>

            
        



</div>

<div class="todo"></div>

</div>
    
    <script src="bootstrap/js/jquery-3.5.1.slim.min.js"></script>
    <script src="boostrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
             
  </body>
</html>















<!--
      <div>
        <a href="index.php?ctl=nuevobus">Nuevo Personal Agencia Viajes</a> |
        <a href="index.php?ctl=modificarbus">Modificar Personal AgenciaViajes</a> |
        <a href="index.php?ctl=eliminarbus">Eliminar Personal Agencia Viajes</a> |
        <a href="index.php?ctl=mostrarbuses">Mostrar todo el personal de las Agencias de Viejes</a> |
      </div>

      <div>
        <a href="index.php?ctl=nuevocliente">Nuevo cliente</a> |
        <a href="index.php?ctl=modificarcliente">Modificar un cliente</a> |
        <a href="index.php?ctl=eliminarcliente">Eliminar un cliente</a> |
        <a href="index.php?ctl=eliminarcliente">Eliminar todos los Cliente</a> |
        <a href="index.php?ctl=mostrarcliente">Mostrar todos los Clientes</a> |
      </div>


  <li>Agencia buses
  <div>
        <a href="index.php?ctl=nuevaagenciabuses">Nueva Agencia de buses</a> |
        <a href="index.php?ctl=modificaragenciabuses">Modificar Agencia de buses</a> |
        <a href="index.php?ctl=eliminaragenciabuses">Eliminar Agencia de buses</a> |
        <a href="index.php?ctl=mostraragenciabuses">Mostrar Agencia de buses</a> |
      </div>
  </li>
-->