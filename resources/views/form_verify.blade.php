<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <x-global-mandatory.styles />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Periyodik Bakım Formu Validasyonu</title>
    <style>

body {
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  transition: 1 ease;
}

.btn {
  border-radius: 2px;
  color: #D18B49;
  font-size: 14px;
  font-weight: semibold;
  text-decoration: none;
  text-transform: uppercase;
  transition: $2 ease;
}

.card {
  background: rgb(245, 245, 245);
  background: linear-gradient(240deg, rgb(255, 255, 255) 0%, rgb(225, 247, 255) 100%);
  margin: 100px auto;
  border: none;
  box-shadow: 5px 10px 18px rgb(162, 162, 162);
  padding: 10px;
  text-align: center;
  max-width: 700px;
}


.title {
  margin: 0 0 ;
  color: #D18B49;
  font-size: 24px;
  transition: $duration ease;
}

.description {
  margin: 0 0 ;
}

.footer {
  display: flex;
  flex-direction: row;
  justify-content: space-between;
  margin: 0 ;
}

@import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>
</head>

<body  class=" text-center">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 mx-auto mt-2">
                <a href="index.html" class="ml-md-5">
                    <img alt="image-404" style="width: 80%; height: auto;" src="{{ asset('assets/img/sbe_logo.png') }}"
                        class="theme-logo">
                </a>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="">
            <div class="card">
                <div class="products" style="height: 620px;">
                  <div class="product active" product-id="1" product-color="#D18B49">
                    @if ($isValid)
                        <div class="thumbnail"><lottie-player id="lottie-wrong2" src="https://assets10.lottiefiles.com/private_files/lf30_e2iokl1q.json" class="mx-auto"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></div>
                        <h3 class="title" style="text-shadow:0px 5px 4px rgba(31, 45, 61, 0.101961);">Periyodik Bakım Formu Validasyonu</h3>
                        <p style="font-family:'Roboto', sans-serif; font-size:1.2rem;" class="mx-5 mt-3">Bu periyodik bakım formu {{ $form->created_at }} tarihinde oluşturulmuş olup {{ $form->onay_timestamp }} saat
                            ve tarihinde SBE Mühendislik tarafından <span class="text-success"><b>onaylanmıştır.</b></span></p>
                    @else
                        <div class="thumbnail mb-3"><lottie-player id="lottie-wrong" src="https://assets8.lottiefiles.com/private_files/lf30_yrqbazz5.json" class="mx-auto"  background="transparent"  speed="1"  style="width: 300px; height: 300px;"  loop autoplay></lottie-player></div>
                        <h3 class="title">
                            <b class="title" style="text-shadow:0px 5px 4px rgba(31, 45, 61, 0.101961);">Periyodik Bakım Formu Validasyonu</b>
                        </h3>
                        <p style="font-family:'Roboto', sans-serif; font-size:1.2rem;" class="mx-5 mt-3">Bu periyodik bakım formu {{ $form->created_at }} tarihinde oluşturulmuş olup {{ $form->onay_timestamp }} saat
                            ve tarihinde SBE Mühendislik tarafından <span class="text-danger"><b>onaylanmamıştır.</b></span></p>
                    @endif
                  </div>
                </div>
              </div>
            
        </div>
    </div>
    

    
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
</body>
