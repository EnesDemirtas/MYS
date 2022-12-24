@props(['musteri'])
<tr id="musteri-{{ $musteri->mtcknvno }}">
    <td >{{ $musteri->mkayitturu }}</td>
    <td class="checkbox-column" style=" width:px !important;"> {{ $musteri->mtmarkaadi }} </td>
    <td style="padding-left:0px !important;">@if ($musteri->mbadi != null)
        {{ $musteri->mbadi . " " . $musteri->mbsoyadi}}
    @else
        {{ $musteri->mtmarkaadi }}
    @endif</td>
    <td>{{ $musteri->mtcknvno }}</td>
    <td>{{ $musteri->milce . "/" . $musteri->mil }}</td>
    <td><a href="tel:{{ $musteri->mtel }}"><span class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-phone"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72 12.84 12.84 0 0 0 .7 2.81 2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45 12.84 12.84 0 0 0 2.81.7A2 2 0 0 1 22 16.92z"/></svg></span></a><a href="mailto:{{$musteri->meposta}}"><span style="margin-left: 2px;" class="inv-email"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-mail"><path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z"></path><polyline points="22,6 12,13 2,6"></polyline></svg></span></a> <span style="margin-left: 2px;"><a target="_blank" href="https://wa.me/{{$musteri->mmobil}}"><i style="color: #805dca;" class="fa fa-lg fa-whatsapp"></i></a></span></td>
    {{-- <input class="lokasyon" type="hidden" name="{{ $calisan->cevadresilce . "/" . $calisan->cevadresil }}">
    <input class="whatsapp" type="hidden" name="{{ $calisan->cwhatsapp }}">
    <input class="kayitno" type="hidden" name="{{ $calisan->ckayitno }}">
    <input class="eposta" type="hidden" name="{{ $calisan->ceposta }}">
    <input class="cep" type="hidden" name="{{$calisan->ukodutel}} {{$calisan->ctel[0]}}{{$calisan->ctel[1]}}{{$calisan->ctel[2]}} {{$calisan->ctel[3]}}{{$calisan->ctel[4]}}{{$calisan->ctel[5]}} {{$calisan->ctel[6]}}{{$calisan->ctel[7]}} {{$calisan->ctel[8]}}{{$calisan->ctel[9]}}">
    <input class="unvan" type="hidden" name="{{ $calisan->cunvani }}"> --}}
    <td>
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
                        </form>                    </div>
                </div>
            </div>
        </div>

    </td>
</tr>