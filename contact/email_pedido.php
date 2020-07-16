<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';


$objDatos = file_get_contents("php://input");
//var_dump($objDatos);
$array = json_decode($objDatos, True);

//print_r($array);

$sql = new Sql;
$insert = $sql->insert_array('pedidos',$array);





