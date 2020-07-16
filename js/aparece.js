var aparecejs = (function(){
    
    var html, elementoAparece,topVent,apareceL,apareceR;
    
    html = document.getElementsByTagName("html")[0];
    elementoAparece = document.getElementsByClassName("aparece");
    
    
    document.addEventListener('scroll',function(){
        topVent = html.scrollTop;
        
        for(i=0; i < elementoAparece.length; i++){
            var topelement = elementoAparece[i].offsetTop;
            if(topVent > topelement - 600){
               elementoAparece[i].style.opacity = "1";
               elementoAparece[i].style.marginTop = "0px";
            }
        }
        
    });
})();
