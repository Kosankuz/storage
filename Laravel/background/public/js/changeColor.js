function change(){
var palitra = ['red','blue','pink','black','orange'];

//var color = Math.floor(random(0,palitra.length));
//console.log(Math.floor(color));
//document.body.style.backgroundColor = palitra[color];

document.body.style.backgroundColor = randomColor();

}

function randomColor(){
  var max = 0xffffff;
     return '#' + Math.round( Math.random() * max ).toString( 16 );
}
