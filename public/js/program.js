$(document).ready(function(){
    $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if (scroll < 100) {
        $("nav.navbar").css("background" , "rgba(255, 255, 255, 0.1)");
      }
  
      else{
        $("nav.navbar").css("background" , "white");  	
      }
      
    })
  });