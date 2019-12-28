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

   $(".review__univ").hover(function(){
     if($(this).children('.review__age').hasClass('open')){
       const age = $(this).children('.review__age').removeClass('open');
       $(this).children('.review__age').fadeOut(1);
     }else{
       const age = $(this).children('.review__age').addClass('open');
       $(this).children('.review__age').fadeIn(1);
     }
     // age.addclass("open");
     console.log(age);
   })


 });
