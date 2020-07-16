<div id="categorias" class="py-5"></div>
<h2 class="text-center shadow-sm bg-light py-3"><span class="text-fitness">Realizar la compra</span></h2>

<div class="row no-gutters ml-auto mr-auto px-md-5 px-2 text-fitness-c">
    <div class="col-lg-8 col-md-8 col-12 order-2 order-md-1">
        <div class="card mb-3 w-100 shadow">
            <h4 class="p-3">Ingrese sus datos</h4>
            
            <div class="row no-gutters p-5">
                <form action="comprar.php" method="POST">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputName">Nombre</label>
                        <input type="text" class="form-control" id="inputName" required>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="inputApellido">Apellido</label>
                        <input type="text" class="form-control" id="inputApellido" required>
                      </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                          <label for="inputEmail">Email</label>
                          <input type="email" class="form-control" id="inputEmail" required>
                        </div>
                        <div class="form-group col-md-2">
                          <label for="inputCodigo">Cod. &aacute;rea</label>
                          <input type="text" class="form-control" id="inputCodigo" required>
                        </div>
                        <div class="form-group col-md-4">
                          <label for="inputTelefono">Tel&eacute;fono</label>
                          <input type="text" class="form-control" id="inputTelefono" required>
                        </div>
                    </div>    
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label for="inputCalle">Calle</label>
                        <input type="text" class="form-control" id="inputCalle">
                      </div>
                      <div class="form-group col-md-4">
                            <label for="inputNumCalle">N&uacute;mero</label>
                            <input type="text" class="form-control" id="inputNumCalle">
                      </div>
                      <div class="form-group col-md-2">
                        <label for="inputCp">CP</label>
                        <input type="text" class="form-control" id="inputCp">
                      </div>
                    </div>
                    <button type="submit" class="btn btn-blue w-100 mt-5">Siguiente</button>
                </form>   
            </div>
        </div>
        <div class="p-5 shadow">
            <h5 class="text-center p-2">Pag&aacute; con tu tarjeta de cr&eacute;dito o d&eacute;bito</h5>
            <img src="../img/home/tarjetas.jpg" alt="" title="" class="w-75 mx-auto d-block">
        </div>    
    </div>
    <div class="col-lg-4 col-md-4 col-12 pl-md-4 text-left order-1 order-md-2">
        <div class="card  shadow">
            <div class="card-body">
                <!--<h5 class="card-title">El costo total de:</h5>-->
                <div class="row">
                    <table class="table table-striped">
                        <thead>
                          <tr>
                            <th scope="col">ART&Iacute;CULO</th>
                            <th scope="col">PRECIO</th>
                          </tr>
                        </thead>
                        <tbody>
                            
                        <?php 
                        $articulos = $_SESSION['articulos'];
                        for($i=0;$i<count($articulos);$i++)
                        {
                        ?>
                        <tr>
                            <th scope="row"><small><?php echo $articulos[$i]['item_nombre'];?>  <?php if($articulos[$i]['item_variante']!='undefined'){ echo " - ".$articulos[$i]['item_variante'];}?></small></th>
                            <td><small class="text-center"><?php echo $articulos[$i]['item_cantidad'];?> x <?php echo $articulos[$i]['item_precio'];?></small></td>
                        </tr>
                        
                        <?php  
                        $total[$i] = str_replace("$", "", $articulos[$i]['item_precio']) * number_format($articulos[$i]['item_cantidad']);
                        } 
                        ?>
                            
                        </tbody>
                    </table>
                </div>
                
                    
                
                    <hr>
                 <div class="row">   
                    <div class="col-8">
                        <p class="card-text text-secondary">TOTAL.</p>
                        <p class="card-text text-secondary">Envios.</p>
                    </div>
                    <div class="col-4">
                        <h5 class="card-text text-center">$<?php echo array_sum($total);?></h5>
                        <h6 class="card-text text-center"><small>Con Cargo</small></h6>
                    </div>
                </div>
                <hr>
                <div class="row">
                    <div class="col-8">
                        <p class="card-text text-secondary">Total con impuestos.</p>
                    </div>
                    <div class="col-4">
                        <h5 class="card-text">$<?php echo array_sum($total);?></h5>
                    </div>
                </div>
                
              <!--<a href="#" class="btn btn-primary w-100 mt-5">Pagar la compra</a>-->
            </div>
        </div>
    </div>
</div>
  