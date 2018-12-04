$(document).ready(function(){
  $("#output").hide();
  var answers = ['It is certain.','It is decidedly so.','Without a doubt.','Yes - definitely.','You may rely on it.','As I see it, yes.','Most likely.','Outlook good.','Yes.','Signs point to yes.','Reply hazy, try again','Ask again later.','Better not tell you now.','Cannot predict now.','Concentrate and ask again.','Dont count on it.',' My reply is no.','My sources say no.','Outlook not so good.','Very doubtful.'];

//function determineOdd(num){
//  return num % 2;
//};
function randomize(number){
return Math.floor((Math.random(number) * Math.floor(20)) * 1 );
}
$("#button").click(function(){
  var x = 35;
  var MyNumber = randomize(answers.length);
  $("#output").html(answers[MyNumber]);
  $("#output").fadeIn();

  var interval = setInterval(function(){
  x++;

  var height = x + 'px';
  $("#output").css('margin-top', height);
  //$("#output2").html(x); // Random number display . Array index
if (x > 84 ){
  clearInterval(interval);
}
},30)

window.setTimeout(function(){
    $("#output").fadeOut();
  },2700)
});
});
