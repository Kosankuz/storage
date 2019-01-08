
function showRecord(){
  $.ajax({url:'/php/db_read.php',success: function(result){   // делаем запрос и запрашиваем фаил
      var obj = JSON.parse(result);
      for (var i = 0; i < obj[0].length; i++) {
             showLog(obj[0][i][0],obj[0][i][1],obj[0][i][2]);
    }}})

  }

showRecord();
  var id = 0;
  function  showLog(recId,bonus_pct,bonus_amount){
  id++;

    createTr( id, "");
    createTd(id,"tableSmallFont text-center",'<span id="recId'+ id +'" style="font-size:0">'+recId+'</span>');
    createTd( id,"tableSmallFont text-center",'<input class="form-control" type="text" id="bonus_pct'+ id +'" value="' + bonus_pct + '" >  </input>' );
    createTd( id,"tableSmallFont text-center",'<input class="form-control" type="text" id="bonus_amount'+ id +'" value="' + bonus_amount + '" ></input>' );
    createTd( id,"tableSmallFont text-center",'<button id="saveBtn'+ id +'" type="button" name="button" class="btn btn-sm btn-primary saveBtn" style="background-color:#00BEA3;margin-bottom: 10px;width: auto; font-size:13px; ">Save</button>');
    createTd( id,"tableSmallFont text-center",'<button id="removeBtn'+ id +'" type="button" name="button" class="btn btn-sm btn-primary removeBtn" style="background-color:#00BEA3;margin-bottom: 10px;width: auto; font-size:13px; ">Remove</button>');

    }

  function createTr(id,classname){
  var tr = document.createElement('tr');
  tr.setAttribute('id', id);
  tr.setAttribute('class', classname);
  document.getElementById('tbody').appendChild(tr);
  }

  function createTd(id,classname,data){
    var td = document.createElement('td');
    td.setAttribute('id', id);
    td.setAttribute('class',classname);
    td.setAttribute('scope',"col");
    td.setAttribute('scope',"row");
    td.innerHTML = data;
    document.getElementById(id).appendChild(td);
  }
