$(function(){
  // Push each row's ID # into the Delete dialog:
  $("button.btn-danger[data-target='#Dialog_Delete']")
  .each(function(){
    //console.log( $(this).data("id") );
    $(this).click(function(){
      $("#Dialog_Delete").find("#ID").val( $(this).data("id") );
    });
  });
});