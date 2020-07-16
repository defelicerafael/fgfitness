<?php
error_reporting(E_ALL);
//echo "entramos";
include_once 'class_carrito.php';
$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$cantidad = filter_input(INPUT_POST, 'cantidad', FILTER_SANITIZE_SPECIAL_CHARS);


$carro = new Carrito;
$item_id = $id;
$item_cantidad= $cantidad;
$carro->update_articulo($item_id,$item_cantidad);
$sum = 0;
foreach ($_SESSION['articulos'] as $k=>$value) {
    $sum += $value['item_cantidad'];
}
echo $sum; 
