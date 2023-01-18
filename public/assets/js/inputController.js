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

function ilAdresiBuyuk() { // İl Adresini Büyük Yazdırır
	var x = document.getElementById("cevadresil");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function ilceAdresiBuyuk() { // İlçe Adresini Büyük Yazdırır
	var x = document.getElementById("cevadresilce");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function hkSoyadBuyuk() { // Kullanıcı Soyadını Büyük Yazdırır
	var x = document.getElementById("hk-soyad");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function hkAdilkHarfBuyuk() { //Kullanıcı Adındaki İlk Harfleri Büyük Yazdırır
	var cumle = document.getElementById("hk-ad").value;

	var parca = cumle.split(" ");
	for (var i = 0; i < parca.length; i++) {
		var j = parca[i].charAt(0).toLocaleUpperCase("tr-TR");
		parca[i] = j + parca[i].substr(1).toLowerCase();
	}
	document.getElementById("hk-ad").value = parca.join(" ");
}

function hkUnvanBuyuk() { // Kullanıcı Ünvanını Büyük Yazdırır
	var x = document.getElementById("hk-unvan");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function hkMarkaAdiBuyuk() {
	var x = document.getElementById("hk-marka");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function hkIlBuyuk() {
	var x = document.getElementById("hk-il");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function hkIlceBuyuk() {
	var x = document.getElementById("hk-ilce");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

function hkBolgeBuyuk() {
	var x = document.getElementById("hk-bolge");
	x.value = x.value.toLocaleUpperCase("tr-TR");
}

