var currentDate = new Date();

$('.dropify').dropify({
  messages: { 'default': 'Fotoğraf/Logo Yüklemek İçin Tıklayınız', 'replace': 'Yükleyin veya Sürükleyip Bırakın' }
});

var f1 = flatpickr(document.getElementById('date'), {
  defaultDate: currentDate,
});

var f2 = flatpickr(document.getElementById('due'), {
  defaultDate: currentDate.setDate(currentDate.getDate() + 5),
});

function removeRecurringDigits(s){
  let x = s.length - 2;
  // traversing the string
  for(let i = 0; i<x; i++){
      if(i > s.length - 2)
          break;
      if(s[i] == s[i+1]){
          // removing character which is
          // occurring more than one time
          s = s.substr(0, i+1) + s.substr(i+2, s.length);
          i = i-1;
      }
  }
  return s;
}

function deleteItemRow() {
    deleteItem = document.querySelectorAll('.delete-item');
    if(parseInt(document.getElementById("counter").value) != 1){
      for (var i = 0; i < deleteItem.length; i++) {
        deleteItem[i].addEventListener('click', function() {
            var istenen = this.parentNode.parentNode.parentNode.parentNode.childNodes;
            $(".tekSilinen").html(istenen[4].childNodes[0].childNodes[2].className);
            console.log("i:"+i+" TekSilinen:"+document.getElementById("tekSilinen").innerHTML+" Silinenler:"+document.getElementById("silinenler").innerHTML+" DeleteItem.lenght: "+ deleteItem.length );
            $("#silinenler").append(document.getElementById("tekSilinen").innerHTML);//Silinen teklifleri tutar
            this.parentElement.parentNode.parentNode.parentNode.remove();

            var silinenler = removeRecurringDigits(String(document.getElementById("silinenler").innerHTML));
            $("#silinenler").html(silinenler);


            if(parseInt(document.getElementById("counter").value) == 3){ // 3 taneden fazla teklif eklenemez
              document.getElementById("ekle").style.display = "none";
              document.getElementById("fazla_teklif").style.display = "block";
            }else if(parseInt(document.getElementById("counter").value) < 3){
              document.getElementById("ekle").style.display = "block";
              document.getElementById("fazla_teklif").style.display = "none";
            }else{
              console.log("Hata var");
            }
        })
    }
    document.getElementById("counter").value = parseInt(document.getElementById("counter").value) - 1;
    }
    console.log("i:"+i+" TekSilinen:"+document.getElementById("tekSilinen").innerHTML+" Silinenler:"+document.getElementById("silinenler").innerHTML+" DeleteItem.lenght: "+ deleteItem.length );
    
    if(parseInt(document.getElementById("counter").value) == 3){ // 3 taneden fazla teklif eklenemez
      document.getElementById("ekle").style.display = "none";
      document.getElementById("fazla_teklif").style.display = "block";
    }else if(parseInt(document.getElementById("counter").value) < 3){
      document.getElementById("ekle").style.display = "block";
      document.getElementById("fazla_teklif").style.display = "none";
    }else{
      console.log("Hata var");
    }
}

/*function getTaxValue(value) {
    if (value.dropdownValue == 'Deducted') {
        console.log('I am percentage')
        document.querySelector('.tax-rate-deducted').style.display = 'block';
        document.querySelector('.tax-rate-per-item').style.display = 'none';
        document.querySelector('.tax-rate-on-total').style.display = 'none';
    } else if (value.dropdownValue == 'Per Item') {
        console.log('I am Flat Amount')
        document.querySelector('.tax-rate-deducted').style.display = 'none';
        document.querySelector('.tax-rate-per-item').style.display = 'block';
        document.querySelector('.tax-rate-on-total').style.display = 'none';
    } else if (value.dropdownValue == 'On Total') {
        console.log('Ben Belirli Miktarım')
        document.querySelector('.tax-rate-deducted').style.display = 'none';
        document.querySelector('.tax-rate-per-item').style.display = 'none';
        document.querySelector('.tax-rate-on-total').style.display = 'block';
    } else if (value.dropdownValue == 'None') {
        console.log('Ben Yokum')
        document.querySelector('.tax-rate-deducted').style.display = 'none';
        document.querySelector('.tax-rate-per-item').style.display = 'none';
        document.querySelector('.tax-rate-on-total').style.display = 'none';
    }
} */

function getDiscountValue(value) { //İndirim Miktarını Düzenler
    if (value == 'Yüzde' && document.getElementById('toplam_tutar1') != 0) {
        document.getElementById('discount-amount').style.display = 'none';
        document.getElementById('discount-percent').style.display = 'block';
        document.getElementById('discount-amount').value = 0;
        document.getElementById('selectable-text-indirim').innerHTML = 'Yüzde';
    } else if (value == 'Belirli Miktar' && document.getElementById('toplam_tutar1') != 0) {
        document.getElementById('discount-percent').style.display = 'none';
        document.getElementById('discount-percent').value = 0;
        document.getElementById('discount-amount').style.display = 'block';
        document.getElementById('selectable-text-indirim').innerHTML = 'Belirli Miktar';
    } else if (value == 'Yok') {
        document.getElementById('discount-percent').style.display = 'none';
        document.getElementById('discount-amount').style.display = 'none';
        document.getElementById('selectable-text-indirim').innerHTML = 'Yok';
        document.getElementById('discount-amount-rate').value = 0;
        document.getElementById('discount-percent-rate').value = 0;
    }
}

function teklifGonderSil(){
  document.getElementById('teklif_gonder').style.display = "none";
}

function indirimYap(value){
  if(value == 'Yüzde'){
    document.getElementById('indirim_miktari').innerHTML = (parseInt(document.getElementById('toplam_tutar1').innerHTML) * document.getElementById('discount-percent-rate').value ) / 100 ;
  }else if (value == 'Miktar'){
    document.getElementById('indirim_miktari').innerHTML = document.getElementById('discount-amount-rate').value;
    document.getElementById('indirim_miktari_input').value = parseInt(document.getElementById('indirim_miktari').innerHTML);
  }
}

document.getElementsByClassName('additem')[0].addEventListener('click', function() {
  console.log('dfdf')
  document.getElementById("counter").value = parseInt(document.getElementById("counter").value) + 2;
  var counter = document.getElementById("counter").value;
  document.getElementById("yenisi").value = parseInt(document.getElementById("yenisi").value) + 1;
  var yenisi = document.getElementById("yenisi").value;
  getTableElement = document.querySelector('.item-table');
  currentIndex = getTableElement.rows.length;

  $html = '<tr>'+
  '<td class="delete-item-row">'+
      '<ul class="table-controls">'+
          '<li><a href="javascript:void(0);" onclick="changeCounter(1);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>'+
      '</ul>'+
    '</td>'+
    '<td class="description">'+
    '<div class="dropdown selectable-dropdown invoice-select'+yenisi+'">'+
    '<a id="currencyDropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="selectable-text"> Vinç Periyodik Kontrol - '+yenisi+'</span> <span class="selectable-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>'+
    '<div class="dropdown-menu" aria-labelledby="currencyDropdown">'+
      '<a class="dropdown-item" data-value="Vinç Periyodik Kontrol - '+yenisi+'" href="javascript:void(0);"> Vinç Periyodik Kontrol - '+yenisi+'</a>'+
      '<a class="dropdown-item" data-value="Kalorifer Kazanı Periyodik Kontrol - '+yenisi+'" href="javascript:void(0);"> Kalorifer Kazanı Periyodik Kontrol - '+yenisi+'</a>'+
    '</div></div>'+
         '<textarea class="form-control" placeholder="Ek Detaylar (Eklemek istediğiniz herhangi birşey varsa)"></textarea></td>'+
    '<td class="rate">'+
        '<input type="text" class="form-control  form-control-sm" placeholder="Fiyat" id="urun_fiyati'+yenisi+'" value="0" onchange="hesapla('+yenisi+')">'+
   ' </td>'+
    '<td class="text-right qty"><input type="text" class="form-control  form-control-sm" placeholder="Miktar" id="urun_miktari'+yenisi+'" onchange="hesapla('+yenisi+')" value="1"></td>'+
    '<td class="text-right amount"><span class="editable-amount"><span class="para_sembol"></span> <span class="'+yenisi+'" id="toplam_tutar'+yenisi+'">0.00</span></span></td>'+
    '</tr>';


    $fiyat_hesapla = '<a href="javascript:void(0);" class="btn btn-primary" onclick="totalFiyatHesapla('+counter+')">Total Fiyat Hesapla</a>'+
    '<div id="totalrow" style="display:none;">'+
        '<div class="invoice-totals-row invoice-summary-subtotal">'+
            '<div class="invoice-summary-label">Ara Toplam</div>'+
            '<div class="invoice-summary-value">'+
                '<div class="subtotal-amount">'+
                    '<span class="para_sembol"></span><span class="amount" id="ara_toplam">100</span>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '<div class="invoice-totals-row invoice-summary-total">'+
            '<div class="invoice-summary-label">İndirim</div>'+
            '<div class="invoice-summary-value">'+
                '<div class="total-amount">'+
                    '<span class="para_sembol"></span><span id="indirim_miktari">0</span>'+
                '</div>'+
            '</div>'+
        '</div>'+
        '<div class="invoice-totals-row invoice-summary-balance-due">'+
            '<div class="invoice-summary-label">Toplam</div>'+
            '<div class="invoice-summary-value">'+
                '<div class="balance-due-amount">'+
                    '<span class="para_sembol"></span><span id="toplam_ucret">90</span>'+
                '</div>'+
            '</div>'+
        '</div>'+
    '</div>';

  $(".fiyat_hesapla").html($fiyat_hesapla);
  $(".item-table tbody").append($html);
  deleteItemRow();
})

function selectableDropdown(getElement) {
  var getDropdownElement = getElement;
  console.log(getDropdownElement[1].parentNode);
  
}

deleteItemRow();
selectableDropdown(document.getElementById('invoice-select'));
//selectableDropdown(document.querySelectorAll('.invoice-tax-select .dropdown-item'), getTaxValue);

