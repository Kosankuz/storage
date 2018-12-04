$(document).ready(function() {

//  if (this.hasAttribute("disabled")) {
//     alert('The disabled attribute exists')
//  } else {
//     alert('The disabled attribute does not exist')
//  }
$(".form-control").prop("disabled", false);

  $('.editBtn').click(function(){
  var id = jQuery(this).attr('id');
  console.log(id);
// $('#bonus_pct1').prop("disabled", false);
// $('#bonus_amount1').prop("disabled", false);

});

$('.removeBtn').click(function(){
var id = jQuery(this).attr('id');
console.log(id);
});



});
