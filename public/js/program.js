// nav


// $(document).ready(function(){
//     $(window).scroll(function(){
//       var scroll = $(window).scrollTop();
//       if (scroll < 100) {
//         $("nav").css("background" , "rgba(255, 255, 255, 0.5)");
//       }
  
//       else{
//         $("nav").css("background" , "white");  	
//       }
      
//     })


//   });
  

  
  $(function() {
 
    $('ul.hover_block li').hover(function() {
        $(this).find('img').animate({opacity: "0.2"}, {duration:300});
        }, function(){
            $(this).find('img').animate({opacity: "1"}, {duration:300});
        });
    
});  