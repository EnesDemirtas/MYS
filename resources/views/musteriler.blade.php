<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" />
  <title>MYS - MÜŞTERİLER</title>
  <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon.ico') }}" />
  <!-- BEGIN GLOBAL MANDATORY STYLES -->
  <x-global-mandatory.styles />
  <link href="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
  <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
  <style>
    #map {
      height: 300px;
      width: 100%;
     }
  </style>
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
  </style>

  <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->


  <!-- BEGIN PAGE LEVEL CUSTOM STYLES -->
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/datatables.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/custom_dt_html5.css') }}" />
  <link rel="stylesheet" type="text/css" href="{{ asset('plugins/table/datatable/dt-global_style.css') }}" />
  <link href="{{ asset('assets/css/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />


  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" />
  <link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL CUSTOM STYLES -->
  <!--  BEGIN CUSTOM STYLE FILE  -->
  <link href="assets/css/scrollspyNav.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" type="text/css" href="plugins/jquery-step/jquery.steps.css">
  <style>
      #formValidate .wizard > .content {min-height: 25em;}
      #example-vertical.wizard > .content {min-height: 24.5em;}
  </style>
  <!--  END CUSTOM STYLE FILE  -->
  <style>
    
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
      }

      /* Firefox */
      input[type=number] {
        -moz-appearance: textfield;
      }

      .modal-footer > .btn {
        padding: 0.4375rem 1.25rem !important;
        text-shadow: none !important;
        font-size: 14px !important;
        color: #3b3f5c;
        font-weight: normal !important;
        white-space: normal !important;
        word-wrap: break-word !important;
        transition: .2s ease-out !important;
        touch-action: manipulation !important;
        cursor: pointer !important;
        background-color: #f1f2f3;
        box-shadow: 0px 5px 20px 0 rgb(0 0 0 / 10%);
        will-change: opacity, transform !important;
        transition: all 0.3s ease-out !important;
        -webkit-transition: all 0.3s ease-out !important;
      }

      .modal-footer > .btn-secondary {
        color: #fff !important;
        background-color: #805dca !important;
        border-color: #805dca !important;
        box-shadow: 0 10px 20px -10px #805dca !important;
      }
  </style>
      <link href="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />
      <link href="assets/css/users/user-profile.css" rel="stylesheet" type="text/css" />
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
      <!-- END GLOBAL MANDATORY STYLES -->
      
  
      <link href="{{ asset('assets/css/apps/invoice-list.css') }}" rel="stylesheet" type="text/css" />
      <!-- END PAGE LEVEL PLUGINS/CUSTOM STYLES -->
      <link rel="stylesheet" type="text/css" href="plugins/bootstrap-select/bootstrap-select.min.css">

      <link href="plugins/flatpickr/flatpickr.css" rel="stylesheet" type="text/css">
      <link href="plugins/flatpickr/custom-flatpickr.css" rel="stylesheet" type="text/css">

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
    <div id="content" class="main-content widget-content searchable-container list">
      <div class="layout-px-spacing">
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if(session()->has("success"))
            <div class="alert alert-success">
                {{session("success")}}
            </div>
        @endif

        <div class="modal fade" id="addContactModal" tabmys_index="-1" role="dialog"
          aria-labelledby="addContactModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                <div class="add-contact-box">
                  <div class="add-contact-content">
                    {{-- <form id="addContactModalTitle">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="contact-name">
                            <i class="flaticon-user-11"></i>
                            <input type="text" id="c-name" class="form-control" placeholder="İsim">
                            <span class="validation-text"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="contact-email">
                            <i class="flaticon-mail-26"></i>
                            <input type="text" id="c-email" class="form-control" placeholder="E-posta">
                            <span class="validation-text"></span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="contact-occupation">
                            <i class="flaticon-fill-area"></i>
                            <input type="text" id="c-occupation" class="form-control" placeholder="Meslek">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="contact-phone">
                            <i class="flaticon-telephone"></i>
                            <input type="text" id="c-phone" class="form-control" placeholder="Telefon Numarası">
                            <span class="validation-text"></span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="contact-location">
                            <i class="flaticon-location-1"></i>
                            <input type="text" id="c-location" class="form-control" placeholder="Lokasyon">
                          </div>
                        </div>
                      </div>

                    </form> --}}
                    <div class="statbox widget box box-shadow">
                      <div class="widget-header">
                          <div class="row">
                              <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                                  <h4>Hızlı Kayıt</h4>
                              </div>
                          </div>
                      </div>
                      <div class="widget-content widget-content-area">
                      <form id="hizlikayit_form" method="POST" action="{{ route('musteri.hizlikayit') }}">
                        @csrf
                          <div id="example-basic">
                              <h3>Ön Bilgiler</h3>
                              <section>
                                <div class="row py-3">
                                <div class="col-6">
                                  <select class="form-control form-control-sm" name="mkayitturu" id="hk-kayitturu" onchange="changeFields(this.value)">
                                    <option value="Kayıt Türü">Kayıt Türü</option>
                                    <option value="Bireysel">Bireysel</option>
                                    <option value="Ticari">Ticari</option>
                                    <option value="Tedarikçi">Tedarikçi</option>
                                    <option value="Müşteri Adayı">Müşteri Adayı</option>
                                    <option value="Diğer">Diğer</option>
                                  </select>
                                </div>
                                <div class="col-6">
                                    <input id="hk-tcknvno" type="number" name="mtcknvno" placeholder="TCKN/Vergi No" class="form-control form-control-sm" value="{{ old('mtcknvno') }}" required readonly>
                                </div>
                                </div>
                                  <div class="row py-3">

                                    <div class="col">
                                      <input id="hk-marka" type="text" name="mtmarkaadi" onkeyup="hkMarkaAdiBuyuk()" placeholder="Marka Adı" class="form-control form-control-sm" required value="{{ old('mtmarkaadi') }}" required readonly>
                                    </div>
                                  </div>

                                  <div class="row py-3" id="bireysel-bilgiler1">                                    
                                    <div class="col">
                                      <input id="hk-ad" type="text" name="mbadi" onkeyup="hkAdilkHarfBuyuk()" placeholder="Adı" class="form-control form-control-sm" value="{{ old('mbadi') }}" readonly>
                                    </div>
                                    
                                    <div class="col">
                                      <input id="hk-soyad" type="text" name="mbsoyadi" onkeyup="hkSoyadBuyuk()" placeholder="Soyadı" class="form-control form-control-sm" value="{{ old('mbsoyadi') }}" readonly>
                                    </div>
                                  </div>

                                  <div class="row py-3" id="bireysel-bilgiler2">                                   
                                    <div class="col">
                                      <input id="hk-unvan" type="text" name="mbunvani" onkeyup="hkUnvanBuyuk()" placeholder="Unvanı" class="form-control form-control-sm" value="{{ old('mbunvani') }}" readonly>
                                    </div>
                                    
                                    <div class="col">
                                      <input id="basicFlatpickr" value="{{ old('mbdogumgunu') }}" name="mbdogumgunu" class="form-control form-control-sm flatpickr flatpickr-input active" type="text" placeholder="Doğum Günü" readonly>
                                    </div>
                                  </div>


                              </section>
                              <h3>İletişim</h3>
                              <section>
                              <div class="row">
                                <div class="col-4">
                                  <input id="hk-bolge" type="text" name="mbolge" onkeyup="hkBolgeBuyuk()" placeholder="Bölge" class="form-control form-control-sm" required value="{{ old('mbolge') }}">
                                </div>
                                <div class="col-4">
                                  <select id="Iller" name="mil" class="placeholder js-states form-control">
                                    <option>Lütfen Bir İl Seçiniz</option>
                                  </select>                                
                                </div>
                                <div class="col-4">
                                  <select id="Ilceler" disabled="disabled" name="milce" class="placeholder js-states form-control">
                                    <option>Lütfen Bir İlçe Seçiniz</option>
                                  </select>
                                </div>
                              </div>

                              <div class="row py-3">
                                <div class="col-3 pr-0">
                                  <div class="form-group">
                                      <select class="placeholder js-states form-control form-control-sm" name="mukodutel">
                                          <option value="90">+90</option>
                                          <option value="49">+49</option>
                                          <option value="1">+1</option>
                                          <option value="7">+7</option>
                                          <option value="380">+380</option>
                                      </select>
                                  </div>
                                </div>
                                <div class="col-4 pl-1">
                                    <div class="form-group">
                                        <input type="text" maxlength="10" onkeypress='return event.charCode >= 48 && event.charCode <= 57' class="form-control form-control-sm mb-4" name="mmobil" id="phone" placeholder="Telefon" value="{{ old('mmobil') }}">
                                    </div>
                                </div>
                                <div class="col-5 pl-1">
                                  <div class="form-group">
                                    <input id="hk-eposta" type="email" name="meposta" placeholder="Eposta" class="form-control" value="{{ old('meposta') }}">
                                  </div>
                              </div> 
                                  <hr>
                                <div class="w-100 text-center text-muted">Konum Bilgisini Haritadan Giriniz</div>
                                <div role="button" id="anlikKonum" class="btn btn-light"><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" fill="#de1717" version="1.1" id="Capa_1" width="800px" height="800px" viewBox="0 0 395.71 395.71" xml:space="preserve" stroke="#006eff"><g id="SVGRepo_bgCarrier" stroke-width="0"/><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"/><g id="SVGRepo_iconCarrier"> <g> <path d="M197.849,0C122.131,0,60.531,61.609,60.531,137.329c0,72.887,124.591,243.177,129.896,250.388l4.951,6.738 c0.579,0.792,1.501,1.255,2.471,1.255c0.985,0,1.901-0.463,2.486-1.255l4.948-6.738c5.308-7.211,129.896-177.501,129.896-250.388 C335.179,61.609,273.569,0,197.849,0z M197.849,88.138c27.13,0,49.191,22.062,49.191,49.191c0,27.115-22.062,49.191-49.191,49.191 c-27.114,0-49.191-22.076-49.191-49.191C148.658,110.2,170.734,88.138,197.849,88.138z"/> </g> </g></svg>                            
                                </div>
                                <div class="col-3">
                                  <input id="hk-enlem" type="hidden" name="menlem" placeholder="Enlem" class="form-control form-control-sm" required value="{{ old('menlem') }}">
                                </div>
                                <div class="col-3">
                                  <input id="hk-boylam" type="hidden" name="mboylam" placeholder="Boylam" class="form-control form-control-sm" required value="{{ old('mboylam') }}">
                                </div>
                                <div class="col-12" id="map"> <!-- GOOGLE HARİTALAR -->
                                </div>
                              </div>
                              <div class="form-group mb-4">
                                <textarea placeholder="Adres" class="form-control" name="madres" id="hk-adres" rows="3" value="{{ old('madres') }}"></textarea>
                              </div>
                              </section>
                          </div>
                      </div>
                  </div>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button id="btn-edit" class="float-left btn">Kaydet</button>

                <button class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i> İptal Et</button>

                <button role="submit" id="btn-add" class="btn">Ekle</button>
              </div>
            </div>
          </form>
          </div>
        </div>

        <!-- Gozat Modal -->
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

          <div class="user-profile layout-spacing shadow">
              <div class="widget-content widget-content-area">
                  <div class="text-center user-info">
                      <p class="" id="modal-isim">Jimmy Turner</p>
                      <span id="modal-unvan" class="text-muted">Web Developer</span>
                  </div>
                  <div class="user-info-list">

                      <div class="">
                          <ul class="contacts-block list-unstyled">
                              <li class="contacts-block__item">
                                </span><div class="col-8" style="padding-left: 0px;" id="modal-marka">Şirket Adı</div>
                              </li>
                              <li class="contacts-block__item">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-calendar"><rect x="3" y="4" width="18" height="18" rx="2" ry="2"></rect><line x1="16" y1="2" x2="16" y2="6"></line><line x1="8" y1="2" x2="8" y2="6"></line><line x1="3" y1="10" x2="21" y2="10"></line></svg><span id="modal-dogum">Jan 20, 1989</span>
                              </li>
                              <li class="contacts-block__item">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-map-pin"><path d="M21 10c0 7-9 13-9 13s-9-6-9-13a9 9 0 0 1 18 0z"></path><circle cx="12" cy="10" r="3"></circle></svg><span id="modal-lokasyon">New York, USA</span>
                              </li>
                              <li class="contacts-block__item">
                                  <a href="mailto:example@mail.com"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg><span id="modal-eposta">Jimmy@gmail.com</span></a>
                              </li>
                              <li class="contacts-block__item">
                                  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"></path></svg><span id="modal-cep"> +1 (530) 555-12121</span>
                              </li>
                          </ul>
                      </div>                                    
                  </div>
              </div>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Kapat</button>
      </div>
    </div>
  </div>
</div>
        <!-- CONTENT AREA -->
        <div class="row">
          <div class="col-xl-12 col-lg-12 col-md-12 col-12 layout-top-spacing layout-spacing">
            <div class="widget widget-content-area br-4">
              <!-- <div class="widget-one">
                  <h6>BURASI MÜŞTERİLER SAYFASI OLACAK</h6>
                </div> -->
              <div class="widget-two">
                <table id="html5-extension" class="table table-hover non-hover" data-cols-width="5, 20, 20, 20, 20, 20" style="width: 100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kayıt Türü</th>
                      <th>Firma</th>
                      <th>Yetkili İsmi</th>
                      <th>TCKN/Vergi No</th>
                      <th>Lokasyon</th>
                      {{-- <th>Müşteri Kayıt Tarihi</th> --}}
                      <th>İletişim</th>
                      <th class="dt-no-sorting" data-exclude="true">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>

                    @unless(count($musteriler) == 0)
                      @foreach ($musteriler as $musteri)
                      <tr id="musteri-{{ $musteri->mtcknvno }}">
                        <td class="checkbox-column" style=" width:0px !important;"> {{$loop->iteration }} </td>
                        <td >{{ $musteri->mkayitturu }}</td>
                        <td class="checkbox-column" style=" width:px !important;"> {{ $musteri->mtmarkaadi }} </td>
                        <td style="padding-left:0px !important;">
                        @if ($musteri->mbadi != null)
                            {{ $musteri->mbadi . " " . $musteri->mbsoyadi}}
                        @else
                            {{ $musteri->mtmarkaadi }}
                        @endif
                        </td>
                        <td>{{ $musteri->mtcknvno }}</td>
                        <td>{{ $musteri->milce . "/" . $musteri->mil }}</td>
                        <td>
                          @if ( $musteri->mmobil != null)
                          <a href="tel:{{ $musteri->mmobil }}"><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span></a>
                          @endif
                          @if ( $musteri->meposta != null)
                          <a href="mailto:{{$musteri->meposta}}"><span style="margin-left: 2px;" class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span></a> <span style="margin-left: 2px;">
                          @endif
                          @if ( $musteri->mmobil != null)
                          <a target="_blank" href="https://wa.me/{{$musteri->mmobil}}"><i style="color: #805dca;" class="fa fa-lg fa-whatsapp"></i></a></span></td>
                          <input class="lokasyon" type="hidden" name="{{ $musteri->milce . "/" . $musteri->mil }}">
                          @endif
                        <input class="isim" type="hidden" name="{{ $musteri->mbadi." ".$musteri->mbsoyadi }}">
                        <input class="markaAdi" type="hidden" name="{{ $musteri->mtmarkaadi }}">
                        <input class="kayitno" type="hidden" name="{{ $musteri->mkayitturu }}">
                        <input class="eposta" type="hidden" name="{{ $musteri->meposta }}">
                        <input class="cep" type="hidden" name="{{ $musteri->mmobil }}">
                        <input class="unvan" type="hidden" name="{{ $musteri->mbunvani }}">
                        <input class="dogum" type="hidden" name="{{$musteri->mbdogumgunu[8]}}{{ $musteri->mbdogumgunu[9]}}.{{$musteri->mbdogumgunu[5]}}{{ $musteri->mbdogumgunu[6]}}.{{$musteri->mbdogumgunu[0]}}{{ $musteri->mbdogumgunu[1]}}{{$musteri->mbdogumgunu[2]}}{{ $musteri->mbdogumgunu[3]}}">
                        <td data-exclude="true">
                            <div class="row">
                                <div class="col">
                                    <a data-toggle="modal" role="button" data-target="#exampleModalLong" onclick="musteriBilgileri({{$musteri->mtcknvno}})"><svg style="width:23px; fill:#0e63ec !important;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M160 256C160 185.3 217.3 128 288 128C358.7 128 416 185.3 416 256C416 326.7 358.7 384 288 384C217.3 384 160 326.7 160 256zM288 336C332.2 336 368 300.2 368 256C368 211.8 332.2 176 288 176C287.3 176 286.7 176 285.1 176C287.3 181.1 288 186.5 288 192C288 227.3 259.3 256 224 256C218.5 256 213.1 255.3 208 253.1C208 254.7 208 255.3 208 255.1C208 300.2 243.8 336 288 336L288 336zM95.42 112.6C142.5 68.84 207.2 32 288 32C368.8 32 433.5 68.84 480.6 112.6C527.4 156 558.7 207.1 573.5 243.7C576.8 251.6 576.8 260.4 573.5 268.3C558.7 304 527.4 355.1 480.6 399.4C433.5 443.2 368.8 480 288 480C207.2 480 142.5 443.2 95.42 399.4C48.62 355.1 17.34 304 2.461 268.3C-.8205 260.4-.8205 251.6 2.461 243.7C17.34 207.1 48.62 156 95.42 112.6V112.6zM288 80C222.8 80 169.2 109.6 128.1 147.7C89.6 183.5 63.02 225.1 49.44 256C63.02 286 89.6 328.5 128.1 364.3C169.2 402.4 222.8 432 288 432C353.2 432 406.8 402.4 447.9 364.3C486.4 328.5 512.1 286 526.6 256C512.1 225.1 486.4 183.5 447.9 147.7C406.8 109.6 353.2 80 288 80V80z"/></svg></a> 
                                </div>
                                <div class="col">
                                    <div class="dropdown">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-more-horizontal"><circle cx="12" cy="12" r="1"></circle><circle cx="19" cy="12" r="1"></circle><circle cx="5" cy="12" r="1"></circle></svg>
                                        </a>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink2">
                                            <a class="dropdown-item action-edit" style="cursor:pointer;" href="{{route('musteri.duzenle',["mtcknvno" => $musteri->mtcknvno])}}"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-3"><path d="M12 20h9"></path><path d="M16.5 3.5a2.121 2.121 0 0 1 3 3L7 19l-4 1 1-4L16.5 3.5z"></path></svg>Düzenle</a>
                                            <form method="post" action="{{route('musteri.sil',["mtcknvno" => $musteri->mtcknvno])}}">
                                                @csrf
                                                @method('delete')
                                                <button class="btn btn-danger w-100 text-left pl-2"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash"><polyline points="3 6 5 6 21 6"></polyline><path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path></svg>Sil</button>
                                            </form>                    
                                        </div>
                                    </div>
                                </div>
                            </div>
                    
                        </td>
                    </tr>
                      @endforeach
                    @endunless
                    
                  </tbody>
                </table>
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
  <x-global-mandatory.scripts/>
  <script src="{{ asset('plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('assets/js/app.js') }}"></script>

  <script>
    $(document).ready(function () {
      App.init();
    });
  </script>
  <script src="plugins/highlight/highlight.pack.js"></script>
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->



  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="assets/js/scrollspyNav.js"></script>
  <script src="plugins/jquery-step/jquery.steps.min.js"></script>
  <script src="plugins/jquery-step/custom-jquery.steps.js"></script>
  <script src="{{ asset('assets/js/users/account-settings.js') }}"></script>
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="plugins/input-mask/jquery.inputmask.bundle.min.js"></script>
  <script src="plugins/input-mask/input-mask.js"></script>

  <script src="{{ asset('assets/js/apps/invoice-list.js') }}"></script>

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
  <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
  <script src="{{ asset('assets/js/apps/invoice-list.js') }}"></script>
  <script src="{{ asset('assets/js/kisiBilgileri.js') }}"></script>
  <script src="{{ asset('assets/js/inputController.js') }}"></script>
  <script src="{{ asset('assets/js/il-ilce-secme.js') }}"></script>
  <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->

<!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
<!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
<script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
<script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

<script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<script src="{{ asset('assets/js/apps/contact.js') }}"></script>

<script src="plugins/bootstrap-select/bootstrap-select.min.js"></script>
<script src="plugins/flatpickr/flatpickr.js"></script>
<script src="plugins/flatpickr/custom-flatpickr.js"></script>


  <script> // GOOGLE HARİTALAR
  function enlemBoylamDegis(enlem,boylam){
          $("#hk-enlem").attr("value",enlem);
          $("#hk-boylam").attr("value",boylam);    
        }
        let map, infoWindow;

          function initMap() {
            map = new google.maps.Map(document.getElementById("map"), {
    center: { lat: 36.89241570427338, lng: 30.710640679285348 },
    zoom: 6,
  });
  infoWindow = new google.maps.InfoWindow();
  let marker = new google.maps.Marker();

  const locationButton = document.getElementById("anlikKonum");

  locationButton.classList.add("custom-map-control-button");
  map.controls[google.maps.ControlPosition.TOP_CENTER].push(locationButton);
  locationButton.addEventListener("click", () => {

    marker.setMap(null); // marker'ı sıfırlar
    // Try HTML5 geolocation.
    if (navigator.geolocation) {
      navigator.geolocation.getCurrentPosition(
        (position) => {
          const pos = {
            lat: position.coords.latitude,
            lng: position.coords.longitude,
          };
          marker = new google.maps.Marker({ // tıklanan konuma marker yerleştirir
            position: pos,
          });

          enlemBoylamDegis(pos.lat,pos.lng); // enlem ve boylam bilgilerini inputa verir.
          marker.setMap(map);
          map.setCenter(pos);
        }
      );
    }
  });

  map.addListener("click", (mapsMouseEvent) => {
    // Close the current InfoWindow.
    marker.setMap(null); // marker'ı sıfırlar
    marker = new google.maps.Marker({ // tıklanan konuma marker yerleştirir
      position: mapsMouseEvent.latLng,
    });

    var lat = JSON.stringify(mapsMouseEvent.latLng.toJSON().lat); // Seçilen konumun lat bilgisini alır.
    var lng = JSON.stringify(mapsMouseEvent.latLng.toJSON().lng); // Seçilen konumun lng bilgisini alır. 
    enlemBoylamDegis(lat,lng); // enlem ve boylam bilgilerini inputa verir.
    marker.setMap(map);
  });
}
  </script>
  
  <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC7rnOaEVELsqt70bjd2up_KCHbg2RRnCk&callback=initMap" type="text/javascript"></script>
  <script src="{{ asset('plugins/table-to-excel/dist/tableToExcel.js') }}"></script>
  <script>
    $("#html5-extension").DataTable({
      dom:
        "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
        buttons: [
          // { extend: "excel", className: "btn btn-sm" },
        ],
      },
      oLanguage: {
        oPaginate: {
          sPrevious:
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
          sNext:
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        },
        sInfo: "_PAGE_ / _PAGES_",
        sSearch:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        sSearchPlaceholder: "Ara...",
        sLengthMenu: "Sonuçlar :  _MENU_",
      },
      stripeClasses: [],
      lengthMenu: [7, 10, 20, 50],
      pageLength: 7,
    });

    let top_section = document.getElementsByClassName("dt--top-section");
    let my_element =
      "<a href='/musteri_ekle' role='button'><svg id='btn-add-contact' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-user-plus'><path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path><circle cx='8.5' cy='7' r='4'></circle><line x1='20' y1='8' x2='20' y2='14'></line><line x1='23' y1='11' x2='17' y2='11'></line></svg></a>";
    let desired_place = top_section[0].children[0].children[1].children;

    function htmlToElement(html) {
      var template = document.createElement("template");
      html = html.trim(); // Never return a text node of whitespace as the result
      template.innerHTML = html;
      return template.content.firstChild;
    }
    my_element = htmlToElement(my_element);
    desired_place[0].parentNode.insertBefore(my_element, desired_place[0]);

    let new_element = "<button id='btn-add-hizlikayit' class='dt-button btn-primary mx-3 btn btn-sm' role='button'>Hızlı Kayıt</button>";
    let place = document.getElementById("btn-add-contact");
    new_element = htmlToElement(new_element);
    place.parentNode.parentNode.insertBefore(new_element, place.parentNode);

    let my_table = document.getElementById('html5-extension');
    let excel_button = "<button id='excel-btn' class='btn-primary mx-3 btn btn-sm' role='button' onclick='TableToExcel.convert(my_table)'>Excel</button>";
    let my_var = document.getElementsByClassName('dt-buttons')[0];
    excel_button = htmlToElement(excel_button);
    my_var.appendChild(excel_button);

  </script>
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>