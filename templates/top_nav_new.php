
<div id="home" class="home mb-1 row no-gutters">
    <nav class="navbar fixed-bottom  d-md-none d-block">
        <span class="float-right bg-light p-2 rounded">
            <a role="button" href="carro-de-compras/" style="text-decoration: none;" id="senialB">
                <span class="badge badge-danger" id="bagde_carrito_button">&nbsp; <?php echo $carro->cuantos_articulos();?> &nbsp;</span>
                <img src="img/icon/shopping_cart-black-24dp.svg" alt="" title="">
            </a>
        </span>
    </nav>  
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="topnav">
        <a class="navbar-brand text-white nimbus" href="#home">
            <span id="logo-top-nav">
              FG FITNESS
              <!-- <img src="img/home/leblon-logo-trans.png" style="height: 75px; width: auto; margin-left: 5px;" id="foto-head" alt="" title=""/>-->
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-end mr-5" id="navbarNavDropdown">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item carrito_on nimbus" id="senial">
                    <a role="button" href="carro-de-compras/" style="text-decoration: none;">
                        <span class="badge badge-danger" id="bagde_carrito">&nbsp; <?php echo $carro->cuantos_articulos();?> &nbsp;</span>
                        <img src="img/icon/shopping_cart-white-24dp.svg" alt="" title="" id="icono_shopping">
                    </a>
                  
                </li>
                <li class="nav-item">
                   <a class="link mx-2" href="#categorias">CATEGOR&Iacute;AS</a>
                </li>
                <li class="nav-item">
                   <a class="link mx-2" href="#productos">PRODUCTOS</a>
                </li>
                <li class="nav-item">
                   <a class="link mx-2" href="#contacto">CONTACTO</a>
                </li>
            </ul>
         </div>   
    </nav>
    <div class="hero-image">
        <div class="hero-text">
            <img src="img/home/logo-600-t.png" title="" alt=""/>
            <h4 class="text-white m-1">LOS MEJORES ART&Iacute;CULOS DE FITNESS<br/> PARA TU ENTRENAMIENTO PERSONAL<br/>
                O TU GIMNASIO</h4>
        </div>
    </div>
</div>
    
    