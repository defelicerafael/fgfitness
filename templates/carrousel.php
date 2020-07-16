<?php
$fotos[0] ="img/fg-fitness-pesas.jpg";
$fotos[1] ="img/fg-fitness-maquinas.jpg";
$fotos[2] ="img/fg-fitness-correr.jpg";
$fotos[3] ="img/fg-fitness-mujer.jpg";
$fotos[4] ="img/fg-fitness-boxeo.jpg";
$fotos[5] ="img/fg-fitness-correr-2.jpg";

$m[0] ="img/mobile-box.jpg";
$m[1] ="img/mobile-chica.jpg";
$m[2] ="img/mobile-correr-2.jpg";
$m[3] ="img/mobile-pesas.jpg";
$m[4] ="img/mobile-travesia.jpg";
$m[5] ="img/mobile-correr.jpg";


$frase[0] = "No cuentes los días, haz que los días cuenten. Es una sola!";
$frase[1] = "Entrenar es disfrutar, no aflojes, que es una sola";
$frase[2] = "Es una sola! Entrenala!";
$frase[3] = "No cuentes los días, haz que los días cuenten. Es una sola!";
$frase[4] = "Entrenar es disfrutar, no aflojes, que es una sola";
$frase[5] = "Es una sola! Entrenala!";

?>
<div id="carouselExampleControls" class="carousel slide carousel-fade" data-ride="carousel">
    
    <div class="carousel-inner">
        <?php
            for($i=0;$i<count($fotos);$i++){
                echo count($fotos);
        ?>
        <div class="carousel-item <?php if($i==0){echo "active";}?>">
          
            <picture>
                <source media="(max-width:600px)" srcset="<?php echo $m[$i];?>">
                <img src="<?php echo $fotos[$i];?>" class="d-block w-100" alt="fg-fitness">
            </picture>
            <div class="carousel-caption d-none d-md-block" style="background-color:rgba(0,0,0,0.5);">
                <h5><span class="text-fitness-white">FG FITNESS</span></h5>
                <p class="text-uppercase"><?php echo utf8_encode($frase[$i]);?></p>
            </div>
        </div>
        <?php
            }
        ?>
        
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
</div>