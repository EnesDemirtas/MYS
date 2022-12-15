function kisiBilgileri(id){
    var element = document.getElementById("calisan-"+id).children;

    var isim = $("#calisan-"+id+" p").text();
    $("#modal-isim").text(isim);
    
}

