<?php
error_reporting(E_ALL);
//echo "entramos";
include_once 'class_carrito.php';
$item_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//traigo el json...
$string = file_get_contents("../productos.json");
if ($string === false) {
    echo "No pudimos trtaer el archivo...";
}
$json = json_decode($string, true);
$p = array_search($item_id, array_column($json, 'id'));

if(empty($json[$p]['cantidad'])){
    $json[$p]['cantidad'] = 1;
}

$carro = new Carrito;
$id = $json[$p]['id'];
$img= $json[$p]['img'];
$nombre =$json[$p]['nombre'];
$filtro=$json[$p]['categoria'];
$precio=$json[$p]['precio'];
$description=$json[$p]['description'];
$modelo=$json[$p]['modelo'];
$color=$json[$p]['color'];
$cantidad=$json[$p]['cantidad'];
$tam=$json[$p]['tam'];

$carro->cargar_articulo($id,$img,$nombre,$filtro,$precio, $description,$modelo,$color, $cantidad, $tam);
echo count($_SESSION['articulos']);  

 
