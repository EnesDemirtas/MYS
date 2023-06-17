<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - HİZMET VE ÜRÜNLER</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}"/>
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles/>
    <!-- END GLOBAL MANDATORY STYLES -->
    
    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->

    <style>
        body{
        background-image:url({{ asset('assets/img/arkaplan.jpg') }});
        background-repeat: no-repeat;
        background-size: cover;
        }   
        .wrapper{margin:1vh}

        .card{
        border: none;
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        overflow:hidden;
        border-radius:20px;
        min-height:450px;
        box-shadow: 0 0 12px 0 rgba(0,0,0,0.2);

        @media (max-width: 768px) {
        min-height:350px;
        }

        @media (max-width: 420px) {
        min-height:300px;
        }

        &.card-has-bg{
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        background-size:120%;
        background-repeat:no-repeat;
        background-position: center center;
        &:before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            background: inherit;
            -webkit-filter: grayscale(1);
        -moz-filter: grayscale(100%);
        -ms-filter: grayscale(100%);
        -o-filter: grayscale(100%);
        filter: grayscale(100%);}

        &:hover {
            transform: scale(0.98);
            box-shadow: 0 0 5px -2px rgba(0,0,0,0.3);
            background-size:130%;
            transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);

            .card-img-overlay {
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
            background: rgb(35,79,109);
            background: linear-gradient(0deg, rgba(4,69,114,0.5) 0%, rgba(4,69,114,1) 100%);
            }
        }
        }
        .card-footer{
        background: none;
        border-top: none;
            .media{
            img{
            border:solid 3px rgba(255,255,255,0.3);
            }
        }
        }
        .card-meta{color:#26BD75}
        .card-body{ 
        transition: all 500ms cubic-bezier(0.19, 1, 0.22, 1);
        }
        &:hover {
        .card-body{
            margin-top:30px;
            transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        }
        cursor: pointer;
        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        }
        .card-img-overlay {
        transition: all 800ms cubic-bezier(0.19, 1, 0.22, 1);
        background: rgb(35,79,109);
        background: linear-gradient(0deg, rgba(35,79,109,0.3785889355742297) 0%, rgba(69,95,113,1) 100%);
        }
        }
        @media (max-width: 767px){
        
        }
        .layout-px-spacing {
            min-height: calc(100vh - 170px)!important;
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

                <div class="page-header">
                    <nav class="breadcrumb-one" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="javascript:void(0);" style="color:whitesmoke">Hizmetler ve Ürünler</a></li>
                        </ol>
                    </nav>
                </div>

                <!-- CONTENT AREA -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4" style="background-color:whitesmoke">
                            <div class="row">
                                <div class="col text-center mb-5">
                                    <h1>SBE MÜHENDİSLİK - HİZMETLERİMİZ</h1>
                                    <hr>
                                    <p class="lead">Hizmetlerimize aşağıdaki kartlardan ulaşabilirsiniz</p>
                                </div>
                            </div>
                            <div class="widget-one">
                                <section class="wrapper">
                                    <div class="container">
                                        <div class="row">
                                            <!-- Birinci Card --> 
                                            @unless(count($bakimformlari) == 0)
                                                @foreach ($bakimformlari as $bakimformu)
                                            <div class="col-sm-12 col-md-6 col-lg-4 mb-4">
                                                <div class="card text-white card-has-bg click-col" style="background-image:url('https://source.unsplash.com/600x900/?tech');">
                                                <img class="card-img d-none" src="https://source.unsplash.com/600x900/?tech" alt="Detaylar">
                                                    <div class="card-img-overlay d-flex flex-column">
                                                        <div class="card-body">
                                                            <small class="card-meta mb-2">{{$bakimformu->form_adi}} Bakımı</small>
                                                            <h4 class="card-title mt-0 "><a class="text-white" herf="#">Detaylar</a></h4>
                                                            <small><i class="far fa-clock"></i> {{ now()->year; }}</small>
                                                        </div>
                                                        <div class="card-footer">
                                                            <div class="media">
                                                                <img class="mr-3 rounded-circle" src="{{ asset('assets/img/favicon.ico') }}" alt="Generic placeholder image" style="max-width:50px">
                                                                <div class="media-body">
                                                                    <h6 class="my-0 text-white d-block">Sadık BOZKIR</h6>
                                                                    <small>SBE Mühendislik Kurucusu</small>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- Birinci Card Bitiş -->
                                                @endforeach
                                            @endunless
                                        </div>
                                    </div>
                                </section>
                            </div>    
                        </div>
                    </div>
                </div>
                <!-- CONTENT AREA -->
                
            </div>
            <x-footer/>
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

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>