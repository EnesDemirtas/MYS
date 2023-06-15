function musteri_calisan(deger) {
    if(deger == 3){ //Register - müşteri kısmı görünür yapma
        document.getElementById("tip").value = "musteri";
        document.getElementById("musteri").style.display = 'block';
		document.getElementById("calisan").style.display = 'none';
        var calisan = document.getElementById("calisan_buton");
        calisan.classList.remove("btn-primary");
        calisan.classList.add("btn-outline-primary");
        var musteri = document.getElementById("musteri_buton");
        musteri.classList.remove("btn-outline-primary");
        musteri.classList.add("btn-primary");
    }
    if(deger == 4){ //Register - çalışan kısmı görünür yapma
        document.getElementById("tip").value = "calisan";
        document.getElementById("calisan").style.display = 'block';
		document.getElementById("musteri").style.display = 'none';
        var calisan = document.getElementById("calisan_buton");
        calisan.classList.remove("btn-outline-primary");
        calisan.classList.add("btn-primary");
        var musteri = document.getElementById("musteri_buton");
        musteri.classList.remove("btn-primary");
        musteri.classList.add("btn-outline-primary");
    }if(deger == 5){ // Onay Metnini Aç
        document.getElementById("modal_default").style.display = 'block';
		document.getElementById("modal_default").classList.add('show');
    } 
}

function modelKapat() {
    document.getElementById("modal_default").style.display = 'none';
    document.getElementById("modal_default").classList.remove('show');
}