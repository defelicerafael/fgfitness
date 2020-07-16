<?php
session_start();
//session_destroy();
if (isset($_SESSION['articulos'])) {
  $articulos = $_SESSION['articulos'];
  //print_r($_SESSION['articulos']);
} 
error_reporting(E_ALL);
include_once '../server/class_carrito.php';
$carro = new Carrito;
// AGARRO EL ID POR GET
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//traigo el json...
$string = file_get_contents("productos.json");
if ($string === false) {
    echo "No pudimos traer el archivo...";
}
$json = json_decode($string, true);
$p = array_search($id, array_column($json, 'id'));

//print_r($json[$p]);
//echo $json[$p]['id'];

//echo $carro->cantidad_por_id($json[$p]['id']);


//echo $json[$p]['filtro'];

foreach($json as $ak=>$av){
    
    if($av['filtro']==$json[$p]['filtro']){
       $relacionados[] = $av;
    }
}

/*
echo "<pre>";
print_r($relacionados);
echo "</pre>";
*/

?>

<!DOCTYPE html>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->


        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
        <script src="https://www.mercadopago.com/v2/security.js" view="item"></script>
        <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="../css/app.css">
        <meta name="description" content="">
    
        <meta property="og:url"           content="" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="" />
        <meta property="og:description"   content="" />
        <meta property="og:image"         content="" />
    </head>
    <body>
        <?php include_once "../templates/top_nav.php";?>
        
        <div class="row no-gutters mt-5 pt-5 nimbus-reg">
            <div class="col-md-2 col-12 mt-5">
                <h6 class="ml-md-5">Sub categor&iacute;as</h6>
                <ul class="ml-md-5">
                    <li>
                        <h6>
                            <a data-toggle="collapse" href="#accesorios" role="button" aria-expanded="false" aria-controls="collapseExample">Accesorios</a>
                        </h6>
                        <div class="collapse" id="accesorios" >
                            <h6 class="ml-4"><a href="">Bandas El&aacute;sticas</a></h6>
                            <h6 class="ml-4"><a href="">Colchonetas</a></h6>
                        </div>
                    </li>
                    <!--<li><h6><small><a href="">TOPS, TEES & BLOUSES</a></small></h6></li>
                    <li><h6><small><a href="">SWEATERS</a></small></h6></li>
                    <li><h6><small><a href="">FASHION HOODIES & SWEATSHIRTS</a></small></h6></li>
                    <li><h6><small><a href="">JEANS</a></small></h6></li>-->
                </ul>
                <!--<div class="ml-md-5 mt-md-4">
                    <h6>Filtros</h6>
                    <div class="my-md-3">
                        <form class="form-inline my-2 my-lg-0">
                            <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-info my-2 my-sm-0" type="submit"><i class="fa fa-search"></i></button>
                        </form>
                    </div>    
                </div>-->
                <!--<div class="ml-md-5 mt-md-4">
                    <h6>Condiciones</h6>
                    <div class="my-md-3">
                        <form class="needs-validation" novalidate>
                            <div class="col-auto my-1">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">Nuevo</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">Usado</label>
                                </div>
                            </div>
                        </form>    
                    </div>    
                </div>-->
                <!--<div class="ml-md-5 mt-md-4">
                    <h6>Precios</h6>
                    <div class="my-md-3">
                        <form class="needs-validation" novalidate>
                            <div class="col-auto my-1">
                                <div class="custom-control custom-radio mr-sm-2">
                                  <input type="radio" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">Hasta $1000</label>
                                </div>
                                <div class="custom-control custom-radio mr-sm-2">
                                  <input type="radio" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">M&aacute; de $1000</label>
                                </div>
                            </div>
                        </form>    
                    </div>    
                </div>-->
                <!--<div class="ml-md-5 mt-md-4">
                    <h6>Talles</h6>
                    <div class="my-md-3">
                        <form class="needs-validation" novalidate>
                            <div class="col-auto my-1">
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">XS</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">S</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">M</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">L</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">XL</label>
                                </div>
                                <div class="custom-control custom-checkbox mr-sm-2">
                                  <input type="checkbox" class="custom-control-input" id="customControlAutosizing">
                                  <label class="custom-control-label" for="customControlAutosizing">XXL</label>
                                </div>
                            </div>
                        </form>    
                    </div>    
                </div>-->
            </div>
            <div class="col-md-10 col-12 ml-auto mr-auto px-md-1 px-1">
                <div class="row no-gutters justify-content-end">
                    <div class="col-12">
                       <h6 class="py-3"><span class="text-fitness-c">Art&iacute;culos</span></h6>
                    </div>
                    <!--<div class="col-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                            </ul>
                        </nav> 
                    </div>-->
                </div>
                
                
                <div class="row row-cols-2 row-cols-md-4 no-gutters text-fitness-c px-md-1 px-1">
                     <?php foreach($relacionados as $k=>$v){
                     ?>

                    <a href="producto/?id=<?php echo $v['id'];?>" style="text-decoration:none" title="">
                     <div class="col mb-4">
                       <div class="card card-trick-destacados border-0 p-md-1">
                           <div class="disfraz-destacados one-edge-shadow">
                               <img src="<?php echo $v['img'][0];?>" class="productos-destacados-img one-edge-shadow" alt="<?php echo $v['nombre'];?>">
                           </div>
                           <div class="card-body">
                           <h6 class="card-title text-center text-secondary"><?php echo $v['nombre'];?></h6>
                           <h5 class="card-title text-center text-secondary">$<?php echo $v['precio'][0];?></h5>

                         </div>
                       </div>
                     </div>
                    </a> 
                    <?php } ?>
                </div>
                <!--<div class="row no-gutters justify-content-end">
                     <div class="col-12">
                       <h6 class="py-3"><span class="text-fitness-c"></span></h6>
                    </div>
                    <div class="col-6">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination">
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                </a>
                              </li>
                              <li class="page-item"><a class="page-link" href="#">1</a></li>
                              <li class="page-item"><a class="page-link" href="#">2</a></li>
                              <li class="page-item"><a class="page-link" href="#">3</a></li>
                              <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                </a>
                              </li>
                            </ul>
                        </nav> 
                    </div>
                </div>-->
            </div>
        </div>
        
        
    
        
        
        <script src="../js/head.js"></script>
        <script src="../js/aparece.js"></script>
        <script src="../js/parallax.js"></script>
        <script src="../js/runAll.js"></script>
        <script src="../js/ajax_carrito.js"></script>
        <script src="../js/jquery-3.4.1.slim.min.js"></script>
        <script src="../js/popper.min.js"></script>
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/contact.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://kit.fontawesome.com/b0a7bbf264.js" async></script>
        
       
        
    </body>
</html>







   
        
    