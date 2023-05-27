function hesapla(counter){
        var urunFiyati = document.getElementById("urun_fiyati"+counter+"").value;
        var urunMiktari = document.getElementById("urun_miktari"+counter+"").value;
        var toplamTutar = urunFiyati * urunMiktari;
        document.getElementById("toplam_tutar"+counter+"").innerHTML = toplamTutar;
}

function totalFiyatHesapla(counter, selectedItem){
    document.getElementById("totalrow").style.display = "block";
    var hepsiniTopla = 0;
    for (let i = 0; i < counter; i++) {
      console.log(document.getElementsByClassName("editable-amount").parentNode.className)
      }
      document.getElementById("ara_toplam").innerHTML = String(hepsiniTopla);
      console.log(document.getElementsByClassName("editable-amount").parentNode);
}

function changeCounter(deger){
  if(parseInt(document.getElementById("counter").value) == 1){
  }else{
    document.getElementById("counter").value = parseInt(document.getElementById("counter").value) - deger ;
  }
}