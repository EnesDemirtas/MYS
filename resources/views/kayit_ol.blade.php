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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/css/intlTelInput.css">

    <style>
        #map {
            height: 300px;
            width: 100%;
        }
        .iti__flag-container {
            position: absolute;
            top: 0;
            bottom: 0;
            right: 0;
            padding-bottom: 10px;
        }
        .iti--separate-dial-code .iti__selected-flag {
            background-color: rgb(0 0 0 / 0%);
        }
    </style>
</head>

<body class="form">

    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container p-1">
                    <div class="form-content">
                        <h1 class="">Anında yeni hesabınızı oluşturun</h1>
                        <p class="signup-link">Zaten bir hesabınız var mı? <a href="{{ route('giris_yap') }}">Giriş
                                yapın</a>
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
                                <input type="text" style="display:none;" name="tip" id="tip"
                                    value="musteri">
                                <!-- Çalışanın mı yoksa müşterinin mi kaydının tutulacağını tutan input -->
                                <!-- musteri Kayıt-->
                                @error('gecersizTip')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                @error('mernis')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                <div id="musteri" style="display:block;">
                                    <!-- Birinci Satır -->
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
                                                <input id="ad" name="mbadi" type="text"
                                                    class="form-control" placeholder="Ad" value="{{ old('mbadi') }}">
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
                                                <input id="soyad" name="mbsoyadi" type="text"
                                                    class="form-control"placeholder="Soyad" value="{{ old('mbsoyadi') }}">
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
                                                <input id="email" name="meposta" type="text" value="{{ old('meposta') }}"
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
                                                <input id="msifre" name="msifre" type="password" value="{{ old('msifre') }}"
                                                    placeholder="Şifre" style="width:98% !important">
                                                    <i class="far
                                                    fa-eye"
                                                    id="togglePasswordMusteri" style="margin-left: -30px; cursor: pointer; font-size:20px; color:#1C8ADB;"></i>
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
                                                <input id="tckn" name="mtcknvno" type="text"
                                                    class="form-control" placeholder="TCKN" value="{{ old('mtcknvno') }}">
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
                                                <input id="username" name="mkullaniciadi" type="text"
                                                    class="form-control"placeholder="Kullanıcı Adı" value="{{ old('mkullaniciadi') }}">
                                                @error('username')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Dördüncü Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="dogumgunu-field" class="field-wrapper input">
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
                                                <input id="dogumgunu" name="mbdogumgunu" type="date" value="{{ old('mbdogumgunu') }}">
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
                                                {{-- <input id="telefon" name="mtel" type="text"
                                                    placeholder="Telefon Numarası"> --}}
                                                <input id="telefon_musteri" name="mtel" type="tel" />

                                                @error('telefon')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Firma Bilgileri Kısmı -->
                                    <div class="row">
                                        <div class="col-12 text-center p-0">
                                            <h3><span class="badge badge-primary font-weight-bold w-100"
                                                    style="font-size:20px;">Firma Bilgileriniz</span></h3>
                                        </div>
                                    </div>
                                    <!-- Birinci Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="kayitturu-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <select class="form-control form-control-sm text-center"
                                                    name="mkayitturu" id="hk-kayitturu"
                                                    onchange="changeFields(this.value)" value="{{ old('mkayitturu') }}">
                                                    <option value="Kayıt Türü">Kayıt Türü</option>
                                                    <option value="Bireysel">Bireysel</option>
                                                    <option value="Ticari">Ticari</option>
                                                    <option value="Tedarikçi">Tedarikçi</option>
                                                    <option value="Müşteri Adayı">Müşteri Adayı</option>
                                                    <option value="Diğer">Diğer</option>
                                                </select>
                                                @error('kayitturu')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="tcknkayitturu-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="hk-tcknvno" type="number" name="mtcknvno"
                                                    placeholder="Vergi No" class="form-control form-control-sm"
                                                    value="{{ old('mtcknvno') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- İkinci Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="markaadi-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="hk-marka" type="text" name="mtmarkaadi"
                                                    onkeyup="hkMarkaAdiBuyuk()" placeholder="Marka Adı"
                                                    class="form-control form-control-sm"
                                                    value="{{ old('mtmarkaadi') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="unvan-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="hk-unvan" type="text" name="mbunvani"
                                                    onkeyup="hkUnvanBuyuk()" placeholder="Ünvan"
                                                    class="form-control form-control-sm"
                                                    value="{{ old('mbunvani') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Üçüncü Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="faks-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="hk-fax" type="text" name="mfaks"
                                                    placeholder="Faks" class="form-control"
                                                    value="{{ old('mfaks') }}">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="website-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="30"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="hk-website" type="text" name="mweb"
                                                    placeholder="Web Site" class="form-control"
                                                    value="{{ old('mweb') }}">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Google Haritalar -->
                                    <div class="row">
                                        <div class="col-12 text-center p-0">
                                            <h3><span class="badge badge-primary font-weight-bold w-100"
                                                    style="font-size:20px;">Adres Bilgileri</span></h3>
                                        </div>
                                    </div>
                                    <div class="row mt-2">
                                        <div role="button" id="anlikKonum" class="btn btn-light"><svg
                                                xmlns="http://www.w3.org/2000/svg"
                                                xmlns:xlink="http://www.w3.org/1999/xlink" fill="#de1717"
                                                version="1.1" id="Capa_1" width="800px" height="800px"
                                                viewBox="0 0 395.71 395.71" xml:space="preserve" stroke="#006eff">
                                                <g id="SVGRepo_bgCarrier" stroke-width="0" />
                                                <g id="SVGRepo_tracerCarrier" stroke-linecap="round"
                                                    stroke-linejoin="round" />
                                                <g id="SVGRepo_iconCarrier">
                                                    <g>
                                                        <path
                                                            d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z" />
                                                    </g>
                                                </g>
                                            </svg>
                                        </div>
                                        <div class="col-1">
                                            <input id="hk-enlem" type="hidden" name="menlem" placeholder="Enlem"
                                                value="{{ old('menlem') }}">
                                        </div>
                                        <div class="col-1">
                                            <input id="hk-boylam" type="hidden" name="mboylam" placeholder="Boylam"
                                                value="{{ old('mboylam') }}">
                                        </div>
                                        <div class="col-12" id="map">
                                            <!-- GOOGLE HARİTALAR -->
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12 p-0">
                                            <textarea
                                                placeholder="Adres bilgilerinizi giriniz. Örn: Muratpaşa, Kızılarık Mah. Yanık Apt. No: 5/11, Köroğlu Bulvarı, 07310 Antalya"
                                                class="form-control mt-2" name="madres" id="hk-adres" rows="3" value="{{ old('madres') }}"
                                                style=" resize: none !important;"></textarea>
                                        </div>
                                    </div>
                                    <!-- Adres Kısmı -->
                                    <div id="adres-field" class="row field-wrapper input mb-2">
                                        
                                        <div class="col-4 ">
                                            <select id="Iller" name="mil"
                                                class="placeholder js-states form-control" value="{{ old('mil') }}">
                                                <option>İl</option>
                                            </select>
                                        </div>
                                        <div class="col-4">
                                            <select id="Ilceler" disabled="disabled" name="milce"
                                                class="placeholder js-states form-control" value="{{ old('milce') }}">
                                                <option>İlçe</option>
                                            </select>
                                            @error('adres')
                                                <p class="text-danger mt-1">{{ $message }}</p>
                                            @enderror
                                        </div>
                                        <div class="col-4">
                                            <div id="bolge-field" class="field-wrapper input mb-2 pt-0">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="30"
                                                viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                class="feather feather-map-pin" style="top: 10px; right: 90;">
                                                <path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z" />
                                                <circle cx="12" cy="10" r="3" />
                                                </svg>
                                                <input id="mbolge" type="text" name="mbolge"
                                                    placeholder="Bölge" class="form-control pb-0"
                                                    value="{{ old('mbolge') }}">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="uyelik_kosullari">
                                        <div class="row">
                                            <div class="col-1 my-auto">
                                                <label class="switch s-primary">
                                                    <input type="checkbox" id="toggle-uyelik-kosullari"
                                                        class="d-none" value="isaretlenmemis">
                                                    <span class="slider round" onclick=""></span>
                                                </label>
                                            </div>
                                            <div class="col-10">
                                                <div class="field-wrapper terms_condition my-auto">
                                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                                        <div data-toggle="modal" data-target="#modal_default">
                                                            <span class="text-primary" style="cursor:pointer;">Üyelik
                                                                koşullarını</span> <span>kabul ediyorum.</span>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- musteri Kayıt-->
                                <!-- calisan Kayıt-->
                                <div id="calisan" style="display:none;">
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="cad-field" class="field-wrapper input">
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
                                            <div id="csoyad-field" class="field-wrapper input">
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
                                            <div id="cemail-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-at-sign">
                                                    <circle cx="12" cy="12" r="4"></circle>
                                                    <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                                </svg>
                                                <input id="email" name="ceposta" type="text" value=""
                                                    placeholder="Email">
                                                @error('email')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="cpassword-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-lock">
                                                    <rect x="3" y="11" width="18"
                                                        height="11" rx="2" ry="2"></rect>
                                                    <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                                </svg>
                                                <input id="csifre" name="csifre" type="password" class="form-control" placeholder="Şifre" style="width: 98% !important">
                                            <i class="far fa-eye" id="togglePasswordCalisan" style="margin-left: -30px; cursor: pointer;font-size:20px; color:#1C8ADB;"></i>
                                                @error('password')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Üçüncü Satır -->
                                    <div class="row">
                                        <div class="col-6">
                                            <div id="ctckn-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="tckn" name="ctckn" type="text"
                                                    class="form-control" placeholder="TCKN">
                                                @error('tckn')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="cusername-field" class="field-wrapper input">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <input id="username" name="ckullaniciadi" type="text"
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
                                            <div id="cdogumgunu" class="field-wrapper input">
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
                                                <input id="dogumgunu" name="cdogum" type="date">
                                                @error('dogumgunu')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div id="ctelefon-field" class="field-wrapper input mb-2">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class="feather feather-phone">
                                                    <path
                                                        d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z" />
                                                </svg>
                                                {{-- <input id="telefon" name="ctel" type="text"
                                                    placeholder="Telefon Numarası"> --}}
                                                <input id="telefon_calisan" name="ctel" type="tel" />
                                                @error('telefon')
                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- calisan Kayıt-->
                                <div class="d-sm-flex justify-content-between">
                                    {{-- <div class="field-wrapper toggle-pass">
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                        <p class="d-inline-block">Şifreyi göster</p>
                                    </div> --}}
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
                        <!-- Modal -->
                        <div class="modal fade" id="modal_default" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Üyelik Şartları</h5>
                                        <button type="button" class="close" data-dismiss="modal"
                                            aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        SBE Mühendislik şu hakları saklı tutar:
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-danger"
                                            data-dismiss="modal">Kapat</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->
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
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rnOaEVELsqt70bjd2up_KCHbg2RRnCk&callback=initMap" type="text/javascript"></script>
    <script>
        // GOOGLE HARİTALAR
        function enlemBoylamDegis(enlem, boylam) {
            $("#hk-enlem").attr("value", enlem);
            $("#hk-boylam").attr("value", boylam);
        }
        let map, infoWindow;

        function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
                center: {
                    lat: 36.89241570427338,
                    lng: 30.710640679285348
                },
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

                            enlemBoylamDegis(pos.lat, pos.lng); // enlem ve boylam bilgilerini inputa verir.
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
                var lng = JSON.stringify(mapsMouseEvent.latLng.toJSON()
                    .lng); // Seçilen konumun lng bilgisini alır. 
                enlemBoylamDegis(lat, lng); // enlem ve boylam bilgilerini inputa verir.
                marker.setMap(map);
            });
        }

        const togglePasswordMusteri = document.querySelector('#togglePasswordMusteri');
        const passwordMusteri = document.querySelector('#msifre');

        togglePasswordMusteri.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordMusteri.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordMusteri.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const togglePasswordCalisan = document.querySelector('#togglePasswordCalisan');
        const passwordCalisan = document.querySelector('#csifre');

        togglePasswordCalisan.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordCalisan.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordCalisan.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>
    <script src="https://cdn.jsdelivr.net/npm/intl-tel-input@18.1.1/build/js/intlTelInput.min.js"></script>
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
</body>

</html>
