<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: Authorization,Content-Type,Accept,Origin,User-Agent,DNT,Cache-Control,X-Mx-ReqToken,Keep-Alive,X-Requested-With,If-Modified-Since");
header('Access-Control-Allow-Methods: GET, POST, PUT');
include_once 'class_sql.php';

$objDatos = json_decode(file_get_contents("php://input"));

$tabla = $objDatos->tabla;
$datos = $objDatos->datos;
$id = $objDatos->id;
$where = $objDatos->where;

$array = json_decode(json_encode($datos), True);
$hoy = date("Y-m-d H:i:s");   

$ccsi = new Sql;

foreach($array as $key=>$dato){
    if(!empty($dato)){
        if($key=="retiro"){
            if($dato=='si'){
            $array["fecha_retiro"]= $hoy;
          //  print_r($array);
            }
            if($dato=='no'){
            $array["fecha_retiro"] = "0000-00-00 00:00:00";
         //   print_r($array);
            }
        }
        
        if($key=="pagado"){
            if($dato=='si'){
            $array["fecha_pago"]= $hoy;
         //   print_r($array);
            }
            if($dato=='no'){
            $array["fecha_pago"] = "0000-00-00 00:00:00"; 
         //   print_r($array);
            }
        }
    }
}
foreach($array as $key=>$dato){
    $ccsi->edit($tabla,$key,$dato,$where,$id);
}

$mal = $ccsi->getMal();
if($mal>0){
    echo "Hubo $mal errores, pruebe mas tarde...";
}else{
    echo "Realizamos la edicion con exito!";
}





