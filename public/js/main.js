$(document).ready(function() {

   // $('#ville').keyup(function(){
   //    // alert('ok')
   //    $('#reservation').html('');

   //    var ville = $('#ville').val();

   //    if(ville !=""){
   //       $.ajax({
   //          type: 'GET', 
   //          url: '../src/Controller/Salles',
   //          data: 'ville' + encodeURIComponent(ville),
   //          success: function(data){
   //             if(data != ""){
   //                $("#reservation").append(data);
   //             }
   //             else{
   //                $("#reservation").innerHTML = "<div>test<div>"
   //             }
   //          }
   //       })
   //    }
   // });

   //  $(document).on('click', 'button.ajax', function(){
                
   //              $.ajax({  
   //              url:        'api/reservation',  
   //              type:       'GET',   
   //              dataType:   'json',  
   //              async:      true,  
                
   //              success: function(data, status) { 
   //              console.log(data)  
   //              console.log(status)
 
   //           for (var item in data) {
                
   //             $('#reservation').html('');  
   //             $('#reservation').append(e);
 
   //             for (i=0; i < data[item].length; i++){
   //                var reservation = data[item][i];
   //                console.log(data[item]);
   //                console.log(data[item][i]);
               
   //             var e = $('<div class="col-sm-12 col-md-6 col-lg-4 text-dark"><div class="card"><a href="" target="_blank" id="image"></a><div class="card-body"><h5 class="card-title" id="lieu"></h5><p class="card-text" id="adresse"></p><a href="#" class="btn btnDevis">A partir de <span id="prix"></span> €</a><p>Commentaires</p><a href="{{ path("cart_add",{"id": reservation.id } )}}" class="btn btn-success float-right"><i class="fas mr-1"></i>Réserver</a></div></div></div>');
               
   //               var monImg = document.createElement('img');
   //             monImg.src="/koala/public/images/reservation/"+reservation['image'];

   //               $('#image', e).html(monImg);
   //               $('#image img', e).css({"max-height":"100px"});

   //               $('#lieu', e).html(reservation['lieu']);  
   //               $('#adresse', e).html(reservation['adresse']);
   //               $('#prix', e).html(reservation['prix']);
                 
   //               $('#reservation').append(e);
   //             }    
   //           }
   //           },  
   //              error : function(xhr, textStatus, errorThrown) {  
   //                 alert('Ajax request failed.');  
   //              }  
   //           });  
   //        });  
 
 });