var compra = (function(){
    
  //  console.log("entre");
    var nombre,email,carta_nombre,fecha,horario,pais,provincia,ciudad,formadepago;
    var profiletab,compra,datos,hometab,botonmercadopago,cbu,tamano;
    var boton_mercadopago,pagar,celular,data_modelo,data_elemento,data_color,separo,url;
    var hoja,precio,marco;
    var precios_mercadopago = [];
    
    url = window.location.href;
    separo = url.slice(url.indexOf("?")+1).split('&');
    data_modelo = separo[0].slice(separo[0].indexOf("=")+1);
    data_elemento = separo[1].slice(separo[1].indexOf("=")+1);
    data_color = separo[2].slice(separo[2].indexOf("=")+1);
    
    var data = {};
    var precios = [];
    
    //MODIFICA PRECIOS PERO NO LINKS POR FAVOR
    
    precios[0] = 2000;
    precios[1] = 2350;
    precios[2] = 1500;
    precios[3] = 1850;
    
    precios_mercadopago[0] = "https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=25246282-356336d7-6e20-48b9-bcea-87321881a9da";
    precios_mercadopago[1] = "https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=25246282-c165df42-fec0-405f-b4fb-c9ad9c0c3872";
    precios_mercadopago[2] = "https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=25246282-4eae5627-d90e-40ba-af8e-23d15bebe6b7";
    precios_mercadopago[3] = "https://www.mercadopago.com.ar/checkout/v1/redirect?pref_id=25246282-b42f1c1a-7c46-4cc9-8b5f-8bedc6e7a460";
    
    
    
    nombre = document.getElementById("nombre");
    email = document.getElementById("email");
    carta_nombre = document.getElementById("carta_nombre");
    fecha = document.getElementById("fecha");
    horario = document.getElementById("horario");
    pais = document.getElementById("pais");
    provincia = document.getElementById("provincia");
    ciudad = document.getElementById("ciudad");
    formadepago = document.getElementById("formadepago");
    celular = document.getElementById("celular");
    compra = document.getElementById("compra");
    datos = document.getElementById("datos");
    
    hometab = document.getElementById("hometab");
    profiletab = document.getElementById("profiletab");
    //profiletab.classList.add("nav-link active");
    botonmercadopago = document.getElementById("botonmercadopago");
    cbu = document.getElementById("cbu");
    //contraentrega = document.getElementById("contraentrega");
    
    tamano = document.getElementById("tamano");
    precio = document.getElementById("precio");
    
    boton_mercadopago = document.getElementById("boton_mercadopago");
    // aca le pongo display none a los pedidos//
    botonmercadopago.style.display = "none";
    cbu.style.display = "none";
    //contraentrega.style.display = "none";
    
    marco = document.getElementById("marco");
    
    var comprarcarta = function(){
       // console.log(fecha.value,horario.value);
        // SACO EL DISABLED DE PROFILE Y LE PONG ACTIVE
        profiletab.classList.remove("disabled");
        profiletab.classList.add("active");
        profiletab.getAttributeNode("aria-selected").value = "true";
        
        // SACO EL ACTIVE DE HOME
        hometab.classList.remove("active");
        hometab.getAttributeNode("aria-selected").value = "false";
        
        // PONGO SHOW ACTIVE
        compra.classList.add("show","active");
        
        
        // SACO EN DATOS SHOW ACTIVE
        datos.classList.remove("show","active");
        
        
  
        
  //  guardar(data);
    };
    
    
    // CHEQUEO LOS MODELOS Y LOS PRECIOS --CONFIGURACIÓN por asi decirlo
    
     hoja = function(){
         if(tamano.value === "a4"){
          
            if(data_modelo === 'estrellas'){
                precio.innerHTML = "$"+precios[2];
                boton_mercadopago.innerHTML = "$"+precios[2];
                boton_mercadopago.href = precios_mercadopago[2];  
            }
            if(data_modelo ==='acrab'){
                precio.innerHTML = "$"+precios[0];
                boton_mercadopago.innerHTML = "$"+precios[0];
                boton_mercadopago.href = precios_mercadopago[0];
            }
            if(data_modelo ==='antares'){
                precio.innerHTML = "$"+precios[0];
                boton_mercadopago.innerHTML = "$"+precios[0];
                boton_mercadopago.href = precios_mercadopago[0];
            }
                
         }
         if(tamano.value === "a3"){
            
             if(data_modelo === 'estrellas'){
                  precio.innerHTML = "$"+precios[3];
                  boton_mercadopago.innerHTML = "$"+precios[3];
                  boton_mercadopago.href = precios_mercadopago[3];  
              }
              if(data_modelo ==='acrab'){
                  precio.innerHTML = "$"+precios[1];
                  boton_mercadopago.innerHTML = "$"+precios[1];
                  boton_mercadopago.href = precios_mercadopago[1];
              }
              if(data_modelo ==='antares'){
                  precio.innerHTML = "$"+precios[1];
                  boton_mercadopago.innerHTML = "$"+precios[1];
                  boton_mercadopago.href = precios_mercadopago[1];
              }
         }
     };
    
    
    changeFormaDePago = function(){
     //   console.log(formadepago.value);
        if(formadepago.value === 'mercadopago'){
          botonmercadopago.style.display = "block";
          cbu.style.display = "none";
          //contraentrega.style.display = "none";
        }
        if(formadepago.value === 'cbu'){
          botonmercadopago.style.display = "none";
          cbu.style.display = "block";
         // contraentrega.style.display = "none";
        }
        if(formadepago.value === 'efectivo'){
          botonmercadopago.style.display = "none";
          cbu.style.display = "none";
         // contraentrega.style.display = "block";
        }
    };
    
    
    
    pagar = function(){
              
        //CARGO LOS VALORES //
    data.nombre = nombre.value;
    data.email = email.value;
    data.carta_natal_nombre = carta_nombre.value;
    data.nacimiento = fecha.value;
    data.hora = horario.value;
    data.pais = pais.value;
    data.provincia = provincia.value;
    data.ciudad = ciudad.value;
    data.forma_de_pago = formadepago.value;
    
        var url = window.location.href;
        var separo = url.slice(url.indexOf("?")+1).split('&');
        var data_modelo = separo[0].slice(separo[0].indexOf("=")+1);
        var data_elemento = separo[1].slice(separo[1].indexOf("=")+1);
        var data_color = separo[2].slice(separo[2].indexOf("=")+1);
   
    data.modelo = data_modelo;
    data.elemento = data_elemento;
    data.color = data_color;
    data.tamano = tamano.value;
    data.marco = marco.value; 
    data.precio = precio.innerHTML;
    data.celular =  celular.value;   
   // console.log(data);
    guardar(data);
    };
    
    
    
    
    guardar = function(data) {
       // console.log(data);
        var d = JSON.stringify(data);
        //console.log(d);
        
      //  document.getElementById("loader").style.display = "block";
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
          document.getElementById("resultado").innerHTML = this.responseText;
          console.log(this.responseText);
            setTimeout (
                    function(){window.location="http://plouton.com.ar/";
            }, 6000); //tiempo expresado en milisegundos  
          }
        };
        xhttp.open("POST", "server/pedido.php", true);
        xhttp.setRequestHeader("Content-type", "application/json;charset=UTF-8");
        xhttp.send(d);
    };
    
    
    
    
    return{
        compra : function(){
          comprarcarta();  
        },
        changeF : function(){
          changeFormaDePago();  
        },
        verhoja : function(){
          hoja();  
        },
        pagar : function(){
          pagar();  
        }
        
    };
})();

