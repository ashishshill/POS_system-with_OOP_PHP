$(document).ready(function(){

     $('#search_text').keyup(function(){
       var title = $(this).val();
       if(title != ""){
         $.ajax({
            type : "post",
            url  : "getcart.php",
            data : "title="+title,
            success:function(data){
                $("#result").html(data);
             }
          });
      } else {
        $('#result').html('');
      }
    });

    $("#cart").click(function(){
      var quantity   = $('#quantity').val();
      var id         = $('#id').val();
      var dataString = '&quantity='+quantity+ '&id='+id;
      $.ajax({
        type : "post",
        url  : "getitm.php",
        data : dataString,
        success:function(data){
          $('#exp').html(data);
      }
    });
  });

  $("#cart_del").click(function(){
    var id = $('#id').val();
    $.ajax({
      type : "post",
      url  : "delitm.php",
      data : '&id='+id,
      success:function(data){
        $('.del').html(data);
      }
    });
  });

  $('#con').keyup(function(){
    var number = $(this).val();
    if(number != ""){
      $.ajax({
         type : "post",
         url  : "getcus.php",
         data : "number="+number,
         success:function(data){
             $("#cus").val(data);
          }
       });
   } else {
     $('#cus').val('');
   }
 });

 $('#year_text').keyup(function(){
   var year_name = $(this).val();
   if(number != ""){
     $.ajax({
        type : "post",
        url  : "getyear.php",
        data : "year_name="+year_name,
        success:function(data){
            $("#sale").val(data);
         }
      });
  } else {
    $('#sale').val('');
  }
});

$('#month_text').keyup(function(){
  var month_name = $(this).val();
  if(number != ""){
    $.ajax({
       type : "post",
       url  : "getmonth.php",
       data : "month_name="+month_name,
       success:function(data){
           $("#sale").val(data);
        }
     });
 } else {
   $('#sale').val('');
 }
});

$('#date_text').keyup(function(){
  var date_name = $(this).val();
  if(number != ""){
    $.ajax({
       type : "post",
       url  : "getdate.php",
       data : "date_name="+date_name,
       success:function(data){
           $("#sale").val(data);
        }
     });
 } else {
   $('#sale').val('');
 }
});

});
