<!DOCTYPE html>
<html lang="tr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - RANDEVULAR</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles />
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
            min-height: calc(100vh - 170px) !important;
        }
        #map {
          height: 500px;
          width: 100%;
         }
    </style>

    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}">
    <link href="{{ asset('assets/css/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
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

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <!-- CONTENT AREA -->
                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);" style="color:whitesmoke">MYS</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);" style="color:whitesmoke">Randevu Yönetimi</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);" style="color:whitesmoke">Randevular</a></li>
                        </ol>
                    </nav>
                </div>
                @if (Session::has('success'))
                    <div class="alert alert-success">
                        {{ Session::get('success') }}
                    </div>
                @endif
                <div class="row layout-top-spacing">

                    <div class="col-xl-12 col-lg-12 col-sm-12 layout-spacing">
                        <div class="widget-content widget-content-area br-6">
                            <table id="invoice-list" class="table table-hover" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Teklif Numarası</th>
                                        <th>Adı</th>
                                        <th>Eposta</th>
                                        <th>Başlangıç - Bitiş Tarihi</th>
                                        <th>Ücret</th>
                                        <th>Durum</th>
                                        @if (session('kullanici')->cyetki == '2')
                                        <th>İşlemler</th>
                                        @endif
                                        @if (session('kullanici')->cyetki == '1' || session('kullanici')->cyetki == '2')
                                        <th>Form</th>
                                        <th>Harita</th>
                                        @endif
                                    </tr>
                                </thead>
                                <tbody>
                                    @unless (count($teklifler) == 0)
                                        @foreach ($teklifler as $teklif)
                                            @if ($teklif->teklif_durumu == 'Teklif Yapıldı')
                                                <tr>
                                                    <td><a href="teklif_onizle.html"><span
                                                                class="inv-number">{{ $loop->iteration }}</span></a></td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <div class="usr-img-frame mr-2 rounded-circle">
                                                                <img alt="avatar" class="img-fluid rounded-circle"
                                                                    src="assets/img/90x90.jpg">
                                                            </div>
                                                            <p class="align-self-center mb-0 user-name">
                                                                {{ $teklif->teklif_veren_isim }}</p>
                                                        </div>
                                                    </td>
                                                    <td><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-mail">
                                                                <path
                                                                    d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                                                </path>
                                                                <polyline points="22,6 12,13 2,6"></polyline>
                                                            </svg> {{ $teklif->teklif_veren_email }}</span></td>
                                                    <td><span class="inv-date"><svg xmlns="http://www.w3.org/2000/svg"
                                                                width="24" height="24" viewBox="0 0 24 24"
                                                                fill="none" stroke="currentColor" stroke-width="2"
                                                                stroke-linecap="round" stroke-linejoin="round"
                                                                class="feather feather-calendar">
                                                                <rect x="3" y="4" width="18"
                                                                    height="18" rx="2" ry="2"></rect>
                                                                <line x1="16" y1="2" x2="16"
                                                                    y2="6"></line>
                                                                <line x1="8" y1="2" x2="8"
                                                                    y2="6"></line>
                                                                <line x1="3" y1="10" x2="21"
                                                                    y2="10"></line>
                                                            </svg> {{ $teklif->teklif_baslangic_tarihi }} -
                                                            {{ $teklif->teklif_bitis_tarihi }}</span></td>
                                                    <td><span
                                                            class="inv-amount">{{ $teklif->istenilen_hizmet_fiyat * $teklif->istenilen_hizmet_miktar - $teklif->teklif_edilen_indirim }}</span>
                                                    </td>
                                                    <td><span
                                                            class="badge badge-success inv-success">{{ $teklif->teklif_durumu }}</span>
                                                    </td>
                                                @if (session('kullanici')->cyetki == '2')
                                                    <td>
                                                        <div class="dropdown">
                                                            <a class="dropdown-toggle" href="#" role="button"
                                                                id="dropdownMenuLink2" data-toggle="dropdown"
                                                                aria-haspopup="true" aria-expanded="true">
                                                                <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                                    height="24" viewBox="0 0 24 24" fill="none"
                                                                    stroke="currentColor" stroke-width="2"
                                                                    stroke-linecap="round" stroke-linejoin="round"
                                                                    class="feather feather-more-horizontal">
                                                                    <circle cx="12" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="19" cy="12" r="1">
                                                                    </circle>
                                                                    <circle cx="5" cy="12" r="1">
                                                                    </circle>
                                                                </svg>
                                                            </a>
                                                            <div class="dropdown-menu"
                                                                aria-labelledby="dropdownMenuLink2">
                                                                <a class="dropdown-item action-edit" href=""><svg
                                                                        xmlns="http://www.w3.org/2000/svg" width="24"
                                                                        height="24" viewBox="0 0 24 24" fill="none"
                                                                        stroke="currentColor" stroke-width="2"
                                                                        stroke-linecap="round" stroke-linejoin="round"
                                                                        class="feather feather-edit-3">
                                                                        <path d="M12 20h9"></path>
                                                                        <path
                                                                            d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z">
                                                                        </path>
                                                                    </svg>Gözat</a>
                                                                <form method="post" action="">
                                                                    @csrf
                                                                    @method('delete')
                                                                    <button
                                                                        class="btn btn-danger w-100 text-left pl-2"><svg
                                                                            xmlns="http://www.w3.org/2000/svg"
                                                                            width="24" height="24"
                                                                            viewBox="0 0 24 24" fill="none"
                                                                            stroke="currentColor" stroke-width="2"
                                                                            stroke-linecap="round" stroke-linejoin="round"
                                                                            class="feather feather-trash">
                                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                                            <path
                                                                                d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2">
                                                                            </path>
                                                                        </svg>Sil</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </td>
                                                @endif    
                                                @if (session('kullanici')->cyetki == '1' || session('kullanici')->cyetki == '2')
                                                    <td>
                                                            @if ($teklif->istenilen_hizmetler == 'Kalorifer Kazanı Periyodik Kontrol')
                                                                <a class="btn badge-success inv-success"
                                                                    href="{{ route('example_form', ['form_adi' => 'Kalorifer Kazanı' . ';' . $teklif->id]) }}">Kalorifer
                                                                    Kazanı</a>
                                                            @elseif($teklif->istenilen_hizmetler == 'Kompresör Periyodik Kontrol')
                                                                <a class="btn badge-success inv-success"
                                                                    href="{{ route('example_form', ['form_adi' => 'Kompresör' . ';' . $teklif->id]) }}">Kompresör</a>
                                                            @endif
                                                    </td>
                                                @endif
                                                        @if (session('kullanici')->cyetki == '2' || session('kullanici')->cyetki == '1')
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                                                                Harita
                                                            </button>
                                                            <!-- Button trigger modal -->
                                                        </td>
                                                        @endif
                                                </tr>
                                                
                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                        <span><lottie-player src="https://assets1.lottiefiles.com/private_files/lf30_D4yZiV.json"  background="transparent"  speed="1"  style="width: 100px; height: 60px; display:inline-block"  loop autoplay></lottie-player></span> 
                                                        
                                                        <h5 class="modal-title pt-3 pl-5" id="exampleModalLabel"><b>Firamının Harita Bilgisi</b></h5>
                                                        
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <div>
                                                                <input id="hk-enlem" type="hidden" name="menlem" placeholder="Enlem" value="{{ $teklif->menlem }}" class="form-control">
                                                            </div>  
                                                            <div>
                                                                <input id="hk-boylam" type="hidden" name="mboylam" placeholder="Boylam" value="{{ $teklif->mboylam }}" class="form-control">
                                                            </div>
                                                            <!-- Harita Bilgisi -->
                                                            <div class="py-3 row">
                                                                <div class="col-12" id="map"> </div><!-- GOOGLE HARİTALAR -->
                                                            </div>
                                                            <!-- Harita Bilgisi -->
                                                        </div>
                                                        <div class="modal-footer" style="justify-content: space-between;">
                                                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                                                        <a href="https://www.google.com/maps/dir/current+location/{{$teklif->menlem}},{{$teklif->mboylam}}" target="_blank" type="button" class="btn btn-primary">Hedefe Git</a>
                                                        </div>
                                                    </div>
                                                    </div>
                                                </div>
                                                <!-- Modal -->
                                            @endif
                                        @endforeach
                                    @endunless
                                </tbody>
                            </table>
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
    <script>
        // GOOGLE HARİTALAR
    
        function initMap() {
            var enlem = document.getElementById("hk-enlem").value;
            var boylam = document.getElementById("hk-boylam").value;
            console
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

            

        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rnOaEVELsqt70bjd2up_KCHbg2RRnCk&callback=initMap" type="text/javascript"></script>
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
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
    <script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('assets/js/apps/invoice-list.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>
