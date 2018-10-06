function getLogin(name){
  var http = new XMLHttpRequest();
  var url = './php/admin_log.php';


  var params = 'login=' + name;
  http.open('POST', url, true);

  //Send the proper header information along with the request
  http.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');

  http.onreadystatechange = function() {//Call a function when the state changes.
      if(http.readyState == 4 && http.status == 200) {
          document.getElementById('logs-form').innerHTML = http.responseText;

      }
  }
  http.send(params);
  $("#users-form").hide();$("#reg-form").hide();$("#logs-form").show();
}
