<?php
session_start();
error_reporting(E_ALL);
include_once 'server/class_carrito.php';
$carro = new Carrito;
$cuantos_productos =  $carro->cuantos_articulos();



// AGARRO EL ID POR GET
$item_id = filter_input(INPUT_GET, 'item_id', FILTER_SANITIZE_SPECIAL_CHARS);
//traigo el json...
$string = file_get_contents("productos.json");
if ($string === false) {
    echo "No pudimos trtaer el archivo...";
}
$json = json_decode($string, true);
$cantidad = count($json);
?>
<!DOCTYPE html>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->


        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
        <script src="https://www.mercadopago.com/v2/security.js" view="home"></script>
        <script src="js/jquery-3.4.1.slim.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>    
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/app.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
        <meta name="description" content="">
    
        <meta property="og:url"           content="" />
        <meta property="og:type"          content="website" />
        <meta property="og:title"         content="" />
        <meta property="og:description"   content="" />
        <meta property="og:image"         content="" />
    </head>
    <body>
         

        <?php include_once "templates/top_nav_new.php";?>
        <?php include_once "templates/categorias.html";?>
        <?php //include_once "templates/mas-vendidos.php";?>
        <?php include_once "templates/filtros.php";?>
        <?php include_once "templates/carrousel.php";?>
        <?php include_once "templates/empresa.php";?>
       
      
        <?php include_once "templates/contact.html";?>
        
            <a href="https://api.whatsapp.com/send?phone=5491136203918&text=Hola%21%20Quisiera%20m%C3%A1s%20informaci%C3%B3n%20sobre%20FGFTINESS%20." class="wap" target="_blank">
                <i class="fa fa-whatsapp wap-float"></i>
            </a>
        <?php include_once "templates/footer.html";?>
        
    
        
        
        <script src="js/head.js"></script>
        <script src="js/aparece.js"></script>
        <script src="js/parallax.js"></script>
        <script src="js/runAll.js"></script>
        <script src="js/filter.js"></script>
        <script src="js/ajax_carrito.js"></script>
        
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/contact.js"></script>
        <script src="js/lazysizes.min.js"></script>
        
        <script src="https://kit.fontawesome.com/b0a7bbf264.js" async></script>
        
       <script>
        $(document).ready(function(){
          // Add smooth scrolling to all links
          $("a").on('click', function(event) {

            // Make sure this.hash has a value before overriding default behavior
            if ((this.hash === "#categorias")|| (this.hash === "#productos") || (this.hash === "#contacto")){
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
        </script>
        
    </body>
</html>
