<div class="col-12 py-5 ml-auto mr-auto px-md-5 px-2">
    <ul class="nav nav-pills nav-fill justify-content-center text-fitness-c">
        <li class="nav-item">
          <a class="nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Descripci&oacute;n</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Env&iacute;o y entrega</a>
        </li>
        <!--<li class="nav-item">
          <a class="nav-link" id="nav-contact-tab" data-toggle="tab" href="#nav-contact" role="tab" aria-controls="nav-contact" aria-selected="false">Contacto</a>
        </li>-->
    </ul>

    <div class="tab-content text-fitness-c" id="nav-tabContent">
        <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
            <div class="p-4">
                <h6 class="card-title text-left text-secondary"><?php echo $json[$p]['nombre'];?></h6>
                <h6 class="card-title text-left text-secondary text-uppercase"><?php echo $json[$p]['detalle'];?></h6>
                <h6 class="card-title text-left text-secondary">$<?php echo $json[$p]['precio'];?></h6>
                <p class="card-text"><?php echo $json[$p]['description'];?></p>
            </div>
        </div>
        <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
            <div class="p-4">
                <h4 class="text-left">Informaci&oacute;n Adicional</h4>
                <h5 class="card-title text-left text-secondary">Peso:</h5>
                <h5 class="card-title text-left text-secondary">Dimensiones:</h5>
            </div>
        </div>
        <!--<div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab">CONTACT</div>-->
    </div>
</div>
    


   
        
    