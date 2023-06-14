<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - KAYIT OL</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles />
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
</head>

<body class="form">

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">
                        <h1 class="">Anında yeni hesabınızı oluşturun</h1>
                        <p class="signup-link">Zaten bir hesabınız var mı? <a href="/musteri/giris_yap">Giriş yapın</a>
                        </p>
                        <form class="text-left" method="POST" action=" {{ route('register') }} ">
                            @csrf
                            <div class="form">
                                <div class="musteri-calisan-secme">
                                    <button type="button" id="musteri_buton" class="btn btn-primary btn-rounded mb-2"
                                        onclick="musteri_calisan(3)">Müşteri</button>
                                    <button type="button" id="calisan_buton"
                                        class="btn btn-outline-primary btn-rounded mb-2"
                                        onclick="musteri_calisan(4)">Çalışan</button>
                                </div>
                                <input type="text" style="display:none;" name="tip" id="tip" value="musteri"> <!-- Çalışanın mı yoksa müşterinin mi kaydının tutulacağını tutan input -->
                                <!-- musteri Kayıt-->
                                @error('gecersizTip')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                @error('mernis')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                <div id="musteri"><!-- Birinci Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="ad-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="ad" name="cadi" type="text"
                                                    class="form-control"placeholder="Ad">
                                                @error('ad')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                            
                                        </div>
                                        <div class="col-6">
                                            <div id="soyad-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="soyad" name="csoyadi" type="text"
                                                    class="form-control"placeholder="Soyad">
                                                @error('ad')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- İkinci Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="email-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-at-sign">
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                                </svg>
                                                <input id="email" name="email" type="text" value=""
                                                    placeholder="Email">
                                                @error('email')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="password-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-lock">
                                                    <rect x="3" y="11" width="18"
                                                        height="11" rx="2" ry="2"></rect>
                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                </svg>
                                                <input id="password" name="password" type="password" value=""
                                                    placeholder="Şifre">
                                                @error('password')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>        
                                    <!-- Üçüncü Satır --> 
                                    <div class="row">
                                        <div class="col-6">       
                                            <div id="tckn-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="tckn" name="tckn" type="text"
                                                    class="form-control" placeholder="TCKN">
                                                @error('tckn')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>  
                                        <div class="col-6">
                                            <div id="username-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="username" name="username" type="text"
                                                    class="form-control"placeholder="Kullanıcı Adı">
                                                @error('username')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>   
                                        </div>
                                    </div>
                                    <!-- Dördüncü Satır -->
                                    <div class="row">
                                        <div class="col-6">     
                                            <div id="dogumgunu" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-calendar">
                                                    <rect x="3" y="4" width="18"
                                                        height="18" rx="2" ry="2" />
                                                    <line x1="16" y1="2" x2="16"
                                                        y2="6" />
                                                    <line x1="8" y1="2" x2="8"
                                                        y2="6" />
                                                    <line x1="3" y1="10" x2="21"
                                                        y2="10" />
                                                </svg>
                                                <input id="dogumgunu" name="dogumgunu" type="date">
                                                @error('dogumgunu')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">  
                                            <div id="telefon-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-phone">
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                                </svg>
                                                <input id="telefon" name="telefon" type="text"
                                                    placeholder="Telefon Numarası">
                                                @error('telefon')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Üçüncü Satır --> 
                                    <div class="row">
                                        <div class="col-6">       
                                            <div id="tckn-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="tckn" name="tckn" type="text"
                                                    class="form-control" placeholder="TCKN">
                                                @error('tckn')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div> 
                                    </div>
                                    <!-- Adres Kısmı -->
                                        <div id="adres-field" class="row field-wrapper input mb-2">
                                            <div class="col-2 pr-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-map-pin" style="top: 7px; right: -30;">
                                                    <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                                    <circle cx="12" cy="10" r="3" />
                                                </svg>
                                            </div>
                                            <div class="col-5 ">
                                                <select id="Iller" name="cevadresil"
                                                    class="placeholder js-states form-control">
                                                    <option>Lütfen Bir İl Seçiniz</option>
                                                </select>
                                            </div>
                                            <div class="col-5">
                                                <select id="Ilceler" disabled="disabled" name="cevadresilce"
                                                    class="placeholder js-states form-control">
                                                    <option>Lütfen Bir İlçe Seçiniz</option>
                                                </select>
                                                @error('adres')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    
                                    <div class="uyelik_kosullari">
                                        <div class="row">
                                            <div class="col-1 my-auto">
                                                <input type="checkbox">
                                            </div>
                                            <div class="col-10">
                                                <div class="field-wrapper terms_condition my-auto">
                                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                                        <div data-toggle="modal" data-target="#modal_default">
                                                            <span class="text-primary" style="cursor:pointer;">Üyelik koşullarını</span> <span>kabul ediyorum.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="modal_default" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="exampleModalLabel">Üyelik Şartları</h5>
                                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          SBE Mühendislik şu hakları saklı tutar:
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                                <!-- Modal -->
                                <!-- musteri Kayıt-->
                                <!-- calisan Kayıt-->
                                <div id="calisan">
                                </div>
                                <!-- calisan Kayıt-->
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Şifreyi göster</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Üye Ol</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <div class="d-flex align-item-center">
                            <!-- Terms and conditions -->
                            <p class="terms-conditions" style="bottom: 5px;">© 2023 Tüm hakları saklıdır. <a
                                    href="#">DAKIK</a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="form-image">
            <div class="l-image">
            </div>
        </div>
    </div>


    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <x-global-mandatory.scripts />
    <script src="{{ asset('assets/js/login-register.js') }}"></script>
    <script src="{{ asset('assets/js/il-ilce-secme.js') }}"></script>

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/authentication/form-1.js') }}"></script>
    <script src="{{ asset('assets/js/kisiBilgileri.js') }}"></script>
    <script src="{{ asset('assets/js/inputController.js') }}"></script>

    <script>
    // GOOGLE HARİTALAR
        function enlemBoylamDegis(enlem,boylam){
                $("#hk-enlem").attr("value",enlem);
                $("#hk-boylam").attr("value",boylam);    
              }
              let map, infoWindow;
      
                function initMap() {
                  map = new google.maps.Map(document.getElementById("map"), {
          center: { lat: 36.89241570427338, lng: 30.710640679285348 },
          zoom: 6,
        });
        infoWindow = new google.maps.InfoWindow();
        let marker = new google.maps.Marker();
      
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
</body>

</html>
