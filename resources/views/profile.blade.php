<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - MÜŞTERİ YÖNETİMİ</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <x-global-mandatory.styles />
    <!-- END GLOBAL MANDATORY STYLES -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/solid.min.css" rel="stylesheet" />
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/svg-with-js.min.css" rel="stylesheet" />
    <style>
        body {
            font-family: sans-serif;
        }

        .profilepic {
            position: relative;
            width: 100%;
            height: auto;
            border-radius: 50%;
            overflow: hidden;
            background-color: #111;
        }

        .profilepic:hover .profilepic__content {
            opacity: 1;
        }

        .profilepic:hover .profilepic__image {
            opacity: .5;
        }

        .profilepic__image {
            width: 100%;
            height: auto;
            object-fit: cover;
            opacity: 1;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__content {
            position: absolute;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: white;
            opacity: 0;
            transition: opacity .2s ease-in-out;
        }

        .profilepic__icon {
            color: white;
            padding-bottom: 8px;
        }

        .fas {
            font-size: 20px;
        }

        .profilepic__text {
            text-transform: uppercase;
            font-size: 12px;
            width: 100%;
            text-align: center;
        }

        .profilepic__text {
            background-color: darkblue;
            color: white;
            padding: 0.5rem;
            font-family: sans-serif;
            border-radius: 0.3rem;
            cursor: pointer;
            margin-top: 1rem;
        }

        #upload_button_div {
            text-align: center;
            margin-top: 5%;
        }

        #upload_button {
            text-align: center;
            margin-top: 5%;
            font-size: 16px;
            background-color: darkblue;
            color: white;
            padding: 0.5rem;
            border-radius: 0.3rem;
            font-family: sans-serif;
        }
    </style>

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

                <!-- CONTENT AREA -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
                        <div class="widget widget-content-area br-4">
                            <div class="widget-one">
                                <div class="col-xl-12 col-lg-12 col-md-12 layout-spacing">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12 text-center">
                                            <div class="section-title">
                                                <h3>Profil Bilgileri</h3>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="profilepic">
                                                <img class="profilepic__image" alt="Profil Resmi"
                                                    src="{{ $kullanici->cphoto }}" />
                                                <div class="profilepic__content">
                                                    <span class="profilepic__icon"><i class="fas fa-camera"></i></span>
                                                    <form method="post" action="{{ route('uploadPP') }}"
                                                        enctype="multipart/form-data">
                                                        @csrf
                                                        <input type="file" id="actual-btn" name="photo"
                                                         onchange="javascript:document.getElementById('upload_button').hidden = false;" hidden />
                                                        <label for="actual-btn" class="profilepic__text">Edit
                                                            Profile</label>
                                                    
                                                </div>

                                            </div>
                                            <div id="upload_button_div"><button type="submit" id="upload_button" hidden>Upload</button></div>
                                        </form>
                                        </div>

                                        <div class="col-9 px-4">
                                            <form id="profile" method="post">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-4 mx-4">
                                                        <label for="cadi">Ad</label>
                                                        <input type="text" class="form-control" id="cadi"
                                                            name="cadi" value="{{ session('kullanici')->cadi }}" />
                                                        <label for="csoyadi">Soyad</label>
                                                        <input type="text" class="form-control" id="csoyadi"
                                                            name="csoyadi"
                                                            value="{{ session('kullanici')->csoyadi }}" />
                                                    </div>
                                                    <div class="col-4 mx-4">
                                                        <label for="ctckn">TC Kimlik No</label>
                                                        <input type="text" class="form-control" id="ctckn"
                                                            name="ctckn" value="{{ session('kullanici')->ctckn }}"
                                                            readonly />
                                                    </div>
                                                </div>


                                            </form>
                                        </div>
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
        <x-global-mandatory.scripts />
</body>

</html>
