<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - ŞİFRE YENİLEME</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles />
    <link href="{{ asset('assets/css/authentication/form-1.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/switches.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/css/all.min.css">
</head>

<body class="form">


    <div class="form-container">
        <div class="form-form">
            <div class="form-form-wrap">
                <div class="form-container">
                    <div class="form-content">

                        <h1 class="">Şifre Yenileme</h1>
                        <p class="signup-link">E-posta adresinize gelen aktivasyon kodunu giriniz.</p>
                        <form class="text-left" action="{{ route('new_password') }}" method="POST">
                            @csrf
                            @method('POST')
                            <div class="form">

                                <div id="email-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-at-sign">
                                        <circle cx="12" cy="12" r="4"></circle>
                                        <path d="M16 8v5a3 3 0 0 0 6 0v-1a10 10 0 1 0-3.92 7.94"></path>
                                    </svg>
                                    <input id="aktivasyonkodu" name="aktivasyonkodu" type="text"
                                        value="{{ old('aktivasyonkodu') }}" placeholder="Aktivasyon Kodu">
                                </div>
                                @error('aktivasyonkodu')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                <div id="p1-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password" name="password" type="password" value=""
                                        placeholder="Şifre" style="width: 90% !important">
                                    <i class="far
                                        fa-eye"
                                        id="togglePasswordCalisan" style="margin-left: -30px; cursor: pointer;"></i>
                                </div>
                                @error('password')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                <div id="p2-field" class="field-wrapper input">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                                        <rect x="3" y="11" width="18" height="11" rx="2"
                                            ry="2"></rect>
                                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                                    </svg>
                                    <input id="password_confirmation" name="password_confirmation" type="password"
                                        value="" placeholder="Şifre Tekrar" style="width: 90% !important">
                                    <i class="far
                                        fa-eye"
                                        id="togglePasswordCalisanTekrar"
                                        style="margin-left: -30px; cursor: pointer;"></i>
                                </div>
                                @error('password_confirmation')
                                    <p class="text-danger mt-1">{{ $message }}</p>
                                @enderror
                                <input name="email" type="hidden" value="{{ $eposta }}">
                                <div class="d-sm-flex justify-content-between">
                                    <div class="field-wrapper">
                                        <button type="submit" class="btn btn-primary" value="">Yenile</button>
                                    </div>
                                </div>

                            </div>
                        </form>
                        <p class="terms-conditions">© 2022 Tüm hakları saklıdır. <a href="mys_index.html">DAKIK</a>

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

    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{ asset('assets/js/authentication/form-1.js') }}"></script>

    <script>
        const togglePasswordCalisan = document.querySelector('#togglePasswordCalisan');
        const passwordCalisan = document.querySelector('#password');

        togglePasswordCalisan.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordCalisan.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordCalisan.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });

        const togglePasswordCalisanTekrar = document.querySelector('#togglePasswordCalisanTekrar');
        const passwordCalisanTekrar = document.querySelector('#password_confirmation');

        togglePasswordCalisanTekrar.addEventListener('click', function(e) {
            // toggle the type attribute
            const type = passwordCalisanTekrar.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordCalisanTekrar.setAttribute('type', type);
            // toggle the eye slash icon
            this.classList.toggle('fa-eye-slash');
        });
    </script>

</body>

</html>
