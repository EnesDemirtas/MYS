function hesapla(){
        var urunFiyati = document.getElementById("urun_fiyati1").value;
        var urunMiktari = document.getElementById("urun_miktari1").value;
        var toplamTutar = urunFiyati * urunMiktari;
        document.getElementById("toplam_tutar1").innerHTML = toplamTutar;
}

function totalFiyatHesapla(){
    if(document.getElementById("urun_fiyati1").value <= 0 && document.getElementById("urun_miktari1").value <= 0){
      document.getElementById("fiyat_uyarisi1").style.display = "block";
      document.getElementById("miktar_uyarisi1").style.display = "block";
    }else if(document.getElementById("urun_fiyati1").value <= 0){
      document.getElementById("fiyat_uyarisi1").style.display = "block";
      document.getElementById("miktar_uyarisi1").style.display = "none";
    }else if(document.getElementById("urun_miktari1").value <= 0) {
      document.getElementById("miktar_uyarisi1").style.display = "block";
      document.getElementById("fiyat_uyarisi1").style.display = "none";
    }else{
      if(parseInt(document.getElementById("ara_toplam").innerHTML) < parseInt(document.getElementById("indirim_miktari").innerHTML )){
        document.getElementById("teklif_gonder").style.display = "none";
        document.getElementById("totalrow").style.display = "none";
      }else{
        document.getElementById("totalrow").style.display = "block";
        document.getElementById("ara_toplam").innerHTML = document.getElementById("toplam_tutar1").innerHTML;
        document.getElementById("fiyat_uyarisi1").style.display = "none";
        document.getElementById("miktar_uyarisi1").style.display = "none";
        document.getElementById("toplam_ucret").innerHTML =  parseInt(document.getElementById("ara_toplam").innerHTML) - parseInt(document.getElementById("indirim_miktari").innerHTML);
        document.getElementById("teklif_gonder").style.display = "block";

        // Ücret bilgilerini görünmez inputlara doldurma
        document.getElementById("ara_toplam_input").value = parseInt(document.getElementById("ara_toplam").innerHTML);
        document.getElementById("indirim_miktari_input").value = parseInt(document.getElementById("indirim_miktari").innerHTML);
        document.getElementById("toplam_ucret_input").value = parseInt(document.getElementById("toplam_ucret").innerHTML);
      }
    }

    if(document.getElementById("urun_miktari1").value > 10){
      document.getElementById("cok_miktar").style.display = "block";
      document.getElementById("fiyat_uyarisi1").style.display = "none";
      document.getElementById("miktar_uyarisi1").style.display = "none";
      document.getElementById("totalrow").style.display = "none";
    }else{
      document.getElementById("totalrow").style.display = "block";
      document.getElementById("fiyat_uyarisi1").style.display = "none";
      document.getElementById("miktar_uyarisi1").style.display = "none";
      document.getElementById("cok_miktar").style.display = "none";
    }
}

// function changeCounter(deger){
//   if(parseInt(document.getElementById("counter").value) == 1){
//   }else{
//     document.getElementById("counter").value = parseInt(document.getElementById("counter").value) - deger ;
//   }
// }
