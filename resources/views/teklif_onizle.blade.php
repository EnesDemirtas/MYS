<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - TEKLİF ÖNİZLE</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles/>
    <link href="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        /*
            The below code is for DEMO purpose --- Use it if you are using this demo otherwise Remove it
        */
        /*.navbar .navbar-item.navbar-dropdown {
            margin-left: auto;
        }*/
        .layout-px-spacing {
            min-height: calc(100vh - 170px)!important;
        }

    </style>

    <link href="{{ asset('assets/css/apps/invoice-preview.css') }}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);" style="color:whitesmoke">MYS</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);" style="color:whitesmoke">Teklif Yönetimi</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="color:whitesmoke">Önizle</a></li>
                        </ol>
                    </nav>
                </div>
                @if(Session::has("basarili"))
                    <div class="alert alert-success">
                        {{Session::get("basarili")}}
                    </div>
                @endif
                <div class="row invoice  layout-spacing layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">
                            <form id="teklifekle" class="section contact p-4" method="post"
                                action="{{ route('teklif.ekleme.yap') }}">
                                @csrf
                            <div class="row">

                                <div class="col-xl-9">

                                    <div class="invoice-container">
                                        <div class="invoice-inbox">
                                            
                                            <div id="ct" class="">
                                                
                                                <div class="invoice-00001">
                                                    <div class="content-section">
    
                                                        <div class="inv--head-section inv--detail-section">
                                                        
                                                            <div class="row">
                                                            
                                                                <div class="col-sm-6 col-12 mr-auto">
                                                                    <div class="d-flex">
                                                                        <img class="company-logo" src="assets/img/cork-logo.png" alt="company">
                                                                        <h3 class="in-heading align-self-center">{{$sirketismi}}</h3>
                                                                        <input type="hidden" name="sirketismi" value="{{$sirketismi}}">
                                                                    </div>
                                                                </div>

                                                                <div class="col-sm-6 text-sm-right">
                                                                    <p class="inv-list-number"><span class="inv-title">Teklif : </span> <span class="inv-number">#0001</span></p>
                                                                </div>

                                                                <div class="col-sm-6 align-self-center mt-3">
                                                                    <p class="inv-street-addr">{{$yetkiliismi}}</p>
                                                                    <p class="inv-street-addr">{{$musteriadres}}</p>
                                                                    <p class="inv-email-address">{{$yetkiliemail}}</p>
                                                                    <p class="inv-email-address">{{$musteritelefon}}</p>
                                                                    <input type="hidden" name="yetkiliismi" value="{{$yetkiliismi}}">
                                                                    <input type="hidden" name="musteriadres" value="{{$musteriadres}}">
                                                                    <input type="hidden" name="yetkiliemail" value="{{$yetkiliemail}}">
                                                                    <input type="hidden" name="musteritelefon" value="{{$musteritelefon}}">
                                                                </div>
                                                                <div class="col-sm-6 align-self-center mt-3 text-sm-right">
                                                                    <p class="inv-created-date"><span class="inv-title">Teklif Tarihi : </span> <span class="inv-date">{{$teklif_baslangic_tarihi}}</span></p>
                                                                    <input type="hidden" name="teklif_baslangic_tarihi" value="{{$teklif_baslangic_tarihi}}">
                                                                    <p class="inv-due-date"><span class="inv-title">Bitiş Tarihi : </span> <span class="inv-date">{{$teklif_bitis_tarihi}}</span></p>
                                                                    <input type="hidden" name="teklif_bitis_tarihi" value="{{$teklif_bitis_tarihi}}">
                                                                </div>
                                                            
                                                            </div>
                                                            
                                                        </div>
    
                                                        <div class="inv--detail-section inv--customer-detail-section">

                                                            <div class="row">
    
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4 align-self-center">
                                                                    <p class="inv-to">Teklif Verilen</p>
                                                                </div>

                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 align-self-center order-sm-0 order-1 inv--payment-info">
                                                                    <h6 class=" inv-title">Ödeme Bilgileri:</h6>
                                                                </div>
                                                                
                                                                <div class="col-xl-8 col-lg-7 col-md-6 col-sm-4">
                                                                    <p class="inv-customer-name"> Sadık Bozkır</p>
                                                                    <p class="inv-street-addr">Muratpaşa, Kızılarık Mah. Yanık Apt. No: 5/11, Köroğlu Bulvarı, 07310 Antalya</p>
                                                                    <p class="inv-email-address">business@sbe.com</p>
                                                                    <p class="inv-email-address">+90 (242) 326 10 11</p>
                                                                </div>
                                                                
                                                                <div class="col-xl-4 col-lg-5 col-md-6 col-sm-8 col-12 order-sm-0 order-1">
                                                                    <div class="inv--payment-info">
                                                                        <p><span class=" inv-subtitle">Banka Adı:</span> <span>{{$banka_adi}}</span></p>
                                                                        <input type="hidden" name="banka_adi" value="{{$banka_adi}}">
                                                                        <p><span class=" inv-subtitle">Hesap Numarası: </span> <span>{{$hesap_numarasi}}</span></p>
                                                                        <input type="hidden" name="hesap_numarasi" value="{{$hesap_numarasi}}">
                                                                        <p><span class=" inv-subtitle">SWIFT code:</span> <span>{{$swift_kodu}}</span></p>
                                                                        <input type="hidden" name="swift_kodu" value="{{$swift_kodu}}">
                                                                        <p><span class=" inv-subtitle">Ülke: </span> <span>{{$ulke}}</span></p>
                                                                        <input type="hidden" name="ulke" value="{{$ulke}}">
                                                                    </div>
                                                                </div>

                                                            </div>
                                                            
                                                        </div>

                                                        <div class="inv--product-table-section">
                                                            <div class="table-responsive">
                                                                <table class="table">
                                                                    <thead class="">
                                                                        <tr>
                                                                            <th scope="col">Hizmet İsmi</th>
                                                                            <th class="text-right" scope="col">Adet</th>
                                                                            <th class="text-right" scope="col">Ücret</th>
                                                                            <th class="text-right" scope="col">Total</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>{{$periyodik_bakim}}</td>
                                                                            <td class="text-right">{{$urun_miktari1}}</td>
                                                                            <td class="text-right">{{$urun_fiyati1}}</td>
                                                                            <td class="text-right">{{$indirimsiz_toplam}}</td>
                                                                            <input type="hidden" name="indirimsiz_toplam" value="{{$indirimsiz_toplam}}">
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                        
                                                        <div class="inv--total-amounts">
                                                        
                                                            <div class="row mt-4">
                                                                <div class="col-sm-5 col-12 order-sm-0 order-1">
                                                                </div>
                                                                <div class="col-sm-7 col-12 order-sm-1 order-0">
                                                                    <div class="text-sm-right">
                                                                        <div class="row">
                                                                            <div class="col-sm-8 col-7">
                                                                                <p class="">Ara Toplam: </p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-5">
                                                                                <p class="">{{$ara_toplam_input}}</p>
                                                                            </div>
                                                                            <div class="col-sm-8 col-7">
                                                                                <p class="">İndirim: </p>
                                                                            </div>
                                                                            <div class="col-sm-4 col-5">
                                                                                <p class="">{{$indirim_miktari_input}}</p>
                                                                                <input type="hidden" name="indirim_miktari_input" value="{{$indirim_miktari_input}}">
                                                                            </div>
                                                                            <div class="col-sm-8 col-7 grand-total-title">
                                                                                <h4 class="">Net Toplam : </h4>
                                                                            </div>
                                                                            <div class="col-sm-4 col-5 grand-total-amount">
                                                                                <h4 class="">{{$toplam_ucret_input}}</h4>
                                                                                <input type="hidden" name="toplam_ucret_input" value="{{$toplam_ucret_input}}">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>

                                                        </div>

                                                        <div class="inv--note">

                                                            <div class="row mt-1">
                                                                <label for="invoice-detail-notes" class="col-sm-12 col-form-label col-form-label-sm">Müşteri Notu:</label>
                                                                <div class="col-sm-12 col-12 order-sm-0 order-1">
                                                                    <p>@if($not == NULL) Müşteri notu yok. 
                                                                        @else {{$not}}
                                                                        <input type="hidden" name="not" value="{{$not}}">
                                                                        @endif
                                                                    </p>
                                                                </div>
                                                            </div>

                                                        </div>
    
                                                    </div>
                                                </div> 
                                                
                                            </div>
    
    
                                        </div>
    
                                    </div>

                                </div>

                                <div class="col-xl-3">

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row">
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <button type="submit" style="display:none;" id="teklif_gonder" class="btn btn-primary btn-send w-100 mb-2">Teklifi Gönder</button>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="javascript:void(0);" class="btn btn-secondary btn-print  action-print">Yazdır</a>
                                                </div>
                                                <div class="col-xl-12 col-md-3 col-sm-6">
                                                    <a href="/teklif_duzenle" class="btn btn-dark btn-edit">Düzenle</a>
                                                </div>
                                            </div>
                                        </div>
                                        
                                    </div>
                                    
                                </div>


                            </div>
                            
                            </form>
                        </div>

                    </div>
                <!-- CONTENT AREA -->
                
            </div>
            <x-footer />
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->

    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <x-global-mandatory.scripts />
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
    <script src="{{ asset('assets/js/apps/invoice-preview.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>