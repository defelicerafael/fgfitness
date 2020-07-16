<?php
include_once 'class_sql.php';

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);

$sql = new Sql;
$columnas = $sql->showColumnNames('colores');

if ($id =="si") {
    $array = array('mostrar'=>'si');    
    $select = $sql->selectTablaNew('colores',$array,'id','ASC','99999');
    //echo "entre en si el ID esta vacio";
}else{
    if($id=="no"){
        $select = $sql->selectTablaNew('colores','no','color','ASC','99999');
         //echo "entre en si el ID el igual a no";
    }else{
        
        if (is_numeric($id)){
            $array = array('id'=>$id);
            $select = $sql->selectTablaNew('colores',$array,'color','ASC','99999');
        }else{
            // echo "entre en si el ID tiene datos";
            $partes = explode("-", $id);
            $array = array($partes[0]=>$partes[1]);  
            $select = $sql->selectTablaNew('colores',$array,'color','ASC','99999');
        }
    }
}
$null = is_null($select);
if($null==true){
    echo "[]";
}else{
$sql->jsonConverter($select); 
}
