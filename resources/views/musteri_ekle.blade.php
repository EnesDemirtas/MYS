<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - MÜŞTERİ YÖNETİMİ</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles/>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{ asset('assets/css/scrollspyNav.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/jquery-step/jquery.steps.css') }}">
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}

              /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }
    </style>
    <style>
        #map {
          height: 300px;
          width: 100%;
         }
      </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/users/account-setting.css') }}"/>

    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    
</head>
<body class="sidebar-noneoverflow">
    
    <!--  BEGIN NAVBAR  -->
    <x-topbar/>
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <x-navbar/>
        <!--  END TOPBAR  -->
        
        <!--  BEGIN CONTENT AREA  -->  
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <!-- CONTENT AREA -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4">
                            @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(Session::has("success"))
            <div class="alert alert-success">
                {{Session::get("success")}}
            </div>
        @endif
        @if(Session::has("calisanKayitli"))
            <div class="alert alert-danger">
                {{Session::get("calisanKayitli")}}
            </div>
        @endif
                            <div class="widget-one"> 
                                <div class="text-center"> 
                                    <h3 style="color:blue;text-decoration:underline;">MÜŞTERİ EKLE</h3>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="kisiBilgileri" class="section contact p-4" method="post" action="{{route('musteri.ekle')}}">
                                        @csrf
                                        <div id="example-basic">
                                            <h3>Ön Bilgiler</h3>
                                            <section>
                                              <div class="row py-3">
                                              <div class="col-3">
                                                <select class="form-control" name="mkayitturu" id="hk-kayitturu" onchange="changeFieldsMusteri(this.value)">
                                                  <option value="Kayıt Türü">Kayıt Türü</option>
                                                  <option value="Bireysel">Bireysel</option>
                                                  <option value="Ticari">Ticari</option>
                                                  <option value="Tedarikçi">Tedarikçi</option>
                                                  <option value="Müşteri Adayı">Müşteri Adayı</option>
                                                  <option value="Diğer">Diğer</option>
                                                </select>
                                              </div>
                                                <div class="col-3">
                                                    <select class="form-control" name="mturu" id="hk-mturu">
                                                        <option value="Müşteri Türü">Müşteri Türü</option>
                                                        <option value="Gerçek">Gerçek Kişi</option>
                                                        <option value="Tüzel">Tüzel Kişi</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input id="hk-marka" onkeyup="hkMarkaAdiBuyuk()" type="text" name="mtmarkaadi" placeholder="Marka Adı" class="form-control" required value="{{ old('mtmarkaadi') }}">
                                                  </div>
                                                <div class="col-3 bireyselbilgi">
                                                        <input id="hk-onunvan" onkeyup="hkOnUnvanBuyuk()" type="text" name="monunvan" placeholder="Unvanı" class="form-control" value="{{ old('monunvan') }}">
                                                </div>
                                                <div class="col-3 ticaribilgi">
                                                    <input id="hk-sube" type="text" name="mtsubeadi" placeholder="Şube Adı" class="form-control" value="{{ old('mtsubeadi') }}">
                                              </div>
                                                </div>
                                                <div class="row py-3">
              
                                                    <div class="col-3">
                                                        <input id="hk-vdaire" type="text" name="mvdairesi" placeholder="Vergi Dairesi" class="form-control" value="{{ old('mvdairesi') }}">
                                                    </div>
                                                  <div class="col-3">
                                                        <input id="hk-tcknvno" type="number" name="mtcknvno" placeholder="TCKN/Vergi No" class="form-control" required value="{{ old('mtcknvno') }}">
                                                  </div>

                                                  <div class="col-3 bireyselbilgi">
                                                    <input id="hk-ad" type="text" onkeyup="hkAdilkHarfBuyuk()" name="mbadi" placeholder="Adı" class="form-control" value="{{ old('mbadi') }}">
                                                  </div>
                                                  <div class="col-3 bireyselbilgi">
                                                        <input id="hk-soyad" type="text" onkeyup="hkSoyadBuyuk()" name="mbsoyadi" placeholder="Soyadı" class="form-control" value="{{ old('mbsoyadi') }}">
                                                  </div>
                                                  <div class="col-3 ticaribilgi">
                                                    <input id="hk-kisaltma" type="text" name="mtkisaltmasi" placeholder="Kısaltma" class="form-control" value="{{ old('mtkisaltmasi') }}">
                                                  </div>
                                                  <div class="col-3 ticaribilgi">
                                                        <input id="hk-tamunvan" type="text" name="firmatamunvan" placeholder="Firma Tam Unvan" class="form-control" value="{{ old('firmatamunvan') }}">
                                                  </div>
                                                </div> 
                                                <div class="row py-3">
                                                    <div class="col-3 bireyselbilgi">
                                                        <input id="hk-firma" onkeyup="hkCalistigiFirmaBuyuk()" type="text" name="mbfirmaadi" placeholder="Çalıştığı Firma" class="form-control" value="{{ old('mbfirmaadi') }}">
                                                      </div>
                                                      <div class="col-3 bireyselbilgi">
                                                            <input id="hk-unvan" onkeyup="hkUnvanBuyuk()" type="text" name="mbunvani" placeholder="Unvanı/Mesleği" class="form-control" value="{{ old('mbunvani') }}">
                                                      </div>  
                                                      <div class="col-3 bireyselbilgi">
                                                        <input id="hk-dogum" type="text" name="mbdogumgunu" placeholder="Doğum Tarihi" class="form-control" onfocus="(this.type='date')" value="{{ old('mbdogumgunu') }}">
                                                      </div>  
                                                      <div class="col-3 ticaribilgi">
                                                        <input id="hk-unvandevami" type="text" name="mtunvandevami" placeholder="Unvan Devamı" class="form-control" value="{{ old('mtunvandevami') }}">
                                                      </div>
                                                      <div class="col-3 ticaribilgi">
                                                            <input id="hk-ticaretsicil" type="number" name="mtsno" placeholder="Ticaret Sicil No" class="form-control" value="{{ old('mtsno') }}">
                                                      </div>

                                                      <div class="col-3 ticaribilgi">
                                                        <input id="hk-odasicil" type="number" name="mosno" placeholder="Oda Sicil No" class="form-control" value="{{ old('mosno') }}">
                                                      </div>
                                                      <div class="col-3 ticaribilgi">
                                                            <input id="hk-mersis" type="number" name="mmno" placeholder="Mersis No" class="form-control" value="{{ old('mmno') }}">
                                                      </div>
                                                </div>             
                                            </section>
                                            <h3>Banka ve İletişim Bilgileri</h3>
                                            <section>
                                                <div class="row py-3">
                                                    <div class="col-3">
                                                        <input id="hk-banka" onkeyup="hkBankaAdiBuyuk()" type="text" name="mbankadi" placeholder="Banka Adı" class="form-control" value="{{ old('mbankadi') }}">
                                                      </div>
                                                      <div class="col-3">
                                                            <input id="hk-iban" type="text" name="miban" placeholder="IBAN" class="form-control" value="{{ old('miban') }}">
                                                      </div>  
                                                    <div class="col-md-1 pr-0">
                                                        <div class="form-group">
                                                            <select class="placeholder js-states form-control" name="mukodutel">
                                                                <option value="90">+90</option>
                                                                <option value="49">+49</option>
                                                                <option value="1">+1</option>
                                                                <option value="7">+7</option>
                                                                <option value="380">+380</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="col-md-2 pl-1">
                                                    <div class="form-group">
                                                        <input type="text" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control mb-4" name="mmobil" id="phone" placeholder="Cep Telefonu" value="{{ old('mmobil') }}">
                                                    </div>
                                                </div> 
                                                <div class="col-3">
                                                    <input id="hk-mtel" name="mtel" input="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Telefon" class="form-control" value="{{ old('mtel') }}">
                                                </div>
                                            </div>
                                            <div class="row py-3">
                                                  <div class="col-3">
                                                    <input id="hk-eposta" type="email" name="meposta" placeholder="E-Posta" class="form-control" value="{{ old('meposta') }}">
                                                  </div>
                                                  <div class="col-3">
                                                    <input id="hk-website" type="text" name="mweb" placeholder="Web Site" class="form-control" value="{{ old('mweb') }}">
                                                  </div>  
                                                  <div class="col-3">
                                                    <input id="hk-fax" type="text" name="mfaks" placeholder="Faks" class="form-control" value="{{ old('mfaks') }}">
                                                  </div>
                                                </div>

                                            </section>
                                            <h3>Adres Bilgileri</h3>
                                            <section>
                                                <div class="row py-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control mb-4" id="madres" name="madres" placeholder="Adres" rows="2" value="{{ old('madres') }}"></textarea>
                                                        </div>
                                                    </div>  
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control mb-4" id="mnot" name="mnot" placeholder="Notlar" rows="2" value="{{ old('mnot') }}"></textarea>
                                                        </div>
                                                    </div>  
                                                </div> 
                                                <div class="row py-3">
                                                    <div class="col-2">
                                                        <input id="hk-bolge" type="text" onkeyup="hkBolgeBuyuk()" name="mbolge" placeholder="Bölge" class="form-control" value="{{ old('mbolge') }}">
                                                      </div>  
                                                    <div class="col-2">
                                                      <select id="Iller" name="mil" class="placeholder js-states form-control">
                                                        <option>Lütfen Bir İl Seçiniz</option>
                                                      </select>
                                                      </div>  
                                                      <div class="col-2">
                                                        <select id="Ilceler" disabled="disabled" name="milce" class="placeholder js-states form-control">
                                                          <option>Lütfen Bir İlçe Seçiniz</option>
                                                        </select>
                                                      </div>
                                                      <div class="col-3">
                                                        <input id="hk-enlem" type="hidden" name="menlem" placeholder="Enlem" class="form-control" value="{{ old('menlem') }}">
                                                      </div>  
                                                      <div class="col-3 pb-4">
                                                        <input id="hk-boylam" type="hidden" name="mboylam" placeholder="Boylam" class="form-control" value="{{ old('mboylam') }}">
                                                      </div>
                                                </div>
                                                <div class="py-3 row">
                                                    <div class="col-12" id="map"> <!-- GOOGLE HARİTALAR -->
                                                </div>
                                                <div class="account-settings-footer justify-content-center fixed-bottom">
                                                    <div class="as-footer-container text-center justify-content-center">
                                                        <button type="submit" class="btn btn-primary">Müşteriyi Ekle</button>
                                                    </div> 
                                                </div> 
                                            </section>
                                            
                                        </div>
                                    </form>
                                </div>
                               

                                
                            </div>    
                        </div>
                    </div>
                </div>
                <!-- CONTENT AREA -->
                
            </div>
            <!--<x-footer/>-->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <x-global-mandatory.scripts/>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    <script> // GOOGLE HARİTALAR
        function enlemBoylamDegis(enlem,boylam){
          $("#hk-enlem").attr("value",enlem);
          $("#hk-boylam").attr("value",boylam);    
        }
        let map, infoWindow;
        function handleLocationError(browserHasGeolocation, infoWindow, pos) {
          infoWindow.setPosition(pos);
          infoWindow.setContent(
            browserHasGeolocation
              ? "Error: Konum bilgileri alınamadı"
              : "Error: Tarayıcınız konum bilgilerinin alınmasına izin vermedi."
          );
          infoWindow.open(map);
        }
      
          function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 36.89241570427338, lng: 30.710640679285348 },
    zoom: 6,
  });
  infoWindow = new google.maps.InfoWindow();
  let marker = new google.maps.Marker();

  const locationButton = document.createElement("button");

  locationButton.textContent = "Bulunduğunuz konumu almak için tıklayınız.";
  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {

    marker.setMap(null); // marker'ı sıfırlar
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          marker = new google.maps.Marker({ // tıklanan konuma marker yerleştirir
            position: pos,
          });

          enlemBoylamDegis(pos.lat,pos.lng); // enlem ve boylam bilgilerini inputa verir.
          marker.setMap(map);
          map.setCenter(pos);
        },
        () => {
          handleLocationError(true, infoWindow, map.getCenter());
        }
      );
    } else {
      // Browser doesn't support Geolocation
      handleLocationError(false, infoWindow, map.getCenter());
    }
  });

  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    marker.setMap(null); // marker'ı sıfırlar
    marker = new google.maps.Marker({ // tıklanan konuma marker yerleştirir
      position: mapsMouseEvent.latLng,
    });

    var lat = JSON.stringify(mapsMouseEvent.latLng.toJSON().lat); // Seçilen konumun lat bilgisini alır.
    var lng = JSON.stringify(mapsMouseEvent.latLng.toJSON().lng); // Seçilen konumun lng bilgisini alır. 
    enlemBoylamDegis(lat,lng); // enlem ve boylam bilgilerini inputa verir.
    marker.setMap(map);
  });
}
        
        </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rnOaEVELsqt70bjd2up_KCHbg2RRnCk&callback=initMap" type="text/javascript"></script>

    <script>
        $(document).ready(function() {
            App.init();
            $(".ticaribilgi").hide();
        });
    </script>
    <script>
        $(".placeholder").select2({
    placeholder: "Make a Selection",
    allowClear: true
        });
    </script>
    <script src="{{ asset('plugins/highlight/highlight.pack.js') }}"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/js/scrollspyNav.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/jquery.steps.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-step/custom-jquery.steps.js') }}"></script>
    <script src="{{ asset('assets/js/inputController.js') }}"></script>
    <script src="{{ asset('assets/js/il-ilce-secme.js') }}"></script>
    <script src="{{ asset('assets/js/kisiBilgileri.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>