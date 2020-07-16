//MANEJANDO EL ACTVE DEL MENU
 
window.onload = function(){
//console.log("js ok");
var menuActive = window.location.pathname;   
var menu = {};
//var consultas = {};
var i;
var json = {};
var jsonLength = 0;
var txt = [];
var resumen = [];
//var loadingNews = document.getElementById("loadingNoticias");
//loadingNews.style.display = "block";


menu.nunez = document.getElementById("nunez");
menu.uruguay = document.getElementById("uruguay");    
menu.sanmiguel = document.getElementById("sanmiguel");
menu.boulogne = document.getElementById("boulogne");
menu.inicio = document.getElementById("inicio");
menu.quieneSomos = document.getElementById("nunez-quienes-somos");
menu.page = document.getElementsByClassName("breadcrumb-item active");
//console.log(menu.page);


//console.log(menuActive);

//TODO ESTO ES UNA FUNCION 'ASYNC'// PARA QUE EL DOM ESTE DISPONIBLE

function fibo(n,text) {
   if(n)
    for(var x=0;x<n.length;x++){
        n[x].innerHTML = text; 
    }
};

async function getFibo(n,text) {
  var f = await new Promise(function(resolve) {
     setTimeout(function() { resolve(fibo(n,text)) }, 2000)    
  });
  //console.log(n.length);
};



menu.active = function (){
    
    if(menuActive==="/"){
        menu.inicio.classList.add("active");
        menu.boulogne.classList.remove("active");
        menu.nunez.classList.remove("active");
       // menu.uruguay.classList.remove("active");
        menu.sanmiguel.classList.remove("active");
       // menu.quieneSomos.style.display="none";
        
    }
    
    if(menuActive==="/nunez.html"){
        menu.nunez.classList.add("active");
    //    menu.uruguay.classList.remove("active");
        menu.sanmiguel.classList.remove("active");
        menu.boulogne.classList.remove("active");
        menu.inicio.classList.remove("active");
       //getFibo(document.getElementsByClassName("breadcrumb-item active"),"Nu&ntilde;ez");
    }
    if(menuActive==="/uruguay.html"){
   //     menu.uruguay.classList.add("active");
        menu.sanmiguel.classList.remove("active");
        menu.boulogne.classList.remove("active");
        menu.inicio.classList.remove("active");
        menu.nunez.classList.remove("active");
      //getFibo(document.getElementsByClassName("breadcrumb-item active"),"Uruguay");
        
    }
    if(menuActive==="/san-miguel.html"){
        menu.sanmiguel.classList.add("active");
        menu.boulogne.classList.remove("active");
        menu.inicio.classList.remove("active");
        menu.nunez.classList.remove("active");
    //    menu.uruguay.classList.remove("active");
      //  getFibo(document.getElementsByClassName("breadcrumb-item active"),"San Miguel");
        //menu.page.innerHTML = "San Miguel";
       /* for(var x=0;x<document.getElementsByClassName("breadcrumb-item active").length;x++){
          document.getElementsByClassName("breadcrumb-item active")[x].innerHTML = "San Miguel"; 
        }*/
    }
    if(menuActive==="/boulogne.html"){
        menu.boulogne.classList.add("active");
        menu.inicio.classList.remove("active");
        menu.nunez.classList.remove("active");
     //   menu.uruguay.classList.remove("active");
        menu.sanmiguel.classList.remove("active");
      //  getFibo(document.getElementsByClassName("breadcrumb-item active"),"Boulogne");
        //menu.page.innerHTML = "Boulogne"; 
       /* for(var x=0;x<document.getElementsByClassName("breadcrumb-item active").length;x++){
          document.getElementsByClassName("breadcrumb-item active")[x].innerHTML = "Boulogne"; 
        }*/
    }
    
};
//setTimeout(function() { resolve(menu.active()) }, 2000)   
//menu.active();
//

async function getMenu() {
  var f = await new Promise(function(resolve) {
     setTimeout(function() { resolve(menu.active) }, 2000)    
  });
  //console.log(n.length);
};


function showHint(str) {
   // console.log("entre a show");
  if (str.length === 0) {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState === 4 && this.status === 200) {
        json = JSON.parse(this.responseText);
       // console.log(json);
        jsonLength = JSON.parse(this.responseText).length;
        
            for (i = 0;i < jsonLength; i++){
                if(json[i].texto.length > 69){
                  //  console.log(json[i].texto.length+": es mas largo");
                    resumen[i] =json[i].texto.slice(0,70)+'...';
                }else{
                   resumen[i] = json[i].texto;
                 //   console.log(json[i].texto.length+":es mas corto");
                }
            txt[i] = '';
                txt[i]+= '<div class="col-lg-3 mb-3 card border-light p-2 m-3">';
                txt[i]+= '<div class="card-header">';
                txt[i]+= json[i].categoria;
                txt[i]+= '</div>';
                txt[i]+='   <img style="width: 100%; height: 140px;  object-fit: cover; " class="card-img-top" src="'+json[i].img+'" alt="" role="img" aria-label="Placeholder: 140x140" />';
                txt[i]+='       <div class="card-body">';
                txt[i]+='           <h4 class="card-title">'+json[i].titulo+'</h4>';
                txt[i]+='           <p class="card-text flex-fill">'+resumen[i]+'</p>';
                txt[i]+=        '</div>';
                txt[i]+=         '<div class="card-footer bg-transparent text-center">'
                txt[i]+=            '<a class="btn btn-light" href="noticias/'+json[i].nombreLink+'.php" role="button">ir a la noticia</a>';
                txt[i]+=        '</div>';
                txt[i]+= '</div>';
            };
                for (i = 0;i < txt.length; i++){
                document.getElementById("noticias").innerHTML += txt[i];
                    if (document.getElementById("loadingNoticias")){
                        document.getElementById("loadingNoticias").style.visibility = "hidden";
                    }
                }
  
      }
    };
    xmlhttp.open("GET", "/server/traerCosas.php?"+str, true);
    xmlhttp.send();
  }
}
//console.log(menuActive);
//consultas.noticias = showHint("tabla=noticias&mostrar=si&orderBy=id&number=9999&order=DESC");
if ((menuActive==="/") || (menuActive==="/index.html")){
   // console.log("entro");
    setTimeout(showHint, 2500,"tabla=noticias&mostrar=si&orderBy=id&number=6&order=DESC");
};



};
