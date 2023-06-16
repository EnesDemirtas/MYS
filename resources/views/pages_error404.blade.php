<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>SBE Mühendislik - 404 Hatası</title>
    <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:400,500,600,700&display=swap" rel="stylesheet">
    <link href="bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/plugins.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/pages/error/style-400.css" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

</head>

<body class="error404 text-center">

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mr-auto mt-2 text-md-left text-center">
                <a href="index.html" class="ml-md-5">
                    <img alt="image-404" style="width: 80%; height: auto;" src="{{ asset('assets/img/sbe_logo.png') }}"
                        class="theme-logo">
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid error-content">
        <div class="">
            <h1 class="error-number">404 Hatası!</h1>
            <p class="mini-text">Ooops!</p>
            <p class="error-text mb-4 mt-1">Bu sayfa bulunamadı</p>
            <a href="{{ route('giris_yap') }}" class="btn btn-primary mt-5">Geri Dön</a>
        </div>
    </div>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="assets/js/libs/jquery-3.1.1.min.js"></script>
    <script src="bootstrap/js/popper.min.js"></script>
    <script src="bootstrap/js/bootstrap.min.js"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
</body>

</html>
