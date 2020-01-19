// nav
$(document).ready(function() {
  $(window).scroll(function() {
    var scroll = $(window).scrollTop();
    if (scroll < 100) {
      $("nav.navbar").css("background", "blue");
    } else {
      $("nav.navbar").css("background", "pink");
    }
  });
});

// -- hover

$(function() {
  $("ul.hover_block li").hover(
    function() {
      $(this)
        .find("img")
        .animate(
          {
            opacity: "0.2"
          },
          {
            duration: 300
          }
        );
    },
    function() {
      $(this)
        .find("img")
        .animate(
          {
            opacity: "1"
          },
          {
            duration: 300
          }
        );
    }
  );
});
// ------------------ EVENEMENT CARD SALLES

$(".card-hover").mouseover(function() {
  $(this).css("boxShadow", "13px 17px 23px  -1px rgba(0,0,0,0.75)");
  $(this).css("transition", "all 2s");
});
$(".card-hover").mouseout(function() {
  $(this).css("boxShadow", "none");
  $(this).css("transition", "all 2s");
})(
  // -------------------- formulaire inscription

  // Example starter JavaScript for disabling form submissions if there are invalid fields
  function() {
    "use strict";
    window.addEventListener(
      "load",
      function() {
        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        var forms = document.getElementsByClassName("needs-validation");
        // Loop over them and prevent submission
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener(
            "submit",
            function(event) {
              if (form.checkValidity() === false) {
                event.preventDefault();
                event.stopPropagation();
              }
              form.classList.add("was-validated");
            },
            false
          );
        });
      },
      false
    );
  }
)();
