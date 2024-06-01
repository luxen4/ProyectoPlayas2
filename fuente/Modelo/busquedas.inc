<?php
use miId\fuente\Repositorio\DestinoRepositorio;

      if(isset($_POST['consultarporfecha'])){
        $datos=$_POST['datos']; //die();
        require __DIR__ . '/../../fuente/Repositorio/destinoRepositorio.inc';
        $destinos = (new DestinoRepositorio())->todosDestinosPorFecha($datos); 
       // var_dump($destinos);die(); 
        $_SESSION['destinos']=$destinos;  //filtradosporfecha
        header('Location:index.php?ctl=destinosporfechafiltrados'); 
      }
  
      if(isset($_POST['consultarpordestino'])){
        $datos=$_POST['datos']; //die();
        require __DIR__ . '/../../fuente/Repositorio/destinoRepositorio.inc';
        $destinos = (new DestinoRepositorio())->todosDestinosPorDestino($datos);  
      //  var_dump($destinos);die();
      //  $_SESSION['destinos']=$destinos;  //filtradosporlugar
      //  var_dump($_SESSION['destinos']); //die();
        header('Location:index.php?ctl=destinospordestinofiltrados'); 
      }

      if(isset($_POST['consultarporagenciaviajes'])){
        $datos=$_POST['datos']; 
        require __DIR__ . '/../../fuente/Repositorio/destinoRepositorio.inc';
        $destinos = (new DestinoRepositorio())->todosDestinosPorAgenciaViajes($datos);  
           //var_dump($destinos);die();
        $_SESSION['destinos']=$destinos;  //filtradosporagenciaviajes
        header('Location:index.php?ctl=destinosporagenciaviajesfiltrados'); 
      }

      if(isset($_POST['consultarpordia'])){
        $datos=$_POST['datos']; 
        require __DIR__ . '/../../fuente/Repositorio/destinoRepositorio.inc';
        $destinos = (new DestinoRepositorio())->todosDestinosPorDia($datos);  
        $_SESSION['destinos']=$destinos;  //filtradospordia
       // var_dump($destinos);die();
        header('Location:index.php?ctl=destinospordiafiltrados'); 
      }

      if(isset($_POST['apuntar'])){
        $datos=$_POST['datos'];
        $_SESSION['datos']=$datos; var_dump($datos);
        header('Location: index.php?ctl=motrarplantabus');
     
      }

      
?>