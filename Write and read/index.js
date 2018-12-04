
document.getElementById('write').addEventListener('click' , function(){ // Слушаем  событие нажатие кнопки
  var bonusAmount = document.getElementById('bonusInput').value;
  var enabledValue = document.getElementById('enabledInput').value;
  var status = { bonus : bonusAmount, enabled: enabledValue};
  $.post('write.php' , status);    // jquery post method
});

document.getElementById('read').addEventListener('click', function(){
$.ajax({url:'test.txt',success: function(result){  // делаем запрос и запрасываем фаил

  var data = JSON.parse(result); // преобращование в массив JSON тк дата с сервера возрашается как строка
  $("#bonusOutput").val(data['bonus']); // выводим
  $("#enabledOutpu").val(data['enabled']); // выводим
} });

});
