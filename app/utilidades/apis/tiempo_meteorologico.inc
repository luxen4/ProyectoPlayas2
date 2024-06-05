<?php
if (in_array($nombreDestino, $_SESSION['fotosLugares'])) {
    $foto=$nombreDestino;
    $nombreDestinoTitulo=$nombreDestino;
    $googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=" .$nombreDestino. "&appid=364b8c96a92b46376a612bae9241de67"; // https://openweathermap.org/current
    //$googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=Saint-Jean-de-Luz&appid=364b8c96a92b46376a612bae9241de67"; // https://openweathermap.org/current
}else{
    $foto="predeterminada";
    $nombreDestinoTitulo=$nombreDestino;
    $googleApiUrl = "api.openweathermap.org/data/2.5/weather?q=Santander&appid=364b8c96a92b46376a612bae9241de67";
}



$ch = curl_init();

curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_URL, $googleApiUrl);
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 0);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$response = curl_exec($ch);

curl_close($ch);

/* Decode and check cod */
$data = json_decode($response);

if($data != null){
    if( $data->cod != 200 ) {
        //exit("An error has occurred: ".$data->message);
        $data = json_decode($response);
    } 

    if (in_array($nombreDestino,  $_SESSION['fotosLugares'])   ) {
        //var_dump(($data->main->temp)-273);//die();?>
        <div class="weather-forecast">
            <img src="http://openweathermap.org/img/w/<?=pasarUtf8($data->weather[0]->icon); ?>.png" class="weather-icon" /> <?=round(($data->main->temp)-273, 0, PHP_ROUND_HALF_ODD)?>º
        </div><?php
    }else{?>
        <div class="weather-forecast">
            <img src="http://openweathermap.org/img/w/03n.png" class="weather-icon" /> ??º
        </div><?php
    }
}?>

