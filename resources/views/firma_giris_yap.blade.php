<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - Giriş Yap</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}">
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles />
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body class="">


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class=""><a href="#"><span class="brand-name">HOŞGELDİNİZ</span></a></h1>
                        <p class="signup-link mb-1">Burada yeni misiniz? <a href="/kayit_ol">Yeni bir hesap
                                oluşturun</a></p>
                        <div class="field-wrapper">
                            <p class="signup-link mb-3">Hizmetlerimizden yararlanmak mı istiyorsunuz? <a
                                    href="/teklif_ekle_giris">Teklif Oluşturun </a> </p>
                        </div>
                        @if (Session::has('success'))
                            <div class="alert alert-success">
                                {{ Session::get('success') }}
                            </div>
                        @endif

                        @if (Session::has('aktivasyon_basarili'))
                            <div class="alert alert-success">
                                {{ Session::get('aktivasyon_basarili') }}
                            </div>
                        @endif
                        <form class="text-left" method="POST" action=" {{ route('login') }} ">
                            <div class="musteri-calisan-secme">
                                <button type="button" id="musteri_buton" class="btn btn-primary btn-rounded mb-2"
                                    onclick="musteri_calisan(1)">Müşteri</button>
                                <button type="button" id="calisan_buton"
                                    class="btn btn-outline-primary btn-rounded mb-2"
                                    onclick="musteri_calisan(2)">Çalışan</button>
                            </div>
                            @csrf
                            <input type="text" style="display:none;" name="tip" id="tip" value="Müşteri">
                            <!-- Çalışanın mı yoksa müşterinin mi girişinin yapılacağını tutan input -->
                            <div class="">
                                <!--Müşteri Girişi-->
                                <div id="musteri" style="display:block;">
                                    <div class="field-wrapper input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <input id="mkullaniciadi" name="mkullaniciadi" type="text"
                                            class="form-control" value="{{ old('mkullaniciadi') }}"
                                            placeholder="Müşteri Kullanıcı Adı/TCKN">

                                        @error('mkullaniciadi')
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field-wrapper input mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                            <rect x="3" y="11" width="18" height="11"
                                                rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input id="msifre" name="msifre" type="password" class="form-control"
                                            placeholder="Şifre" style="width:98% !important">
                                        <i class="far
                                            fa-eye"
                                            id="togglePasswordMusteri"
                                            style="margin-left: -30px; cursor: pointer; font-size:20px; color:#1C8ADB;"></i>

                                        @error('msifre')
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                        @if (Session::has('sifre_degistirme_basarili'))
                                            <div class="alert alert-success">
                                                {{ Session::get('sifre_degistirme_basarili') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--Müşteri Girişi-->
                                <!--Çalışan Girişi-->
                                <div id="calisan" style="display:none;">
                                    <div class="field-wrapper input">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-user">
                                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                            <circle cx="12" cy="7" r="4"></circle>
                                        </svg>
                                        <input id="ckullaniciadi" name="ckullaniciadi" type="text"
                                            class="form-control" value="{{ old('ckullaniciadi') }}"
                                            placeholder="Çalışan Kullanıcı Adı/TCKN">

                                        @error('ckullaniciadi')
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field-wrapper input mb-2">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-lock">
                                            <rect x="3" y="11" width="18" height="11"
                                                rx="2" ry="2"></rect>
                                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                        </svg>
                                        <input id="csifre" name="csifre" type="password" class="form-control"
                                            placeholder="Şifre" style="width: 98% !important">
                                        <i class="far
                                            fa-eye"
                                            id="togglePasswordCalisan"
                                            style="margin-left: -30px; cursor: pointer;font-size:20px; color:#1C8ADB;"></i>
                                        @error('csifre')
                                            <p class="text-danger mt-1">{{ $message }}</p>
                                        @enderror
                                        @if (Session::has('sifre_degistirme_basarili'))
                                            <div class="alert alert-success">
                                                {{ Session::get('sifre_degistirme_basarili') }}
                                            </div>
                                        @endif
                                    </div>
                                </div>
                                <!--Çalışan Girişi-->
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper toggle-pass">
                                        <p class="d-inline-block">Şifreyi Göster</p>
                                        <label class="switch s-primary">
                                            <input type="checkbox" id="toggle-password" class="d-none">
                                            <span class="slider round"></span>
                                        </label>
                                    </div>
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Giriş
                                            Yap</button>
                                    </div>

                                </div>

                                <div class="field-wrapper text-center keep-logged-in">
                                    <div class="n-chk new-checkbox checkbox-outline-primary">
                                        <label class="new-control new-checkbox checkbox-outline-primary">
                                            <input type="checkbox" class="new-control-input" name="remember">
                                            <span class="new-control-indicator"></span>Oturumu açık tut
                                        </label>
                                    </div>
                                </div>

                                <div class="field-wrapper">
                                    <a href="/sifre_yenileme" class="forgot-pass-link">Şifrenizi mi unuttunuz?</a>
                                </div>

                            </div>
                        </form>
                        <div class="d-flex align-item-center">
                            <!-- Terms and conditions -->
                            <p class="terms-conditions" style="bottom: 5px;">© 2022 Tüm hakları saklıdır. <a
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
    <script src="{{ asset('assets/js/login-register.js') }}"></script>
    <x-global-mandatory.scripts />

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/authentication/form-1.js') }}"></script>

    <script>
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

</body>

</html>
