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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">MYS</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Görev Yönetimi</a></li>
                            <li class="breadcrumb-item active"><a href="javascript:void(0);">Çalışanlar</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">{{$calisanlar->cadi}} {{$calisanlar->csoyadi}}</a></li>
                        </ol>
                    </nav>
                </div>
                <div class="row">
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
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4">
                            <div class="widget-one">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="kisiBilgileri" class="section contact" method="post" action="{{route('calisan.guncelle',["ctckn" => $calisanlar->ctckn])}}" >
                                        @csrf
                                        @method("put")
                                        <div class="info">
                                            <h5 style="text-decoration: underline;">Çalışan Bilgilerini Güncelleme</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="ad">Ad</label>
                                                                <input type="text" class="form-control mb-4"  name="cadi"  value="{{$calisanlar->cadi}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="soyad">Soyad</label>
                                                                <input type="text" class="form-control mb-4" name="csoyadi"   value="{{$calisanlar->csoyadi}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="tckn">TCKN</label>
                                                                <input type="text" class="form-control mb-4" name="ctckn"   value="{{$calisanlar->ctckn}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="dg">Doğum Günü</label>
                                                                <input type="text" class="form-control mb-4"  name="cdogum" id="dogumgunu" value="{{$calisanlar->cdogum}}" readonly>
                                                            </div>
                                                        </div>
                                                        </div>
                                                        <hr>
                                                        <div class="row">
                                                            <div class="col-md-1 pr-0">
                                                                <div class="form-group">
                                                                    <label for="phone">Ülke Kodu</label>
                                                                    <select class="placeholder js-states form-control" name="ukodutel">
                                                                        <option>{{$calisanlar->ukodutel}}</option>
                                                                        <option value="90">90</option>
                                                                        <option value="49">49</option>
                                                                        <option value="1">1</option>
                                                                        <option value="7">7</option>
                                                                        <option value="380">380</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="phone">Telefon Numarası</label>
                                                                <input type="text" class="form-control mb-4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' name="ctel" id="phone" placeholder="Telefon Numarası" value="{{$calisanlar->ctel}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div class="form-group">
                                                                <label for="email">Eposta</label>
                                                                <input type="text" class="form-control mb-4" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' name="ceposta" id="email" placeholder="Eposta" value="{{$calisanlar->ceposta}}" required>
                                                            </div>
                                                        </div>                                    
                                                        <div class="col-md-2">
                                                            <div class="form-group">
                                                                <label for="website1">Ünvan</label>
                                                                <input type="text" class="form-control mb-4" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' name="cunvani" id="website1" placeholder="Ünvan" value="{{$calisanlar->cunvani}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">İl</label>
                                                                <input type="text" class="form-control mb-4" id="cevadresil" onkeyup="ilAdresiBuyuk()" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' name="cevadresil" id="location" placeholder="Adres - İl" value="{{$calisanlar->cevadresil}}" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">İlçe</label>
                                                                <input type="text" class="form-control mb-4" id="cevadresilce" onkeyup="ilceAdresiBuyuk()" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' name="cevadresilce" id="location" placeholder="Adres - İlçe" value="{{$calisanlar->cevadresilce}}" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-settings-footer justify-content-center fixed-bottom">
                                    <div class="as-footer-container justify-content-center text-center">
                                            <button type="submit" id="multiple-messages" class="btn btn-primary">Güncelle</button>
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