$(function(){ // on DOM ready
  // Not PHP; the $ is just a coincidence
  var $Dialog = $("#DiagDB");
  var $Form = $Dialog.find("form");
  var $btnSubmit = $Dialog.find("button[type='submit']");
  var $txtConfirm = $("#delConfirm");
  
  var Request;  // predefine
  var sCereal = "";
  var sExtraData = "";  // stuff to add to the AJAX request
  
  // refactored the similar Dialog changes:
  function changeDialog(sTitle, bFields, sBtnStyle)
  {
    $Dialog.find(".modal-title").text(sTitle);
    
    // if true, show the text entry fields:
    // (this is how to spread a ternary op over multiple lines, btw)
    // (use an if-else instead, kids)
    bFields ? (
      $Dialog.find(".form-group").show(), 
      $Dialog.find("input").prop("disabled",false), // re-enable text fields
      $txtConfirm.hide()
    ) : (
      $Dialog.find(".form-group").hide(), 
      $Dialog.find("input").prop("disabled",true),  // disable to bypass "required" attrib.
      $txtConfirm.show()
    );
    
    $btnSubmit
      .attr("class","btn btn-"+sBtnStyle)
      .text( sTitle.split(" ")[0] ) //change the button text to 1st word of title
      ;
  }
  
  // CREATE
  $("#btnAdd").click( function(){
    changeDialog("Add An Entry to the Database",true,"success");
    sExtraData = "Action=CREATE";
  });
  
  // UPDATE
  $(".btnChange").click( function(){
    changeDialog("Update This Entry",true,"primary");
    $Row = $(this).closest("tr");
    $Dialog.find("input#Name").val( $Row.find(".name").text() );
    $Dialog.find("input#PhoneNum").val( $Row.find(".phone").text() );
    sExtraData = "Action=UPDATE&ID=" + $Row.find(".id").text();
  });
  
  // DELETE
  $(".btnDelete").click( function(){
    changeDialog("Delete This Entry?",false,"danger");
    $ID = $(this).closest("tr").find(".id").text();
    sExtraData = "Action=DELETE&ID=" + $ID;
  });
  
  // rejig form submission to do some AJAX:
  $Form.submit(function(event){
    event.preventDefault(); // block the default behaviour
    if(Request) Request.abort();  // cancel any hanging AJAX before making a new one
    
    // JSON-ify form entries (and add extra bits)
    sCereal = $Form.serialize();
    sCereal = sCereal ? ( sCereal += '&'+sExtraData ) : sExtraData;
    
    Request = $.ajax({
      method: "POST",
      url: "Write.php",
      data: sCereal,
      
      success: function(reply,status,jqXHR){
        console.log(sCereal);
        //alert("Database changed successfully.");
        location.reload(true);  // force-refresh page from server
      },
      error: function(jqXHR,status,err){
        console.log(status, err);
      }
    });
  });
  
});
