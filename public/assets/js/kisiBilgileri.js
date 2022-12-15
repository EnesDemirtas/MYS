// $(document).ready(function(){
//     $('#invoice-list').on('click','.viewdetails',function(){
//         var csatirid = $(this).attr('data-id');
//         if(csatirid > 0){

//             // AJAX request
//             //var url = "{{ route('calisanDetaylari',[':csatirid']) }}";
//             var url = "http://127.0.0.1:8000/calisanDetaylari/:csatirid";
//             url = url.replace(':csatirid',csatirid);
//             // Empty modal data
//             $('#exampleModalLong .modal-body').empty();
//             $.ajax({
//                 url: url,
//                 dataType: 'json',
//                 success: function(response){
//                     // Add employee details
//                     $('#exampleModalLong .modal-body').html(response.html);

//                     // Display Modal
//                 },
//                 error: function() {
//                     alert("Veriler Veritabanından Getirilemedi.");
//                 },
//             });
//          }
//     });

// });


 function kisiBilgileri(id){
     var element = document.getElementById("calisan-"+id).children;
     var isim = $("#calisan-"+id+" p").text();
     $("#modal-isim").text(isim);
    var isim = $("#calisan-"+id+" p").text();
    $("#modal-isim").text(isim);    

    var lokasyon = $("#calisan-"+id+" .lokasyon").attr('name');
    $("#modal-lokasyon").text(lokasyon);

    var eposta = $("#calisan-"+id+" .inv-email").text();
    $("#modal-eposta").text(eposta);

    var telefon = $("#calisan-"+id+" .inv-amount").text();
    $("#modal-cep").text(telefon);

    var dogumTarihi = $("#calisan-"+id+" .dogum").text();
    $("#modal-dogum").text(dogumTarihi);
}

