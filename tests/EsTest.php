<?php
require 'vendor/autoload.php';
$client = new Elasticsearch\Client();
$params = array();
$params['body']  = array('testField' => 'abc');
$params['index'] = 'my_index';
$params['type']  = 'my_type';
$params['id']    = 'my_id';
//$ret = $client->index($params);
//var_dump($ret);

$getParams = array();
$getParams['index'] = 'my_index';
$getParams['type']  = 'my_type';
$getParams['id']    = 'my_id';
$retDoc = $client->get($getParams);
var_dump($retDoc);

$searchParams['index'] = 'my_index';
$searchParams['type']  = 'my_type';
$searchParams['body']['query']['match']['testField'] = 'abc';
$retDoc = $client->search($searchParams);
var_dump($retDoc);
