<?php

$getCoutry = $_GET['coutry'];
$getState = $_GET['state'];
$getDeaths = $_GET['deaths'];
$getCured = $_GET['cured'];
$getInfecteds = $_GET['infected'];
$getTime = $_GET['time'];
$getDeath = $_GET['death'];
$getRecoveries = $_GET['recoveries'];
$getPeriod = $_GET['period'];
date_default_timezone_set('UTC');
header("Access-Control-Allow-Origin: *");

$getApi = file_get_contents('https://xyz.api.here.com/hub/spaces/2LlvwPLZ/bbox?west=-180&north=90&east=180&south=-90&access_token=ABp7U3fwSf6D0QSkcrP4_AA');
$jsonData = json_decode($getApi, true);
$featuresArr = $jsonData['features'];
//$jsonFile = json_encode($jsonData);

$date = date('m/d/Y');
if($getTime == null){
    if(substr($date,0 ,1) == '0'){
        $getData = substr($date,1 ,9);
    }else{
        $getData = $date;
    }
}else{
    $getData = $getTime;
}

function countrys($coutry, $dataApi){
    foreach($dataApi as $value => $key){
        if($coutry == 'all'){
            $api[$value] = $dataApi[$value]['properties']['countryregion'];
        }else{
            if($coutry == $dataApi[$value]['properties']['countryregion'][$coutry]){
                $api[$value] = $dataApi[$value]['properties']['countryregion'][$coutry];
            }
        }
    }
    return $api;
}

function state($state, $dataApi){
    foreach($dataApi as $value => $key){
        if($state == 'all'){
            $api[$value] = $dataApi[$value]['properties']['provincestate'];
        }else{
            if($state == $dataApi[$value]['properties']['provincestate'][$state]){
                $api[$value] = $dataApi[$value]['properties']['provincestate'][$state];
            }
        }
    }
    return $api;
}

function death($period, $dataApi){
    global $getCoutry, $getDeath, $getTime;
    $deaths = 'deaths_'.$getTime.' 12:00 am';
    $soma = 0;
    foreach($dataApi as $value => $key){
        if($period == 'all'){
            $api[$value] += $dataApi[$value]['properties'][$deaths];
        }
        if($getDeath == 'all'){
            $apiSoma[$value] = $dataApi[$value]['properties'][$deaths];
            $soma = $soma + $apiSoma[$value];
            $api = $soma;
        }
    }
    return $api;
}

function recoveries($period, $dataApi){
    global $getCoutry, $getRecoveries, $getTime;
    $recoveries = 'recoveries_'.$getTime.' 12:00 am';
    $soma = 0;
    foreach($dataApi as $value => $key){
        if($period == 'all'){
            $api[$value] += $dataApi[$value]['properties'][$recoveries];
        }
        if($getRecoveries == 'all'){
            $apiSoma[$value] = $dataApi[$value]['properties'][$recoveries];
            $soma = $soma + $apiSoma[$value];
            $api = $soma;
        }
    }
    return $api;
}

$recoveries = recoveries($getPeriod, $featuresArr);
$deaths = death($getPeriod, $featuresArr);
$coutrys = countrys($getCoutry, $featuresArr);
$states = state($getState, $featuresArr);

if($getPeriod == true){
    if($getDeath == true){
        $dataOutput = $deaths;
    }
}

if($getPeriod == true){
    if($getRecoveries == true){
        $dataOutput = $recoveries;
    }
}

if($getCoutry == true){
    $dataOutput = $coutrys;
}

if($getState == true){
    $dataOutput = $states;
}
if($dataOutput == null){
    $dataOutput = 'insert_Params_corrects'; 
}
$apiArr = ['api' => $dataOutput];
echo json_encode($apiArr);
