<?php
session_start();
//session_destroy();
error_reporting(E_ALL);
if (isset($_SESSION['articulos'])) {
  $articulos = $_SESSION['articulos'];
  //print_r($_SESSION['articulos']);
}

if (require __DIR__ .  '../../vendor/autoload.php'){
   // echo "estamos con el vendor";
}else{
   // echo "no estamos con el vendor";
}


MercadoPago\SDK::setAccessToken('APP_USR-6317427424180639-042414-47e969706991d3a442922b0702a0da44-469485398');
// PRUEBO CON MIS CREDENCIALES // TEST-8252776030650874-042714-9a05714165150fd297fa432441698541-25246282
//MercadoPago\SDK::setAccessToken('APP_USR-8252776030650874-042714-cb683313524ab9048313c14b8096a521-25246282');
MercadoPago\SDK::setIntegratorId("dev_a0c4acb0b23111eaa3110242ac130004");


$nombre = filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_SPECIAL_CHARS);
$apellido = filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_SPECIAL_CHARS);
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$cod_area = filter_input(INPUT_POST, 'cod_area', FILTER_SANITIZE_SPECIAL_CHARS);
$telefono = filter_input(INPUT_POST, 'telefono', FILTER_SANITIZE_SPECIAL_CHARS);
$calle = filter_input(INPUT_POST, 'calle', FILTER_SANITIZE_SPECIAL_CHARS);
$calle_num = filter_input(INPUT_POST, 'calle_num', FILTER_SANITIZE_SPECIAL_CHARS);
$cp = filter_input(INPUT_POST, 'cp', FILTER_SANITIZE_SPECIAL_CHARS);

$preference = new MercadoPago\Preference();

//echo "hago el forech";
foreach($_SESSION['articulos'] as $ak=>$av){
    
    $item = new MercadoPago\Item();
    
    $item->id = $av['item_id'];
    $item->title = $av['item_nombre'];
    $item->quantity = $av['item_cantidad'];
    $item->currency_id = "ARS";
    $item->unit_price = $av['item_precio'];
    $item->description = $av['item_filtro'];
    $item->picture_url = $av['item_img'];
    
    $pedidos [] = $item;
    
}
$preference->items = $pedidos;

/*
echo "<pre>";
print_r($pedidos);
echo "</pre>";
*/

//echo "debajo del print_r";
$preference->items = $pedidos;
//echo "debajo del preferencias->";

$payer = new MercadoPago\Payer();
$payer->name = $nombre;
$payer->surname = $apellido;
$payer->email = "test_user_63274575@testuser.com";
$payer->phone = array(
  "area_code" => $cod_area,
  "number" => $telefono
);
$payer->address = array(
  "street_name" => $calle,
  "street_number" => $calle_num,
  "zip_code" => $cp
);
$preference->payer = $payer;
$preference->external_reference = "defelicerafael@gmail.com";

$preference->back_urls = array(
    "success" => "https://maccingames.com.ar/shop/checkout/success.php",
    "failure" => "https://maccingames.com.ar/shop/checkout/failure.php",
    "pending" => "https://maccingames.com.ar/shop/checkout/pending.php"
);
$preference->auto_return = "approved";
$preference->notification_url = "https://maccingames.com.ar/shop/checkout/ipn.php";

$preference->save();

?>
<script> 
setTimeout (window.location="<?php echo $preference->init_point;?>",2000);
</script>

<!DOCTYPE html>
<html>
    <head>
        <!-- Global site tag (gtag.js) - Google Analytics -->


        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="https://secure.mlstatic.com/sdk/javascript/v1/mercadopago.js"></script>
        <script src="https://www.mercadopago.com/v2/security.js" view="home"></script>
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
    
        
       
        
    </body>
</html>
