<?php
session_start();
error_reporting(E_ALL);
date_default_timezone_set('America/Argentina/Buenos_Aires');
include_once 'class_carrito.php';
$item_id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
$carro = new Carrito;
$carro->cargar_item_id($item_id);
echo $carro->cantidad_por_item_id($item_id);

/*
echo "<pre>";
print_r($_SESSION['articulos']);
echo "</pre>";
*/


//session_destroy();
 
