var carrito = (function(){
    //console.log("entre");
    
    var agregar_carro,bagde_carrito,senial,bagde_carrito_button,senialB,insertNew,item_cantidad,precio_producto,update;
    
    bagde_carrito = document.getElementById("bagde_carrito");
    bagde_carrito_button = document.getElementById("bagde_carrito_button");
    senial = document.getElementById("senial");
    senialB = document.getElementById("senialB");
    item_cantidad = document.getElementById("item_cantidad");
    senial.classList.remove("carrito_on");
    precio_producto = document.getElementById("precio_producto");
    
    
    agregar_carro = function(id) {
     //   console.log(id);
        senial.classList.remove("carrito_on");
        senial.offsetWidth;
        senialB.classList.remove("carrito_on");
        senialB.offsetWidth;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            
            console.log(this.responseText);
            senial.classList.add("carrito_on");
            senialB.classList.add("carrito_on");
            document.getElementById("bagde_carrito").innerHTML = this.responseText;
            document.getElementById("bagde_carrito_button").innerHTML = this.responseText;
            //location.reload();
          }
        };
        xhttp.open("POST", "server/agregar_articulo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    };
    
    // AGREGAR POR ITEM ID //
    agregar_item_por_item_id = function(id) {
      //  console.log(id);
        senial.classList.remove("carrito_on");
        senial.offsetWidth;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            document.getElementById("bagde_carrito").innerHTML = this.responseText;
           // console.log(this.responseText);
            senial.classList.add("carrito_on");
            location.reload();
          }
        };
        xhttp.open("POST", "../server/agregrar_por_item_id.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    };
    
    quitar_item_por_item_id = function(id) {
      //  console.log(id);
        senial.classList.remove("carrito_on");
        senial.offsetWidth;
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            document.getElementById("bagde_carrito").innerHTML = this.responseText;
           // console.log(this.responseText);
            senial.classList.add("carrito_on");
            location.reload();
          }
        };
        xhttp.open("POST", "../server/quitar_por_item_id.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    };
    
    
    quitar_carro = function(id) {
        //console.log(id);
        senial.classList.remove("carrito_on");
        senial.offsetWidth;
    //console.log(id);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            document.getElementById("bagde_carrito").innerHTML = this.responseText;
            senial.classList.add("carrito_on");
           // console.log(this.responseText);
            location.reload();
          }
        };
        xhttp.open("POST", "../server/quitar_articulo.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id);
    };
    
    update =  function(id,cantidad){
     
        senial.classList.remove("carrito_on");
        senial.offsetWidth;
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            document.getElementById("bagde_carrito").innerHTML = this.responseText;
            senial.classList.add("carrito_on");
            console.log(this.responseText);
            location.reload();
          }
        };
        xhttp.open("POST", "../server/updateNew.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("id="+id+"&cantidad="+cantidad);
    };
    
    
    insertNew = function(id,redi){
        //console.log(id,redi);
        senial.classList.remove("carrito_on");
        senial.offsetWidth;
        var variante;
        var cantidad = document.getElementById("item_cantidad").innerHTML;
        var color = document.getElementById("color");
        var intensidad = document.getElementById("intensidad");
        var precio_producto = document.getElementById("precio_producto");
        
        
        
        if(color){
           variante = color.value;
           if(variante === 'NO'){
               alert("Debe selecciona un Color...");
               return;
           }
        }
        if(intensidad){
            variante = intensidad.value;
            if(variante === 'NO'){
               alert("Debe selecciona una Intensidad...");
               return;
           }
        }
        var precio = precio_producto.innerHTML;
        //console.log(cantidad,id,variante,precio_producto.innerHTML);
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
            console.log(this.responseText);
            document.getElementById("bagde_carrito").innerHTML = this.responseText;
            senial.classList.add("carrito_on");
            //console.log(typeof redi);
            if(typeof redi === 'undefined'){
                //console.log('undefined es...');
            }else{
                //console.log(redi);
                setTimeout(function(){ location.href = redi; }, 2000);
                     
            }
            //location.reload();
          }
        };
        xhttp.open("POST", "../server/insertNew.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
       // console.log("id="+id+"&cantidad="+cantidad+"&variante="+variante+"&precio="+precio);
        xhttp.send("id="+id+"&cantidad="+cantidad+"&variante="+variante+"&precio="+precio);
    };
    
    var agregar = function(id){
            
        //console.log(id);
        if(typeof id !=='undefined'){
            item_cantidad = document.getElementById(id);
            var n = new Number(item_cantidad.innerHTML);
            n = n+1;
            item_cantidad.innerHTML = n; 
        }else{
           // console.log(item_cantidad.innerHTML);
            var n = new Number(item_cantidad.innerHTML);
            n = n+1;
            item_cantidad.innerHTML = n; 
        }
    };
    
    var agregarC = function(id_cookie,id){
        console.log(id);
        if(typeof id !=='undefined'){
            item_cantidad = document.getElementById(id);
            var n = new Number(item_cantidad.innerHTML);
            n = n+1;
            item_cantidad.innerHTML = n;
            update(id_cookie,n);
        }
    };
    
    var quitarC = function(id_cookie,id){
        console.log(id);
        if(typeof id !=='undefined'){
            item_cantidad = document.getElementById(id);
            console.log(item_cantidad.innerHTML);
            var n = new Number(item_cantidad.innerHTML);
            if(n>1){
                n = n-1;
                item_cantidad.innerHTML = n;
                update(id_cookie,n);
            }else{
                return;
            }
        }
    };
    
      
    
    var quitar = function(id){
        console.log(id);
        if(typeof id !=='undefined'){
            item_cantidad = document.getElementById(id);
            console.log(item_cantidad.innerHTML);
            var n = new Number(item_cantidad.innerHTML);
            if(n>1){
                n = n-1;
                item_cantidad.innerHTML = n;
                
            }else{
                return;
            }
        }else{
            console.log(item_cantidad.innerHTML);
            var n = new Number(item_cantidad.innerHTML);
            if(n>1){
                n = n-1;
                item_cantidad.innerHTML = n; 
            }else{
                return;
            }
        }
        
    };
    
    return{
        enviarCarro : function(id){
          agregar_carro(id);  
        },
        quitarCarro : function(id){
          quitar_carro(id);  
        },
        agregarItemId : function(id){
          agregar_item_por_item_id(id);  
        },
        quitarItemId : function(id){
          quitar_item_por_item_id(id);  
        },
        Agregar : function(id){
          agregar(id);  
        },
        Quitar : function(id){
          quitar(id);  
        },
        InsertNew : function(id,redi){
            insertNew(id,redi);
        },
        AgregarC : function(id_cookie,id){
          agregarC(id_cookie,id);  
        },
        QuitarC : function(id_cookie,id){
          quitarC(id_cookie,id);  
        }
        
    };
})();

