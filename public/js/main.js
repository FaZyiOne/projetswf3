$(document).ready(function() {

    $(document).on('click', 'button.ajax', function(){
                
                $.ajax({  
                url:        'api/reservation',  
                type:       'GET',   
                dataType:   'json',  
                async:      true,  
                
                success: function(data, status) { 
                console.log(data)  
                console.log(status)
 
             for (var item in data) {
 
               var e = $('<tr><th>Lieu</th><th>Adresse</th><th>Telephone</th><th>Prix</th><th>Description</th><th>Capacite</th><th>Created_at</th></tr>');  
               $('#reservation').html('');  
               $('#reservation').append(e);
 
               for (i=0; i < data[item].length; i++){
                  var post = data[item][i];
                  console.log(data[item]);
                  console.log(data[item][i]);
 
 
               var e = $('<tr><td id = "lieu"></td><td id = "adresse"></td><td id = "telephone"></td><td id = "prix"></td><td id = "description"></td><td id = "capacite"></td><td id = "created_at"></td></tr>');
                 
                 $('#lieu', e).html(reservation['lieu']);  
                 $('#adresse', e).html(reservation['adresse']);
                 $('#telephone', e).html(reservation['telephone']);
                 $('#prix', e).html(reservation['prix']);
                 $('#description', e).html(reservation['description']);
                 $('#capacite', e).html(reservation['capacite']);
                 $('#created_at', e).html(reservation['created_at']['date']);
                 
 
                 $('#reservation').append(e);
               }

                  
             }
             },  
                error : function(xhr, textStatus, errorThrown) {  
                   alert('Ajax request failed.');  
                }  
             });  
          });  
 
 });