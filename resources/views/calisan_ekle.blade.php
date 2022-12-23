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
    <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">
    <style>
        #formValidate .wizard > .content {min-height: 25em;}
        #example-vertical.wizard > .content {min-height: 24.5em;}
    </style>
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
        @if(Session::has("calisanKayitli"))
            <div class="alert alert-danger">
                {{Session::get("calisanKayitli")}}
            </div>
        @endif
                            <div class="widget-one"> 
                                <div class="text-center"> 
                                    <h3 style="color:blue;text-decoration:underline;">ÇALIŞAN EKLE</h3>
                                </div>
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <form id="kisiBilgileri" class="section contact p-4" method="post" action="{{route('calisan.ekle')}}">
                                        @csrf
                                        <div id="example-basic">
                                            <h3>Kişi Bilgileri</h3>
                                            <section>
                                                <div class="row"> 
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="ad">Ad</label>
                                                        <input type="text" class="form-control mb-4" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' onkeyup="ilkHarfBuyuk()" id="cadi" name="cadi" placeholder="Ad" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="soyad">Soyad</label>
                                                        <input type="text" class="form-control mb-4" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' onkeyup="soyadBuyuk()" id="csoyadi" name="csoyadi"  placeholder="Soyad" >
                                                    </div>
                                                </div>
                                                <div class="col-md-4">
                                                    <div class="form-group">
                                                        <label for="ad">TCKN</label>
                                                        <input type="text" class="form-control mb-4" onkeypress='return event.charCode >= 48 && event.charCode <= 57' id="ctckn" name="ctckn" placeholder="TCKN" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ad">İşe Giriş Tarihi</label>
                                                        <input type="date" class="form-control mb-4"  name="cdogum" placeholder="İşe Giriş Tarihi" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="ad">Doğum Günü</label>
                                                        <input type="date" class="form-control mb-4"  name="cisegiris" placeholder="Doğum Günü" >
                                                    </div>
                                                </div>  
                                                </div>
                                            </section>
                                            <h3>İletişim</h3>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-2 pr-0">
                                                        <div class="form-group">
                                                            <label for="phone">Ülke Kodu</label>
                                                            <select class="placeholder js-states form-control" name="ukodutel">
                                                                <option>90</option>
                                                                <option value="49">49</option>
                                                                <option value="1">1</option>
                                                                <option value="7">7</option>
                                                                <option value="380">380</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                <div class="col-md-4 pl-1">
                                                    <div class="form-group">
                                                        <label for="phone">Telefon Numarası</label>
                                                        <input type="text" maxlength="11" class="form-control mb-4" name="ctel" id="phone" placeholder="Örnek: (5**) *** ** **" >
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group">
                                                        <label for="email">Eposta</label>
                                                        <input type="text" class="form-control mb-4" name="ceposta" id="email" placeholder="Eposta" >
                                                    </div>
                                                </div>    
                                                </div>
                                            </section>
                                            <h3>Adres & Pozisyon</h3>
                                            <section>
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="location">İl</label>
                                                            <input type="text" class="form-control mb-4" id="cevadresil" onkeyup="ilAdresiBuyuk()" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' name="cevadresil" placeholder="İl" >
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div class="form-group">
                                                            <label for="location">İlçe</label>
                                                            <input type="text" class="form-control mb-4" id="cevadresilce" onkeyup="ilceAdresiBuyuk()" onkeypress='return (event.charCode >= 65 && event.charCode <= 90) || (event.charCode >= 97 && event.charCode <= 122)' name="cevadresilce" placeholder="İlçe" >
                                                        </div>
                                                    </div>   
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label for="website1">Ünvan</label>
                                                            <input type="text" class="form-control mb-4" name="cunvani" id="website1" placeholder="Ünvan" >
                                                        </div>
                                                    </div>                               
                                                </div> 
                                                <div class="account-settings-footer justify-content-center fixed-bottom">
                                                    <div class="as-footer-container text-center justify-content-center">
                                                        <button type="submit" class="btn btn-primary">Çalışanı Ekle</button>
                                                    </div> 
                                                </div> 
                                            </section>
                                            
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
    <script>
        $(".placeholder").select2({
    placeholder: "Make a Selection",
    allowClear: true
        });
    </script>
    <script src="plugins/highlight/highlight.pack.js"></script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="assets/js/scrollspyNav.js"></script>
    <script src="plugins/jquery-step/jquery.steps.min.js"></script>
    <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
    <script src="{{ asset('assets/js/inputController.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>