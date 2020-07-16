
<div id="categorias" class="py-5"></div>
<h2 class="text-center shadow-sm bg-light py-3"><span class="text-fitness"><?php echo $json[$p]['nombre'];?></span></h2>

<div class="row no-gutters ml-auto mr-auto px-md-5 px-2 text-fitness-c">
    <div class="col-md-6 col-12">
        <div id="carouselExampleIndicators" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <?php
                    for($i=0;$i<count($json[$p]['img']);$i++){
                ?>
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="<?php if($i==0){echo "active";}?>"></li>
                <?php
                    }
                ?>
            </ol>
            <div class="carousel-inner">
                <?php
                    for($i=0;$i<count($json[$p]['img']);$i++){
                ?>
                <div class="carousel-item <?php if($i==0){echo "active";}?>">
                    <img src="<?php echo $json[$p]['img'][$i];?>" class="w-100  px-5 rounded" alt="...">
                </div>
                <?php
                    }
                ?>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev" >
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
        </div>
        
    </div>   
    <div class="col-12 col-md-6">
        <div class="card mb-3 w-100 shadow">
            
                <div class="card-body">
                    <h5 class="card-title text-left"><?php echo $json[$p]['nombre'];?></h5>
                    <h6 class="card-title text-left text-secondary text-uppercase"><?php echo $json[$p]['detalle'];?></h6>
                    <h5 class="card-title text-left font-weight-bold" id="precio_producto">$<?php echo $json[$p]['precio'][0];?></h5>
                    <p class="card-text"><small class="text-muted"><?php echo $json[$p]['description'];?></small></p>
                    
                    <div class="row no-gutters">
                        <div class="col-12">
                            <table class="table text-left">
                                <?php
                                    foreach($variante as $k=>$v){
                                        if(($k=="color")||($k=="intensidad")){
                                ?>
                                <tr>
                                    <td><?php echo $k;?>:</td>
                                    <td>
                                        <select name="variante" class="form-control form-control-sm" id="<?php echo $k;?>" onchange="stockChecked(<?php echo $json[$p]['id'];?>,this.id,this.value);">
                                                <option value="NO">Elige una opci&oacute;n</option>
                                            <?php
                                            for($i=0;$i<count($v);$i++){
                                            ?>
                                                <option class="card-title text-left text-secondary"><?php echo $v[$i];?></option>
                                            <?php
                                            }
                                            ?>
                                            </select>
                                    </td>
                                </tr>
                                <?php
                                    }
                                }
                                ?>
                            </table>
                        </div>    
                        <!--<div class="col-12">
                            <h6 class="card-title text-left">Disponibles: <span id="stock"></span></h6>
                        </div>-->
                        <div class="col-9">
                            
                           
                        </div>
                            
                    </div>
                    <hr>
                    <div class="row no-gutters">
                        <div class="col-md-4 col-12 text-md-left text-center">
                            <h6 class="text-secondary "> Cantidad </h6>
                            <div class="btn-group border rounded mb-5 " role="group" aria-label="Basic example">
                                <button type="button" class="btn btn-light px-3" onclick="carrito.Quitar();">-</button>
                                <button type="button" class="btn ">
                                    <span id="item_cantidad">1</span>
                                </button>
                                <button type="button" class="btn btn-light px-3" onclick="carrito.Agregar();">+</button>
                            </div>
                        </div>
                        <!--<div class="col-md-8 col-12 text-md-left text-center">
                            <h6 class="text-secondary "> Tama&ntilde;o </h6>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                <label class="form-check-label px-md-2 text-secondary" for="inlineRadio1">SMALL</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                <label class="form-check-label px-md-2 text-secondary" for="inlineRadio2">MEDIUM</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio3" value="option3">
                                <label class="form-check-label px-md-2 text-secondary" for="inlineRadio3">LARGE</label>
                            </div>
                        </div>-->
                    </div>
                    <div class="row no-gutters align-items-end justify-content-between">
                        
                        <div class="col-6">
                            <button role="button" class="btn btn-light btn-sm one-edge-shadow" onclick="carrito.InsertNew(<?php echo $json[$p]['id'];?>);">
                                <div style="width:80px;height:80px" id="animation_lottie"></div>
                            </button>
                            
                        </div>
                        <div class="col-6 text-right">
                            <a href="../carro-de-compras/" role="button" class="btn btn-primary btn-sm one-edge-shadow">
                                <span class="px-2">
                                    <img src="../img/icon/shopping_cart-white-18dp.svg" alt="" title="">
                                    <span class="px-1">Ver carrito</span>
                                </span>
                            </a>
                        </div>
                    </div>    
                </div>
             
        </div>    
    </div>
</div>

<script>

    var productos;
    var stockChecked = function (num,item_id,item_value) {
        //console.log(item_value);
        if(item_value === 'NO'){
            //console.log('SI');
            document.getElementById('stock').innerHTML = '';
            return;
        }else{
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
              if (this.readyState === 4 && this.status === 200) {
                    productos = JSON.parse(this.responseText);

                    var p = productos.find(function(v,i){
                       
                        if(v.id == num){
                            v.variante.find(function(vv,vi){
                              // console.log(vv,vi);
                                // VARIANTE DE COLOR
                                if (typeof vv.color !=='undefined'){
                                    vv.color.find(function(vvc,vic){
                                        //console.log(vvc,vic,vv.disponibles[vic],item_value);
                                        if(vvc === item_value){
                                           // console.log(vvc,vic);
                                            document.getElementById('stock').innerHTML = vv.disponibles[vic];
                                        }
                                    });
                                }
                                // VARIANTE DE DISPONIBLES
                                if (typeof vv.intensidad !=='undefined'){
                                    vv.intensidad.find(function(vvc,vic){
                                        //console.log(vvc,vic);
                                        if(vvc === item_value){
                                           // console.log(vvc,item_value,vv.precio[vic]);
                                            document.getElementById('precio_producto').innerHTML ="$"+ vv.precio[vic];
                                        }
                                    });
                                }
                            });

                        }

                    });

                //
              }
            };
        }
        //ACA LLAMO AL ARCHIVO O A LA BASE DE DATOS!
        xhttp.open("GET", "../productos.json", true);
        xhttp.send();
    };
    
    
</script>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.6.10/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.6.10/lottie.min.js" type="text/javascript"></script>
<script>

  var animation = lottie.loadAnimation({
  container: document.getElementById('animation_lottie'), // the dom element that will contain the animation
  renderer: 'svg',
  loop: true,
  autoplay: false,
  path: '../lottie/5631-added-to-cart.json' // the path to the animation json
});

animation.autoplay = true;
animation.setSpeed(0.7); 

</script>   
      
    