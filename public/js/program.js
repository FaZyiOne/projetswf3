// nav
$(document).ready(function () {
  $(window).scroll(function () {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $("nav.navbar").css('background', 'rgb(180, 186, 191)');

    } else {
      $("nav.navbar").css('background', 'white');
    }
  })

});

// -- hover

$(function () {

  $('ul.hover_block li').hover(function () {
    $(this).find('img').animate({
      opacity: "0.5"
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