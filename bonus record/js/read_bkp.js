function showRecord(str) {
  if (str == "") {
        //document.getElementById("queryOutput").innerHTML = "";
        return;
    } else {
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {

        var obj = JSON.parse(this.responseText);
        obj = obj[0].sort();
        for (var i = 0; i < obj.length; i++) {
               showLog(obj[i][0],obj[i][1],obj[i][2]);
  }}};
        xmlhttp.open("GET","../php/db_read.php?q="+str,true);
        xmlhttp.send();
    }
}
showRecord();
  var id = 0;
  function  showLog(recId,bonus_pct,bonus_amount){
  id++;


    createTr( id, "");
    createTd(id,name,"tableSmallFont text-center",'<span id="recId'+ id +'" style="font-size:0">'+recId+'</span>');
    createTd( id,name,"tableSmallFont text-center",'<input class="form-control" type="text" id="bonus_pct'+ id +'" value="' + bonus_pct + '" >  </input>' );
    createTd( id,name,"tableSmallFont text-center",'<input class="form-control" type="text" id="bonus_amount'+ id +'" value="' + bonus_amount + '" ></input>' );
    createTd( id,name,"tableSmallFont text-center",'<button id="saveBtn'+ id +'" type="button" name="button" class="btn btn-sm btn-primary saveBtn" style="background-color:#00BEA3;margin-bottom: 10px;width: auto; font-size:13px; ">Save</button>');
    createTd( id,name,"tableSmallFont text-center",'<button id="removeBtn'+ id +'" type="button" name="button" class="btn btn-sm btn-primary removeBtn" style="background-color:#00BEA3;margin-bottom: 10px;width: auto; font-size:13px; ">Remove</button>');

    }

  function createTr(id,classname){
  var tr = document.createElement('tr');
  tr.setAttribute('id', id);
  tr.setAttribute('class', classname);
  document.getElementById('tbody').appendChild(tr);
  }

  function createTd(id,name,classname,data){
    var td = document.createElement('td');
    td.setAttribute('id', id);
    td.setAttribute('class',classname);
    td.setAttribute('scope',"col");
    td.setAttribute('name',name);
    td.setAttribute('scope',"row");
    td.innerHTML = data;
    document.getElementById(id).appendChild(td);
  }

  function tdInput(id,name,classname,data){
    var td = document.createElement('td');
    classname = classname + id;
    td.setAttribute('id', id);
    td.setAttribute('class',classname);
    td.setAttribute('scope',"col");
    td.setAttribute('name',name);
    //td.innerHTML = data;
    document.getElementById(id).appendChild(td);
  }
function createButton(id,classname,text){
  classname = id + classname;
  var btn = document.createElement('button');
  btn.setAttribute('id',id);
  btn.setAttribute('class',classname);
  btn.innerHTML = text;

  document.getElementById(id).appendChild(btn);
}
function createInput(id,name,classname){
  var input = document.createElement('input');
  classname = id + classname;
  input.setAttribute('id',id);
  input.setAttribute('type', 'checkbox');
  input.setAttribute('class', classname);

  document.getElementById(id).appendChild(input);
}
