<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - MÜŞTERİ YÖNETİMİ</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">
    <style>
        body {
            font-family: sans-serif;
        }

        #map {
            height: 300px;
            width: 100%;
        }

        .profilepic {
            position: relative;
            width: 100%;
            height: auto;
            border-radius: 50%;
            overflow: hidden;
            background-color: #111;
        }

        .profilepic:hover .profilepic__content {
            opacity: 1;
        }

        .profilepic:hover .profilepic__image {
            opacity: .5;
        }

        .profilepic__image {
            width: 100%;
            height: auto;
            object-fit: cover;
            opacity: 1;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            opacity: 0;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__icon {
            color: white;
            padding-bottom: 8px;
        }

        .fas {
            font-size: 20px;
        }

        .profilepic__text {
            text-transform: uppercase;
            font-size: 12px;
            width: 100%;
            text-align: center;
        }

        .profilepic__text {
            background-color: darkblue;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        #upload_button_div {
            text-align: center;
            margin-top: 5%;
        }

        #upload_button {
            text-align: center;
            margin-top: 5%;
            font-size: 16px;
            background-color: darkblue;
            color: white;
            padding: 0.5rem;
            border-radius: 0.3rem;
            font-family: sans-serif;
        }
        
        .iti--show-flags {
            width: 100%;
        }
    </style>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/users/account-setting.css') }}" />
    <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->

</head>

<body class="sidebar-noneoverflow">

    <!--  BEGIN NAVBAR  -->
    <x-topbar />
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN TOPBAR  -->
        <x-navbar />
        <!--  END TOPBAR  -->
        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        @if (Session::has('eksikTel'))
            <div class="alert alert-danger">
                {{ Session::get('eksikTel') }}
            </div>
        @endif
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                <div class="layout-px-spacing">
                    <div class="page-header">
                        <nav class="breadcrumb-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="javascript:void(0);"
                                        style="color:whitesmoke">MYS</a></li>
                                <li class="breadcrumb-item"><a href="javascript:void(0);"
                                        style="color:whitesmoke">Profil</a></li>
                            </ol>
                        </nav>
                    </div>
                    <!-- CONTENT AREA -->
                    <div class="container rounded bg-white mt-2 m-0">
                        @if (session('tip') == 'Çalışan')
                        <!-- Çalışan Güncelleme Kısmı -->
                        <div class="row">
                            <!-- Profil Resmi -->
                            <div class="col-3 mt-5">
                                <div class="profilepic" style="border-radius: 20%;">
                                    <img class="profilepic__image" alt="Profil Resmi"
                                    src="@if(session('tip') == 'Çalışan') {{ Storage::url('photos/') . session('kullanici')->cphoto }} @else {{ Storage::url('photos/') . session('kullanici')->mphoto }} @endif"                                        width="100%" height="200px" />
                                    <div class="profilepic__content">
                                        <span class="profilepic__icon"><i
                                                class="fas fa-camera"></i></span>
                                        <form method="post"
                                            action="{{ route('uploadPP', ['tip' => 'Çalışan']) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="actual-btn" name="photo"
                                                onchange="javascript:document.getElementById('upload_button').hidden = false;"
                                                hidden />
                                            <label for="actual-btn" class="profilepic__text">
                                                Fotoğrafı Düzenle</label>
                                    </div>
                                </div>
                                <div id="upload_button_div"><button type="submit"
                                        id="upload_button" hidden>Yükle</button></div>
                                </form>
                            </div>
                            <!-- Profil Resmi -->
                            <div class="col-md-9" box-shadow: none;>
                                <form id="kisiBilgileri" class="section contact" method="post"
                                action="{{ route('calisan.guncelle.profil', ['ctckn' => $kullanici->ctckn]) }}"> 
                                @csrf
                                @method('put')
                                <div class="p-3 py-5" style="box-shadow: none;">
                                    <div class="text-center mb-3">
                                        <h4>PROFİL BİLGİLERİ</h4>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100 mb-3" style="font-size:20px;">Kişisel Bilgiler</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="labels">Ad</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text"
                                                                class="form-control mb-4"
                                                                name="cadi"
                                                                value="{{ $kullanici->cadi }}"
                                                                readonly>
                                                            @error('cadi')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Soyad</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text"
                                                                class="form-control mb-4"
                                                                name="csoyadi"
                                                                value="{{ $kullanici->csoyadi }}"
                                                                readonly>
                                                            @error('csoyadi')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">TCKN</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text"
                                                                class="form-control mb-4"
                                                                name="ctckn"
                                                                onchange='return event.charCode >= 48 && event.charCode <= 57'
                                                                value="{{ $kullanici->ctckn }}"
                                                                readonly>
                                                            @error('ctckn')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Ünvan</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text"
                                                                class="form-control mb-4"
                                                                name="cunvani" id="calisan_unvan"
                                                                placeholder="Ünvan"
                                                                value="{{ $kullanici->cunvani }}">
                                                            @error('cunvani')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Doğum Günü</label>
                                            <input onchange="guncelleGoster()"
                                                                type="date"
                                                                class="form-control mb-4"
                                                                name="cdogum" id="dogumgunu"
                                                                value="{{ $kullanici->cdogum }}"
                                                                disabled>
                                                            @error('cdogum')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                    </div>
                                    <div class="row mt-2">   
                                        <span class="badge badge-primary font-weight-bold w-100" style="font-size:20px;">İletişim Bilgileri</span> 
                                        <div class="col-md-6">
                                            <label class="labels">Telefon Numarası</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text"
                                                                class="form-control mb-4"
                                                                name="ctel"
                                                                id="telefon_calisan"
                                                                placeholder="Telefon Numarası"
                                                                value="{{ $kullanici->ctel }}">
                                                            @error('ctel')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Eposta</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text"
                                                                class="form-control mb-4"
                                                                name="ceposta" id="email"
                                                                placeholder="Eposta"
                                                                value="{{ $kullanici->ceposta }}"
                                                                required>
                                                            @error('ceposta')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        </div>
                                        <div class="row mt-2"> 
                                        <span class="badge badge-primary font-weight-bold w-100" style="font-size:20px;">Adres Bilgileri</span>
                                        <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                                        <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                                        </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                                    </div>
                                </div>

                                <!-- Güncelle Butonu -->
                                <div class="account-settings-footer justify-content-center fixed-bottom hide d-none">
                                    <div class="as-footer-container text-center justify-content-center">
                                        <button type="submit" id="multiple-messages" class="btn btn-primary">Güncelle</button>
                                    </div>
                                </div>
                                 <!-- Güncelle Butonu -->

                            </form>
                            </div>
                        </div>
                        <!-- Çalışan Güncelleme Kısmı -->
                        <!-- Müşteri Güncelleme Kısmı -->
                         @else
                         <div class="row">
                            
                            <div class="col-3 d-flex flex-column" style="height: 200px;">
                                <div class="profilepic" style="border-radius: 20%;">
                                    <img class="profilepic__image" alt="Profil Resmi"
                                        src="@if (is_null(session('kullanici')->cphoto)) {{ asset('assets/img/90x90.jpg') }} @else {{ Storage::url('photos/') . session('kullanici')->cphoto }} @endif"
                                        width="100%" height="200px" />
                                    <div class="profilepic__content">
                                        <span class="profilepic__icon"><i
                                                class="fas fa-camera"></i></span>
                                        <form method="post"
                                            action="{{ route('uploadPP', ['tip' => 'Çalışan']) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="actual-btn" name="photo"
                                                onchange="javascript:document.getElementById('upload_button').hidden = false;"
                                                hidden />
                                            <label for="actual-btn" class="profilepic__text">
                                                Fotoğrafı Düzenle</label>
                                    </div>
                                </div>
                                <div id="upload_button_div"><button type="submit"
                                        id="upload_button" hidden>Yükle</button></div>
                                </form>
                            </div>
                            <div class="col-md-9 border-right">
                                <div class="p-3 py-5">
                                    <div class="d-flex justify-content-between align-items-center mb-3">
                                        <h4 class="text-right">Profile Settings</h4>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6"><label class="labels">Name</label><input type="text" class="form-control" placeholder="first name" value=""></div>
                                        <div class="col-md-6"><label class="labels">Surname</label><input type="text" class="form-control" value="" placeholder="surname"></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-12"><label class="labels">Mobile Number</label><input type="text" class="form-control" placeholder="enter phone number" value=""></div>
                                        <div class="col-md-12"><label class="labels">Address Line 1</label><input type="text" class="form-control" placeholder="enter address line 1" value=""></div>
                                        <div class="col-md-12"><label class="labels">Address Line 2</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-12"><label class="labels">Postcode</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-12"><label class="labels">State</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-12"><label class="labels">Area</label><input type="text" class="form-control" placeholder="enter address line 2" value=""></div>
                                        <div class="col-md-12"><label class="labels">Email ID</label><input type="text" class="form-control" placeholder="enter email id" value=""></div>
                                        <div class="col-md-12"><label class="labels">Education</label><input type="text" class="form-control" placeholder="education" value=""></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-md-6"><label class="labels">Country</label><input type="text" class="form-control" placeholder="country" value=""></div>
                                        <div class="col-md-6"><label class="labels">State/Region</label><input type="text" class="form-control" value="" placeholder="state"></div>
                                    </div>
                                    <div class="mt-5 text-center"><button class="btn btn-primary profile-button" type="button">Save Profile</button></div>
                                </div>
                            </div>
                        </div>
                        
                        @endif
                        <!-- Müşteri Güncelleme Kısmı -->
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
    <x-global-mandatory.scripts />
    <script src="{{ asset('assets/js/il-ilce-guncelleme.js') }}"></script>
    <script src="{{ asset('assets/js/inputController.js') }}"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rnOaEVELsqt70bjd2up_KCHbg2RRnCk&callback=initMap" type="text/javascript"></script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
<script>
    // GOOGLE HARİTALAR
    function enlemBoylamDegis(enlem, boylam) {
        $("#hk-enlem").attr("value", enlem);
        $("#hk-boylam").attr("value", boylam);
    }

    function initMap() {
        var enlem = document.getElementById("hk-enlem").value;
        var boylam = document.getElementById("hk-boylam").value;
        const myLatlng = {
            lat: parseFloat(enlem),
            lng: parseFloat(boylam)
        };

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

                        enlemBoylamDegis(pos.lat, pos.lng); // enlem ve boylam bilgilerini inputa verir.
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
            var lng = JSON.stringify(mapsMouseEvent.latLng.toJSON()
                .lng); // Seçilen konumun lng bilgisini alır. 
            enlemBoylamDegis(lat, lng); // enlem ve boylam bilgilerini inputa verir.
            marker.setMap(map);
        });
    }
</script>

<script>
    var calisanTelefon = document.querySelector("#telefon_calisan");
    var calisanTelefonHandler = window.intlTelInput(calisanTelefon, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        setCountry: "tr",
        initialCountry: "tr",
        preferredCountries: ["tr", "us", "gb"],
        separateDialCode: true,
        nationalMode: false,
    });

    calisanTelefon.addEventListener("change", function() {
        this.value = calisanTelefonHandler.getNumber();
    });
</script>

<script>
    var musteriTelefon = document.querySelector("#telefon_musteri");
    var musteriTelefonHandler = window.intlTelInput(musteriTelefon, {
        utilsScript: "https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/utils.js",
        setCountry: "tr",
        initialCountry: "tr",
        preferredCountries: ["tr", "us", "gb"],
        separateDialCode: true,
        nationalMode: false,
    });

    musteriTelefon.addEventListener("change", function() {
        this.value = musteriTelefonHandler.getNumber();
    });
</script>
   
</body>

</html>
