<!DOCTYPE html>
<html>

<head>
    <x-global-mandatory.styles />
    <link href="{{ asset('plugins/flatpickr/flatpickr.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('plugins/flatpickr/custom-flatpickr.css') }}" rel="stylesheet" type="text/css">
    <style>
        textarea {
        resize: none;
        }
    </style>
</head>

<body>
    <div class="container mt-4">
        <form method="POST" action="">
            @csrf

            {{-- Header --}}
            <div class="row justify-center">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/sbe_logo.png') }}" alt="logo" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <h4 class="text-center">Periyodik Bakım Formu</h4>
                </div>

                <div class="col-md-4">
                    <label for="date">Tarih</label>
                    <input type="text" class="form-control form-control-sm" id="date"
                        placeholder="Add date picker">
                </div>
            </div>

            {{-- 2. İş Ekipmanına Ait Bilgiler --}}
            <div class="col-md my-4">
                <div class="row text-center">
                    <h3>1. Genel Bilgiler</h3>
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Kurum Adı" name="kurum_adi" />
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Faaliyet Alanı" name="faaliyet_alanı" />

                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Adresi" name="adres" />

                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Telefon" name="telefon" />

                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="E-Posta" name="eposta" />

                </div>
            </div>

            {{-- 1. Genel Bilgiler --}}
            <div class="col-md my-4">
                <div class="row text-center">
                    <h3>2. İş Ekipmanına Ait Bilgiler</h3>
                </div>
                <div class="row">
                    <div class="col">
                        <h5>Özel Bilgiler</h5>
                    </div>
                    <div class="col">
                        <h5>Teknik Bilgiler</h5>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Yapımcı firma" name="yapimci_firma" />
                    </div>
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Hacmi" name="hacmi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Markası" name="markasi" />
                    </div>
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Isıtma yüzeyi" name="isitma_yuzeyi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Modeli/Tipi" name="modeli_tipi" />
                    </div>
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Isıtma kapasitesi" name="isitma_kapasitesi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Üretim tarihi" name="uretim_tarihi" />
                    </div>
                    <div class="col">
                        <x-form_genel_bilgiler_row field="İşletme basıncı" name="isletme_basinci" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Seri no" name="ozel_bilgiler_seri_no" />
                    </div>
                    <div class="col">
                        <x-form_genel_bilgiler_row field="Test basıncı" name="test_basinci" />
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col">Kontrol</th>
                            <th scope="col">Uygun</th>
                            <th scope="col">Uygun Değil</th>
                            <th scope="col">Onarıldı</th>
                            <th scope="col">Yenilendi</th>
                            <th scope="col">Açıklamalar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @each('components.bakim_formu_row', $sorular, 'soru')
                    </tbody>
                </table>
            </div>

        </form>

    </div>

    {{-- <x-global-mandatory.scripts />
    <script src="{{ asset('assets/js/form.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script> --}}

    <x-global-mandatory.scripts />

    <script src="{{ asset('assets/js/custom.js') }}"></script>
    <script src="{{ asset('assets/js/form.js') }}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
    <script src="{{ asset('plugins/dropify/dropify.min.js') }}"></script>
    <script src="{{ asset('plugins/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/js/apps/invoice-add.js') }}"></script>
    <!-- END PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
</body>

</html>
