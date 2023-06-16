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
    <style>
        body {
            font-family: sans-serif;
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
    </style>
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/users/account-setting.css') }}"/>
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
                    @if(Session::has("eksikTel"))
                        <div class="alert alert-danger">
                            {{Session::get("eksikTel")}}
                        </div>
                    @endif
        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                <!-- CONTENT AREA -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4">
                            <div class="widget-one">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                            <div class="section-title">
                                                <h3>Profil Bilgileri</h3>
                                                <hr>
                                            </div>
                                        </div>
                                    </div>
                                    @if (session('tip') == 'Çalışan') <!-- Çalışan Güncelleme Kısmı -->
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="profilepic" style="border-radius: 20%;">
                                                <img class="profilepic__image" alt="Profil Resmi"
                                                    src="{{ $kullanici->cphoto }}" />
                                                <div class="profilepic__content">
                                                    <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                                                    <form method="post" action="{{ route('uploadPP') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" id="actual-btn" name="photo"
                                                         onchange="javascript:document.getElementById('upload_button').hidden = false;" hidden />
                                                        <label for="actual-btn" class="profilepic__text"> Fotoğrafı Düzenle</label>
                                                    
                                                </div>

                                            </div>
                                            <div id="upload_button_div"><button type="submit" id="upload_button" hidden>Yükle</button></div>
                                        </form>
                                        </div>

                                        <div class="col-9 px-4">
                                            <form id="kisiBilgileri" class="section contact" method="post" action="{{route('calisan.guncelle',["ctckn" => $kullanici->ctckn])}}" >
                                                @csrf
                                                @method("put")
                                                <div class="info bg-light">
                                                    <div class="row">
                                                        <div class="col-md-11 mx-auto">
                                                            <span class="badge badge-primary font-weight-bold w-100" style="font-size:20px;">Kişisel Bilgiler</span>
                                                            <div class="row">
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="ad">Ad</label>
                                                                        <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4"  name="cadi"  value="{{$kullanici->cadi}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="soyad">Soyad</label>
                                                                        <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="csoyadi"   value="{{$kullanici->csoyadi}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-3">
                                                                    <div class="form-group">
                                                                        <label for="tckn">TCKN</label>
                                                                        <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="ctckn" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$kullanici->ctckn}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="website1">Ünvan</label>
                                                                        <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="cunvani" id="website1" placeholder="Ünvan" value="{{$kullanici->cunvani}}" required>
                                                                    </div>
                                                                </div>
                                                                <div class="col-md-2">
                                                                    <div class="form-group">
                                                                        <label for="dg">Doğum Günü</label>
                                                                        <input onkeypress="guncelleGoster()" type="date" class="form-control mb-4"  name="cdogum" id="dogumgunu" value="{{$kullanici->cdogum}}" required>
                                                                    </div>
                                                                </div>
                                                                </div>
                                                                <hr>
                                                                <h3 style="text-decoration: underline;">İletişim Bilgileri</h3>
                                                                <div class="row">
                                                                    <div class="col-md-2 h-50 pr-0">
                                                                        <div class="form-group">
                                                                            <label for="phone">Ülke Kodu</label>
                                                                            <select onchange="guncelleGoster()" class="placeholder js-states form-control" name="ukodutel">
                                                                                <option>{{$kullanici->ukodutel}}</option>
                                                                                <option value="90">90</option>
                                                                                <option value="49">49</option>
                                                                                <option value="1">1</option>
                                                                                <option value="7">7</option>
                                                                                <option value="380">380</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="phone">Telefon Numarası</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" maxlength="10" class="form-control mb-4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ctel" id="phone" placeholder="Telefon Numarası" value="{{$kullanici->ctel}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="email">Eposta</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="ceposta" id="email" placeholder="Eposta" value="{{$kullanici->ceposta}}" required>
                                                                        </div>
                                                                    </div>
                                                                </div> 
                                                                <hr>
                                                                <h3 style="text-decoration: underline;">Adres Bilgileri</h3>
                                                                <div class="row">                                   
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="location">İl</label>
                                                                            <select onchange="guncelleGoster()" id="Iller" name="cevadresil" class="placeholder js-states form-control">
                                                                                <option>{{$kullanici->cevadresil}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="location">İlçe</label>
                                                                            <select onchange="guncelleGoster()" id="Ilceler" name="cevadresilce" class="placeholder js-states form-control">
                                                                                <option value="{{$kullanici->cevadresilce}}" selected>{{$kullanici->cevadresilce}}</option>
                                                                            </select>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group">
                                                                            <label for="location">Adres</label>
                                                                            <textarea onkeypress="guncelleGoster()" class="form-control mb-4" style="resize:none;" id="cevadres" name="cevadres" placeholder="Adres" rows="2">{{$kullanici->cevadres}}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <hr>
                                                                <h3 style="text-decoration: underline;">Hesap Bilgileri</h3>
                                                                <div class="row">
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="cbanka">Banka Adı</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" maxlength="11" class="form-control mb-4" name="cbanka" id="cbanka" placeholder="Banka Adı" value="{{$kullanici->cbanka}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="ciban">IBAN</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" maxlength="26"  class="form-control mb-4" name="ciban" id="ciban" placeholder="IBAN" value="{{$kullanici->ciban}}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-4">
                                                                        <div class="form-group">
                                                                            <label for="chesapno">Hesap No</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" maxlength="26"  class="form-control mb-4" name="chesapno" id="chesapno" placeholder="Hesap Numarası" value={{$kullanici->chesapno}}>
                                                                        </div>
                                                                    </div>   
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="account-settings-footer justify-content-center fixed-bottom hide d-none">
                                                    <div class="as-footer-container text-center justify-content-center">
                                                        <button type="submit" id="multiple-messages" class="btn btn-primary">Güncelle</button>
                                                    </div> 
                                                  </div>
                                            </form>
                                        </div>
                                    </div>
                                    <!-- Çalışan Güncelleme Kısmı -->
                                    <!-- Müşteri Güncelleme Kısmı -->
                                    @else 
                                        <div class="row">
                                            <div class="col-3">
                                                <div class="profilepic" style="border-radius: 20%;">
                                                    <img class="profilepic__image" alt="Profil Resmi"
                                                        src="{{ $musteri->mphoto }}" />
                                                    <div class="profilepic__content">
                                                        <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                                                        <form method="post" action="{{ route('uploadPP') }}"
                                                            enctype="multipart/form-data">
                                                            @csrf
                                                            <input type="file" id="actual-btn" name="photo"
                                                             onchange="javascript:document.getElementById('upload_button').hidden = false;" hidden />
                                                            <label for="actual-btn" class="profilepic__text"> Fotoğrafı Düzenle</label>
                                                        
                                                    </div>
    
                                                </div>
                                                <div id="upload_button_div"><button type="submit" id="upload_button" hidden>Yükle</button></div>
                                            </form>
                                            </div>
    
                                            <div class="col-9 px-4">
                                                <form id="kisiBilgileri" class="section contact" method="post" action="{{route('musteri.guncelle.profil',["mtcknvno" => $musteri->mtcknvno])}}" >
                                                    @csrf
                                                    @method("put")
                                                    <div class="info bg-light">
                                                        <div class="row">
                                                            <div class="col-md-11 mx-auto">
                                                                <span class="badge badge-primary font-weight-bold w-20" style="font-size:20px; text-decoration: underline;">Kişisel Bilgiler</span>
                                                                <hr>
                                                                <div class="row">
                                                                    <div class="col-md-3">
                                                                        <div class="form-group input field-wrapper">
                                                                            <label for="ad">Ad</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4"  name="mbadi"  value="{{$musteri->mbadi}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="soyad">Soyad</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="mbsoyadi"   value="{{$musteri->mbsoyadi}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-3">
                                                                        <div class="form-group">
                                                                            <label for="tckn">TCKN</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="mtcknvno" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$musteri->mtcknvno}}" readonly>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="website1">Ünvan</label>
                                                                            <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="cunvani" id="website1" placeholder="Ünvan" value="{{$musteri->cunvani}}" required>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2">
                                                                        <div class="form-group">
                                                                            <label for="dg">Doğum Günü</label>
                                                                            <input onkeypress="guncelleGoster()" type="date" class="form-control mb-4"  name="cdogum" id="dogumgunu" value="{{$musteri->cdogum}}" required>
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <hr>
                                                                    <h3 style="text-decoration: underline;">İletişim Bilgileri</h3>
                                                                    <div class="row">
                                                                        <div class="col-md-2 h-50 pr-0">
                                                                            <div class="form-group">
                                                                                <label for="phone">Ülke Kodu</label>
                                                                                <select onchange="guncelleGoster()" class="placeholder js-states form-control" name="ukodutel">
                                                                                    <option>{{$musteri->ukodutel}}</option>
                                                                                    <option value="90">90</option>
                                                                                    <option value="49">49</option>
                                                                                    <option value="1">1</option>
                                                                                    <option value="7">7</option>
                                                                                    <option value="380">380</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="phone">Telefon Numarası</label>
                                                                                <input onkeypress="guncelleGoster()" type="text" maxlength="10" class="form-control mb-4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ctel" id="phone" placeholder="Telefon Numarası" value="{{$musteri->ctel}}" required>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="email">Eposta</label>
                                                                                <input onkeypress="guncelleGoster()" type="text" class="form-control mb-4" name="ceposta" id="email" placeholder="Eposta" value="{{$musteri->ceposta}}" required>
                                                                            </div>
                                                                        </div>
                                                                    </div> 
                                                                    <hr>
                                                                    <h3 style="text-decoration: underline;">Adres Bilgileri</h3>
                                                                    <div class="row">                                   
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="location">İl</label>
                                                                                <select onchange="guncelleGoster()" id="Iller" name="cevadresil" class="placeholder js-states form-control">
                                                                                    <option>{{$musteri->cevadresil}}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-3">
                                                                            <div class="form-group">
                                                                                <label for="location">İlçe</label>
                                                                                <select onchange="guncelleGoster()" id="Ilceler" name="cevadresilce" class="placeholder js-states form-control">
                                                                                    <option value="{{$musteri->cevadresilce}}" selected>{{$musteri->cevadresilce}}</option>
                                                                                </select>
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-6">
                                                                            <div class="form-group">
                                                                                <label for="location">Adres</label>
                                                                                <textarea onkeypress="guncelleGoster()" class="form-control mb-4" style="resize:none;" id="cevadres" name="cevadres" placeholder="Adres" rows="2">{{$musteri->cevadres}}</textarea>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <h3 style="text-decoration: underline;">Hesap Bilgileri</h3>
                                                                    <div class="row">
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="cbanka">Banka Adı</label>
                                                                                <input onkeypress="guncelleGoster()" type="text" maxlength="11" class="form-control mb-4" name="cbanka" id="cbanka" placeholder="Banka Adı" value="{{$musteri->cbanka}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="ciban">IBAN</label>
                                                                                <input onkeypress="guncelleGoster()" type="text" maxlength="26"  class="form-control mb-4" name="ciban" id="ciban" placeholder="IBAN" value="{{$musteri->ciban}}">
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4">
                                                                            <div class="form-group">
                                                                                <label for="chesapno">Hesap No</label>
                                                                                <input onkeypress="guncelleGoster()" type="text" maxlength="26"  class="form-control mb-4" name="chesapno" id="chesapno" placeholder="Hesap Numarası" value={{$musteri->chesapno}}>
                                                                            </div>
                                                                        </div>   
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="account-settings-footer justify-content-center fixed-bottom hide d-none">
                                                        <div class="as-footer-container text-center justify-content-center">
                                                            <button type="submit" id="multiple-messages" class="btn btn-primary">Güncelle</button>
                                                        </div> 
                                                      </div>
                                                </form>
                                            </div>
                                        </div>
                                    @endif
                                    <!-- Müşteri Güncelleme Kısmı -->
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
        <x-global-mandatory.scripts />
        <script src="{{ asset('assets/js/inputController.js') }}"></script>
</body>

</html>
