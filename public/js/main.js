$(document).ready(function () {
  $(document).on("click", "button.ajax", function () {
    $.ajax({
      url: "api/reservation",
      type: "GET",
      dataType: "json",
      async: true,

      success: function (data, status) {
        console.log(data);
        console.log(status);

        for (var item in data) {
          var e = $(
            "<tr><th>Lieu</th><th>Image</th><th>Adresse</th><th>Ville</th><th>Telephone</th><th>Prix</th><th>Description</th><th>Capacite</th><th>Date</th></tr>"
          );
          $("#reservation").html("");
          $("#reservation").append(e);

          for (i = 0; i < data[item].length; i++) {
            var reservation = data[item][i];
            console.log(data[item]);
            console.log(data[item][i]);

            var e = $(
              '<tr><td id = "lieu"></td><td id = "image"></td><td id = "adresse"><td id = "ville"></td><td id = "telephone"></td><td id = "prix"></td><td id = "description"></td><td id = "capacite"></td><td id = "created_at"></td></tr>'
            );

            $("#lieu", e).html(reservation["lieu"]);
            $("#image", e).html(reservation["image"]);
            $("#adresse", e).html(reservation["adresse"]);
            $("#ville", e).html(reservation["ville"]);
            $("#map", e).html(reservation["map"]);
            $("#telephone", e).html(reservation["telephone"]);
            $("#prix", e).html(reservation["prix"]);
            $("#description", e).html(reservation["description"]);
            $("#capacite", e).html(reservation["capacite"]);
            $("#created_at", e).html(reservation["created_at"]["date"]);

            $("#reservation").append(e);
          }
        }
      },
      error: function (xhr, textStatus, errorThrown) {
        alert("Ajax request failed.");
      }
    });
  });
});
