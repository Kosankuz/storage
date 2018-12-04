$(document).ready(function() {
  $('.removeBtn').click(function(){
    var id = this.id;
    var idNum = id.replace( /^\D+/g, '');
    var elementId = $("#"+idNum+" ").find('input')[0].id;
    var elementId1 = $("#"+idNum+" ").find('input')[1].id;
    var whichBonus = $("#"+elementId+"").val();
    var whichBonus1 = $("#"+elementId1+"").val();


sendData(whichBonus,whichBonus1);
location.reload();

})

function sendData(whichBonus,whichBonus1) {
var remove = '';
var postArray = [remove,whichBonus,whichBonus1];
  $.post('/php/remove.php', {
    data: postArray
  }, function(response) {
    console.log(response);
  });

}

});
