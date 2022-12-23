function ilkHarfBuyuk() { //Kullanıcı Adındaki İlk Harfleri Büyük Yazdırır
	var cumle = document.getElementById("cadi").value;

	var parca = cumle.split(" ");
	for (var i = 0; i < parca.length; i++) {
		var j = parca[i].charAt(0).toLocaleUpperCase("tr-TR");
		parca[i] = j + parca[i].substr(1).toLowerCase();
	}
	document.getElementById("cadi").value = parca.join(" ");
}

function soyadBuyuk() { // Kullanıcı Soyadını Büyük Yazdırır
	var x = document.getElementById("csoyadi");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function ilAdresiBuyuk() { // Kullanıcı Soyadını Büyük Yazdırır
	var x = document.getElementById("cevadresil");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function ilceAdresiBuyuk() { // Kullanıcı Soyadını Büyük Yazdırır
	var x = document.getElementById("cevadresilce");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}
