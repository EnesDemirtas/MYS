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
    </style>
</head>

<body>
    <div class="container mt-4">
        <form method="POST" action="{{ route('submit_bakim_formu') }}">
            @csrf
            @method('POST')

            {{-- Header --}}
            <div class="row justify-center">
                <div class="col-md-4">
                    <img src="{{ asset('assets/img/sbe_logo.png') }}" alt="logo" class="img-fluid">
                </div>
                <div class="col-md-4">
                    <h4 class="text-center">Periyodik Bakım Formu</h4>
                    <h5 class="text-center">{{ $form_adi }}</h5>
                    <input type=hidden name="form_adi" value="{{ $form_adi }}">
                    <input type="hidden" name="teklif_id" value="{{ $teklif_id }}">
                </div>

                <div class="col-md-4">
                    <label for="date">Tarih</label>
                    <input type="text" class="form-control form-control-sm" id="date"
                        placeholder="Add date picker" name="tarih" value="{{ old('tarih') }}" style="color:white;">
                </div>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- 1. Genel Bilgiler --}}
            <div class="col-md my-4">
                <div class="row text-center">
                    <h3>Genel Bilgiler</h3>
                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Kurum Adı" name="kurum_adi" />
                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Faaliyet Alanı" name="faaliyet_alani" />

                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Adresi" name="adres" />

                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Telefon" name="telefon" />

                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="E-Posta" name="eposta" />

                </div>
            </div>

            {{-- 2. İş Ekipmanına Ait Bilgiler --}}
            <div class="col-md my-4">
                <div class="row text-center">
                    <h3>İş Ekipmanına Ait Bilgiler</h3>
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
                        <x-bos_form_genel_bilgiler_row field="Yapımcı firma" name="yapimci_firma" />
                    </div>
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Hacmi" name="hacmi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Markası" name="markasi" />
                    </div>
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Isıtma yüzeyi" name="isitma_yuzeyi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Modeli/Tipi" name="modeli_tipi" />
                    </div>
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Isıtma kapasitesi" name="isitma_kapasitesi" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Üretim tarihi" name="uretim_tarihi" />
                    </div>
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="İşletme basıncı" name="isletme_basinci" />
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Seri no" name="ozel_bilgiler_seri_no" />
                    </div>
                    <div class="col">
                        <x-bos_form_genel_bilgiler_row field="Test basıncı" name="test_basinci" />
                    </div>
                </div>
            </div>

            {{-- Kullanılan Metot --}}
            <div class="col-md my-4">
                <div class="row text-center">
                    <h3>Periyodik Kontrol Metodu</h3>
                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Kullanılan Metod" name="kullanilan_metod" />
                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Ölçüm Cihazı" name="olcum_cihazi" />

                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Marka-Model" name="marka_model" />

                </div>
                <div class="row">
                    <x-bos_form_genel_bilgiler_row field="Seri No" name="seri_no" />

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

            {{-- 3. İkaz ve Öneriler --}}
            <div class="row">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">İkaz ve Öneriler</span>
                    </div>
                    <textarea type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                        name="ikaz_oneriler">{{ old('ikaz_oneriler') }}</textarea>
                </div>
            </div>

            {{-- 4. Sonuç ve Kanaat --}}
            <div class="row">
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="inputGroup-sizing-default">Sonuç ve Kanaat</span>
                    </div>
                    <textarea type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                        name="sonuc_kanaat">{{ old('sonuc_kanaat') }}</textarea>
                </div>
            </div>
            <div class="row">
                <p>Yukarda özellikleri yazılı kalorifer kazanının fenni muayenesi, kriterlere uygun
                    olarak tarafımdan
                    yapılmış, işçi sağlığı ve iş güvenliği mevzuatına uygun olup olmadığı tespit edilmiş olup
                    <span id="sonuc_kanaat_date" class="font-weight-bold"></span> tarihinde periyodik kontrolünün
                    tekrar
                    yapılması ve yukarıda
                    zikredilen önerilerin
                    yerine
                    getirilmesi şartıyla BİR YIL boyunca emniyetli bir şekilde kullanılmasında bir sakınca olmadığına
                    dair işbu rapor tanzim edilmiştir.
                </p>
                <input type="hidden" id="sonraki_bakim_tarihi" name="sonraki_bakim_tarihi">
            </div>

            {{-- 5. Onay --}}
            <div class="row justify-content-between">
                <div class="col-5">
                    <div class="row">
                        <h6>Kontrolü Yapanın</h6>
                    </div>
                    <div class="row">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">T.C. Kimlik
                                    No</span>
                            </div>
                            <input type="number" class="form-control" aria-label="Default"
                                aria-describedby="inputGroup-sizing-default" name="kontrol_yapan_tckn"
                                value="{{ old('kontrol_yapan_tckn') }}">
                        </div>
                    </div>
                    <div class="row">
                        <x-bos_form_genel_bilgiler_row field="Adı Soyadı" name="kontrol_yapan_adsoyad" />
                    </div>
                    <div class="row">
                        <x-bos_form_genel_bilgiler_row field="Mesleği" name="kontrol_yapan_meslek" />
                    </div>
                    <div class="row">
                        <x-bos_form_genel_bilgiler_row field="Diploma Tarihi ve No"
                            name="kontrol_yapan_diploma_tarihi_no" />
                    </div>
                </div>
                <div class="col-5">
                    <div class="row">
                        <h6>Kurum Yetkilisinin</h6>
                    </div>
                    <div class="row">
                        <div class="input-group mb-4">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">T.C. Kimlik
                                    No</span>
                            </div>
                            <input type="number" class="form-control" aria-label="Default"
                                aria-describedby="inputGroup-sizing-default" name="kurum_yetkilisi_tckn"
                                value="{{ old('kurum_yetkilisi_tckn') }}">
                        </div>
                    </div>
                    <div class="row">
                        <x-bos_form_genel_bilgiler_row field="Adı Soyadı" name="kurum_yetkilisi_adsoyad" />
                    </div>
                    <div class="row">
                        <x-bos_form_genel_bilgiler_row field="Unvanı" name="kurum_yetkilisi_unvan" />
                    </div>
                </div>
            </div>

            <div class="row justify-content-center">
                <button type="submit" class="btn btn-success my-4" style="width: 50%">Bitir</button>
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

    <script>
        $(document).ready(function() {
            function format(inputDate, addYear = 0) {
                let date, month, year;

                date = inputDate.getDate();
                month = inputDate.getMonth() + 1;
                year = inputDate.getFullYear() + addYear;

                date = date
                    .toString()
                    .padStart(2, '0');

                month = month
                    .toString()
                    .padStart(2, '0');

                return `${date}/${month}/${year}`;
            }

            document.getElementById('sonuc_kanaat_date').innerHTML = format(new Date(document.getElementById('date')
                .value), 1);
            document.getElementById('sonraki_bakim_tarihi').value = format(new Date(document.getElementById('date')
                .value), 1);
            document.getElementById('date').value = format(new Date(document.getElementById(
                'date').value));


            document.getElementById('date').addEventListener('change', function() {
                document.getElementById('sonuc_kanaat_date').innerHTML = format(new Date(this.value),
                    1);
                document.getElementById('sonraki_bakim_tarihi').value = format(new Date(this.value),
                    1);
                this.value = format(new Date(this.value));
            });
        });
    </script>
</body>

</html>
