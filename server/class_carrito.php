<?php
session_start();
error_reporting(E_ALL);

date_default_timezone_set('America/Argentina/Buenos_Aires');

//session_destroy();

class Carrito
{
    
    public $articulo;
    public $total;
    public $cantidad;
    public $repetido;
    
    public function getRepetido(){
        return $this->repetido;    
    }




    public function setArticulo($a){
        $_SESSION['articulos'] = $a;
    }
    
    public function getArticulo(){
        return $_SESSION['articulos'];    
    }
    
    public function update_articulo($id,$item_cantidad){
        if(isset($_SESSION['articulos'])){
            $_SESSION['articulos'][$id]['item_cantidad'] = $item_cantidad;
            return;
        }
    }
 
    

    public function cargar_articulo($item_id,$item_img,$item_nombre,$item_filtro,$item_precio, $item_modelo,$item_cantidad){
        if(isset($_SESSION['articulos'])){
            $id_repetido = $this->checkArticulos($item_id,$item_modelo);
            //echo "este es el repedito ".$this->getRepetido();
            if($this->getRepetido()!=='no'){
               // echo "entre pero no soy repetido";
                $cantidad_vieja = $_SESSION['articulos'][$this->getRepetido()]['item_cantidad']; 
                $cantidad_nueva = $cantidad_vieja + $item_cantidad;
                    if($cantidad_nueva==0){
                        $this->quitar_articulo($id_repetido);
                    }else{
                        $_SESSION['articulos'][$this->getRepetido()]['item_cantidad'] = $cantidad_nueva;
                        return;
                }
            }
            $nuevo_articulo  = array(
                'item_id'=>$item_id,
                'item_img'=>$item_img,
                'item_nombre'=>$item_nombre,
                'item_categoria'=>$item_filtro,
                'item_precio'=>$item_precio,
                'item_variante'=>$item_modelo,
                'item_cantidad'=>$item_cantidad,
            );
            array_push($_SESSION['articulos'],$nuevo_articulo);
        }else{
           // echo "no es un array";
            $nuevo_articulo  = array(
                'item_id'=>$item_id,
                'item_img'=>$item_img,
                'item_nombre'=>$item_nombre,
                'item_categoria'=>$item_filtro,
                'item_precio'=>$item_precio,
                'item_variante'=>$item_modelo,
                'item_cantidad'=>$item_cantidad,
            );
           
           $_SESSION['articulos'][] = $nuevo_articulo;
        }
    }
    
    public function checkArticulos($id,$variante){
        if(isset($_SESSION['articulos'])){
            $p = array_keys(array_column($_SESSION['articulos'], 'item_id'), $id);
            if(count($p)!=0){
               foreach($p as $k){
                    if($_SESSION['articulos'][$k]['item_variante']!='undefined'){
                        if($_SESSION['articulos'][$k]['item_variante']==$variante){
                            $this->repetido = $k;
                        }else{
                            $this->repetido = 'no';
                        }
                    }else{
                        $this->repetido = $k;
                        //echo "mando esto $k";
                    }
               }
            }else{
                $this->repetido = 'no';  
            }
          
        }
    }
    
    
    public function cargar_articulo_por_item_id($item_id){
         foreach($_SESSION['articulos'] as $ak=>$av){
            foreach($av as $k=>$v){
               if(($k=='id')&&($v==$item_id)){
                    /*echo "<pre>";
                        print_r($_SESSION['articulos'][$ak]);
                    echo "</pre>";*/
                    $id = $_SESSION['articulos'][$ak]['id'];
                    $img = $_SESSION['articulos'][$ak]['img'];
                    $nombre = $_SESSION['articulos'][$ak]['nombre'];
                    $filtro = $_SESSION['articulos'][$ak]['categoria'];
                    $precio = $_SESSION['articulos'][$ak]['precio'];
                    $description = $_SESSION['articulos'][$ak]['description'];
                    $modelo = $_SESSION['articulos'][$ak]['modelo'];
                    $color = $_SESSION['articulos'][$ak]['color'];
                    $cantidad = $_SESSION['articulos'][$ak]['cantidad'];
                    $tam = $_SESSION['articulos'][$ak]['tamanio'];
                    
                    $this->cargar_articulo($id,$img,$nombre,$filtro,$precio, $description,$modelo,$color, $cantidad, $tam);
                    return;
               }
            }
        }
    }
    
    public function quitar_articulo_por_item_id($item_id){
         foreach($_SESSION['articulos'] as $ak=>$av){
            foreach($av as $k=>$v){
               if(($k=='id')&&($v==$item_id)){
                    unset($_SESSION['articulos'][$ak]);
                    sort($_SESSION['articulos']);
                    return;
               }
            }
        }
    }
    
    
    
    
    public function quitar_articulo($id){
        if(isset($_SESSION['articulos'])){
           // echo "Hay variable de session";
            unset($_SESSION['articulos'][$id]);
           // echo "Borre la variable $id";
            //print_r($_SESSION['articulos']);
            $cuantos = count($_SESSION['articulos']);
            if($cuantos == 0){
               // echo "Count de esto:".count($_SESSION['articulos']);
               // echo "Que supuestamente es 0";
                unset($_SESSION['articulos']);
            }
        }
        sort($_SESSION['articulos']);
    }
    
    public function cuantos_articulos(){
       $sum = 0;
        foreach ($_SESSION['articulos'] as $k=>$value) {
            $sum += $value['item_cantidad'];
        }
        return $sum; 
    }
    
    public function precioTotal(){
        foreach($_SESSION['articulos'] as $ak=>$av){
            foreach($av as $k=>$v){
               if($k=='item_precio'){
                   $precio[] = $v; 
               }
            }
        }
        $total = array_sum($precio);
        $this->total = $total;
        return $this->total;
    }
    
    public function cantidad_por_item_id($item_id){
        foreach($_SESSION['articulos'] as $ak=>$av){
            foreach($av as $k=>$v){
               if(($k=='id')&&($v==$item_id)){
                   $precio[] = $av['cantidad']; 
               }
            }
        }
        $total = array_sum($precio);
        if($total == 0){
          $this->cantidad = 1;  
        }else{
        $this->cantidad = $total;
        }
        return $this->cantidad;
    }
    
    
    public function cargar_item_id($item_id){
         $string = file_get_contents("../productos.json");
            if ($string === false) {
                echo "No pudimos traer el archivo...";
            }
        $json = json_decode($string, true);
        $p = array_search($item_id, array_column($json, 'item_id'));
       // print_r($json[$p]);
        $this->cargar_articulo(
                $json[$p]['id'],
                $json[$p]['img'],
                $json[$p]['nombre'],
                $json[$p]['categoria'],
                $json[$p]['precio'],
                $json[$p]['description'],
                $json[$p]['modelo'],
                $json[$p]['color'],
                "1",
                $json[$p]['tamanio']
                );
    }


    
}   
/*
$carro = new Carrito;
$carro->quitar_articulo_por_item_id('0');
*/
/*
echo "<pre>";
print_r($_SESSION['articulos']);
echo "</pre>";
*/


//session_destroy();
 
