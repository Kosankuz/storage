$(document).ready(function() {
	$('#addButton').click(function(){
		var id = '';
		var bonus_pct = $('#bonus').val();
		var bonus_amount = $('#amount').val();
    var postArray = [bonus_pct, bonus_amount];

var sendData = function(reloadPage) {
  $.post('/php/db_write.php', {
    data: postArray
  }, function(response) {
    console.log(response);
  });

	reloadPage(location.reload());
}
sendData();

})


});
