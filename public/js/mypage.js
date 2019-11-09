$(function(){
  $("input[type='file']").on('change',function(){
    // console.log(this);
     var file = $(this).prop('files')[0];
     console.log($(this).attr('id'));
     if($(this).attr('id') == "filem"){
       if(!($("#filenamem").length)){
         $("#mform").append('<span id="filenamem" class="filename"></span>');
       }
       $("#filenamem").html(file.name);
     }

     if($(this).attr('id') == "filet"){
       if(!($("#filenamet").length)){
         $("#tform").append('<span id="filenamet" class="filename"></span>');
       }
       $("#filenamet").html(file.name);
     }
     // $("#input-label").addClass('changed');
   });


 });
