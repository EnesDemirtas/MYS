<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>MYS - TEKLİF EKLE</title>
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

    <link href="{{ asset('assets/css/apps/invoice-add.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('plugins/dropify/dropify.min.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('assets/css/forms/theme-checkbox-radio.css') }}" rel="stylesheet" type="text/css" >
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
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
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Apps</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Invoice</a></li>
                            <li class="breadcrumb-item active" aria-current="page"><a href="javascript:void(0);">Add</a></li>
                        </ol>
                    </nav>
                </div>

                <div class="row invoice layout-spacing layout-top-spacing">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        
                        <div class="doc-container">

                            <div class="row">
                                <div class="col-xl-9">

                                    <div class="invoice-content">

                                        <div class="invoice-detail-body">

                                            <div class="invoice-detail-title">

                                                <div class="invoice-logo">
                                                    <div class="upload">
                                                        <input type="file" id="input-file-max-fs" class="dropify" data-max-file-size="2M" />
                                                    </div>
                                                </div>
                                                
                                                <div class="invoice-title">
                                                    <input type="text" class="form-control" placeholder="Invoice Label" value="Invoice Label">
                                                </div>

                                            </div>

                                            <div class="invoice-detail-header">

                                                <div class="row justify-content-between">
                                                    <div class="col-xl-5 invoice-address-company">

                                                        <h4>Teklif Veren:-</h4>

                                                        <div class="invoice-address-company-fields">

                                                            <div class="form-group row">
                                                                <label for="company-name" class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="company-name" placeholder="Business Name">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="company-email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="company-email" placeholder="name@company.com">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="company-address" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="company-address" placeholder="XYZ Street">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="company-phone" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="company-phone" placeholder="(123) 456 789">
                                                                </div>
                                                            </div>                                                                
                                                            
                                                        </div>
                                                        
                                                    </div>


                                                    <div class="col-xl-5 invoice-address-client">

                                                        <h4>Teklif Verilen:-</h4>

                                                        <div class="invoice-address-client-fields">

                                                            <div class="form-group row">
                                                                <label for="client-name" class="col-sm-3 col-form-label col-form-label-sm">Name</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="client-name" placeholder="Client Name">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="client-email" class="col-sm-3 col-form-label col-form-label-sm">Email</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="client-email" placeholder="name@company.com">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="client-address" class="col-sm-3 col-form-label col-form-label-sm">Address</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="client-address" placeholder="XYZ Street">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label for="client-phone" class="col-sm-3 col-form-label col-form-label-sm">Phone</label>
                                                                <div class="col-sm-9">
                                                                    <input type="text" class="form-control form-control-sm" id="client-phone" placeholder="(123) 456 789">
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                        
                                                    </div>
                                                    
                                                    
                                                </div>
                                                
                                            </div>

                                            <div class="invoice-detail-terms">

                                                <div class="row justify-content-between">

                                                    <div class="col-md-3">

                                                        <div class="form-group mb-4">
                                                            <label for="number">Invoice Number</label>
                                                            <input type="text" class="form-control form-control-sm" id="number" placeholder="#0001">
                                                        </div>

                                                    </div>

                                                    <div class="col-md-3">

                                                        <div class="form-group mb-4">
                                                            <label for="date">Invoice Date</label>
                                                            <input type="text" class="form-control form-control-sm" id="date" placeholder="Add date picker">
                                                        </div>
                                                    </div>

                                                    <div class="col-md-3">
                                                        <div class="form-group mb-4">
                                                            <label for="due">Due Date</label>
                                                            <input type="text" class="form-control form-control-sm" id="due" placeholder="None">
                                                        </div>
                                                        
                                                    </div>

                                                </div>
                                                
                                            </div>


                                            <div class="invoice-detail-items">

                                                <div class="table-responsive">
                                                    <table class="table table-bordered item-table">
                                                        <thead>
                                                            <tr>
                                                                <th class=""></th>
                                                                <th>Description</th>
                                                                <th class="">Rate</th>
                                                                <th class="">Qty</th>
                                                                <th class="text-right">Amount</th>
                                                                <th class="text-center">Tax</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <tr>
                                                                <td class="delete-item-row">
                                                                    <ul class="table-controls">
                                                                        <li><a href="javascript:void(0);" class="delete-item" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-x-circle"><circle cx="12" cy="12" r="10"></circle><line x1="15" y1="9" x2="9" y2="15"></line><line x1="9" y1="9" x2="15" y2="15"></line></svg></a></li>
                                                                    </ul>
                                                                </td>
                                                                <td class="description"><input type="text" class="form-control form-control-sm" placeholder="Item Description"> <textarea class="form-control" placeholder="Additional Details"></textarea></td>
                                                                <td class="rate">
                                                                    <input type="text" class="form-control form-control-sm" placeholder="Price">
                                                                </td>
                                                                <td class="text-right qty"><input type="text" class="form-control form-control-sm" placeholder="Quantity"></td>
                                                                <td class="text-right amount"><span class="editable-amount"><span class="currency">$</span> <span class="amount">100.00</span></td>
                                                                <td class="text-center tax">
                                                                    <div class="n-chk">
                                                                        <label class="new-control new-checkbox new-checkbox-text checkbox-primary" style="height: 18px; margin: 0 auto;">
                                                                            <input type="checkbox" class="new-control-input">
                                                                            <span class="new-control-indicator"></span><span class="new-chk-content">Tax</span>
                                                                        </label>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </div>

                                                <button class="btn btn-secondary additem btn-sm">Add Item</button>
                                                
                                            </div>


                                            <div class="invoice-detail-total">

                                                <div class="row">

                                                    <div class="col-md-6">
                                                        
                                                        <div class="form-group row invoice-created-by">
                                                            <label for="payment-method-account" class="col-sm-3 col-form-label col-form-label-sm">Account #:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control form-control-sm" id="payment-method-account" placeholder="Bank Account Number">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row invoice-created-by">
                                                            <label for="payment-method-bank-name" class="col-sm-3 col-form-label col-form-label-sm">Bank Name:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control form-control-sm" id="payment-method-bank-name" placeholder="Insert Bank Name">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row invoice-created-by">
                                                            <label for="payment-method-code" class="col-sm-3 col-form-label col-form-label-sm">SWIFT code:</label>
                                                            <div class="col-sm-9">
                                                                <input type="text" class="form-control form-control-sm" id="payment-method-code" placeholder="Insert Code">
                                                            </div>
                                                        </div>

                                                        <div class="form-group row invoice-created-by">
                                                            <label for="payment-method-country" class="col-sm-3 col-form-label col-form-label-sm">Country:</label>
                                                            <div class="col-sm-9">
                                                                <select name="country_code" class="form-control country_code  form-control-sm" id="payment-method-country">
                                                                    <option value="">Choose Country</option>
                                                                    <option value="United States">United States</option>
                                                                    <option value="United Kingdom">United Kingdom</option>
                                                                    <option value="Canada">Canada</option>
                                                                    <option value="Australia">Australia</option>
                                                                    <option value="Germany">Germany</option>
                                                                    <option value="Sweden">Sweden</option>
                                                                    <option value="Denmark">Denmark</option>
                                                                    <option value="Norway">Norway</option>
                                                                    <option value="New-Zealand">New Zealand</option>
                                                                    <option value="Afghanistan">Afghanistan</option>
                                                                    <option value="Albania">Albania</option>
                                                                    <option value="Algeria">Algeria</option>
                                                                    <option value="American-Samoa">Andorra</option>
                                                                    <option value="Angola">Angola</option>
                                                                    <option value="Antigua Barbuda">Antigua &amp; Barbuda</option>
                                                                    <option value="Argentina">Argentina</option>
                                                                    <option value="Armenia">Armenia</option>
                                                                    <option value="Aruba">Aruba</option>
                                                                    <option value="Austria">Austria</option>
                                                                    <option value="Azerbaijan">Azerbaijan</option>
                                                                    <option value="Bahamas">Bahamas</option>
                                                                    <option value="Bahrain">Bahrain</option>
                                                                    <option value="Bangladesh">Bangladesh</option>
                                                                    <option value="Barbados">Barbados</option>
                                                                    <option value="Belarus">Belarus</option>
                                                                    <option value="Belgium">Belgium</option>
                                                                    <option value="Belize">Belize</option>
                                                                    <option value="Benin">Benin</option>
                                                                    <option value="Bermuda">Bermuda</option>
                                                                    <option value="Bhutan">Bhutan</option>
                                                                    <option value="Bolivia">Bolivia</option>
                                                                    <option value="Bosnia">Bosnia &amp; Herzegovina</option>
                                                                    <option value="Botswana">Botswana</option>
                                                                    <option value="Brazil">Brazil</option>
                                                                    <option value="British">British Virgin Islands</option>
                                                                    <option value="Brunei">Brunei</option>
                                                                    <option value="Bulgaria">Bulgaria</option>
                                                                    <option value="Burkina">Burkina Faso</option>
                                                                    <option value="Burundi">Burundi</option>
                                                                    <option value="Cambodia">Cambodia</option>
                                                                    <option value="Cameroon">Cameroon</option>
                                                                    <option value="Cape">Cape Verde</option>
                                                                    <option value="Cayman">Cayman Islands</option>
                                                                    <option value="Central-African">Central African Republic</option>
                                                                    <option value="Chad">Chad</option>
                                                                    <option value="Chile">Chile</option>
                                                                    <option value="China">China</option>
                                                                    <option value="Colombia">Colombia</option>
                                                                    <option value="Comoros">Comoros</option>
                                                                    <option value="Costa-Rica">Costa Rica</option>
                                                                    <option value="Croatia">Croatia</option>
                                                                    <option value="Cuba">Cuba</option>
                                                                    <option value="Cyprus">Cyprus</option>
                                                                    <option value="Czechia">Czechia</option>
                                                                    <option value="Côte">Côte d’Ivoire</option>
                                                                    <option value="Djibouti">Djibouti</option>
                                                                    <option value="Dominica">Dominica</option>
                                                                    <option value="Dominican">Dominican Republic</option>
                                                                    <option value="Ecuador">Ecuador</option>
                                                                    <option value="Egypt">Egypt</option>
                                                                    <option value="El-Salvador">El Salvador</option>
                                                                    <option value="Equatorial-Guinea">Equatorial Guinea</option>
                                                                    <option value="Eritrea">Eritrea</option>
                                                                    <option value="Estonia">Estonia</option>
                                                                    <option value="Ethiopia">Ethiopia</option>
                                                                    <option value="Fiji">Fiji</option>
                                                                    <option value="Finland">Finland</option>
                                                                    <option value="France">France</option>
                                                                    <option value="Gabon">Gabon</option>
                                                                    <option value="Georgia">Georgia</option>
                                                                    <option value="Ghana">Ghana</option>
                                                                    <option value="Greece">Greece</option>
                                                                    <option value="Grenada">Grenada</option>
                                                                    <option value="Guatemala">Guatemala</option>
                                                                    <option value="Guernsey">Guernsey</option>
                                                                    <option value="Guinea">Guinea</option>
                                                                    <option value="Guinea-Bissau">Guinea-Bissau</option>
                                                                    <option value="Guyana">Guyana</option>
                                                                    <option value="Haiti">Haiti</option>
                                                                    <option value="Honduras">Honduras</option>
                                                                    <option value="Hong-Kong">Hong Kong SAR China</option>
                                                                    <option value="Hungary">Hungary</option>
                                                                    <option value="Iceland">Iceland</option>
                                                                    <option value="India">India</option>
                                                                    <option value="Indonesia">Indonesia</option>
                                                                    <option value="Iran">Iran</option>
                                                                    <option value="Iraq">Iraq</option>
                                                                    <option value="Ireland">Ireland</option>
                                                                    <option value="Israel">Israel</option>
                                                                    <option value="Italy">Italy</option>
                                                                    <option value="Jamaica">Jamaica</option>
                                                                    <option value="Japan">Japan</option>
                                                                    <option value="Jordan">Jordan</option>
                                                                    <option value="Kazakhstan">Kazakhstan</option>
                                                                    <option value="Kenya">Kenya</option>
                                                                    <option value="Kuwait">Kuwait</option>
                                                                    <option value="Kyrgyzstan">Kyrgyzstan</option>
                                                                    <option value="Laos">Laos</option>
                                                                    <option value="Latvia">Latvia</option>
                                                                    <option value="Lebanon">Lebanon</option>
                                                                    <option value="Lesotho">Lesotho</option>
                                                                    <option value="Liberia">Liberia</option>
                                                                    <option value="Libya">Libya</option>
                                                                    <option value="Liechtenstein">Liechtenstein</option>
                                                                    <option value="Lithuania">Lithuania</option>
                                                                    <option value="Luxembourg">Luxembourg</option>
                                                                    <option value="Macedonia">Macedonia</option>
                                                                    <option value="Madagascar">Madagascar</option>
                                                                    <option value="Malawi">Malawi</option>
                                                                    <option value="Malaysia">Malaysia</option>
                                                                    <option value="Maldives">Maldives</option>
                                                                    <option value="Mali">Mali</option>
                                                                    <option value="Malta">Malta</option>
                                                                    <option value="Mauritania">Mauritania</option>
                                                                    <option value="Mauritius">Mauritius</option>
                                                                    <option value="Mexico">Mexico</option>
                                                                    <option value="Moldova">Moldova</option>
                                                                    <option value="Monaco">Monaco</option>
                                                                    <option value="Mongolia">Mongolia</option>
                                                                    <option value="Montenegro">Montenegro</option>
                                                                    <option value="Morocco">Morocco</option>
                                                                    <option value="Mozambique">Mozambique</option>
                                                                    <option value="Myanmar">Myanmar (Burma)</option>
                                                                    <option value="Namibia">Namibia</option>
                                                                    <option value="Nepal">Nepal</option>
                                                                    <option value="Netherlands">Netherlands</option>
                                                                    <option value="Nicaragua">Nicaragua</option>
                                                                    <option value="Niger">Niger</option>
                                                                    <option value="Nigeria">Nigeria</option>
                                                                    <option value="North-Korea">North Korea</option>
                                                                    <option value="Oman">Oman</option>
                                                                    <option value="Pakistan">Pakistan</option>
                                                                    <option value="Palau">Palau</option>
                                                                    <option value="Palestinian">Palestinian Territories</option>
                                                                    <option value="Panama">Panama</option>
                                                                    <option value="Papua">Papua New Guinea</option>
                                                                    <option value="Paraguay">Paraguay</option>
                                                                    <option value="Peru">Peru</option>
                                                                    <option value="Philippines">Philippines</option>
                                                                    <option value="Poland">Poland</option>
                                                                    <option value="Portugal">Portugal</option>
                                                                    <option value="Puerto">Puerto Rico</option>
                                                                    <option value="Qatar">Qatar</option>
                                                                    <option value="Romania">Romania</option>
                                                                    <option value="Russia">Russia</option>
                                                                    <option value="Rwanda">Rwanda</option>
                                                                    <option value="Réunion">Réunion</option>
                                                                    <option value="Samoa">Samoa</option>
                                                                    <option value="San-Marino">San Marino</option>
                                                                    <option value="Saudi-Arabia">Saudi Arabia</option>
                                                                    <option value="Senegal">Senegal</option>
                                                                    <option value="Serbia">Serbia</option>
                                                                    <option value="Seychelles">Seychelles</option>
                                                                    <option value="Sierra-Leone">Sierra Leone</option>
                                                                    <option value="Singapore">Singapore</option>
                                                                    <option value="Slovakia">Slovakia</option>
                                                                    <option value="Slovenia">Slovenia</option>
                                                                    <option value="Solomon-Islands">Solomon Islands</option>
                                                                    <option value="Somalia">Somalia</option>
                                                                    <option value="South-Africa">South Africa</option>
                                                                    <option value="South-Korea">South Korea</option>
                                                                    <option value="Spain">Spain</option>
                                                                    <option value="Sri-Lanka">Sri Lanka</option>
                                                                    <option value="Sudan">Sudan</option>
                                                                    <option value="Suriname">Suriname</option>
                                                                    <option value="Swaziland">Swaziland</option>
                                                                    <option value="Switzerland">Switzerland</option>
                                                                    <option value="Syria">Syria</option>
                                                                    <option value="Sao-Tome-and-Principe">São Tomé &amp; Príncipe</option>
                                                                    <option value="Tajikistan">Tajikistan</option>
                                                                    <option value="Tanzania">Tanzania</option>
                                                                    <option value="Thailand">Thailand</option>
                                                                    <option value="Timor-Leste">Timor-Leste</option>
                                                                    <option value="Togo">Togo</option>
                                                                    <option value="Tonga">Tonga</option>
                                                                    <option value="Trinidad-and-Tobago">Trinidad &amp; Tobago</option>
                                                                    <option value="Tunisia">Tunisia</option>
                                                                    <option value="Turkey">Turkey</option>
                                                                    <option value="Turkmenistan">Turkmenistan</option>
                                                                    <option value="Uganda">Uganda</option>
                                                                    <option value="Ukraine">Ukraine</option>
                                                                    <option value="UAE">United Arab Emirates</option>
                                                                    <option value="Uruguay">Uruguay</option>
                                                                    <option value="Uzbekistan">Uzbekistan</option>
                                                                    <option value="Vanuatu">Vanuatu</option>
                                                                    <option value="Venezuela">Venezuela</option>
                                                                    <option value="Vietnam">Vietnam</option>
                                                                    <option value="Yemen">Yemen</option>
                                                                    <option value="Zambia">Zambia</option>
                                                                    <option value="Zimbabwe">Zimbabwe</option>
                                                                    </select>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                    <div class="col-md-6">
                                                        <div class="totals-row">
                                                            <div class="invoice-totals-row invoice-summary-subtotal">

                                                                <div class="invoice-summary-label">Subtotal</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="subtotal-amount">
                                                                        <span class="currency">$</span><span class="amount">100</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            

                                                            <div class="invoice-totals-row invoice-summary-total">

                                                                <div class="invoice-summary-label">Discount</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="total-amount">
                                                                        <span class="currency">$</span><span>10</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="invoice-totals-row invoice-summary-tax">

                                                                <div class="invoice-summary-label">Tax</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="tax-amount">
                                                                        <span>0%</span>
                                                                    </div>
                                                                </div>

                                                            </div>

                                                            <div class="invoice-totals-row invoice-summary-balance-due">

                                                                <div class="invoice-summary-label">Total</div>

                                                                <div class="invoice-summary-value">
                                                                    <div class="balance-due-amount">
                                                                        <span class="currency">$</span><span>90</span>
                                                                    </div>
                                                                </div>

                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                            <div class="invoice-detail-note">

                                                <div class="row">
                                                
                                                    <div class="col-md-12 align-self-center">

                                                        <div class="form-group row invoice-note">
                                                            <label for="invoice-detail-notes" class="col-sm-12 col-form-label col-form-label-sm">Notes:</label>
                                                            <div class="col-sm-12">
                                                                <textarea class="form-control" id="invoice-detail-notes" placeholder='Notes - For example, "Thank you for doing business with us"' style="height: 88px;"></textarea>
                                                            </div>
                                                        </div>
                                                        
                                                    </div>

                                                </div>

                                            </div>
                                            
                                            
                                        </div>
                                        
                                    </div>
                                    
                                </div>

                                <div class="col-xl-3">
                                    
                                    <div class="invoice-actions">

                                        <div class="invoice-action-currency">
                                        
                                            <div class="form-group mb-0">
                                                <label for="currency">Para Birimi</label>
                                                <div class="dropdown selectable-dropdown invoice-select">
                                                    <a id="currencyDropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="assets/img/flag-us.svg" class="flag-width" alt="flag"> <span class="selectable-text">USD - Amerikan Doları</span> <span class="selectable-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
                                                    <div class="dropdown-menu" aria-labelledby="currencyDropdown">
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-us.svg ') }}" data-value="USD - Amerikan Doları" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-us.svg ') }}" class="flag-width" alt="flag"> USD - Amerikan Doları</a>
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-gbp.svg') }}" data-value="GBP - İngiliz Sterlini" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-gbp.svg') }}" class="flag-width" alt="flag"> GBP - İngiliz Sterlini</a>
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-idr.svg') }}" data-value="IDR - Endonezya Rupisi" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-idr.svg') }}" class="flag-width" alt="flag"> IDR - Endonezya Rupisi</a>
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-inr.svg') }}" data-value="INR - Hindistan Rupisi" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-inr.svg') }}" class="flag-width" alt="flag"> INR - Hindistan Rupisi</a>
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-brl.svg') }}" data-value="BRL - Brezilya Reali" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-brl.svg') }}" class="flag-width" alt="flag"> BRL - Brezilya Reali</a>
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-de.svg ') }}" data-value="EUR - Euro" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-de.svg ') }}" class="flag-width" alt="flag"> EUR - Euro</a>
                                                        <a class="dropdown-item" data-img-value="{{ asset('assets/img/flag-try.svg') }}" data-value="TRY - Türk Lirası" href="javascript:void(0);"><img src="{{ asset('assets/img/flag-try.svg') }}" class="flag-width" alt="flag"> TRY - Türk Lirası</a>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>

                                        <div class="invoice-action-tax">
                                        
                                            <h5>Vergi</h5>

                                            <div class="invoice-action-tax-fields">

                                                <div class="row">
                                            
                                                    <div class="col-6">

                                                        <div class="form-group mb-0">
                                                            <label for="type">Tip</label>

                                                            <div class="dropdown selectable-dropdown invoice-tax-select">
                                                                <a id="currencyDropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="selectable-text">Yok</span> <span class="selectable-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
                                                                <div class="dropdown-menu" aria-labelledby="currencyDropdown">
                                                                    <a class="dropdown-item" data-value="Deducted" href="javascript:void(0);">Deducted</a>
                                                                    <a class="dropdown-item" data-value="Per Item" href="javascript:void(0);">Kalem Başına</a>
                                                                    <a class="dropdown-item" data-value="On Total" href="javascript:void(0);">Toplamda</a>
                                                                    <a class="dropdown-item" data-value="None" href="javascript:void(0);">Yok</a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group mb-0 tax-rate-deducted" style="display: none;">
                                                            <label for="rate">Rate (%)</label>
                                                            <input type="number" class="form-control input-rate" id="rate" placeholder="Rate" value="10">
                                                        </div>

                                                        <div class="form-group mb-0 tax-rate-per-item" style="display: none;">
                                                            <label for="rate">Rate (%)</label>
                                                            <input type="number" class="form-control input-rate" id="rate" placeholder="Rate" value="5">
                                                        </div>

                                                        <div class="form-group mb-0 tax-rate-on-total" style="display: none;">
                                                            <label for="rate">Rate (%)</label>
                                                            <input type="number" class="form-control input-rate" id="rate" placeholder="Rate" value="25">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>


                                        <div class="invoice-action-discount">

                                            <h5>İndirim</h5>

                                            <div class="invoice-action-discount-fields">

                                                <div class="row">
                                            
                                                    <div class="col-6">
                                                        <div class="form-group mb-0">
                                                            <label for="type">Tip</label>

                                                            <div class="dropdown selectable-dropdown invoice-discount-select">
                                                                <a id="currencyDropdown" class="dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="selectable-text">Yok</span> <span class="selectable-arrow"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg></span></a>
                                                                <div class="dropdown-menu" aria-labelledby="currencyDropdown">
                                                                    <a class="dropdown-item" data-value="Percent" href="javascript:void(0);">Yüzde</a>
                                                                    <a class="dropdown-item" data-value="Flat Amount" href="javascript:void(0);">Miktar</a>
                                                                    <a class="dropdown-item" data-value="None" href="javascript:void(0);">Yok</a>
                                                                </div>
                                                            </div>
                                                            
                                                        </div>
                                                    
                                                    </div>

                                                    <div class="col-6">
                                                        <div class="form-group mb-0 discount-amount" style="display: none;">
                                                            <label for="rate">Miktar</label>
                                                            <input type="number" class="form-control input-rate" id="rate" placeholder="Rate" value="25">
                                                        </div>

                                                        <div class="form-group mb-0 discount-percent" style="display: none;">
                                                            <label for="rate">Yüzde</label>
                                                            <input type="number" class="form-control input-rate" id="rate" placeholder="Rate" value="10">
                                                        </div>
                                                    </div>

                                                </div>
                                                
                                            </div>

                                        </div>

                                    </div>

                                    <div class="invoice-actions-btn">

                                        <div class="invoice-action-btn">

                                            <div class="row">
                                                <div class="col-xl-12 col-md-4">
                                                    <a href="javascript:void(0);" class="btn btn-primary btn-send">Teklifi Gönder</a>
                                                </div>
                                                <div class="col-xl-12 col-md-4">
                                                    <a href="/teklif_onizle" class="btn btn-dark btn-preview">Önizle</a>
                                                </div>
                                                <div class="col-xl-12 col-md-4">
                                                    <a href="javascript:void(0);" class="btn btn-success btn-download">Kaydet</a>
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
    <script src="{{ asset('assets/js/app.js') }}"></script>
    
    <script>
        $(document).ready(function() {
            App.init();
        });
    </script>
    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/apps/invoice-add.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>
</html>