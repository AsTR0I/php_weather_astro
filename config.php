<?php
$key = '078785aded3c4c891cb2c38cc3f27e14';

if(!isset($_GET['city'])){
    $city = "";
} else {
    $city = $_GET['city'];
}

# http://api.openweathermap.org/data/2.5/weather?appid=078785aded3c4c891cb2c38cc3f27e14&q=Пермь&aqi=no&lang=ru
$urlCity = "http://api.openweathermap.org/data/2.5/weather?appid={$key}&q={$city}&units=metric&aqi=no&lang=ru";

function curl($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    curl_setopt($curl, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:62.0) Gecko/20100101 Firefox/62.0",);
    $data = curl_exec($curl);
    
    if(curl_error($curl)) {
        echo 'Curl error: ' . curl_error($curl);
    }
    curl_close($curl);
    return $data;
}


function getContents($city, $url) {
    if (!empty($city)) {
        $urlContents = curl($url);
        $weatherArray = json_decode($urlContents, true);

        if ($weatherArray) {
            $weatherCard = generateWeatherCard($city, $weatherArray);
            echo $weatherCard;
        } else {
            echo "<div class='alert alert-warning' role='alert'>Данные о погоде для этого местоположения недоступны.</div>";
        }
    }
}

function generateWeatherCard($city, $weatherArray) {
    $description = $weatherArray['weather'][0]['description'];
    $temp = $weatherArray['main']['temp'];
    $humidity = $weatherArray['main']['humidity'];
    $windSpeed = $weatherArray['wind']['speed'];
    $icon = "http://openweathermap.org/img/wn/{$weatherArray['weather'][0]['icon']}.png";

    $weatherCard = "<div class='card text-center'>";
    $weatherCard .= "<div class='card-header'><h2 class='card-title'>Погода в {$city}</h2></div>";
    $weatherCard .= "<div class='card-body'>";
    $weatherCard .= "<p class='card-text'>Описание: {$description}</p>";
    $weatherCard .= "<p class='card-text'>Температура: {$temp}°C</p>";
    $weatherCard .= "<p class='card-text'>Влажность: {$humidity}%</p>";
    $weatherCard .= "<p class='card-text'>Скорость ветра: {$windSpeed} м/с</p>";
    $weatherCard .= "<img src='{$icon}' class='card-img-bottom' alt='Иконка погоды'>";
    $weatherCard .= "</div>";
    $weatherCard .= "</div>";

    return $weatherCard;
}


