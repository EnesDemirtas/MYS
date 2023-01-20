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

    var unvan = $("#calisan-"+id+" .unvan").attr('name');
    $("#modal-unvan").text(unvan);

    var lokasyon = $("#calisan-"+id+" .lokasyon").attr('name');
    $("#modal-lokasyon").text(lokasyon);

    var eposta = $("#calisan-"+id+" .eposta").attr('name');
    $("#modal-eposta").text(eposta);

    var cep = $("#calisan-"+id+" .cep").attr('name');
    $("#modal-cep").text(cep);

    var dogumTarihi = $("#calisan-"+id+" .dogum").text();
    $("#modal-dogum").text(dogumTarihi);
}

function musteriBilgileri(id){
   var isim = $("#musteri-"+id+" .isim").attr('name');
   $("#modal-isim").text(isim);    

   var unvan = $("#musteri-"+id+" .unvan").attr('name');
   $("#modal-unvan").text(unvan);

   var lokasyon = $("#musteri-"+id+" .lokasyon").attr('name');
   $("#modal-lokasyon").text(lokasyon);

   var eposta = $("#musteri-"+id+" .eposta").attr('name');
   $("#modal-eposta").text(eposta);

   var cep = "+" + $("#musteri-"+id+" .ulkekodu").attr('name') + $("#musteri-"+id+" .cep").attr('name');
   $("#modal-cep").text(cep);

   var dogumTarihi = $("#musteri-"+id+" .dogum").attr('name');
   $("#modal-dogum").text(dogumTarihi);

   var markaAdi = $("#musteri-"+id+" .markaAdi").attr('name');
   $("#modal-marka").text(markaAdi);
}

function changeFields(kayit) {
    if (kayit == "Kayıt Türü") {
        $("#hk-tcknvno").prop("readonly", true);
        $("#hk-marka").prop("readonly", true);
        $("#bireysel-bilgiler1 input").prop("readonly", true);
        $("#bireysel-bilgiler2 input").prop("readonly", true);
    } else if (kayit == "Ticari") {
        $("#hk-tcknvno").attr("placeholder", "Vergi No");
        $("#bireysel-bilgiler1").hide();
        $("#bireysel-bilgiler2").hide();

        $("#hk-tcknvno").prop("readonly", false);
        $("#hk-marka").prop("readonly", false);
    } else {
        $("#hk-tcknvno").attr("placeholder", "TCKN/Vergi No");
        $("#bireysel-bilgiler1").show();
        $("#bireysel-bilgiler2").show();

        $("#hk-tcknvno").prop("readonly", false);
        $("#hk-marka").prop("readonly", false);
        $("#bireysel-bilgiler1 input").prop("readonly", false);
        $("#bireysel-bilgiler2 input").prop("readonly", false);
    }


}

function changeFieldsMusteri(kayit) {
    if (kayit == "Ticari") {
        $("#hk-tcknvno").attr("placeholder", "Vergi No");
        $(".bireyselbilgi").hide();
        $(".ticaribilgi").show();
    } else {
        $("#hk-tcknvno").attr("placeholder", "TCKN/Vergi No");
        $(".ticaribilgi").hide();   
        $(".bireyselbilgi").show();
    }
}
