// menu ---------------------------------

  


// nav


$(document).ready(function(){
    $(window).scroll(function(){
      var scroll = $(window).scrollTop();
      if (scroll < 100) {
        $("nav").css("background" , "rgba(255, 255, 255, 0.5)");
      }
  
      else{
        $("nav").css("background" , "white");  	
      }
      
    })


  });
  

  (function(){
    const burger = document.querySelector(".burger");
    burger.onclick = function()
    {
      const menu = document.querySelector(".menu");
      
      if(menu.dataset.etat == "open") // si le menu est ouvert => fermer
      {
        menu.classList.add("open");
        menu.dataset.etat = "close";
      }
      else
      {
        menu.classList.remove("open") ;
        menu.dataset.etat = "open";
      }
    }
  })();
  
