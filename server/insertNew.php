<?php
error_reporting(E_ALL);
//echo "entramos";
include_once 'class_carrito.php';
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_SPECIAL_CHARS);
$variante = filter_input(INPUT_POST, 'variante', FILTER_SANITIZE_SPECIAL_CHARS);
$precio = filter_input(INPUT_POST, 'precio', FILTER_SANITIZE_SPECIAL_CHARS);

//traigo el json...
/*
$id = 6;
$cantidad = 4;
$variante = "alta";
$precio = "800";
*/
$string = file_get_contents("../productos.json");

if ($string === false) {
    echo "No pudimos trtaer el archivo...";
}

$json = json_decode($string, true);
$p = array_search($id, array_column($json, 'id'));
/*
echo "<pre>";
print_r($json[$p]);
echo "</pre>";
*/
$carro = new Carrito;
$item_id = $id;
$img= $json[$p]['img'][0];
$nombre =$json[$p]['nombre'];
$filtro=$json[$p]['categoria'];
$item_precio= $precio;
$modelo = $variante;
$item_cantidad= $cantidad;

$carro->cargar_articulo($item_id,$img,$nombre,$filtro,$item_precio, $modelo,$item_cantidad);

//echo count($_SESSION['articulos']);  
$sum = 0;
foreach ($_SESSION['articulos'] as $k=>$value) {
    $sum += $value['item_cantidad'];
}
echo $sum; 
