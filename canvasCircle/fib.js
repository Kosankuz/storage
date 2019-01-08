function initCanvas(){
  var context = document.getElementById('canvas').getContext('2d');
  context.canvas.addEventListener('mousemove', function(event) {
   var mouseX = event.clientX - context.canvas.offsetLeft;
   var mouseY = event.clientY - context.canvas.offsetTop;


   context.beginPath();
   context.clearRect(0, 0, canvas.width, canvas.height);
   context.arc(mouseX,mouseY,15, 0 , Math.PI * 2);
   context.closePath();
   context.stroke();

  //var status = document.getElementById('status');
   //status.innerHTML = mouseX+ " "+mouseY;

 });
   context.canvas.addEventListener('click', function(event) {
     var mouseX = event.clientX - context.canvas.offsetLeft;
     var mouseY = event.clientY - context.canvas.offsetTop;
     context.fillRect(mouseX,mouseY, 10, 10);
})}
window.addEventListener('load', function(event) {
initCanvas();
});
