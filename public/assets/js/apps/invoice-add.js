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

function deleteItemRow() {
    deleteItem = document.querySelectorAll('.delete-item');
    for (var i = 0; i < deleteItem.length; i++) {
        deleteItem[i].addEventListener('click', function() {
            this.parentElement.parentNode.parentNode.parentNode.remove();
        })
    }
}

function selectableDropdown(getElement, myCallback) {
  var getDropdownElement = getElement;
  for (var i = 0; i < getDropdownElement.length; i++) {
      getDropdownElement[i].addEventListener('click', function() {
        console.log(this)
        console.log(this.parentElement.parentNode.querySelector('.dropdown-toggle > .selectable-text'));
        console.log(this.parentElement);

        var dataValue = this.getAttribute('data-value');
        var dataImage = this.getAttribute('data-img-value');

        if(dataValue === null && dataImage === null) {
          console.warn('No attributes are defined. Kindly define one attribute atleast')
        }
        
        if (dataValue != '' && dataValue != null) {
          this.parentElement.parentNode.querySelector('.dropdown-toggle > .selectable-text').innerText = dataValue;
        }

        if (dataImage != '' && dataImage != null) {
          this.parentElement.parentNode.querySelector('.dropdown-toggle > img').setAttribute('src', dataImage );
        }

        var dropdownValues = {dropdownValue:dataValue, dropdownImage:dataImage};
        myCallback(dropdownValues);
      })
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
    if (value.dropdownValue == 'Yüzde') {
        console.log('Ben Yüzdeyim')
        document.querySelector('.discount-percent').style.display = 'block';
        document.querySelector('.discount-amount').style.display = 'none';
    } else if (value.dropdownValue == 'Belirli Miktar') {
        console.log('Ben Belirli Miktarım')
        document.querySelector('.discount-amount').style.display = 'block';
        document.querySelector('.discount-percent').style.display = 'none';
    } else if (value.dropdownValue == 'Yok') {
        console.log('Ben Yokum')
        document.querySelector('.discount-percent').style.display = 'none';
        document.querySelector('.discount-amount').style.display = 'none';
    }
}

document.getElementsByClassName('additem')[0].addEventListener('click', function() {
  console.log('dfdf')

  getTableElement = document.querySelector('.item-table');
  currentIndex = getTableElement.rows.length;

  $html = '<tr>'+
  '<td class="delete-item-row">'+
      '<ul class="table-controls">'+
          '<li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>'+
      '</ul>'+
    '</td>'+
    '<td class="description">'+
    '<div class="dropdown selectable-dropdown invoice-select">'+
    '<a id="currencyDropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="selectable-text"> Vinç Periyodik Kontrol</span> <span class="selectable-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>'+
    '<div class="dropdown-menu" aria-labelledby="currencyDropdown">'+
      '<a class="dropdown-item" data-value="Vinç Periyodik Kontrol" href="javascript:void(0);"> Vinç Periyodik Kontrol</a>'+
      '<a class="dropdown-item" data-value="Kalorifer Kazanı Periyodik Kontrol" href="javascript:void(0);"> Kalorifer Kazanı Periyodik Kontrol</a>'+
    '</div></div>'+
         '<textarea class="form-control" placeholder="Ek Detaylar (Eklemek istediğiniz herhangi birşey varsa)"></textarea></td>'+
    '<td class="rate">'+
        '<input type="text" class="form-control  form-control-sm" placeholder="Fiyat">'+
   ' </td>'+
    '<td class="text-right qty"><input type="text" class="form-control  form-control-sm" placeholder="Miktar"></td>'+
    '<td class="text-right amount"><span class="editable-amount"><span class="currency">$</span> <span class="amount">0.00</span></td>'+
    '</tr>';

  $(".item-table tbody").append($html);
  deleteItemRow();

})

deleteItemRow();
selectableDropdown(document.querySelectorAll('.invoice-select .dropdown-item'));
//selectableDropdown(document.querySelectorAll('.invoice-tax-select .dropdown-item'), getTaxValue);
selectableDropdown(document.querySelectorAll('.invoice-discount-select .dropdown-item'), getDiscountValue);