
function inputRange(){
  var x = document.getElementById("inputRange").value;
   document.getElementById("pbar").style.width = ''+x+'%';
    document.getElementById("pbar").innerHTML = ''+x+'%';
}


function checkConfigUser(){


  $.ajax({url:'/php/db_user.php',success: function(result){                                            // делаем запрос и запрашиваем фаил
      var data = JSON.parse(result); // преобразование в массив JSON тк данные с сервера возрашается как строка
         for (var i = 0; i < data[0].length; i++) {
           var width = data.reduce(function(collector, currentValue ,currentIndex, array, y) {
             y = i - 1;
               if (i == 0){
              return collector;
              }else{
                return (currentValue[i][0]) - currentValue[y][0] ;
              }
           }, data[0][0][0]);
              showLog(data[0][i][0],data[0][i][1],width)
          };
    }})


  }
        var id = 0;
        function  showLog(bonus_pctDisplay,amount,width){
        id++;
        createDivBonusPct   (id,"text-right remove",'<span id="bonus_pctSpan" " class="">'+bonus_pctDisplay+'%</span>',width);
        createDivBonusAmount(id,"text-right remove",'<span id="bonus_amount"  " class="">'+amount+'&nbsp &nbsp</span>',width);
          }
      function createDivBonusPct(id,classname,data,width){
          var div = document.createElement('div');
          div.setAttribute('id', id);
          div.setAttribute('class',classname);
          div.setAttribute('style','width:'+width+'%;');
          div.innerHTML = data;
          document.getElementById('bonus_pct').appendChild(div);
        }
        function createDivBonusAmount(id,classname,data,width){
          var div = document.createElement('div');
          div.setAttribute('id', id);
          div.setAttribute('class',classname);
          div.setAttribute('style','width:'+width+'%;');
          div.innerHTML = data;
          document.getElementById('bonus_amount').appendChild(div);
        }
