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

  <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" />
  <link href="{{ asset('plugins/jquery-ui/jquery-ui.min.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/apps/contacts.css') }}" rel="stylesheet" type="text/css" />
  <!-- END PAGE LEVEL CUSTOM STYLES -->
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
        <div class="modal fade" id="addContactModal" tabmys_index="-1" role="dialog"
          aria-labelledby="addContactModalTitle" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
              <div class="modal-body">
                <i class="flaticon-cancel-12 close" data-dismiss="modal"></i>
                <div class="add-contact-box">
                  <div class="add-contact-content">
                    <form id="addContactModalTitle">
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

                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button id="btn-edit" class="float-left btn">Kaydet</button>

                <button class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i> İptal Et</button>

                <button id="btn-add" class="btn">Ekle</button>
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
                <table id="html5-extension" class="table table-hover non-hover" style="width: 100%">
                  <thead>
                    <tr>
                      <th>Firma</th>
                      <th>Yetkili İsmi</th>
                      <th>Görevi</th>
                      <th>Lokasyon</th>
                      <th>Müşteri Kayıt Tarihi</th>
                      <th>Alt Kuruluş</th>
                      <th class="dt-no-sorting">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Bim A.Ş.</td>
                      <td>Caner SARI</td>
                      <td>Satış Sorumlusu</td>
                      <td>Döşemealtı/Antalya</td>
                      <td>25.04.2021</td>
                      <td>80</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference1" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference1">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Kaya Gıda Ltd. Şti.</td>
                      <td>Sude YILDIZ</td>
                      <td>Kalite Kontrol Sorumlusu</td>
                      <td>Yalvaç/Isparta</td>
                      <td>25.07.2022</td>
                      <td>1</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference2" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference2">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Örnek İnşaat</td>
                      <td>Emrah KURT</td>
                      <td>Kıdemli İnşaat Mühendisi</td>
                      <td>Muratpaşa/Antalya</td>
                      <td>12.01.2020</td>
                      <td>0</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference3" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference3">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>İpragaz</td>
                      <td>Ahmet GÜLER</td>
                      <td>Satış Temsilcisi</td>
                      <td>Konyaaltı/Antalya</td>
                      <td>29.03.2021</td>
                      <td>59</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference4" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference4">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Sarkuysan</td>
                      <td>Yağmur ÜNAL</td>
                      <td>Kalite Kontrol Mühendisi</td>
                      <td>Manavgat/Antalya</td>
                      <td>28.11.2016</td>
                      <td>15</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference5" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference5">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Unilever</td>
                      <td>Mustafa ÖZKAN</td>
                      <td>Antalya Bölge Müdürü</td>
                      <td>Merkez/Antalya</td>
                      <td>02.12.2018</td>
                      <td>120</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference6" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference6">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>ETİ</td>
                      <td>Emel YILMAZ</td>
                      <td>Yönetici Asistanı</td>
                      <td>Bucak/Burdur</td>
                      <td>06.08.2017</td>
                      <td>48</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference7" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference7">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Torku</td>
                      <td>Hakan SELİMOĞLU</td>
                      <td>Bakım Mühendisi</td>
                      <td>Meram/Konya</td>
                      <td>14.10.2022</td>
                      <td>17</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference8" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference8">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    <tr>
                      <td>Caymazlar Holding</td>
                      <td>Melek ÜNAL</td>
                      <td>Kalite Kontrol Mühendisi</td>
                      <td>Kemer/Antalya</td>
                      <td>15.09.2019</td>
                      <td>2</td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference9" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference9">
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <a class="dropdown-item" href="#">Something else here</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Separated link</a>
                          </div>
                        </div>
                      </td>
                    </tr>
                    
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
  <script src="{{ asset('assets/js/custom.js') }}"></script>
  <!-- END GLOBAL MANDATORY SCRIPTS -->

  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
  <script src="{{ asset('plugins/table/datatable/datatables.js') }}"></script>
  <!-- NOTE TO Use Copy CSV Excel PDF Print Options You Must Include These Files  -->
  <script src="{{ asset('plugins/table/datatable/button-ext/dataTables.buttons.min.js') }}"></script>
  <script src="{{ asset('plugins/table/datatable/button-ext/jszip.min.js') }}"></script>
  <script src="{{ asset('plugins/table/datatable/button-ext/buttons.html5.min.js') }}"></script>
  <script src="{{ asset('plugins/table/datatable/button-ext/buttons.print.min.js') }}"></script>

  <script src="{{ asset('plugins/jquery-ui/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('assets/js/apps/contact.js') }}"></script>
  <script>
    $("#html5-extension").DataTable({
      dom:
        "<'dt--top-section'<'row'<'col-sm-12 col-md-6 d-flex justify-content-md-start justify-content-center'B><'col-sm-12 col-md-6 d-flex justify-content-md-end justify-content-center mt-md-0 mt-3'f>>>" +
        "<'table-responsive'tr>" +
        "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
      buttons: {
        buttons: [
          { extend: "excel", className: "btn btn-sm" },
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
      "<svg id='btn-add-contact' xmlns='http://www.w3.org/2000/svg' width='24' height='24' viewBox='0 0 24 24' fill='none' stroke='currentColor' stroke-width='2' stroke-linecap='round' stroke-linejoin='round' class='feather feather-user-plus'><path d='M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2'></path><circle cx='8.5' cy='7' r='4'></circle><line x1='20' y1='8' x2='20' y2='14'></line><line x1='23' y1='11' x2='17' y2='11'></line></svg>";
    let desired_place = top_section[0].children[0].children[1].children;

    function htmlToElement(html) {
      var template = document.createElement("template");
      html = html.trim(); // Never return a text node of whitespace as the result
      template.innerHTML = html;
      return template.content.firstChild;
    }
    my_element = htmlToElement(my_element);
    desired_place[0].parentNode.insertBefore(my_element, desired_place[0]);
  </script>
  <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>