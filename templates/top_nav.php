<div id="home" class="mb-1 row no-gutters">
    <nav class="navbar fixed-top navbar-expand-lg navbar-light" id="topnav-p">
        <a class="navbar-brand text-white" href="#home">
            <span id="logo-top-nav-p">
              FG FITNESS
              <!-- <img src="img/home/leblon-logo-trans.png" style="height: 75px; width: auto; margin-left: 5px;" id="foto-head" alt="" title=""/>-->
            </span>
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-md-end mr-5" id="navbarNavDropdown">
            <ul class="navbar-nav mt-2 mt-lg-0">
                <li class="nav-item carrito_on" id="senial">
                    <a role="button" href="../carro-de-compras/" style="text-decoration: none;">
                        <span class="badge badge-danger" id="bagde_carrito">&nbsp; <?php echo $carro->cuantos_articulos();?> &nbsp;</span>
                        <img src="../img/icon/shopping_cart-black-24dp.svg" alt="" title="" id="img">
                    </a>
                  
                </li>
                <li class="nav-item">
                   <a class="link-p mx-2" href="../">HOME</a>
                </li>
                <!--<li class="nav-item">
                   <a class="link-p mx-2" href="#leblon">PAGAR</a>
                </li>-->
                
            </ul>
         </div>   
    </nav>
    
</div>
    
    