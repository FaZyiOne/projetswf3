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
 
               var e = $('<tr><th>Image</th><th>Lieu</th><th>Adresse</th><th>Prix</th></tr>');  
               $('#reservation').html('');  
               $('#reservation').append(e);
 
               for (i=0; i < data[item].length; i++){
                  var reservation = data[item][i];
                  console.log(data[item]);
                  console.log(data[item][i]);
 
 
               var e = $('<tr><th id="image"></th><td id = "lieu"></td><td id = "adresse"></td><td id = "prix"></td></tr>');
                 
                 var monImg = document.createElement('img');
               monImg.src="/koala/public/images/reservation/"+reservation['image'];

                 $('#image', e).html(monImg);
                 $('#image img', e).css({"width":"75px","max-height":"75px"});

                 $('#lieu', e).html(reservation['lieu']);  
                 $('#adresse', e).html(reservation['adresse']);
                 $('#prix', e).html(reservation['prix']);
                 
 
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