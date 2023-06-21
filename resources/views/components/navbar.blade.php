<div class="topbar-nav header navbar" role="banner">
    <nav id="topbar">
        <ul class="navbar-nav theme-brand flex-row  text-center">
            <li class="nav-item theme-logo">
                <a href="/">
                    <img src="{{ asset('assets/img/sbe_logo.png') }}" style="width:125px !important;" class="navbar-logo" alt="logo">
                </a>
            </li>
            <li class="nav-item theme-text">
                <a href="/" class="nav-link"> MYS </a>
            </li>
        </ul>
        <ul class="list-unstyled menu-categories" id="topAccordion">
        @if (session('kullanici')->cyetki == '2')
            <li class="menu single-menu">
                <a href="/" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Anasayfa</span>
                    </div>
                </a>
            </li>
        @endif
        @if (session('kullanici')->cyetki == '2' || session('kullanici')->cyetki == '0')
            <li class="menu single-menu">
                <a href="#" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-users">
                            <path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2" />
                            <circle cx="9" cy="7" r="4" />
                            <path d="M23 21v-2a4 4 0 0 0-3-3.87" />
                            <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                        </svg> <span>Müşteri Yönetimi</span>
                    </div>
                    <span onclick="dropdownAcMusteriler();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    </span>
                </a>
                <ul class="collapse submenu list-unstyled" id="musteridd" data-parent="#topAccordion">
                    <li>
                        <a href="{{ route('musteriler') }}"> Müşteriler </a>
                    </li>
                    <li>
                        <a href="/musteri_ekle"> Müşteri Ekle </a>
                    </li>
                </ul>
            </li>
        @endif
            
            <li class="menu single-menu">
                <a href="{{ route('randevu_yonetimi') }}" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Randevu Yönetimi</span>
                    </div>
                </a>
            </li>
        @if (session('kullanici')->cyetki == '2' || session('kullanici')->cyetki == '0')
            <li class="menu single-menu">
                <a href="#" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Görev Yönetimi</span>
                    </div>
                    <span onclick="dropdownAcCalisanlar();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    </span>
                </a>
                
                <ul class="collapse submenu list-unstyled" id="calisandd" data-parent="#topAccordion">
                    <li>
                        <a href="{{ route('calisan.index') }}"> Çalışanlar </a>
                    </li>
                </ul>
            </li>
        @endif 
        @if (session('kullanici')->cyetki == '2' || session('tip') == 'Müşteri')  
            <li class="menu single-menu">
                <a href="#" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Teklif Yönetimi</span>
                    </div>
                    <span onclick="dropdownAcTeklifler();">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="feather feather-chevron-down">
                        <polyline points="6 9 12 15 18 9"></polyline>
                    </svg>
                    </span>
                </a>
                <ul class="collapse submenu list-unstyled" id="teklifdd" data-parent="#topAccordion">
                    <li>
                        <a href="/teklif_ekle"> Teklif Ekle </a>
                    </li>
                    <li>
                        <a href="{{ route('teklifler.index') }}"> Teklifler </a>
                    </li>
                </ul>
            </li>
        @endif
            <!-- <li class="menu single-menu">
                <a href="/on_muhasebe"  aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>
                        <span>Ön Muhasebe</span>
                    </div>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-down"><polyline points="6 9 12 15 18 9"></polyline></svg>
                </a>
                <ul class="collapse submenu list-unstyled" id="menu1" data-parent="#topAccordion">
                    <li>
                        <a href="#"> Submenu 1 </a>
                    </li>
                    <li>
                        <a href="#"> Submenu 2 </a>
                    </li>
                </ul>
            </li> -->

            <li class="menu single-menu">
                <a href="{{ route('hizmet.listeleme') }}" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-home">
                            <path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path>
                            <polyline points="9 22 9 12 15 12 15 22"></polyline>
                        </svg>
                        <span>Hizmet ve Ürünler</span>
                    </div>
                    <span>
                    </span>
                </a>
            </li>
        @if (session('kullanici')->cyetki == '2' || session('tip') == 'Müşteri' || session('kullanici')->cyetki == '1')
            <li class="menu single-menu">
                <a href="{{ route('bakim_formu_sonuclari') }}" aria-expanded="false" class="dropdown-toggle autodroprown">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="feather feather-box">
                            <path
                                d="M21 16V8a2 2 0 0 0-1-1.73l-7-4a2 2 0 0 0-2 0l-7 4A2 2 0 0 0 3 8v8a2 2 0 0 0 1 1.73l7 4a2 2 0 0 0 2 0l7-4A2 2 0 0 0 21 16z">
                            </path>
                            <polyline points="3.27 6.96 12 12.01 20.73 6.96"></polyline>
                            <line x1="12" y1="22.08" x2="12" y2="12"></line>
                        </svg>
                        <span>Bakım Sonuçları</span>
                    </div>
                </a>
            </li>
        @endif
        </ul>
    </nav>
</div>

<script>
    function dropdownAcTeklifler(){
        document.getElementById('teklifdd').style.display = "block";
        document.getElementById('calisandd').style.display = "none";
        document.getElementById('musteridd').style.display = "none";
    }
    function dropdownAcCalisanlar(){
        document.getElementById('calisandd').style.display = "block";
        document.getElementById('musteridd').style.display = "none";
        document.getElementById('teklifdd').style.display = "none";
    }
    
    function dropdownAcMusteriler(){
        document.getElementById('musteridd').style.display = "block";
        document.getElementById('calisandd').style.display = "none";
        document.getElementById('teklifdd').style.display = "none";
        
    }
</script>