
$(document).ready(function(){

checkDate();

  function checkDate(){
     var check = ["check"];
      $.post('../php/db_read.php', {
            data: check
      }, function(response) {
      var arr = JSON.parse(response);

        $("#privateStartDate").html(arr[0][0][1]);
        $("#privateEndDate").html(arr[0][0][2]);

        $("#preStartDate").html(arr[0][1][1]);
        $("#preEndDate").html(arr[0][1][2]);

        $("#publicStartDate").html(arr[0][2][1]);
        $("#publicEndDate").html(arr[0][2][2]);

        if(Date.now()>= Date.parse(arr[0][0][1]) && Date.now()<= Date.parse(arr[0][0][2])) {
            $(".stage1pct").addClass('current');
        }
        if(Date.now()>= Date.parse(arr[0][1][1]) && Date.now()<= Date.parse(arr[0][1][2])) {
            $(".stage2pct").addClass('current');
        }
        if(Date.now()>= Date.parse(arr[0][2][1]) && Date.now()<= Date.parse(arr[0][2][2])) {
            $(".stage3pct").addClass('current');
        }

    });
    }

});
