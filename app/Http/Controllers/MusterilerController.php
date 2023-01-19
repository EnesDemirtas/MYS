<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musteri;

class MusterilerController extends Controller {
    // Show all musteriler
    public function index()
    {
        return view('musteriler', ['musteriler' => musteri::where('aktif',1)->get()]);
    }

    public function musteriDuzenle($mtcknvno)
    {
        return view('musteriBilgileriDuzenle',['musteri' => musteri::where('mtcknvno',$mtcknvno)->first()]);
    }

    public function store(Request $request) {
        // Validate data
        $formFields = $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
            'monunvan' => 'string',
            'mbadi' => 'required',
            'mbsoyadi' => 'required',
            'mbdogumgunu' => 'required|before:today',
            'madres' => 'required',
            'mbolge' => 'required',
            'milce' => 'required',
            'mil' => 'required',
            'mmobil' => 'required',
            'menlem' => 'required',
            'mboylam' => 'required'
        ]
    );
    $formFields['mbdogumgunu'] = date('Y-m-d H:i:s', strtotime($formFields['mbdogumgunu']));
    musteri::create($formFields);
    return redirect('musteriler')->with('success', 'Kayıt Başarıyla Eklendi');
    }

    public function musteriEkle(Request $request) {
        // Validate data
        $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required'
        ]);

        if (musteri::where('mtcknvno', $request->mtcknvno)->exists()) {
            return redirect()->back()->with('error', 'Bu TCKN/Vergi No ile kayıtlı bir müşteri bulunmaktadır.');
        } else {
            musteri::create($request->all());
            musteri::where('mtcknvno', $request->mtcknvno)->update( array('aktif' => 1) );
            return redirect('musteriler')->with('success', 'Kayıt Başarıyla Eklendi');
        }

    }

    public function musteriGuncelle(Request $request, $mtcknvno) {
        $request['mbdogumgunu'] = date('Y-m-d H:i:s', strtotime($request['mbdogumgunu']));
        musteri::where('mtcknvno', $mtcknvno)->update($request->except(['_token', '_method']));
        return redirect('musteriler')->with('success', 'Kayıt Başarıyla Güncellendi');
    }

    public function musteriSil($mtcknvno){
        // musteri::where('mtcknvno', $mtcknvno)->delete();
        $musteri = musteri::where('mtcknvno', $mtcknvno)->first();
        $musteri->aktif = 0;
        $musteri->save();
        return redirect()->back()->with("success","Müşteri Başarıyla Silindi.");
    }
}