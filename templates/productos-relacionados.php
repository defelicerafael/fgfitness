<div class="col-12 ml-auto mr-auto px-md-5 px-2">
    <h2 class="text-center shadow-sm bg-light py-3"><span class="text-fitness">Productos relacionados</span></h2>
   <div class="row row-cols-1 row-cols-md-4 no-gutters mx-md-5 mx-2 text-fitness-c">
        <?php foreach($relacionados as $k=>$v){
        ?>
       
       <a href="?id=<?php echo $v['id'];?>" style="text-decoration:none" title="">
        <div class="col mb-4">
          <div class="card card-trick-destacados border-0">
              <div class="disfraz-destacados one-edge-shadow">
                  <img src="<?php echo $v['img'];?>" class="productos-destacados-img one-edge-shadow" alt="<?php echo $v['nombre'];?>">
              </div>
              <div class="card-body">
              <h6 class="card-title text-center text-secondary"><?php echo $v['nombre'];?></h6>
              <h5 class="card-title text-center text-secondary">$<?php echo $v['precio'];?></h5>

            </div>
          </div>
        </div>
       </a> 
       <?php } ?>
    </div>
</div>


   
        
    