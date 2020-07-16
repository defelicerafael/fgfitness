<div id="productos"></div>
<h2 class="p-5 text-center"> <span class="text-fitness">PRODUCTOS DESTACADOS</span></h2>

<div class="row row-cols-1 row-cols-md-3 no-gutters mx-md-5 mx-2">
    <?php
        for($i=0;$i<$cantidad;$i++){
    ?>
    <div class="col mb-4 filtros <?php echo $json[$i]['filtro'];?> show p-md-3 p-1">
    <div class="card card-trick border-dblue">
        <form id="form" action="producto/" method="GET">
            <div class="disfraz">
                <img src="<?php echo $json[$i]['img'];?>" class="productos-img" alt="<?php echo $json[$i]['nombre'];?>">
            </div>
            <div class="card-body">
                <h6 class="card-title text-center font-weight-bold"><span class="text-fitness-c"><?php echo $json[$i]['nombre'];?></span></h6>
            <h6 class="card-title text-center text-secondary text-uppercase nimbus-reg"><?php echo $json[$i]['variantes'];?></h6>
            <hr>
            <h5 class="card-title text-center font-weight-bold text-uppercase nimbus-reg">$<?php echo $json[$i]['precio'];?></h5>
                <input type="hidden" name="id" value="<?php echo $json[$i]['id'];?>"/>
                <div class="text-center my-3">
                    <button type="button" class="btn btn-blue btn-sm one-edge-shadow" onclick="carrito.enviarCarro(<?php echo $json[$i]['id'];?>);">
                        <span class="px-2">
                            <img src="img/icon/shopping_cart-white-18dp.svg" alt="" title="">
                            <span class="px-1 nimbus-reg">Agregar</span>
                        </span>
                    </button>
                    <button type="submit" class="btn btn-light btn-sm one-edge-shadow">
                        <span class="px-2">
                            <img src="img/icon/info-black-18dp.svg" alt="" title="">
                            <span class="px-1 nimbus-reg">Detalles</span>
                        </span>
                    </button>
                </div>
            </div>
        </form>
    </div>
  </div>
  <?php
        }
  ?>      
</div>
        
    