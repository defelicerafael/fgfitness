var contacto = (function(){
    //console.log("entre");
    
    var name,email,telefono,textarea,btn_enviar,btnEnviando;
    
    name = document.getElementById("name_");
    email = document.getElementById("email_");
    telefono = document.getElementById("telefono_");
    textarea =  document.getElementById("textarea");
   
    btn_enviar = document.getElementById("btn_enviar");
    btnEnviando = document.getElementById("btnEnviando");
    
    //console.log(textarea.value);
    
    enviar = function() {
        //console.log("entre a la funcion");
        document.getElementById("btnEnviando").style.display = "block";
        document.getElementById("btn_enviar").style.display = "none";
        
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
          if (this.readyState === 4 && this.status === 200) {
           //document.getElementById("loader").style.display = "none";
            document.getElementById("formulario").style.display = "none";
            document.getElementById("resultado").innerHTML = this.responseText;
           // alert(this.responseText);
            console.log(this.responseText);
            
          }
        };
        xhttp.open("POST", "contact/send.php", true);
        xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        xhttp.send("nombre="+name.value+"&email="+email.value+"&telefono="+telefono.value+"&comentario="+textarea.value);
       
    };
    
    
    return{
        enviarEmail : function(){
          enviar();  
        }
    };
})();

