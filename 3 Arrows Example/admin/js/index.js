$(document).ready(function(){
checkDate()

var typeOfSale;
$("#PrivateSale").click(function(){
  var startDate = $("#startPrivateSale").val(),
      endDate =   $("#endPrivateSale").val();
      typeOfSale = "PrivateSale";
  saveDate(startDate,endDate,typeOfSale);
  //console.log(startDate +"and"+ endDate);
});

$("#PreSale").click(function(){
  var startDate = $("#startPreSale").val(),
      endDate =   $("#endPreSale").val();
      typeOfSale = "PreSale";
  saveDate(startDate,endDate,typeOfSale);
  //console.log(startDate +"and"+ endDate);
});

$("#PublicSale").click(function(){
  var startDate = $("#startPublicSale").val(),
      endDate =   $("#endPublicSale").val();
      typeOfSale = "PublicSale";
  saveDate(startDate,endDate,typeOfSale);
  //console.log(startDate +"and"+ endDate);
});

//updating MySQL database with new start and end dates

function saveDate(typeOfSale,startDate,endDate){
   var postArray = [typeOfSale,startDate,endDate];
    $.post('../php/db_write.php', {
          data: postArray
    }, function(response) {
    console.log(response);
    });
}

//checking dates

function checkDate(){
   var check = ["check"];
    $.post('../php/db_read.php', {
          data: check
    }, function(response) {
    var arr = JSON.parse(response);
    console.log(arr[0][0]);

      $("#startPrivateSale").val(arr[0][0][1]);
      $("#endPrivateSale").val(arr[0][0][2]);

      $("#startPreSale").val(arr[0][1][1]);
      $("#endPreSale").val(arr[0][1][2]);

      $("#startPublicSale").val(arr[0][2][1]);
      $("#endPublicSale").val(arr[0][2][2]);

  });
  }

});
