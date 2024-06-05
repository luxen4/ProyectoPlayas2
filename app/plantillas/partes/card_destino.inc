   <div class="col-xl-3 text-center col-lg-3 col-md-4 col-sm-6 col-6"> <!-- Número de Destinos por fila -->
        <article>
            <div class="articulo"> 

                <div class="row">
                    <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12 "> 
                        <p class="comunidad"><?php echo($comunidad); ?></p> 
                        <?php include $_SERVER['DOCUMENT_ROOT'] . '/playas2024/app/utilidades/apis/tiempo_meteorologico.inc'; ?>


                    </div>  
                </div> 


                    <?php
                    if ($estado=="DISPONIBLE") {
                        ?><!-- <h4 style="color: #006293;"><?php echo($estado); ?></h4> -->
                            <img class="fotodestino" src="web/imagenes/destinos/<?php echo($foto)?>.jpg" alt="Foto de un destino">

                    <?php
                    } else {?>
                        <img class="fotodestino" src="web/imagenes/destinos/completo.png" alt="Foto de un destino"><?php
                    } ?>
                                    

                  
                    <div><p class="destino"><a href="web/imagenes/destinos/<?php echo($nombreDestinoTitulo)?>.jpg" alt="descripción de la foto"><?php echo($nombreDestinoTitulo); ?></a></p></div> 
                    <!--https://www.laurachuburu.com.ar/tutoriales/enlaces-html.php-->






                    <?php $fechaDestino = date("d-m-Y", strtotime($fechaDestino));?>
                    <div class="col-xl-12 text-center col-lg-12 col-md-12 col-sm-12 col-12 textodestino"><p class="fecha"><?php echo($fechaDestino . ' ' . $diaSemana); ?> <br></p> </div>
            
                    <div class="row">

                        <div class="col-xl-12 text-center">  
                        <!--  
                            <p class="info_plazas">Total: <?php echo($results1[0]->plazas); ?> plazas;<br>Ocupadas: <?php echo($results2[0]->plazas) . " plazas"; ?></p>
                        -->    
                            <?php $quedan=($results1[0]->plazas)-($results2[0]->plazas);?>
                            <p class="info_plazas">Quedan: <?php echo($quedan) . " plazas"; ?></p>
                        </div>
 

                        <div class="col-xl-12 text-center textoprecio"> 
                            <p class="precio"><?php echo(round($euros, 2, PHP_ROUND_HALF_DOWN) . "€"); ?></p>
                        </div>
                    
                        <?php   if (!empty($_SESSION['perfil'])) {
                        if ($_SESSION['perfil']['roll']==="cliente") {
                            if ($estado=="DISPONIBLE") {?>
                                            <div id="boton_apuntar" class="col-xl-12 text-center" >
                                                <input class="apuntar" type="submit" name="apuntar" value="Contratar" onclick="selecciona(<?php echo($codDestino);?>)"> 
                                                <input id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" 
                                                            value="<?php echo($codDestino);?>" hidden >
                                            </div>
                                            <div><p class="agencia"><?php echo($nombreAgenciaViajes);?></p></div><?php 
                            }else{?>

                                            <div id="boton_apuntar" class="col-xl-12 text-center" >
                                                <input class="apuntar2" type="submit" name="apuntar" value="Completo" onclick="selecciona(<?php echo($codDestino);?>)" disabled> 
                                                <input id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" 
                                                            value="<?php echo($codDestino);?>" hidden >
                                            </div>
                                            <div><p class="agencia"><?php echo($nombreAgenciaViajes);?></p></div><?php 

                                            }
                        }

                        if ($_SESSION['perfil']['roll']==="admin") {?>

                                            <div id="boton_apuntar" class="col-xl-12 text-center" >
                                                <input class="apuntar" type="submit" name="apuntar" value="Info" onclick="selecciona(<?php echo($codDestino);?>)"> 
                                                <input id="<?php echo($codDestino);?>" type="checkbox" name="datos[destinoseleccionado]" 
                                                            value="<?php echo($codDestino);?>" hidden >
                                            </div>

                                            <div><p class="agencia"><?php echo($nombreAgenciaViajes);?></p></div>

                                            <?php  }
                                } ?>

                            
                    </div>



                    
            </div>
        </article>
    </div>