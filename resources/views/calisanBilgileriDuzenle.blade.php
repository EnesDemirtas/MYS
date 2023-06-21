<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - GÖREV YÖNETİMİ</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles/>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/dropify/dropify.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/users/account-setting.css') }}"/>
    
    <style>
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
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);"
                                    style="color:whitesmoke">MYS</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"
                                    style="color:whitesmoke">Görev Yönetimi</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);"
                                    style="color:whitesmoke">Çalışanlar</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="color:whitesmoke">{{$calisanlar->cadi}} {{$calisanlar->csoyadi}}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4">
                            <div class="widget-one">
                                <div class="text-center"> 
                                    <h3>ÇALIŞAN BİLGİLERİNİ GÜNCELLE</h3>
                                    <hr>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="kisiBilgileri" class="section contact" method="post" action="{{route('calisan.guncelle',["ctckn" => $calisanlar->ctckn])}}" >
                                        @csrf
                                        @method("put")
                                        <div class="info">
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <h3 style="text-decoration: underline;">Kişisel Bilgiler</h3>
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="ad">Ad</label>
                                                                <input type="text" class="form-control mb-4"  name="cadi"  value="{{$calisanlar->cadi}}" >
                                                                @error('cadi')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="soyad">Soyad</label>
                                                                <input type="text" class="form-control mb-4" name="csoyadi"   value="{{$calisanlar->csoyadi}}" >
                                                                @error('csoyadi')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="tckn">TCKN</label>
                                                                <input type="text" class="form-control mb-4" name="ctckn" onkeypress='return event.charCode >= 48 && event.charCode <= 57' value="{{$calisanlar->ctckn}}" >
                                                                @error('ctckn')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="website1">Ünvan</label>
                                                                <input type="text" class="form-control mb-4" name="cunvani" id="website1" placeholder="Ünvan" value="{{$calisanlar->cunvani}}" >
                                                                @error('cunvani')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="dg">Doğum Günü</label>
                                                                <input type="date" class="form-control mb-4"  name="cdogum" id="dogumgunu" value="{{$calisanlar->cdogum}}" >
                                                                @error('cdogum')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <hr>
                                                        <h3 style="text-decoration: underline;">İletişim Bilgileri</h3>
                                                        <div class="row">
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="phone">Telefon Numarası</label>
                                                                    <input type="text" maxlength="10" class="form-control mb-4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ctel" id="phone" placeholder="Telefon Numarası" value="{{$calisanlar->ctel}}" required>
                                                                    @error('ctel')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="email">Eposta</label>
                                                                    <input type="text" class="form-control mb-4" name="ceposta" id="email" placeholder="Eposta" value="{{$calisanlar->ceposta}}" >
                                                                    @error('ceposta')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div> 
                                                        <hr>
                                                        <h3 style="text-decoration: underline;">Adres Bilgileri</h3>
                                                        <div class="row">                                   
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="location">İl</label>
                                                                    <select id="Iller" name="cevadresil" class="placeholder js-states form-control">
                                                                        <option value="{{$calisanlar->cevadresil}}">{{$calisanlar->cevadresil}}</option>
                                                                    </select>
                                                                    @error('cevadresil')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <div class="form-group">
                                                                    <label for="location">İlçe</label>
                                                                    <select id="Ilceler" name="cevadresilce" class="placeholder js-states form-control">
                                                                        <option value="{{$calisanlar->cevadresil}}" selected> {{$calisanlar->cevadresilce}}</option>
                                                                    </select>
                                                                    @error('cevadresilce')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <div class="form-group">
                                                                    <label for="location">Adres</label>
                                                                    <textarea class="form-control mb-4" style="resize:none;" id="cevadres" name="cevadres" placeholder="Adres" rows="2">{{$calisanlar->cevadres}}</textarea>
                                                                    @error('cevadres')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <hr>
                                                        <h3 style="text-decoration: underline;">Hesap Bilgileri</h3>
                                                        <div class="row">
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="cbanka">Banka Adı</label>
                                                                    <input type="text" maxlength="11" class="form-control mb-4" name="cbanka" id="cbanka" placeholder="Banka Adı" value="{{$calisanlar->cbanka}}">
                                                                    @error('cbanka')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="ciban">IBAN</label>
                                                                    <input type="text" maxlength="26"  class="form-control mb-4" name="ciban" id="ciban" placeholder="IBAN" value="{{$calisanlar->ciban}}">
                                                                    @error('ciban')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div class="form-group">
                                                                    <label for="chesapno">Hesap No</label>
                                                                    <input type="text" maxlength="26"  class="form-control mb-4" name="chesapno" id="chesapno" placeholder="Hesap Numarası" value={{$calisanlar->chesapno}}>
                                                                    @error('chesapno')
                                                                    <p class="text-danger mt-1">{{ $message }}</p>
                                                                    @enderror
                                                                </div>
                                                            </div>   
                                                        </div>
                                                        <!-- Yetki ve hesap silme kısmı -->
                                                        @if(session('kullanici')->cyetki == '2')
                                                            <hr>
                                                            <div class="row">
                                                                <div class="col-4">
                                                                    <p class="text-danger"><b>İK: 0</b></p>
                                                                    <p class="text-secondary"><b>Saha Görevlisi: 1</b></p>
                                                                </div>
                                                                <div class="col-md-4">
                                                                    <div class="form-group">
                                                                        <label for="cyetki">Yetki</label>
                                                                        <input type="text" class="form-control mb-4" name="cyetki" id="cyetki" placeholder="Yetki" value="" >
                                                                        @error('cyetki')
                                                                        <p class="text-danger mt-1">{{ $message }}</p>
                                                                        @enderror
                                                                    </div>
                                                                    <div class="col-4"></div>
                                                                </div>   
                                                            </div>
                                                        @endif
                                                         <!-- Yetki ve hesap silme kısmı -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                        <div class="account-settings-footer justify-content-center fixed-bottom">
                                        <div class="as-footer-container justify-content-center text-center">
                                            <button type="submit" id="multiple-messages" class="btn btn-primary">Güncelle</button>
                                        </div>
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
    <script src="{{ asset('assets/js/il-ilce-secme.js') }}"></script>
    <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
    <script src="{{ asset('assets/js/inputController.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>