var parallax = (function(){
    
    var y,scrollFunction2,fader,p,b;
    y = document.getElementById("heroText");
    p = document.getElementById("parallax");
    
   /* window.onscroll = function() {
        scrollFunction2();
       
    };*/
   
    scrollFunction2 = function () {
      if (document.body.scrollTop > 80 || document.documentElement.scrollTop > 80) {
        fader = 1 - document.documentElement.scrollTop * 0.002;
       // console.log(fader);
        y.style.opacity = fader;
        b = -100 + document.documentElement.scrollTop/4;
        p.style.backgroundPosition = "0px "+b+"px";
                
      } else {
            fader = 1;
            y.style.opacity = fader;
            b = -100 + document.documentElement.scrollTop/4;
            p.style.backgroundPosition = "0px "+b+"px";
       }
    };
    
    
    return{
        parallax :  function(){
            scrollFunction2();
       }   
    };
})();

