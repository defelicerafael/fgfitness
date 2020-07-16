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
$item_id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_SPECIAL_CHARS);
//traigo el json...
$string = file_get_contents("../productos.json");
if ($string === false) {
    echo "No pudimos traer el archivo...";
}
$json = json_decode($string, true);
$p = array_search($item_id, array_column($json, 'id'));

//print_r($json[$p]);
//echo $json[$p]['item_id'];
//echo $carro->cantidad_por_item_id($json[$p]['id']);
//echo $json[$p]['item_filtro'];

foreach($json as $ak=>$av){
    if($av['categoria']==$json[$p]['categoria']){
       $relacionados[] = $av;
    }
}
$variante = $json[$p]['variante'][0];


/*
echo "<pre>";
print_r($variante);
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
        <?php include_once "../templates/product-page.php";?>
        <?php include_once "../templates/product-description.php";?>
        <?php include_once "../templates/productos-relacionados.php";?>
        
        
    
        
        
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
        
        <!--<script>
        $(document).ready(function(){
          // Add smooth scrolling to all links
          $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if ((this.hash !== "")&&(this.hash !== "#carousel-example")) {
              // Prevent default anchor click behavior
              event.preventDefault();

              // Store hash
              var hash = this.hash;

              // Using jQuery's animate() method to add smooth page scroll
              // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
              $('html, body').animate({
                scrollTop: $(hash).offset().top}, 800, function(){

                // Add hash (#) to URL when done scrolling (default click behavior)
                window.location.hash = hash;
              });
            } // End if
          });
        });
        </script>-->
        
    </body>
</html>
