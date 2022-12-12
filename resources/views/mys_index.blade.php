<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - ANASAYFA</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <link href="{{ asset('assets/css/loader.css') }}" rel="stylesheet" type="text/css" />
    <script src="{{ asset('assets/js/loader.js') }}"></script>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles/>
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
    <link href="{{ asset('plugins/apex/apexcharts.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('assets/css/dashboard/dash_2.css') }}" rel="stylesheet" type="text/css" />
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Anasayfa</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row layout-top-spacing">

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-one h-100">
                            <div class="widget-heading">
                                <h6 class="">Müşteri Portföyü Özeti</h6>

                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Gözat</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Yükle</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="w-chart">

                                <div class="w-chart-section total-visits-content">
                                    <div class="w-detail">
                                        <p class="w-title">Toplam Müşteri</p>
                                        <p class="w-stats">1420</p>
                                    </div>
                                </div>
                                
                                
                                <div class="w-chart-section paid-visits-content">
                                    <div class="w-detail">
                                        <p class="w-title">Yeni Müşteri
                                            <span class="text-muted">(
                                                @php
                                                    $ay = date("m");
                                                    $yil = date("Y");
                                                    if ($ay == 12) {
                                                        echo 'Aralık ';
                                                    }elseif ($ay == 11) {
                                                        echo 'Kasım ';
                                                    }elseif ($ay == 10) {
                                                        echo 'Ekim ';
                                                    }elseif ($ay == 9) {
                                                        echo 'Eylül ';
                                                    }elseif ($ay == 8) {
                                                        echo 'Ağustos ';
                                                    }elseif ($ay == 7) {
                                                        echo 'Temmuz ';
                                                    }elseif ($ay == 6) {
                                                        echo 'Haziran ';
                                                    }elseif ($ay == 5) {
                                                        echo 'Mayıs ';
                                                    }elseif ($ay == 4) {
                                                        echo 'Nisan ';
                                                    }elseif ($ay == 3) {
                                                        echo 'Mart ';
                                                    }elseif ($ay == 2) {
                                                        echo 'Şubat ';
                                                    }elseif ($ay == 1) {
                                                        echo 'Ocak ';
                                                    }
                                                    echo $yil;
                                                @endphp 
                                            )
                                            </span>    
                                        </p> 
                                        <p class="w-stats">95</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>

                    {{-- <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-card-four widget-one">
                            <div class="widget-content">
                                <div class="w-header">
                                    <div class="w-info">
                                        <h6 class="value">Aylık Kazanç Özeti</h6>
                                    </div>
                                    <div class="task-action">
                                        <div class="dropdown">
                                            <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                                <a class="dropdown-item" href="javascript:void(0);">Gözat</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="w-chart">

                                    <div class="w-chart-section total-visits-content">
                                        <div class="w-detail">
                                            <p class="w-title">Onaylanan Teklif Sayısı</p>
                                            <p class="w-stats">100</p>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="w-chart-section paid-visits-content">
                                        <div class="w-detail">
                                            <p class="w-title">Tahsil Edilecek Para</p>
                                            <p class="w-stats">$5000</p>
                                        </div>
                                    </div>
                                    
                                </div>

                                <div class="w-progress-stats">                                            
                                    <div class="progress">
                                        <div class="progress-bar bg-gradient-secondary" role="progressbar" style="width: 57%" aria-valuenow="57" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>

                                    <div class="">
                                        <div class="w-icon">
                                            <p>57%</p>
                                        </div>
                                    </div>
                                    
                                </div>
                            </div>
                        </div>
                    </div> --}}

                    <div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-one h-100">
                            <div class="widget-heading">
                                <h6 class="">Aylık Kazanç Özeti <span class="text-muted">(
                                    @php
                                        if ($ay == 12) {
                                                        echo 'Aralık ';
                                                    }elseif ($ay == 11) {
                                                        echo 'Kasım ';
                                                    }elseif ($ay == 10) {
                                                        echo 'Ekim ';
                                                    }elseif ($ay == 9) {
                                                        echo 'Eylül ';
                                                    }elseif ($ay == 8) {
                                                        echo 'Ağustos ';
                                                    }elseif ($ay == 7) {
                                                        echo 'Temmuz ';
                                                    }elseif ($ay == 6) {
                                                        echo 'Haziran ';
                                                    }elseif ($ay == 5) {
                                                        echo 'Mayıs ';
                                                    }elseif ($ay == 4) {
                                                        echo 'Nisan ';
                                                    }elseif ($ay == 3) {
                                                        echo 'Mart ';
                                                    }elseif ($ay == 2) {
                                                        echo 'Şubat ';
                                                    }elseif ($ay == 1) {
                                                        echo 'Ocak ';
                                                    }
                                                    echo $yil;
                                    @endphp 
                                )
                                </span></h6>

                                <div class="task-action">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="pendingTask" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>

                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="pendingTask" style="will-change: transform;">
                                            <a class="dropdown-item" href="javascript:void(0);">Gözat</a>
                                            <a class="dropdown-item" href="javascript:void(0);">Yükle</a>
                                        </div>
                                    </div>
                                </div>
                                
                            </div>
                            <div class="w-chart">

                                <div class="w-chart-section total-visits-content">
                                    <div class="w-detail">
                                        <p class="w-title">Kazanç</p>
                                        <p class="w-stats">80.000,00 TL</p>
                                    </div>
                                </div>
                                
                                
                                <div class="w-chart-section paid-visits-content">
                                    <div class="w-detail">
                                        <p class="w-title">Tahsil Edilen</p>
                                        <p class="w-stats">35.000,00 TL</p>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-account-invoice-two">
                            <div class="widget-content">
                                <div class="account-box">
                                    <div class="info">
                                        <div class="inv-title">
                                            <h5 class="">Yıllık Kazanç Özeti</h5>
                                        </div>
                                        <div class="inv-balance-info">
                                            <p class="inv-balance">410.741,42 TL</p>
                                        </div>
                                    </div>
                                    <div class="acc-action">
                                        <div class="">
                                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-plus"><line x1="12" y1="5" x2="12" y2="19"></line><line x1="5" y1="12" x2="19" y2="12"></line></svg></a>
                                            <a href="javascript:void(0);"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-credit-card"><rect x="1" y="4" width="22" height="16" rx="2" ry="2"></rect><line x1="1" y1="10" x2="23" y2="10"></line></svg></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">
                        <div class="widget widget-chart-three">
                            <div class="widget-heading">
                                <div class="">
                                    <h5 class="">Teklif Takibi</h5>
                                </div>

                                <div class="dropdown ">
                                    <a class="dropdown-toggle" href="#" role="button" id="uniqueVisitors" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="uniqueVisitors">
                                        <a class="dropdown-item" href="javascript:void(0);">View</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Update</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Download</a>
                                    </div>
                                </div>
                            </div>

                            <div class="widget-content">
                                <div id="uniqueVisits"></div>
                            </div>
                        </div>
                    </div>


                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="row widget-statistic">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                <div class="widget widget-one_hybrid widget-followers">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value">31.6K</p>
                                                <h5 class="">Aktif Çalışan Sayısı</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 layout-spacing">
                                <div class="widget widget-one_hybrid widget-referral">
                                    <div class="widget-heading">
                                        <div class="w-title">
                                            <div class="w-icon">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-link"><path d="M10 13a5 5 0 0 0 7.54.54l3-3a5 5 0 0 0-7.07-7.07l-1.72 1.71"></path><path d="M14 11a5 5 0 0 0-7.54-.54l-3 3a5 5 0 0 0 7.07 7.07l1.71-1.71"></path></svg>
                                            </div>
                                            <div class="">
                                                <p class="w-value">1,900</p>
                                                <h5 class="">Aktif Müşteri Sayısı</h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
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
    <script src="{{ asset('assets/js/app.js') }}" ></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/apex/apexcharts.min.js') }}"></script>
    <script src="{{ asset('assets/js/dashboard/dash_2.js') }}"></script>
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>