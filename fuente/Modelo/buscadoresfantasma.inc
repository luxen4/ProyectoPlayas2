<?php
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/utilidades.inc'; ?>
<div class="container" >
<div  class="silverfoxv">
            <div class="row">

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 tres">
                        <div  class="front tres">
                                    <label for="fViaje">Fecha<br>
                                    <input type="date" name="datos[fechaviaje]" id="sexo" value="<?php echo $datos['fechaviaje'] ?? '' ?>" >
                                <input type="submit" name="consultarporfecha" value="Consultar">
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 tres">
                        <div class="front tres">
                            <label for="comunidad">Día<br>

                                <select id="" name="datos[diasemana]" >
                                <option value="" selected>Seleccione!</option>
                                <option value="Lunes">Lunes</option>
                                <option value="Martes">Martes</option>
                                <option value="Miercoles">Miercoles</option>
                                <option value="Jueves">Jueves</option>
                                <option value="Viernes">Viernes</option>
                                <option value="Sabado">Sábado</option>
                                <option value="Domingo">Domingo</option>
                                </select>
                            <input type="submit" name="consultarpordia" value="Consultar">
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 tres">
                        <div class="front tres">
                            <label for="comunidad">Destino<br>
                                <select id="" name="datos[lugardestino]" >
                                                <option value="" selected>Seleccione!</option><?php    
                        
                                        $result= $_SESSION['sololugares'];
                                        foreach($result as $opciones){
                                            $nombreLugar=$opciones->nombre_Lugar;?>
                                        <option value="<?php echo $nombreLugar;?>"><?php echo pasarUtf8($nombreLugar);?></option>

                                <?php   } ?>

                                </select>
                            
                            <input type="submit" name="consultarpordestino" value="Consultar">
                        </div>
                    </div>

                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 tres">
                        <div class="front tres">
                            <label for="comunidad">Agencias<br>

                                <select id="" name="datos[agenciaviajes]" >
                                <option value="" selected>Seleccione!</option>
  
                                <!------------------------------------------------------------------------------------------------------------------------->  
                                <!-- Desde aquí para desarroyar en Mysql -->                              
                                <!------------------------------------------------------------------------------------------------------------------------->
                                <?php                                                     // con for              
                                    /* $result=$_SESSION['soloagenciasdeviajes'];
                                    for($i=0; $i<count($result); $i++){
                                    $nombreAgenciaViajes=$_SESSION['soloagenciasdeviajes'][$i]->nombre;?>
                                    <option value="<?php echo($nombreAgenciaViajes);?>"><?php echo($nombreAgenciaViajes);?></option>
                                    <?php }  
                                    
                                    */
                                
                                ?>

                                <?php                                                     // con foreach

                                    $result=$_SESSION['soloagenciasdeviajes'];
                                    
                                        foreach($result as $opciones){
                                        
                                            $codAgenciaViajes=$opciones->cod_AgenciaViajes;
                                            $nombreAgenciaViajes=$opciones->nombre;?>

                                        <option value="<?php echo pasarUtf8($codAgenciaViajes);?>"><?php echo pasarUtf8($nombreAgenciaViajes);?></option>
                                        
                                <?php   } ?>
                                <!------------------------------------------------------------------------------------------------------------------------->  
                                <!-- Hasta aquí para desarroyar en Mysql -->                              
                                <!------------------------------------------------------------------------------------------------------------------------->

                                </select>
                            <input type="submit" name="consultarporagenciaviajes" value="Consultar">
                        </div>
                    </div>
                    
            </div>

            
<?php $destinos=$_SESSION['destinos'];?>

<div class="container">
   
 <?php $veces=0;  //var_dump($destinos);die();

            foreach($destinos as $destino){?>

                <?php if (!is_array($destino)) {?>
                  <div class="row">

                <?php  foreach ($destino as $desti) {
                if ($veces==0) {

                    for ($i=0; $i<count($destinos);$i++) {

                        $codDestino=$destinos[$i]->cod_Destino;
                        $nombreDestino=$destinos[$i]->nombre_Lugar;  
                        $comunidad=$destinos[$i]->com_Reg;
                        $fechaDestino=$destinos[$i]->fecha_Viaje;
                        $diaSemana=$destinos[$i]->dia_Semana;
                        $euros=$destinos[$i]->euros;
                        // $codAgenciaViajes= $destinos[$i]->cod_AgenciaOferta;
                        $nombreAgenciaViajes=$destinos[$i]->nombre;
                        //$nombreAgenciaViajes=utf8_encode($destinos[$i]->nombre);


                        try {
                            include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/conf/configuracionfantasma.inc';

                            $sqlCodigoBus="SELECT distinct cod_Bus FROM DESTINO
                                    WHERE cod_Destino=$codDestino";


                            $result0 = $gbd->query($sqlCodigoBus);
                            $results0 = $result0->fetchAll(\PDO::FETCH_OBJ);

                            if (!empty($results0)) {
                                $codigoDeBus= $results0[0]->cod_Bus;
                                $sql1PlazasTotalesDelBus="SELECT plazas FROM BUS WHERE cod_Bus=$codigoDeBus";
                                $result1 = $gbd->query($sql1PlazasTotalesDelBus);
                                $results1 = $result1->fetchAll(\PDO::FETCH_OBJ);
                            } else {
                            }
        
                            $sql2PlazasOcupadasDelBus="SELECT count(plaza_Bus) as 'plazas' FROM VIAJAR WHERE cod_Destino=$codDestino";
            
                            $result2 = $gbd->query($sql2PlazasOcupadasDelBus);
                            $results2 = $result2->fetchAll(\PDO::FETCH_OBJ);
                        } catch (\PDOException$e) {
                            echo $e->getMessage();
                        } catch (\Exception$ex) {
                            throw $ex;
                        } finally {
                            $gbd = null;
                        }

                        if (isset($results1)) {
                            if ($results1[0]->plazas!=$results2[0]->plazas) {
                                $estado="DISPONIBLE";//die();
                            } else {
                                $estado="COMPLETO";
                            }
                        } else {
                            $estado="COMPLETO";
                        } ?>


                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/plantillas/partes/card_destino.inc'; ?><?php
                    } ?>

                    <?php $veces++;

                    if ($veces/4==1) {
                        $veces=0; ?>
                        </div>
                        <?php
                    } else {
                    } ?>
                        
        <?php }
            }?>
    </div>
 <?php   }} ?>
              

    </div>
</div>


        