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
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lobster&family=Roboto:wght@300&family=Tilt+Prism&display=swap" rel="stylesheet">
    <!-- Google Fonts -->

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

        @media (max-width: 776px){
            .col-3 {
                flex: none;
                max-width: 100%;
            }

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
                    <div class="container rounded bg-white mt-2 m-0 mb-5">
                        @if (session('tip') == 'Çalışan')
                        <!-- Çalışan Güncelleme Kısmı -->
                        <div class="row">
                            <!-- Profil Resmi -->
                            <div class="col-3 mt-5">
                                <div id="profil-kontrol">
                                <div class="profilepic">
                                    <img class="profilepic__image" alt="Profil Resmi"
                                    src="@if(session('tip') == 'Çalışan') {{ Storage::url('photos/') . session('kullanici')->cphoto }} @else {{ Storage::url('photos/') . session('kullanici')->mphoto }} @endif" width="100%" height="200px" />
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
                                    <div id="upload_button_div">
                                        <button type="submit" id="upload_button" hidden>Yükle</button>
                                    </div>
                                </form>
                                <div id="kullanici-bilgileri-pp" class="text-center">
                                    <span class="font-weight-bold text-primary" style="font-family: 'Lobster', cursive; font-size:1.3rem;">{{ session('kullanici')->cadi}} {{session('kullanici')->csoyadi}}</span>
                                    <p class="text-black-50 font-weight-bold" style="font-family: 'Roboto', sans-serif; font-size:1.3rem;"> @if (session('kullanici')->cyetki == "0") İnsan Kaynakları Görevlisi @elseif (session('kullanici')->cyetki == "1") Saha Çalışanı Görevlisi @elseif (session('kullanici')->cyetki == "2") Sistem Admini @else Müşteri @endif</p>
                                </div>
                                </div>
                            </div>
                            <!-- Profil Resmi -->
                            <div class="col-md-9 pb-5 pt-3">
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
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
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
                                        <div class="col-md-4">
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
                                                                value="{{ $kullanici->cunvani }}"
                                                                readonly>
                                                            @error('cunvani')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-6">
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
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100" style="font-size:20px;">İletişim Bilgileri</span>
                                    </div>
                                    <div class="row mt-2">   
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
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100" style="font-size:20px;">Adres Bilgileri</span>
                                    </div>
                                    <div class="row mt-2"> 
                                        <div class="col-md-6">
                                            <label class="labels">İl</label>
                                            <select onchange="guncelleGoster()"
                                                                id="Iller" name="cevadresil"
                                                                class="placeholder js-states form-control"
                                                                value="{{ $kullanici->cevadresil }}">
                                                                <option
                                                                    value="{{ $kullanici->cevadresil }}">
                                                                    {{ $kullanici->cevadresil }}
                                                                </option>
                                                            </select>
                                                            @error('cevadresil')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">İlçe</label>
                                            <select onchange="guncelleGoster()"
                                                                id="Ilceler" name="cevadresilce"
                                                                class="placeholder js-states form-control"
                                                                value="{{ $kullanici->cevadresilce }}">
                                                                <option
                                                                    value="{{ $kullanici->cevadresilce }}"
                                                                    selected>
                                                                    {{ $kullanici->cevadresilce }}
                                                                </option>
                                                            </select>
                                                            @error('cevadresilce')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Adres</label>
                                            <textarea onchange="guncelleGoster()" class="form-control mb-4" style="resize:none;" id="cevadres"
                                                                name="cevadres" placeholder="Adres" rows="2">{{ $kullanici->cevadres }}</textarea>
                                                            @error('cevadres')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100" style="font-size:20px;">Hesap Bilgileri</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <label class="labels">Banka Adı</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text" maxlength="11"
                                                                class="form-control mb-4"
                                                                name="cbanka" id="cbanka"
                                                                placeholder="Banka Adı"
                                                                value="{{ $kullanici->cbanka }}">
                                                            @error('cbanka')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">IBAN</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text" maxlength="26"
                                                                class="form-control mb-4"
                                                                name="ciban" id="ciban"
                                                                placeholder="IBAN"
                                                                value="{{ $kullanici->ciban }}">
                                                            @error('ciban')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">Hesap No</label>
                                            <input onchange="guncelleGoster()"
                                                                type="text" maxlength="26"
                                                                class="form-control mb-4"
                                                                name="chesapno" id="chesapno"
                                                                placeholder="Hesap Numarası"
                                                                value={{ $kullanici->chesapno }}>
                                                            @error('chesapno')
                                                                <p class="text-danger mt-1">
                                                                    {{ $message }}</p>
                                                            @enderror
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            Hesabı Sil
                                        </button>
                                    </div>  
                                    <!-- Button trigger modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <div class="modal-title row" id="exampleModalLabel">
                                                <div class="col-md-1 text-center p-0 pt-3">
                                                    <span><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_nnVnwmne5l.json"  background="transparent"  speed="1"  style="width: 100px; height: 40px; display:inline-block"  loop autoplay></lottie-player></span> 
                                                </div>
                                                <div class="col-md-11 text-center pt-2"> <b style="font-family: 'Roboto', sans-serif; font-size:1.2rem">Hesabınızı silmek istediğinizden emin misiniz?</b></div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="font-size:1rem; font-weight: 400;">Hesabınızı gerçekten kalıcı olarak inaktif hale getirmeyi mi düşünüyorsunuz yoksa yanlışlıkla mı bastınız? Hesabınızı silmeniz durumunda
                                                hesabınız inaktif hale gelecektir ve hizmetlerimizden yararlanamayacaksınız. Daha sonra tekrar 
                                                </p>
                                            </div>
                                            <div class="modal-footer" style="justify-content: space-between;">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">İptal</button>
                                            <a class="btn btn-danger" href="{{ route('profile.delete', ['tip' => session('tip'), 'id' => $kullanici->csatirid]) }}">Hesabı Sil</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    
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
                            
                            <div class="col-3 mt-5">
                                <div id="profil-kontrol">
                                <div class="profilepic">
                                    <img class="profilepic__image" alt="Profil Resmi"
                                    src="@if(session('tip') == 'Çalışan') {{ Storage::url('photos/') . session('kullanici')->cphoto }} @else {{ Storage::url('photos/') . session('kullanici')->mphoto }} @endif" width="100%" height="200px" />
                                    <div class="profilepic__content">
                                        <span class="profilepic__icon"><i
                                                class="fas fa-camera"></i></span>
                                        <form method="post"
                                            action="{{ route('uploadPP', ['tip' => 'Müşteri']) }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <input type="file" id="actual-btn" name="photo"
                                                onchange="javascript:document.getElementById('upload_button').hidden = false;"
                                                hidden />
                                            <label for="actual-btn" class="profilepic__text">
                                                Fotoğrafı Düzenle</label>
                                    </div>
                                </div>
                                    <div id="upload_button_div">
                                        <button type="submit" id="upload_button" hidden>Yükle</button>
                                    </div>
                                </form>
                                <div id="kullanici-bilgileri-pp" class="text-center">
                                    <span class="font-weight-bold text-primary" style="font-family: 'Lobster', cursive; font-size:1.3rem;">{{ session('kullanici')->mbadi}} {{session('kullanici')->mbsoyadi}}</span>
                                    <p class="text-black-50 font-weight-bold" style="font-family: 'Roboto', sans-serif; font-size:1.3rem;"> @if (session('kullanici')->cyetki == "0") İnsan Kaynakları Görevlisi @elseif (session('kullanici')->cyetki == "1") Saha Çalışanı Görevlisi @elseif (session('kullanici')->cyetki == "2") Sistem Admini @else {{session('kullanici')->mbunvani}} @endif</p>
                                </div>
                                </div>
                            </div>

                            <div class="col-md-9 pb-5 pt-3">
                                <form id="kisiBilgileri" class="section contact" method="post"action="{{ route('musteri.guncelle.profil', ['mtcknvno' => $musteri->mtcknvno]) }}">
                                    @csrf
                                    @method('put')
                                <div class="p-3 py-5">
                                    <div class="text-center mb-3">
                                        <h4>PROFİL BİLGİLERİ</h4>
                                    </div>
                                    <hr>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100 mb-2" style="font-size:20px;">Kişisel Bilgiler</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-4">
                                            <label class="labels">Ad</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mbadi"
                                                        value="{{ $musteri->mbadi }}" readonly>
                                                    @error('mbadi')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">Soyad</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mbsoyadi"
                                                        value="{{ $musteri->mbsoyadi }}" readonly>
                                                    @error('mbsoyadi')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">TCKN</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mtcknvno"
                                                        onchange='return event.charCode >= 48 && event.charCode <= 57'
                                                        value="{{ $musteri->mtcknvno }}" readonly>
                                                    @error('mtcknvno')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Ünvan</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mbunvani" id="website1"
                                                        placeholder="Ünvan"
                                                        value="{{ $musteri->mbunvani }}" required>
                                                    @error('mbunvani')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Doğum Günü</label>
                                            <input onchange="guncelleGoster()"
                                                        type="date" class="form-control mb-4"
                                                        name="mbdogumgunu" id="dogumgunu"
                                                        value="{{ $musteri->mbdogumgunu }}"
                                                        readonly>
                                                    @error('mbdogumgunu')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100 mb-2" style="font-size:20px;">İletişim Bilgileri</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12">
                                            <label class="labels">Telefon Numarası</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        onchange='return event.charCode >= 48 && event.charCode <= 57'
                                                        name="mtel" id="telefon_musteri"
                                                        placeholder="Telefon Numarası"
                                                        value="{{ $musteri->mtel }}" required>
                                                    @error('mtel')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Eposta</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="meposta" id="meposta"
                                                        placeholder="Eposta"
                                                        value="{{ $musteri->meposta }}" required>
                                                    @error('meposta')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100 mb-2" style="font-size:20px;">Adres Bilgileri</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div role="button" id="anlikKonum"
                                                class="btn btn-light"><svg
                                                    xmlns="http://www.w3.org/2000/svg"
                                                    xmlns:xlink="http://www.w3.org/1999/xlink"
                                                    fill="#de1717" version="1.1" id="Capa_1"
                                                    width="800px" height="800px"
                                                    viewBox="0 0 395.71 395.71"
                                                    xml:space="preserve" stroke="#006eff">
                                                    <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                                    <g id="SVGRepo_tracerCarrier"
                                                        stroke-linecap="round"
                                                        stroke-linejoin="round" />
                                                    <g id="SVGRepo_iconCarrier">
                                                        <g>
                                                            <path
                                                                d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z" />
                                                        </g>
                                                    </g>
                                                </svg>
                                            </div>
                                        <div class="col-md-12">
                                            <div class="col-1">
                                                <input id="hk-enlem" type="hidden"
                                                    name="menlem" placeholder="Enlem"
                                                    value="{{ $musteri->menlem }}">
                                                @error('meposta')
                                                    <p class="text-danger mt-1">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-1">
                                                <input id="hk-boylam" type="hidden"
                                                    name="mboylam" placeholder="Boylam"
                                                    value="{{ $musteri->mboylam }}">
                                                @error('meposta')
                                                    <p class="text-danger mt-1">
                                                        {{ $message }}</p>
                                                @enderror
                                            </div>
                                            <div class="col-12" onclick="guncelleGoster()"
                                                id="map">
                                                <!-- GOOGLE HARİTALAR -->
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">İl</label>
                                            <select onchange="guncelleGoster()"
                                                        id="Iller" name="mil"
                                                        class="placeholder js-states form-control"
                                                        value="{{ $musteri->mil }}">
                                                        <option value="{{ $musteri->mil }}"
                                                            selected>{{ $musteri->mil }}</option>
                                                    </select>
                                                    @error('mil')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">İlçe</label>
                                            <select onchange="guncelleGoster()"
                                                        id="Ilceler" name="milce"
                                                        class="placeholder js-states form-control"
                                                        value="{{ $musteri->milce }}">
                                                        <option value="{{ $musteri->milce }}"
                                                            selected>{{ $musteri->milce }}</option>
                                                    </select>
                                                    @error('milce')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label class="labels">Bölge</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mbolge" id="mbolge"
                                                        placeholder="Banka Adı"
                                                        value="{{ $musteri->mbolge }}">
                                                    @error('mbolge')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-12">
                                            <label class="labels">Adres</label>
                                            <textarea onchange="guncelleGoster()" class="form-control mb-4" style="resize:none;" id="madres"
                                                        name="madres" placeholder="Adres" rows="2">{{ $musteri->madres }}</textarea>
                                                    @error('madres')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100 mb-2" style="font-size:20px;">Hesap Bilgileri</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="labels">Banka Adı</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mbankadi" id="mbankadi"
                                                        placeholder="Banka Adı"
                                                        value="{{ $musteri->mbankadi }}">
                                                    @error('mbankadi')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">IBAN</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" maxlength="26"
                                                        class="form-control mb-4" name="miban"
                                                        id="miban" placeholder="IBAN"
                                                        value="{{ $musteri->miban }}">
                                                    @error('miban')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <span class="badge badge-primary font-weight-bold w-100 mb-2"style="font-size:20px;">Firma Bilgileri</span>
                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-6">
                                            <label class="labels">Müşteri Türü</label>
                                            <select
                                                        class="form-control form-control text-center"
                                                        name="mkayitturu" id="hk-kayitturu"
                                                        onchange="guncelleGoster()"
                                                        value="{{ $musteri->mkayitturu }}">
                                                        <option value="{{ $musteri->mkayitturu }}"
                                                            selected>{{ $musteri->mkayitturu }}
                                                        </option>
                                                        <option value="Bireysel">Bireysel</option>
                                                        <option value="Ticari">Ticari</option>
                                                        <option value="Tedarikçi">Tedarikçi
                                                        </option>
                                                        <option value="Müşteri Adayı">Müşteri Adayı
                                                        </option>
                                                        <option value="Diğer">Diğer</option>
                                                    </select>
                                                    @error('mkayitturu')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Firma Adı</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mbfirmaadi" id="mbfirmaadi"
                                                        placeholder="Firma Adı"
                                                        value="{{ $musteri->mbfirmaadi }}">
                                                    @error('mbfirmaadi')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Web Adresi</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mweb" id="mweb"
                                                        placeholder="Örn: www.sbemuhendislik.com"
                                                        value="{{ $musteri->mweb }}">
                                                    @error('mweb')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                        <div class="col-md-6">
                                            <label class="labels">Faks</label>
                                            <input onchange="guncelleGoster()"
                                                        type="text" class="form-control mb-4"
                                                        name="mfaks" id="mfaks"
                                                        placeholder="Faks"
                                                        value="{{ $musteri->mfaks }}">
                                                    @error('mfaks')
                                                        <p class="text-danger mt-1">
                                                            {{ $message }}</p>
                                                    @enderror
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                    <!-- Button trigger modal -->
                                    <div class="text-center">
                                        <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal">
                                            Hesabı Sil
                                        </button>
                                    </div>  
                                    <!-- Button trigger modal -->
                                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <div class="modal-title row" id="exampleModalLabel">
                                                <div class="col-md-1 text-center p-0 pt-3">
                                                    <span><lottie-player src="https://assets2.lottiefiles.com/packages/lf20_nnVnwmne5l.json"  background="transparent"  speed="1"  style="width: 100px; height: 40px; display:inline-block"  loop autoplay></lottie-player></span> 
                                                </div>
                                                <div class="col-md-11 text-center pt-2"> <b style="font-family: 'Roboto', sans-serif; font-size:1.2rem">Hesabınızı silmek istediğinizden emin misiniz?</b></div>
                                            </div>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-body">
                                                <p style="font-size:1rem; font-weight: 400;">Hesabınızı gerçekten kalıcı olarak inaktif hale getirmeyi mi düşünüyorsunuz yoksa yanlışlıkla mı bastınız? Hesabınızı silmeniz durumunda
                                                hesabınız inaktif hale gelecektir ve hizmetlerimizden yararlanamayacaksınız. Daha sonra tekrar 
                                                </p>
                                            </div>
                                            <div class="modal-footer" style="justify-content: space-between;">
                                            <button type="button" class="btn btn-primary" data-dismiss="modal">İptal</button>
                                            <a class="btn btn-danger" href="{{ route('profile.delete', ['tip' => session('tip'), 'id' => $musteri->id]) }}">Hesabı Sil</a>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->
                                </div>
                            </div>
                            <!-- Güncelle Butonu -->
                            <div class="account-settings-footer justify-content-center fixed-bottom hide d-none">
                                <div class="as-footer-container text-center justify-content-center">
                                    <button type="submit" id="multiple-messages"
                                        class="btn btn-primary">Güncelle</button>
                                </div>
                            </div>
                            <!-- Güncelle Butonu -->
                        </form>
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
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
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
