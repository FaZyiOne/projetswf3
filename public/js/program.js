// nav
$(document).ready(function () {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $("nav.navbar").css("background", "blue");
    } else {
      $("nav.navbar").css("background", "pink");
    }
  })

});

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
// ------------------ EVENEMENT CARD SALLES

$('.card-hover').mouseover(function () {
  $(this).css("boxShadow", "13px 17px 23px  -1px rgba(0,0,0,0.75)");
  $(this).css("transition", "all 2s");
})
$('.card-hover').mouseout(function () {
  $(this).css("boxShadow", "none");
  $(this).css("transition", "all 2s");

})
// -------------------- formulaire inscription

