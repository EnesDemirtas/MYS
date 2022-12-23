<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\musteri;

class MusterilerController extends Controller {
    // Show all musteriler
    public function index()
    {
        return view('musteriler', ['musteriler' => musteri::all()]);
    }

    public function store(Request $request) {
        // Validate data
        $formFields = $request->validate([
            'mkayitturu' => 'required|doesnt_start_with:Kayıt Türü',
            'mtcknvno' => 'required|numeric',
            'mtmarkaadi' => 'required',
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

}