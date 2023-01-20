<!DOCTYPE html>
<html lang="tr">
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
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="kisiBilgileri" class="section contact p-4" method="post" action="{{route('musteri.guncelle',["mtcknvno" => $musteri->mtcknvno])}}">
                                        @csrf
                                        @method("PUT")
                                        <div id="example-basic">
                                            <h3>Ön Bilgiler</h3>
                                            <section>
                                              <div class="row py-3">
                                              <div class="col-3">
                                                <select class="form-control" name="mkayitturu" id="hk-kayitturu" onchange="changeFieldsMusteri(this.value)">
                                                  <option value="Kayıt Türü">Kayıt Türü</option>
                                                  <option value="Bireysel" {{ $musteri->mkayitturu == 'Bireysel' ? 'selected' : '' }}>Bireysel</option>
                                                  <option value="Ticari" {{ $musteri->mkayitturu == 'Ticari' ? 'selected' : '' }}>Ticari</option>
                                                  <option value="Tedarikçi" {{ $musteri->mkayitturu == 'Tedarikçi' ? 'selected' : '' }}>Tedarikçi</option>
                                                  <option value="Müşteri Adayı" {{ $musteri->mkayitturu == 'Müşteri Adayı' ? 'selected' : '' }}>Müşteri Adayı</option>
                                                  <option value="Diğer" {{ $musteri->mkayitturu == 'Diğer' ? 'selected' : '' }}>Diğer</option>
                                                </select>
                                              </div>
                                                <div class="col-3">
                                                    <select class="form-control" name="mturu" id="hk-mturu">
                                                        <option value="Müşteri Türü">Müşteri Türü</option>
                                                        <option value="Gerçek" {{ $musteri->mturu == 'Gerçek' ? 'selected' : '' }}>Gerçek Kişi</option>
                                                        <option value="Tüzel" {{ $musteri->mturu == 'Tüzel' ? 'selected' : '' }}>Tüzel Kişi</option>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input id="hk-marka" onkeyup="hkMarkaAdiBuyuk()" type="text" name="mtmarkaadi" placeholder="Marka Adı" value="{{ $musteri->mtmarkaadi }}" class="form-control" required>
                                                  </div>
                                                <div class="col-3 bireyselbilgi">
                                                        <input id="hk-onunvan" type="text" onkeyup="hkOnUnvanBuyuk()" name="monunvan" placeholder="Unvanı" value="{{ $musteri->monunvan }}" class="form-control">
                                                </div>
                                                <div class="col-3 ticaribilgi">
                                                    <input id="hk-sube" type="text" name="mtsubeadi" placeholder="Şube Adı" value="{{ $musteri->mtsubeadi }}" class="form-control">
                                              </div>
                                                </div>
                                                <div class="row py-3">
              
                                                    <div class="col-3">
                                                        <input id="hk-vdaire" type="text" name="mvdairesi" placeholder="Vergi Dairesi" value="{{ $musteri->mvdairesi }}" class="form-control">
                                                    </div>
                                                  <div class="col-3">
                                                        <input id="hk-tcknvno" type="number" name="mtcknvno" placeholder="TCKN/Vergi No" value="{{ $musteri->mtcknvno }}" class="form-control" required>
                                                  </div>

                                                  <div class="col-3 bireyselbilgi">
                                                    <input id="hk-ad" type="text" name="mbadi" onkeyup="hkAdilkHarfBuyuk()" placeholder="Adı" value="{{ $musteri->mbadi }}" class="form-control">
                                                  </div>
                                                  <div class="col-3 bireyselbilgi">
                                                        <input id="hk-soyad" type="text" onkeyup="hkSoyadBuyuk()" name="mbsoyadi" placeholder="Soyadı" value="{{ $musteri->mbsoyadi }}" class="form-control">
                                                  </div>
                                                  <div class="col-3 ticaribilgi">
                                                    <input id="hk-kisaltma" type="text" name="mtkisaltmasi" placeholder="Kısaltma" value="{{ $musteri->mtkisaltmasi }}" class="form-control">
                                                  </div>
                                                  <div class="col-3 ticaribilgi">
                                                        <input id="hk-tamunvan" type="text" name="firmatamunvan" placeholder="Firma Tam Unvan" value="{{ $musteri->firmatamunvan }}" class="form-control">
                                                  </div>
                                                </div> 
                                                <div class="row py-3">
                                                    <div class="col-3 bireyselbilgi">
                                                        <input id="hk-firma" onkeyup="hkCalistigiFirmaBuyuk()" type="text" name="mbfirmaadi" placeholder="Çalıştığı Firma" value="{{ $musteri->mbfirmaadi }}" class="form-control">
                                                      </div>
                                                      <div class="col-3 bireyselbilgi">
                                                            <input id="hk-unvan" type="text" onkeyup="hkUnvanBuyuk()" name="mbunvani" placeholder="Unvanı/Mesleği" value="{{ $musteri->mbunvani }}" class="form-control">
                                                      </div>  
                                                      <div class="col-3 bireyselbilgi">
                                                        <input id="hk-dogum" type="text" name="mbdogumgunu" placeholder="Doğum Tarihi" value="{{ date('d.m.Y', strtotime($musteri->mbdogumgunu)) }}" class="form-control" onfocus="(this.type='date')">
                                                      </div>  
                                                      <div class="col-3 ticaribilgi">
                                                        <input id="hk-unvandevami" type="text" name="mtunvandevami"  placeholder="Unvan Devamı" value="{{ $musteri->mtunvandevami }}" class="form-control">
                                                      </div>
                                                      <div class="col-3 ticaribilgi">
                                                            <input id="hk-ticaretsicil" type="number" name="mtsno" placeholder="Ticaret Sicil No" value="{{ $musteri->mtsno }}" class="form-control">
                                                      </div>

                                                      <div class="col-3 ticaribilgi">
                                                        <input id="hk-odasicil" type="number" name="mosno" placeholder="Oda Sicil No" value="{{ $musteri->mosno }}" class="form-control">
                                                      </div>
                                                      <div class="col-3 ticaribilgi">
                                                            <input id="hk-mersis" type="number" name="mmno" placeholder="Mersis No" value="{{ $musteri->mmno }}" class="form-control">
                                                      </div>
                                                </div>             
                                            </section>
                                            <h3>Banka ve İletişim Bilgileri</h3>
                                            <section>
                                                <div class="row py-3">
                                                    <div class="col-3">
                                                        <input id="hk-banka" onkeyup="hkBankaAdiBuyuk()" type="text" name="mbankadi" placeholder="Banka Adı" value="{{ $musteri->mbankadi }}" class="form-control">
                                                      </div>
                                                      <div class="col-3">
                                                            <input id="hk-iban" type="text" name="miban" placeholder="IBAN" value="{{ $musteri->miban }}" class="form-control">
                                                      </div>  
                                                    <div class="col-md-1 pr-0">
                                                        <div class="form-group">
                                                            <select class="placeholder js-states form-control" name="mukodutel">
                                                                <option value="90" {{ $musteri->mukodutel == '90' ? 'selected' : '' }}>+90</option>
                                                                <option value="49" {{ $musteri->mukodutel == '49' ? 'selected' : '' }}>+49</option>
                                                                <option value="1" {{ $musteri->mukodutel == '1' ? 'selected' : '' }}>+1</option>
                                                                <option value="7" {{ $musteri->mukodutel == '7' ? 'selected' : '' }}>+7</option>
                                                                <option value="380" {{ $musteri->mukodutel == '380' ? 'selected' : '' }}>+380</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="col-md-2 pl-1">
                                                    <div class="form-group">
                                                        <input type="text" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control mb-4" name="mmobil" value="{{ str_replace($musteri->mukodutel, '', $musteri->mmobil) }}" id="phone" placeholder="Cep Telefonu" >
                                                    </div>
                                                </div> 
                                                <div class="col-3">
                                                    <input id="hk-mtel" name="mtel" input="text" onkeypress='return event.charCode >= 48 && event.charCode <= 57' placeholder="Telefon" value="{{ $musteri->mtel }}" class="form-control">
                                                </div>
                                            </div>
                                            <div class="row py-3">
                                                <div class="col-3">
                                                    <input id="hk-eposta" type="email" name="meposta" placeholder="E-Posta" value="{{ $musteri->meposta }}" class="form-control">
                                                  </div>
                                                  <div class="col-3">
                                                    <input id="hk-website" type="text" name="mweb" placeholder="Web Site" value="{{ $musteri->mweb }}" class="form-control">
                                                  </div>  
                                                  <div class="col-3">
                                                    <input id="hk-fax" type="text" name="mfaks" placeholder="Faks" value="{{ $musteri->mfaks }}" class="form-control">
                                                  </div>
                                                </div>

                                            </section>
                                            <h3>Adres Bilgileri</h3>
                                            <section>
                                                <div class="row py-3">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control mb-4" id="madres" name="madres" placeholder="Adres" rows="2">{{ $musteri->madres }}</textarea>
                                                        </div>
                                                    </div>  
                                                    
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <textarea class="form-control mb-4" id="mnot" name="mnot" placeholder="Notlar" rows="2">{{ $musteri->mnot }}</textarea>
                                                        </div>
                                                    </div>  
                                                </div> 
                                                <div class="row py-3">
                                                    <div class="col-2">
                                                        <input id="hk-bolge" type="text" onkeyup="hkBolgeBuyuk()" name="mbolge" placeholder="Bölge" value="{{ $musteri->mbolge }}" class="form-control">
                                                      </div>  
                                                      <div class="col-2">
                                                        <select id="Iller" name="mil" class="placeholder js-states form-control">
                                                          <option>{{ $musteri->mil }}</option>
                                                        </select>
                                                      </div>  
                                                      <div class="col-2">
                                                        <select id="Ilceler" disabled="disabled" name="milce" class="placeholder js-states form-control">
                                                          <option>{{ $musteri->milce }}</option>
                                                        </select>
                                                      </div>
                                                      <div class="col-3">
                                                        <input id="hk-enlem" type="hidden" name="menlem" placeholder="Enlem" value="{{ $musteri->menlem }}" class="form-control">
                                                      </div>  
                                                      <div class="col-3">
                                                        <input id="hk-boylam" type="hidden" name="mboylam" placeholder="Boylam" value="{{ $musteri->mboylam }}" class="form-control">
                                                      </div>
                                                </div> 
                                                <div role="button" id="anlikKonum" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#de1717" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 395.71 395.71" xml:space="preserve" stroke="#006eff"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <g> <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z"/> </g> </g></svg>                            
                                                </div>
                                                <div class="py-3 row">
                                                    <div class="col-12" id="map"> <!-- GOOGLE HARİTALAR -->
                                                </div>
                                                <div class="account-settings-footer justify-content-center fixed-bottom">
                                                    <div class="as-footer-container text-center justify-content-center">
                                                        <button type="submit" id="multiple-messages" class="btn btn-primary">Güncelle</button>
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

    <script> // GOOGLE HARİTALAR
        function enlemBoylamDegis(enlem,boylam){
          $("#hk-enlem").attr("value",enlem);
          $("#hk-boylam").attr("value",boylam);    
        }
      
          function initMap() {
           var enlem = document.getElementById("hk-enlem").value;
           var boylam = document.getElementById("hk-boylam").value;
        const myLatlng = { lat: parseFloat(enlem), lng: parseFloat(boylam) };
      
        const map = new google.maps.Map(document.getElementById('map'), {
          zoom: 7,
          center: myLatlng,
        });
      
        let marker = new google.maps.Marker({
          position: myLatlng,
          map,
          title: "KONUM",
          });

          const locationButton = document.getElementById("anlikKonum");

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
        }
      );
    }
  });
      
        // Configure the click listener.
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
    <x-global-mandatory.scripts/>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
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
    <script src="{{ asset('assets/js/kisiBilgileri.js') }}"></script>
    <script src="{{ asset('assets/js/il-ilce-secme.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>