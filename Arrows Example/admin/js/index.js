

$(document).ready(function(){

  var tokenPrice = 100,
  stage1 = 50,
  stage2 = 30,
  stage3 = 20,
  stage4 = 0;
  $("#tokenPrice").text(tokenPrice);
  $("#stage1pct").text(stage1 +"%");
  $("#stage2pct").text(stage2 +"%");
  $("#stage3pct").text(stage3 +"%");
  $("#stage4pct").text(stage4 +"%");

$("li").click(function(){
  var currentArrow;
  if (confirm("Are you sure you want to change percent?") == true ){
    $("li").removeClass("current not-currnet");
    $(this).addClass("current");
    currentArrow = $(this).find("span").attr('id');
    sendData(currentArrow);
  } else {
    return;
  }
});

function sendData(arrowId){
 var postArray = [arrowId];
  $.post('../php/db_write.php', {
        data: postArray
  }, function(response) {
  console.log(response);
  });
  }

});
