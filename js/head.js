var headjs = (function(){
    
    var scrollFunction, top,logo,link,icono_shopping;
    
    top = document.getElementById("topnav");
    logo = document.getElementById("logo-top-nav");
    link = document.getElementsByClassName("link");
    icono_shopping = document.getElementById("icono_shopping");
    
    scrollFunction = function () {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
       
        logo.style.width = "150px";
        logo.style.color = "black";
        top.style.backgroundColor = "rgba(255, 255, 255, 1)";
        icono_shopping.src = "img/icon/shopping_cart-black-24dp.svg";
        
        
        for (i = 0; i < link.length; i++) {
            link[i].style.color = "black";
           
        }
        
        
      } else {
       
        logo.style.width = "200px";
        logo.style.color = "white";
        top.style.backgroundColor = "rgba(0, 0, 0, 0.3)";
        icono_shopping.src = "img/icon/shopping_cart-white-24dp.svg";
       
       
        
        var i;
        for (i = 0; i < link.length; i++) {
            link[i].style.color = "white";
           
        }
            
        
       
      }
    };
    
    
    return{
        navScroll : function(){
          scrollFunction();  
        }
    };
})();

