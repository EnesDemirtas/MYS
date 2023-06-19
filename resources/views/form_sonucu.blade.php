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
        {{-- Header --}}
        <div class="row justify-center">
            <div class="col-md-4">
                <img src="{{ asset('assets/img/sbe_logo.png') }}" alt="logo" class="img-fluid">
            </div>
            <div class="col-md-4">
                <h4 class="text-center">Periyodik Bakım Formu</h4>
                <h5 class="text-center">{{ $form->form_adi }}</h5>
                <div class="card-body text-center">
                    {!! QrCode::size(125)->generate(Crypt::decryptString($form->qrCodeData)) !!}
                </div>
            </div>

            <div class="col-md-4">
                <label for="date">Tarih</label>
                <input type="text" class="form-control form-control-sm" id="date" placeholder="Add date picker"
                    value="{{ $form->tarih }}" name="tarih" readonly>
            </div>
        </div>

        {{-- 1. Genel Bilgiler --}}
        <div class="col-md my-4">
            <div class="row text-center">
                <h3>Genel Bilgiler</h3>
            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Kurum Adı" value="{{ $form->kurum_adi }}" />
            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Faaliyet Alanı" value="{{ $form->faaliyet_alani }}" />

            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Adresi" value="{{ $form->adres }}" />

            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Telefon" value="{{ $form->telefon }}" />

            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="E-Posta" value="{{ $form->eposta }}" />

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
                    <x-form_genel_bilgiler_row field="Yapımcı firma" value="{{ $form->ozel_bilgiler[0] }}" />
                </div>
                <div class="col">
                    <x-form_genel_bilgiler_row field="Hacmi" value="{{ $form->teknik_bilgiler[0] }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-form_genel_bilgiler_row field="Markası" value="{{ $form->ozel_bilgiler[1] }}" />
                </div>
                <div class="col">
                    <x-form_genel_bilgiler_row field="Isıtma yüzeyi" value="{{ $form->teknik_bilgiler[1] }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-form_genel_bilgiler_row field="Modeli/Tipi" value="{{ $form->ozel_bilgiler[2] }}" />
                </div>
                <div class="col">
                    <x-form_genel_bilgiler_row field="Isıtma kapasitesi" value="{{ $form->teknik_bilgiler[2] }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-form_genel_bilgiler_row field="Üretim tarihi" value="{{ $form->ozel_bilgiler[3] }}" />
                </div>
                <div class="col">
                    <x-form_genel_bilgiler_row field="İşletme basıncı" value="{{ $form->teknik_bilgiler[3] }}" />
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <x-form_genel_bilgiler_row field="Seri no" value="{{ $form->ozel_bilgiler[4] }}" />
                </div>
                <div class="col">
                    <x-form_genel_bilgiler_row field="Test basıncı" value="{{ $form->teknik_bilgiler[4] }}" />
                </div>
            </div>
        </div>

        {{-- Kullanılan Metot --}}
        <div class="col-md my-4">
            <div class="row text-center">
                <h3>Periyodik Kontrol Metodu</h3>
            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Kullanılan Metod" value="{{ $form->kullanilan_metod }}" />
            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Ölçüm Cihazı" value="{{ $form->olcum_cihazi }}" />

            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Marka-Model" value="{{ $form->marka_model }}" />

            </div>
            <div class="row">
                <x-form_genel_bilgiler_row field="Seri No" value="{{ $form->seri_no }}" />

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
                    @foreach ($form->cevaplar as $key => $cevap)
                        <tr>
                            <td>{{ $sorular[$key] }}</td>
                            <td><input type="checkbox" name="uygun" id="uygun" disabled
                                    @checked($cevap == 'uygun')>
                            </td>
                            <td><input type="checkbox" name="uygun_degil" id="uygun_degil" disabled
                                    @checked($cevap == 'uygun_degil')></td>
                            <td><input type="checkbox" name="onarildi" id="onarildi" disabled
                                    @checked($cevap == 'onarildi')>
                            </td>
                            <td><input type="checkbox" name="yenilendi" id="yenilendi" disabled
                                    @checked($cevap == 'yenilendi')>
                            </td>
                            <td>
                                <textarea type="textarea" name="aciklamalar" id="aciklamalar" readonly></textarea>
                            </td>
                        </tr>
                    @endforeach
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
                    name="ikaz_oneriler" readonly>{{ $form->ikaz_oneriler }}</textarea>
            </div>
        </div>

        {{-- 4. Sonuç ve Kanaat --}}
        <div class="row">
            <div class="input-group mb-4">
                <div class="input-group-prepend">
                    <span class="input-group-text" id="inputGroup-sizing-default">Sonuç ve Kanaat</span>
                </div>
                <textarea type="text" class="form-control" aria-label="Default" aria-describedby="inputGroup-sizing-default"
                    name="sonuc_kanaat" readonly>{{ $form->sonuc_kanaat }}</textarea>
            </div>
        </div>
        <div class="row">
            <p>Yukarda özellikleri yazılı kalorifer kazanının fenni muayenesi, kriterlere uygun
                olarak tarafımdan
                yapılmış, işçi sağlığı ve iş güvenliği mevzuatına uygun olup olmadığı tespit edilmiş olup
                <span id="sonuc_kanaat_date" class="font-weight-bold">{{ $form->sonraki_bakim_tarihi }}</span>
                tarihinde periyodik kontrolünün
                tekrar
                yapılması ve yukarıda
                zikredilen önerilerin
                yerine
                getirilmesi şartıyla BİR YIL boyunca emniyetli bir şekilde kullanılmasında bir sakınca olmadığına
                dair işbu rapor tanzim edilmiştir.
            </p>
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
                            value="{{ $form->kontrol_yapan_tckn }}" readonly>
                    </div>
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Adı Soyadı" value="{{ $form->kontrol_yapan_adsoyad }}" />
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Mesleği" value="{{ $form->kontrol_yapan_meslek }}" />
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Diploma Tarihi ve No"
                        value="{{ $form->kontrol_yapan_diploma_tarihi_no }}" />
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
                            aria-describedby="inputGroup-sizing-default" value="{{ $form->kurum_yetkilisi_tckn }}"
                            readonly>
                    </div>
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Adı Soyadı" value="{{ $form->kurum_yetkilisi_adsoyad }}" />
                </div>
                <div class="row">
                    <x-form_genel_bilgiler_row field="Unvanı" value="{{ $form->kurum_yetkilisi_unvan }}" />
                </div>
            </div>
        </div>

        {{-- <div class="row justify-content-center">
            <button type="submit" class="btn btn-success my-4" style="width: 50%">Bitir</button>
        </div> --}}

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

            // document.getElementById('sonuc_kanaat_date').innerHTML = format(new Date(document.getElementById('date')
            //     .value), 1);
            // document.getElementById('sonraki_bakim_tarihi').value = format(new Date(document.getElementById('date')
            //     .value), 1);
            document.getElementById('date').value = format(new Date(document.getElementById(
                'date').value));

            document.getElementById('sonuc_kanaat_date').innerHTML = format(new Date(document.getElementById(
                'sonuc_kanaat_date').innerHTML));
        });
    </script>
</body>

</html>
