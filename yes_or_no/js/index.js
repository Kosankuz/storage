$(document).ready(function(){

  $("#no").hide();
  $("#yes").hide();


function determineOdd(num){
  return num % 2;};


function randomize(){
return Math.floor((Math.random() * Math.floor(12)) * 21 );

}

var odd = 0;
var even = 0;
var answers = ['']


$("#button").click(function(){


  var MyNumber = randomize();
  if (determineOdd(MyNumber) == 0) {


      $("#no").hide();
      $("#yes").show();
      odd++;
      $("#odd").html(odd);
  } else {
    $("#no").show();
    $("#yes").hide();
    even++;
    $("#even").html(even);
  }
  $("#output").html(MyNumber);
});

});
