function kisiBilgileri(id){
    var element = document.getElementById("calisan-"+id).children;

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

