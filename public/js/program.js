// nav
// $(document).ready(function () {
//   $(window).scroll(function () {
//     var scroll = $(window).scrollTop();
//     if (scroll < 100) {
//       $("nav").css("background", "blue");
//     } else {
//       $("nav").css("background", "pink");
//     }
//   })

// });

// -- hover

$(function () {

  $('ul.hover_block li').hover(function () {
    $(this).find('img').animate({
      opacity: "0.2"
    }, {
      duration: 300
    });
  }, function () {
    $(this).find('img').animate({
      opacity: "1"
    }, {
      duration: 300
    });
  });

});

// caroussel manuel
$('.carousel').carousel();