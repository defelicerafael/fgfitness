<?php
error_reporting(E_ALL);
//echo "entramos";
include_once 'class_carrito.php';

$item_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$carro = new Carrito;
$carro->quitar_articulo($item_id);

