<?php
include_once 'class_sql.php';

$email = filter_input(INPUT_GET, 'email', FILTER_VALIDATE_EMAIL);
$pass= filter_input(INPUT_GET, 'pass', FILTER_SANITIZE_STRING);

$sql = new Sql;
$columnas = $sql->showColumnNames('usuarios');
    $array = array('email'=>$email,'pass'=>$pass);    
    $select = $sql->selectTablaNew('usuarios',$array,'id','ASC','999');    
    $null = is_null($select);
if($null==true){
    echo "NO";
}else{
$sql->jsonConverter($select); 
}
