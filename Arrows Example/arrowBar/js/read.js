
function readDb(){
  $.ajax({url:'../php/db_read.php',success: function(result){   // делаем запрос и запрашиваем фаил
      var obj = JSON.parse(result);
     for (var i = 0; i < obj[0].length; i++) {
       if(obj[0][i][2]==1){
         $('li').removeClass("current");
       $("."+obj[0][i][1]+"").addClass("current");

       }
     }

  }})

  }

  readDb();
