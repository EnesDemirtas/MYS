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
                            <input type="text" id="c-name" class="form-control" placeholder="Name">
                            <span class="validation-text"></span>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="contact-email">
                            <i class="flaticon-mail-26"></i>
                            <input type="text" id="c-email" class="form-control" placeholder="Email">
                            <span class="validation-text"></span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="contact-occupation">
                            <i class="flaticon-fill-area"></i>
                            <input type="text" id="c-occupation" class="form-control" placeholder="Occupation">
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="contact-phone">
                            <i class="flaticon-telephone"></i>
                            <input type="text" id="c-phone" class="form-control" placeholder="Phone">
                            <span class="validation-text"></span>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-12">
                          <div class="contact-location">
                            <i class="flaticon-location-1"></i>
                            <input type="text" id="c-location" class="form-control" placeholder="Location">
                          </div>
                        </div>
                      </div>

                    </form>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button id="btn-edit" class="float-left btn">Save</button>

                <button class="btn" data-dismiss="modal"> <i class="flaticon-delete-1"></i> Discard</button>

                <button id="btn-add" class="btn">Add</button>
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
                      <th>İsim</th>
                      <th>Pozisyon</th>
                      <th>Ofis</th>
                      <th>Yaş</th>
                      <th>Başlama Tarihi</th>
                      <th>Maaş</th>
                      <th>Extn.</th>
                      <th>Avatar</th>
                      <th class="dt-no-sorting">İşlemler</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>Tiger Nixon</td>
                      <td>System Architect</td>
                      <td>Edinburgh</td>
                      <td>61</td>
                      <td>2011/04/25</td>
                      <td>$320,800</td>
                      <td>5421</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Garrett Winters</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>63</td>
                      <td>2011/07/25</td>
                      <td>$170,750</td>
                      <td>8422</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Ashton Cox</td>
                      <td>Junior Technical Author</td>
                      <td>San Francisco</td>
                      <td>66</td>
                      <td>2009/01/12</td>
                      <td>$86,000</td>
                      <td>1562</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Cedric Kelly</td>
                      <td>Senior Javascript Developer</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2012/03/29</td>
                      <td>$433,060</td>
                      <td>6224</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Airi Satou</td>
                      <td>Accountant</td>
                      <td>Tokyo</td>
                      <td>33</td>
                      <td>2008/11/28</td>
                      <td>$162,700</td>
                      <td>5407</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Brielle Williamson</td>
                      <td>Integration Specialist</td>
                      <td>New York</td>
                      <td>61</td>
                      <td>2012/12/02</td>
                      <td>$372,000</td>
                      <td>4804</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Herrod Chandler</td>
                      <td>Sales Assistant</td>
                      <td>San Francisco</td>
                      <td>59</td>
                      <td>2012/08/06</td>
                      <td>$137,500</td>
                      <td>9608</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Rhona Davidson</td>
                      <td>Integration Specialist</td>
                      <td>Tokyo</td>
                      <td>55</td>
                      <td>2010/10/14</td>
                      <td>$327,900</td>
                      <td>6200</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                      <td>Colleen Hurst</td>
                      <td>Javascript Developer</td>
                      <td>San Francisco</td>
                      <td>39</td>
                      <td>2009/09/15</td>
                      <td>$205,500</td>
                      <td>2360</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
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
                    <tr>
                      <td>Sonya Frost</td>
                      <td>Software Engineer</td>
                      <td>Edinburgh</td>
                      <td>23</td>
                      <td>2008/12/13</td>
                      <td>$103,600</td>
                      <td>1667</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference10" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference10">
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
                      <td>Jena Gaines</td>
                      <td>Office Manager</td>
                      <td>London</td>
                      <td>30</td>
                      <td>2008/12/19</td>
                      <td>$90,560</td>
                      <td>3814</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference11" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference11">
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
                      <td>Quinn Flynn</td>
                      <td>Support Lead</td>
                      <td>Edinburgh</td>
                      <td>22</td>
                      <td>2013/03/03</td>
                      <td>$342,000</td>
                      <td>9497</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference12" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference12">
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
                      <td>Charde Marshall</td>
                      <td>Regional Director</td>
                      <td>San Francisco</td>
                      <td>36</td>
                      <td>2008/10/16</td>
                      <td>$470,600</td>
                      <td>6741</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference13" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference13">
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
                      <td>Haley Kennedy</td>
                      <td>Senior Marketing Designer</td>
                      <td>London</td>
                      <td>43</td>
                      <td>2012/12/18</td>
                      <td>$313,500</td>
                      <td>3597</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference14" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference14">
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
                      <td>Tatyana Fitzpatrick</td>
                      <td>Regional Director</td>
                      <td>London</td>
                      <td>19</td>
                      <td>2010/03/17</td>
                      <td>$385,750</td>
                      <td>1965</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference15" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference15">
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
                      <td>Michael Silva</td>
                      <td>Marketing Designer</td>
                      <td>London</td>
                      <td>66</td>
                      <td>2012/11/27</td>
                      <td>$198,500</td>
                      <td>1581</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference16" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference16">
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
                      <td>Paul Byrd</td>
                      <td>Chief Financial Officer (CFO)</td>
                      <td>New York</td>
                      <td>64</td>
                      <td>2010/06/09</td>
                      <td>$725,000</td>
                      <td>3059</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference17" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference17">
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
                      <td>Gloria Little</td>
                      <td>Systems Administrator</td>
                      <td>New York</td>
                      <td>59</td>
                      <td>2009/04/10</td>
                      <td>$237,500</td>
                      <td>1721</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference18" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference18">
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
                      <td>Bradley Greer</td>
                      <td>Software Engineer</td>
                      <td>London</td>
                      <td>41</td>
                      <td>2012/10/13</td>
                      <td>$132,000</td>
                      <td>2558</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference19" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference19">
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
                      <td>Dai Rios</td>
                      <td>Personnel Lead</td>
                      <td>Edinburgh</td>
                      <td>35</td>
                      <td>2012/09/26</td>
                      <td>$217,500</td>
                      <td>2290</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference20" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference20">
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
                      <td>Jenette Caldwell</td>
                      <td>Development Lead</td>
                      <td>New York</td>
                      <td>30</td>
                      <td>2011/09/03</td>
                      <td>$345,000</td>
                      <td>1937</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference21" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference21">
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
                      <td>Yuri Berry</td>
                      <td>Chief Marketing Officer (CMO)</td>
                      <td>New York</td>
                      <td>40</td>
                      <td>2009/06/25</td>
                      <td>$675,000</td>
                      <td>6154</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference22" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference22">
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
                      <td>Caesar Vance</td>
                      <td>Pre-Sales Support</td>
                      <td>New York</td>
                      <td>21</td>
                      <td>2011/12/12</td>
                      <td>$106,450</td>
                      <td>8330</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference23" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference23">
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
                      <td>Doris Wilder</td>
                      <td>Sales Assistant</td>
                      <td>Sidney</td>
                      <td>23</td>
                      <td>2010/09/20</td>
                      <td>$85,600</td>
                      <td>3023</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference24" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference24">
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
                      <td>Angelica Ramos</td>
                      <td>Chief Executive Officer (CEO)</td>
                      <td>London</td>
                      <td>47</td>
                      <td>2009/10/09</td>
                      <td>$1,200,000</td>
                      <td>5797</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference25" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference25">
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
                      <td>Gavin Joyce</td>
                      <td>Developer</td>
                      <td>Edinburgh</td>
                      <td>42</td>
                      <td>2010/12/22</td>
                      <td>$92,575</td>
                      <td>8822</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference26" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference26">
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
                      <td>Jennifer Chang</td>
                      <td>Regional Director</td>
                      <td>Singapore</td>
                      <td>28</td>
                      <td>2010/11/14</td>
                      <td>$357,650</td>
                      <td>9239</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference27" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference27">
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
                      <td>Brenden Wagner</td>
                      <td>Software Engineer</td>
                      <td>San Francisco</td>
                      <td>28</td>
                      <td>2011/06/07</td>
                      <td>$206,850</td>
                      <td>1314</td>
                      <td>
                        <div class="d-flex">
                          <div class="usr-img-frame mr-2 rounded-circle">
                            <img alt="avatar" class="img-fluid rounded-circle" src="assets/img/90x90.jpg" />
                          </div>
                        </div>
                      </td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-dark btn-sm">
                            Open
                          </button>
                          <button type="button" class="btn btn-dark btn-sm dropdown-toggle dropdown-toggle-split"
                            id="dropdownMenuReference28" data-toggle="dropdown" aria-haspopup="true"
                            aria-expanded="false" data-reference="parent">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                              fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                              stroke-linejoin="round" class="feather feather-chevron-down">
                              <polyline points="6 9 12 15 18 9"></polyline>
                            </svg>
                          </button>
                          <div class="dropdown-menu" aria-labelledby="dropdownMenuReference28">
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
          { extend: "copy", className: "btn btn-sm" },
          { extend: "csv", className: "btn btn-sm" },
          { extend: "excel", className: "btn btn-sm" },
          { extend: "print", className: "btn btn-sm" },
        ],
      },
      oLanguage: {
        oPaginate: {
          sPrevious:
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
          sNext:
            '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>',
        },
        sInfo: "Showing page _PAGE_ of _PAGES_",
        sSearch:
          '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
        sSearchPlaceholder: "Search...",
        sLengthMenu: "Results :  _MENU_",
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