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
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4">
                            <div class="widget-one">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="kisiBilgileri" class="section contact">
                                        <div class="info">
                                            <h5 class="">Kişi Bilgileri</h5>
                                            <div class="row">
                                                <div class="col-md-11 mx-auto">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="ad">Ad</label>
                                                                <input type="text" class="form-control mb-4"  name="ad" placeholder="Ad" value="{{$calisanlar->cadi}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="soyad">Soyad</label>
                                                                <input type="text" class="form-control mb-4" name="soyad"  placeholder="Soyad" value="{{$calisanlar->csoyadi}}" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="location">Adres</label>
                                                                <input type="text" class="form-control mb-4" name="adres" id="location" placeholder="Adres" value="{{$calisanlar->cevadresil}}" >
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="phone">Telefon Numarası</label>
                                                                <input type="text" class="form-control mb-4" name="telefon" id="phone" placeholder="Telefon Numarası" value="{{$calisanlar->ctel}}">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="email">Eposta</label>
                                                                <input type="text" class="form-control mb-4" name="eposta" id="email" placeholder="Eposta" value="{{$calisanlar->ceposta}}">
                                                            </div>
                                                        </div>                                    
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label for="website1">Ünvan</label>
                                                                <input type="text" class="form-control mb-4" name="unvan" id="website1" placeholder="Ünvan" value="{{$calisanlar->cunvani}}">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="account-settings-footer justify-content-center fixed-bottom">
                                    <div class="as-footer-container text-center">
        
                                    <a href="#" id="multiple-reset" class="btn btn-warning">Sıfırla</a>
                                        <div class="blockui-growl-message">
                                            <i class="flaticon-double-check"></i>&nbsp; Değişiklikler Başarıyla Kaydedildi
                                        </div>
                                            <a href="#{{route('calisanDuzenle',$calisanlar->ckayitno)}}" id="multiple-messages" class="btn btn-primary">Değişiklikleri Kaydet</a>
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
    <script src="{{ asset('assets/js/kisiBilgileri.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>