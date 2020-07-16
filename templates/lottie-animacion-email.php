<div style="width:100px;height:100px" id="animation_lottie"></div>    
<script src="https://cdnjs.cloudflare.com/ajax/libs/bodymovin/5.6.10/lottie.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/lottie-web/5.6.10/lottie.min.js" type="text/javascript"></script>
<script>
    
  var animation = lottie.loadAnimation({
  container: document.getElementById('animation_lottie'), // the dom element that will contain the animation
  renderer: 'svg',
  loop: false,
  autoplay: false,
  path: '../lottie/18781-email-sent-by-todd-rocheford.json',
  name:'envio_email'// the path to the animation json
});
animation.setSpeed(0.7); 
//animation.play('envio_email');


</script>  