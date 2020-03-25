![logo](https://i.imgur.com/krqsybE.png)

# Real-time api for covid19 data
### en

## Introduction
To use this API, you can use [api covid-catalog](http://api.covid-catalo.ga/) where it is possible to connect and obtain all data by GET parameters. The data is mirrored in [Tracking Coronavirus COVID-19] (https://app.developer.here.com/coronavirus/) where it is possible to obtain contamination, dead and recovered data from around the world.

## Getting countries

to get the countries, use the `coutry` parameters where you can have the list of countries infected by Covid19 using the``all`` parameter or get the data of a specific country using the name or abbreviation.
> - JavaScript
```js
$ .getJSON ('http://api.covid-catalo.ga/?coutry=all', (res) => {
console.log (res)
});
```
> - PHP
```php
$ getApi = file_get_contents ('http://api.covid-catalo.ga/?coutry=all');
$ jsonData = json_decode ($ getApi, true);
echo "<pre>";
var_dump ($ jsonData);
echo "</pre>";
```

## getting states / provinces

to get states or provinces you can use the `state` parameter where you can get all the data of the states and provinces affected by the world. Use `` all`` to get all affected states / provinces or use the specific name.
> - JavaScript
```js
$ .getJSON ('http://api.covid-catalo.ga/?state=all', (res) => {
console.log (res)
});
```
> - PHP
```php
$ getApi = file_get_contents ('http://api.covid-catalo.ga/?state=all');
$ jsonData = json_decode ($ getApi, true);
echo "<pre>";
var_dump ($ jsonData);
echo "</pre>";
```

## obtaining a daily death toll

The death toll is updated every day at 12:00 am. Therefore, the data is delayed by half a day. To obtain the number of deaths by Covid19, use the parameters `period`,` time`, `death`.

> Note: the `time` parameter has the string format m / dd / yyyy where you must present in dd the day before the current one. The period parameter, is the period of data collection, and uses timestamp / 1000 or use ``all`` for every period of the day. The `death` parameter has a value of 0 for values ​​separated by province / state, or ``all`` to sum up all values ​​for the day.

> - JavaScript
```js
$ .getJSON ('http://covid-catalo.ga/api/?period=all&time=3/19/2020&death=all', (res) => {
console.log (res)
});
```
> - PHP
```php
$ getApi = file_get_contents ('http://covid-catalo.ga/api/?period=all&time=3/19/2020&death=all');
$ jsonData = json_decode ($ getApi, true);
echo "<pre>";
var_dump ($ jsonData);
echo "</pre>";
```

## pt

## Introdução
Para ultilizar esta API, você pode ultilizar [api covid-cataloga](http://api.covid-catalo.ga/) onde é possivel se conectar e obter todos os dados por parametros GET. Os dados são espelhados de [Tracking Coronavirus COVID-19](https://app.developer.here.com/coronavirus/) onde é possivel obter dados de contaminação, mortos e recuperados de todo o mundo.

## Obtendo paises

para obter os paises, ultilise os parametros `coutry` onde vc pode ter a lista de paises infectados pelo Covid19 ultilisando o parametro ``all`` ou obter os dados de um país especifico ultilisando o nome ou abreviação.
>- JavaScript
```js
$.getJSON('http://api.covid-catalo.ga/?coutry=all', (res) => {
	console.log(res)
});
```
>- PHP
```php
$getApi = file_get_contents('http://api.covid-catalo.ga/?coutry=all');
$jsonData = json_decode($getApi, true);
echo "<pre>";
var_dump($jsonData);
echo "</pre>";
```

## obtendo Estados / provincias

para obter estados ou provincias vc pode ultilizar o parametro `state` onde vc pode obter todos os dados dos estados e provincias afetados pelo mundo. Ultilize ``all`` para obter todos os estados / provincias afetados ou ultilize o nome especifico.
>- JavaScript
```js
$.getJSON('http://api.covid-catalo.ga/?state=all', (res) => {
	console.log(res)
});
```
>- PHP
```php
$getApi = file_get_contents('http://api.covid-catalo.ga/?state=all');
$jsonData = json_decode($getApi, true);
echo "<pre>";
var_dump($jsonData);
echo "</pre>";
```

## obtendo numero todal de mortos do dia

O numero de mortos é atualizado a cada dia 12:00 am. Portanto, os dados tem um atraso de meio dia. Para obter o numero de mortos pelo Covid19, Ultilize os parametros `period`, `time`, `death`.

> Note: o parametro `time` tem o formato de string m/dd/yyyy onde deve apresentar em dd o dia anterior ao atual. O parametro period, é o periodo de obtenção dos dados, e ultiliza timestamp / 1000 ou ultilize ``all`` para todo periodo do dia. O parametro `death` possui o valor 0 para valores separados por provincia / estado, ou ``all`` para somar todos os valores do dia.

>- JavaScript
```js
$.getJSON('http://covid-catalo.ga/api/?period=all&time=3/19/2020&death=all', (res) => {
	console.log(res)
});
```
>- PHP
```php
$getApi = file_get_contents('http://covid-catalo.ga/api/?period=all&time=3/19/2020&death=all');
$jsonData = json_decode($getApi, true);
echo "<pre>";
var_dump($jsonData);
echo "</pre>";
```
