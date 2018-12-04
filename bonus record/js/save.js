$(document).ready(function() {

  $('.saveBtn').click(function(){

    var id = this.id;
    var idNum = id.replace( /^\D+/g, '');

    var elementId = $("#"+idNum+" ").find('span')[0].id;

    var whichBonus = $("#"+elementId+"").html();

    var bonus_pct = $('#bonus_pct'+idNum+'').val();

    var bonus_amount = $('#bonus_amount'+idNum+'').val();

    var postArray = [whichBonus,bonus_pct, bonus_amount];

    var sendData = function() {
    $.post('/php/save.php', {
      data: postArray
    }, function(response) {

     console.log(response);
    });
    }
    sendData();
    location.reload();

})

});
