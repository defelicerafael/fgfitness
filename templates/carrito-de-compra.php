<div id="categorias" class="py-5"></div>
<h2 class="text-center shadow-sm bg-light py-3"><span class="text-fitness">Carro de compras</span></h2>

<div class="row no-gutters ml-auto mr-auto px-md-5 px-2 text-fitness-c">
    <div class="col-lg-8 col-md-8 col-12">
        <div class="card mb-3 w-100 shadow">
            <h4 class="p-3">Art&iacute;culos: <?php echo $carro->cuantos_articulos();?></h4>
            <?php
                
                for($i=0;$i<count($articulos);$i++){
            ?>
            <div class="row no-gutters">
                <div class="col-md-4 col-6">
                    <img src="<?php echo $articulos[$i]['item_img'];?>" class="w-100  px-5 rounded" alt="...">
                </div>
                <div class="col-md-6 col-6">
                    <div class="card-body">
                        <h5 class="card-title text-md-left text-center"><?php echo $articulos[$i]['item_nombre'];?></h5>
                        <h6 class="card-title text-md-left text-center text-secondary"><?php echo $articulos[$i]['item_filtro'];?></h6>
                        <p class="card-text text-md-left text-center"><small class="text-muted"><?php if($articulos[$i]['item_variante']!='undefined'){ echo $articulos[$i]['item_variante'];}?></small></p>
                        <button type="button" class="text-center ml-3 btn btn-light btn-sm one-edge-shadow" onclick="carrito.quitarCarro(<?php echo $i;?>);">
                            <span class="px-2">
                                <img src="../img/icon/delete-black-18dp.svg" alt="" title="">
                                <span class="px-1">Quitar Item <?php //echo $articulos[$i]['id'];?></span>
                            </span>
                        </button>
                    </div>
                </div>
                <div class="col-md-2 col-12">
                    <div class="card-body text-md-left text-center p-2">
                        <div class="btn-group border rounded mb-5 " role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light px-3" onclick="carrito.QuitarC(<?php echo $i;?>,'item_cantidad_<?php echo $i;?>');">-</button>
                                <button type="button" class="btn ">
                                    <span id="item_cantidad_<?php echo $i;?>"><?php echo $articulos[$i]['item_cantidad'];?></span>
                                </button>
                                <button type="button" class="btn btn-light px-3" onclick="carrito.AgregarC(<?php echo $i;?>,'item_cantidad_<?php echo $i;?>');">+</button>
                        </div>
                        
                        <?php
                        $total[$i] = str_replace("$", "", $articulos[$i]['item_precio']) * number_format($articulos[$i]['item_cantidad']);
                        
                        ?>
                        <div>
                            <h5 class="card-title text-center font-weight-bold" id="carrito_total">$<?php echo $total[$i];?></h5>
                        </div>
                    </div>    
                </div>
            </div>
            <hr class="w-75 mx-auto d-block">
            <?php 
                }
            ?>
            
        </div>
          
    </div>
    <div class="col-lg-4 col-md-4 col-12 pl-md-4 text-left">
        <div class="card  shadow">
            <div class="card-body">
                <h5 class="card-title">El costo total de:</h5>
                <div class="row">
                    <div class="col-8">
                        <p class="card-text text-secondary">Total en pesos.</p>
                        <p class="card-text text-secondary">Envios.</p>
                    </div>
                    <div class="col-4">
                        <h5 class="card-text">$<?php echo array_sum($total) ;?></h5>
                        <h6 class="card-text text-center"><small>Con Cargo</small></h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-8">
                        <p class="card-text text-secondary">Total con impuestos.</p>
                      
                    </div>
                    <div class="col-4">
                       
                        <h5 class="card-text">$<?php echo array_sum($total) ;?></h5>
                    </div>
                </div>
                
                <a href="../checkout/" class="btn btn-blue w-100 mt-5">Pagar la compra</a>
            </div>
        </div>
        <div class="p-2 shadow">
            <h5 class="text-center p-2">Pag&aacute; con tu tarjeta de cr&eacute;dito o d&eacute;bito</h5>
            <img src="../img/home/tarjetas.jpg" alt="" title="" class="w-100 mx-auto d-block">
        </div>  
    </div>
</div>
  